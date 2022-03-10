<?php

namespace App\Http\Controllers\Instructor;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Level;
use App\Models\User;
use App\Quiz;
use App\Video;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Crypt;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::with('user', 'level')->withCount(["videos","quizes"])->paginate(10);
        return view('instructor.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $levels = Level::all();
        $users = User::where("role_id",2)->get();
        return view("instructor.courses.create",compact("users","categories","levels"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:70',
            "user_id" => "required|exists:users,id",
            'short_description' => 'required|max:70',
            'description' => 'required',
            'deadline' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->all();
        $data["deadline"] = Carbon::createFromFormat('m/d/Y', $data["deadline"]);
        $course = Course::add($data);
        if ($request['image']) {
            $course->uploadFile($request['image'], 'image');
        }
        return  redirect()->route("instructorHome");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($course = Course::find($id)){
            $categories = Category::all();
            $levels = Level::all();
            $users = User::where("role_id",2)->get();
            return view("instructor.courses.edit",compact("users","categories","levels","course"));

        }
        return  redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:70',
            "user_id" => "required|exists:users,id",
            'short_description' => 'required|max:70',
            'description' => 'required',
            'deadline' => 'required',
            'category_id' => 'required',
            'level_id' => 'required',
            'image' => 'nullable|image'
        ]);
        $data = $request->all();
        $data["deadline"] = Carbon::createFromFormat('m/d/Y', Carbon::parse($data["deadline"])->format('m/d/Y'));
        $course = Course::find($id);
        $course->edit($data, 'image');
        if ($request['image']) {
            $course->uploadFile($request['image'], 'image');
        }
        return redirect()->route("instructorHome");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::with('results', 'videos', 'quizes')->where('id', $id)->first();
        $course->removeAll($course);
        return redirect(route('instructorHome'));
    }


//    public function index()
//    {
//        $categories = Category::all();
//        $levels = Level::all();
//        return view('instructor.create_course_1', compact('categories', 'levels'));
//    }
//
//    public function edit($id)
//    {
//        try {
//            Crypt::decrypt($id);
//            $categories = Category::all();
//            $levels = Level::all();
//            $course = Course::with('category', 'level')->where(['id' => Crypt::decrypt($id), 'user_id' => auth()->id()])->first();
//            return view('instructor.edit_course', compact('id', 'course', 'categories', 'levels'));
//        } catch (DecryptException $e) {
//            return abort(404);
//        }
//    }
//
//    public function update(Request $request, $id)
//    {
//        $this->validate($request, [
//            'title' => 'required|min:3|max:70',
//            'short_description' => 'required|max:70',
//            'description' => 'required',
//            'deadline' => 'required',
//            'category_id' => 'required',
//            'level_id' => 'required',
//            'image' => 'nullable|image'
//        ]);
//        $data = $request->all();
//        $data['user_id'] = auth()->id();
//        $course = Course::find($id);
//        $course->edit($data, 'image');
//        if ($request['image']){
//            $course->uploadFile($request['image'], 'image');
//        }
//
//        return redirect(route('instructorCreateCourseStepTwo', ['id' => Crypt::encrypt($course->id)]));
//    }
//
//    public function storeStepOne(Request $request)
//    {
//        $this->validate($request, [
//           'title' => 'required|min:3|max:70',
//           'short_description' => 'required|max:70',
//           'description' => 'required',
//           'deadline' => 'required',
//            'category_id' => 'required',
//            'level_id' => 'required',
//            'image' => 'nullable|image'
//        ]);
//        $data = $request->all();
//        $data['user_id'] = auth()->id();
//
//        $course = Course::add($data);
//        if ($request['image']){
//            $course->uploadFile($request['image'], 'image');
//        }
//
//        return redirect(route('instructorCreateCourseStepTwo', ['id' => Crypt::encrypt($course->id)]));
//    }
//
//    public function createStepTwo($id)
//    {
//        try {
//            Crypt::decrypt($id);
//            $videos = Video::where('course_id', Crypt::decrypt($id))->get();
//            return view('instructor.create_course_2', compact('id', 'videos'));
//        } catch (DecryptException $e) {
//            return abort(404);
//        }
//    }
//
//    public function storeStepTwo(Request $request)
//    {
//        $this->validate($request, [
//            'course_id' => 'required',
//            'title' => 'required',
//            'url' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
//        ]);
//        try {
//            $id = $request['course_id'];
//            $data['title'] = $request['title'];
//            $data['course_id'] = Crypt::decrypt($request['course_id']);
//            $v = Video::add($data);
//            $v->uploadFile($request['url'], 'url');
//
//            return redirect(route('instructorCreateCourseStepTwo', ['id' => $id]));
//        } catch (DecryptException $e) {
//            return abort(404);
//        }
//    }
//
//    public function createStepThree($id)
//    {
//        try {
//            Crypt::decrypt($id);
//            $quizzes = Quiz::where('course_id', Crypt::decrypt($id))->get();
//            return view('instructor.create_course_3', compact('id', 'quizzes'));
//        } catch (DecryptException $e) {
//            return abort(404);
//        }
//    }
//
//    public function storeStepThree(Request $request)
//    {
//        $this->validate($request, [
//           'question' => 'required',
//           'a' => 'required',
//           'b' => 'required',
//           'c' => 'required',
//           'd' => 'required',
//           'correct' => 'required',
//           'course_id' => 'required'
//        ]);
//        try {
//            $id = $request['course_id'];
//            $course_id = Crypt::decrypt($request['course_id']);
//            $data = $request->all();
//            $data['course_id'] = $course_id;
//            Quiz::add($data);
//            return redirect(route('instructorCreateCourseStepThree', ['id' => $id]));
//        } catch (DecryptException $e) {
//            return abort(404);
//        }
//    }
//
//    public function deleteVideo($id)
//    {
//        $v = Video::find($id);
//        $v->remove('url');
//        return redirect()->back();
//    }
//
//    public function deleteQuiz($id)
//    {
//        $v = Quiz::find($id);
//        $v->delete();
//        return redirect()->back();
//    }
//
//    public function delete($id)
//    {
//        $course = Course::with('videos', 'quizes', 'results')->where(['user_id' => auth()->id(), 'id' => $id])->first();
//        $course->removeAll($course);
//        return redirect()->back();
//    }

}
