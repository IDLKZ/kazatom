<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Instructor\MainController as InstructorMainController;
use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\Instructor\StudentController as InstructorStudentController;
use App\Http\Controllers\Student\MainController as StudentMainController;
use App\Http\Controllers\Student\CourseController as StudentCourseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/courses', [MainController::class, 'courses'])->name('courses');
Route::get('/courses-by-category/{id}', [MainController::class, 'coursesByCategoryId'])->name('coursesByCategory');
Route::post('/courses-by-filter', [MainController::class, 'coursesByFilter'])->name('coursesByFilter');
Route::get('/detail-course/{id}', [MainController::class, 'detailCourse'])->name('detail-course');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact-us', [MainController::class, 'contact'])->name('contact');

Auth::routes();
Route::get('logout', function (){
   Auth::logout();
   return redirect(\route('index'));
});

Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
        Route::get('/', [AdminMainController::class, 'index'])->name('adminHome');

        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('levels', LevelController::class)->except('show');
        Route::resource('courses', CourseController::class)->except('edit', 'update', 'show');
        Route::resource('instructors', InstructorController::class)->except('edit', 'update', 'show');
        Route::resource('students', StudentController::class)->except('edit', 'update', 'show');

//        SEARCH
        Route::get('search', [AdminMainController::class, 'search'])->name('adminSearch');
    });

    Route::group(['prefix' => 'instructor', 'middleware' => 'instructor'], function (){
        Route::get('/', [InstructorMainController::class, 'index'])->name('instructorHome');
        Route::get('/create-course', [InstructorCourseController::class, 'index'])->name('instructorCreateCourse');
        Route::get('/edit-course/{id}', [InstructorCourseController::class, 'edit'])->name('instructorEditCourse');
        Route::put('/update-course/{id}', [InstructorCourseController::class, 'update'])->name('instructorUpdateCourse');
        Route::delete('/delete-course/{id}', [InstructorCourseController::class, 'delete'])->name('instructorDeleteCourse');

        Route::get('students', [InstructorStudentController::class, 'index'])->name('instructorStudents');
//        EDIT PROFILE
        Route::get('edit-profile', [InstructorMainController::class, 'editProfile'])->name('instructorEditProfile');
        Route::put('update-profile/{id}', [InstructorMainController::class, 'updateProfile'])->name('instructorUpdateProfile');

        //        STEP 1
        Route::post('/create-course/step-one', [InstructorCourseController::class, 'storeStepOne'])->name('instructorStoreCourseStepOne');

        //        STEP 2
        Route::post('/create-course/step-two', [InstructorCourseController::class, 'storeStepTwo'])->name('instructorStoreCourseStepTwo');
        Route::get('/create-course/step-two/{id}', [InstructorCourseController::class, 'createStepTwo'])->name('instructorCreateCourseStepTwo');

        //        STEP 3
        Route::get('/create-course/step-three/{id}', [InstructorCourseController::class, 'createStepThree'])->name('instructorCreateCourseStepThree');
        Route::post('/create-course/step-three', [InstructorCourseController::class, 'storeStepThree'])->name('instructorStoreCourseStepThree');

        Route::delete('/create-course/delete-video/{id}', [InstructorCourseController::class, 'deleteVideo'])->name('instructorDeleteVideo');
        Route::delete('/create-course/delete-quiz/{id}', [InstructorCourseController::class, 'deleteQuiz'])->name('instructorDeleteQuiz');

        Route::get('send-envelope/{id}', [InstructorMainController::class, 'getEnvelope'])->name('instructorGetSendEnvelope');
        Route::post('send-envelope', [InstructorMainController::class, 'postEnvelope'])->name('instructorPostSendEnvelope');
    });

    Route::group(['prefix' => 'student'], function (){
        Route::get('/', [StudentMainController::class, 'index'])->name('studentHome');

        //        ENROLL COURSE
        Route::get('/enroll-course/{id}', [StudentCourseController::class, 'add'])->name('studentEnrollCourse');
        Route::get('/list-video-course/{id}', [StudentCourseController::class, 'listVideo'])->name('studentListVideoCourse');
        Route::get('/watch-course/{id}/{course_id}', [StudentCourseController::class, 'watch'])->name('studentWatchCourse');

        //        PASS EXAM
        Route::get('pass-exam/{id}', [StudentCourseController::class, 'passExam'])->name('passExam');
        Route::post('check-exam', [StudentCourseController::class, 'checkExam'])->name('checkExam');
        //        EDIT PROFILE
        Route::get('edit-profile', [StudentMainController::class, 'editProfile'])->name('studentEditProfile');
        Route::put('update-profile/{id}', [StudentMainController::class, 'updateProfile'])->name('studentUpdateProfile');
    });
});


