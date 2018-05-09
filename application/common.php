<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * $msg 待提示的消息
 * $url 待跳转的链接
 * $icon 这里主要有两个，5和6，代表两种表情（哭和笑）
 * $time 弹出维持时间（单位秒）
 */
function alert_success($msg='',$time){
    $str='<script type="text/javascript" src="__STATIC__/index/lib/jquery/1.9.1/jquery.min.js"></script> <script type="text/javascript" src="__STATIC__/index/lib/layer/2.4/layer.js"></script>';//加载jquery和layer
    $str.='<script>
    $(function(){
      layer.msg("'.$msg.'",{icon:"6",time:'.($time*1000).'});
    });
  </script>';//主要方法
    return $str;
}