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
                        $_SESSION['id']=$result[0]['id'];
                        session('id',$result[0]['id']);
                        session('username',$result[0]['username']);
                        session('identity',$result[0]['identity']);

                        foreach ($result as $key){
                                $identity[]=$key['identity'];
                            }
                    //进行密码验证
                    if ($result[0]['password'] == $data['password']) {
                        $this->success('登陆成功',url('login/loginSuccess',['identity'=>$identity]));
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
        $many=count($data['identity']);
        //未读的消息条数
        $res=model('sendmessage')->where(['to'=>session('id'),'status'=>1])->select();
        return $this->fetch('',[
            'identity'=>$identity,
            'change'=>$data['identity'],
            'many'=>count($data['identity']),
            'unreadNum'=>count($res),
        ]);
    }

    //欢迎界面的
    public function welcome(){
        //初始化老师，学生，管理员三种不同的信息
        $identity=session('identity');
        //学生的初始化信息
        if ($identity==1){
            $unreadmessWhere=[
                'to'=>session('id'),
                'status'=>1
            ];
            $readmessWhere=[
                'to'=>session('id'),
                'status'=>0
            ];
            //初始化消息信息
            $unreadmessage = model('sendmessage')->where($unreadmessWhere)->select();
            $readmessage = model('sendmessage')->where($readmessWhere)->select();

            //初始化任务信息
            //管理员一共发布的任务
            $adminform = model('adminform')->select();
            //已经处理的任务
            $progressform = model('form')->where(['s_id'=>session('id')])->select();
            //待处理的任务数
            $pending=count($adminform)-count($progressform);

            //初始化审批进度信息
            //结束的任务
            $endTask=model('findteacher')->where(['s_id'=>session('id'),'end'=>0])->select();

            //未结束的任务
            $Task=model('findteacher')->where(['s_id'=>session('id'),'end'=>1])->select();

            //系统公告
            $annNums=model('announce')->select();

            //该教师班级人数
            return $this->fetch('',[
               'unreadnum'=>count($unreadmessage),
               'readnum'=>count($readmessage),
                'pendingTest'=>$pending,
                'progressTest'=>count($progressform),
                'endTask'=>count($endTask),
                'task'=>count($Task),
                'annNums'=>count($annNums),
            ]);
        }
        //管理员的初始化信息
        if ($identity==0){
        echo 'admin';
        }
        //老师的初始化信息
        if ($identity>1){
            $unreadmessWhere=[
                'to'=>session('id'),
                'status'=>1
            ];
            $readmessWhere=[
                'to'=>session('id'),
                'status'=>0
            ];
            //初始化消息信息
            $unreadmessage = model('sendmessage')->where($unreadmessWhere)->select();
            $readmessage = model('sendmessage')->where($readmessWhere)->select();
            //系统公告
            $annNums=model('announce')->select();

            //我的任务
            $examineNums=model('log')->where(['to'=>session('id'),'status'=>0,'identity'=>session('identity')])->select();
            $unexamineNums=model('log')->where(['to'=>session('id'),'status'=>1,'identity'=>session('identity')])->select();

            $usernum = Db::name('user_student')->where(['b_teacher'=>session('id')])->count();

            return $this->fetch('',[
                'annNums'=>count($annNums),
                'unreadnum'=>count($unreadmessage),
                'readnum'=>count($readmessage),
                'examineNums'=>count($examineNums),
                'unexamineNums'=>count($unexamineNums),
                'user_stu'=>$usernum,
            ]);
        }
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