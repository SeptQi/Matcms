/**
 * Created by ki_hao on 2016.7.3.
 */
var login = {
    check : function(type) {
        //获取登录页面中的用户名和密码
        //2为修改用户信息
        if(type == 2){
            var realname = $('input[name = "editrealname"]').val();
            var email = $('input[name = "editemail"]').val();
            var url = "/index.php?c=index&a=editUserInfo"; 
            if (!realname) {
                    return dialog.error('昵称不能为空');
            }
            if (!email) {
                return dialog.error('邮箱不能为空');
            }
            var data = {'username' : username, 'realname' : realname,'email':email};
            $.post(url, data, function(result){
            if (result.status == 0) {
                return dialog.error(result.message);
            }
            if (result.status == 1) {
                return dialog.success(result.message, '');
            }
        }, 'JSON');
        }


        //0为登录
        if (type ==  0) {
            var username = $('input[name = "loginusername"]').val();
            var password = $('input[name = "loginpassword"]').val();
            var url = "/index.php?c=index&a=check";
            if (!username) {
                    return dialog.error('用户名不能为空');
                }
            if (!password) {
                return dialog.error('密码不能为空');
            }
        }
        // 1为注册
        if (type == 1) {
            var username = $('input[name = "signinusername"]').val();
            var password = $('input[name = "signinpassword"]').val();
            var realname = $('input[name = "realname"]').val();
            var email    = $('input[name = "email"]').val();
            var url = "/index.php?c=index&a=registerUser";
            if (!username) {
                return dialog.error('用户名不能为空');
            }
            if (!password) {
                return dialog.error('密码不能为空');
            }
            if (!realname) {
                return dialog.error('昵称不能为空');
            }
            if (!email) {
                return dialog.error('邮箱不能为空');
            }
        }
        var data = {'username' : username, 'password' : password,'realname':realname,'email':email};
        //执行异步请求
        $.post(url, data, function(result){
            if (result.status == 0) {
                return dialog.error(result.message);
            }
            if (result.status == 1) {
                return dialog.success(result.message, '');
            }
        }, 'JSON');
    }
};

