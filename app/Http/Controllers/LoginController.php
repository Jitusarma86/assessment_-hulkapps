<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');

    }
    public function loginDone(Request $request)
    {

        $user=User::where('email', '=', $request->email)->get();


        foreach($user as $val) {
            if($val->password==$request->password && $val->role=='1' && $val->status=='1') {
                return view('admin');
            } elseif($val->password==$request->password && $val->role=='2' && $val->status=='1') {
                $stdMail=$request->email;
                $data=compact('stdMail');
                return view('student_home')->with($data);
            }
        }
        //echo "<pre>";
        //print_r($user);


        //return $user->password;
        /*if($request->password=$user->password) {
            return "Email or password not matched!";
        }
        if($request->role==1 && $request->status==1) {
            return view('admin');
        } elseif($request->role==2 && $request->status==1) {

        }*/

    }
}
