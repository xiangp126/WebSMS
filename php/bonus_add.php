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
<div id='title_table'>添加奖金信息</div>
<table id='table_a'>
    <form action=action.php method=post name=position_add>
        <tr id='tr'>
            <td>员工编号</td>
            <td>加班日期</td>
            <td>加班类别</td>
            <td>奖金数额</td>
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
                <input type="hidden" value="<?php echo $year; ?>" name="year" id="year"/><?php echo $year.'-'; ?>
                <select name="month" id="month">
<?php
$pMonth = 1;
$numOfMonths = 12;
while($pMonth <= $numOfMonths)
{
    if($pMonth < 10)
        $pMonth="0".$pMonth;
?>
        <option value=<?php echo $pMonth ; if($pMonth == $month) echo " selected='selected'"; ?>><?php echo $pMonth ;?></option>
<?php
    $pMonth++;
};
?>
                </select>
            </td>
            <td>
                <select name="grade">
<?php
$sql = "select grade, name from bntype;";
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
                <input type='text' name='bonus'>
                <input type=hidden name=operation value=bonus_add>
            </td>
        </tr>
        <tr class='tr_button'>
            <td colspan=5>
                <input type=reset value=' 清 空 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type=submit value=' 添 加 ' onclick='return check_bonus(this.form)'>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>金钱相关，谨慎操作！</div>
<div id="height_add_bottom"></div>

<?php
@require_once "foot.php"
?>
