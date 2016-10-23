<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class AuthController extends AdminBashController
{

    public function toLogin(){

        if ( $this->auth->viaRemember() || $this->auth->check() ){ //记住我
            return $this->loginSuccess();
        }
        return view('user.login');
    }

    public function postLogin(){

        $inputs = $this->request->input();
        $username = $inputs['username'];
        $password = $inputs['password'];
        $remember = $this->request->get('remember');
        if ( $remember ){
            $remember = true;
        }else{
            $remember = false;
        }



        if ( $this->auth->attempt(['username'=>$username,'password'=>$password],$remember ) ){
            return $this->loginSuccess();
        }else{

            $this->setErrorMsg( array_merge( $inputs,['login_error' => '用户名或密码错误']));
            return redirect()->route('admin.to_login');
        }
    }


    public function loginSuccess(){
        return redirect()->route('admin.index');
    }

    public function logout(){
        \Auth::logout();
        return redirect()->route('admin.to_login');
    }


    public function setErrorMsg( array $error_msg ){
        \Session::put( $error_msg );
    }

}
