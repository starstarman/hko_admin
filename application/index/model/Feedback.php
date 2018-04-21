<?php
namespace app\index\model;
use think\Db;
use think\Model;

class Feedback extends Model
{
    public function getFeedbackList(){

        return  $this->order('status desc,time desc')->select();
    }
}