﻿<?php 
session_start();
require_once 'admin/include.php';
?>
<!DOCTYPE html>
<html>
<html lang="en" class="no-js">

    <head>

        <meta charset="utf-8">
        <title>智能问答聊天机器人</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/reset.css">
        <link rel="stylesheet" href="assets/css/supersized.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5.js"></script>
        <![endif]-->
		 <script type='text/javascript'> 
        var code ; //在全局定义验证码             
        function createCode(){ 
             code = "";    
             var codeLength = 4;//验证码的长度   
             var checkCode = document.getElementById("code");    
             var random = new Array(0,1,2,3,4,5,6,7,8,9);//随机数   
             for(var i = 0; i < codeLength; i++) {//循环操作   
                var index = Math.floor(Math.random()*10);//取得随机数的索引（0~35）   
                code += random[index];//根据索引取得随机数加到code上   
            }   
            checkCode.value = code;//把code值赋给验证码   
            document.cookie="code=" + code;
        } 
        </script> 

    </head>

    <body>

        <div class="page-container">
            <h1>Login</h1>
            <form action="dologin.php" method="post">
                <input type="text" name="username" class="username" placeholder="请输入您的用户名！">
                <input type="password" name="password" class="password" placeholder="请输入您的用户密码！">
                <input type="Captcha" class="Captcha" name="Captcha" placeholder="请输入验证码！">
				<input type="button" id="code" onclick="createCode()" style="height:40px;width:120px" title='点击更换验证码' /> 
                <button type="submit" class="submit_button">登录</button>
                <button type="button" class="submit_button"><a href="zhuce.php">注册</a></button>
                <div class="error"><span>+</span></div>
            </form>
           
        </div>
		
        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js" ></script>
        <script src="assets/js/supersized.3.2.7.min.js" ></script>
        <script src="assets/js/supersized-init.js" ></script>
        <script src="assets/js/scripts.js" ></script>
    </body>
<div style="text-align:center;">
</div>
</html>

