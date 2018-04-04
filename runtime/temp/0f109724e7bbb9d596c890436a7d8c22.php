<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\Apache24\htdocs\GitHub\cccop1.0\public/../application/index\view\public\error.html";i:1520428632;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
    <style type="text/css">
        *{ padding: 0; margin: 0; }
        body{ background: #fff; font-family: "Microsoft Yahei","Helvetica Neue",Helvetica,Arial,sans-serif; color: #333; font-size: 16px; }
        .system-message{ padding: 24px 48px; }
        .system-message h1{ font-size: 100px; font-weight: normal; line-height: 120px; margin-bottom: 12px; }
        .system-message .jump{ padding-top: 10px; }
        .system-message .jump a{ color: #333; }
        .system-message .success,.system-message .error{ line-height: 1.8em; font-size: 36px; }
        .system-message .detail{ font-size: 12px; line-height: 20px; margin-top: 12px; display: none; }
    </style>
</head>
<body>
<div class="system-message">
    <p class="detail"></p>
    <p class="jump">
        <!--页面自动 --><a id="href" href=""></a><!-- 等待时间： <b id="wait"><?php echo($wait);?></b>-->
    </p>
</div>
<script type="text/javascript" src="__STATIC__/index/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/index/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
    layer.alert('<?php echo (strip_tags($msg))?>', {
        type:0
        ,skin: 'layui-layer-molv' //样式类名  自定义样式
        ,closeBtn: 0    // 是否显示关闭按钮
        ,anim: 4 //动画类型
        ,title:'错误'//标题输出
        ,btn: ['返回'] //按钮
        ,icon: 2    // icon
        ,yes:function(){
            window.location.href="<?php echo($url)?>";
        }
    });

</script>
</body>
</html>