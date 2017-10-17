<?php
namespace app\index\controller;
use think\Controller;

class Form extends Controller
{
    public function formManage()
    {
        $test=model('form')->select();
        return $this->fetch('',[
            'test'=>$test
        ]);
    }

    public function createForm()
    {
        return $this->fetch();
    }

    public function formSubmit(){
        //获取提交表单的内容
        $data=input('param.');
        $content=[
            'id'=>'',
            'formName'=>$data['formName'],
            'html'=>$data['html'],
            'user_1'=>$data['user_1'],
            'user_2'=>$data['user_2'],
            'user_3'=>$data['user_3'],
            'user_4'=>$data['user_4'],
            'user_5'=>$data['user_5'],
            'user_6'=>$data['user_6'],
            'user_7'=>$data['user_7'],
        ];
        model('Adminform')->save($content);
    }

    /**
     *  实习审批表查看表单   查询管理员建的表单
     */
    public function studentShowFrom(){
        $data=model('Adminform')->select();
        return $this->fetch('',[
            'formData'=>$data,
        ]);
    }

    /**
     * 学生点击表单进入的详情表
     */
    public function formDetail(){

            //首先获得是哪张表
            $f_id=$_GET['f_id'];
            model('User')->select();
            //在获取学生的id
            $userinfo=session('userinfo','','index');
            $s_id=$userinfo[0]['id'];
            $identity=$userinfo[0]['identity'];
            //去总表查询是否有表单   如果没有去管理员表单填写
            $data=[
                'f_id'=>$f_id,
                's_id'=>$s_id,
            ];
            $result=model('Form')->where($data)->select();
            if (!empty($result)){
                echo '这里有数据';
            }else{
                $data=model('Adminform')->where('id',$f_id)->select();
            }

        return $this->fetch('',[
                'html'=>$data[0]['html'],
                'identity'=>$identity,
                'user_1'=>$data[0]['user_1'],
                'user_2'=>$data[0]['user_2'],
                'user_3'=>$data[0]['user_3'],
                'user_4'=>$data[0]['user_4'],
                'user_5'=>$data[0]['user_5'],
                'user_6'=>$data[0]['user_6'],
                'user_7'=>$data[0]['user_7'],
        ]);
    }
}