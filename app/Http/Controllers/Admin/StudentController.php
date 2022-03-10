<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\Department;
use App\Http\Controllers\Controller;
use App\Result;
use App\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::with('results')->where('role_id', 3)->paginate(8);
        return view('admin.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $results = Result::with("course")->paginate();
        return view("admin.students.show",compact("results"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = User::find($id);
        $departments = Department::all();
        return view("admin.students.edit",compact("departments","student"));
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
        $this->validate($request, [
            'image' => 'nullable|image',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'sometimes|nullable|min:4',
            'department_id' => 'sometimes|nullable|exists:departments,id',
        ]);
        $data = $request->all();
        if($data["password"] != null){
            $data['password'] = bcrypt($request['password']);
        }
        else{
            unset($data["password"]);
        }
        $user = User::find($id);
        $user->edit($data, 'image');
        if ($request['image']){
            $user->uploadFile($request['image'], 'image');
        }
        return redirect()->route("students.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::with('results')->where('id', $id)->first();

        if ($student->results->count() > 0){
            foreach ($student->results as $result){
                $result->delete();
            }
        }
        $student->remove('image');
        return redirect(route('students.index'));
    }
}
