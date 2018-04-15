<?php
@require_once "login_check.php";

date_default_timezone_set('PRC'); // default Beijing time
$year = date('Y');
$month = date('m');
// Calc last month
$month = $month - 1;
if ($month == '0') {
    $month = 12;
    $year = $year - 1; // Get last year
}

echo "<body onLoad='myAlert($year, $month)'>";
?>
    <form name="salary_calc" action="action.php" method="post">
        <input type="hidden" name="operation" value="salary_calc">
        <input type="hidden" name="salary_calc_r" value='salary_calc_r' >
        <input type="submit" style= "visibility:hidden">
    </form>
</body>

<script charset="utf-8">
function myAlert(year, month) {
    if (confirm("确定要结算 " + year + ' 年' + month + "月 工资吗？这是安全的操作，已在库的数据部分不会被重新写入！")) {
        document.salary_calc.submit();
    } else {
        history.go(-1);
    }
}
</script>
