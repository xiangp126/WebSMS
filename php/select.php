<?php
@require_once "login_check.php";

$id = @$_GET['id'];
$gzh_num=@$_GET['gzh_num'];
$gzi_year=@$_GET['gzi_year'];
if(!$id&&!$gzh_num&&!$gzi_year)
{
?>
    <div id="height_select_if_top"></div>
<?php
}

if($operation == 'select_id') {
?>
    <div id="title_table">按编号查询员工工资信息</div>
    <table id="table_b_select">
        <form action="action.php" method="get" name="select_id">
            <tr>
                <td>员工编号</td>
                <td><input type="text" name="id"></td>
                <td>
                    <input type="hidden" name="operation" value="select_id">
                    <input type="submit" value="查询">
                </td>
            </tr>
        </form>
    </table>
<?php
}

if($operation=='select_bm')
{
    @require_once "conn.php";  // 连接数据库
    $gzh_result=mysql_query("select gzno , name from gongzhong ; ");
?>
    <div id="title_table">按名称查询部门工资信息</div>
    <table id="table_b_select"><form action="action.php" method="get" name="select_bm">
        <tr><td>部门名称</td><td><select name="gzh_num">
<?php
    while($gzh_row=mysql_fetch_array($gzh_result))
    {
        list($gzh_num_,$gzh_name)=$gzh_row;
        echo "<option value=".$gzh_num_.">&nbsp;&nbsp;&nbsp;".$gzh_name."&nbsp;&nbsp;</option>";
    };
?>
        </select></td><td><input type="hidden" name="operation" value="select_bm"><input type="submit" value="查询"></td></tr>
    </form></table>
<?php
}
if($operation=='select_tj')
{
    date_default_timezone_set('PRC');
    $tj_year=date('Y');
    $tj_month=date('m');
?>
    <div id="title_table">按年月查询工资信息</div>
    <table id="table_b_select"><form action="action.php" method="get" name="select_tj">
        <tr><td><select name="gzi_year">
<?php
    $i=0;
    while($i<5)
    {
        echo "<option value= ".$tj_year.">&nbsp;&nbsp;&nbsp;".$tj_year."&nbsp;&nbsp;</option>";
        $tj_year--;
        $i++;
    };
?>
        </select>&nbsp;年</td><td><select name="gzi_month">
<?php
    $i=1;
    while($i<=12)
    {
        if($i<10)
            $i="0".$i;
        echo "<option value= ".$i;
        if(($tj_month-1)==$i)
            echo " selected=selected";
        echo ">&nbsp;&nbsp;".$i."&nbsp;</option>";
        $i++;
    };
?>
        </select>&nbsp;月 </td><td><input type="hidden" name="operation" value="select_tj"><input type="submit" value="查询"></td></tr>
    </form></table>
<?php
}
if(!$id&&!$gzh_num&&!$gzi_year)
{
?>
    <div id="height_select_if_bottom"></div>
<?php
}
?>
