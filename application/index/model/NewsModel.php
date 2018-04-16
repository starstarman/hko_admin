<?php
namespace app\index\model;
use think\Db;
use think\Model;

class NewsModel extends Model
{
    public function getCommentList(){
        $data = Db::table('newcomment')->order('time','desc')->select();
        return $data;
    }
    public function getOneComment($id){
        $data = Db::table('newcomment')->where('id',$id)->select();
        return $data;
    }
    public function deleteOneComment($id){
        $data = Db::table('newcomment')->update(['id'=>$id,'status'=>-1]);
        return $data;
    }
    public function deletesomeComment($ids){
        $data = Db::table('newcomment')->where($ids)->select();
        $ids =array();
        for($i=0;$i<count($data);$i++){
            $ids[$i] = $data[$i]['id'];
        }
//        $da = array();
//        for($i =0;$i<count($data);$i++){
//            $da[$i] = Db::table('commentmanage')->where('id',$data[$i]['id'])->update('status',-1);
//        }
        return $ids;
    }
}