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
            'list'=>$userList
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
}
