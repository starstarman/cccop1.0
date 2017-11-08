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

    /**
     * 审批流程数据接收
     */
    public function flow(){
        $data=input('param.');
        $flow = explode('/',$data['data_po']);
        array_filter($flow);
        for($i=0;$i<count($flow);$i++){
            //将接收到的数据进行转换
            switch ($flow[$i]){
                case 'user_1':
                    $flow[$i]='学生';
                    break;
                case 'user_2':
                    $flow[$i]='班主任';
                    break;
                case 'user_3':
                    $flow[$i]='导员';
                    break;
                case 'user_4':
                    $flow[$i]='书记';
                    break;
                case 'user_5':
                    $flow[$i]='指导教师';
                    break;
                case 'user_6':
                    $flow[$i]='系主任';
                    break;
                case 'user_7':
                    $flow[$i]='院长';
                    break;
                case '':
                    $flow[$i]='';
                    break;
            }
        }
        //清除数组中为空的元素
        $flow = array_filter($flow);
        $flow = array_unique($flow);
        return $this->fetch('',[
            'flow'=>$flow,
        ]);
    }

    //双流程设置
    public function flow_d(){
        $data=input('param.');
        $flow = explode('/',$data['data_po']);
        $flow2 = explode('/',$data['data_po2']);
        array_filter($flow);
        array_filter($flow2);
        //流程1
        for($i=0;$i<count($flow);$i++){
            //将接收到的数据进行转换
            switch ($flow[$i]){
                case 'user_1':
                    $flow[$i]='学生';
                    break;
                case 'user_2':
                    $flow[$i]='班主任';
                    break;
                case 'user_3':
                    $flow[$i]='导员';
                    break;
                case 'user_4':
                    $flow[$i]='书记';
                    break;
                case 'user_5':
                    $flow[$i]='指导教师';
                    break;
                case 'user_6':
                    $flow[$i]='系主任';
                    break;
                case 'user_7':
                    $flow[$i]='院长';
                    break;
                case '':
                    $flow[$i]='';
                    break;
            }
        }
        //清除数组中为空的元素
        $flow = array_filter($flow);
        $flow = array_unique($flow);
        //流程2
        for($i=0;$i<count($flow2);$i++){
            //将接收到的数据进行转换
            switch ($flow2[$i]){
                case 'user_1':
                    $flow2[$i]='学生';
                    break;
                case 'user_2':
                    $flow2[$i]='班主任';
                    break;
                case 'user_3':
                    $flow2[$i]='导员';
                    break;
                case 'user_4':
                    $flow2[$i]='书记';
                    break;
                case 'user_5':
                    $flow2[$i]='指导教师';
                    break;
                case 'user_6':
                    $flow2[$i]='系主任';
                    break;
                case 'user_7':
                    $flow2[$i]='院长';
                    break;
                case '':
                    $flow2[$i]='';
                    break;
            }
        }
        //清除数组中为空的元素
        $flow2 = array_filter($flow2);
        $flow2 = array_unique($flow2);

        return $this->fetch('',[
            'flow'=>$flow,
            'flow2'=>$flow2,
        ]);
    }
}
