<?php
// If already login, go to indexx.php directly
session_start();
if(isset($_SESSION['login_user'])){
    header("location: indexx.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/login.css" type="text/css" media="screen" title="style.css" charset="utf-8">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>企业工资管理系统</title>
    </head>
    <script src="js/login.js" charset="utf-8"></script>
    <body>
        <div id="register">
            <h1>还没有账号？</h1>
            <p></p>
            <div id="div_btn_register"><input type="button" id="btn_register" value="注册账号" onclick='letRegister()'></div>
        </div>
        <div id="login">
            <div id="image_logo"><img src="images/gimp-logo.jpg" height="100" width="100"></div>
            <div id="login_form">
                <form name='login_form' action='login_check.php' method="post">
                    <div id="div_username">
                        <input type="text" id="username" name='username' class="text_field" placeholder="请输入账号" value='admin'>
                    </div>
                    <div id="div_password">
                        <input type="password" id="password" name='password' class="text_field" placeholder="请输入密码" value='passwor'>
                    </div>
                    <div id="div_forget">
                        <a id="forget_pwd" href="javascript:forgetPwd();">忘记密码？</a>
                    </div>
                    <div id="div_btn_login">
                        <input type="submit" id="btn_login" name='submit' value="马上登录" onclick='return checkSubmit(this.form)'>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
