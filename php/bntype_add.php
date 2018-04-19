<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
?>

<script src="js/function.js" charset="utf-8"></script>
<div id="height_select_if_top"></div>
<div id='title_table'>添加奖金类别信息</div>
<table id='table_a'>
    <form action=action.php method=post name=bntype_add>
        <tr id='tr'>
            <td>奖金类别号</td>
            <td>奖金类别名称</td>
        </tr>
        <tr>
<?php
@require_once "conn.php";
// Get the minimum available grade-id frome table
$sql = "select min(t1.grade + 1) as nextgrade from bntype t1 left join bntype t2 on t1.grade + 1 = t2.grade where t2.grade is null;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
    list($newGrade) = $row;
if ($newGrade == "") {
    $newGrade = 1;
}
?>
            <td><input type='text' name='grade' value='<?php echo $newGrade; ?>' readonly='readonly' size=8 style="text-align:center;"></td>
            <td><input type=text name='name' size=30></td>
            <td>
                <input type=hidden name='operation' value=bntype_add>
            </td>
        </tr>
        <tr class='tr_button'>
            <td colspan=3>
                <input type=reset value=' 清 空 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type=submit value=' 添 加 ' ' onclick='return check_bntype(this.form)'>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>奖金类别号自动生成，无需填写！</div>
<div id="height_add_bottom"></div>

<?php
@require_once "foot.php"
?>
