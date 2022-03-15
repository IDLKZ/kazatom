<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Output;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $results = Result::with('course', 'course.videos')->where('user_id', auth()->id())->get();
//        $courses = Course::whereNotIn("id",Result::with('course.videos')->where(["user_id"=>auth()->id()])->pluck("course_id")->toArray())->get();
        $courses = Course::with('videos', 'results', 'outputs')->paginate(10);

        $outputs = Output::where(['user_id' => auth()->id(), 'status' => 1])->count();
        return view('student.index', compact('results',"courses", 'outputs'));
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

    public function getCertificate($id)
    {
        $output = Output::with('course', 'user')->where(['user_id' => auth()->id(), 'course_id' => $id, 'status' => 1])->first();
        if ($output == null){return abort(404);}

        return view('student.certificate', compact('output'));
    }
}
