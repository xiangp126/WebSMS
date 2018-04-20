<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        <title>工资管理系统</title>
    </head>
    <body>
<?php
@require_once "login_check.php";
@require_once "conn.php";

$operation = @$_REQUEST['operation'];
if ($operation == 'salary_comp') {
    $dp_id = $_POST['dp_id'];
    $year  = $_POST['year'];
    $month = $_POST['month'];

    $sql = "select sa.id, pe.dp_id, po.dp_name, year, month, pre_tax, post_tax from salary as sa, personel as pe, position as po where sa.id = pe.id and pe.dp_id = po.dp_id and year = $year and month = $month and po.dp_id = $dp_id group by sa.id;";
    $result = mysql_query($sql) or die('haha');
    if($row = mysql_fetch_array($result)){
        echo "<div id='title_table' class='title_edit'> 查看 ";
        echo "<span id='select_name'>$dp_id</span> 号部门 ";
        echo "<span id='select_name'>$year</span>年 ";
        echo "<span id='select_name'>$month</span>月 工资统计信息</div>";
        do {
            list($id, $dp_id, $dp_name, $year, $month, $preTax, $postTax) = $row;
            // fill in data
            $drawArray[$id] = $postTax;
        } while($row = mysql_fetch_array($result));
    } else {
        echo "<script>alert('抱歉，无该部门工资统计信息！'); history.go(-1);</script>";
    }
}
?>

<?php
@require_once "salary_draw_d.php";
?>
    </body>
</html>
