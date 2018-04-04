<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\Apache24\htdocs\GitHub\cccop1.0\public/../application/index\view\login\login.html";i:1520750523;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>系统登录</title>
    <link href="__STATIC__/index/index/css/login.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
    <link href="__STATIC__/index/index/css/demo.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
    <style type="text/css">

        body{padding: 0px;margin: 0px;font-size: 12px;font-family: "微软雅黑";}

        /*.link{text-align: right;line-height: 20px;padding-right: 40px;}*/
        /*.link a{*/
            /*cursor: pointer;*/
        /*}*/
        .ui-dialog{
            width: 380px;height: auto;display: none;
            position: absolute;z-index: 9000;
            top: 0px;left: 0px;
            border: 1px solid #D5D5D5;background: #fff;
        }

        .ui-dialog a{text-decoration: none;}

        .ui-dialog-title{
            height: 48px;line-height: 48px; padding:0px 20px;color: #535353;font-size: 16px;
            border-bottom: 1px solid #efefef;background: #f5f5f5;
            font-weight: inherit;
            cursor: move;
            user-select:none;
            text-align: center;
        }
        .ui-dialog-closebutton{
            width: 16px;height: 16px;display: block;
            position: absolute;top: 12px;right: 20px;
            background: url(__STATIC__/new/images/close_def.png) no-repeat;cursor: pointer;

        }
        .ui-dialog-closebutton:hover{background:url(__STATIC__/new/images/close_hov.png);}

        .ui-dialog-content{
            padding: 15px 20px;
        }
        .ui-dialog-pt15{
            padding-top: 15px;
        }
        .ui-dialog-l40{
            height: 40px;line-height: 40px;
            text-align: right;
        }

        .ui-dialog-input{
            width: 100%;height: 40px;
            margin: 0 10px 0 0;padding:5px;
            border: 1px solid #d5d5d5;
            font-size: 16px;color: #c1c1c1;
            text-indent: 25px;
            outline: none;
        }
        .ui-dialog-input-id{
            background: url(__STATIC__/new/images/input_username.jpg) no-repeat 2px ;
            font-weight: normal;
            color: black;
        }
        .ui-dialog-input-id:focus{
            background: url(__STATIC__/new/images/input_username2.jpg) no-repeat 2px ;
            font-weight: normal;
            color: black;
        }
        .ui-dialog-input-username{
            background: url(__STATIC__/new/images/input_username.jpg) no-repeat 2px ;
            font-weight: normal;
            color: black;
        }
        .ui-dialog-input-username:focus{
            background: url(__STATIC__/new/images/input_username2.jpg) no-repeat 2px ;
            font-weight: normal;
            color: black;
        }
        .ui-dialog-submit{
            width: 100%;height: 50px;
            background: url(__STATIC__/new/images/register.png) no-repeat;cursor: pointer;
            border:none;
            font-size: 20px;
            color: #fff;
            outline: none;text-decoration: none;
            display: block;text-align: center;line-height: 50px;

        }
        .ui-dialog-submit:hover{
            background: #ff7945;
        }

        .ui-mask{
            width: 100%;height:100%;background: #000;
            position: absolute;top: 0px;height: 0px;z-index: 2;
            opacity:0.4; filter: Alpha(opacity=40);
        }
</style>
</head>

<body>
<div class="ui-mask" id="mask" onselectstart="return false"></div>
<div class="ui-dialog" id="dialogMove" onselectstart='return false;'>
    <div class="ui-dialog-title" id="dialogDrag"  onselectstart="return false;" >

        注册

        <a class="ui-dialog-closebutton" href="javascript:hideDialog();"></a>

    </div>
    <!--<form name="form1" id="form1" class="registerform" action="<?php echo url('Register/register'); ?>" method="post">-->
    <div class="ui-dialog-content">
        <div class="ui-dialog-l40 ui-dialog-pt15">
            <input class="ui-dialog-input ui-dialog-input-id" id="Rid" name="Rid" type="input" value="" onfocus="javascript:if(this.value=='请输入账号')this.value='';" onblur="javascript:if(this.value=='')this.value='请输入账号';"placeholder="请输入账号" />
        </div>
        <div class="ui-dialog-l40 ui-dialog-pt15">
            <input class="ui-dialog-input ui-dialog-input-username" id="username" name="username" type="input" value="" onfocus="javascript:if(this.value=='请输入用户名') this.value='';" onblur="javascript:if(this.value=='') this.value='请输入用户名';" placeholder="请输入用户名" />
        </div>
        <div class="ui-dialog-l40">
            <a href="#">忘记密码</a>
        </div>
        <div>
            <input class="ui-dialog-submit" id="zhuce" value="注&emsp;册" type="submit" onclick="reg()">
        </div>
        <div class="ui-dialog-l40">
            <a href="<?php echo url('login/login'); ?>">立即登录</a>
        </div>
    </div>
    <!--</form>-->
</div>
<div class="header">
    <h1 class="headerLogo">
        <img alt="logo" src="__STATIC__/new/images/logo.jpg"><img alt="logo" src="__STATIC__/new/images/biaoti.jpg"></h1>
    <div class="headerNav">
        <a target="_blank" href="http://sc.chinaz.com/">开发团队</a>
        <a target="_blank" href="http://sc.chinaz.com/">意见反馈</a>
        <a target="_blank" href="http://sc.chinaz.com/">帮助</a>
    </div>
</div>

<div class="banner">

    <div class="login-aside">
        <div id="o-box-up"></div>
        <div id="o-box-down"  style="table-layout:fixed;">
            <div class="error-box"></div>
            <form name="form1" class="registerform" action="<?php echo url('login/check'); ?>" method="post">
                <div class="fm-item">
                    <label for="logonId" class="form-label" >系统登录：</label>
                    <input type="text" name="id" value="" placeholder="账号不能为空" id="id" title="傻了吧唧" class="i-text" onblur="checkid()" required oninvalid="setCustomValidity('你虎啊！');" oninput="setCustomValidity('');" />
                    <!--<input type="username" value="输入账号" maxlength="100" id="username" class="i-text" ajaxurl="demo/valid.jsp"  datatype="s6-18" errormsg="用户名至少2个字符,最多18个字符！"  >-->
                    <div class="ui-form-explain"></div>
                </div>

                <div class="fm-item">
                    <label for="logonId" class="form-label" >登录密码：</label>
                    <input type="password" name="password" id="password" placeholder="密码不能为空" title="填完了吗" class="i-text" onblur="checkpsd()" required oninvalid="setCustomValidity('哈哈啊哈！');" oninput="setCustomValidity('');"/>
                    <!--<input type="password" value="输入密码" maxlength="100" id="password" class="i-text" datatype="*6-16" nullmsg="请设置密码！" errormsg="密码范围在6~16位之间！">-->
                    <div class="ui-form-explain"></div>
                </div>

                <div class="fm-item pos-r" >
                    <label for="logonId" class="form-label">验证码</label>
                    <input type="text" name="verifycode"  maxlength="100" id="yzm" class="i-text yzm" placeholder="请输入验证码" ><div style="float: right;margin: 0px 89px 0px 3px"><?php echo captcha_img(); ?></div>

                </div>

                <div class="fm-item">
                    <label for="logonId" class="form-label"></label>
                    <!--<input type="submit" value="" tabindex="4" id="send-btn" class="btn-login">-->
                    <input type="submit" value="登&emsp;录" class="btn-login" />
                    <input type="button" value="注&emsp;册" class="btn-register" onclick="showDialog();" />
                    <div class="ui-form-explain"></div>
                    <!--<div class="link">-->
                        <!--<a onclick="showDialog();">登录</a>-->
                    <!--</div>-->



                </div>
                <!--<div class="fm-item eee">-->
                    <!--<label for="logonId" class="form-label"></label>-->
                    <!--&lt;!&ndash;<input type="submit" value="" tabindex="4" id="send-btn" class="btn-login">&ndash;&gt;-->
                    <!--<input value="注&emsp;册" class="btn-register" onclick="showDialog();" />-->
                    <!--&lt;!&ndash;<div class="ui-form-explain"></div>&ndash;&gt;-->
                    <!--&lt;!&ndash;<div class="link">&ndash;&gt;-->
                    <!--&lt;!&ndash;<a onclick="showDialog();">登录</a>&ndash;&gt;-->
                    <!--&lt;!&ndash;</div>&ndash;&gt;-->



                <!--</div>-->
            </form>

        </div>
    </div>

    <div class="bd">
        <ul>
            <li style="background:url(__STATIC__/new/themes/theme-pic1.jpg) #CCE1F3 center 0 no-repeat;"></li>
        </ul>

    </div>

</div>

<div class="banner-shadow"></div>

<div class="footer">
    <p>Copyright &copy; 2017.Company name All rights reserved 黑龙江科技大学</p>
</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
<script type="text/javascript" src="__STATIC__/index/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/index/lib/layer/2.4/layer.js"></script>
<script src="__STATIC__/js/src/jquery.gDialog.js"></script>
<link href="__STATIC__/js/src/normalize.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="__STATIC__/js/src/animate.min.css">
<link rel="stylesheet" href="__STATIC__/js/src/jquery.gDialog.css">
<script type="text/javascript">

    function reg() {
        $("#mask").attr("style","display:none;");
        $("#dialogMove").attr("style","display:none;");
        var id = $('#Rid').val();
        var username = $('#username').val();
        var data = {id:id,username:username};
        $.ajax({
            type:"post",
            url:"<?php echo url('Register/register'); ?>",
            data: data,
            datatype:"json",
            success:function(data){
                layer.alert(data.message,{
                    type:0
                    ,skin: 'layui-layer-rim' //样式类名  自定义样式
                    ,area:['250px','150px']//区域大小
                    ,closeBtn: 0    // 是否显示关闭按钮
                    ,btnAlign: 'c' //按钮居中
                    //,time:4000 //4s后自动关闭
                    ,anim: 1 //动画类型
                    ,title:'注册'//标题输出
                    ,btn: ['返回'] //按钮
                    ,icon: 1    // icon
                    ,yes:function(){
                        window.location.href="<?php echo url('login/login'); ?>";
                    }
                });
            }
        })
    }
    var dialogInstace , onMoveStartId , mousePos = {x:0,y:0};	//	用于记录当前可拖拽的对象
    //	获取元素对象
    function g(id){return document.getElementById(id);}

    //	自动居中元素（el = Element）
    function autoCenter( el ){
        var bodyW = document.documentElement.clientWidth;
        var bodyH = document.documentElement.clientHeight;

        var elW = el.offsetWidth;
        var elH = el.offsetHeight;

        el.style.left = (bodyW-elW)/2 + 'px';
        el.style.top = (bodyH-elH)/2 + 'px';

    }

    //	自动扩展元素到全部显示区域
    function fillToBody( el ){
        el.style.width  = document.documentElement.clientWidth  +'px';
        el.style.height = document.documentElement.clientHeight + 'px';
    }

    //	Dialog实例化的方法
    function Dialog( dragId , moveId ){

        var instace = {} ;

        instace.dragElement  = g(dragId);	//	允许执行 拖拽操作 的元素
        instace.moveElement  = g(moveId);	//	拖拽操作时，移动的元素

        instace.mouseOffsetLeft = 0;			//	拖拽操作时，移动元素的起始 X 点
        instace.mouseOffsetTop = 0;			//	拖拽操作时，移动元素的起始 Y 点

        instace.dragElement.addEventListener('mousedown',function(e){

            var e = e || window.event;

            dialogInstace = instace;
            instace.mouseOffsetLeft = e.pageX - instace.moveElement.offsetLeft ;
            instace.mouseOffsetTop  = e.pageY - instace.moveElement.offsetTop ;

            onMoveStartId = setInterval(onMoveStart,10);
            return false;
            // instace.moveElement.style.zIndex = zIndex ++;
        })

        return instace;
    }

    //	在页面中侦听 鼠标弹起事件
    document.onmouseup = function(e){
        dialogInstace = false;
        clearInterval(onMoveStartId);
    }
    document.onmousemove = function( e ){
        var e = window.event || e;
        mousePos.x = e.clientX;
        mousePos.y = e.clientY;


        e.stopPropagation && e.stopPropagation();
        e.cancelBubble = true;
        e = this.originalEvent;
        e && ( e.preventDefault ? e.preventDefault() : e.returnValue = false );

        document.body.style.MozUserSelect = 'none';
    }

    function onMoveStart(){


        var instace = dialogInstace;
        if (instace) {

            var maxX = document.documentElement.clientWidth -  instace.moveElement.offsetWidth;
            var maxY = document.documentElement.clientHeight - instace.moveElement.offsetHeight ;

            instace.moveElement.style.left = Math.min( Math.max( ( mousePos.x - instace.mouseOffsetLeft) , 0 ) , maxX) + "px";
            instace.moveElement.style.top  = Math.min( Math.max( ( mousePos.y - instace.mouseOffsetTop ) , 0 ) , maxY) + "px";

        }

    }
    //	重新调整对话框的位置和遮罩，并且展现
    function showDialog(){
        //alert('test');
        g('dialogMove').style.display = 'block';
        g('mask').style.display = 'block';
        autoCenter( g('dialogMove') );
        fillToBody( g('mask') );
    }

    //	关闭对话框
    function hideDialog(){
        g('dialogMove').style.display = 'none';
        g('mask').style.display = 'none';
    }

    //	侦听浏览器窗口大小变化
    //window.onresize = showDialog;

    Dialog('dialogDrag','dialogMove');
    //showDialog();


    $(".btn-login").click(function() {
        /*layer.alert('即将进入系统', {
             type: 0
             , skin: 'layui-layer-molv' //样式类名  自定义样式
             , closeBtn: 0    // 是否显示关闭按钮
             , time: 0
             , shift: 1
             , anim: 4 //动画类型
             , title: '小样'//标题输出
             , btn: ['进入', '退出'] //按钮
             , icon: 6    // icon
             , yes: function (index, layero) {
                 window.location.href = 'loginSuccess.html';
                 layer.close(index);
             }
             , btn2: function (index, layero) {
                 window.location.href = 'login.html';
                 layer.close(index);

             }
         });*/
     });
         /*layer.confirm('is not?', function(index){
           window.location.href="loginSuccess.html";

         });
     })*/
        /*$.gDialog.prompt("站长素材", "loginSuccess.html",{
                title: "Prompt Dialog Box",
                required: true,
                animateIn : "rollIn",
                animateOut: "rollOut"
            });
        });*/
    /*$.gDialog.alert("我的小芳在哪里，哈哈哈哈", {
        animateIn: "bounceIn",
        animateOut: "bounceOut"
    });
});*/
//        $.gDialog.confirm("Are you Sure?", {
//            title: "Confirm Dialog Box",
//            animateIn : "bounceInDown",
//            animateOut: "bounceOutUp",
//            buttons: {
//                "Ok": function () {
//                    $(this).dialog('close');
//                },
//                "Cancel": function () {
//                    $(this).dialog('close');
//                }
//            }
//        });
//    });
         /*$(document).ready(function () {
             $(".button-ok").click(function () {
                 var id = $(this).attr("title");
                 var oper = "check";
                 $.ajax({
                     success: function (data) {
                         location.href ='loginSuccess.html';
                     }
                 });
             });*/
         //});
       /* function check1(){
            var id = document.getElementById("id").value;
            if(id ==  null || id == ''){
                alert("用户名不能为空");
                return false;
            }
            return true;
        }
        function check2(){
            var password = document.getElementById("password").value;
            if(password ==  null || password == ''){
                alert("密码不能为空");
                return false;
            }
            return true;
        }*/
    // var zIndex = 9000;


</script>
</body>
</html>

