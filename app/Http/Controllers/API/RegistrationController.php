<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class RegistrationController extends Controller
{
    public function getUser(){
        $data = User::all();
        return response(['user-data'=>$data]);
    }
    public function registerUser(Request $request){

        // $data = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
                  'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }

        $data['password'] = bcrypt($request->password);
        $data = $request->all();

        $user = User::create($data);

        $token = $user->createToken('API_Token')->accessToken;

        return response([ 'user' => $user, 'token' => $token]);
        
    }

    public function loginUser(Request $request){

        $validator = Validator::make($request->all(), [
            'email'=>'required',
            'password'=>'required',
        ]);


        if($validator->fails()){
            return response([ 'error' => 'unauthorized']);
        }

        $user = User::where('email', $request->email)->first();
            if ($user) {
                if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken('Grant_Client')->accessToken;
                    $response = ['token' => $token];
                    return response($response, 200);
                } else {
                    $response = ["message" => "Password mismatch"];
                    return response($response, 422);
                }
            } else {
                $response = ["message" =>'User does not exist'];
                return response($response, 422);
            }


    }
}
