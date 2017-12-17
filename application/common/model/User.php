<?php
namespace app\common\model;
use think\Model;

class User extends Model
{
    //查看学生
    public function getUserByIdentify($select_num){
        $data = [
            'identity' =>1,
            'state' =>1
        ];
        $result = $this->where($data)
            ->paginate($select_num);
        return $result;
    }
    //查看教师
    public function getUserByIdentify_t($select_num){
        $result = $this->where('identity<>1 AND state=1')//获取identity不等于1(学生)的用户
            ->paginate($select_num);
        return $result;
    }
    //查看已删除的学生
    public function getDelUser($ide){
        $data = [
            'identity' =>$ide,
            'state' =>0
        ];
        $result = $this->where($data)
            ->select();
        return $result;
    }
    //查看已删除的教师
    public function getDelUser_t(){
        $result = $this->where('identity<>1 AND state=0')//获取identity不等于1(学生)的用户
        ->select();
        return $result;
    }
    //根据用户姓名进行搜索
    public function getUserByName($name){
        $data = [
            'username' =>$name,
        ];
        $result = $this->where($data)
            ->select();
        return $result;
    }
    //计算学生,教师人数
    public function userCount($ident,$state){
        if ($ident==1){
            //查询学生总数
            $data = [
                'identity' =>1,
                'state' =>$state
            ];
            $result = $this->where($data)
                ->count();
        }else{
            //查询教师总数
            $result = $this->where("identity<>1 AND state={$state}")->count();
        }
        return $result;
    }

}