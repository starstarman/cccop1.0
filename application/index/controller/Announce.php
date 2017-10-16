<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

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

    public function add(){
        if(!request()->isPost()) {
            $this->error('请求错误');
        }
        //获取表单的值
        $data=input('post.');
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
            return $this->success('新增成功','announce/ann_list');
        }else{
            return $this->error('新增失败','announce/ann_list');
        }

    }
    //公告编辑前的读取
    public function ann_edit(){
        return $this->fetch();
//        {:url('ann_edit',array('id'=>$vo.id))}
//        $id = 9;
//        $ann = $this->obj->getAnnounceElemenById1($id);
//        return $this->fetch('',[
//            'ann'=>$ann,
//        ]);
    }

    //公告的编辑功能
    public function edit(){
        echo 'neng';exit();
        echo 'nengxing ';exit();
        $data=input('post.');
        $content = [
            'ann_title'=>$data['articletitle'],
            'ann_type'=>$data['articletype'],
            'ann_author'=>$data['author'],
            'ann_comment'=>$data['content'],
        ];
        $res = Db::name('announce')->update($content);
        if ($res){
            return $this->success('修改成功','announce/ann_list');
        }else{
            return $this->error('修改失败','announce/ann_list');
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
}