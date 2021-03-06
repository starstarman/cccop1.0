<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
class Register extends Controller{
    //用户注册
    public function register(){
        $data=input('param.');
        $id = Db::table('cop_user')->where('id',$data['id'])->find();
        if($id){
            return show($id,'已存在相同用户');
        }   else{
            $user = [
                'id' => $data['id'],
                'username' => $data['username'],
                'password' => $data['id'],
                'state' => 1,
                'identity' => 1
            ];
            $result = model('User')->save($user);
            return show($result, '恭喜你注册成功', $user);
        }
    }
}
