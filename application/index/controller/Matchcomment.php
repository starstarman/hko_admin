<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/5/2
 * Time: 20:03
 */

namespace app\index\controller;


use think\Controller;

class Matchcomment extends Controller
{
    private $obj ;
    protected function _initialize()
    {
       $this->obj = model('gamecomment');
    }

    public function matchcommentslist(){
        $matchCommentList = $this->obj->getMatchCommentList();
        return $this->fetch('',[
            'Tab'=>'赛事评论',
            'list'=>$matchCommentList
        ]);
    }

    /**
     * 上线
     */
    public function release(){
        $matchCommentStatus = input('param.');
        $releaseData = [
            'status'  =>$matchCommentStatus['status']
        ];
        $res =$this->obj->save($releaseData,['id'=>$matchCommentStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }

    }

    /**
     * 下线
     */
    public function under(){
        $matchCommentStatus = input('param.');
        $underData = [
            'status'  =>$matchCommentStatus['status']
        ];
        $res = $this->obj->save($underData,['id'=>$matchCommentStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }

    }

    /**
     * 删除
     */
    public function del(){
        $matchCommentStatus = input('param.');
        $underData = [
            'status'  =>$matchCommentStatus['status']
        ];
        $res = $this->obj->save($underData,['id'=>$matchCommentStatus['id']]);

        if ($res ==1){
            return show('','删除成功',1);
        }else{
            return show('','删除失败请联系工作人员',0);
        }

    }
}