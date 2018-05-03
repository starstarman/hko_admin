<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/5/2
 * Time: 20:03
 */

namespace app\index\controller;


use think\Controller;

class Newscomment extends Controller
{
    private $obj ;
    protected function _initialize()
    {
       $this->obj = model('Newcomment');
    }

    public function newsCommentsList(){
        $newsCommentsList = $this->obj->getNewCommentsList();
        return $this->fetch('',[
            'Tab'=>'资讯评论',
            'list'=>$newsCommentsList
        ]);
    }

    /**
     * 上线
     */
    public function release(){
        $newCommentStatus = input('param.');
        $releaseData = [
            'status'  =>$newCommentStatus['status']
        ];
        $res =$this->obj->save($releaseData,['id'=>$newCommentStatus['id']]);

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
        $newCommentStatus = input('param.');
        $underData = [
            'status'  =>$newCommentStatus['status']
        ];
        $res = $this->obj->save($underData,['id'=>$newCommentStatus['id']]);

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
        $newCommentStatus = input('param.');
        $underData = [
            'status'  =>$newCommentStatus['status']
        ];
        $res = $this->obj->save($underData,['id'=>$newCommentStatus['id']]);

        if ($res ==1){
            return show('','删除成功',1);
        }else{
            return show('','删除失败请联系工作人员',0);
        }

    }
}