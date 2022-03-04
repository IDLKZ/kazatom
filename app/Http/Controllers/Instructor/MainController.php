<?php

namespace App\Http\Controllers\Instructor;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Level;
use App\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $profile = User::with('courses.videos')->where('id', auth()->id())->first();
        return view('instructor.index', compact('profile'));
    }

    public function editProfile()
    {
        $profile = User::find(auth()->id());
        return view('instructor.edit_profile', compact('profile'));
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
