<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // 连接数据库

$url   = "personel.php";
$table = "personel";
$sql   = "select * from $table;";
$result   = mysql_query($sql);
$rowTotal = mysql_num_rows($result);
// How many items to show on one page
// $itemLimit = 15;

if($rowTotal == 0) {
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无员工信息记录！'); location.href='indexx.php';</script>";
}

@require_once "pagi_head.php";
$sql = "select p.id, po.title, po.dp_name, p.name, p.sex, p.age, p.tel, p.address
    from personel as p, position as po where p.dp_id = po.dp_id and p.level = po.level
    order by p.id limit $offset, $itemLimit;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    echo "<div id='title_table'>员工信息列表</div>";
    echo "<table id='table_enlarge'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>级别</td>";
    echo "<td>所属部门</td>";
    echo "<td>姓名</td>";
    echo "<td>性别</td>";
    echo "<td>年龄</td>";
    echo "<td id='tel'>电话</td>";
    echo "<td id='address'>住址</td>";
    echo "</tr>";
    do {
        list($id, $level, $dp_name, $name, $sex, $age, $tel, $address) = $row;
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$level</td>";
        echo "<td>$dp_name</td>";
        echo "<td>$name</td>";
        echo "<td>$sex</td>";
        echo "<td>$age</td>";
        echo "<td>$tel</td>";
        echo "<td>$address</td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
}
@require_once "foot.php";
?>
