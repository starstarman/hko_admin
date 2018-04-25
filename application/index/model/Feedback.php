<?php
namespace app\index\model;
use think\Db;
use think\Model;

class Feedback extends Model
{
    public function getFeedbackList(){

        return  $this->where('status','<>',-1)->order('status desc,time desc')->select();
    }
    //状态更新
    public function changeStatus($id,$status){
         $result = $this->save(['status'=>$status],['id'=>$id]);
         return $result;
    }
}