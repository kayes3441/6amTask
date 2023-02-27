<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
use Validator;
use Auth;

class ApiAuthController extends BaseController
{

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email'         => 'required|email|max:255',
            'password'      =>'required',
        ]);

        if ($validator->fails()){
            return $this->sendError('Validation Error',$validator->errors());
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user               = Auth::user();
            $success['token']   = $user->createToken('RestApi')->plainTextToken;
            $success['name']    = $user->name;

            return $this->sendResponse($success,'Successfully Login');

        }
        else{
            return $this->sendError('Unauthorized',['error'=>'Unauthorize User']);
        }
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return $this->sendResponse([],'Logout Successfully');
    }
}
