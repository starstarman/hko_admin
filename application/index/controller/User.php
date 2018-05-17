<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/5/3
 * Time: 14:48
 */

namespace app\index\controller;


use think\Controller;

class User extends Controller
{
    private $obj;

    public function _initialize()
    {
        $this->obj = model('user');
    }
    /*
     * 用户列表
     */
    public function userList(){
        $userList = $this->obj->getUserList();
        return $this->fetch('',[
           'Tab'=>'用户列表',
            'list'=>$userList,
            'num'=>0
        ]);
    }

    /*
     * 用户搜索列表
     */
    public function userSelectList(){
        $user_id = input('param.');
        $userList = $this->obj->where(['id'=>$user_id['id']])->select();
        return $this->fetch('userList',[
            'Tab'=>'用户列表',
            'list'=>$userList,
            'num'=>1
        ]);
    }

    /**
     * 权限变更
     */
    public function identityChange(){
        $identityData = input('param.');
        $res = $this->obj->idenChange($identityData);
        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }
    }

    /**
     * 禁言时间
     */

    public function banTime(){
        $timeData = input('param.');
        $timeData['time'] = date("Y-m-d h:i");
        //判断用户是否存在
        $res = $this->obj->isUser($timeData['user_id']);
        //如果存在更新 不存在插入
        if ($res==1){
            //不存在
            $result = model('disablesendmsg')->save($timeData);
            if ($result ==1){
                return show('','禁言成功',1);
            }else{
                return show('','禁言成功失败请联系工作人员',0);
            }
        }else{
            $result = model('disablesendmsg')->save(['minutes'=>$timeData['minutes']],['user_id'=>$timeData['user_id']]);
            if ($result ==1){
                return show('','禁言成功',1);
            }else{
                return show('','禁言成功失败请联系工作人员',0);
            }
        }
    }
    /**
     * 设置密码
     */
    public function changePassword(){
        $passwordData = input('param.');
        $res = $this->obj->pwdChange($passwordData);
        if ($res ==1){
            return show('','设置成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }
    }

    public function selectUser(){
        $userData = input('param.');
        $res = $this->obj->selUser($userData['user_id']);
        if (!empty($res)){
            return show('','',$res);
        }else{
            return show('','没找到改用户',0);
        }
    }
}
