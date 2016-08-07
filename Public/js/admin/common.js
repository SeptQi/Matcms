/**
 *添加按钮操作
 */
$("#button-add").click(function () {
    var url = SCOPE.add_url;
    window.location.href=url;
});

/**
 * 提交form表单操作
 */
$("#singcms-button-submit").click(function () {
    //传来数据转为数组
    var data = $("#singcms-form").serializeArray();
    var postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    var url = SCOPE.save_url;     //'save_url' : '/admin.php?c=content&a=add'
    var jump_url = SCOPE.jump_url;//'jump_url' : '/admin.php?c=content'
    //将获取的数据post给服务器
    $.post(url, postData, function (result) {
        if (result.status == 1) {
            //成功
            return dialog.success(result.message, jump_url);
        }else if (result.status == 0) {
            //失败
            return dialog.error(result.message);
        }
    }, "JSON")
});

/**
 * 编辑模型
 */
$(".singcms-table #singcms-edit").on('click', function() {
    var id = $(this).attr('attr-id');
    var url = SCOPE.edit_url+"&id="+id;
    window.location.href = url;
});

/**
 * 删除模型
 */
$(".singcms-table #singcms-delete").on('click', function () {
    var id = $(this).attr('attr-id');
    var a = $(this).attr('attr-a');
    var message = $(this).attr('attr-message');
    var url = SCOPE.set_status_url; //'set_status_url' : '/admin.php?c=content&a=setStatus',
    //
    data = {};
    data['id'] = id;
    data['status'] = -1;
    //弹窗确认
    layer.open({
        type : 0,
        title : '是否提交',
        btn : ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content : '是否确定'+message,
        scrollbar : true,
        yes : function () {
            todelete(url, data);
        }
    })
});

function  todelete(url, data) {
    $.post(url, data, function(s) {
        if (s.status == 1) {
            return dialog.success(s.message, '');//转到当前页面
        } else {
            return dialog.error(s.message);
        }
    },'json')
}

/**
 * 排序操作
 */
$("#button-listorder").click(function () {
    //获取内容
    var data = $("#singcms-listorder").serializeArray();
    var postData = {};
    $(data).each(function (i) {
        postData[this.name] = this.value;
    });
    //将获取的数据post给服务器
    var url = SCOPE.listorder_url; //'listorder_url' : '/admin.php?c=content&a=listorder',
    $.post(url, postData, function (result) {
        if (result.status == 1) {
            //成功
            return dialog.success(result.message, result['data']['jump_url']);
        }else if (result.status == 0) {
            //失败
            return dialog.error(result.message, result['data']['jump_url']);
        }
    }, "JSON")
});

/**
 * 修改状态
 */
$(".singcms-table #singcms-on-off").on('click', function () {
    var id = $(this).attr('attr-id');
    var status = $(this).attr('attr-status');
    var url = SCOPE.set_status_url; //'set_status_url' : '/admin.php?c=content&a=setStatus',
    data = {};
    data['id'] = id;
    data['status'] = status;
    layer.open({
        type : 0,
        title : '是否提交',
        btn : ['yes', 'no'],
        icon : 3,
        closeBtn : 2,
        content : '是否确定更改状态',
        scrollbar : true,
        yes : function () {
            todelete(url, data);
        }
    })
});

/**
 * 推送相关
 */
$("#singcms-push").on('click', function(){
    var id = $("#select-push").val();
    if (id == 0) {
        return dialog.error('请选择推荐位');
    }
    push = {};
    pushData = {};
    $("input[name = 'pushcheck']:checked").each(function(i){
        push[i] = $(this).val();
    });
    pushData['push'] = push;
    pushData['position_id'] = id;
    var url = SCOPE . push_url;
    $.post(url, pushData, function(result){
        if (result.status == 1) {
            return dialog.success(result.message, result['data']['jump_url']);
        }
        if (result.status == 0) {
            return dialog.error(result.message);
        }
    }, "JSON");
})