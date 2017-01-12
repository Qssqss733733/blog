<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

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
        $validator = $this->validate($request, [
            'name' => 'required|alpha_num|unique:users,name|between:4,8',
            'password' => 'required|between:4,8|confirmed',
            'password_confirmation' => 'required'
        ],$messages);
        $ret = User::create($request->all());
        $request->session()->flash('resuccess', '注册成功!');
        return redirect('admin/login');
    }

    public function login(){
        return view('admin.login');
    }

    public function doLogin(Request $request){

        $name = $request->get('name');
        $password = $request->get('password');
        if(Auth::attempt(['name'=>$name,'password'=>$password])){
            return redirect('admin/profile');
        }
        $request->session()->flash('loginError','用户名或者密码错误');
        return redirect('admin/login');
    }

    public function profile($user_id = 1){
        $user = User::find($user_id);
        if($user){
            if($user_id == Auth::User()->id){
                return view('admin/profile')->with(['user'=>Auth::User()->toArray()]);
            }else{
                return view('admin/profile')->with(['user'=>$user->toArray()]);
            }
        }
        return redirect('admin/index');
//        return view('admin.profile',['user'=>Auth::user()->toArray()]);
    }

    public function loginId($user_id){
        Auth::logout();
        Auth::loginUsingId($user_id);
        return redirect('admin/profile');
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/index');
    }
}
