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
        <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" title="style.css" charset="utf-8">
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <title>企业工资管理系统</title>
    </head>
    <body>
        <div id="login" class="name">
            <table>
                <form name='login_form' action="login_check.php" method="post" accept-charset="utf-8" onsubmit='return checkThisForm(this)'>
                    <tr>
                        <th>管理员:</th>
                        <td><input type="text" name="username" value="admin"></td>
                    </tr>
                    <tr>
                        <th>密&nbsp;&nbsp;&nbsp;码:</th>
                        <td><input type="password" name="password" value=""></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="reset" name='reset' value="重置" id="button">
                            <input type="submit" name='submit' value="登陆" id="button">
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </body>
</html>
<script type="text/javascript">
function checkThisForm(form) {
    if (form.username.value == '') {
        alert("请输入用户帐号!");
        form.username.focus();
        return false;
    }
    if (form.password.value == '') {
        alert("请输入登录密码!");
        form.password.focus();
        return false;
    }
    document.login_form.submit();
}
</script>
