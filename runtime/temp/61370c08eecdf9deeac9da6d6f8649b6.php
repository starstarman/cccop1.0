<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:91:"D:\Apache24\htdocs\GitHub\cccop1.0\public/../application/index\view\login\loginsuccess.html";i:1522823196;s:86:"D:\Apache24\htdocs\GitHub\cccop1.0\public/../application/index\view\public\header.html";i:1508149305;s:86:"D:\Apache24\htdocs\GitHub\cccop1.0\public/../application/index\view\public\footer.html";i:1510990244;}*/ ?>
<?php use think\Session; Session::start();?>
<!--包含头部文件-->
<?php if($_SESSION['username'] != ''): ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico" >
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="__STATIC__/index/lib/html5shiv.js"></script>
    <script type="text/javascript" src="__STATIC__/index/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/common.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="__STATIC__/index/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>校企协同数字化审批服务平台</title>

</head>

<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="">校企合作</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs"><?php if($_SESSION['identity'] == 0): ?>管理员<?php elseif($_SESSION['identity'] == 1): ?>学生<?php elseif($_SESSION['identity'] == 2): ?>班主任<?php elseif($_SESSION['identity'] == 3): ?>辅导员<?php elseif($_SESSION['identity'] == 4): ?>书记<?php elseif($_SESSION['identity'] == 5): ?>指导教师<?php elseif($_SESSION['identity'] == 6): ?>系主任<?php elseif($_SESSION['identity'] == 7): ?>院长<?php endif; if($many > 1): ?>
                <li class="dropDown dropDown_hover">
                <a class="dropDown_A"style="color: #FFFFFF">切换职位</a>
                   <ul class="dropDown-menu menu radius box-shadow">
                       <?php if(is_array($identity) || $identity instanceof \think\Collection || $identity instanceof \think\Paginator): $i = 0; $__LIST__ = $identity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li><a href="javascript:;" onclick="change('<?php echo $change[$key]; ?>')"><?php echo $vo; ?></a></li>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                     </ul>
                </li>
            <?php endif; ?>
            </span>

            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li class="dropDown dropDown_hover">
                        欢迎你
                    </li>
                    <li class="dropDown dropDown_hover">
                        <a class="dropDown_A"><?php if($_SESSION['username'] == ''): ?>错误<?php else: ?><?php echo $_SESSION['username'];endif; ?><i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="<?php echo url('login/logout'); ?>">退&emsp;&emsp;出</a></li>
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="#" title="只是提示"><span class="badge badge-danger"><?php echo $unreadNum; ?></span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--根据用户的不同将不同的aside进行遍历-->
<aside class="Hui-aside">
    <?php if($_SESSION['identity'] == 0): ?>
    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 审批事项管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('announce/ann_add'); ?>" data-title="审批管理" href="javascript:void(0)">审批管理</a></li>
                    <li><a data-href="<?php echo url('announce/ann_list'); ?>" data-title="公告管理" href="javascript:void(0)">公告管理</a></li>
                    <li><a data-href="<?php echo url('announce/ann_add'); ?>" data-title="发布公告" href="javascript:void(0)">发布公告</a></li>
                </ul>
            </dd>

        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 表单管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('Form/formManage'); ?>" data-title="表单管理" href="javascript:void(0)">表单管理</a></l+i>
                    <li><a data-href="<?php echo url('Form/createForm'); ?>" data-title="新增表单" href="javascript:void(0) " onClick="displaynavbar('.pngfix')">新增表单</a></li>
                </ul>
            </dd>

        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('user/member_student_list'); ?>" data-title="学生列表" href="javascript:;">学生列表</a></li>
                    <li><a data-href="<?php echo url('user/member_student_del'); ?>" data-title="删除的学生" href="javascript:;">删除的学生</a></li>
                    <li><a data-href="<?php echo url('user/member_teacher_list'); ?>" data-title="教师列表" href="javascript:;">教师列表</a></li>
                    <li><a data-href="<?php echo url('user/member_teacher_del'); ?>" data-title="删除的教师" href="javascript:;">删除的教师</a></li>
                    <li><a data-href="<?php echo url('user/member_teacher_add'); ?>" data-title="新增教师" href="javascript:void(0)">新增教师</a></li>
                </ul>
            </dd>
        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 数据管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="" data-title="数据备份" href="javascript:void(0)">数据备份</a></li>
                    <li><a data-href="" data-title="数据恢复" href="javascript:void(0)">数据恢复</a></li>
                </ul>
            </dd>

        </dl>
    </div>
    <?php elseif(($_SESSION['identity'] == 2) OR ($_SESSION['identity'] == 3) OR ($_SESSION['identity'] == 4) OR ($_SESSION['identity'] == 5) OR ($_SESSION['identity'] == 6) OR ($_SESSION['identity'] == 7)): ?>
    <div class="menu_dropdown bk_2">
        <!--<dl id="menu-article">-->
            <!--<dt><i class="Hui-iconfont">&#xe616;</i> 个人信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>-->
            <!--<dd>-->
                <!--<ul>-->
                    <!--<li><a data-href="<?php echo url('user/user_info'); ?>" data-title="个人信息" href="javascript:void(0)">个人信息</a></li>-->
                <!--</ul>-->
            <!--</dd>-->

        <!--</dl>-->

        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 我的消息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('form/readMessage'); ?>" data-title="已读消息" href="javascript:void(0)">已读消息</a></li>
                    <li><a data-href="<?php echo url('form/unreadMessage'); ?>" data-title="未读消息" href="javascript:void(0)">未读消息</a></li>
                </ul>
            </dd>

        </dl>

        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 公告信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('announce/ann_list'); ?>" data-title="查看公告" href="javascript:void(0)">查看公告</a></li>
                </ul>
            </dd>

        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 审批管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('form/formshow'); ?>" data-title="未审批" href="javascript:;">未审批</a></li>
                    <li><a data-href="<?php echo url('form/unformshow'); ?>" data-title="已审批" href="javascript:;">已审批</a></li>
                </ul>
            </dd>
        </dl>
    </div>
    <?php elseif($_SESSION['identity'] == 1): ?>
    <div class="menu_dropdown bk_2">
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 个人信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('user/user_stu_info'); ?>" data-title="个人信息" href="javascript:">个人信息</a></li>
                </ul>
            </dd>

        </dl>

        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 我的消息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('form/readMessage'); ?>" data-title="已读消息" href="javascript:void(0)">已读消息</a></li>
                    <li><a data-href="<?php echo url('form/unreadMessage'); ?>" data-title="未读消息" href="javascript:void(0)">未读消息</a></li>
                </ul>
            </dd>

        </dl>

        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 公告信息<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('announce/ann_list'); ?>" data-title="查看公告" href="javascript:void(0)">查看公告</a></li>
                </ul>
            </dd>

        </dl>
        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i> 实习审批表<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('Form/studentShowFrom'); ?>" data-title="查看表单"  onclick="ifo_detail('请移步至个人信息模块将个人信息完善','<?php echo $_SESSION['id']?>','<?php echo url('user/user_stu_detail'); ?>')" href="javascript:void(0)">查看表单</a></li>
                </ul>
            </dd>

        </dl>
        <dl id="menu-member">
            <dt><i class="Hui-iconfont">&#xe60d;</i> 审批进度管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="<?php echo url('Form/pro gress'); ?>" data-title="审批进度查询" href="javascript:;">审批进度查询</a></li>
                </ul>
            </dd>
        </dl>
    </div>
    <?php endif; ?>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<section class="Hui-article-box">
    <div id="Hui-tabNav" class="Hui-tabNav hidden-xs">
        <div class="Hui-tabNav-wp">
            <ul id="min_title_list" class="acrossTab cl">
                <li class="active">
                    <span title="我的桌面" data-href="welcome.html"> 我 的 桌 面 </span>
                    <em></em></li>
            </ul>
        </div>
        <div class="Hui-tabNav-more btn-group"><a id="js-tabNav-prev" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d4;</i></a><a id="js-tabNav-next" class="btn radius btn-default size-S" href="javascript:;"><i class="Hui-iconfont">&#xe6d7;</i></a></div>
    </div>
    <div id="iframe_box" class="Hui-article">
        <div class="show_iframe">
            <div style="display:none" class="loading"></div>
            <iframe scrolling="yes" frameborder="0" src="<?php echo url('login/welcome'); ?>"></iframe>
        </div>
    </div>
</section>

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
<!--包含头部文件-->

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="__STATIC__/index/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/index/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="__STATIC__/index/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="__STATIC__/index/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

</body>
</html>
<script type="text/javascript" src="__STATIC__/index/lib/jquery.contextmenu/jquery.contextmenu.r2.js"></script>
<script type="text/javascript">
    $(function(){
        /*$("#min_title_list li").contextMenu('Huiadminmenu', {
         bindings: {
         'closethis': function(t) {
         console.log(t);
         if(t.find("i")){
         t.find("i").trigger("click");
         }
         },
         'closeall': function(t) {
         alert('Trigger was '+t.id+'\nAction was Email');
         },
         }
         });*/
    });
    //切换身份
    function change(index) {
        var url="<?php echo url('login/change'); ?>";

        var data={
            'identity':index,
        };

        $.post(url,data,function () {

        });
        location.reload();
    }
    /*个人信息*/
    function myselfinfo(){
        layer.open({
            type: 1,
            area: ['300px','200px'],
            fix: false, //不固定
            maxmin: true,
            shade:0.4,
            title: '查看信息',
            content: '<div>管理员信息</div>'
        });
    /*个人信息*/
    /*function logout() {
        layer.alert('点击确定跳转', function (index) {
            window.location.href = 'login';
        });
    }*/
    // function alert(){
    //     layer.alert('请重新登陆',{
    //         icon:2
    //         ,button:[确定]
    //         ,yes: function (index, layero) {
    //         window.location.href = 'login.html';
    //         layer.close(index);
    //     }
    //     })
    }
    /*资讯-添加*/
    function article_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*图片-添加*/
    function picture_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*产品-添加*/
    function product_add(title,url){
        var index = layer.open({
            type: 2,
            title: title,
            content: url
        });
        layer.full(index);
    }
    /*用户-添加*/
    function member_add(title,url,w,h){
        layer_show(title,url,w,h);
    }

    function ifo_detail(title,user_id,url){
        var data_post={
            'data_po':user_id,
        };
        //抛送逻辑
        var urls ="<?php echo url('user/user_stu_detail'); ?>";
        var primeurl = "<?php echo url('login/loginSuccess'); ?>";
        $.ajax({
            type:"post",
            url:urls,
            data:data_post,
            dataType:"json",
            success:function (msg) {
                revert(msg);
            },
        });
        function revert(msg) {
            if (msg){
                layer.msg(title, {
                    icon: 1,
                    time: 2000 //2秒关闭（如果不配置，默认是3秒）
                }, function(){
                    //do something
                    window.location.replace(primeurl);
                });

            }
        }
    }
</script>

<?php else: header("Location:login.html");exit();endif; ?>