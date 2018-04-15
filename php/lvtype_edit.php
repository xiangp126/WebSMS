<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // 连接数据库

$url = "lvtype_edit.php";
$table = "lvtype";
$sql = "select * from $table;";
$result = mysql_query($sql);
$rowTotal = mysql_num_rows($result);

if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无请假类别信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
$sql = "select * from $table order by grade limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))  // 如果有记录则输出
{
    echo "<div id='title_table'>编辑请假类别信息</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>请假类别</td>";
    echo "<td>请假类别名称</td>";
    echo "<td>每小时扣薪</td>";
    echo "<td>可选操作</td>";
    echo "</tr>";
    do
    {
        list($grade, $name, $wage) = $row;
        echo "<tr>";
        echo "<td>$grade</td>";
        echo "<td>$name</td>";
        echo "<td>$wage</td>";
        echo "<td><input type='button'
            onclick=\"lvtype_edit('$grade', '$name', '$wage', '$pageNum')\" value='编辑'> |
            <input type='button' onclick='lvtype_del($grade, $pageNum)' value='删除'></td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
}
@require_once "foot.php";
?>
