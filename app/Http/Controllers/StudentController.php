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

        $data=compact('result');
        return view('student')->with($data);
    }

    public function update($id, Request $request)
    {
        $filename=time()."-js.".$request->file('image')->getClientOriginalExtension();
        echo $request->file('image')->storeAs('upload', $filename);
        $newId="";
        $getId=Student::select('id')->where('email', '=', $request->email)->get();
        $newId="";
        foreach($getId as $val) {
            $newId=$val->id;
        }

        $result=Student::find($newId);

        $result->name=$request->name;
        $result->email=$request->email;
        $result->dob=$request->dob;
        $result->address=$request->address;
        $result->phpto=$filename;
        $result->save();

        $result=Student::select('name', 'email', 'dob', 'address', 'phpto')->
        where('email', '=', $request->email)->get();

        $data=compact('result');
        return view('student')->with($data);


        //echo "<pre>";
        //print_r($request->all());
    }
}
