<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // 连接数据库

$url = "position.php";

$table = "position";
$sql = "select * from $table;";
$result = mysql_query($sql);
$rowTotal = mysql_num_rows($result);

if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无职位信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
// $sql = "select * from $table order by id limit $offset, $itemLimit;";
$sql = "select * from position order by dp_id, level asc limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))  //如果有记录则输出
{
    echo "<div id='title_table'>职称信息列表</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>部门号</td>";
    echo "<td>部门名称</td>";
    echo "<td>级别号</td>";
    echo "<td>头衔</td>";
    echo "<td>基础薪水</td>";
    echo "</tr>";
    do
    {
        list($dp_id, $dp_name, $level_id, $level, $bsalary) = $row;
        echo "<tr>";
        echo "<td>$dp_id</td>";
        echo "<td>$dp_name</td>";
        echo "<td>$level_id</td>";
        echo "<td>$level</td>";
        echo "<td>$bsalary</td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
}
@require_once "foot.php";
?>
