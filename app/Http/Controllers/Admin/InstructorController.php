<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = User::with('courses')->where('role_id', 2)->paginate(6);
        $students = [];
        foreach ($instructors as $instructor){
            foreach ($instructor->courses as $course){
                if ($course->results->count() > 0){
                    foreach ($course->results as $result){
                        $students[$instructor->id][$result->user->id] = $course->results;
                    }
                }
            }
        }

        return view('admin.instructors.index', compact('instructors', 'students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $courses = Course::where("user_id",$id)->with('user', 'level')->withCount(["videos","quizes"])->paginate(10);
        return view('admin.instructors.courses', compact('courses'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instructor = User::find($id);
        if($instructor){
            return view('admin.instructors.edit', compact('instructor'));

        }
        else{
            return redirect()->back();
        }
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
            'image' => 'nullable|image',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|min:4'
        ]);
        $data = $request->all();
        if($data["password"] != null){
            $data['password'] = bcrypt($request['password']);
        }
        else{
            unset($data["password"]);
        }
        $user = User::find($id);
        $user->edit($data, 'image');
        if ($request['image']){
            $user->uploadFile($request['image'], 'image');
        }
        return redirect()->route("instructors.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ins = User::with('courses')->where('id', $id)->first();
        foreach ($ins->courses as $course){
            $course->removeAll($course);
        }
        $ins->delete();
        return redirect(route('instructors.index'));
    }

    public function students($id){
        $students = User::whereIn("id", Result::whereIn("course_id",Course::where("user_id",$id)->pluck("id")->toArray())->pluck("user_id")->toArray())->paginate(8);
        return view("admin.instructors.students",compact("students"));
    }
}
