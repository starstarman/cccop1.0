<?php
namespace app\index\controller;
use think\Controller;

class Announce extends Controller
{
    public function ann_list(){
        return $this->fetch();
    }
    public function ann_add(){
        return $this->fetch();
    }
}