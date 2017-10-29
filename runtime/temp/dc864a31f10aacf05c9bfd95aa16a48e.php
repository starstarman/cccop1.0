<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"F:\Apache24\htdocs\cccop1.0\public/../application/index\view\form\createform.html";i:1508938817;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>

    <title> Formbuild.leipi.org</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="leipi.org">
    <link href="__STATIC__/css/bootstrap/css/bootstrap.css?2024" rel="stylesheet" type="text/css"/>
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap/css/bootstrap-ie6.css?2024">
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap/css/ie.css?2024">
    <![endif]-->
    <link href="__STATIC__/css/site.css?2024" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">
        var _root = 'http://formbuild/index.php?s=/', _controller = 'index';
    </script>

    <style>

        #components {
            min-height: 600px;
        }

        #target {
            min-height: 200px;
            border: 1px solid #ccc;
            padding: 5px;
        }

        #target .component {
            border: 1px solid #fff;
        }

        #temp {
            width: 500px;
            background: white;
            border: 1px dotted #ccc;
            border-radius: 10px;
        }

        .popover-content form {
            margin: 0 auto;
            width: 213px;
        }

        .popover-content form .btn {
            margin-right: 10px
        }

        #source {
            min-height: 500px;
        }
    </style>
    <!--link href="__STATIC__/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"-->


</head>
<body>

<div class="container">
    <div class="row clearfix">
        <div class="span6">
            <div class="clearfix">
                <h2>我的表单
                    <button class='btn btn-info' id="tijiao" type='submit'>提交</button>
                    <button class='btn btn-info' id="set" type='submit'>设置审批流程</button>
                </h2>
                <hr>
                <div id="build">
                    <form id="target" class="form-horizontal">
                        <fieldset>
                            <div id="legend" class="component" rel="popover" title="编辑属性" trigger="manual"
                                 data-content="
                <form class='form'>
                  <div class='controls'>
                    <label class='control-label'>表单名称</label> <input type='text' id='orgvalue' placeholder='请输入表单名称'>
                    <hr/>
                    <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
                  </div>
                </form>"
                            >
                                <input type="hidden" name="form_name" value="" class="leipiplugins"
                                       leipiplugins="form_name" shibie=""/>
                                <legend class="leipiplugins-orgvalue">点击填写表单名</legend>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <div class="span6">
            <h2>拖拽下面的控件到左侧</h2>
            <hr>
            <div class="tabbable">
                <ul class="nav nav-tabs" id="navtab">
                    <li class="active"><a href="#1" data-toggle="tab">常用控件</a></li>
                </ul>
                <form class="form-horizontal" id="components">
                    <fieldset>
                        <div class="tab-content">

                            <div class="tab-pane active" id="1">

                                <!-- Text start -->
                                <div class="control-group component span4" rel="popover" title="文本框控件" trigger="manual"
                                     data-content="
  <form class='form'>
    <div class='controls'>
      <label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>
      <label class='control-label'>默认值</label> <input type='text' id='orgvalue' placeholder='默认值'>
      <label class='control-label'>可写权限</label>
      <select class='shenfen'>
        <option value=''>请选择</option>
        <option value='user_1'>学生</option>
        <option value='user_2'>班主任</option>
        <option value='user_3'>导员</option>
        <option value='user_4'>书记</option>
        <option value='user_5'>指导教师</option>
        <option value='user_6'>系主任</option>
        <option value='user_7'>院长</option>
      </select>
      <hr/>
      <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
    </div>
  </form>"
                                >
                                    <!-- Text -->
                                    <label class="control-label leipiplugins-orgname">文本框</label>
                                    <div class="controls">
                                        <input name="leipiNewField" type="text" placeholder="默认值" title="文本框" value=""
                                               class="leipiplugins" leipiplugins="text" shenfen=""/>
                                    </div>

                                </div>
                                <!-- Text end -->

                                <!-- Textarea start -->
                                <div class="control-group component span6" rel="popover" title="多行文本控件" trigger="manual"
                                     data-content="
  <form class='form'>
    <div class='controls'>
      <label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>
      <label class='control-label'>默认值</label> <input type='text' id='orgvalue' placeholder='默认值'>
      <label class='control-label'>权限管理</label>
      <select name=''id='orgvalue'>
        <option>学生</option>
        <option>班主任</option>
        <option>导员</option>
        <option>书记</option>
        <option>指导教师</option>
        <option>系主任</option>
        <option>院长</option>
      </select>
      <hr/>
      <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
    </div>
  </form>"
                                >
                                    <!-- Textarea -->
                                    <label class="control-label leipiplugins-orgname">多行文本</label>
                                    <div class="controls">
                                        <div class="textarea">
                                            <textarea title="多行文本" name="leipiNewField" class="leipiplugins"
                                                      leipiplugins="textarea"/> </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="control-group component span6" rel="popover" title="签字控件" trigger="manual"
                                     data-content="
  <form class='form'>
    <div class='controls'>
          <label class='control-label'>可签权限</label>
      <select class='shenfen'>
        <option value=''>请选择</option>
        <option value='user_1'>学生</option>
        <option value='user_2'>班主任</option>
        <option value='user_3'>导员</option>
        <option value='user_4'>书记</option>
        <option value='user_5'>指导教师</option>
        <option value='user_6'>系主任</option>
        <option value='user_7'>院长</option>
      </select>
      <hr/>
      <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
    </div>
  </form>"
                                >
                                    <!-- Textarea -->
                                    <label class="control-label leipiplugins-orgname">签字区域</label>
                                    <div class="controls">
                                        <div class="textarea">
                                            <div name="leipiNewField" shenfen="" class="leipiplugins" leipiplugins="textarea" style="width: 200px; height: 120px;display: block; border: groove"><img width="200" height="120" src="data:image/png;base64,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"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div><!--tab-content-->
        </div><!---tabbable-->
    </div> <!-- row -->

</div> <!-- /container -->


<script type="text/javascript" charset="utf-8" src="__STATIC__/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__STATIC__/js/formbuild/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/js/formbuild/leipi.form.build.core.js"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/js/formbuild/leipi.form.build.plugins.js"></script>
<script type="text/javascript" src="__STATIC__/index/lib/layer/2.4/layer.js"></script>
<script type="text/javascript">

    $(document).ready(function () {

        $('#tijiao').click(function () {
            var user_1='';
            var user_2='';
            var user_3='';
            var user_4='';
            var user_5='';
            var user_6='';
            var user_7='';
//            .control-group .controls .leipiplugins

            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_1")
                    user_1+=index+','
            });

            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_2")
                    user_2+=index+','
            });
            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_3")
                    user_3+=index+','
            });
            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_4")
                    user_4+=index+','
            });
            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_5")
                    user_5+=index+','
            });
            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_6")
                    user_6+=index+','
            });
            $.each($("fieldset").find(".control-group .controls .leipiplugins"),function (index,value) {
                if(value.getAttribute("shenfen")==="user_7")
                    user_7+=index+','
            });

            //var length=$('fieldset').children().length-1;//获取提交的元素个数
            var contents= $('fieldset').html();           //获取整个表单的样式
            var formName=$('input[name="form_name"]').val();
            var  content={
                'html':contents,
                'formName':formName,
                'user_1':user_1,
                'user_2':user_2,
                'user_3':user_3,
                'user_4':user_4,
                'user_5':user_5,
                'user_6':user_6,
                'user_7':user_7,
            };
            var url="<?php echo url('form/formSubmit'); ?>";
            // 抛送http
            $.post(url,content,function (result) {
                //逻辑
//              if(result.code==1){
//                  location.href=result.data;
//              }else{
//                  alert(result.msg);
//              }
            },"json");
        });

        //管理员定义审批流程
        $('#set').click(function () {
            //获取数据
            var str='';
            $("#build").find(".control-group .controls .leipiplugins").each(function (index,data) {
                str += $(this).attr("shenfen")+'/';
            });
            var data_post={
                'data_po':str,
            };
            //抛送逻辑
            var url ="<?php echo url('form/flow'); ?>";
            $.post(url,data_post,function (data) {
                attrbut(data);
            },"json");
            //弹窗
            function attrbut(re) {
                var title = "请设置审批流程";
                var index = layer.open({
                    type: 1,
                    title: title,
                    offset:['10px','400px',],
                    content: re
                });
                layer.style(index, {
                    width: '370px',
                    height:'550px',
                });
                layer(index);
            }
        });

    });
</script>

<!--script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F1e6fd3a46a5046661159c6bf55aad1cf' type='text/javascript'%3E%3C/script%3E"));
</script-->
//占为己有
</body>
</html>