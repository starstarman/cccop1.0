<?php
namespace app\index\controller;
use think\Cache;
use think\Controller;
use think\Db;
use think\Session;

class Announce extends Controller
{
    private  $obj;
    public function _initialize() {
        $this->obj = model("announce");
    }

    public function ann_list(){
        $ann = $this->obj->getAnnounceElemenById();
        return $this->fetch('',[
            'ann'=>$ann,
        ]);
    }

    public function ann_add(){
        return $this->fetch();
    }
    public function ann_succ(){
        return $this->fetch();
    }
    public function save() {
        if(!request()->isPost()) {
            $this->error('请求失败');
        }
        $data = input('post.');
        if(!empty($data['ann_title']) || !empty($data['ann_type']) || !empty($data['ann_author']) || !empty($data['ann_content'])) {
            return $this->update($data);
        }
        // 把$data 提交model层
        $res = $this->obj->addi($data);
        if($res) {
            $this->success('新增成功');
        }else {
            $this->error('新增失败');
        }
    }
    public function update($data) {
        $res =  $this->obj->save($data, ['id' => intval($data['id'])]);
        if($res) {
            $this->success('更新成功');
        } else {
            $this->error('更新失败');
        }
    }

    public function add(){
        if(!request()->isPost()) {
            $this->error('请求错误');
        }
        //获取表单的值
        $data=input('post.');
        if(!$data['articletitle'] || !$data['articletype'] || !$data['author'] || !$data['content']){
            return $this->error('请你完善信息！','announce/ann_add');
        }else{
            $content=[
                'id'=>'',
                'ann_title'=>$data['articletitle'],
                'ann_type'=>$data['articletype'],
                'ann_author'=>$data['author'],
                'ann_content'=>$data['content'],
                'ann_time'=>date('Y-m-d H:i:s'),
            ];
            $res = Db::name('announce')->insert($content);
            if ($res){
                return $this->success('信息已完善','announce/ann_list');
            }else{
                return $this->error('完善信息失败','announce/ann_add');
            }
        }
    }
    //
    //公告修改前的读取
    public function ann_edit($id){
        //return $this->fetch();
        if(intval($id) < 1 && $id < 0) {
            $this->error('参数不合法','announce/ann_list');
        }
        $data = $this->obj->getAnnounceTitleById($id);
//        print_r($data);exit();
        return $this->fetch('', [
            'data' => $data,
        ]);
    }
    //公告的修改功能
    public function edit(){
        $id = input('get.id');
        $data=input('post.');
        $content = [
            'ann_title'=>$data['articletitle'],
            'ann_type'=>$data['articletype'],
            'ann_author'=>$data['author'],
            'ann_content'=>$data['content'],
        ];
        $res = Db::name('announce')->where('id',$id)->update($content);
        if ($res){
            $this->success('修改成功');//点击确定返回修改界面，需要关闭弹层在刷新方可显示
        }else{
            return $this->error('修改失败');
        }
    }

    //公告的单功能删除
    public function del(){
        $data = input('param.');
        $content=[
            'id'=>$data['id'],
        ];
        $res = Db::name('announce')->delete($content['id']);
    }

    //公告的批量删除
    public function del_l(){
        $data = input('param.');
        $content =[
            'id'=>$data['ids'],
        ];
        $res = Db::name('announce')->delete($content['id']);
    }
//获取了url的id
    public function ann_article(){
        $id = input('get.id');
        if(empty($id)) {
            return $this->error('ID错误');
        }

        $ann = $this->obj->getAnnouncecontentById($id);
        return $this->fetch('',[
            'ann'=>$ann,
        ]);
    }
    public function sel(){
        session::get('announce');
        if($_SESSION['username'] == 'admin'){
            $data = input('param.');
            $content=[
                'id'=>$data['id'],
            ];
            $status = [
                'ann_status' => 1
            ];
            $start = [
                'ann_status' => 0
            ];
            $ref = Db::name('announce')->where('ann_status',1)->update($start);
            if($ref){
                Cache::set('id',$content['id'],0);
                return Db::name('announce')->where('id',$content['id'])->update($status);
            }else{
                $this->error('设置失败');
            }
        }else{
            $this->error('无此权限');
        }

    }
    public function ann_readdetail(){
        $id = Cache::get('id');
        if(empty($id)){
            $this->error("ID不允许为空");
        }
        $ann = $this->obj->getAnnounceTitleById($id);
        return $this->fetch('',[
            'ann'=>$ann,
            'id'=>$id
        ]);
    }
}