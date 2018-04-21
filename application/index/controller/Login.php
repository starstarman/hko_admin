<?php
namespace app\index\controller;
use think\Controller;
use think\Session;

class Login extends Controller{
    public function login(){
        return $this->fetch('',[
            'Tab'=>false,
        ]);
    }
    public function loginsuccess(){
        $data = input('param.');
        $name =$data['name'];
        $password = $data['password'];
        $whereData = [
            'name'=>$name,
            'password'=>$password
        ];
        $res = model('User')->where($whereData)->select();
        if (empty($res)){
            return show('0','用户名或者密码不正确');
        }else{
            Session::set('name',$res[0]['name']);
            Session::set('isvip',$res[0]['isvip']);
            Session::set('id',$res[0]['id']);
            Session::set('icon',$res[0]['icon']);
            $loginSuccessUrl = url('login/tablelist');
            return show('1','用户名或者密码不正确',$loginSuccessUrl);
        }
    }
    public function tablelist(){

        Session::get('name');
        if (Session::get('isvip')==1){
            return $this->fetch('',[
                'Tab'=>'首页'
            ]);
        };

        if (Session::get('isvip')==2){
            return $this->fetch('article/articleadd',[
                'Tab'=>'编辑文章'
            ]);
        };


    }


    public function logout()
    {
        Session::start();
        //清空session
        Session::destroy();
        //跳转
        $this->redirect('login/login');
    }
}