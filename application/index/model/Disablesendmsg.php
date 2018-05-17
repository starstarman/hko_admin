<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/25
 * Time: 19:30
 */

namespace app\index\model;


use think\Model;
use think\Session;

class Disablesendmsg extends Model
{
    public function isUser($user_id){
        $result = $this->where(['user_id'=>$user_id])->select();
        if (empty($result)){
            return 1;
        }else{
            return 0;
        }
    }
}