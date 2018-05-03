<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/5/3
 * Time: 14:27
 */

namespace app\index\model;


use think\Model;

class Gamecomment extends Model
{
    public function getMatchCommentList(){
        return $this->where('status','<>',-1)->order('status asc,time desc')->paginate(11);
    }
}