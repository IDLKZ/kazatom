<?php

namespace App\Http\Controllers\Instructor;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = [];
        $courses = Course::with('results.user')->where('user_id', auth()->id())->get();
        foreach ($courses as $course){
            if ($course->results->count() > 0){
                foreach ($course->results as $result){
                    $students[$result->user->id] = $result;
                }
            }
        }

        return view('instructor.students', compact('students'));
    }
}
