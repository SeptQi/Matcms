<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>MAT内容管理平台</title>
<meta name="author" content="DeathGhost" />
<link rel="stylesheet" type="text/css" href="/Public/css/loginstyle.css" />
<style>
body{height:100%;background:#2C3E50;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/Public/js/jquery.js"></script>
<script src="/Public/js/Particleground.js"></script>
<script src="/Public/js/dialog/layer.js"></script>
<script src="/Public/js/dialog.js"></script>
<script src="/Public/js/admin/login.js"></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#fff',
    lineColor: '#fff'
  });
});
$(window).keydown(function(event){
  if(event.keyCode == "13"){
    login.check();
  }
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <img src="/Public/images/logo.png" style="width: 250px;">
 </dt>
 <dt>
  <strong>MAT内容管理平台</strong>
  <em>MAT Content Manage System</em>
 </dt>
 <form class="form-signin" enctype="multipart/form-data"  method="post">
   <dd class="user_icon">
    <input type="text" title="" class="form-control login_txtbx" name="username" placeholder="用户名" required autofocus>
   </dd>
   <dd class="pwd_icon">
    <input type="password" name="password" id="inputPassword" class="form-control login_txtbx" placeholder="密码" required>
   </dd>
   <dd>
    <button class="btn btn-lg btn-primary btn-block submit_btn" type="button" onclick="login.check()">登录</button>
   </dd>
   <dd>
    <p>Create By MAT</p>
   </dd>
 </form>
</dl>
</body>
</html>