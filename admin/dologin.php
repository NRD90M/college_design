<?php
session_start();
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

$adminName= $_POST['adminName'];
$password = $_POST['password'];
$verify = $_POST['Captcha'];
$verify1 = $_COOKIE['code'];
if ($verify == $verify1) {
    $sql = "select * from admin where adminName='$adminName' and password='$password'";
    $row = fetchOne($sql, $link);
    if ($row) {
        //储存到cookie中,关闭浏览器即清除
        setcookie('adminName',$row['adminName']);
        setcookie('adminId',$row['id']);
        //若选中一周内自动登录则储存到cookie中
        alertMes('登录成功!', "index.php");
    } else {
        alertMes("登录失败，重新登录！", "login.php");
    }
} else {
    alertMes("验证码错误！", "login.php");
}

