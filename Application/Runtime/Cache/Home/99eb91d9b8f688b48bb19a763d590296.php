<?php if (!defined('THINK_PATH')) exit(); $config = D('Basic')->select(); $navs = D('Menu')->getBarMenus(); $catId = $_GET['id'] ? $_GET['id'] : 0; ?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo ($config['title']); ?></title>
    <!--fonts-->
        <link href='/Public/css/font.css' rel='stylesheet' type='text/css'>    
    <!--//fonts-->      
        <link href="/Public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
        <link href="/Public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- for-mobile-apps -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="<?php echo ($config['keywords']); ?>" />
        <meta name="description" content="<?php echo ($config['description']); ?>" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <!-- js -->
        <script src="/Public/js/jquery.js"></script>
        <script src="/Public/js/bootstrap.min.js"></script>
        <script src="/Public/js/dialog/layer.js"></script>
        <script src="/Public/js/dialog.js"></script>
        <script src="/Public/js/home/login.js"></script>
        <script src="/Public/js/jquery.pin.min.js"></script>
    <!-- js -->
</head>
<body>
<!-- header -->
<div class="header">
     <div class="container">
         <div class="logo">
               <h1><a href="/">MAT CMS</a></h1>
         </div> 
          <div class="pull-right">
               <ul class="nav nav-pills">
                 <li role="presentation" <?php if($catId == 0): ?>class="active"<?php endif; ?> ><a href="/">首页</a></li>
                 <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li role="presentation" <?php if($catId == $nav["menu_id"] ): ?>class="active"<?php endif; ?> >
                       <a href="/index.php?c=cat&id=<?php echo ($nav['menu_id']); ?>"><?php echo ($nav["name"]); ?></a>
                     </li><?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>           
          </div>
         <!-- script-for-menu -->
         <script>
                $("span.menu").click(function(){
                    $(".top-menu ul").slideToggle("slow" , function(){
                    });
                });
         </script>
         <!-- script-for-menu -->       

         <div class="clearfix"></div>
     </div>
</div>
<!-- //header -->
<!-- banner -->
<div class="strip">
     <div class="container">
     <div class="search">
            <form>
                <input type="text" value="" placeholder="Search...">
                <input type="submit" value="">
            </form>
     </div>  

      <?php if($_SESSION['userInfo']['username']): ?><div class="social">  
              <span class="btn btn-primary">欢迎回来：<?php echo ($_SESSION['userInfo']['username']); ?></span>
              <a href='/index.php?c=index&a=loginout'><button class="btn btn-primary">退出登录</button></a>
             </div>
        <?php else: ?>
          <div class="social">  
              <button class="btn btn-primary" data-toggle="modal" data-target="#login" logintype="1">登录</button>
              &nbsp;&nbsp;&nbsp;&nbsp;
              <button class="btn btn-primary" data-toggle="modal" data-target="#signin" logintype="0">注册</button>          
           </div><?php endif; ?>

    

        <div class="clearfix"></div>
        </div>
</div>
<!-- login -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">欢迎登录</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">用户名：</label>
            <input type="text" class="form-control" name="loginusername">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">密码：</label>
            <input type="password" class="form-control" name="loginpassword">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>
        <button type="button" class="btn btn-primary" onclick="login.check('0')">提交</button>
      </div>
    </div>
  </div>
</div>
<!-- signin -->
<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">快速注册</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">用户名：</label>
            <input type="text" class="form-control" name="signinusername">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">密码：</label>
            <input type="password" class="form-control" name="signinpassword">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">昵称：</label>
            <input type="text" class="form-control" name="realname">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">邮箱：</label>
            <input type="text" class="form-control" name="email">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" >关闭</button>
        <button type="button" class="btn btn-primary" onclick="login.check('1')">提交</button>
      </div>
    </div>
  </div>
</div>
<!-- 404 -->
<div class="error" style="padding: 10px; min-height: 570px;">
	 <div class="container">
		  <div class="error-main">
				<h3>404<span>error</span>
				<h5>网站建设中</h5>
				<p>敬请期待...</p>
				<a href="<?php echo U('index');?>">返回首页</a>
		 </div>
	 </div>
</div>
<!-- //404 -->
<!-- content-bottom -->
<div class="content-info">
     <div class="container">
      <div class="ftrd-head text-center">
             <h3> 关于我们 | ABOUT US</h3>
         </div>
         <div class="content-bottom-grids">
            <div class="col-md-4 coach">
                 <div class="coch-grid chr">
                     <div class="coach-pic">
                         <img src="/Public/images/logo_square.png" alt=""/>
                     </div>
                     <div class="coach-pic-info">
                         <h4><a href="#">mat cms</a></h4>
                         <h5>科技 新闻 娱乐 体育 资讯整合</h5>
                         <p>“基于ThinkPHP 小组项目”</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="coch-grid">
                     <div class="coach-pic">
                         <img src="/Public/images/李变蕊.jpg" alt=""/>
                     </div>
                     <div class="coach-pic-info">
                         <h4><a href="#">李变蕊</a></h4>
                         <h5>主要职责</h5>
                         <p>“每人一句话”</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
            </div>
            <div class="col-md-4 coach">
                <div class="coch-grid chr">
                         <div class="coach-pic">
                             <img src="/Public/images/韩玉琪.jpg" alt=""/>
                         </div>
                         <div class="coach-pic-info">
                             <h4><a href="#">韩玉琪</a></h4>
                             <h5>主要职责</h5>
                             <p>“右边那个，亲一口”</p>
                         </div>
                         <div class="clearfix"></div>
                </div>
                 <div class="coch-grid">
                     <div class="coach-pic">
                         <img src="/Public/images/谭满.jpg" alt=""/>
                     </div>
                     <div class="coach-pic-info">
                         <h4><a href="#">谭满</a></h4>
                         <h5>主要职责</h5>
                         <p>“每人，一句话”</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
            </div>
            <div class="col-md-4 coach">
                 <div class="coch-grid chr">
                     <div class="coach-pic">
                         <img src="/Public/images/吴高强.jpg" alt=""/>
                     </div>
                     <div class="coach-pic-info">
                         <h4><a href="#">吴高强</a></h4>
                         <h5>主要职责</h5>
                         <p>“切，不要！”</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
                 <div class="coch-grid">
                     <div class="coach-pic">
                         <img src="/Public/images/万辉.jpg" alt=""/>
                     </div>
                     <div class="coach-pic-info">
                         <h4><a href="#">万辉</a></h4>
                         <h5>主要职责</h5>
                         <p>“每人，一句话”</p>
                     </div>
                     <div class="clearfix"></div>
                 </div>
            </div>
            <div class="clearfix"></div>
         </div>
     </div>
</div>
<!-- //content-bottom -->
<!--footer-->
<div class="footer">
     <div class="container">
         <div class="copywrite">
             <p>Copyright &copy; 2016 . MAT Team All rights reserved.</p>
         </div>
         <div class="clearfix"></div>
     </div>
</div>
<!-- //footer -->
</body>
</html>
<script type="text/javascript">
$(".pinned").pin({containerSelector: "#container", minWidth: 940});
</script>