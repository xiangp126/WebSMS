<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";

// Get id passed from query page if exist
$getId  = @$_REQUEST['id'];
$url    = "bonus_edit.php";
$table  = "bonus";
$retUrl = "indexx.php";
// How many items to show on one page
// $itemLimit = 15;

$sqlPrefix = "select bn.id, p.name, year, month, bn.grade, type.name as tname, bonus from bonus as bn, personel as p, bntype as type where bn.id = p.id and bn.grade = type.grade ";
$sql = $sqlPrefix;
if ($getId != "") {
    $sql = $sql." and bn.id = '$getId' ";
    // adjust for query info
    echo "<div id='height_select_if_top'></div>";
}
$result = mysql_query($sql.";");
$rowTotal = mysql_num_rows($result);
if($rowTotal == 0) {
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无奖金信息记录！');</script>";
    echo "<script>location.href='$retUrl';</script>";
}

@require_once "pagi_head.php";
// Get max grade befor all
$maxGradeSql = "select max(grade) from bntype;";
$result = mysql_query($maxGradeSql);
$row = mysql_fetch_array($result);
list($maxGrade) = $row;
if ($maxGrade == "") {
    $maxGrade = 4;
}
// Get max grade done
$sqlPostfix = "order by bn.id asc, year desc, month desc limit $offset, $itemLimit;";
$sql = $sql."$sqlPostfix";

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
    echo "<td>可选操作</td>";
    echo "</tr>";
    do
    {
        list($id, $name, $year, $month, $grade, $gradeName, $bonus) = $row;
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
        echo "<td><input type='button'
            onclick=\"bonus_edit('$id', '$name', '$year', '$month', '$grade', '$bonus', '$maxGrade', '$pageNum')\" value='编辑'> |
            <input type='button' onclick='bonus_del($id, $year, $month, $pageNum)' value='删除'></td>";
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
