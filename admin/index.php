<?php 
require_once 'include.php';
checkLogin();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>

<body>
    <div class="head">
            <h3 class="head_text"><center>智能聊天机器人后台管理系统</center></h3>
    </div>
    <div class="operation_user clearfix">     
        <div class="link fr">
            <b>欢迎您
            <?php echo $_COOKIE['adminName']; ?>           
            </b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="doAdminAction.php?act=logout" class="icon icon_e">退出</a>
        </div>
    </div>
    <div class="content clearfix">
        <div class="main">
            <!--右侧内容-->
            <div class="cont">
                <div class="title">后台管理</div>
      	 		<!-- 嵌套网页开始 -->         
                <iframe src="main.php"  frameborder="0" name="mainFrame" width="100%" height="500"></iframe>
                <!-- 嵌套网页结束 -->   
            </div>
        </div>
        <!--左侧列表-->
        <div class="menu">
            <div class="cont">
                <div class="title">管理员</div>
                <ul class="mList">
                    <li>
                        <h3><span  onclick="show('menu1','change1')" id="change1">+</span>聊天日志</h3>
                        <dl id="menu1" style="display:none;">                            
                            <dd><a href="listOrder.php" target="mainFrame">聊天日志</a></dd>
                        </dl>
                    </li>
                    <li>
                        <h3><span onclick="show('menu2','change2')" id="change2">+</span>用户管理</h3>
                        <dl id="menu2" style="display:none;">
                        	<dd><a href="addAdmin.php" target="mainFrame">添加管理员</a></dd>
                            <dd><a href="listAdmin.php" target="mainFrame">管理员列表</a></dd>
                        	<dd><a href="addUser.php" target="mainFrame">添加用户</a></dd>
                            <dd><a href="listUser.php" target="mainFrame">用户列表</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
    <a href="http://www.beian.miit.gov.cn" target="_blank"><center>陕ICP备19019671号</center></a>
    </div>
    <script type="text/javascript">
    	function show(num,change){
	    		var menu=document.getElementById(num);
	    		var change=document.getElementById(change);
	    		if(change.innerHTML=="+"){
	    				change.innerHTML="-";
	        	}else{
						change.innerHTML="+";
	            }
    		   if(menu.style.display=='none'){
    	             menu.style.display='';
    		    }else{
    		         menu.style.display='none';
    		    }
        }
    </script>
</body>
</html>
