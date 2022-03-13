<?php

namespace App\Http\Controllers\Auth;

use App\Course;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Result;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

//    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required']
        ]);
        $data = $request->all();
        $data['password'] = Hash::make($request['password']);
        $user = User::add($data);
//        $resData = [];
//        if ($user->role_id == 3){
//            $courses = Course::with('videos')->get();
//            foreach ($courses as $course) {
//                $resData['user_id'] = $user->id;
//                $resData['course_id'] = $course->id;
//                if ($course->videos->count() > 0) {
//                    foreach ($course->videos as $video) {
//                        $resData['video_id'] = $video->id;
//                        $resData['status'] = $video->prev_video == null ? 1 : 0;
//                        Result::add($resData);
//                    }
//                }
//            }
//        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_id == 1){
                return redirect(route('adminHome'));
            } elseif (Auth::user()->role_id == 2) {
                return redirect(route('instructorHome'));
            } else {
                return redirect(route('studentHome'));
            }
        } else {
            return redirect(route('login'));
        }
    }

}
