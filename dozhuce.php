<?php
session_start();
require_once 'admin/include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$userName= $_POST['username'];
$password = md5($_POST['password']);
$password_1 = md5($_POST['password_1']);
$phone = $_POST['phone'];
$verify = $_POST['Captcha'];
$verify1 = $_COOKIE['code'];
if (strlen($userName) < 3){
    alertMes("注册失败，用户名太短！", "zhuce.php");
}
if (strlen($phone) < 10 ){
    alertMes("注册失败，手机号异常！", "zhuce.php");
}
//验证两次密码是否相同
if ($password != $password_1){

    alertMes("注册失败，请两次输入相同的密码！", "zhuce.php");
}
//检测验证码
if ($verify == $verify1) {
    $sql_1 = "select user_name from user where user_name='$userName'";
    $row = fetchOne($sql_1, $link);
    if($row){
        alertMes('此用户名已注册，请使用其他用户名!', "zhuce.php");
    }    
    $sql = "INSERT INTO user (user_name,pass_word,phone ) VALUES ('$userName','$password','$phone')";
    mysqli_query($link, $sql);
    $user_id = mysqli_insert_id($link);
    if ($user_id) {
        alertMes('注册成功，请登录!', "login.php");
    } else {
        alertMes("注册失败，请重新注册！", "zhuce.php");
    }
} else {
    alertMes("验证码错误！", "zhuce.php");
}

