<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Level;
use \App\Models\User;
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
        return view('admin.courses.index', compact('courses'));
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
        return view("admin.courses.create",compact("users","categories","levels"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $this->validate($request, [
                'title' => 'required|min:3|max:70',
                "user_id"=>"required|exists:users,id",
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
            if ($request['image']){
                $course->uploadFile($request['image'], 'image');
            }
            return  redirect()->route("courses.index");
        }
        catch (\Exception $exception){
            return redirect()->back();
        }

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
            return view("admin.courses.edit",compact("users","categories","levels","course"));

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
        try{
            $this->validate($request, [
                'title' => 'required|min:3|max:70',
                "user_id"=>"required|exists:users,id",
                'short_description' => 'required|max:70',
                'description' => 'required',
                'deadline' => 'required',
                'category_id' => 'required',
                'level_id' => 'required',
                'image' => 'nullable|image'
            ]);
            $data = $request->all();
            $data["deadline"] = Carbon::createFromFormat('m/d/Y', $data["deadline"]);
            $course = Course::find($id);
            $course->edit($data, 'image');
            if ($request['image']){
                $course->uploadFile($request['image'], 'image');
            }
            return  redirect()->route("courses.index");
        }
        catch (\Exception $exception){
            return redirect()->back();

        }

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
        return redirect(route('courses.index'));
    }
}
