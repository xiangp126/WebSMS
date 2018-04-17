<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
@require_once "conn.php";

// Get id passed from query page if exist
$getId  = @$_REQUEST['id'];
$url    = "bsalary_edit.php";
$table  = "bsalary";
$retUrl = "indexx.php";
// How many items to show on one page
// $itemLimit = 15;

// table 'bsalary' conflicts with sql key word
$sql = "select * from $table;";
$result = mysql_query($sql);
$rowTotal = mysql_num_rows($result);
if($rowTotal == 0)
{
?>
    <div id="main" style="height:204px;"></div>
<?php
    @require_once "foot.php";
    echo "<script>alert('抱歉，无月薪信息记录！');</script>";
    echo "<script>location.href='$retUrl';</script>";
}

@require_once "pagi_head.php";
$sql = "select pe.id, pe.name, base.bsalary from personel as pe, bsalary as base where pe.id = base.id;";

$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
{
    echo "<div id='title_table'>编辑员工月薪</div>";
    echo "<table id='table_c'>";
    echo "<tr id='tr'>";
    echo "<td>员工编号</td>";
    echo "<td>姓名</td>";
    echo "<td>月基本薪水</td>";
    echo "<td>可选操作</td>";
    echo "</tr>";
    do
    {
        list($id, $name, $bsalary) = $row;
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$bsalary</td>";
        echo "<td><input type='button'
            onclick=\"bsalary_edit('$id', '$name', '$bsalary', '$pageNum')\" value='编辑'> |
            <input type='button' value='占位'></td>";
        echo "</tr>";
    } while ($row = mysql_fetch_array($result));
    echo "</table>";
    @require_once "pagi_tail.php";
}
@require_once "foot.php";
?>
