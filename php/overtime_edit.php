<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // Connect to database

// Get id passed from query page if exist
$getId  = @$_REQUEST['id'];
$url    = "overtime_edit.php";
$table  = "overtime";
$retUrl = "indexx.php";
// How many items to show on one page
// $itemLimit = 15;

$sqlPrefix = "select ov.id, p.name, year, month, day, ov.grade, type.name, hours from overtime as ov, personel as p, ovtype as type where ov.id = p.id and ov.grade = type.grade ";
$sql = $sqlPrefix;
if ($getId != "") {
    $retUrl = 'personel_query.php';
    $sql = "$sql"."and ov.id = '$getId' ";
    // adjust for query info
    echo "<div id='height_select_if_top'></div>";
}
$result = mysql_query($sql.";");
$rowTotal = mysql_num_rows($result);
if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无加班息记录！');</script>";
    echo "<script>location.href='$retUrl';</script>";
}

@require_once "pagi_head.php";
// Get max grade befor all
$maxGradeSql = "select max(grade) from ovtype;";
$result = mysql_query($maxGradeSql);
$row = mysql_fetch_array($result);
list($maxGrade) = $row;
if ($maxGrade == "") {
    $maxGrade = 3;
}
// Get max grade done

$sqlPostfix = "order by ov.id asc, year desc, month desc, day desc limit $offset, $itemLimit;";
$sql = "$sql"."$sqlPostfix";

$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
{
    echo "<div id='title_table'>编辑员工加班信息</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>姓名</td>";
    echo "<td>加班日期</td>";
    echo "<td>加班类别</td>";
    echo "<td>加班时长</td>";
    echo "<td>可选操作</td>";
    echo "</tr>";
    do
    {
        list($id, $name, $year, $month, $day, $grade, $gradeName, $hours) = $row;
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
        echo "<td><input type='button'
            onclick=\"overtime_edit('$id', '$name', '$year', '$month', '$day', '$grade', '$hours', '$maxGrade', '$pageNum')\" value='编辑'> |
            <input type='button' onclick='overtime_del($id, $year, $month, $day, $pageNum)' value='删除'></td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";

    if ($getId) {
        echo "<div id='height_select_if_bottom'></div>";
    }
}
@require_once "foot.php";
?>
