<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/5/2
 * Time: 20:06
 */

namespace app\index\model;


use think\Model;

class Newcomment extends Model
{
    public function getNewCommentsList(){
        return $this->where('status','<>',-1)->order('status asc,time desc')->paginate(11);
    }
}