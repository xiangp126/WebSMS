<?php
if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo "<script>alert('抱歉, 用户名和密码不可为空!'); history.go(-1);</script>";
    }
    else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysql_real_escape_string($username);
        $password = mysql_real_escape_string($password);

        @require_once "conn.php";
        $sql = "select password from user where userid = '$username';";
        $result = mysql_query($sql);
        if(!$result) {
            echo "<script>alert('抱歉, 数据库获取密码出现错误，请重试!'); history.go(-1);</script>";
        } else {
            list($_password) = mysql_fetch_array($result);
            $password = sha1($password);
            if ($password == $_password) {
                session_start();
                $_SESSION['login_user'] = $username;
                header("location: indexx.php");
            } else {
                echo "<script>alert('抱歉, 用户名与密码不匹配!'); history.go(-1);</script>";
            }
            mysql_close($conn);
        }
    }
} else {
    @require_once "conn.php";
    session_start();
    $user_check = $_SESSION['login_user'];
    if ($user_check == "") {
        echo "<script>alert('抱歉, 请重新登陆!'); location.href = 'index.php';</script>";
    }
}
?>
