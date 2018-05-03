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
       $time = date("Y-m-d h:i");

        return $this->fetch('',[
            'Tab'=>'上传视频',
            'time'=>$time
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
     * 修改并提交
     */
    public function updateCircleVideo(){
        $circleVideo = input('param.');
        $result = $this->obj->updateCircleData($circleVideo);
        if ($result==1){
            return show('','修改成功','1');
        }else{
            return show('','提交失败请联系管理员','0');
        }
    }
    /**
     * 视频列表
     */

    public function circleList(){
        $circleList = $this->obj->where('status','<>',-2)->where('status','<>',-1)->order('status asc,time desc')->paginate(6);
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

    /**
     * 发布视频
     */
    public function release(){
        $circleStatus = input('param.');
        $releaseData = [
            'status'  =>$circleStatus['status']
        ];
        $res = model('Article')->save($releaseData,['id'=>$circleStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员'.$circleStatus['id'].'aaa',0);
        }

    }

    /**
     * 下线视频
     */
    public function under(){
        $circleStatus = input('param.');
        $underData = [
            'status'  =>$circleStatus['status']
        ];
        $res = model('Article')->save($underData,['id'=>$circleStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }

    }

    /**
     * 删除视频
     */
    public function del(){
        $circleStatus = input('param.');
        $underData = [
            'status'  =>$circleStatus['status']
        ];
        $res = model('Article')->save($underData,['id'=>$circleStatus['id']]);

        if ($res ==1){
            return show('','删除成功',1);
        }else{
            return show('','删除失败请联系工作人员',0);
        }

    }

    /*
     * 视频编辑
     */

    /**
     * 文章编辑
     */

    public function circleVideoEdit(){
        $circleId = input('param.');
        //编辑文章的数据
        $circle= model('Article')->where(['id'=>$circleId['circleId']])->select();

        $cirData= $circle[0];

        return $this->fetch('',[
            'Tab'=>'上传视频',
            'circle'=>$cirData,
        ]);
    }
}