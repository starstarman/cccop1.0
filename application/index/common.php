<?php
//Ajax 回调回去的信息
function show ($status,$message='',$data=[]){
    return[
        'status'=>$status,
        'message'=>$message,
        'data'=>$data
    ];
}