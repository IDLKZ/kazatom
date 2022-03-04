<?php

namespace App\Http\Controllers\Instructor;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Level;
use App\Quiz;
use App\Video;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CourseController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $levels = Level::all();
        return view('instructor.create_course_1', compact('categories', 'levels'));
    }

    public function edit($id)
    {
        try {
            Crypt::decrypt($id);
            $categories = Category::all();
            $levels = Level::all();
            $course = Course::with('category', 'level')->where(['id' => Crypt::decrypt($id), 'user_id' => auth()->id()])->first();
            return view('instructor.edit_course', compact('id', 'course', 'categories', 'levels'));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:70',
            'short_description' => 'required|max:70',
            'description' => 'required',
            'deadline' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $course = Course::find($id);
        $course->edit($data, 'image');
        if ($request['image']){
            $course->uploadFile($request['image'], 'image');
        }

        return redirect(route('instructorCreateCourseStepTwo', ['id' => Crypt::encrypt($course->id)]));
    }

    public function storeStepOne(Request $request)
    {
        $this->validate($request, [
           'title' => 'required|min:3|max:70',
           'short_description' => 'required|max:70',
           'description' => 'required',
           'deadline' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->all();
        $data['user_id'] = auth()->id();

        $course = Course::add($data);
        if ($request['image']){
            $course->uploadFile($request['image'], 'image');
        }

        return redirect(route('instructorCreateCourseStepTwo', ['id' => Crypt::encrypt($course->id)]));
    }

    public function createStepTwo($id)
    {
        try {
            Crypt::decrypt($id);
            $videos = Video::where('course_id', Crypt::decrypt($id))->get();
            return view('instructor.create_course_2', compact('id', 'videos'));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function storeStepTwo(Request $request)
    {
        $this->validate($request, [
            'course_id' => 'required',
            'title' => 'required',
            'url' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
        ]);
        try {
            $id = $request['course_id'];
            $data['title'] = $request['title'];
            $data['course_id'] = Crypt::decrypt($request['course_id']);
            $v = Video::add($data);
            $v->uploadFile($request['url'], 'url');

            return redirect(route('instructorCreateCourseStepTwo', ['id' => $id]));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function createStepThree($id)
    {
        try {
            Crypt::decrypt($id);
            $quizzes = Quiz::where('course_id', Crypt::decrypt($id))->get();
            return view('instructor.create_course_3', compact('id', 'quizzes'));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function storeStepThree(Request $request)
    {
        $this->validate($request, [
           'question' => 'required',
           'a' => 'required',
           'b' => 'required',
           'c' => 'required',
           'd' => 'required',
           'correct' => 'required',
           'course_id' => 'required'
        ]);
        try {
            $id = $request['course_id'];
            $course_id = Crypt::decrypt($request['course_id']);
            $data = $request->all();
            $data['course_id'] = $course_id;
            Quiz::add($data);
            return redirect(route('instructorCreateCourseStepThree', ['id' => $id]));
        } catch (DecryptException $e) {
            return abort(404);
        }
    }

    public function deleteVideo($id)
    {
        $v = Video::find($id);
        $v->remove('url');
        return redirect()->back();
    }

    public function deleteQuiz($id)
    {
        $v = Quiz::find($id);
        $v->delete();
        return redirect()->back();
    }

    public function delete($id)
    {
        $course = Course::with('videos', 'quizes', 'results')->where(['user_id' => auth()->id(), 'id' => $id])->first();
        foreach ($course->videos as $video)
        {
            $video->remove('url');
        }
        foreach ($course->quizes as $quize)
        {
            $quize->delete();
        }
        foreach ($course->results as $result)
        {
            $result->delete();
        }
        $course->remove('image');
        return redirect()->back();
    }

}
