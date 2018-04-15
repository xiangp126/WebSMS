<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>工资管理系统</title>
    </head>
    <body>
<?php
@require_once "login_check.php";
@require_once "tax_calc.php";

$operation = @$_REQUEST['operation'];

if ($operation == 'salary_stats') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $preTax = $_POST['preTax'];

    // Get data when calculating Tax
    $afterTax = afterTax($preTax);
    $eInsurance = $afterTax['eInsurance'];
    $mInsurance = $afterTax['mInsurance'];
    $uInsurance = $afterTax['uInsurance'];
    $housefund  = $afterTax['housefund'];
    $socialSecurity = $afterTax['socialSecurity'];
    $postSocialSecurity = $afterTax['postSocialSecurity'];
    $tax = $afterTax['tax'];
    $postTax = $afterTax['postTax'];

    echo "<div id='title_table' class='title_edit'> 查看 ";
    echo "<span id='select_name'>$id</span> 号员工 ";
    echo "<span id='select_name'>$name</span> 的 ";
    echo "<span id='select_name'>$year</span>年 ";
    echo "<span id='select_name'>$month</span>月 工资统计信息</div>";
    echo "<table id='table_enlarge'>";
    echo "<tr id='tr'>";
    echo "<td>税前薪水</td>";
    echo "<td>养老保险</td>";
    echo "<td>医疗保险</td>";
    echo "<td>失业保险</td>";
    echo "<td>住房公积金</td>";
    echo "<td>社保总支出</td>";
    echo "<td>扣除社保后薪水</td>";
    echo "<td>个人所得税收</td>";
    echo "<td>税后薪水</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>$preTax</td>";
    echo "<td>$eInsurance</td>";
    echo "<td>$mInsurance</td>";
    echo "<td>$uInsurance</td>";
    echo "<td>$housefund</td>";
    echo "<td>$socialSecurity</td>";
    echo "<td>$postSocialSecurity</td>";
    echo "<td>$tax</td>";
    echo "<td>$postTax</td>";
    echo "</tr>";
} else {
    $retUrl = 'indexx.php';
    echo "<script>location.href='$retUrl';</script>";
}
?>
            <tr class='tr_button'>
                <td colspan=9>
                    <input type='button' value=' 返回 ' onclick='returnToPrevious()'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type=submit value=' 打印 ' onclick='myPrint()'>
                </td>
            </tr>
        </table>
        <div id='hint'><span>%提示：</span>社保、税收严格依据国家法定条款计算！</div>
    </body>
</html>
<script charset="utf-8">
function returnToPrevious() {
    history.go(-1);
    // location.href='salary.php';
}
function myPrint() {
    window.print();
}
</script>

<?php
@require_once "salary_draw.php";
?>
