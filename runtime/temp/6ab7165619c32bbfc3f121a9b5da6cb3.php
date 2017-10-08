<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\php\Apache24\htdocs\lll\public/../application/index\view\login\login.html";i:1506849902;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>系统登录</title>
    <link href="__STATIC__/index/index/css/login.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />
    <link href="__STATIC__/index/index/css/demo.css" rel="stylesheet" rev="stylesheet" type="text/css" media="all" />


    <script>
        $(function(){

            $(".i-text").focus(function(){
                $(this).addClass('h-light');
            });

            $(".i-text").focusout(function(){
                $(this).removeClass('h-light');
            });

            $("#username").focus(function(){
                var username = $(this).val();
                if(username=='输入账号'){
                    $(this).val('');
                }
            });

            $("#username").focusout(function(){
                var username = $(this).val();
                if(username==''){
                    $(this).val('输入账号');
                }
            });


            $("#password").focus(function(){
                var username = $(this).val();
                if(username=='输入密码'){
                    $(this).val('');
                }
            });


            $("#yzm").focus(function(){
                var username = $(this).val();
                if(username=='输入验证码'){
                    $(this).val('');
                }
            });

            $("#yzm").focusout(function(){
                var username = $(this).val();
                if(username==''){
                    $(this).val('输入验证码');
                }
            });



            $(".registerform").Validform({
                tiptype:function(msg,o,cssctl){
                    var objtip=$(".error-box");
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                },
                ajaxPost:true
            });

        });




    </script>


</head>

<body>


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
            <form class="registerform" action="<?php echo url('login/check'); ?>" method="post">
                <div class="fm-item">
                    <label for="logonId" class="form-label">系统登录：</label>
                    <input type="text" name="username" value="" id="username" class="i-text"/>
                    <!--<input type="username" value="输入账号" maxlength="100" id="username" class="i-text" ajaxurl="demo/valid.jsp"  datatype="s6-18" errormsg="用户名至少2个字符,最多18个字符！"  >-->
                    <div class="ui-form-explain"></div>
                </div>

                <div class="fm-item">
                    <label for="logonId" class="form-label">登录密码：</label>
                    <input type="password" name="password" id="password" class="i-text"/>
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
                    <input type="submit" value="" class="btn-login"/>
                    <div class="ui-form-explain"></div>
                </div>

            </form>

        </div>

    </div>

    <div class="bd">
        <ul>
            <li style="background:url(/static/new/themes/theme-pic1.jpg) #CCE1F3 center 0 no-repeat;"></li>
        </ul>
    </div>
</div>

<div class="banner-shadow"></div>

<div class="footer">
    <p>Copyright &copy; 2017.Company name All rights reserved 黑龙江科技大学</p>
</div>
<div style="display:none"><script src='http://v7.cnzz.com/stat.php?id=155540&web_id=155540' language='JavaScript' charset='gb2312'></script></div>
</body>
</html>
