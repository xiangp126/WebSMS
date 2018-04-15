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

//津贴类别的处理--开始
if($operation=='lb_edit'|$operation=='lb_add')
{
    if($lb_grade=='')
    {
        echo "<script>alert('抱歉，类别等级未填写完全！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
    if($lb_name=='')
    {
        echo "<script>alert('抱歉，类别名称未填写完全！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
    if($lb_pay=='')
    {
        echo "<script>alert('抱歉，津贴款额未填写完全！'); history.go(-1);</script>";
        $sqlYes = 0;
    }

    //类别等级的处理
    if($operation=='lb_add')
    {

        $checklb_grade=preg_match('/^[a-z]$/',$lb_grade);  //检查类别等级是否小写英文字母
        if(!$checklb_grade)
        {
            echo "<script>alert('抱歉，津贴类别等级应为小写英文字母！'); history.go(-1);</script>";
            $sqlYes = 0;
        }
        $sql="select lb_grade from leibie where lb_grade = '".$lb_grade."';";  //类别等级不可相同
        if(mysql_num_rows(mysql_query($sql)))
        {
            echo "<script>alert('抱歉，等级为".$lb_grade."的津贴类别已存在！'); history.go(-1);</script>";
            $sqlYes = 0;
        }
    }

    //类别名称的处理
    if(strlen($lb_name)>20)
    {
        echo "<script>alert('抱歉，津贴类别名称超长！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
    $checklb_name=preg_match("/^[".chr(0xa1)."-".chr(0xff)."]+$/",$lb_name);  //检查类别名称是否为汉字
    if(!$checklb_name)
    {
        echo "<script>alert('抱歉，津贴类别名称只能为汉字！'); history.go(-1);</script>";
        $sqlYes = 0;
    }

    //津贴款数的处理
    $checklb_pay=preg_match('/^[1-9][0-9]{0,}$/',$lb_pay);  //检查部门编号是否为位阿拉伯数字且不能以0开头
    if(!$checklb_pay)
    {
        echo "<script>alert('抱歉，津贴款额应为阿拉伯数字且不能以0开头！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
    if($lb_pay<5)
    {
        echo "<script>alert('抱歉，每小时津贴款额不得低于5元！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
    if($lb_pay>50)
    {
        echo "<script>alert('抱歉，每小时津贴不款额得高于50元！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
}

//津贴类别的处理--结束

//津贴信息的处理--开始
if($operation=='jt_edit'|$operation=='jt_add')
{
    $now_day=date('d');  //获取日
    if($jt_day>$now_day)
    {
        echo "<script>alert('抱歉，未到".$jt_year."年".$jt_month."月".$jt_day."日，不能添加该天津贴信息！'); location.href='jt_add.php';</script>";
        $sqlYes = 0;
    }

    //加班日期的处理
    if($operation=='jt_add')
    {
        $sql="select * from jintie where id = ".$id." and jt_year = '".$jt_year."' and jt_month = '".$jt_month."' and jt_day = '".$jt_day."' ;";
        if(mysql_num_rows(mysql_query($sql)))
        {
            echo "<script>alert('抱歉，".$id." 号员工 ".$jt_year."年".$jt_month."月".$jt_day."日 的津贴已登记！'); history.go(-1);</script>";
            $sqlYes = 0;
        }

        $sql="select * from kaoqin where id = ".$id." and kq_year = '".$jt_year."' and kq_month = '".$jt_month."' and kq_day = '".$jt_day."' ;";
        if(!mysql_num_rows(mysql_query($sql)))  //检查该员工该天是否有到勤登记（是否来上班）
        {
            echo "<script>alert('抱歉，".$id." 号员工 ".$jt_year."年".$jt_month."月".$jt_day."日 未到公司上班！'); history.go(-1);</script>";
            $sqlYes = 0;
        }
    }

}
//津贴信息的处理--结束

//工资结算的处理--开始
if($operation=='gzi_jiesuan'&&$gzi_jiesuan_chongxin!='gzi_jiesuan_chongxin')
{
    if($gzi_day!='01'&&$gzi_day!='02'&&$gzi_day!='03')
    {
        echo "<script>alert('抱歉，工资结算只能是在每月的前三天！（为便于实验，现不限制结算日期！）');<!--location.href='gongzi.php';--></script>";
        //$sqlYes = 0;
        $sqlYes=2;  //标记日期不合规定
    }
    if(mysql_num_rows(mysql_query(" select * from gongzi where gzi_year = '".$gzi_year."' and gzi_month = '".$gzi_month."' limit 0 , 1 ;")))
    {
        echo "<script language='javascript'>if(confirm('抱歉，".$gzi_year."年".$gzi_month."月的工资已结算，重新结算？')){ location.href='gzi_jiesuan_chongxin.php';}else{ location.href='gongzi.php';}</script>";
    }
}
//工资结算的处理--结束

//工资查询的处理--开始
if($operation=='select_yg')
{
    if($id=='')
    {
        echo "<script>alert('抱歉，员工编号未填写！'); history.go(-1);</script>";
        $sqlYes = 0;
    }

    $sql="select id from yuangong where id like  '%".$yg_num."%';";  //员工编号不可相同
    if(!mysql_num_rows(mysql_query($sql)))
    {
        echo "<script>alert('抱歉，员工编号为 ".$id." 的员工不存在！'); history.go(-1);</script>";
        $sqlYes = 0;
    }
}
//工资查询的处理--结束

//年终奖金结算的处理--开始
if($operation=='jj_jiesuan'&&$jj_jiesuan_chongxin!='jj_jiesuan_chongxin')
{
    if($jj_month=='12')  //规定每年12月25、26、27能结算奖金 -- 为便于实验，暂不核查结算时间
    {
        if($jj_day!='25'&&$jj_day!='26'&&$jj_day!='27')
        {
            echo "<script>alert('抱歉，奖金结算只能在每年12月的25、26、27日三天！（为便于实验，现不限制结算日期且结算当年奖金！）');<!--location.href=jiangjin.php;--></script>";
            //$sqlYes = 0;
            $sqlYes=2;  //标记日期不合规定
        }
    }
    else
    {
        echo "<script>alert('抱歉，奖金结算只能在每年的12月！（为便于实验，现不限制结算日期且结算当年奖金！）');<!--location.href='jiangjin.php;'--></script>";
        //$sqlYes = 0;
        $sqlYes=2;  //标记日期不合规定
    }
    if(mysql_num_rows(mysql_query(" select * from jiangjin where jj_year = '".$jj_year."' limit 0 , 1 ;")))
    {
        echo "<script language='javascript'>if(confirm('抱歉，".$jj_year."年".$jj_month."月的工资已结算，重新结算？')){ location.href='jj_jiesuan_chongxin.php';}else{ location.href='jiangjin.php';}</script>";
    }
}
//年终奖金结算的处理--结束

?>
