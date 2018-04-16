<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
?>

<script src="js/function.js" charset="utf-8"></script>
<div id="height_add_top"></div>
<div id='title_table'>添加员工信息</div>
<table id='table_a'>
    <form action=action.php method=post name=personel_add>
        <tr id='tr'>
            <td>员工编号</td>
            <td>级别</td>
            <td>所属部门</td>
            <td>姓名</td>
            <td>性别</td>
            <td>年龄</td>
            <td>电话</td>
            <td>住址</td>
        </tr>
        <tr>
<?php
@require_once "conn.php";
// Get the minimum available ID frome table 'personel'
$sql = "select min(t1.id + 1) as nextid from personel t1 left join personel t2 on t1.id + 1 = t2.id where t2.id is null;";
$result = mysql_query($sql);
if ($row = mysql_fetch_array($result))
    list($newID) = $row;
if ($newID == "") {
    $newID = 10001;
}
?>
            <td><input type='text' name='id' value='<?php echo $newID; ?>' readonly='readonly' size=12 style="text-align:center;"></td>
            <td>
                <select name='level'>
                    <option value="4" selected='selected'>4级</option>
                    <option value="5">5级</option>
                    <option value="6">6级</option>
                    <option value="7">7级</option>
                    <option value="8">8级</option>
                    <option value="9">9级</option>
                </select>
            </td>
            <td>
                <select name='dp_id'>
                    <option value="1" selected='selected'>业务销售部</option>
                    <option value="2">技术产业部</option>
                    <option value="3">产品设计部</option>
                </select>
            </td>
            <td><input type=text name='name' size=20></td>
            <td>
                <select name='sex'>
                    <option value="男" selected='selected'>男</option>
                    <option value="女">女</option>
                </select>
            </td>
            <td><input type=text name='age' size=6></td>
            <td><input type=text name='tel' size=18></td>
            <td>
                <input type=text name='address' size=34>
                <input type=hidden name='operation' value=personel_add>
            </td>
        </tr>
        <tr class='tr_button'>
            <td colspan=8>
                <input type=reset value=' 清 空 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type=submit value=' 添 加 ' ' onclick='return check_personel(this.form)'>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>员工编号自动生成，无需填写！</div>
<div id="height_add_bottom"></div>

<?php
@require_once "foot.php"
?>
