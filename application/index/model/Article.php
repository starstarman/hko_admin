<?php
/**
 * Created by PhpStorm.
 * User: kuo
 * Date: 2018/4/25
 * Time: 19:30
 */

namespace app\index\model;


use think\Model;
use think\Session;

class Article extends Model
{
    public function subCircleData ($circleVideo){
          $result= $this->save([
            'user_id'=>Session::get('id'),
            'videoid'=>$circleVideo['videoid'],
            'videocoverurl'=>$circleVideo['videocoverurl'],
            'playurl'=>$circleVideo['playurl'],
            'text'=>$circleVideo['text'],
            'time'=>$circleVideo['time'],
            'fromdevice'=>$circleVideo['fromdevice'],
            'author'=>$circleVideo['author'],
            'status'=>0
        ]);

          return $result;
    }

    public function updateCircleData($circleVideo){
        $result= $this->save([
            'user_id'=>$circleVideo['user_id'],
            'videoid'=>$circleVideo['videoid'],
            'videocoverurl'=>$circleVideo['videocoverurl'],
            'playurl'=>$circleVideo['playurl'],
            'text'=>$circleVideo['text'],
            'time'=>$circleVideo['time'],
            'fromdevice'=>$circleVideo['fromdevice'],
            'author'=>$circleVideo['author'],
            'status'=>0
        ],['id'=>$circleVideo['id']]);
        return $result;
    }
}