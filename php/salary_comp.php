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
    $id = $_POST['id'];
    $year = $_POST['year'];

    $sql = "select sa.id, name, year, month, pre_tax, post_tax from salary as sa, personel as pe where sa.id = pe.id and sa.id = $id and year = $year order by month asc;";
    $result = mysql_query($sql) or die('salary comp query error!');
    if($row = mysql_fetch_array($result)){
        // Get name with id first
        list($id, $name, $year, $month, $preTax, $postTax) = $row;
        echo "<div id='title_table' class='title_edit'> 查看 ";
        echo "<span id='select_name'>$id</span> 号员工 ";
        echo "<span id='select_name'>$name</span> ";
        echo "<span id='select_name'>$year</span>年 工资曲线图</div>";
        do {
            list($id, $name, $year, $month, $preTax, $postTax) = $row;
            // Fill in data, Post Tax & Pre Tax
            $drawArray[$month] = array($postTax, $preTax);
        } while($row = mysql_fetch_array($result));
    } else {
        echo "<script>alert('抱歉，无该员工该年工资信息！'); history.go(-1);</script>";
    }
}
?>

<?php
@require_once "salary_draw_d.php";
?>
    </body>
</html>
