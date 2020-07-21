<?php 
//检查用户登录
function checkuserLogin() {
    if ($_COOKIE['userName'] == '' && $_COOKIE['password'] == ''){
        alertMes("请您登录后再进行使用", "login.php");
    }
}


function logoutUser() {
    $_SESSION=array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(),"",time()-1);
    }
    if (isset($_COOKIE['userId'])){
        setcookie('userId',"",time()-1);
    }
    if (isset($_COOKIE['userName'])){
        setcookie('userName',"",time()-1);
    }
    session_destroy();
    header("location:index.php");
}

function addUser(){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
    $arr=$_POST;
    $_POST['password']=md5($_POST['password']);
    if (insert('user', $arr,$link)){
        $mes="注册成功!</br><a href='index.php'>返回首页</a>";
    }else{
        $mes="注册失败!</br><a href='index.php'>返回首页</a>";
    }
    mysqli_close($link);
    return $mes;
}
/**修改用户
 * @param int $id
 * @return string
 */
function editUser($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB); 
    $arr=$_POST;
    $_POST['password']=md5($_POST['password']);
    if (update('user', $arr,"id='$id'", $link)) {
        $mes="修改成功!</br><a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="修改失败!</br><a href='listuSer.php'>返回用户列表</a>";
    }
    return $mes;
}

/**删除用户
 * @param int $id
 * @return string
 */
function delUser($id){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);   
    if (delete('user', "id='$id'",$link)){
        $mes="删除成功!<br/><a href='listUser.php'>查看用户列表</a>";
    }else{
        $mes="删除失败!<br/><a href='listUser.php' />返回用户列表</a>";
    }
    mysqli_close($link);
    return $mes;
}
?>
