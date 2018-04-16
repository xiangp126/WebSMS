<?php
header("Content-type: text/html; charset=utf8");
// if go on to excute SQL
$sqlYes= 1;

if($operation == 'position_edit' | $operation == 'position_add') {
    if ($title == '' && strlen($title) <= 20) {
        echo "<script>alert('抱歉，职称头衔 必须填写并且长度小于20 !'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
    // Tackle base salary
    $checkBSalary = preg_match('/^[1-9][0-9]{0,}$/',$bsalary);
    if(!$checkBSalary)
    {
        echo "<script>alert('抱歉，月基本工资应为位阿拉伯数字且不能以0开头！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
}
// 部门信息的处理--结束

// 员工信息的处理--开始
if($operation == 'personel_edit' | $operation == 'personel_add') {
    if($name == '' && strlen($name) <= 20) {
        echo "<script>alert('抱歉，员工姓名 必须填写并且长度小于20 ！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
    if($age == '') {
        echo "<script>alert('抱歉，员工年龄 必须填写！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
    if($tel == '') {
        echo "<script>alert('抱歉，员工电话 必须填写！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }

    // 员工编号的处理, 目前机制是自动生成，无需检车格式
    // if($operation == 'personel_add')
    // {
    //     $checkid = preg_match('/^[1-9][0-9]{4}$/', $id);  // 检查部门编号是否为位阿拉伯数字且不能以0开头
    //     if(!$checkid)
    //     {
    //         echo "<script>alert('抱歉，员工编号应为5位阿拉伯数字且不能以0开头！'); history.go(-1);</script>";
    //         $sqlYes = 0;
    //         return;
    //     }
    // }

    // 年龄的处理, 20 - 69
    $checkAge = preg_match("/^[2-6][0-9]$/", $age);
    if(!$checkAge) {
        echo "<script>alert('抱歉，员工年龄范围为20-69的阿拉伯数字！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
    // 电话的处理
    $checkTel = preg_match("/^\d{3}-\d{8}|\d{4}-\d{8}|[1]\d{10}$/", $tel);  // 电话号码为国内电话或手机号
    if(!$checkTel) {
        echo "<script>alert('抱歉，电话号格式为“3或4位区号-8位电话号”或11位手机号！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
    // 住址的处理
    if(strlen($address) > 60) {
        echo "<script>alert('抱歉，住址超长！'); history.go(-1);</script>";
        $sqlYes = 0;
        return;
    }
}
// 员工信息的处理--结束
?>
