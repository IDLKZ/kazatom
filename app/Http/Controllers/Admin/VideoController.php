<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Http\Controllers\Controller;
use App\Video;
use Doctrine\DBAL\Exception;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use function Sodium\add;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            if($request->get("course_id")){
                $course = Course::find(\Crypt::decrypt($request->get("course_id")));

                $videos = Video::where("course_id",$course->id)->withCount(["quizes"])->paginate(15);
                $available_videos = Video::where("course_id",$course->id)->count() == 1
                    ? Video::where("course_id",$course->id)->get()
                    :Video::where(["course_id"=>$course->id,"next_video"=>null])
                    ->get();
                return  view("admin.videos.create",compact("course","videos","available_videos"));

            }
        }
        catch (\Exception $exception){

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
        $validation_rule = ['course_id' => 'required|exists:courses,id', 'title' => 'required', 'url' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'];
        if($videos = Video::where("course_id",$request->get("course_id"))->count() > 0){
           $validation_rule["prev_video"] = "required|exists:videos,id";
        }
        $this->validate($request, $validation_rule);
        try{
            $data = $request->all();
            $v = Video::add($data);
            $v->uploadFile($request['url'], 'url');
            if($v_id = $request->get("prev_video")){
                Video::where('id', $v_id)
                    ->update(['next_video' => $v->id]);
            }
        }
        catch (\Exception $e){
                dd($e);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($video = Video::find($id)){
            return view("admin.videos.edit",compact("video"));
        }
        else{
            return redirect()->back();
        }
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
        if($video = Video::find($id)){
            $this->validate($request, [
                'title' => 'required',
                'url' => 'sometimes|nullable|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi'
            ]);
            try {
                $data = $request->only("title","description");
                $video->update($data);
                $video->save();
                if($request->hasFile("url")){
                    $video->uploadFile($request['url'], 'url');
                }
                return redirect(route('videos.create', ["course_id"=>Crypt::encrypt($video->course_id)]));
            } catch (\Exception $e) {
                return redirect()->back();
            }
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $v = Video::find($id);
        $v->remove('url');
        return redirect()->back();
    }
}
