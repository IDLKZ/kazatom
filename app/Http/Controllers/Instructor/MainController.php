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
        $courses = Course::where('user_id', auth()->id())->with('user', 'level')->withCount(["videos","quizes"])->paginate(10);
        $users = User::all()->count();
        return view('instructor.index', compact( 'courses', 'users'));
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
