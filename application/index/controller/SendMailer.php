<?php
namespace app\index\controller;
use PHPMailer\SendEmail;

class SendMailer
{
    public function index()
    {

        $result = SendEmail::SendEmail();

    }

}
