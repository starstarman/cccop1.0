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
        $form=Db::name('adminform')->paginate(15);
        for ($i=0;$i<sizeof($form);$i++){
            if (intval(time())-$form[$i]['end_time']>0){
                $form[$i]['status'] = true;
            }
            else{
                $form[$i]['status'] = false;
            }
            $form[$i]['start_time'] = date("Y-m-d H:i",$form[$i]['start_time']);
            $form[$i]['end_time'] = date("Y-m-d H:i",$form[$i]['end_time']);
        }
        return $this->fetch('',[
            'data'=>$form
        ]);
    }

    /**
     * 删除表单
     */
    public function del(){
        $data = input('param.');
        $content =[
            'id'=>$data['id'],
        ];
        $res = model('adminform')->where('id',$content['id'])->delete();
        if ($res){
            return show(1);
        }
    }

    /**
     * 流程创建
     */
    public function createFlow(){
        $data=input('param.');
        print_r($data);
        if ($data['double']==0){
            Cache::set('singleflow',$data['singleflow'],3600);
            Cache::set('double',$data['double'],3600);
        }else{
            Cache::set('singleflow',$data['singleflow'],3600);
            Cache::set('coupleflow',$data['coupleflow'],3600);
            Cache::set('double',$data['double'],3600);
        }

    }

    public function modifyHtml(){
        $data=input('param.');
//        return $data;
        Cache::set('html',$data['html'],3600);
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
        $double=Cache::get('double');
        if ($double==0){
            $flow=Cache::get('singleflow');
            //处理流程
            $flows=array_splice($flow,1);
            $flows=implode(",",$flows);
            $data=input('param.');
            $data['start_time'] =strtotime($data['start_time']);
            $data['end_time'] =strtotime($data['end_time']);
            $content=[
                'id'=>'',
                'formName'=>$data['formName'],
                'html'=>$data['html'],
                'single'=>$flows,
                'start_time'=>$data['start_time'],
                'end_time'=>$data['end_time'],
            ];
            model('Adminform')->save($content);
        }else{
          //双流程定义
            $single=Cache::get('singleflow');
            $couple=Cache::get('coupleflow');
            $single=array_splice($single,1);
            $couple=array_splice($couple,1);
            $single=implode(",",$single);
            $couple=implode(",",$couple);
            $data=input('param.');
            $data['start_time'] =strtotime($data['start_time']);
            $data['end_time'] =strtotime($data['end_time']);
            $content=[
                'id'=>'',
                'formName'=>$data['formName'],
                'html'=>$data['html'],
                'single'=>$single,
                'couple'=>$couple,
                'double'=>$double,
                'start_time'=>$data['start_time'],
                'end_time'=>$data['end_time'],
            ];

            model('Adminform')->save($content);
        }

    }

    /**
     *  实习审批表查看表单   查询管理员建的表单
     */
    public function studentShowFrom(){
        $data=model('Adminform')->paginate(15);
        $dddd= $data;
        for ($i=0;$i<sizeof($data);$i++){
            if (intval(time())-$dddd[$i]['end_time']>0){
                $dddd[$i]['status'] = true;
            }
            else{
                $dddd[$i]['status'] = false;
            }
            $dddd[$i]['start_time'] = date("Y-m-d H:i",$dddd[$i]['start_time']);
            $dddd[$i]['end_time'] = date("Y-m-d H:i",$dddd[$i]['end_time']);
        }
        return $this->fetch('',[
            'formData'=>$dddd,
        ]);
    }

    /**
     * 学生点击表单进入的详情表
     */
    public function formDetail(){

        //首先获得是哪张表
        $s_id=session('id');
        $f_id=$_GET['f_id'];
        $result=model('User')->where(['id'=>$s_id])->select();
        //在获取学生的id
        $s_id=session('id');
        //去总表查询是否有表单   如果没有去管理员表单填写
        $data=[
            'f_id'=>$f_id,
            's_id'=>$s_id,
        ];
        $data=model('Form')->where($data)->select();
        if (!empty($data)){

        }else{
            $data=model('Adminform')->where('id',$f_id)->select();
        }

        return $this->fetch('',[
            'f_id'=>$f_id,
            'html'=>$data[0]['html'],
            'identity'=>'user_'.$result[0]['identity'],
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
        $single=model('Adminform')->where('id',$data['f_id'])->column('single','single');
        $couple=model('Adminform')->where('id',$data['f_id'])->column('couple','couple');
        //在findTeacher里表示单双流程
        $status=model('Adminform')->where('id',$data['f_id'])->column('double','double');
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
            'single'=>$single[0],
            'couple'=>$couple[0],
            'name_str'=>$data['name_str'],
            'status'=>$status[0]
            ])->allowField(true)->save();

    }

    /**
     * 学生提交填写完的表单做第一次转发
     * @param $f_id 表单Id
     */
    public function studentSub($f_id){
        $data=input('param.');
        $s_id=session('id');
        //将所需要的数据存入总Form
        $formData=[
            'f_id'=>$f_id,
            's_id'=>$s_id,
            'html'=>$data['html'],
            'formName'=>$data['formName'],
        ];
        //添加之前判断一下是否之前添加过 如果添加过就更新这条数据,并删除log内容
        $addStatus=model('form')->where(['s_id'=>session('id'),'f_id'=>$f_id])->select();
        if ($addStatus){
            model('form')->isUpdate(true)->allowField(true)->save($formData);
            model('log')->where(['s_id'=>session('id'),'f_id'=>$f_id])->delete();
        }
       model('form')->allowField(true)->save($formData);

        //找到第一个转发的对象
        $where=[
            'f_id'=>$f_id,
            's_id'=>$s_id,
        ];
        $result=model('findteacher')->where($where)->find();
        if (count(explode(',',$result['single']))==$result['total']){
            //单流程的逻辑
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
                'identity'=>$single[0],
                'status'=>1
            ];
            $result=model('log')->save($data);
        }else{
            //双流成的逻辑
            $single=explode(',',$result['single']);
            $couple=explode(',',$result['couple']);
            $identity1='f'.$single[0];
            $identity2='f'.$couple[0];

            //转发两次
            $data= [
                ['s_id'=>$s_id, 'f_id'=>$f_id, 'from'=>$s_id,  'to'  =>$result[$identity1],'identity'=>$single[0], 'status'=>1],
                ['s_id'=>$s_id, 'f_id'=>$f_id, 'from'=>$s_id,  'to'  =>$result[$identity2],'identity'=>$couple[0], 'status'=>1]
            ];
            model('log')->saveAll($data);
        }

    }


    /**
     * 老师查看审批表
     */
    public function formshow(){
        $id=session('id');
        $identity=session('identity');
        $result=Db::view('user','id,username')
            ->view('log','s_id,status,to,identity','log.s_id=user.id')
            ->view('adminform','id,formName,start_time,end_time','log.f_id=adminform.id')
            ->where('status','=',1)
            ->where('to','=',$id)
            ->where('identity','=',$identity)
            ->select();

            for ($i=0;$i<sizeof($result);$i++){
                if (intval(time())-$result[$i]['end_time']>0){
                    $result[$i]['status'] = true;
                }
                else{
                    $result[$i]['status'] = false;
                }
                $result[$i]['start_time'] = date("Y-m-d H:i",$result[$i]['start_time']);
                $result[$i]['end_time'] = date("Y-m-d H:i",$result[$i]['end_time']);
            }

        return $this->fetch('',[
            'data'=>$result
        ]);
    }

    /**
     *
     * 审批管理已审批内容
     */
    public function unformshow(){
        $id=session('id');
        $identity=session('identity');
        $result=Db::view('user','id,username')
            ->view('log','s_id,status,to,identity','log.s_id=user.id')
            ->view('adminform','id,formName,start_time,end_time','log.f_id=adminform.id')
            ->where('status','=',0)
            ->where('to','=',$id)
            ->where('identity','=',$identity)
            ->select();

        return $this->fetch('',[
            'data'=>$result
        ]);
    }

    /**
     * 进入审批流程
     */
    public function spflow(){
        $data=input('param.');
        $res=model('user')->where(['id'=>$data['s_id']])->select();
        $result=model('form')->where($data)->select();
        return $this->fetch('',[
            'html'=>$result[0]['html'],
            'f_id'=>$result[0]['f_id'],
            's_id'=>$result[0]['s_id'],
            'formName'=>$result[0]['formName'],
            'from'=>session('id'),
            'fromUsername'=>session('username'),
            'username'=>$res[0]['username'],
            'identity'=>'user_'.session('identity'),
        ]);
    }

    /**
     *  查看已审批
     */
    public function unspflow(){
        $data=input('param.');
        $res=model('user')->where(['id'=>$data['s_id']])->select();
        $result=model('form')->where($data)->select();
        return $this->fetch('',[
            'html'=>$result[0]['html'],
            'f_id'=>$result[0]['f_id'],
            's_id'=>$result[0]['s_id'],
            'formName'=>$result[0]['formName'],
            'from'=>session('id'),
            'fromUsername'=>session('username'),
            'username'=>$res[0]['username'],
            'identity'=>'user_'.session('identity'),
        ]);
    }
    /**
     * 老师向学生的表单中添加数据
     */
    public function addForm(){
        $data=input('param.');
        $user = model('Form');
// save方法第二个参数为更新条件
         $status=$user->save([
            'html'  => $data['html'],
        ],['s_id' => $data['s_id'],'f_id'=>$data['f_id']]);

        return show($status);
    }

    /**
     * 给下个人进行转发
     */
    public function relay(){
        $data=input('param.');
        $s_id=$data['s_id'];
        $f_id=$data['f_id'];

        $whereData=[
            's_id'=>$s_id,
            'f_id'=>$f_id
        ];
        //判断回复的人是属于单流程的还是双流程的
//
        $id= session('id');
//        $identity=model('user')->where(['id'=>$id])->column('identity');
//        print_r($identity);
        //找到findTeacher里的所有数据
        $find=model('Findteacher')->where($whereData)->select();
        //把identity转化成字符串类型
//        settype($identity[0],"string");
         $identity=session('identity');
        //单流程或者双流程参数设置
       $y1=strpos($find[0]['couple'], $identity)!==false;

       $y2=strpos($find[0]['single'], $identity)!==false;

        //设置需要的参数
       if ($y1){
           $liucheng='couple';
           $tag='flows';
       }
       if ($y2){
           $liucheng='single';
           $tag='flow';
       }
            //如果转发到最后一位，直接给该学生的表单增加数据否则继续转发
            $sin=model('Findteacher')->where($whereData)->value($liucheng);
            $sin=explode(',',$sin);
            $fl=model('Findteacher')->where($whereData)->value($tag);
            if ($fl+1==count($sin)){
                $resData=[
                    's_id'=>$s_id,
                    'f_id'=>$f_id,
                    'to'=>session('id')
                ];
                model('Log')->where($resData)->update(['status'=>0]);
                if ($find[0]['status']==0){
                    model('Findteacher')->where($whereData)->update(['end'=>0]);
                }else{
                    if ($find[0]['end']==1){
                        model('Findteacher')->where($whereData)->update(['end'=>3]);
                    }else{
                        model('Findteacher')->where($whereData)->update(['end'=>2]);
                    }
                }

            }else{
                //首先找到findTeacher这个表里面的顺序，然后根据flow进行标记，然后找到标记的人的ID，然后在向log中添加数据
                $result=model('Findteacher')->where($whereData)->select();
                $flow=$result[0][$tag];
                $single=explode(',',$result[0][$liucheng]);
                $next=$result[0]['f'.$single[$flow+1]];
                //向log添加数据
                $saveData=[
                    's_id'=>$s_id,
                    'f_id'=>$f_id,
                    'from'=>session('id'),
                    'to'=>$next,
                    'identity'=>$single[$flow+1],
                    'status'=>1
                ];
                $res=model('Log')->save($saveData);
                //如果数据添加成功把log中该操作用户的状态调为0
                if ($res=1){
                    $wheData=[
                        's_id'=>$s_id,
                        'f_id'=>$f_id,
                        'to'=>session('id'),
                        'identity'=>session('identity')
                    ];
                    model('Log')->where($wheData)->update(['status'=>0]);
                    model('Findteacher')->where($whereData)->update([$tag=>$flow+1]);
                }
            }

    }
    public function qianzi(){

        $data=input('param.');
        return $this->fetch('',[
            'num'=>$data['num']
        ]);

    }

    public function selectTeacher(){
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

        $where=[
            'f_id'=>$data['f_id'],
            's_id'=>session('id')
        ];
        $name_str=model('findteacher')->where($where)->column('name_str');
        $name=explode(',',$name_str[0]);
        $name = array_filter($name);

        return $this->fetch('',[
            'f_id'=>$data['f_id'],
            'flow'=>$flow,
            'identity'=>$identity,
            'name'=>$name
        ]);
    }
    public function judge($f_id){
        $s_id=session('id');
        $where=[
            'f_id'=>$f_id,
            's_id'=>$s_id
        ];
        $result=model('findteacher')->where($where)->select();
        if (!empty($result)){
            return show('1','已选择');
        }else{
            return show('0','没选择');
        }
    }

    public function deleteteacher(){
        $data=input('param.');
        $where=[
            'f_id'=>$data['f_id'],
            's_id'=>session('id')
        ];
        $status=model('findteacher')->where($where)->delete();
    }

    /**
     * @return mixed设置表单样式
     */
    public function preview(){
        $data=input('param.');
        return $this->fetch('', [
            'html'=>$data['data_po']
        ]);
    }

    /**
     * 驳回信息
     */
    public function sendMessage(){
        $data=input('param.');
        return $this->fetch('',[
            'username'=>$data['username'],
            'f_id'=>$data['f_id'],
            's_id'=>$data['s_id'],
            'from'=>$data['from'],
            'fromUsername'=>$data['fromUsername'],
            'formName'=>$data['formName']
        ]);
    }

    /**
     * 返回信息提交
     */
    public function message(){
        $data=input('param.');
        $saveData=[
            'from'=>$data['from'],
            'to'=>$data['s_id'],
            'content'=>$data['content'],
            'fromUsername'=>$data['fromUsername'],
            'formName'=>$data['formName'],
            'status'=>1
        ];
        model('sendmessage')->save($saveData);
        return show(1,'OK');
    }

    /**
     * 已读信息
     */
    public function readMessage(){
        $mesInfo=Db::name('sendmessage')->where(['to'=>session('id'),'status'=>0])->paginate(15);
        return $this->fetch('',[
            'mesInfo'=>$mesInfo
        ]);
    }

    /**
     * 未读信息
     */
    public function unreadMessage(){
        $mesInfo=model('sendmessage')->where(['to'=>session('id'),'status'=>1])->paginate(15);
        return $this->fetch('',[
            'mesInfo'=>$mesInfo
        ]);
    }

    /**
     * 查看消息
     */
    public function showMessage(){
        $data=input('param.');
        $mes_data=model('sendmessage')->where(['id'=>$data['mes_id']])->select();
                  model('sendmessage')->save(['status'=>0],['id'=>$data['mes_id']]);
        return $this->fetch('',[
           'fromUsername'=>$mes_data[0]['fromUsername'],
           'formName'=>$mes_data[0]['formName'],
            'content'=>$mes_data[0]['content'],
            'to'=>$mes_data[0]['from'],
            'from'=>session('id'),

        ]);
    }

    /**
     * 删除消息
     */
    public function delmess(){
        $data=input('param.');
        $res=model('sendmessage')->where(['id'=>$data['id']])->delete();
        if ($res){
            return show(1);
        }
    }
    /**
     * 回复消息
     */
    public function relayMessage(){
        $data=input('param.');
        $save=[
          'formName'=>$data['formName'],
            'from'=>$data['from'],
            'fromUsername'=>session('username'),
            'to'=>$data['to'],
            'content'=>$data['content'],
            'status'=>1
        ];
        model('sendmessage')->save($save);
        return show(1,'OK');
    }
    /**
     * 审批进度查询
     */

    //要先判断一下form表里有没有数据 如果没有说明没有进行提交 不能显示在审批进度里
    public function progress(){
        //查询审批进度
        $f_id=model('form')->where(['s_id'=>session('id')])->column('f_id');
        $formData=model('findteacher')->where(['s_id'=>session('id')])->where('f_id','in',$f_id)->paginate(15);
            foreach ($formData as $key=>$val){
                //单流程
                if ($val['status']==0){
                    $name=explode(',',$val['name_str']);
                    $formData[$key]['name']=$name[$val['flow']];
                    if ($val['end']==0){
                        $formData[$key]['name']='无';
                    }
                }else {
                    //双流程
                    $single=explode(',',$val['single']);
                    $people1='f'.$single[$val['flow']];
                    $username1=model('user')->where(['id'=>$val[$people1]])->column('username');

                    $couple=explode(',',$val['couple']);
                    $people2='f'.$couple[$val['flows']];
                    $username2=model('user')->where(['id'=>$val[$people2]])->column('username');
                    $formData[$key]['name']=$username1[0].','.$username2[0];
                    if ($val['end']==2){
                        $formData[$key]['name']='无';
                    }
                }
                //送adminform查的其他信息

                $formDatas=model('adminform')->where(['id'=>$val['f_id']])->paginate(15);
                $formData[$key]['formName']=$formDatas['0']['formName'];
                $formData[$key]['start_time']=$formDatas['0']['start_time'];
                $formData[$key]['end_time']=$formDatas['0']['end_time'];

            }
         return  $this->fetch('',[
            'formData'=>$formData
         ]);
    }

    public function user_detail_select()
    {
        $data=input('param.');
        $res = Db::name('user_student')->where('id',$data['data_po'])->select();

        if ($res){
            return [
                'data'=>'true'
            ];
        }
        else{
            return [
                'data'=>'false'
            ];
        }

    }

    public function select_stu_detail()
    {
        $data = input('param.');
        $res = Db::name('user_student')->where('b_teacher',$data['id'])->select();
        return $this->fetch('',[
            'user_stu'=>$res,
        ]);
    }

}
