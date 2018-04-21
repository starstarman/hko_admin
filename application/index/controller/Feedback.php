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
}