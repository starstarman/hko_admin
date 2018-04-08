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
}