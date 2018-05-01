<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // 连接数据库

$url = "overtime.php";
$table = "overtime";
$sql = "select * from $table;";
$result = mysql_query($sql);
$rowTotal = mysql_num_rows($result);

if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无加班信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
// $sql = "select * from $table order by id limit $offset, $itemLimit;";
$sql = "select ov.id, p.name, year, month, day, type.name as tname, hours from overtime as ov,
    personel as p, ovtype as type where ov.id = p.id and ov.grade = type.grade order by
    year desc, month desc, ov.id asc, day desc limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
{
    echo "<div id='title_table'>加班信息列表</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>姓名</td>";
    echo "<td>加班日期</td>";
    echo "<td>加班类别</td>";
    echo "<td>加班时长</td>";
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
