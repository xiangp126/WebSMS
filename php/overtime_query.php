<?php
@require_once "login_check.php";
@require_once "head.php";
?>

<script src="js/function.js" charset="utf-8"></script>
<div id="height_select_if_top"></div>
<div id="title_table">按员工号查询加班信息</div>
<table id="table_b_select">
    <form action="overtime_edit.php" method="post" name="overtime_query">
        <tr>
            <td>员工编号</td>
            <td><input type="text" name="id"></td>
            <td>
                <input type="hidden" name="operation" value="overtime_query">
                <input type="submit" value="查询" onclick='return check_id(this.form)'>
            </td>
        </tr>
    </form>
</table>
<div id="height_select_if_bottom"></div>

<?php
@require_once "foot.php";
?>
