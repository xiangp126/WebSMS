<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Enterprise Salary Management System</title>
        <link rel="stylesheet" href="css/menu.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    </head>
    <script src="js/menu.js"></script>
    <script src="js/function.js"></script>
    <body>
        <h1>Enterprise Salary Management System</h1>
        <div id="time_user1">
            <div id="time">
<script language="javascript" type="text/javascript" charset="UTF-8">
window.onload=function() {
    setInterval("document.getElementById('time').innerHTML=new Date().toLocaleString()+' 星期'+'日一二三四五六'.charAt(new Date().getDay());",1000);
}
</script>
            </div>
            <div id="user">
                【<a href="indexx.php"><?php
                    session_start();
                    echo $_SESSION['login_user'];?></a>】【
                <a href="#" onclick="login_out('<?php echo $_SESSION['login_user']; ?>');" >注销登陆</a>】
            </div>
        </div>
        <div style="clear:both"></div>
        <div class='nav'>
            <ul>
                <li><a href='salary.php'>工资信息</a>
                    <ul>
                        <li><a href='salary_calc.php'>工资结算</a></li>
                        <li><a href='salary_query.php'>工资查询</a></li>
                    </ul>
                </li>
                <li><a href='bonus.php'>奖金信息</a>
                    <ul>
                      <li><a href='bonus_edit.php'>编辑信息</a></li>
                      <li><a href='bonus_add.php'>添加信息</a></li>
                      <li><a href='bntype_edit.php'>编辑类别</a></li>
                      <li><a href='bntype_add.php'>添加类别</a></li>
                      <li><a href='bonus_query.php'>查询信息</a></li>
                    </ul>
                </li>
                <li><a href='leave.php'>请假信息</a>
                    <ul>
                        <li><a href='leave_edit.php'>编辑信息</a></li>
                        <li><a href='leave_add.php'>添加信息</a></li>
                        <li><a href='lvtype_edit.php'>编辑类别</a></li>
                        <li><a href='lvtype_add.php'>添加类别</a></li>
                        <li><a href='leave_query.php'>查询信息</a></li>
                    </ul>
                </li>
                <li><a href='overtime.php'>加班信息</a>
                    <ul>
                        <li><a href='overtime_edit.php'>编辑信息</a></li>
                        <li><a href='overtime_add.php'>添加信息</a></li>
                        <li><a href='ovtype_edit.php'>编辑类别</a></li>
                        <li><a href='ovtype_add.php'>添加类别</a></li>
                        <li><a href='overtime_query.php'>查询信息</a></li>
                    </ul>
                </li>
                <li><a href='position.php'>职称信息</a>
                    <ul>
                        <li><a href='position_edit.php'>编辑信息</a></li>
                        <li><a href='position_add.php'>添加级别</a></li>
                    </ul>
                </li>
                <li><a href='personel.php'>员工信息</a>
                    <ul>
                        <li><a href='personel_edit.php'>编辑信息</a></li>
                        <li><a href='personel_add.php'>添加员工</a></li>
                        <li><a href='bsalary_edit.php'>编辑月薪</a></li>
                        <li><a href='personel_query.php'>查询信息</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div style="text-align:center;clear:both;margin-top:10px"></div>
    </body>
</html>
