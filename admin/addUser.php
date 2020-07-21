<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>-.-</title>
</head>
<body>
<h3>添加用户</h3>
<form action="doUserAction.php?act=addUser" method="post">
<table width="70%" border="1" cellpadding="5" cellspacing="0" bgcolor="#cccccc">
	<tr>
		<td align="center">用户名称</td>
		<td align="center"><input type="text" name="user_name" placeholder="请输入用户名称"/></td>
	</tr>
	<tr>
		<td align="center">用户密码</td>
		<td align="center"><input type="password" name="pass_word" /></td>
	</tr>
	<tr>
		<td align="center">用户手机号</td>
		<td align="center"><input type="text" name="phone" /></td>
	</tr>
	<tr>
		<td align="center" colspan="2"><input type="submit"  value="添加用户"/></td>
	</tr>

</table>
</form>
</body>
</html>
