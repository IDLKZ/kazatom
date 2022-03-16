<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Output;
use App\Quiz;
use App\Result;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CourseController extends Controller
{
    public function add($id)
    {
        $res = Result::where(['user_id' => auth()->id(), 'course_id' => $id])->first();
        if (is_null($res)){
            Result::add([
                'user_id' => auth()->id(),
                'course_id' => $id
            ]);
        }
        return redirect()->back();
    }

    public function listVideo($id)
    {
        $res = Result::where(['user_id' => auth()->id(), 'course_id' => $id])->get();
        $output = Output::where(['user_id' => auth()->id(), 'course_id' => $id])->first();

        if ($res->count() > 0){
            $videos = Video::with('results', 'course', 'quizes', 'materials')->where('course_id', $id)->get();
            $first_video = Video::where(['course_id' => $id, 'prev_video' => null])->first();

            if ($videos->count() > 0){
                return view('student.list_videos', compact('videos', 'first_video', 'output'));
            } else {
                return abort(404);
            }
        } else {
            $resData = [];
            if (auth()->user()->role_id == 3){
                $course = Course::with('videos')->where('id', $id)->first();
                if ($course != null){
                    $resData['user_id'] = auth()->id();
                    $resData['course_id'] = $course->id;
                    if ($course->videos->count() > 0) {
                        foreach ($course->videos as $video) {
                            $resData['video_id'] = $video->id;
                            $resData['status'] = $video->prev_video == null ? 1 : 0;
                            Result::add($resData);
                        }
                    }
                }
            }
            $videos = Video::with('results', 'course', 'quizes')->where('course_id', $id)->get();
            $first_video = Video::where(['course_id' => $id, 'prev_video' => null])->first();
            if ($videos->count() > 0){
                return view('student.list_videos', compact('videos', 'first_video', 'output'));
            } else {
                return abort(404);
            }
        }
//        return abort(404);
    }

    public function watch($id, $course_id)
    {
        $res = Result::where(['user_id' => auth()->id(), 'course_id' => $course_id])->get();
        $output = Output::where(['user_id' => auth()->id(), 'course_id' => $course_id])->first();

        if ($res->count() > 0){
            $videos = Video::with('results', 'course')->where('course_id', $course_id)->get();
            $first_video = Result::where(['user_id' => auth()->id(), 'course_id' => $course_id, 'video_id' => $id, 'status' => 1])->first() != null ? Video::find($id) : null;
            if ($videos->count() > 0 && !is_null($first_video)){
                return view('student.list_videos', compact('first_video', 'videos', 'output'));
            }
            return abort(404);
        }
        return abort(404);
    }

    public function passExam($id, $video_id = null)
    {
        try {
            $course_id = Crypt::decrypt($id);
            $video_id = $video_id != null ? Crypt::decrypt($video_id) : null;
            $quizzes = Quiz::where(['course_id' => $course_id, 'video_id' => $video_id])->get();
            $res = 0;
            $r = Output::where(['user_id' => auth()->id(), 'course_id' => $course_id, 'status' => 0])->first();
//            dd($r);
//            if ($r == null){abort(404);}
            return view('student.pass_exam', compact('quizzes', 'id', 'res', 'video_id'));
        } catch (DecryptException $e) {
            return abort(404);
        }

    }

    public function checkExam(Request $request)
    {
        $this->validate($request, [
           'course_id' => 'required'
        ]);
        try {
            $reqId = Crypt::decrypt($request['course_id']);
            $video_id = Crypt::decrypt($request['video_id']);
            $VIDEO = Video::find($video_id);
            $quizzes = Quiz::where(['course_id' => $reqId, 'video_id' => $video_id])->get();

            $answers = $request->all();
            $id = $reqId;
//            $totalCorrect = 0;
            $res = 0;
            $totalData = [];
            foreach ($quizzes as $quiz){
                foreach ($answers["question-$quiz->id"] as $answer){
                    foreach ($quiz->correct as $value) {
                        if (!array_key_exists("question-$quiz->id", $totalData)){
                            $totalData["question-$quiz->id"] = 0;
                        }
                        if ($answer == $quiz[$value]){$totalData["question-$quiz->id"]++;}
                    }
                }
                $totalData["question-$quiz->id"] = $totalData["question-$quiz->id"] == count($quiz->correct) ? $totalData["question-$quiz->id"] : 0.5;
                $totalData["question-$quiz->id"] = $totalData["question-$quiz->id"]/count($answers["question-$quiz->id"]);
            }
            $totalCorrect = array_sum($totalData)/count($totalData);
            $result = $totalCorrect*100;
            if ($result < 80) {
//                if ($VIDEO->next_video == null){
//                    $c_Q = Quiz::where(['course_id' => $reqId, 'video_id' => null])->get();
//                    if ($c_Q->count() > 0){
//
//                    }
//                }
                $res = -1;
            } else {
                $res = 1;
                if ($video_id != null){
                    $videoID = $VIDEO->next_video == null ? $VIDEO->id : $VIDEO->next_video;
                    $r = Result::where(['course_id' => $id, 'video_id' => $videoID, 'user_id' => auth()->id()])->first();

                    if ($r != null){
                        $r->status = 1;
                        $r->save();
                    } else {abort(404);}
                    if ($VIDEO->next_video == null){
                        Output::create([
                            'course_id' => $id,
                            'user_id' => auth()->id()
                        ]);
                    }
                } else {
                    $output = Output::where(['course_id' => $id, 'user_id' => auth()->id()])->first();
                    if ($output != null) {
                        $output->status = 1;
                        $output->save();
                    } else {return abort(404);}
                }

            }
            return view('student.pass_exam', compact('quizzes', 'id', 'res', 'video_id'));
        } catch (DecryptException $e) {
            return abort(404);
        }

    }
}
