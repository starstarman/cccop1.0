<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:81:"F:\Apache24\htdocs\cccop1.0\public/../application/index\view\form\createform.html";i:1507463092;}*/ ?>

<!DOCTYPE HTML>
<html>
<head>

    <title> Formbuild.leipi.org</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="leipi.org">
    <link href="__STATIC__/css/bootstrap/css/bootstrap.css?2024" rel="stylesheet" type="text/css" />
    <!--[if lte IE 6]>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap/css/bootstrap-ie6.css?2024">
    <![endif]-->
    <!--[if lte IE 7]>
    <link rel="stylesheet" type="text/css" href="__STATIC__/css/bootstrap/css/ie.css?2024">
    <![endif]-->
    <link href="__STATIC__/css/site.css?2024" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var _root='http://formbuild/index.php?s=/',_controller = 'index';
    </script>

    <style>

        #components{
            min-height: 600px;
        }
        #target{
            min-height: 200px;
            border: 1px solid #ccc;
            padding: 5px;
        }
        #target .component{
            border: 1px solid #fff;
        }
        #temp{
            width: 500px;
            background: white;
            border: 1px dotted #ccc;
            border-radius: 10px;
        }

        .popover-content form {
            margin: 0 auto;
            width: 213px;
        }
        .popover-content form .btn{
            margin-right: 10px
        }
        #source{
            min-height: 500px;
        }
    </style>
    <!--link href="__STATIC__/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"-->


</head>
<body>

<div class="container">
    <h1>test</h1>
    <div class="row clearfix">
        <div class="span6">
            <div class="clearfix">
                <h2>我的表单<button class='btn btn-info' id="tijiao" type='submit'>提交</button></h2>
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
                                <input type="hidden" name="form_name" value="" class="leipiplugins" leipiplugins="form_name"/>
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
      <hr/>
      <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
    </div>
  </form>"
                                >
                                    <!-- Text -->
                                    <label class="control-label leipiplugins-orgname">文本框</label>
                                    <div class="controls">
                                        <input name="leipiNewField" type="text" placeholder="默认值" title="文本框" value="" class="leipiplugins" leipiplugins="text"/>
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
      <hr/>
      <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
    </div>
  </form>"
                                >
                                    <!-- Textarea -->
                                    <label class="control-label leipiplugins-orgname">多行文本</label>
                                    <div class="controls">
                                        <div class="textarea">
                                            <textarea title="多行文本" name="leipiNewField" class="leipiplugins" leipiplugins="textarea"/> </textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Textarea end -->

                                <!-- Select start -->
                                <!--<div class="control-group component" rel="popover" title="下拉控件" trigger="manual"-->
                                <!--data-content="-->
                                <!--<form class='form'>-->
                                <!--<div class='controls'>-->
                                <!--<label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>-->
                                <!--<label class='control-label'>下拉选项</label>-->
                                <!--<textarea style='min-height: 200px' id='orgvalue'></textarea>-->
                                <!--<p class='help-block'>一行一个选项</p>-->
                                <!--<hr/>-->
                                <!--<button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>-->
                                <!--</div>-->
                                <!--</form>"-->
                                <!--&gt;-->
                                <!--&lt;!&ndash; Select &ndash;&gt;-->
                                <!--<label class="control-label leipiplugins-orgname">下拉菜单</label>-->
                                <!--<div class="controls">-->
                                <!--<select name="leipiNewField" title="下拉菜单" class="leipiplugins" leipiplugins="select">-->
                                <!--<option>选项一</option>-->
                                <!--<option>选项二</option>-->
                                <!--<option>选项三</option>-->
                                <!--</select>-->
                                <!--</div>-->

                                <!--</div>-->
                                <!--&lt;!&ndash; Select end &ndash;&gt;-->


                                <!-- Select start -->
                                <!--<div class="control-group component" rel="popover" title="多选下拉控件" trigger="manual"-->
                                <!--data-content="-->
                                <!--<form class='form'>-->
                                <!--<div class='controls'>-->
                                <!--<label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>-->
                                <!--<label class='control-label'>下拉选项</label>-->
                                <!--<textarea style='min-height: 200px' id='orgvalue'></textarea>-->
                                <!--<p class='help-block'>一行一个选项</p>-->
                                <!--<hr/>-->
                                <!--<button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>-->
                                <!--</div>-->
                                <!--</form>"-->
                                <!--&gt;-->
                                <!--&lt;!&ndash; Select &ndash;&gt;-->
                                <!--<label class="control-label leipiplugins-orgname">下拉菜单</label>-->
                                <!--<div class="controls">-->
                                <!--<select multiple="multiple" name="leipiNewField" title="下拉菜单" class="leipiplugins" leipiplugins="select">-->
                                <!--<option>选项一</option>-->
                                <!--<option>选项二</option>-->
                                <!--<option>选项三</option>-->
                                <!--<option>选项四</option>-->
                                <!--</select>-->
                                <!--</div>-->

                                <!--</div>-->
                                <!--&lt;!&ndash; Select end &ndash;&gt;-->


                                <!--&lt;!&ndash; Multiple Checkboxes start &ndash;&gt;-->
                                <!--<div class="control-group component" rel="popover" title="复选控件" trigger="manual"-->
                                <!--data-content="-->
                                <!--<form class='form'>-->
                                <!--<div class='controls'>-->
                                <!--<label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>-->
                                <!--<label class='control-label'>复选框</label>-->
                                <!--<textarea style='min-height: 200px' id='orgvalue'></textarea>-->
                                <!--<p class='help-block'>一行一个选项</p>-->
                                <!--<hr/>-->
                                <!--<button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>-->
                                <!--</div>-->
                                <!--</form>"-->
                                <!--&gt;-->
                                <!--<label class="control-label leipiplugins-orgname">复选框</label>-->
                                <!--<div class="controls leipiplugins-orgvalue">-->
                                <!--&lt;!&ndash; Multiple Checkboxes &ndash;&gt;-->
                                <!--<label class="checkbox inline">-->
                                <!--<input type="checkbox" name="leipiNewField" title="复选框" value="选项1" class="leipiplugins" leipiplugins="checkbox" orginline="inline">-->
                                <!--选项1-->
                                <!--</label>-->
                                <!--<label class="checkbox inline">-->
                                <!--<input type="checkbox" name="leipiNewField" title="复选框" value="选项2" class="leipiplugins" leipiplugins="checkbox" orginline="inline">-->
                                <!--选项2-->
                                <!--</label>-->
                                <!--</div>-->

                                <!--</div>-->

                                <!--<div class="control-group component" rel="popover" title="复选控件" trigger="manual"-->
                                <!--data-content="-->
                                <!--<form class='form'>-->
                                <!--<div class='controls'>-->
                                <!--<label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>-->
                                <!--<label class='control-label'>复选框</label>-->
                                <!--<textarea style='min-height: 200px' id='orgvalue'></textarea>-->
                                <!--<p class='help-block'>一行一个选项</p>-->
                                <!--<hr/>-->
                                <!--<button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>-->
                                <!--</div>-->
                                <!--</form>"-->
                                <!--&gt;-->
                                <!--<label class="control-label leipiplugins-orgname">复选框</label>-->
                                <!--<div class="controls leipiplugins-orgvalue">-->
                                <!--&lt;!&ndash; Multiple Checkboxes &ndash;&gt;-->
                                <!--<label class="checkbox">-->
                                <!--<input type="checkbox" name="leipiNewField" title="复选框" value="选项1" class="leipiplugins" leipiplugins="checkbox">-->
                                <!--选项1-->
                                <!--</label>-->
                                <!--<label class="checkbox">-->
                                <!--<input type="checkbox" name="leipiNewField" title="复选框" value="选项2" class="leipiplugins" leipiplugins="checkbox">-->
                                <!--选项2-->
                                <!--</label>-->
                                <!--</div>-->
                                <!--</div>-->
                                <!--&lt;!&ndash; Multiple Checkboxes end &ndash;&gt;-->

                                <!--&lt;!&ndash; Multiple radios start &ndash;&gt;-->
                                <!--<div class="control-group component" rel="popover" title="单选控件" trigger="manual"-->
                                <!--data-content="-->
                                <!--<form class='form'>-->
                                <!--<div class='controls'>-->
                                <!--<label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>-->
                                <!--<label class='control-label'>单选框</label>-->
                                <!--<textarea style='min-height: 200px' id='orgvalue'></textarea>-->
                                <!--<p class='help-block'>一行一个选项</p>-->
                                <!--<hr/>-->
                                <!--<button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>-->
                                <!--</div>-->
                                <!--</form>"-->
                                <!--&gt;-->
                                <!--<label class="control-label leipiplugins-orgname">单选</label>-->
                                <!--<div class="controls leipiplugins-orgvalue">-->
                                <!--&lt;!&ndash; Multiple Checkboxes &ndash;&gt;-->
                                <!--<label class="radio inline">-->
                                <!--<input type="radio" name="leipiNewField" title="单选框" value="选项1" class="leipiplugins" leipiplugins="radio" orginline="inline">-->
                                <!--选项1-->
                                <!--</label>-->
                                <!--<label class="radio inline">-->
                                <!--<input type="radio" name="leipiNewField" title="单选框" value="选项2" class="leipiplugins" leipiplugins="radio" orginline="inline">-->
                                <!--选项2-->
                                <!--</label>-->
                                <!--</div>-->
                                <!--</div>-->

                                <!--<div class="control-group component" rel="popover" title="单选控件" trigger="manual"-->
                                <!--data-content="-->
                                <!--<form class='form'>-->
                                <!--<div class='controls'>-->
                                <!--<label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>-->
                                <!--<label class='control-label'>单选框</label>-->
                                <!--<textarea style='min-height: 200px' id='orgvalue'></textarea>-->
                                <!--<p class='help-block'>一行一个选项</p>-->
                                <!--<hr/>-->
                                <!--<button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>-->
                                <!--</div>-->
                                <!--</form>"-->
                                <!--&gt;-->
                                <!--<label class="control-label leipiplugins-orgname">单选</label>-->
                                <!--<div class="controls leipiplugins-orgvalue">-->
                                <!--&lt;!&ndash; Multiple Checkboxes &ndash;&gt;-->
                                <!--<label class="radio">-->
                                <!--<input type="radio" name="leipiNewField" title="单选框" value="选项1" class="leipiplugins" leipiplugins="radio">-->
                                <!--选项1-->
                                <!--</label>-->
                                <!--<label class="radio">-->
                                <!--<input type="radio" name="leipiNewField" title="单选框" value="选项2" class="leipiplugins" leipiplugins="radio">-->
                                <!--选项2-->
                                <!--</label>-->
                                <!--</div>-->
                                <!--</div>-->
                                <!--&lt;!&ndash; Multiple radios end &ndash;&gt;-->


                            </div>

                            <div class="tab-pane" id="2">



                                <div class="control-group component" rel="popover" title="文件上传" trigger="manual"
                                     data-content="
                  <form class='form'>
                    <div class='controls'>
                      <label class='control-label'>控件名称</label> <input type='text' id='orgname' placeholder='必填项'>
                      <hr/>
                      <button class='btn btn-info' type='button'>确定</button><button class='btn btn-danger' type='button'>取消</button>
                    </div>
                  </form>"
                                >
                                    <label class="control-label leipiplugins-orgname">文件上传</label>

                                    <!-- File Upload -->
                                    <div>
                                        <input type="file" name="leipiNewField" title="文件上传" class="leipiplugins" leipiplugins="uploadfile">
                                    </div>
                                </div>


                            </div>



                            <div class="tab-pane" id="5">
                                <textarea id="source" class="span6"></textarea>
                            </div>


                    </fieldset>
                </form>
            </div><!--tab-content-->
        </div><!---tabbable-->
    </div> <!-- row -->

</div> <!-- /container -->


<script type="text/javascript" charset="utf-8" src="__STATIC__/js/jquery-1.7.2.min.js?2024"></script>
<script type="text/javascript"  src="__STATIC__/js/formbuild/bootstrap/js/bootstrap.min.js?2024"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/js/formbuild/leipi.form.build.core.js?2024"></script>
<script type="text/javascript" charset="utf-8" src="__STATIC__/js/formbuild/leipi.form.build.plugins.js?2024"></script>
<script type="text/javascript">

    $(document).ready(function (){

        $('#tijiao').click(function () {
            //编写抛送的逻辑
            var length=$('fieldset').children().length-1;//获取提交的元素个数
            var contents= $('fieldset').html();           //获取整个表单的样式
            var formName=$('input[name="form_name"]').val();
            var  content={
                'content':contents,
                'length':length,
                'formName':formName
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

    });
</script>

<!--script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F1e6fd3a46a5046661159c6bf55aad1cf' type='text/javascript'%3E%3C/script%3E"));
</script-->

</body>
</html>