<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Quiz;
use App\Result;
use App\Video;
use Illuminate\Http\Request;

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
        $res = Result::where(['user_id' => auth()->id(), 'course_id' => $id])->first();
        if (!is_null($res)){
            $course = Course::with('videos')->where('id', $id)->first();
            $first_video = Video::where('course_id', $id)->first();
            if (!is_null($course) && !is_null($first_video)){
                return view('student.list_videos', compact('first_video', 'course', 'res'));
            }
            return abort(404);
        }
        return abort(404);
    }

    public function watch($id, $course_id)
    {
        $res = Result::where(['user_id' => auth()->id(), 'course_id' => $course_id])->first();
        if (!is_null($res)){
            $course = Course::with('videos')->where('id', $course_id)->first();
            $first_video = Video::find($id);
            if (!is_null($course) && !is_null($first_video)){
                return view('student.list_videos', compact('first_video', 'course', 'res'));
            }
            return abort(404);
        }
        return abort(404);
    }

    public function passExam($id)
    {
        $quizzes = Quiz::where('course_id', $id)->get();
        $res = 0;
        $r = Result::where(['user_id' => auth()->id(), 'course_id' => $id, 'status' => 0])->first();
        if ($r == null){abort(404);}
        return view('student.pass_exam', compact('quizzes', 'id', 'res'));
    }

    public function checkExam(Request $request)
    {
        $this->validate($request, [
           'course_id' => 'required'
        ]);
        $quizzes = Quiz::where('course_id', $request['course_id'])->get();
        $answers = $request->all();
        $id = $request['course_id'];
        $totalCorrect = 0;
        foreach ($quizzes as $quiz){
           if ($answers["question-$quiz->id"] == $quiz[$quiz->correct]){$totalCorrect++;}
        }
        $result = ($totalCorrect/$quizzes->count())*100;
        if ($result < 50) {
            $res = -1;
        } else {
            $res = 1;
            $r = Result::where(['course_id' => $request['course_id'], 'user_id' => auth()->id()])->first();
            if ($r != null){
                $r->status = 1;
                $r->save();
            } else {abort(404);}
        }
        return view('student.pass_exam', compact('quizzes', 'id', 'res'));
    }
}
