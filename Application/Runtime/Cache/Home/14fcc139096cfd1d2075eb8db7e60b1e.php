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
        <script src="/Public/js/bootstrap.min.js"></script>
        <script src="/Public/js/dialog/layer.js"></script>
        <script src="/Public/js/dialog.js"></script>
        <script src="/Public/js/home/login.js"></script>
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
        <button class="btn btn-primary" data-toggle="modal" data-target="#login" logintype="1">登录</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-primary" data-toggle="modal" data-target="#signin" logintype="0">注册</button>          
     </div>
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
            <input type="text" class="form-control" name="loginpassword">
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
     <div class="container">
         <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">About</li>
         </ol>
         <h2>ABOUT</h2>
         <div class="about-head">
             <p>Morbi hendrerit facilisis magna sed blandit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
             Praesent convallis, enim non pellentesque interdum, orci orci dignissim erat, eget euismod turpis urna vitae ligula. Maecenas ut nulla sit amet magna suscipit auctor.
             Fusce rhoncus pretium finibus. Aliquam id faucibus lectus. Proin rhoncus magna vel sollicitudin elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
         </div>
         <div class="about-grids">
             <div class="about-grid">
                 <h3>WHO WE ARE</h3>
                 <p class="abt-info">Nam blandit velit ut justo suscipit, volutpat auctor nisi blandit. Maecenas risus velit, lobortis id faucibus non, volutpat sed quam. Pellentesque interdum ex felis, 
                 nec ultricies nibh dapibus id. Suspendisse potenti. Donec pretium et neque eget elementum. Etiam eleifend ante ac mauris tempor elementum. Nunc gravida, velit et finibus lobortis,
                 dolor augue varius augue, eu rutrum quam orci sit amet sapien.</p>
                 <p>Quisque bibendum nulla id suscipit sagittis. Phasellus blandit porttitor cursus. Duis vel orci eu nunc volutpat vehicula. Curabitur fermentum bibendum sem, nec pulvinar elit 
                 blandit vel. Nulla ac gravida sapien. Duis elementum molestie tincidunt. Nunc luctus ullamcorper bibendum. Proin maximus magna a enim tristique lobortis. Aliquam erat volutpat. 
                 Aenean luctus arcu ac magna euismod, a euismod ante venenatis. Nullam vehicula varius nunc vitae ultrices. Praesent varius elementum posuere.</p>
                 <a href="#">Read More..</a>
            </div>
             <div class="about-pic">
                 <img src="/Public/images/abt.jpg" alt=""/>
             </div>
             <div class="clearfix"></div>
         </div>
         <div class="abt_text">
                <div class="col-md-4 values">
                     <h3>Our Values</h3>
                     <div class="value-grd">
                         <span>01.</span>
                         <h4>Sed quis lectus sed neque suscipit iaculis bibendum vitae tellus.</h4>
                         <p>Fusce in quis lectus seddignissim elit. Mauris ex est, luctus convallis eleifend eu, pulvinar ac purus.</p>
                     </div>
                     <div class="value-grd">
                         <span>02.</span>
                         <h4>Sed quis lectus sed neque suscipit iaculis bibendum vitae tellus.</h4>
                         <p>Fusce in quis lectus seddignissim elit. Mauris ex est, luctus convallis eleifend eu, pulvinar ac purus.</p>
                     </div>
                     <div class="value-grd">
                         <span>03.</span>
                         <h4>Sed quis lectus sed neque suscipit iaculis bibendum vitae tellus.</h4>
                         <p>Fusce in quis lectus seddignissim elit. Mauris ex est, luctus convallis eleifend eu, pulvinar ac purus.</p>
                     </div>
                </div>
                <div class="col-md-4 skills">
                     <h3>Our Skills</h3>
                     <h4>Aenean fermentum neque sagittis, feugiat diam sit amet, efficitur ex.</h4>
                     <p>Etiam id maximus enim. Integer a mauris tempor, vestibulum neque vel, molestie risus. Mauris congue interdum 
                     nibh ut cursus. Fusce cursus, neque at tristique eleifend, nisl erat euismod nulla, dictum aliquam justo purus at metus.</p>
                     <ul>
                        <li><a href="#">Proin non sapien nec risus eleifend malesuada.</a></li>
                        <li><a href="#">Sed volutpat nulla a consequat venenatis.</a></li>
                        <li><a href="#">Quisque vitae nisl sit amet magna tempor finibus.</a></li>
                        <li><a href="#">Praesent in velit et mi tempor molestie ut et arcu.</a></li>
                        <li><a href="#">Sed volutpat nulla a consequat venenatis.</a></li>
                        <li><a href="#">Donec euismod purus a aliquam dapibus.</a></li>
                        <li><a href="#">Praesent in velit et mi tempor molestie ut et arcu.</a></li>
                        <li><a href="#">Etiam at dolor at eros finibus viverra.</a></li>
                    </ul>
                </div>
                <div class="col-md-4 testi">
                     <h3>Testimonals</h3>
                     <p>Maecenas vel massa dictum, cursus velit pharetra, efficitur diam. Duis et felis ut ligula eleifend tempus. 
                     Ut vitae ipsum sit amet massa placerat consequat vitae ac arcu. Vestibulum euismod at ante eu feugiat.</p>
                     <a href="#">JOHN FRANKLIN</a>
                     <p>Maecenas vel massa dictum, cursus velit pharetra, efficitur diam. Duis et felis ut ligula eleifend tempus. 
                     Ut vitae ipsum sit amet massa placerat consequat vitae ac arcu. Vestibulum euismod at ante eu feugiat.</p>
                     <a href="#">TOM MENDERW</a>
                     <p>Maecenas vel massa dictum, cursus velit pharetra, efficitur diam. Duis et felis ut ligula eleifend tempus. 
                     Ut vitae ipsum sit amet massa placerat consequat vitae ac arcu. Vestibulum euismod at ante eu feugiat.</p>
                     <a href="#">ALIN SMITH</a>
                </div>
                <div class="clearfix"></div>
         </div>     
     </div>
</div>
<!-- //about -->

<div class="gallery-head">
     <div class="container">
         <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Gallery</li>
         </ol>
     </div>
     <div class="gallery-text">
         <div class="container">
         <h2>GALLERY</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ligula neque, pellentesque quis tempor eget, pretium sit amet nunc.
         Ut blandit felis vel urna rutrum maximus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac neque eu enim auctor placerat fringilla feugiat tellus. Nulla massa nibh, eleifend egestas metus in, feugiat congue massa. Praesent consequat nec est ac bibendum.</p>
         </div>
     </div>
     <div class="container">    
         <div class="main">
         <div class="gallery">  
              <section>
                  <ul class="lb-album">
                      <li>
                         <a href="#image-1">
                             <img src="/Public/images/g1.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-1">
                             <img src="/Public/images/g1.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-abt2">
                             <img src="/Public/images/g2.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-abt2">
                             <img src="/Public/images/g2.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-2">
                             <img src="/Public/images/g3.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-2">
                             <img src="/Public/images/g3.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-4">
                             <img src="/Public/images/g4.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-4">
                             <img src="/Public/images/g4.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>                         
                 </ul>
                 <ul class="lb-album">
                      <li>
                         <a href="#image-5">
                             <img src="/Public/images/g5.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-5">
                             <img src="/Public/images/g5.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-6">
                             <img src="/Public/images/g6.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-6">
                             <img src="/Public/images/g6.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-abt1">
                             <img src="/Public/images/g7.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-abt1">
                             <img src="/Public/images/g7.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-g8">
                             <img src="/Public/images/g8.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-g8">
                             <img src="/Public/images/g8.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>                         
                 </ul>
                 <ul class="lb-album">
                      <li>
                         <a href="#image-g9">
                             <img src="/Public/images/g9.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-g9">
                             <img src="/Public/images/g9.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-abt3">
                             <img src="/Public/images/g10.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-abt3">
                             <img src="/Public/images/g10.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-3">
                             <img src="/Public/images/g11.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-3">
                             <img src="/Public/images/g11.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                      </li>
                      <li>
                         <a href="#image-12">
                             <img src="/Public/images/g12.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-12">
                             <img src="/Public/images/g12.jpg" class="img-responsive" alt="image03">
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

<!-- events -->
<div class="events-sec">
     <div class="container">
         <h2>NEWS & EVENTS</h2>
         <div class="event-grids">          
             <div class="col-md-4 event-grid">
                 <div class="date">
                     <h3>26</h3>
                     <span>08/2012</span>
                 </div>              
                 <div class="event-info">
                      <h4><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h4>
                        <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at, 
                        volutpat et orci. Aliquam eu tellus orci. Duis ut efficitur sem. Proin eu nunc magna.</p>                   
                 </div>
                 <div class="clearfix"></div>                            
             </div>
             <div class="col-md-4 event-grid">
                 <div class="date">
                     <h3>24</h3>
                     <span>06/2012</span>
                 </div>              
                 <div class="event-info">
                      <h4><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h4>
                        <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at, 
                        volutpat et orci. Aliquam eu tellus orci. Duis ut efficitur sem. Proin eu nunc magna.</p>                   
                 </div>
                 <div class="clearfix"></div>                            
             </div>
             <div class="col-md-4 event-grid">
                 <div class="date">
                     <h3>20</h3>
                     <span>04/2012</span>
                 </div>              
                 <div class="event-info">
                      <h4><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h4>
                        <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at, 
                        volutpat et orci. Aliquam eu tellus orci. Duis ut efficitur sem. Proin eu nunc magna.</p>                   
                 </div>
                 <div class="clearfix"></div>                            
             </div>
             <div class="clearfix"></div>   
         </div>
         <div class="event-grids">          
             <div class="col-md-4 event-grid">
                 <div class="date">
                     <h3>19</h3>
                     <span>08/2012</span>
                 </div>              
                 <div class="event-info">
                      <h4><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h4>
                        <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at, 
                        volutpat et orci. Aliquam eu tellus orci. Duis ut efficitur sem. Proin eu nunc magna.</p>                   
                 </div>
                 <div class="clearfix"></div>                            
             </div>
             <div class="col-md-4 event-grid">
                 <div class="date">
                     <h3>22</h3>
                     <span>05/2012</span>
                 </div>              
                 <div class="event-info">
                      <h4><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h4>
                        <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at, 
                        volutpat et orci. Aliquam eu tellus orci. Duis ut efficitur sem. Proin eu nunc magna.</p>                   
                 </div>
                 <div class="clearfix"></div>                            
             </div>
             <div class="col-md-4 event-grid">
                 <div class="date">
                     <h3>25</h3>
                     <span>03/2012</span>
                 </div>              
                 <div class="event-info">
                      <h4><a href="#">Etiam malesuada feugiat rutrum purus quis vulputate.</a></h4>
                        <p>Praesent sagittis in enim vel cursus. Aenean velit ante, maximus ac placerat at, 
                        volutpat et orci. Aliquam eu tellus orci. Duis ut efficitur sem. Proin eu nunc magna.</p>                   
                 </div>
                 <div class="clearfix"></div>                            
             </div>
             <div class="clearfix"></div>   
         </div>
     </div>
</div>
<div class="featured-news">
     <div class="container">
         <div class="ftrd-head text-center">
             <h3>FEATURED NEWS & EVENTS</h3>
             <p>Phasellus ultricies magna vitae justo aliquam, cursus bibendum neque tempus.</p>
         </div>
         <div class="event-grids">
             <div class="col-md-4 event-grid-sec">
                 <div class="event-time text-center">
                     <p>08/2011</p>
                 </div>
                 <div class="event-grid_pic">
                     <img src="/Public/images/e1.jpg" alt=""/>
                     <h3><a href="#">Morbi pellentesque urna scelerisque justo rutrum.</a></h3>
                     <p>Nullam placerat aliquet nisl id finibus. Nulla mollis mattis magna in hendrerit. Pellentesque nunc nisl, dapibus eget erat non,
                     sagittis accumsan dolor. Sed eu aliquam turpis. Vestibulum finibus dictum lobortis.</p>
                     <div class="more"><a href="#">> Read More</a></div>
                 </div>
             </div>
             <div class="col-md-4 event-grid-sec">
                 <div class="event-time text-center">
                     <p>08/2011</p>
                 </div>
                 <div class="event-grid_pic">
                     <img src="/Public/images/e3.jpg" alt=""/>
                     <h3><a href="#">Morbi pellentesque urna scelerisque justo rutrum.</a></h3>
                     <p>Nullam placerat aliquet nisl id finibus. Nulla mollis mattis magna in hendrerit. Pellentesque nunc nisl, dapibus eget erat non,
                     sagittis accumsan dolor. Sed eu aliquam turpis. Vestibulum finibus dictum lobortis.</p>
                     <div class="more"><a href="#">> Read More</a></div>
                 </div>
             </div>
             <div class="col-md-4 event-grid-sec">
                 <div class="event-time text-center">
                     <p>08/2011</p>
                 </div>
                 <div class="event-grid_pic">
                     <img src="/Public/images/e2.jpg" alt=""/>
                     <h3><a href="#">Morbi pellentesque urna scelerisque justo rutrum.</a></h3>
                     <p>Nullam placerat aliquet nisl id finibus. Nulla mollis mattis magna in hendrerit. Pellentesque nunc nisl, dapibus eget erat non,
                     sagittis accumsan dolor. Sed eu aliquam turpis. Vestibulum finibus dictum lobortis.</p>
                     <div class="more"><a href="#">> Read More</a></div>
                 </div>
             </div>
             <div class="clearfix"></div>
         </div>
     </div>
</div>
<!---->
 <div class="latest-pics">
     <div class="container">
           <h3>LATEST EVENTS</h3>
            <div class="gallery">   
              <section>
                  <ul class="lb-album">
                      <li>
                         <a href="#image-1"><img src="/Public/images/g1.jpg" class="img-responsive" alt=""></a>
                          <div class="lb-overlay" id="image-1">
                             <img src="/Public/images/g1.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>                          
                         </div>
                         <div class="event_gal">
                         <h4><a href="#">Maecenas sodales</a></h4>
                         <p>Pellentesque tincidunt tortor auctor, suscipit tortor sed, condimentum ligula.</p>
                         </div>
                      </li>
                      <li>
                         <a href="#image-abt2">
                             <img src="/Public/images/g2.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-abt2">
                             <img src="/Public/images/g2.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                         <div class="event_gal">
                         <h4><a href="#">Maecenas sodales</a></h4>
                         <p>Pellentesque tincidunt tortor auctor, suscipit tortor sed, condimentum ligula.</p>
                         </div>
                      </li>
                      <li>
                         <a href="#image-2">
                             <img src="/Public/images/g3.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-2">
                             <img src="/Public/images/g3.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                         <div class="event_gal">
                         <h4><a href="#">Maecenas sodales</a></h4>
                         <p>Pellentesque tincidunt tortor auctor, suscipit tortor sed, condimentum ligula.</p>
                         </div>
                      </li>
                      <li>
                         <a href="#image-4">
                             <img src="/Public/images/g4.jpg" class="img-responsive" alt="">
                             <span> </span>
                         </a>
                          <div class="lb-overlay" id="image-4">
                             <img src="/Public/images/g4.jpg" class="img-responsive" alt="image03">
                             <a href="#page" class="lb-close"> </a>
                         </div>
                         <div class="event_gal">
                         <h4><a href="#">Maecenas sodales</a></h4>
                         <p>Pellentesque tincidunt tortor auctor, suscipit tortor sed, condimentum ligula.</p>
                         </div>
                      </li>                         
                 </ul>
               <div class="clearfix"></div>
               </section>
     </div>
 </div>

<!-- contact -->
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