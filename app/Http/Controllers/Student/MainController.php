<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $results = Result::with('course', 'course.videos')->where('user_id', auth()->id())->get();
        $courses = Course::whereNotIn("id",Result::where(["user_id"=>auth()->id()])->withCount("videos")->pluck("course_id")->toArray())->get();
        return view('student.index', compact('results',"courses"));
    }

    public function editProfile()
    {
        $profile = User::find(auth()->id());
        return view('student.edit_profile', compact('profile'));
    }

    public function updateProfile(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'password' => 'required'
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request['password']);
        $user = User::find($id);
        $user->edit($data, 'image');
        if ($request['image']){
            $user->uploadFile($request['image'], 'image');
        }
        return redirect()->back();
    }
}
