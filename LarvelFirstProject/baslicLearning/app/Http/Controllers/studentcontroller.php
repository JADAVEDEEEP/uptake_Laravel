<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\students;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentcontroller extends Controller
{
    function list(){
        $student = DB::select('select * from students');
        return view('znmd',['student'=>$student]);
    }

    function addstudent(Request $request){
        $student=new students();
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=$request->password;
        $student->save();
    }
    function updateStudent(Request $request){
    $student = students::find($request->student_id);
    $student->name=$request->name;
    $student->email=$request->email;
    $student->password=$request->password;
    $student->save();
    }
}
