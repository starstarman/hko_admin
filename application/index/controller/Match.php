<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

class Match extends Controller{
    private  $obj;
    public function _initialize() {
        $this->obj = model("MatchModel");
    }
    public function match(){
        $list = Db::name('gamecomment')->order('time','desc')->paginate(2);
        $this->assign('list', $list);
        return $this->fetch('',[
            'Tab'=>'赛事评论',
        ]);
    }
    public function status(){
        $data = input('get.');
        //print_r($data);
        //$status = $data['status'];
        $validate = validate('MatchValidate');
        if(!$validate->scene('status')->check($data)){
            $this->error($validate->getError());
        }
        $status = Db::table('gamecomment')->where('id',$data['id'])->update($data);
        //$status = $this->obj->save(['status'=>$data['status']]);
        //print_r($res);
        if($status) {
            $this->success('状态更新成功','match/match','',1);
        }else {
            $this->error('状态更新失败','','',1);
        }
        return $this->fetch('',[
           'Tab' => '赛事评论'
        ]);
    }
    public function commentdetails(){
        $data = input('param.');
        $model = $this->obj->getOneComment($data['id']);
        return $this->fetch('',[
            'Tab'=>'赛事评论',
            'detail'=> $model
        ]);
    }
    public function edit(){
        $data = input('param.');
        $h = Db::table('gamecomment')->where(['id'=>$data['id'],'status'=>-1])->find();
        if($h){
            $this->error('老哥，不能编辑已删除评论','match/match','',1);
        }else{
            $datas = Db::table('gamecomment')->where('id',$data['id'])->select();
            //print_r($datas);
            return $this->fetch('',[
                'Tab' => '赛事评论',
                'datas'=>$datas
            ]);
        }

    }
    public function delete(){
        $data = input('param.');
//        $delete = $data['id'];
        $m = $this->obj->deleteOneComment($data['id']);
        if($m){
            $this->success('删除成功','match/match','','1');
        }else{
            $this->error('删除失败！，请重新处理！','match/match','','1');
        }
    }
    public function somedelete(){
        $data = input('param.');
//        print_r(co unt($data['box']));

        $where = 'id in('.implode(',',$data['box']).')';
        $m = $this->obj->deletesomeComment($where);
        //$datas = array();
        //print_r($m);2
        //$undatas = array();
        for($i=0;$i<count($m);$i++){
            $undatas[$i] = Db::table('gamecomment')->where(['id'=>$m[$i],'status'=>-1])->find();
            if($undatas[$i]){
                $this->error('请查看是否包含已删除的项','match/match');exit();
            }
        }
        for($i=0;$i<count($m);$i++){
            $h[$i] = Db::table('gamecomment')->update(['id'=>$m[$i],'status'=>-1]);
        }
        if($h){
            $this->success('批量删除有效！','match/match','',1);
        }else{
            $this->error('批量删除失败！','match/match','',1);
        }
    }
    public function newsedit(){
        //$id = input('get.');
        $data = input('param.');
        $res = Db::table('gamecomment')->where('id',$data['id'])->update([
            'comment'=>$data['content'],
            'likecount'=>$data['likecount'],
            'author'=>$data['author'],
            'time' =>$data['time']
        ]);
        if ($res){
            return show('','添加成功',1);
        }else{
            return show('','添加失败请联系工作人员',0);
        }
    }
}