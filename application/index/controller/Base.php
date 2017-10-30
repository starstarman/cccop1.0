<?php
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    //public $login;
    public function index(){
        return $this->fetch();
    }
    /*public function _initialize()
    {
        //判断用户是否登陆
        $isLogin = $this->isLogin();
        if(!$isLogin)
        {
            return $this->redirect(url('login/login'));
        }
    }
    public function isLogin()
    {
        $user=$this->getLoginUser();
        if($user && $user->id)
        {
            return true;
        }
        return false;
    }
    public function getLoginUser()
    {
        if($this->login){
            $this->login = session('login','','index');
        }
        return $this->login;
    }*/
}