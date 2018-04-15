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
        if($data['number'] == '刘阔' || $data['number'] == '李汝丽'|| $data['number'] == '李超'||$data['number'] == '唐博' || $data['number'] == '董竹杰' || $data['number'] == '岳家伟'){
            if($data['password']!='666666'){
                $this->error('密码错误！');
            }else{
                Session::set('name',$data['number']);
                $this->success('登陆成功！','login/tablelist');
            }
        }else{
            $this->error('用户名错误！','login/login');
        }

    }
    public function tablelist(){
        Session::get('name');
        return $this->fetch('',[
            'Tab'=>'首页'
        ]);

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