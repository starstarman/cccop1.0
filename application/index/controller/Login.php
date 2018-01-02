<?php
namespace app\index\controller;
use think\Session;
use think\Db;
use app\index\model\User;
class Login extends Base
{
    public function login()
    {
        return $this->fetch();
    }
   ///登录验证
    public function check()
    {
        if (request()->isPost()) {
            $data = input('post.');
          /* $ret =  model('user')->gidet([''=>$data['id']]);
           if(!$ret)
           {
               $this->error('该用户不存在');
           }
           if($ret->password != $data['password'])
           {
               $this->error('密码不正确');
           }

           return $this->success('登陆成功','login/loginSuccess');*/
            //进行验证码验证
            //if (!captcha_check($data['verifycode'])) {
              //  $this->error('验证码不正确');
            //} else {
                //$username = $data['username'];

                $id = $data['id'];
                //$identity = $data['identity'];
                //根据姓名获取登陆者的信息
                $result = Db::query("select * from cop_user WHERE id = '$id'");
                session('login',$result,'index');
                //$_SESSION['identity'] = $data['identity'];
                //$_SESSION['username'] = $data['username'];

                if ($result) {
                        $_SESSION['username']=$result[0]['username'];
                        $_SESSION['identity']=$result[0]['identity'];
                        session('id',$result[0]['id']);
                        session('username',$result[0]['username']);
                        session('identity',$result[0]['identity']);

                        foreach ($result as $key){
                                $identity[]=$key['identity'];
                            }
                    //进行密码验证
                    if ($result[0]['password'] == $data['password']) {
                        $this->success('',url('login/loginSuccess',['identity'=>$identity]));

                    } else {
                        return $this->error('密码不正确！');
                    }
                } else {
                    return $this->error('该用户不存在');
                }
            }
        }
    //}
    //登录成功后进行跳转
    public function loginSuccess(){
        $data=input('param.');
        for($i=0;$i<count($data['identity']);$i++){
            //将接收到的数据进行转换
            switch ($data['identity'][$i]){
                case '2':
                    $identity[$i]='班主任';
                    break;
                case '3':
                    $identity[$i]='导员';
                    break;
                case '4':
                    $identity[$i]='书记';
                    break;
                case '5':
                    $identity[$i]='指导教师';
                    break;
                case '6':
                    $identity[$i]='系主任';
                    break;
                case '7':
                    $identity[$i]='院长';
                    break;
                case '':
                    $identity[$i]='';
                    break;
            }
        }
        return $this->fetch('',[
            'identity'=>$identity,
            'change'=>$data['identity'],
            'many'=>count($data['identity'])
        ]);
    }

    //欢迎界面的
    public function welcome(){
        return $this->fetch();

    }
    public function logout()
    {
        Session::start();
        //清空session
        Session::destroy();
        //Session::set('username','null','index');
        //session('null','index');
        //跳转
        $this->redirect('login/login');
    }

        public function change(){
        $data=input('param.');
        print_r($data);
        session('identity',$data['identity']);
        $_SESSION['identity']=$data['identity'];
        return show('1');
    }
}