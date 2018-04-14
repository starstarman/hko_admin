<?php
namespace app\index\controller;
use think\Controller;
class Login extends Controller{
    public function login(){
        return $this->fetch('',[
            'Tab'=>false,
        ]);
    }
    public function loginSuccess(){
        return $this->fetch('',[
            'Tab'=>false,
        ]);
    }
    public function tablelist(){
        $data=input('param.');
        return $this->fetch('',[
            'Tab'=>$data['Tab'],
        ]);
    }
}