<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Instructor\MainController as InstructorMainController;
use App\Http\Controllers\Instructor\CourseController as InstructorCourseController;
use App\Http\Controllers\Instructor\StudentController as InstructorStudentController;
use App\Http\Controllers\Student\MainController as StudentMainController;
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

Auth::routes();
Route::get('logout', function (){
   Auth::logout();
   return redirect(\route('login'));
});

Route::group(['middleware' => 'auth'], function (){

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
        Route::get('/', [AdminMainController::class, 'index'])->name('adminHome');
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
    });

    Route::group(['prefix' => 'student'], function (){
        Route::get('/', [StudentMainController::class, 'index'])->name('studentHome');
    });
});


