<?php if (!defined('THINK_PATH')) exit(); $config = D('Basic')->select(); $navs = D('Menu')->getBarMenus(); ?>
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
    <!-- js -->
</head>
<body>
<!-- header -->
<div class="header">
     <div class="container">
         <div class="logo">
               <h1><a href="<?php echo U('index');?>">MAT CMS</a></h1>
         </div> 
         <div class="top-menu">
             <span class="menu"></span>
              <ul>
                <li class="<?php if($result['catId'] == 0): ?>active<?php endif; ?>"><a href="/">首页</a></li>
                <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li class="<?php if($nav['menu_id'] == $result['catid']): ?>active<?php endif; ?>"><a href="/index.php?c=cat&id=<?php echo ($nav['menu_id']); ?>"><?php echo ($nav['name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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
     <div class="social">            
             <a href="#"><i class="facebook"></i></a>
             <a href="#"><i class="twitter"></i></a>
             <a href="#"><i class="dribble"></i></a>    
             <a href="#"><i class="google"></i></a> 
             <a href="#"><i class="youtube"></i></a>    
     </div>
        <div class="clearfix"></div>
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
<!--footer-->
<div class="footer">
     <div class="container">
         <div class="copywrite">
             <p>Copyright &copy; 2015.Company name All rights reserved.</p>
         </div>
         <div class="footer-menu">
             <ul>
                 <li class="active"><a href="<?php echo U('index');?>">首页</a></li>
                 <li><a href="<?php echo U('keji');?>">科技</a></li>
                 <li><a href="<?php echo U('xinwen');?>">新闻</a></li>
                 <li><a href="<?php echo U('tiyu');?>">体育</a></li>
                 <li><a href="<?php echo U('yole');?>">娱乐</a></li>
                 <li><a href="<?php echo U('join');?>">加入我们</a></li>
             </ul>
         </div>
         <div class="clearfix"></div>
     </div>
</div>
<!-- //footer -->
</body>
</html>