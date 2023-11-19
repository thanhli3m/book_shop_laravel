<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getRegister(AuthRequest $request)
    {
        if ($request->isMethod('POST')) {

            $user = new User();

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            return redirect('/login');

        }
        return view('shop.register');
    }

    public function getLogin(AuthRequest $request)
    {
        if($request->isMethod("POST")){
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect('/');
            }
        }
        return view('shop.login');
    }

    public function doLogOut(){
        Auth::logout();
        return redirect('/login');
    }

    public function updateProfile(ProfileRequest $request){
        if($request->isMethod('POST')){
            $params = $request->except('_token');
            $user_id= auth()->user()->id;
            
            $update = User::where('id' , $user_id)->update($params);

            if($update){
                Session::flash('success', 'Đã Cập Nhật Thông Tin ');
                    return redirect('/my-profile');
                } else {
                    Session::flash('error', 'Thất Bại');
                }
        }
    }
}
