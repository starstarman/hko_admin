<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/18
 * Time: 18:33
 */

namespace app\index\model;


use think\Model;

class User extends Model
{
    /**
     *用户列表
     */
    public function getUserList(){
        return $this->order('viplevel asc')->paginate(11);
    }

    /**
     * 用户权限变更
     */
    public function idenChange($identityData){
        $result = $this->save(['viplevel'=>$identityData['viplevel']],['id'=>$identityData['id']]);
        return $result;
    }

    /**
     * 设置密码
     */
    public function pwdChange($passwordData){
        $result = $this->save(['password'=>$passwordData['password']],['id'=>$passwordData['id']]);
        return $result;
    }
}