<?php

namespace App\Http\Controllers;

use App\Course;
use App\Result;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $courses = Course::with('category', 'level', 'videos')->latest()->take(8)->get();
        return view('welcome', compact('courses'));
    }

    public function courses()
    {
        $courses = Course::with('category', 'videos', 'level')->paginate(8);
        return view('courses', compact('courses'));
    }

    public function coursesByCategoryId($id)
    {
        $courses = Course::with('category', 'videos', 'level')->where('category_id', $id)->paginate(8);
        return view('courses', compact('courses'));
    }

    public function coursesByFilter(Request $request)
    {
        if ($request['category_id'] == 0 && $request['level_id'] != 0) {
            $courses = Course::with('category', 'videos', 'level')->where('level_id', $request['level_id'])->paginate(8);
        } elseif ($request['category_id'] != 0 && $request['level_id'] == 0) {
            $courses = Course::with('category', 'videos', 'level')->where('category_id', $request['category_id'])->paginate(8);
        } elseif ($request['category_id'] == 0 && $request['level_id'] == 0) {
            $courses = Course::with('category', 'videos', 'level')->paginate(8);
        } else {
            $courses = Course::with('category', 'videos', 'level')->where(['category_id' => $request['category_id'], 'level_id' => $request['level_id']])->paginate(8);
        }
        return view('courses', compact('courses'));
    }

    public function detailCourse($id)
    {
        $course = Course::with('category', 'level', 'videos')->where('id', $id)->first();
        $res = Result::where(['user_id' => auth()->id(), 'course_id' => $id])->first();
        $bool = $res != null;
        return view('detail_course', compact('course', 'bool', 'res'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
