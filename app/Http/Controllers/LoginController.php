<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class LoginController extends Controller
{
    //
    public function login(){
    	return view('admin.login');
    }


    public function dologin(Request $request){
    	//提取参数
    	// $data = $request ->all();
    	$data = $request ->except(['_token']);
    	// dd($data);


    	//检测数据是否正确
    	//根据用户名查找用户信息
    	$user = DB::table('user')->where('username',$data['username'])->first();

    	// dd($user);


    	// 判断有没有这个用户

    	if(empty($user)){
           return back()->with('msg','登录失败');
        }


        //校验密码
        if(Hash::check($data['password'],$user->password)){

        	//密码  对比   写入session信息

        	session(['id'=>$user->id]);
        	session(['username'=>$user->username]);


        	//登录成功

        	return redirect('/admin')->with('msg','登录成功');

        }

        return back()->with('msg','登录失败');
   }



}




//