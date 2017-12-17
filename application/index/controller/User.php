<?php
namespace app\index\controller;
use think\Controller;
use think\Db;

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
    public function member_teacher_list1(){
        //获取显示条数
//        $data = input('param.');
//        return $data['select_num'];
        $data=input('param.');
        print_r($data['num']);
        die();
        //查看教师
        $user_teacher = $this->obj->getUserByIdentify_t($data['select_num']);
        //计算教师总数
        $user_num = $this->obj->userCount(0,1);
        return $this->fetch('member_teacher_list', [
            'user'=>$user_teacher,
            'user_num'=>$user_num
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
        $user_student = $this->obj->getDelUser(1);
        $user_num = $this->obj->userCount(1,0);
        return $this->fetch('', [
            'user'=>$user_student,
            'user_num'=>$user_num
        ]);
    }
    public function member_teacher_del(){
        $user_teacher = $this->obj->getDelUser_t();
        $user_num = $this->obj->userCount(0,0);
        return $this->fetch('', [
            'user'=>$user_teacher,
            'user_num'=>$user_num
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
}