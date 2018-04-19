<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";

$url = "bntype_edit.php";
$table = "bntype";
$sql = "select * from $table;";
$result = mysql_query($sql);
$rowTotal = mysql_num_rows($result);

if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无奖金类别信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
$sql = "select * from $table order by grade limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    echo "<div id='height_select_if_top'></div>";
    echo "<div id='title_table'>编辑奖金类别信息</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>奖金类别</td>";
    echo "<td>奖金类别名称</td>";
    echo "<td>可选操作</td>";
    echo "</tr>";
    do {
        list($grade, $name) = $row;
        echo "<tr>";
        echo "<td>$grade</td>";
        echo "<td>$name</td>";
        echo "<td><input type='button'
            onclick=\"bntype_edit('$grade', '$name', '$pageNum')\" value='编辑'> |
            <input type='button' onclick='bntype_del($grade, $pageNum)' value='删除'></td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
    echo "<div id='height_select_if_bottom'></div>";
}
@require_once "foot.php";
?>
