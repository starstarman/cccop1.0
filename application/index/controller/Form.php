<?php
namespace app\index\controller;
use think\Controller;
use think\Cache;
use think\Db;

class Form extends Controller
{
    /**
     * 表单管理
     */
    public function formManage()
    {
        $test=model('form')->select();
        return $this->fetch('',[
            'test'=>$test
        ]);
    }
    /**
     * 流程创建
     */
    public function createFlow(){
        $data=input('param.');
        print_r($data);
        Cache::set('singleflow',$data['singleflow'],3600);
    }
    /**
     * 表单创建
     */
    public function createForm()
    {
//        $data=input('param.');
//        if (!empty($data)){
//            print_r($data);
//            Cache::set('singleflow',$data['test'],3600);
//        }else{
//            return $this->fetch();
//        }
        return $this->fetch();
    }
    /**
     * 表单提交
     */
    public function formSubmit(){
        //获取缓存的流程
        $flow=Cache::get('singleflow');
        //处理流程
        $flows=array_splice($flow,1);
        $flows=implode(",",$flows);
        $data=input('param.');
        print_r($data);
        $content=[
            'id'=>'',
            'formName'=>$data['formName'],
            'html'=>$data['html'],
            'single'=>$flows,
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
            'f_id'=>$f_id,
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

    /**
     * 双流程设置
     */
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

    /**
     * 学生选择老师
     */
    public function findTeacher(){
        $data=input('param.');
        $identity=[];
        $flow = explode('/',$data['data_po']);
        $flow = array_unique($flow);
        $flow = array_filter($flow);
        for($i=0;$i<count($flow);$i++){
            //将接收到的数据进行转换
            switch ($flow[$i]){
                case 'user_2':
                    $flow[$i]='班主任';
                    $identity[$i]=2;
                    break;
                case 'user_3':
                    $flow[$i]='导员';
                    $identity[$i]=3;
                    break;
                case 'user_4':
                    $flow[$i]='书记';
                    $identity[$i]=4;
                    break;
                case 'user_5':
                    $flow[$i]='指导教师';
                    $identity[$i]=5;
                    break;
                case 'user_6':
                    $flow[$i]='系主任';
                    $identity[$i]=6;
                    break;
                case 'user_7':
                    $flow[$i]='院长';
                    $identity[$i]=7;
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
            'f_id'=>$data['f_id'],
            'flow'=>$flow,
            'identity'=>$identity
        ]);
    }

    /**
     * 根据identity去查找老师
     */
    public function selectIdentity(){
        $data=input('param.');
        $identity=$data['identity'];
        $result=model('User')->where('identity',$identity)->select();
        if ($result){
            return show('1','success',$result);
        }
    }

    /**
     * 提交选择的老师
     */
    public function subTeacher(){
        $data=input('param.');
        //获取s_id
        $data['s_id']=session('id');
        //处理字段和数据
        $id=explode(',',$data['id_str']);
        $ident=explode(',',$data['ident_str']);
        $id = array_filter($id);
        $ident = array_filter($ident);
        $form=model('Adminform')->where('id',$data['f_id'])->column('single','single');
        //添加数据  过滤掉没有的字段
        $set=model('findteacher');
        $set->data([
            's_id'=>$data['s_id'],
            'f_id'=>$data['f_id'],
            $ident[0]=>$id[0],
            $ident[1]=>$id[1],
            $ident[2]=>$id[2],
            $ident[3]=>$id[3],
            $ident[4]=>$id[4],
            $ident[5]=>$id[5],
            $ident[6]=>$id[6],
            'total'=>count($id),
            'single'=>$form[0],
            ])->allowField(true)->save();

    }

    /**
     * 学生提交填写完的表单做第一次转发
     * @param $f_id 表单Id
     */
    public function studentSub($f_id){
        $data=input('param.');
        print_r($data);
        die();
        $s_id=session('id');
        $where=[
            'f_id'=>$f_id,
            's_id'=>$s_id
        ];
        //找到第一个转发的对象
        $single=model('findteacher')->where($where)->column('single');
        $single=explode(',',$single[0]);
        //拼接查找的字段
        $identity='f'.$single[0];
        //获得转发对象的id
        $identity=model('findteacher')->where($where)->column($identity);
        //开始向log转发
        $data=[
            's_id'=>$s_id,
            'f_id'=>$f_id,
            'from'=>$s_id,
            'to'  =>$identity[0],
            'status'=>1
        ];
        $result=model('log')->save($data);
    }

    /**
     * 老师查看审批表
     */
    public function formshow(){
        $id=session('id');
        $data=model('log')->where('to',$id)->select();
        print_r($data[0]['s_id']);
        die();
        return $this->fetch();
    }
}
