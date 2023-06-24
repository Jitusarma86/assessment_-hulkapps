<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
//use Event;
use Mail;

//use App\Events\SendMail;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin');
    }

    public function adminSave(Request $request)
    {
        $request->validate(
            [
                'mycsv'=>'required'
            ]
        );

        if(request()->has('mycsv')) {
            $data= file(request()->mycsv);
            $chunks=array_chunk($data, 1000);
            foreach ($chunks as $key => $chunk) {
                $name="/tmp{$key}.csv";
                $path=resource_path('temp');

                file_put_contents($path. $name, $chunk);

            }



            $path=resource_path('temp');
            $files=glob("$path/*.csv");
            $heder=[];
            $email=[];
            $arr=[];
            $i=0;
            foreach ($files as $key=>$file) {
                $data=array_map('str_getcsv', file($file));
                if($key===0) {
                    $heder=$data[0];
                    unset($data[0]);
                }

                foreach ($data as $value) {
                    $filedata=array_combine($heder, $value);

                    $name[$i]=$filedata["name"];
                    $email[$i]=$filedata["email"];
                    $dob[$i]=$filedata["dob"];
                    $address[$i]=$filedata["address"];
                    $photo[$i]=$filedata["photo"];


                    /*$arr['name']=$name[$i];
                    $arr['email']=$email[$i];
                    $arr['dob']=$dob[$i];
                    $arr['address']=$address[$i];
                    $arr['photo']=$photo[$i];
                    */


                    $result=Student::create([
                        'name'=> $name[$i],
                        'email'=> $email[$i],
                        'dob'=> $dob[$i],
                        'address'=> $address[$i],
                        'phpto'=> $photo[$i],
                    ]);

                    $i++;

                }
                //unlink($file);

            }
        }
        return view('admin');
    }

    public function display()
    {
        $result=Student::all();

        $data=compact('result');
        return view('display')->with($data);
    }
    public function verify($id)
    {
        $data=['data'=>'Your records are verified'];
        $user['to']=$id;
        Mail::send('mail', $data, function ($msg) use ($user) {
            $msg->to($user['to']);
            $msg->subject('Verified');
        });

        return view('admin');
    }
}
