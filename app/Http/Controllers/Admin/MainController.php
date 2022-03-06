<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Course;
use App\Http\Controllers\Controller;
use App\Level;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $courses = Course::all()->count();
        $instructors = User::where('role_id', 2)->get()->count();
        $students = User::where('role_id', 3)->get()->count();
        $videos = Video::all()->count();

        $year_num = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
        $month = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];
        $user = [];
        $course_chart = [];

        foreach ($year_num as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
            $course_chart[] = Course::where(DB::raw("DATE_FORMAT(created_at, '%m')"),$value)->count();
        }
        $year = json_encode($month,JSON_NUMERIC_CHECK);
        $user = json_encode($user,JSON_NUMERIC_CHECK);
        $course_chart = json_encode($course_chart,JSON_NUMERIC_CHECK);

        return view('admin.index', compact('courses', 'instructors', 'students', 'videos', 'year', 'user', 'course_chart'));
    }

    public function search(Request $request)
    {
        $type = $request['type'];
        $q = $request['query'];
        if ($type == 'categories'){
            $categories = Category::where('title','LIKE','%'.$q.'%')
                ->get();
            return view('admin.categories.index', compact('categories'));
        }

        if ($type == 'levels'){
            $levels = Level::where('title','LIKE','%'.$q.'%')
                ->get();
            return view('admin.levels.index', compact('levels'));
        }

        if ($type == 'courses'){
            $courses = Course::where('title','LIKE','%'.$q.'%')
                ->paginate(10)->appends(request()->query());
            return view('admin.courses.index', compact('courses'));
        }

        if ($type == 'instructor'){
            $instructors = User::with('courses')->where('role_id', 2)->where('name','LIKE','%'.$q.'%')
                ->paginate(6)->appends(request()->query());
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

        if ($type == 'students'){
            $students = User::with('results')->where('name','LIKE','%'.$q.'%')
                ->paginate(6)->appends(request()->query());
            return view('admin.students.index', compact('students'));
        }


        return abort(404);
    }
}
