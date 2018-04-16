<?php
// Do all database manipulation on this file
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "conn.php";
@require_once "tax_calc.php";

$sqlYes = 1;
$pageNum = @isset($_GET['page']) ? $_GET['page'] : 1;
$operation = @$_REQUEST['operation'];

// Edit personel info -- start
if ($operation == 'personel_edit') {
    $id = $_POST['id'];
    $level = $_POST['level'];
    $dp_id = $_POST['dp_id'];
    $name = $_POST['name'];
    $sex  = $_POST['sex'];
    $age  = $_POST['age'];
    $tel  = $_POST['tel'];
    $address = $_POST['address'];

    // fix issue with encoding, not need any more now.
    // $name = urldecode($name);
    // $name = iconv('UTF-8', 'utf8', $name);

    if ($sqlYes != 0) {
        $sql = "update personel set level = '$level', dp_id = '$dp_id',
            name = '$name', sex = '$sex', age = '$age', tel = '$tel',
            address = '$address' where id = $id;";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$id."号 员工信息更新成功！'); location.href='personel_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，".$id."号 员工信息更新失败！'); location.href='personel_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'personel_del') {
    $id = @$_POST['id'];

    if (sqlYes) {
        $sql = "delete from personel where id = $id;";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$id."号 员工信息删除成功！'); location.href='personel_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$id."号 员工信息删除失败！'); location.href='personel_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'personel_add') {
    $id = $_POST['id'];
    $level = $_POST['level'];
    $dp_id = $_POST['dp_id'];
    $name = $_POST['name'];
    $sex  = $_POST['sex'];
    $age  = $_POST['age'];
    $tel  = $_POST['tel'];
    $address = $_POST['address'];

    if ($sqlYes != 0) {
        $sql = "INSERT INTO `personel` (`id`, `level`, `dp_id`, `name`, `sex`, `age`, `tel`, `address`)
            VALUES ('$id', '$level', '$dp_id', '$name', '$sex', '$age', '$tel', '$address');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$id."号 员工信息添加成功！'); location.href='personel_add.php';</script>";
        else
            echo "<script>alert('抱歉，".$id."号 员工信息添加失败！'); location.href='personel_add.php';</script>";
    }
}
// Edit personel info -- end

// Edit position info -- start
if ($operation == 'position_edit') {
    $dp_id   = $_POST['dp_id'];
    $dp_name = $_POST['dp_name'];
    $level   = $_POST['level'];
    $title   = $_POST['title'];
    $bsalary = $_POST['bsalary'];

    if ($sqlYes != 0) {
        $sql = "update position set dp_name = '$dp_name', title = '$title', bsalary = '$bsalary' where dp_id = '$dp_id' and level = '$level';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$dp_id."部门".$level."级 员工信息更新成功！'); location.href='position_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$dp_id."部门".$level."级 员工息更新失败！'); location.href='position_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'position_del') {
    $dp_id   = $_POST['dp_id'];
    $level   = $_POST['level'];

    if ($sqlYes != 0) {
        $sql = "delete from position where dp_id = $dp_id and level = $level;";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$dp_id."部门".$level."级 员工信息删除成功！'); location.href='position_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$dp_id."部门".$level."级 员工信息删除失败！'); location.href='position_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'position_add') {
    $dp_id   = $_POST['dp_id'];
    $dp_name = $_POST['dp_name'];
    $level   = $_POST['level'];
    $title   = $_POST['title'];
    $bsalary = $_POST['bsalary'];

    if ($sqlYes != 0) {
        $sql = "INSERT INTO `position` (`dp_id`, `dp_name`, `level`, `title`, `bsalary`)
            VALUES ('$dp_id', '$dp_name', '$level', '$title', '$bsalary');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$dp_id."部门".$level."级 员工信息添加成功！'); location.href='position_add.php?dp_id=".$dp_id."';</script>";
        else
            echo "<script>alert('抱歉，".$dp_id."部门".$level."级 员工信息添加失败！'); location.href='position_add.php?dp_id=".$dp_id."';</script>";
    }
}
// Edit position info -- end

// Edit for overtime info - start
if ($operation == 'overtime_edit') {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $day   = $_POST['day'];
    $grade = $_POST['grade'];
    $hours = $_POST['hours'];

    if ($sqlYes != 0) {
        $sql = "update overtime set grade = '$grade', hours = '$hours' where id = '$id' and year = '$year' and month = '$month' and day = '$day';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工 '  + $year + '-' + $month + '-' + $day + ' 的请假信息更新成功！'); location.href='overtime_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工 '  + $year + '-' + $month + '-' + $day + ' 的请假信息更新失败！'); location.href='overtime_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'overtime_del') {
    $id = $_POST['id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $day   = $_POST['day'];

    if ($sqlYes != 0) {
        $sql = "delete from overtime where id = '$id' and year = '$year' and month = '$month' and day = '$day';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息删除成功！'); location.href='overtime_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息删除失败！'); location.href='overtime_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'overtime_add') {
    $id    = $_POST['id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $day   = $_POST['day'];
    $grade = $_POST['grade'];
    $hours = $_POST['hours'];

    if ($sqlYes != 0) {
        // Check if already has record for the same day and sama one
        $sql = "SELECT id from overtime where id = '$id' and year = '$year' and month = '$month' and day = '$day';";
        $result = mysql_query($sql);
        if ($row = mysql_fetch_array($result)) {
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息已经存在，请修改之！'); location.href='overtime_edit.php?page=".$pageNum."&id=".$id."';</script>";
            return;
        }
        // Do the insertion
        $sql = "INSERT INTO `overtime` (`id`, `year`, `month`, `day`, `grade`, `hours`)
            VALUES ('$id', '$year', '$month', '$day', '$grade', '$hours');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息添加成功！'); location.href='overtime_add.php';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息添加失败！'); location.href='overtime_add.php';</script>";
    }
}
// Edit for overtime info -- end

// Edit for overtime type - start
if ($operation == 'ovtype_edit') {
    $grade = $_POST['grade'];
    $name  = $_POST['name'];
    $wage  = $_POST['wage'];

    if ($sqlYes != 0) {
        $sql = "update ovtype set name = '$name', wage = '$wage' where grade = '$grade';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 请假信息更新成功！'); location.href='ovtype_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 请假信息更新失败！'); location.href='ovtype_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'ovtype_del') {
    $grade = @$_POST['grade'];

    if ($sqlYes != 0) {
        $sql = "delete from ovtype where grade = '$grade';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 请假信息删除成功！'); location.href='ovtype_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 请假信息删除失败！'); location.href='ovtype_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'ovtype_add') {
    $grade = $_POST['grade'];
    $name  = $_POST['name'];
    $wage  = $_POST['wage'];

    if ($sqlYes != 0) {
        $sql = "INSERT INTO ovtype (`grade`, `name`, `wage`) VALUES ('$grade', '$name', '$wage');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 请假信息添加成功！'); location.href='ovtype_add.php';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 请假信息添加失败！'); location.href='ovtype_add.php';</script>";
    }
}
// Edit for overtime type - end

// Edit for leave info - start
if ($operation == 'leave_edit') {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $day   = $_POST['day'];
    $grade = $_POST['grade'];
    $hours = $_POST['hours'];

    if ($sqlYes != 0) {
        $sql = "update `leave` set grade = '$grade', hours = '$hours' where id = '$id' and year = '$year' and month = '$month' and day = '$day';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工 '  + $year + '-' + $month + '-' + $day + ' 的请假信息更新成功！'); location.href='leave_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工 '  + $year + '-' + $month + '-' + $day + ' 的请假信息更新失败！'); location.href='leave_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'leave_del') {
    $id = $_POST['id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $day   = $_POST['day'];

    if ($sqlYes != 0) {
        $sql = "delete from `leave` where id = '$id' and year = '$year' and month = '$month' and day = '$day';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息删除成功！'); location.href='leave_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息删除失败！'); location.href='leave_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'leave_add') {
    $id    = $_POST['id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $day   = $_POST['day'];
    $grade = $_POST['grade'];
    $hours = $_POST['hours'];

    if ($sqlYes != 0) {
        // Check if already has record for the same day and sama one
        $sql = "SELECT id from `leave` where id = '$id' and year = '$year' and month = '$month' and day = '$day';";
        $result = mysql_query($sql);
        if ($row = mysql_fetch_array($result)) {
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息已经存在，请修改之！'); location.href='leave_edit.php?page=".$pageNum."';</script>";
            return;
        }
        // Do the insertion
        $sql = "INSERT INTO `leave` (`id`, `year`, `month`, `day`, `grade`, `hours`)
            VALUES ('$id', '$year', '$month', '$day', '$grade', '$hours');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息添加成功！'); location.href='leave_add.php';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + '-' + $day + ' 的请假信息添加失败！'); location.href='leave_add.php';</script>";
    }
}
// Edit for leave info -- end

// Edit for leave type - start
if ($operation == 'lvtype_edit') {
    $grade = $_POST['grade'];
    $name  = $_POST['name'];
    $wage  = $_POST['wage'];

    if ($sqlYes != 0) {
        $sql = "update lvtype set name = '$name', wage = '$wage' where grade = '$grade';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 请假信息更新成功！'); location.href='lvtype_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 请假信息更新失败！'); location.href='lvtype_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'lvtype_del') {
    $grade = @$_POST['grade'];

    if ($sqlYes != 0) {
        $sql = "delete from lvtype where grade = '$grade';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 请假信息删除成功！'); location.href='lvtype_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 请假信息删除失败！'); location.href='lvtype_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'lvtype_add') {
    $grade = $_POST['grade'];
    $name  = $_POST['name'];
    $wage  = $_POST['wage'];

    if ($sqlYes != 0) {
        $sql = "INSERT INTO lvtype (`grade`, `name`, `wage`) VALUES ('$grade', '$name', '$wage');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 请假信息添加成功！'); location.href='lvtype_add.php';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 请假信息添加失败！'); location.href='lvtype_add.php';</script>";
    }
}
// Edit for leave type - end

// Edit for bonus info - start
if ($operation == 'bonus_edit') {
    $id    = $_POST['id'];
    $name  = $_POST['name'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $grade = $_POST['grade'];
    $bonus = $_POST['bonus'];

    if ($sqlYes != 0) {
        $sql = "update `bonus` set grade = '$grade', bonus = '$bonus' where id = '$id' and year = '$year' and month = '$month';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工 '  + $year + '-' + $month + ' 的奖金信息更新成功！'); location.href='bonus_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工 '  + $year + '-' + $month + ' 的奖金信息更新失败！'); location.href='bonus_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'bonus_del') {
    $id = $_POST['id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];

    if ($sqlYes != 0) {
        $sql = "delete from `bonus` where id = '$id' and year = '$year' and month = '$month';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，' + $id + ' 号员工'  + $year + '-' + $month + ' 的奖金信息删除成功！'); location.href='bonus_edit.php?page=".$pageNum."&id=".$id."';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + ' 的奖金信息删除失败！'); location.href='bonus_edit.php?page=".$pageNum."&id=".$id."';</script>";
    }
}

if ($operation == 'bonus_add') {
    $id    = $_POST['id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];
    $grade = $_POST['grade'];
    $bonus = $_POST['bonus'];

    if ($sqlYes != 0) {
        // Check if already has record for the same day and sama one
        $sql = "SELECT id from `bonus` where id = '$id' and year = '$year' and month = '$month';";
        $result = mysql_query($sql);
        if ($row = mysql_fetch_array($result)) {
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + ' -' + $grade + ' 类的奖金信息已经存在，请修改之！'); location.href='bonus_edit.php?page=".$pageNum."&id=".$id."';</script>";
            return;
        }
        // Do the insertion
        $sql = "INSERT INTO `bonus` (`id`, `year`, `month`, `grade`, `bonus`)
            VALUES ('$id', '$year', '$month', '$grade', '$bonus');";
        if ($result = mysql_query($sql) or die($myQuery."<br/><br/>".mysql_error()))
            echo "<script>alert('恭喜，' + $id + ' 号员工'  + $year + '-' + $month + ' 的奖金信息添加成功！'); location.href='bonus_add.php';</script>";
        else
            echo "<script>alert('抱歉，' + $id + ' 号员工'  + $year + '-' + $month + ' 的奖金信息添加失败！'); location.href='bonus_add.php';</script>";
    }
}
// Edit for bonus info -- end

// Edit for bonus type - start
if ($operation == 'bntype_edit') {
    $grade = $_POST['grade'];
    $name  = $_POST['name'];

    if ($sqlYes != 0) {
        $sql = "update bntype set name = '$name' where grade = '$grade';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 奖金信息更新成功！'); location.href='bntype_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 奖金信息更新失败！'); location.href='bntype_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'bntype_del') {
    $grade = @$_POST['grade'];

    if ($sqlYes != 0) {
        $sql = "delete from bntype where grade = '$grade';";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 奖金信息删除成功！'); location.href='bntype_edit.php?page=".$pageNum."';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 奖金信息删除失败！'); location.href='bntype_edit.php?page=".$pageNum."';</script>";
    }
}

if ($operation == 'bntype_add') {
    $grade = $_POST['grade'];
    $name  = $_POST['name'];

    if ($sqlYes != 0) {
        $sql = "INSERT INTO bntype (`grade`, `name`) VALUES ('$grade', '$name');";
        if ($result = mysql_query($sql))
            echo "<script>alert('恭喜，".$grade."级 奖金信息添加成功！'); location.href='bntype_add.php';</script>";
        else
            echo "<script>alert('抱歉，".$grade."级 奖金信息添加失败！'); location.href='bntype_add.php';</script>";
    }
}
// Edit for overtime type - end

// Calc salary -- start
// calculate last month
if ($operation == 'salary_calc') {
    // Set time zone
    date_default_timezone_set('PRC');
    $year  = date('Y');
    $month = date('m');
    $day   = date('d');
    // Calc last month
    $month = $month - 1;
    if ($month == '0') {
        $month = 12;
        $year = $year - 1; // Get last year
    }

    if ($sqlYes != 0) {
        // create view overtime-view
        mysql_query("drop view if exists ovview;");
        mysql_query("create or replace view ovview as select id, year, month, grade, sum(hours) as hours from overtime as ov where year = '$year' and month = '$month' group by id, grade;");
        // create view leave-view
        mysql_query("drop view if exists lvview;");
        mysql_query("create or replace view lvview as select id, year, month, grade, sum(hours) as hours from `leave` as lv where year = '$year' and month = '$month' group by id, grade;");
        // create view bonus-view
        mysql_query("drop view if exists bnview;");
        mysql_query("create or replace view bnview as select id, year, month, grade, sum(bonus) as bonus from `bonus` as bn where year = '$year' and month = '$month' group by id, grade;");
        // Collect needy info
        $sql = "select pe.id, bsalary from personel as pe, bsalary as bs where pe.id = bs.id;";
        $result = mysql_query("$sql");
        $totalRows = mysql_num_rows($result);
        $tackledRows = 0;
        while ($row = mysql_fetch_array($result)) {
            list($id, $bsalary) = $row;
            // Calc overtime pay
            $paySql = "select sum(pay) as pay from (select id, hours * wage as pay from ovview as view left join ovtype as type on view.grade = type.grade)as dr where id = '$id' group by id;";
            $payResult = mysql_query($paySql);
            if ($payRow = mysql_fetch_array($payResult)) {
                list($pay) = $payRow;
            } else {
                $pay = 0.0;
            }
            // Calc leave deduct
            $deductSql = "select sum(deduct) as deduct from (select id, hours * wage as deduct from lvview as view left join lvtype as type on view.grade = type.grade)as dr where id = '$id' group by id;";
            $deductResult = mysql_query($deductSql);
            if ($deductRow = mysql_fetch_array($deductResult)) {
                list($deduct) = $deductRow;
            } else {
                $deduct = 0.0;
            }
            // Calc bonus
            $bonusSql = "select sum(bonus) as bonus from bnview as bn where id = '$id' group by id;";
            $bonusResult = mysql_query($bonusSql);
            if ($bonusRow = mysql_fetch_array($bonusResult)) {
                list($bonus) = $bonusRow;
            } else {
                $bonus = 0.0;
            }
            $preTax = $bsalary + $pay - $deduct + $bonus;
            $afterTax = afterTax($preTax);
            $postTax = $afterTax['postTax'];

            // If record exists, not insert again
            $checkSql = "select * from salary where id = '$id' and year = '$year' and month = '$month'";
            $checkResult = mysql_query($checkSql);
            $checkRow = mysql_fetch_array($checkResult);
            if (! $checkRow) {
                $insertSql = "INSERT INTO `salary` (`id`, `year`, `month`, `bsalary`, `pay`, `deduct`, `bonus`, `pre_tax`, `post_tax`)
                    VALUES ('$id', '$year', '$month', '$bsalary', '$pay', '$deduct', '$bonus', '$preTax', '$postTax');";
                $insertResult = mysql_query("$insertSql");
            }
            // Go for next id
            $tackledRows++;
        }
        echo "<script>alert('恭喜，" . $year . "年" . $month . "月的工资已全部结算，请查阅！'); location.href='salary.php';</script>";
    }
}
// Calc salary -- end
?>
