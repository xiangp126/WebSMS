<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";

// Get sth. passed from query page if exist
$getId   = @$_REQUEST['id'];
$getYear = @$_REQUEST['year'];
$getMonth = @$_REQUEST['month'];
// This page url
$url   = "salary.php";
$table = "salary";
$retUrl = 'indexx.php';
$itemLimit = 21;

$sqlPrefix = "select pe.id, pe.name, po.dp_name, po.title, year, month, sa.bsalary, pay, deduct, bonus, pre_tax, post_tax from salary as sa, personel as pe, position as po where pe.dp_id = po.dp_id and pe.level = po.level and pe.id = sa.id ";
$sql = $sqlPrefix;

if ($getId != "") {
    $retUrl = "salary_query.php";
    if ($getId != 'All') {
        $sql = "$sql"."and pe.id = '$getId' ";
    }
}
if ($getYear != "" && $getYear != 'All') {
    $sql = "$sql"."and year = '$getYear' ";
}
if ($getMonth != "" && $getMonth != 'All') {
    $sql = "$sql"."and month = '$getMonth' ";
}

$result = mysql_query($sql.";");
$rowTotal = mysql_num_rows($result);
if($rowTotal == 0) {
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无工资统计信息！'); location.href = '$retUrl';</script>";
}

@require_once "pagi_head.php";
$sqlPostfix = "order by year desc, month desc, id asc limit $offset, $itemLimit;";
$sql = "$sql"."$sqlPostfix";

$result = mysql_query($sql);
if($row = mysql_fetch_array($result)) {
    echo "<div id='title_table'>工资信息列表</div>";
    echo "<table id='table_enlarge'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>姓名</td>";
    echo "<td>所属部门</td>";
    echo "<td>职位头衔</td>";
    echo "<td>基础薪水</td>";
    echo "<td>加班补贴</td>";
    echo "<td>缺勤扣薪</td>";
    echo "<td>奖金数额</td>";
    echo "<td>税前薪水</td>";
    echo "<td>税后薪水</td>";
    echo "<td>结算年月</td>";
    echo "<td>扣税细节</td>";
    echo "</tr>";
    do {
        list($id, $name, $dp_name, $title, $year, $month, $bsalary, $pay, $deduct, $bonus, $preTax, $postTax) = $row;
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$dp_name</td>";
        echo "<td>$title</td>";
        echo "<td>$bsalary</td>";
        echo "<td>$pay</td>";
        echo "<td>$deduct</td>";
        echo "<td>$bonus</td>";
        echo "<td>$preTax</td>";
        echo "<td>$postTax</td>";
        echo "<td>".$year."年".$month."月</td>";
        echo "<td><input type='button' onclick=\"salary_stats($id, '$name', $year, $month, $preTax)\" value='查看'></td>";
        echo "</tr>";
    } while($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";

    if ($getId != "" && $getYear != "" && $getMonth != "") {
        echo "<div id='height_select_if_bottom'></div>";
    }
}
@require_once "foot.php";
?>
