<?php 
require_once 'include.php';
$id=$_REQUEST['id'];
$link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
$sql="select * from user where id='$id'";
$row=fetchOne($sql, $link);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>编辑用户</h3>
<form action="doUserAction.php?act=editUser&&id=<?php echo $row['id'];?>" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="right">用户名称</td>
		<td><input type="text" name="user_name" value="<?php echo $row['user_name'];?>"/></td>
	</tr>
	<tr>
		<td align="right">用户密码</td>
		<td><input type="password" name="pass_word" value="<?php echo $row['pass_word'];?>"/></td>
	</tr>
	<tr>
		<td align="right">用户手机号</td>
		<td><input type="text" name="phone" value="<?php echo $row['phone'];?>"/></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit"  value="确认修改"/></td>
	</tr>
	<?php 
	mysqli_close($link);
	?>
</table>
</form>
</body>
</html>
