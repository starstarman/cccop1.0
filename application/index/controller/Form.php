<?php
namespace app\index\controller;
use think\Controller;

class Form extends Controller
{
    public function formManage()
    {
        $test=model('form')->select();
        return $this->fetch('',[
            'test'=>$test
        ]);
    }

    public function createForm()
    {
        return $this->fetch();
    }

    public function formSubmit(){
        //获取提交表单的内容
        $data=input('param.');
        $content=[
            'form_content'=>$data['content'],
            'form_id'=>1
        ];
        model('form')->save($content);
    }
}