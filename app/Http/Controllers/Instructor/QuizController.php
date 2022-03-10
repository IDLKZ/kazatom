<?php

namespace App\Http\Controllers\Instructor;

use App\Course;
use App\Http\Controllers\Controller;
use App\Quiz;
use App\Video;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->get("course_id") || $request->get("video_id")){
            $quizzes = $request->has("video_id")
                ?Quiz::where("video_id",$request->get("video_id"))->get()
                :Quiz::where(["course_id"=>$request->get("course_id"),"video_id"=>null])->get();
            $course =  Course::find($request->get("course_id"));
            $video = $request->has("video_id")
                ? Video::find($request->get("video_id"))
                :null;
            return view("instructor.quizzes.create",compact("course","quizzes","video"));
        }
        else{
            return redirect()->back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(["course_id"=>"required","video_id"=>"sometimes|nullable|exists:videos,id","a"=>"required","b"=>"required","c"=>"required","d"=>"required","correct"=>"required"]);
        $data = $request->all();
        try{
            $quiz = Quiz::add($data);
        }
        catch (\Exception $e){
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Quiz::destroy($id);
        return redirect()->back();
    }
}
