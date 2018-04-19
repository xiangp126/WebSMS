<?php
header("Content-type: text/html; charset=utf8");
@require_once "login_check.php";
@require_once "head.php";
?>

<div id="height_select_if_top"></div>
<div id='title_table'>选取添加级别的部门</div>
<table id='table_shrink'>
    <form action=position_add.php method=post name=position_add_s>
        <tr id='tr'>
            <td>部门名称</td>
            <td>操作部分</td>
        </tr>
        <tr>
            <td>
                <select name='dp_id'>
                    <option value="1" selected='selected'>业务销售部</option>
                    <option value="2">技术产业部</option>
                    <option value="3">产品设计部</option>
                </select>
            </td>
            <td>
                <input type=reset value=' 清 空 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type=submit value=' 添 加 '>
            </td>
        </tr>
    </form>
</table>
<div id='hint'><span>%提示：</span>选取成功后，点击添加！</div>
<div id="height_add_bottom"></div>

<?php
@require_once "foot.php"
?>
