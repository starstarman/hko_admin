<?php
namespace app\index\controller;
use think\Controller;
class Login extends Controller{
    public function login(){
        return $this->fetch();
    }
    public function loginSuccess(){
       return $this->fetch();
    }
    public function tablelist(){
        return $this->fetch();
    }
}