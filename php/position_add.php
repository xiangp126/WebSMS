<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
?>

<script src="js/function.js" charset="utf-8"></script>
<div id="height_add_top"></div>
<div id='title_table'>添加级别信息</div>
<table id='table_a'>
    <form action=action.php method=post name=position_add>
        <tr id='tr'>
            <td>部门号</td>
            <td>部门名称</td>
            <td>新级别号</td>
            <td>头衔</td>
            <td>基础薪水</td>
        </tr>
<?php
@require_once "conn.php";
// Find
$dp_id = $_POST['dp_id'];
if (! $dp_id) {
    $dp_id = @$_GET['dp_id'];
}
if (! $dp_id) {
    $dp_id = 1;
}
$sql = "select max(level) from position where dp_id = $dp_id;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    list($newLevel) = $row;
    $newLevel++;
}
$sql = "select dp_name from position where dp_id = $dp_id limit 1";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result)) {
    list($dp_name) = $row;
}
?>
        <tr>
            <td><input type='text' name='dp_id' value='<?php echo $dp_id; ?>' readonly='readonly' size=10 style="text-align:center;"></td>
            <td><input type='text' name='dp_name' value='<?php echo $dp_name; ?>' readonly='readonly' size=16 style="text-align:center;"></td>
            <td><input type='text' name='level' value='<?php echo $newLevel; ?>' readonly='readonly' size=10 style="text-align:center;"></td>
            <td><input type=text name='title' size=20></td>
            <td>
                <input type=text name='bsalary' size=20>
                <input type=hidden name='operation' value=position_add>
            </td>
        </tr>
        <tr class='tr_button'>
            <td colspan=5>
                <input type=reset value=' 清 空 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type=submit value=' 添 加 ' ' onclick='return check_position(this.form)'>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>新级别号自动生成，无需填写！</div>
<div id="height_add_bottom"></div>

<?php
@require_once "foot.php"
?>
