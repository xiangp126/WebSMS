function checkSubmit(form) {
    if (form.username.value == '') {
        alert("请输入用户名！");
        form.username.focus();
        return false;
    }
    if (form.password.value == '') {
        alert("请输入登录密码！");
        form.password.focus();
        return false;
    }
    document.login_form.submit();
}

function forgetPwd() {
    alert("忘了就忘了吧！");
}

function letRegister() {
    alert("没有就没有吧！");
}
