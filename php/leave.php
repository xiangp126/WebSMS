<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // 连接数据库

$url = "leave.php";
$table = "leave";
// fix issue with sql key work 'leave'
$sql = "select * from `$table`;";
$result = mysql_query($sql);
$rowTotal = mysql_num_rows($result);

if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无请假信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
// $sql = "select * from $table order by id limit $offset, $itemLimit;";
$sql = "select lv.id, p.name, year, month, day, type.name as tname, hours from `leave` as lv,
    personel as p, lvtype as type where lv.id = p.id and lv.grade = type.grade order by lv.id asc,
    year desc, month desc, day desc limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
{
    echo "<div id='title_table'>请假信息列表</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>姓名</td>";
    echo "<td>请假日期</td>";
    echo "<td>请假类别</td>";
    echo "<td>请假时长(小时)</td>";
    echo "</tr>";
    do
    {
        list($id, $name, $year, $month, $day, $gradeName, $hours) = $row;
        // format time for pretty show
        $fTime = mktime(0, 0, 0, $month, $day, $year);
        $formattedTime = date("Y-m-d", $fTime);
        // end of format
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$formattedTime</td>";
        echo "<td>$gradeName</td>";
        echo "<td>$hours</td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
}
@require_once "foot.php";
?>
