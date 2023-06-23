<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\Bc;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserColtroller extends Controller
{
    public function getIndex()
    {
        return "Hi";
    }
    public function register(Request $request)
    {

        $validator= Validator::make($request->all(), [

            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required'
        ]);



        if($validator->fails()) {

            return response()->json([
                'validation_error'=>$validator->messages(),
                'status'=>501
            ]);

        } else {
            try {
                $user=User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password)
                ]);

                $token = $user->createToken($user->email.'_token')->plainTextToken;
                return response()->json([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'token'=>$token,
                    'status'=>'200',
                    'message'=>'Registered Successfully'
                ]);

            } catch(\Exception $e) {
                return response()->json([
                    'status'=>'500',
                    'message'=>'Duplicate Entry'
                ]);

            }

        }
    }

    public function login(Request $request)
    {

        $validator=Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if($validator->fails()) {

            return response()->json([
                'validation_error'=>$validator->messages(),
                'status'=>'501'
            ]);

        } else {
            $user=User::where('email', $request->email)->first();
            if(!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status'=>'500',
                    'message'=>'Invalide credintials!'
                ]);
            } else {

                $store_id=$this->getStore($user->email);
                $token = $user->createToken($user->email.'_token')->plainTextToken;
                return response()->json([
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'token'=>$token,
                    'status'=>'200',
                    'message'=>'Login Successfully',
                    'store'=>$store_id
                ]);
            }


        }
    }

    public function getStore($email)
    {
        $bc=Bc::select("store_id")->where('merchent_email', '=', $email)->get();
        return $bc;
    }
}
