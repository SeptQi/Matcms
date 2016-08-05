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
<!-- about -->
<div class="about">
     <div class="container"  id="container">
         <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">About</li>
         </ol>
             <div class="about-grid col-md-8">
                <h2>文章标题</h2>
<p>如果你心动过，我就不用再去描述；如果你没有心动过，那“心动”二字之于你，就像是你从未抬头看过的天空，再多的描绘仍是无解。

我喜欢数码产品，了解得算不上专业，但却是真心的热爱。喜欢感受科技发展带来的感官刺激，喜欢那些优秀的产品设计所带来的前卫体验。

图01.jpg

对于我来说，设计优秀、功能出色是数码产品是最为理想的状态。有一些产品，第一眼看到，就能为之心动，产生强烈的购买冲动。然而遗憾的是，智能手机普及之后，“公模”式的设计如火山爆发之势喷涌而出，忽略设计感的产品疯狂增长的同时，个性却在慢慢的泯灭。不管是撞衫还是撞机，都是一种尴尬，也是一种相互贬低。

能够让人为之心动的手机越来越少。

也许由于第一台手机便是 Moto 的 C650，个人对摩托罗拉有点“先入为主”，但是在我接触手机的这十余年内，摩托罗拉绝对是我心目中的百变之王。凭借着纯粹的极客风范和创新精神，数十年来，一代又一代的 Moto 人发明了数不清的黑科技，创造出了无数经典产品。摩托罗拉在技术上敢于创新、材质上舍得用料的探索精神一直深得我心。

图02.JPG

今年 6 月 10 日凌晨（美国旧金山时间 6 月 9 日上午），以“让想象力生长”为主题的联想第二届全球科技创新大会在美国硅谷举办。幸运的是，喜爱摩托罗拉十余载的我，能够收到邀请参加这次联想大家庭的聚会，亲临现场第一时间看到 Moto Z（摩磁）系列智能手机和 Moto Mods 模块的发布。虽然之前在网络上已经曝光了不少 Moto Z 的渲染图，但是熟悉 Moto 的朋友应该已经习惯了 Moto 的手机永远是曝光图“丑绝人寰”，真机上手却让人惊叹的规律！居然可以帅成这样？不科学！

图03.JPG

拿着 Moto Z，很自然地让我想起了摩托罗拉以前的两款经典产品：里程碑 Milestone 和刀锋 Razr。首先在外观设计方面，它们都有着类似的风格：机身线条分明，硬朗，大气沉稳。而且这三台机器的推出，都在各自的时代里，给大家带来了颠覆与震撼。

里程碑系列：侧滑盖全键盘、拥有 854*480 的高清分辨率，再加上全新的 Android 操作系统，一经推出，多少人为它惊叹！而里程碑也同样是我踏上数码发烧路的一个开始。回想当年，我影响了周边共 14 位亲朋好友买了里程碑。每次出去吃饭游玩，坐成一排都拿着一样的手机，那场景甚是壮观。其中一位挚友说如果有一天科技发展，摩托罗拉的手机只剩下里程碑上半部分的屏幕那般薄就好了，当时我只是淡淡一笑。很庆幸的是如今 Moto Z 做到了，遗憾的是他却没能亲眼见证。
</p>
            </div>
<?php
 function getRank() { $conds['status'] = 1; $news = D('News')->getRank($conds, 10); return $news; } $rankNews = getRank(); ?>
<div class="content-info col-md-4">
     <div class="container pinned" style="margin-top: 20px;">
         <div class="content-bottom-grids">
             <div class="popular"> 
                 <h3>NEWEST</h3>
                 <ul>
                    <?php if(is_array($rankNews)): $i = 0; $__LIST__ = $rankNews;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="/index.php?c=detail&id=<?php echo ($vo['news_id']); ?>"><?php echo ($vo['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
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