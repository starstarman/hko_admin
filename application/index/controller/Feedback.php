<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/21
 * Time: 14:50
 */

namespace app\index\controller;


use think\Controller;

class Feedback extends Controller
{
    private  $obj;
    public function _initialize() {
        $this->obj =model('Feedback');
    }
    /*
     * 反馈列表
     */
    public  function feedbackList(){
        $feedbackList = $this->obj->getFeedbackList();
        return $this->fetch('',[
            'Tab'=>'反馈列表',
            'list'=>$feedbackList
        ]);
    }

    /**
     * 反馈状态更新
     */
    public function feedback_replay_status(){
        $feedback = input('param.');
        $result = $this->obj->changeStatus($feedback['id'],$feedback['status']);
        if ($result==1){
            return show('','回复成功','1');
        }else{
            return show('','数据库更新失败','0');
        }
    }

    /*
     * 删除反馈
     */
    public function feedback_del(){
        $feedback = input('param.');
        $result = $this->obj->changeStatus($feedback['id'],$feedback['status']);
        if ($result==1){
            return show('','删除成功','1');
        }else{
            return show('','删除失败请联系管理员','0');
        }
    }
}
