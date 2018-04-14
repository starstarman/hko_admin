<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/6
 * Time: 19:58
 */

namespace app\index\controller;


use think\Controller;

class article extends Controller
{
    public function articleList(){

        return $this->fetch('',[
            'Tab'=>'文章列表'
        ]);

    }

    public function articleAdd(){

        return $this->fetch('',[
            'Tab'=>'新增文章'
        ]);
    }

    public function articleSub(){
        $article = input('param.');

        $articledata=[
          'content'=>$article['content'],
          'title'=>$article['title'],
          'time'=>$article['time'],
          'headimage'=>$article['headimage'],
          'kindof'=>$article['kindof']
        ];
        $res= model('News')->save($articledata);

        if ($res ==1){
            return show('','添加成功',1);
        }else{
            return show('','添加失败请联系工作人员',0);
        }
    }
}