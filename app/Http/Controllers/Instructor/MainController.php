<?php

namespace App\Http\Controllers\Instructor;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Level;
use App\Mail\MailTest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $profile = User::with('courses.videos')->where('id', auth()->id())->first();
        $students = [];
        foreach ($profile->courses as $course){
            if ($course->results->count() > 0){
                foreach ($course->results as $result){
                    $students[$result->user->id] = $course->results;
                }
            }
        }

        return view('instructor.index', compact('profile', 'students'));
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

    public function getEnvelope($id)
    {
        $user = User::find($id);
        return view('instructor.envelope', compact('user'));
    }

    public function postEnvelope(Request $request)
    {
        $this->validate($request, [
           'message' => 'required'
        ]);
        $details = [
            'title' => 'Mail from Kazatomprom',
            'body' => $request['message']
        ];

//        Mail::to($request['email'])->send(new MailTest($details));

        return redirect(route('instructorStudents'));
    }
}
