// function.js

// Edit personel info -- start
function personel_edit(id, level, dp_id, name, sex, age, tel, address, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'> 编辑&nbspNO.<span id='select_name'>"
                   + id + "</span>&nbsp 员工信息</div>");
    document.write("<table id='table_c'><form action=action.php?page="+ page +"  method=post name='personel_edit'><tr id='tr'><td>员工编号</td><td>级别</td><td>所属部门</td><td>姓名</td><td>性别</td><td>年龄</td><td id='tel'>电话</td><td id='address'>住址</td></tr>");
    document.write("<tr><td><input type='hidden' name='id' value=" + id
                   + ">" + id + "</td><td><input type='text' name='level' value="
                   + level + " size=6></td><td><input type='text' name='dp_id' value="
                   + dp_id + " size=6></td><td><input type='text' name='name'  value="
                   + name  + " size=10></td><td><select name='sex'><option value='男'");
    if (sex == '男')
        document.write("selected='selected'");
    document.write(">&nbsp;男&nbsp;</option><option value='女' ");
    if (sex == '女')
        document.write("selected='selected'");
    document.write(">&nbsp;女&nbsp;</option></select></td><td><input type=text name=age value="
                   + age
                   + " size=6></td><td><input type=text name=tel size=18 value="
                   + tel
                   + "></td><td><input type=text name=address size=34 value="
                   + address
                   + "><input type=hidden name=operation value=personel_edit></td></tr><tr class='tr_button'><td colspan=8><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 ' onclick='return check_personel(this.form)'></td></tr></form></table><div id='hint'><span>%提示：</span>员工编号不可修改！</div></body></html>");
}

function personel_del(id, page) {
    if (confirm("请谨慎操作，你确定要删除 " + id + " 号员工的信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=personel_del><input type=hidden name=id value="
                       + id
                       + "><input type=hidden name=operation value=personel_del></form>");
    }
    document.personel_del.submit();
}
// Edit personel info -- end

// Edit position info --start
function position_edit(dp_id, dp_name, level, title, bsalary, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
                   + dp_id
                   + "部门&nbsp;"
                   + level
                   + "级&nbsp;</span>职称基础薪水</div>");
    document.write("<table id='table_a'><form action=action.php?page="+ page +" method=post name=position_edit><tr id='tr'><td>部门号</td><td>部门名称</td><td>级别号</td><td>头衔</td><td>基础薪水</td></tr>");
    document.write("<tr><td><input type=hidden name=dp_id value="
                   + dp_id
                   + ">"
                   + dp_id
                   + "</td><td><input type=text size=16 name=dp_name value="
                   + dp_name
                   + "></td><td><input type=hidden size=8 name=level value="
                   + level
                   + ">"
                   + level
                   + "</td><td><input type=text size=16 name=title value="
                   + title
                   + "></td><td><input type=text size=12 name=bsalary value="
                   + bsalary
                   + "></td><input type=hidden name=operation value=position_edit></td></tr><tr class='tr_button'><td colspan=5><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 ' ' onclick='return check_position(this.form)'></td></tr></form></table><div id='hint'><span>%提示：</span>部门号、级别号不可修改！</div></body></html>");
}

function position_del(dp_id, level, page) {
    if (confirm("请谨慎操作，你确定要删除 "+ dp_id +"部门 "+ level +"  职称信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=position_del><input type=hidden name=dp_id value="
                       + dp_id
                       + "><input type=hidden name=level value="
                       + level
                       + "><input type=hidden name=operation value=position_del></form>");
    }
    document.position_del.submit();
}
// Edit position info -- end

// Edit overtime info -- start
function overtime_edit(id, name, year, month, day, grade, hours, max_grade, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
               + id
               + "号</span>员工&nbsp;<span id='select_name'>"
               + year
               + '年' + month + '月' + day + "日</span>&nbsp;加班信息</div>");
    document.write("<table id='table_a'><form action=action.php?page="+ page +" method=post name=overtime_edit><tr id='tr'><td>员工编号</td><td>姓名</td><td>加班日期</td><td>加班类别</td><td>加班时长</td></tr>");
    document.write("<tr><td><input type=hidden name=id value=" + id
               + ">" + id
               + "</td><td><input type=hidden name=name value=" + name
               + ">" + name
               + "</td><td><input type=hidden name=year value="
               + year + "><input type=hidden name=month value="
               + month + "><input type=hidden name=day value="
               + day + ">" + year + '-' + month + '-' + day
               + "</td><td><select name=grade>");
    var i = 1;
    while (i <= max_grade) {
        document.write("<option value=" + i);
        if (grade == i) {
            document.write(" selected='selected'");
        }
        document.write(" >" + i + "</option>");
        i++;
    }
    document.write("</select></td><td><select name=hours>");
    var i = 1;
    while (i <= 8) {
        document.write("<option value=" + i);
        if (i == hours)
            document.write(" selected='selected'");
        document.write(">" + i + "</option>");
        i++;
    }
    document.write("</select><input type=hidden name=operation value=overtime_edit></td></tr><tr class='tr_button'><td colspan=5><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 '></td></tr></form></table><div id='hint'><span>%提示：</span>员工编号、加班日期此处不可不可修改！</div></body></html>");
}

function overtime_del(id, year, month, day, page) {
    if (confirm("请谨慎操作，你确定要删除 " + id + " 号员工 " + year + '-' + month + '-' + day + " 的加班信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=overtime_del><input type=hidden name=id value="
                       + id
                       + "><input type=hidden name=year value="
                       + year
                       + "><input type=hidden name=month value="
                       + month
                       +"><input type=hidden name=day value="
                       + day
                       + "><input type=hidden name=operation value=overtime_del></form>");
    }
    document.overtime_del.submit();
}
// Edit overtime info -- end

// Edit overtime type info -- start
function ovtype_edit(grade, name, wage, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
               + grade + "级</span>&nbsp;请假类别信息</div>");
    document.write("<table id='table_c'><form action=action.php?page="+ page +" method=post name=ovtype_edit><tr id='tr'><td>请假类别</td><td>请假类别名称</td><td>每小时扣薪</td></tr>");
    document.write("<tr><td><input type=hidden name=grade value="
               + grade
               + ">"
               + grade
               + "</td><td><input type=text name=name value="
               + name
               + " size=30></td><td><input type=text name=wage value="
               + wage
               + " size=20><input type=hidden name=operation value=ovtype_edit></td></tr><tr class='tr_button'><td colspan=3><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 ' onclick='return check_ovtype(this.form)'></td></tr></form></table><div id='hint'><span>%提示：</span>请假类别不可修改！</div></body></html>");
}

function ovtype_del(grade, page) {
    if (confirm("请谨慎操作，你确定要删除 " + grade + "级类别 的信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=ovtype_del><input type=hidden name=grade value="
                       + grade
                       + "><input type=hidden name=operation value=ovtype_del></form>");
    }
    document.ovtype_del.submit();
}
// Edit overtime type info -- end

// Edit leave info -- start
function leave_edit(id, name, year, month, day, grade, hours, max_grade, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
               + id
               + "号</span>员工&nbsp;<span id='select_name'>"
               + year
               + '年' + month + '月' + day + "日</span>&nbsp;请假信息</div>");

    document.write("<table id='table_a'><form action=action.php?page="+ page +" method=post name=leave_edit><tr id='tr'><td>员工编号</td><td>姓名</td><td>请假日期</td><td>请假类别</td><td>请假时长</td></tr>");
    document.write("<tr><td><input type=hidden name=id value=" + id
               + ">" + id
               + "</td><td><input type=hidden name=name value=" + name
               + ">" + name
               + "</td><td><input type=hidden name=year value="
               + year + "><input type=hidden name=month value="
               + month + "><input type=hidden name=day value="
               + day + ">" + year + '-' + month + '-' + day
               + "</td><td><select name=grade>");
    var i = 1;
    while (i <= max_grade) {
        document.write("<option value=" + i);
        if (grade == i) {
            document.write(" selected='selected'");
        }
        document.write(" >" + i + "</option>");
        i++;
    }
    document.write("</select></td><td><select name=hours>");
    var i = 1;
    while (i <= 8) {
        document.write("<option value=" + i);
        if (i == hours)
            document.write(" selected='selected'");
        document.write(">" + i + "</option>");
        i++;
    }
    document.write("</select><input type=hidden name=operation value=leave_edit></td></tr><tr class='tr_button'><td colspan=5><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 '></td></tr></form></table><div id='hint'><span>%提示：</span>员工编号、请假日期此处不可不可修改！</div></body></html>");
}

function leave_del(id, year, month, day, page) {
    if (confirm("请谨慎操作，你确定要删除 " + id + " 号员工 " + year + '-' + month + '-' + day + " 的请假信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=leave_del><input type=hidden name=id value="
                       + id
                       + "><input type=hidden name=year value="
                       + year
                       + "><input type=hidden name=month value="
                       + month
                       +"><input type=hidden name=day value="
                       + day
                       + "><input type=hidden name=operation value=leave_del></form>");
    }
    document.leave_del.submit();
}
// Edit leave info -- end

// Edit leave type info -- start
function lvtype_edit(grade, name, wage, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
               + grade + "级</span>&nbsp;请假类别信息</div>");
    document.write("<table id='table_a'><form action=action.php?page="+ page +" method=post name=lvtype_edit><tr id='tr'><td>请假类别</td><td>请假类别名称</td><td>每小时扣薪</td></tr>");
    document.write("<tr><td><input type=hidden name=grade value="
               + grade
               + ">"
               + grade
               + "</td><td><input type=text name=name value="
               + name
               + " size=30></td><td><input type=text name=wage value="
               + wage
               + " size=20><input type=hidden name=operation value=lvtype_edit></td></tr><tr class='tr_button'><td colspan=3><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 ' onclick='return check_lvtype(this.form)'></td></tr></form></table><div id='hint'><span>%提示：</span>请假类别不可修改！</div></body></html>");
}

function lvtype_del(grade, page) {
    if (confirm("请谨慎操作，你确定要删除 " + grade + "级类别 的信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=lvtype_del><input type=hidden name=grade value="
                       + grade
                       + "><input type=hidden name=operation value=lvtype_del></form>");
    }
    document.lvtype_del.submit();
}
// Edit leave type info -- end

// Edit bonus info -- start
function bonus_edit(id, name, year, month, grade, bonus, max_grade, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
                   + id
                   + "号</span>员工&nbsp;<span id='select_name'>"
                   + year
                   + '年' + month + "月</span>&nbsp;奖金信息</div>");

    document.write("<table id='table_a'><form action=action.php?page="+ page +" method=post name=bonus_edit><tr id='tr'><td>员工编号</td><td>姓名</td><td>奖金日期</td><td>奖金类别</td><td>奖金数额</td></tr>");
    document.write("<tr><td><input type=hidden name=id value="
                   + id
                   + ">" + id + "</td><td><input type=hidden name=name value="
                   + name + ">" + name + "</td><td><input type=hidden name=year value="
                   + year + "><input type=hidden name=month value="
                   + month + ">" + year + '-' + month
                   + "</td><td><select name=grade>");
    var i = 1;
    while (i <= max_grade) {
        document.write("<option value=" + i);
        if (grade == i) {
            document.write(" selected='selected'");
        }
        document.write(" >" + i + "</option>");
        i++;
    }
    document.write("</select></td><td><input type='text' name='bonus' value="
                   + bonus
                   + "><input type=hidden name=operation value=bonus_edit></td></tr><tr class='tr_button'><td colspan=5><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 ' onclick='return check_bonus(this.form)'></td></tr></form></table><div id='hint'><span>%提示：</span>员工编号、奖金日期此处不可不可修改！</div></body></html>");
}

function bonus_del(id, year, month, page) {
    if (confirm("请谨慎操作，你确定要删除 " + id + " 号员工 " + year + '-' + month + " 的奖金信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=bonus_del><input type=hidden name=id value="
                       + id
                       + "><input type=hidden name=year value="
                       + year
                       + "><input type=hidden name=month value="
                       + month
                       + "><input type=hidden name=operation value=bonus_del></form>");
    }
    document.bonus_del.submit();
}
// Edit bonus info -- end

// Edit bonus type info -- start
function bntype_edit(grade, name, page) {
    document.write("<!DOCTYPE html><html><head><meta http-equiv='Content-Type' content='text/html; charset=utf8' /><link href='../css/style.css' rel='stylesheet' type='text/css' /></head>");
    document.write("<body><div id='title_table' class='title_edit'>编辑<span id='select_name'>&nbsp;"
               + grade + "级</span>&nbsp;奖金类别信息</div>");
    document.write("<table id='table_a'><form action=action.php?page="+ page +" method=post name=bntype_edit><tr id='tr'><td>奖金类别</td><td>奖金类别名称</td></tr>");
    document.write("<tr><td><input type=hidden name=grade value="
               + grade
               + ">"
               + grade
               + "</td><td><input type=text name=name value="
               + name
               + " size=30><input type=hidden name=operation value=bntype_edit></td></tr><tr class='tr_button'><td colspan=2><input type=reset value=' 还 原 '>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=' 保 存 ' onclick='return check_bntype(this.form)'></td></tr></form></table><div id='hint'><span>%提示：</span>奖金类别不可修改！</div></body></html>");
}

function bntype_del(grade, page) {
    if (confirm("请谨慎操作，你确定要删除 " + grade + "级类别 的信息？")) {
        document.write("<form action=action.php?page="+ page +" method=post name=bntype_del><input type=hidden name=grade value="
                       + grade
                       + "><input type=hidden name=operation value=bntype_del></form>");
    }
    document.bntype_del.submit();
}
// Edit bonus type info -- end

function salary_stats(id, name, year, month, preTax) {
    document.write("<form action='salary_stats.php' method='post' name='salary_stats'>");
    document.write("<input type=hidden name=id value="
               + id
               + "><input type=hidden name=name value="
               + name
               + "><input type=hidden name=year value="
               + year
               + "><input type=hidden name=month value="
               + month
               + "><input type=hidden name=preTax value="
               + preTax
               + "><input type='hidden' name='operation' value='salary_stats'></form>");
    document.salary_stats.submit();
}

function login_out(userid) {
    if (confirm(userid + "，您确定要注销登陆？")) {
        location.href = 'login_out.php';
    }
}

function check_personel(form) {
    var level = form.level.value;
    var regex = /^[1-9]{1,2}$/;
    if (level == '' || ! level.match(regex)) {
        alert('抱歉，员工级别 必须为2位以内阿拉伯数字！');
        form.level.focus();
        return false;
    }
    var dp_id = form.dp_id.value;
    // var regex = /^[1-9]{1,2}$/;
    if (dp_id == '' || ! dp_id.match(regex)) {
        alert('抱歉，部门编号 必须为2位以内阿拉伯数字岁！');
        form.dp_id.focus();
        return false;
    }
    var name = form.name.value;
    if (name == '' || name.length > '10') {
        alert('抱歉，员工姓名 必须填写并且长度小于10 ！');
        form.name.focus();
        return false;
    }
    var age = form.age.value;
    // var regex = /^[2-6][0-9]$/;
    var regex = /^1[89]|[2-9]\d$/;
    if (age == '' || ! age.match(regex)) {
        alert('抱歉，员工年龄 必须大于18岁！');
        form.age.focus();
        return false;
    }
    var tel = form.tel.value;
    regex = /^\d{3}-\d{8}|\d{4}-\d{8}|[1]\d{10}$/;
    if (tel == '' || ! tel.match(regex)) {
        alert('抱歉，电话号格式为“3或4位区号-8位电话号”或11位手机号！');
        form.tel.focus();
        return false;
    }
    var address = form.address.value;
    if (address.length > '40') {
        alert('抱歉，住址超长！');
        form.address.focus();
        return false;
    }
    document.myform.submit();
}

function check_position(form) {
    var dp_name = form.dp_name.value;
    if (dp_name == '' || dp_name.length > '10') {
        alert('抱歉，部门姓名 必须填写并且长度小于10 ！');
        form.dp_name.focus();
        return false;
    }
    var title = form.title.value;
    if (title == '' || title.length > '10') {
        alert('抱歉，职位头衔 必须填写并且长度小于10 ！');
        form.title.focus();
        return false;
    }
    var bsalary = form.bsalary.value;
    var regex = /^[1-9][0-9]{0,10}\.?[0-9]*$/;
    if (bsalary == '' || ! bsalary.match(regex)) {
        alert('抱歉，基础薪水 必须为阿拉伯数字且不以0开头 ！');
        form.bsalary.focus();
        return false;
    }
    document.myform.submit();
}

// check overtime-type
function check_ovtype(form) {
    var name = form.name.value;
    if (name == '' || name.length > '10') {
        alert('抱歉，奖金类别名称 必须填写并且长度小于10 ！');
        form.name.focus();
        return false;
    }
    var wage = form.wage.value;
    var regex = /^[1-9][0-9]{0,10}\.?[0-9]*$/;
    if (wage == '' || ! wage.match(regex)) {
        alert('抱歉，奖金时薪 必须小于11位数字并且不以0开头！');
        form.wage.focus();
        return false;
    }
    document.myform.submit();
}

// check leave-type
function check_lvtype(form) {
    var name = form.name.value;
    if (name == '' || name.length > '10') {
        alert('抱歉，请假类别名称 必须填写并且长度小于10 ！');
        form.name.focus();
        return false;
    }
    var wage = form.wage.value;
    var regex = /^\d{0,5}\.?[0-9]*$/;
    if (wage == '' || ! wage.match(regex)) {
        alert('抱歉，请假每小时扣薪 必须为阿拉伯数字，可以为0 ！');
        form.wage.focus();
        return false;
    }
    document.myform.submit();
}

function check_id(form) {
    var id = form.id.value;
    var regex = /^[1-9]\d{4}$/;
    if (id == '' || ! id.match(regex)) {
        alert('抱歉，员工查询号 必须为5位阿拉伯数字并且不以0开头！');
        form.id.focus();
        return false;
    }
    document.myform.submit();
}

function check_bonus(form) {
    var bonus = form.bonus.value;
    // var regex = /^\d{0,12}$/;
    var regex = /^\d{0,12}\.?[0-9]*$/;
    if (bonus == '' || ! bonus.match(regex)) {
        alert('抱歉，奖金数额 必须为阿拉伯数字，可以为0 ！');
        form.bonus.focus();
        return false;
    }
    document.myform.submit();
}

// check bonus-type
function check_bntype(form) {
    var name = form.name.value;
    if (name == '' || name.length > '10') {
        alert('抱歉，奖金类别名称 必须填写并且长度小于10 ！');
        form.name.focus();
        return false;
    }
    document.myform.submit();
}
