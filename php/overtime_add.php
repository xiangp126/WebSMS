<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";

date_default_timezone_set('PRC'); // default Beijing time
$year = date('Y');
$month = date('m');
$day = date('d');
?>

<script src="js/function.js" charset="utf-8"></script>
<div id="height_add_top"></div>
<div id='title_table'>添加加班信息</div>
<table id='table_a'>
    <form action=action.php method=post name=position_add>
        <tr id='tr'>
            <td>员工编号</td>
            <td>加班日期</td>
            <td>加班类别</td>
            <td>加班时长</td>
        </tr>
        <tr><td><select name="id">
<?php
@require_once "conn.php";
// Find
$sql = "select id from personel order by id;";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    list($id) = $row;
?>
    <option value="<?php echo $id; ?>"><?php echo $id; ?></option>
<?php
};
?>
                </select>
            </td>
            <td>
                <input type="hidden" value="<?php echo $year; ?>" name="year" id="year"/>
                <input type="hidden" value="<?php echo $month; ?>" name="month" id="month"/><?php echo $year.'-'.$month.'-'; ?>
                <select name="day" id="day">
<?php
$pDay = 1;
$numOfDays = 30;
if($month == 1 | $month == 3 | $month == 5 | $month == 7 | $month == 8 | $month == 10 | $month == 12)
    $numOfDays = 31;
if(($year % 4 == 0) && $month == 2)
    $numOfDays = 28;
elseif($month == 2)
    $numOfDays = 29;
while($pDay <= $numOfDays)
{
    if($pDay < 10)
        $pDay="0".$pDay;
?>
        <option value=<?php echo $pDay ; if($pDay == $day) echo " selected='selected'"; ?>><?php echo $pDay ;?></option>
<?php
    $pDay++;
};
?>
                </select>
            </td>
            <td>
                <select name="grade" id="grade">
<?php
$sql = "select grade, name from ovtype;";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)) {
    list($grade, $gradeName) = $row;
?>
                    <option value="<?php echo $grade; ?>"><?php echo $gradeName; ?></option>
<?php
}
?>
                </select>
            </td>
            <td>
                <select name="hours" id="hours">
<?php
$i = 1;
while ($i <= 8) {
?>
                    <option value='<?php echo $i; ?>'><?php echo $i; ?></option>
<?php
    $i++;
}
?>
                </select>
                <input type=hidden name=operation value=overtime_add>
            </td>
        </tr>
        <tr class='tr_button'>
            <td colspan=5>
                <input type=reset value=' 清 空 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type=submit value=' 添 加 '>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>金钱相关，谨慎操作！</div>
<div id="height_add_bottom"></div>

<?php
@require_once "foot.php"
?>
