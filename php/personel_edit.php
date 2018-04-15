<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";  // Connect to database

// Get id passed from query page if exist
$getId  = @$_REQUEST['id'];
$url    = "personel_edit.php";
$table  = "personel";
$retUrl = 'indexx.php';
// How many items to show on one page
// $itemLimit = 15;

if ($getId != "") {
    // Set flag for it is a query operation
    $isFromQuery = "true";
    $retUrl = 'personel_query.php';

    $sql = "select * from $table where id = '$getId' ";
    // adjust for query info
    echo "<div id='height_select_if_top'></div>";
} else {
    $sql = "select * from $table ";
}
$result   = mysql_query($sql.";");
$rowTotal = mysql_num_rows($result);
if($rowTotal == 0) {
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无员工信息记录！'); location.href='$retUrl';</script>";
}

@require_once "pagi_head.php";
$sqlPostfix = "order by id asc limit $offset, $itemLimit;";
$sql = "$sql"."$sqlPostfix";

$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    echo "<div id='title_table'>编辑员工信息</div>";
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
    echo "<td>可选操作</td>";
    echo "</tr>";
    do {
        list($id, $level, $dp_id, $name, $sex, $age, $tel, $address) = $row;
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$level</td>";
        echo "<td>$dp_id</td>";
        echo "<td>$name</td>";
        echo "<td>$sex</td>";
        echo "<td>$age</td>";
        echo "<td>$tel</td>";
        echo "<td>$address</td>";
        echo "<td><input type='button'
            onclick=\"personel_edit('$id', '$level', '$dp_id', '$name', '$sex', '$age', '$tel', '$address', '$pageNum')\" value='编辑'> |
            <input type='button' onclick='personel_del($id, $pageNum)' value='删除'></td>";
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
