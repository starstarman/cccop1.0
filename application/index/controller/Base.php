<?php
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    //public $login;
    public function index(){
        return $this->fetch();
    }
}