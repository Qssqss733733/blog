<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function reg()
    {
        return view('admin.reg');
    }

    public function doreg(Request $request){
        $messages = [
            'required' => 'The :attribute不能为空',
            'alpha_num' => 'The :attribute必须是字母或数字',
            'between' => 'The :attribute必须是:min个字符和:max字符',
            'password.confirmed'=>'The :attribute两次密码不一致'
        ];
        $this->validate($request, [
            'name' => 'required|alpha_num|unique:users,name|between:4,8',
            'password' => 'required|between:4,8|confirmed',
            'password_confirmation' => 'required'
        ],$messages);
        //$ret = User::create($request->all());
        //dump($ret);
    }

    //自己写的
//    public function doReg(Request $request)
//    {
////        dd($request->all());
//        $reg = new \App\User;
//        $reg->name = $request->name;
//        $reg->password = md5($request->password);
//        $reg->save();
////        return Auth::guard('reg');
//        dump($reg);
//
//    }
}
