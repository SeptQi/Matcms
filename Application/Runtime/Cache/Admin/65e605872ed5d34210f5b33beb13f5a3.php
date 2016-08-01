<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MAT后台管理平台</title>
    <!-- Bootstrap Core CSS -->
    <link href="/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Public/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Public/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/Public/css/sing/common.css" />
    <link rel="stylesheet" href="/Public/css/party/bootstrap-switch.css" />
    <link rel="stylesheet" type="text/css" href="/Public/css/party/uploadify.css">

    <!-- jQuery -->
    <script src="/Public/js/jquery.js"></script>
    <script src="/Public/js/bootstrap.min.js"></script>
    <script src="/Public/js/dialog/layer.js"></script>
    <script src="/Public/js/dialog.js"></script>
    <script type="text/javascript" src="/Public/js/party/jquery.uploadify.js"></script>

</head>
<body>
<div id="wrapper">

  <?php
 $navs = D('Menu')->where($where)->getAdminMenus(); $index = 'index'; ?>
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <a class="navbar-brand" ><img src="/Public/images/logo.png" style="height: 20px;" class="pull-left">内容管理平台</a>
  </div>
  <!-- Top Menu Items -->
  <ul class="nav navbar-right top-nav">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 王大麻 <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li>
          <a href="/admin.php?c=admin&a=personal"><i class="fa fa-fw fa-user"></i> 个人中心</a>
        </li>
       
        <li class="divider"></li>
        <li>
          <a href="/admin.php?c=login&a=loginout"><i class="fa fa-fw fa-power-off"></i> 退出</a>
        </li>
      </ul>
    </li>
  </ul>
  <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav nav_list">
      <li <?php echo (getActive($index)); ?>>
        <a href="/admin.php"><i class="fa fa-fw fa-dashboard"></i>首页</a>
      </li>
      <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li <?php echo (getActive($nav["c"])); ?>>
          <a href="<?php echo (getAdminMenuUrl($nav)); ?>"><i class="fa fa-fw fa-dashboard"></i><?php echo ($nav["name"]); ?><span class="badge pull-right"><?php echo (getCount($nav["c"])); ?></span></a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>


  <div id="page-wrapper">

    <div class="container-fluid" >

      <!-- Page Heading -->
      <div class="row">
        <div class="col-md-12">
          <ol class="breadcrumb">
            <li>
              <i class="fa fa-dashboard"></i><a href="/admin.php?c=content"> 用户管理 </a>
            </li>
            <li class="active">
              <i class="fa fa-table"></i> 用户列表
            </li>
          </ol>
        </div>
      </div>
      <div class="pull-left">
        <button id="button-add" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> 添&nbsp;&nbsp;&nbsp;&nbsp;加 </button>
      </div>
      <!-- /.row -->
      <div class="row">
        <form action="/admin.php" method="get">

          <div class="col-md-3">
            <div class="input-group">
              <span class="input-group-addon">用户类型</span>
              <select class="form-control" name="type">
                <option value=''>请选择用户类型</option>
                <option value="2" <?php if($conds["type"] == 2): ?>selected<?php endif; ?>>后台用户</option>
                <option value="1" <?php if($conds["type"] == 1): ?>selected<?php endif; ?>>前台用户</option>
              </select>
            </div>
          </div>

          <input type="hidden" name="c" value="user"/>
          <input type="hidden" name="a" value="index"/>
          <div class="col-md-3">
            <div class="input-group">

              <span class="input-group-addon">搜索用户</span>
              <input class="form-control" name="title" type="text" value="<?php echo ($conds["title"]); ?>"/>
                <span class="input-group-btn">
                  <button id="sub_data" type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
                </span>
            </div>
          </div>
        </form>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <h3></h3>
          <div class="table-responsive">
            <form id="singcms-listorder">
              <table class="table table-bordered table-hover singcms-table">
                <thead>
                <tr>
                  <th id="singcms-checkbox-all" width="10"><input type="checkbox"/></th>
                  <th>用户id</th>
                  <th>用户名</th>
                  <th>上次登录IP</th>
                  <th>上次登录时间</th>
                  <th>邮箱地址</th>
                  <th>真实名字</th>
                  <th>状态</th>
                  <th>类型</th>
                </tr>
                </thead>
                <tbody>
                  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
                      <td><input type="checkbox" name="pushcheck" value="<?php echo ($data["news_id"]); ?>"></td>
                      <td><?php echo ($data["admin_id"]); ?></td>
                      <td><?php echo ($data["username"]); ?></td>
                      <td><?php echo ($data["lastloginip"]); ?></td>
                      <td><?php echo (date('Y-m-d H:i:s',$data["lastlogintime"])); ?></td>
                      <td><?php echo ($data["email"]); ?></td>
                      <td><?php echo ($data["realname"]); ?></td>
                      <td><span attr-status="<?php if($data["status"] == 1): ?>1<?php else: ?>0<?php endif; ?>"  attr-id="<?php echo ($data["user_id"]); ?>" class="sing_cursor singcms-on-off" id="singcms-on-off" ><?php echo (status($new["status"])); ?></span></td>
                      <td><?php echo (getUserType($data["type"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
              </table>
            </form>
          </div>
          <div class="pull-left">
            <ul class='pagination'>
              <?php echo ($pageres); ?>
            </ul>
          </div>
        </div>
      </div>
      <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->
<script>
  var SCOPE = {
    'edit_url' : '/admin.php?c=user&a=edit',
    'add_url' : '/admin.php?c=user&a=add',
    'set_status_url' : '/admin.php?c=user&a=setStatus',
    'sing_news_view_url' : '/index.php?c=view',
    'listorder_url' : '/admin.php?c=user&a=listorder',
    'push_url' : '/admin.php?c=user&a=push',
  }
</script>
<script src="/Public/js/admin/common.js"></script>



</body>

</html>