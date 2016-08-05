<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
                 <li role="presentation" <?php if($catId == 0): ?>class="active"<?php endif; ?> ><a href="/">首页 | HOME</a></li>
                 <?php if(is_array($navs)): $i = 0; $__LIST__ = $navs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li role="presentation" <?php if($catId == $nav["menu_id"] ): ?>class="active"<?php endif; ?> >
                       <a href="/index.php?c=cat&catid=<?php echo ($nav['menu_id']); ?>"><?php echo ($nav["name"]); ?></a>
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
        <h4 class="modal-title" id="exampleModalLabel">欢迎注册</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">用户名：</label>
            <input type="text" class="form-control" name="signinusername">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">密码：</label>
            <input type="text" class="form-control" name="signinpassword">
          </div>
          <div class="form-group" id="#asd">
            <label for="message-text" class="control-label">昵称：</label>
            <input type="text" class="form-control" name="realname">
          </div>
          <div class="form-group" id="#email">
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
<!-- about -->
<div class="about">
     <div class="container"  id="container">
         <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active"><?php echo (mb_substr($catname,5)); ?></li>
         </ol>
    <div class="about-grid col-md-8">
    <!-- about -->
<div class="about">
     <div class="container" style="width: 100%;">
     <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="about-grids">
             <h3 style="width: 500px;"><?php echo ($vo["title"]); ?></h3>
             <p class="abt-info"><?php echo (mb_substr($vo["content"],0,100)); ?></p>
             <div class="about-pic" style="width: 150px;">
                 <img src="<?php echo ($vo["thumb"]); ?>" alt=""/>
             </div>
             <div class="clearfix"></div>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>    
     </div>
</div>
<!-- //about -->
    <!-- gallery -->
    <div class="gallery-head">
         <div class="container" style="width: 100%;">    
         <div class="gallery-text">
             <div class="container" style="width: 100%;">
             <h2>图说 | GALLERY</h2>
             </div>
         </div>
             <div class="main">
             <div class="gallery">  
                  <section>
                      <ul class="lb-album">
                          <li>
                             <a href="#image-1">
                                 <img src="/public/images/g1.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-1">
                                 <img src="/public/images/g1.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-abt2">
                                 <img src="/public/images/g2.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-abt2">
                                 <img src="/public/images/g2.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-2">
                                 <img src="/public/images/g3.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-2">
                                 <img src="/public/images/g3.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-4">
                                 <img src="/public/images/g4.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-4">
                                 <img src="/public/images/g4.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>                         
                     </ul>
                     <ul class="lb-album">
                          <li>
                             <a href="#image-5">
                                 <img src="/public/images/g5.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-5">
                                 <img src="/public/images/g5.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-6">
                                 <img src="/public/images/g6.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-6">
                                 <img src="/public/images/g6.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-abt1">
                                 <img src="/public/images/g7.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-abt1">
                                 <img src="/public/images/g7.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-g8">
                                 <img src="/public/images/g8.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-g8">
                                 <img src="/public/images/g8.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>                         
                     </ul>
                     <ul class="lb-album">
                          <li>
                             <a href="#image-g9">
                                 <img src="/public/images/g9.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-g9">
                                 <img src="/public/images/g9.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-abt3">
                                 <img src="/public/images/g10.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-abt3">
                                 <img src="/public/images/g10.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-3">
                                 <img src="/public/images/g11.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-3">
                                 <img src="/public/images/g11.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>
                          <li>
                             <a href="#image-12">
                                 <img src="/public/images/g12.jpg" class="img-responsive" alt="">
                                 <span> </span>
                             </a>
                              <div class="lb-overlay" id="image-12">
                                 <img src="/public/images/g12.jpg" class="img-responsive" alt="image03">
                                 <a href="#page" class="lb-close"> </a>
                             </div>
                          </li>                         
                     </ul>
                 </section>
                 <div class="clearfix"> </div>
              </div>
                </div>
         </div>
    </div>
    <!-- //gallery -->
    </div>
<?php
 function getRank() { $conds['status'] = 1; $news = D('News')->getRank($conds, 10); return $news; } $rankNews = getRank(); ?>
<div class="content-info col-md-4">
     <div class="container pinned" style="margin-top: 20px;">
         <div class="content-bottom-grids">
             <div class="popular"> 
                 <h3>NEWEST</h3>
                 <ul>
                    <?php if(is_array($rankNews)): $i = 0; $__LIST__ = $rankNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php?c=detail&id=<?php echo ($vo['news_id']); ?>&catid=<?php echo ($vo['catid']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                 </ul>
             </div>
            <div class="clearfix"></div>
         </div>
     </div>
</div>  
     </div>
</div>
<!-- //about -->

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