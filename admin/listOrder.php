<?php
session_start();
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);
@$disId = $_REQUEST['disId'];
if($disId == 0){
    $_COOKIE['disId'] = 0;
}
if($_COOKIE['disId']){
    $disId = $_COOKIE['disId'];
}
if($_REQUEST['disId']){
    $disId = $_REQUEST['disId'];
}
if ($disId){
    setcookie('disId',$disId);
    $sql="select * from usr_message where user_id='$disId'";
} else {
    $sql="select * from usr_message";
}

$totalRows=getResultNum($sql, $link);//结果集个数
$pageSize=8;//每页显示个数
$totalPage=ceil($totalRows/$pageSize);//总页数
@$page=$_REQUEST['page']?(int)$_REQUEST['page']:1;
if ($page<1||$page==null||!is_numeric($page)){
    $page=1;
}
if ($page>$totalPage){
    $page=$totalPage;
} 
$offset=($page-1)*$pageSize;//取值初始位置
if ($disId){
    $sql="select m_id,message,bot_message,user_name,update_time from usr_message inner join user  on usr_message.user_id = user.id where usr_message.user_id='$disId' limit $offset,$pageSize";
} else{ 
    $sql="select m_id,message,bot_message,user_name,update_time from usr_message inner join user  on usr_message.user_id = user.id limit $offset,$pageSize";
}    
$rows=fetchAll($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
<link rel="stylesheet" href="styles/backstage.css">
</head>
<body>
<div class="">
<!--右侧内容-->
<div class="details">
        <div class="details_operation clearfix">
            <div class="">
                <select name="disId" id="searchSelect"> 
                <?php 
                $sql = "select * from user";
                $disRes = fetchAll($sql, $link);
                foreach ($disRes as $disres){
                    if ($disres['id']==$disId){
                ?>          
                        <option value="<?php echo $disres['id'];?>" selected><?php echo $disres['user_name'];?></option>
              <?php }else{ ?>
                        <option value="<?php echo $disres['id'];?>"><?php echo $disres['user_name'];?></option>
              <?php      }
                }?>
                </select>
                <input type="button" value="搜索" class="add" onclick="Getvaule()";>
            </div> 
        </div>
        <!--表格-->
        <table class="table" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th width="10%">编号</th>
                    <th width="25%">用户消息</th>
                    <th width="40%">机器人回复</th>
                    <th width="10%">用户名称</th>
                    <th width="15%">时间</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($rows as $row){
                ?>
                <tr>
                    <!--这里的id和for里面的c1 需要循环出来-->
                    <td><?php echo $row['m_id'];?></td>
                    <td><?php echo $row['message'];?></td>
                    <td><?php echo $row['bot_message'];?></td>
                    <td><?php echo $row['user_name'];?></td>
                    <td><?php echo $row['update_time'];?></td>
                </tr>
                <?php 
                }
                mysqli_close($link);
                if (count($rows)>$pageSize)
                ?>
                <tr>
                	<td colspan='5'><?php echo showPage($page,$totalPage,'disId='.$_GET['disId'],$step="&nbsp");?></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<script type="text/javascript">
function Getvaule(){
    var url = window.location.href;
    var index = url.indexOf("?", 0);
    if(index>0) {
        url = url.substring(0, index);
    }
    var obj = document.getElementById('searchSelect');
    var val=obj.options[obj.options.selectedIndex].value;

    window.location=url+"?disId="+val+"&page=1";
}
</script>
</html>
