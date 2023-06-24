<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student($id)
    {
        $email=$id;

        $result=Student::select('name', 'email', 'dob', 'address', 'phpto')->
        where('email', '=', $email)->get();

        //echo "<pre>";
        //print_r($result);
        //$result=Student::where('email', '=', $id)->get();
        $data=compact('result');
        return view('student')->with($data);
    }
}
