<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";

$url   = "bonus.php";
$table = "bonus";
$sql   = "select * from $table;";
$result   = mysql_query($sql);
$rowTotal = mysql_num_rows($result);
// How many items to show on one page
// $itemLimit = 15;

if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无奖金信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
$sql = "select bn.id, p.name, year, month, type.name as tname, bonus from bonus as bn,
    personel as p, bntype as type where bn.id = p.id and bn.grade = type.grade
    order by year desc, month desc, bn.id asc limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
{
    echo "<div id='title_table'>奖金信息列表</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>姓名</td>";
    echo "<td>奖金日期</td>";
    echo "<td>奖金类别</td>";
    echo "<td>奖金数额</td>";
    echo "</tr>";
    do
    {
        list($id, $name, $year, $month, $gradeName, $bonus) = $row;
        // format time for pretty show
        $fTime = mktime(0, 0, 0, $month, 20, $year);
        $formattedTime = date("Y-m", $fTime);
        // end of format
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$formattedTime</td>";
        echo "<td>$gradeName</td>";
        echo "<td>$bonus</td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
}
@require_once "foot.php";
?>
