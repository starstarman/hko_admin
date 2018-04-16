<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/6
 * Time: 19:58
 */

namespace app\index\controller;


use think\Controller;

class Article extends Controller
{
    public function articleList(){

        //查询所有文章
        $news = model('News')->where('status','<>',-1)->order('status asc,time desc')->paginate(10);

        return $this->fetch('',[
            'Tab'=>'文章列表',
            'news'=>$news
        ]);

    }

    /**
     *新增文章
     */
    public function articleAdd(){


            return $this->fetch('',[
                'Tab'=>'编辑文章'
            ]);
        }



    /**
     * 文章提交
     */
    public function articleSub(){
        $article = input('param.');

        $articledata=[
          'content'=>$article['content'],
          'title'=>$article['title'],
          'time'=>$article['time'],
          'headimage'=>$article['headimage'],
          'kindof'=>$article['kindof'],
            'newhtml'=>$article['newhtml']
        ];
        $res= model('News')->save($articledata);

        if ($res ==1){
            return show('','添加成功',1);
        }else{
            return show('','添加失败请联系工作人员',0);
        }
    }

    /**
     * 文章编辑
     */

    public function articleEdit(){
        $newId = input('param.');
            //编辑文章的数据
            $new= model('News')->where(['id'=>$newId['newId']])->select();
//            print_r($news);
//            print_r($news[0]['title']);
//            die();
            return $this->fetch('',[
                'Tab'=>'编辑文章',
                'new'=>$new
            ]);
    }

    /**
     * 编辑更新文章
     */
    public function articleUpdate(){
        $article = input('param.');

        $articledata=[
            'content'=>$article['content'],
            'title'=>$article['title'],
            'time'=>$article['time'],
            'headimage'=>$article['headimage'],
            'kindof'=>$article['kindof'],
            'newhtml'=>$article['newhtml']
        ];
        $res= model('News')->save($articledata,['id'=>$article['id']]);
        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }
    }

    /**
     * 发布文章
     */
    public function release(){
        $articleStatus = input('param.');
        $releaseData = [
          'status'  =>$articleStatus['status']
        ];
        $res = model('News')->save($releaseData,['id'=>$articleStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员'.$articleStatus['id'].'aaa',0);
        }

    }

    /**
     * 下线文章
     */
    public function under(){
        $articleStatus = input('param.');
        $underData = [
            'status'  =>$articleStatus['status']
        ];
        $res = model('News')->save($underData,['id'=>$articleStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }

    }

    /**
     * 删除文章
     */
    public function del(){
        $articleStatus = input('param.');
        $underData = [
            'status'  =>$articleStatus['status']
        ];
        $res = model('News')->save($underData,['id'=>$articleStatus['id']]);

        if ($res ==1){
            return show('','修改成功',1);
        }else{
            return show('','修改失败请联系工作人员',0);
        }

    }
}