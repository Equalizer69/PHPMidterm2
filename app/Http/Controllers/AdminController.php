<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\studentclasses;
use App\Classes;
use User;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('index');
    }

    public function students()
    {
        $users = \App\User::all()->where('isAdmin', 0);

        return view('students', ['users'=>$users]);
    }

    public function classes()
    {
        $classes = \App\Classes::get();

        return view('classes', ['classes'=>$classes]);
    }

    public function my_classes()
    {
        $classnames = array();
        foreach(studentclasses::where('student_id', Auth::user()->id)->get() as $class){
            array_push($classnames, \App\Classes::where('id', $class->class_id)->firstOrFail()->classname);
        }
        return view('myclasses', ['classes'=>$classnames]);
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

    public function single_class($id)
    {
        $students_id = array();
        foreach (studentclasses::where('class_id', $id)->get() as $student){
            array_push($students_id, $student->student_id);
        }

        $students_name = array();
        foreach ($students_id as $student_id){
            array_push($students_name, \App\User::findOrFail($student_id)->name);
        }

        $class = \App\Classes::where('id', $id)->firstOrFail()->classname;

        return view('singleclass', ['classname'=>$class, 'students'=>$students_name]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        studentclasses::create([
            'class_id'=>$request->input('classid'),
            'student_id'=>$request->input('studentid')
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $student = \App\User::where('id', $id)->firstOrFail();

        $studentsclasses = \App\studentclasses::where('student_id', $id)->get();
        $classes = array();
        foreach($studentsclasses as $class){
            array_push($classes, \App\Classes::where('id', $class->class_id)->firstOrFail());
        }

        $allClasses = Classes::get();

        return view('singlestudent', ['classes'=>$classes, 'student'=>$student, 'allclasses'=>$allClasses]);
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
    public function destroy($StudentId, $classId)
    {
        studentclasses::where([
            ['student_id', $StudentId],
            ['class_id', $classId]
        ])->delete();

        return redirect()->back();
    }
}
