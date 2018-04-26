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
    /*
     * 上传视频
     */
    public function circleVideo(){

        return $this->fetch('',[
            'Tab'=>'上传视频',
        ]);
    }
    /*
     * 提交视频
     */
    public function subCircleVideo(){
        $circleVideo = input('param.');
        $result = $this->obj->subCircleData($circleVideo);
        if ($result==1){
            return show('','提交成功','1');
        }else{
            return show('','提交失败请联系管理员','0');
        }
    }

    /**
     * 视频列表
     */

    public function circleList(){
        $circleList = $this->obj->paginate(3);
        $userList = [];
        $userData = [];

        foreach ($circleList as $cir) {
            $userList[] = model('user')->where('id','=',$cir['user_id'])->select();
        }

        //三维数组降到二维
        foreach ($userList as $user){
            $userData [] = $user[0];
        }

        return $this->fetch('',[
            'Tab'=>'视频列表',
            'circleList'=>$circleList,
            'userData'=>$userData
        ]);
    }
}