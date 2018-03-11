<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;

class User extends Controller
{
    private  $obj;
    public function _initialize() {
        $this->obj = model("user");
    }

    public function member_student_list(){
        //查看学生
        $data=input('param.');
        if (!empty($data['select_num'])){
            $num=$data['select_num'];
        }else{
            $num = 5;
        }
        $user_student = $this->obj->getUserByIdentify($num);
        //计算学生总数
        $user_num = $this->obj->userCount(1,1);
        return $this->fetch('', [
            'user'=>$user_student,
            'user_num'=>$user_num,
            'select_num2'=>$num
        ]);
    }
    public function member_teacher_list(){
        //查看教师
        $data=input('param.');
        if (!empty($data['select_num'])){
             $num=$data['select_num'];
        }else{
             $num = 5;
        }
        $user_teacher = $this->obj->getUserByIdentify_t($num);
        //计算教师总数
        $user_num = $this->obj->userCount(0,1);

        return $this->fetch('', [
            'user'=>$user_teacher,
            'user_num'=>$user_num,
            'select_num2'=>$num
        ]);
    }
   //根据用户信息进行搜索
    public function search(){
        $data = input('get.');
        $search_user = $this->obj->getUserByName($data['name']);
        if ($data['identity']==1){
            return $this->fetch('member_student_list',[
                'user'=>$search_user,
            ]);
        }else{
            return $this->fetch('member_teacher_list',[
                'user'=>$search_user,
            ]);
        }

    }

    //成员的单删除功能
    public function del(){
        $data = input('param.');
        $content=[
            'state'=>0,
        ];
        $res = Db::name('user')->where('id',$data['id'])->update($content);
        if($res){
            return '已删除';
        }else{
            return '删除失败';
        }
    }

    //成员的批量删除,将选中的成员的state字段修改成0
    public function del_l(){
        $data = input('param.');
        $content=[
            'state'=>0,
        ];
        $res = Db::name('user')->where('id','in',$data['id'])->update($content);
        if($res){
            return '已删除';
        }else{
            return '删除失败';
        }
    }

    public function member_student_del(){
        $data=input('param.');
        if (!empty($data['select_num'])){
            $num=$data['select_num'];
        }else{
            $num = 5;
        }
        $user_student = $this->obj->getDelUser($num);
        $user_num = $this->obj->userCount(1,0);
        return $this->fetch('', [
            'user'=>$user_student,
            'user_num'=>$user_num,
            'select_num2'=>$num
        ]);
    }
    public function member_teacher_del(){
        $data=input('param.');
        if (!empty($data['select_num'])){
            $num=$data['select_num'];
        }else{
            $num = 5;
        }
        $user_teacher = $this->obj->getDelUser_t($num);
        $user_num = $this->obj->userCount(0,0);
        return $this->fetch('', [
            'user'=>$user_teacher,
            'user_num'=>$user_num,
            'select_num2'=>$num
        ]);
    }

    //还原已删除的用户
    public function huanyuan(){
        $data = input('param.');
        $content=[
            'state'=>1,
        ];
        $res = Db::name('user')->where('id',$data['id'])->update($content);
        if($res){
            return '已还原';
        }else{
            return '还原失败';
        }
    }
//[id] => 2015025540 [username] => 刘阔 [sex] => [department] => [major] => [class] => [address] => [mobile] => [qq] => [email] => [wechat] => [b_teacher] => [z_teacher] =>
    //学生个人信息完善
    public function user_stu_info(){
        if (Request::instance()->isPost()){
            $data = input('post.');
            $res = Db::name('user')->where('username',$data['b_teacher'])->select();
            $res2 = Db::name('user')->where('username',$data['z_teacher'])->select();
                $content=[
                    'id'=>$data['id'],
                    'username'=>$data['username'],
                    'sex'=>$data['sex'],
                    'department'=>$data['department'],
                    'major'=>$data['major'],
                    'class'=>$data['class'],
                    'address'=>$data['address'],
                    'mobile'=>$data['mobile'],
                    'qq'=>$data['qq'],
                    'email'=>$data['email'],
                    'wechat'=>$data['wechat'],
                    'b_teacher'=>$res[0]['id'],
                    'z_teacher'=>$res2[0]['id'],
                ];
                $res = Db::name('user_student')->insert($content);
                if ($res){
                    return $this->success('成功','login/welcome');
                }else{
                    return $this->error('新增失败','user/user_stu_info');
                }

        }else{
            return $this->fetch(
            );
        }
    }

    public function user_stu_detail()
    {
        $data = input('post.');
        $res = Db::name('user_student')->where('id',$data['data_po'])->select();
        if ($res){
        }else{
            return $this->fetch(
         );
        }
    }

    public function member_teacher_add()
    {
        if(Request::instance()->isPost()){
            $data=input('post.');
            $allready_arr=$_REQUEST['vehicle'];
            for ($i = 0;$i < count($allready_arr);$i++){
                $content = [
                    'id'=>$data['id'],
                    'username'=>$data['username'],
                    'password'=>$data['id'],
                    'identity'=>$allready_arr[$i],
                    'state'=> 1
                ];
                $res = Db::name('user')->insert($content);
            }
            if ($res){
                return $this->success('新增成功','login/welcome');
            }else{
                return $this->error('新增失败','user/memeber_teacher_add');
            }
        }else{
            return $this->fetch();
        }

    }


}