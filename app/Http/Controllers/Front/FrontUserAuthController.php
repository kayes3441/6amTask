<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController as BaseController;
use App\Models\FrontUser;
use Illuminate\Http\Request;
use Session;
use Validator;

class FrontUserAuthController extends BaseController
{
    public function login(){
        return view('front.frontUser.loginPage');
    }
    public function check(Request $request){

        $front_user =FrontUser::where('email',$request->email)->first();
        if ($front_user)
        {
            if (password_verify($request->password, $front_user->password))
            {
                Session::put('front_user_id',   $front_user->id);
                Session::put('front_user_name', $front_user->first_name);

                return redirect('/');
            }
            else
            {
                return redirect()->back()->with('message', 'Password is invalid.');
            }
        }
        else
        {
            return redirect()->back()->with('message','Invalid Email Or Password');
        }

    }

    public function registration(){
        return view('front.frontUser.registrationPage');
    }
    public function create(Request $request){

        $validator = Validator::make($request->all(),[
            'first_name'             =>'required',
            'last_name'              =>'required',
            'email'                  =>'required|unique:front_users',
            'mobile'                 =>'required|numeric',
            'password'               =>'required|min:8',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }
        $front_user             = new FrontUser();
        $front_user->first_name = $request->first_name;
        $front_user->last_name  = $request->last_name;
        $front_user->email      = $request->email;
        $front_user->mobile     = $request->mobile;
        $front_user->password   = bcrypt($request->password);
        $front_user->save();

        Session::put('front_user_id',   $front_user->id);
        Session::put('front_user_name', $front_user->first_name);

        return redirect('/');
    }

    public function logout(){
        Session::forget('front_user_id');
        Session::forget('front_user_name');

        return redirect('/');
    }

}
