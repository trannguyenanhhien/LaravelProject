<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Signin extends Controller
{
    public function signin(){
        if(isset(Auth::user()->name)){
            return \redirect('/admin/index');
        }else{
            return view('admin.template.signin_template');
        }
    }
    public function Logout(){
        Auth::logout();
        return \redirect('/login');
    }
    public function Login(Request $request,User $model){

        $data = $request->except('_token');
        $user=$model->where('email',$data['email'])->get()->toArray();
        if(Auth::attempt($data)){
            $request->session()->flash('login', 'Đăng nhập thành công');
            return redirect('/admin/index');
        }else{
            $request->session()->flash('fail', 'Đăng nhập thất bại');
            return redirect()->back();
        }
    }
    }

