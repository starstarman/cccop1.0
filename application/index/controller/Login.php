<?php
namespace app\index\controller;
use think\Db;
class Login extends Base
{
    public function login()
    {
        return $this->fetch();
    }
    //登录验证
    public function check(){
        if(request()->isPost()) {
            $data = input('post.');

            //进行验证码验证v
            if (!captcha_check($data['verifycode'])) {
                $this->error('验证码不正确');
            } else {
                $username = $data['username'];
                //根据姓名获取登陆者的信息
                $result = Db::query("select * from cop_user WHERE username = '$username'");
                $_SESSION['username']=$data['username'];
                if ($result){
                    foreach ($result as $ret) {
                    }
                session('userinfo',$result,'index');
                    //进行密码验证
                    if ($ret['password']==$data['password']){
                        return $this->success('登录成功！','login/loginSuccess',5);
                    }else{
                        return $this->error('密码不正确！');
                    }
                }
                else{
                    return $this->error('该用户不存在');
                }
            }
        }
    }

    //登录成功后进行跳转
    public function loginSuccess(){
        return $this->fetch();
    }

    //欢迎界面的
    public function welcome(){
        //return $this->fetch();
        return '欢迎来到校企合作';
    }
}