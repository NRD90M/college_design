<?php
session_start();
require_once 'admin/include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$userName= $_POST['username'];
$password = md5($_POST['password']);
$verify = $_POST['Captcha'];
$verify1 = $_COOKIE['code'];
//检测验证码
if ($verify == $verify1) {
    $sql = "select user_name,pass_word from user where user_name='$userName' and pass_word='$password'";
    $row = fetchOne($sql, $link);
    if ($row) {
        //储存到cookie中,关闭浏览器即清除
        setcookie('userName',$row['user_name']);
        setcookie('password',$row['pass_word']);
        //若选中一周内自动登录则储存到cookie中
        //if($autoFlag){
        //    setcookie('adminName',$row['adminName'],time()+7*24*3600);
        //    setcookie('adminId',$row['id'],time()+7*24*3600);
        //}       
        alertMes('登录成功!', "index.php");
    } else {
        alertMes("登录失败，重新登录！", "login.php");
    }
} else {
    alertMes("验证码错误！", "login.php");
}

