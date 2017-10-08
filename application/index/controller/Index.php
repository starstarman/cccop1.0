<?php
namespace app\index\controller;

class Index extends Base
{
    public function index()
    {
        //return $this->fetch();
        return $this->redirect('login/login', 5, '页面跳转中...');
        //return redirect('index/login', 5, '页面跳转中...');
    }
    public function loginSuccess(){
        return 1;
    }
}
