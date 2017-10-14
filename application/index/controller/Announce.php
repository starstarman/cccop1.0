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
        ];
        $res = Db::name('announce')->insert($content);
        if ($res){
            return $this->success('新增成功','announce/ann_list');
        }else{
            return $this->error('新增失败','announce/ann_list');
        }

    }

    public function ann_edit($id){
        $ann = $this->obj->getAnnounceElemenById1($id);
        return $this->fetch('',[
            'ann'=>$ann,
        ]);
    }

    public function edit(){
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
}