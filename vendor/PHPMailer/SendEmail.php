<?php
namespace PHPMailer;
class SendEmail
{
    public static $Host = 'smtp.qq.com'; //smtp服务器
    private static $From = '83170989@qq.com'; //发送者的邮件地址
    private static $FromName = '黑龙江科技大学教务处'; //发送邮件的用户昵称
    private static $Username = '83170989'; //登录到邮箱的用户名
    private static $Password = 'znbnlkbreegsbiae'; //第三方登录的授权码，在邮箱里面设置

    /**
     * @desc 发送普通邮件
     * @param $title 邮件标题
     * @param $message 邮件正文
     * @param $emailAddress 邮件地址
     * @return bool|string 返回是否发送成功qq
     */
    public static function SendEmail($title='停调窜课结果通知',$message='您的窜课申请已经受理，课表已经以附件的形式发送到您的邮箱请您查收！',$emailAddress='83170989@qq.com')
    {
        $mail = new PHPMailer();
        //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
        $mail->SMTPDebug = 1;
        //3.设置属性，告诉我们的服务器，谁跟谁发送邮件
        $mail -> IsSMTP();			//告诉服务器使用smtp协议发送
        $mail -> SMTPAuth = true;		//开启SMTP授权
        $mail -> Host = self::$Host;	//告诉我们的服务器使用163的smtp服务器发送
        $mail -> From = self::$From;	//发送者的邮件地址
        $mail -> FromName = self::$FromName;		//发送邮件的用户昵称
        $mail -> Username = self::$Username;	//登录到邮箱的用户名
        $mail -> Password = self::$Password;	    //第三方登录的授权码，在邮箱里面设置
        //编辑发送的邮件内容
        $mail -> IsHTML(true);		    //发送的内容使用html编写
        $mail -> CharSet = 'utf-8';		//设置发送内容的编码
        $mail -> Subject = $title;//设置邮件的标题
        $mail -> MsgHTML($message);	//发送的邮件内容主体
        $mail -> AddAddress($emailAddress);    //收人的邮件地址
        //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
        $mail -> AddAttachment(ROOT_PATH .'public/static/pic/d.jpg');
        //调用send方法，执行发送
        $result = $mail -> Send();
        if($result){
           return true;
        }else{
            return $mail -> ErrorInfo;
        }
    }
}