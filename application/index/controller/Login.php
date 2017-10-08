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
            if (!captcha_check($data['verifycode'])) {
                $this->error('验证码正确');
            } else {

            $value = $data['username'];
            $username = $data['username'];
            if ($value == '学生') {
                $result = Db::query("select * from cop_student WHERE username = '$username'");
                foreach ($result as $ret) {
                }
                if (!$ret == 1) {
                    return '该用户不存在！';
                }
                if ($data['password'] == $ret['password']) {
                    return $this->success('登录成功', url('login/loginSuccess'));
                } else {
                    return '密码错误';
                }
            } else if ($value == '老师') {
                $result = Db::query("select * from cop_teacher WHERE username = '$username'");
                foreach ($result as $ret2) {
                }
                if (!$ret2 == 2) {
                    return '该用户不存在！';
                }
                if ($data['password'] == $ret2['password']) {
                    return $this->success('登录成功', url('login/loginSuccess'));
                } else {
                    return '密码错误';
                }
            } elseif ($value == '管理员') {
                $result = Db::query("select * from cop_manage WHERE username = '$username'");
                foreach ($result as $ret3) {
                }
                if (!$ret3 == 3) {
                    return '该用户不存在！';
                }
                if ($data['password'] == $ret3['password']) {
                    return $this->success('登录成功', url('login/loginSuccess'));
                } else {
                    return '密码错误';
                }
            } else {
                return '该用户不合法！';
            }
        }
//            if(!captcha_check($data['verifycode'])) {
//                //校验失败
//                $this->error('验证码不正确');
//            }exit;
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