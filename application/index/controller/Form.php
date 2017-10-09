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
            'id'=>'',
            'html'=>$data['html'],
            'user_1'=>$data['user_1'],
            'user_2'=>$data['user_2'],
            'user_3'=>$data['user_3'],
            'user_4'=>$data['user_4'],
            'user_5'=>$data['user_5'],
            'user_6'=>$data['user_6'],
            'user_7'=>$data['user_7'],
        ];
        model('Adminform')->save($content);
    }
}