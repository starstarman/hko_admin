<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/24
 * Time: 19:50
 */

namespace app\index\controller;


use think\Controller;

class Circle extends Controller
{
    private $obj;
    public function _initialize()
    {
        $this->obj = model('Article');
    }

    public function circleVideo(){

        return $this->fetch('',[
            'Tab'=>'上传视频',
        ]);
    }

    public function subCircleVideo(){
        $circleVideo = input('param.');
        $result = $this->obj->subCircleData($circleVideo);
        if ($result==1){
            return show('','提交成功','1');
        }else{
            return show('','提交失败请联系管理员','0');
        }
    }
}