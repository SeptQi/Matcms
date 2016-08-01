<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<!-- Le styles -->
<link href="/Public/css/bootstrap-combined.min.css" rel="stylesheet">
<link href="/Public/css/layoutit.css" rel="stylesheet">
<link rel="shortcut icon" href="favicon.png">
<style type="text/css">
  .span9,.span3{
    border: 1px solid black;
  }
</style>
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script type="text/javascript" src="/Public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/js/jquery-ui.js"></script>

</head>
<body style="margin: 0 100px; text-align: center; padding: 20px;">
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span12">
      <div class="navbar navbar-inverse">
        <div class="navbar-inner">
          <div class="container-fluid">
            <a class="btn btn-navbar" data-target=".navbar-responsive-collapse" data-toggle="collapse"></a> <a class="brand" href="#">网站名</a>
            <div class="nav-collapse collapse navbar-responsive-collapse">
              <ul class="nav">
                <li class="active">
                  <a href="#">主页</a>
                </li>
                <li>
                  <a href="#">链接</a>
                </li>
                <li>
                  <a href="#">链接</a>
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">下拉菜单</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">下拉导航1</a>
                    </li>
                    <li>
                      <a href="#">下拉导航2</a>
                    </li>
                    <li>
                      <a href="#">其他</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li class="nav-header">
                      标签
                    </li>
                    <li>
                      <a href="#">链接1</a>
                    </li>
                    <li>
                      <a href="#">链接2</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <ul class="nav pull-right">
                <li>
                  <form class="form-search">
                    <input class="input-medium search-query" type="text" /><button class="btn" type="submit">查找</button>
                  </form>
                </li>
                <li class="divider-vertical">
                </li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">下拉菜单</a>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#">下拉导航1</a>
                    </li>
                    <li>
                      <a href="#">下拉导航2</a>
                    </li>
                    <li>
                      <a href="#">其他</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                      <a href="#">链接3</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <div class="carousel slide" id="carousel-297295">
        <ol class="carousel-indicators">
          <li data-slide-to="0" data-target="#carousel-297295" class="active">
          </li>
          <li data-slide-to="1" data-target="#carousel-297295">
          </li>
          <li data-slide-to="2" data-target="#carousel-297295">
          </li>
          <li data-slide-to="3" data-target="#carousel-297295">
          </li>
        </ol>
        <div class="carousel-inner">
          <div class="item">
            <img alt="" src="/Public/images/071.png" style="height: 460px; width: 100%" />
            <div class="carousel-caption">
              <h4>
                棒球
              </h4>
              <p>
                棒球运动是一种以棒打球为主要特点，集体性、对抗性很强的球类运动项目，在美国、日本尤为盛行。
              </p>
            </div>
          </div>
          <div class="item active">
            <img alt="" src="/Public/images/072.png" style="height: 460px; width: 100%" />
            <div class="carousel-caption">
              <h4>
                冲浪
              </h4>
              <p>
                冲浪是以海浪为动力，利用自身的高超技巧和平衡能力，搏击海浪的一项运动。运动员站立在冲浪板上，或利用腹板、跪板、充气的橡皮垫、划艇、皮艇等驾驭海浪的一项水上运动。
              </p>
            </div>
          </div>
          <div class="item">
            <img alt="" src="/Public/images/071.png" style="height: 460px; width: 100%" />
            <div class="carousel-caption">
              <h4>
                自行车
              </h4>
              <p>
                以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。
              </p>
            </div>
          </div>
          <div class="item">
            <img alt="" src="/Public/images/072.png" style="height: 460px; width: 100%" />
            <div class="carousel-caption">
              <h4>
                自行车
              </h4>
              <p>
                以自行车为工具比赛骑行速度的体育运动。1896年第一届奥林匹克运动会上被列为正式比赛项目。环法赛为最著名的世界自行车锦标赛。
              </p>
            </div>
          </div>
        </div> <a data-slide="prev" href="#carousel-297295" class="left carousel-control">‹</a> <a data-slide="next" href="#carousel-297295" class="right carousel-control">›</a>
      </div>
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <h2>
        你所关注
      </h2>
      <ul class="thumbnails">
        <li class="span3">
          <div class="thumbnail">
            <img alt="300x200" src="/Public/images/banner.jpg" />
            <div class="caption">
              <h3>
                冯诺尔曼结构
              </h3>
              <p>
                也称普林斯顿结构，是一种将程序指令存储器和数据存储器合并在一起的存储器结构。程序指令存储地址和数据存储地址指向同一个存储器的不同物理位置。
              </p>
              <p>
                <a class="btn btn-primary" href="#">浏览</a> <a class="btn" href="#">分享</a>
              </p>
            </div>
          </div>
        </li>
        <li class="span3">
          <div class="thumbnail">
            <img alt="300x200" src="/Public/images/banner.jpg" />
            <div class="caption">
              <h3>
                哈佛结构
              </h3>
              <p>
                哈佛结构是一种将程序指令存储和数据存储分开的存储器结构，它的主要特点是将程序和数据存储在不同的存储空间中，进行独立编址。
              </p>
              <p>
                <a class="btn btn-primary" href="#">浏览</a> <a class="btn" href="#">分享</a>
              </p>
            </div>
          </div>
        </li>
        <li class="span3">
          <div class="thumbnail">
            <img alt="300x200" src="/Public/images/banner.jpg" />
            <div class="caption">
              <h3>
                改进型哈佛结构
              </h3>
              <p>
                改进型的哈佛结构具有一条独立的地址总线和一条独立的数据总线，两条总线由程序存储器和数据存储器分时复用，使结构更紧凑。
              </p>
              <p>
                <a class="btn btn-primary" href="#">浏览</a> <a class="btn" href="#">分享</a>
              </p>
            </div>
          </div>
        </li>
        <li class="span3">
          <div class="thumbnail">
            <img alt="300x200" src="/Public/images/banner.jpg" />
            <div class="caption">
              <h3>
                改进型哈佛结构
              </h3>
              <p>
                改进型的哈佛结构具有一条独立的地址总线和一条独立的数据总线，两条总线由程序存储器和数据存储器分时复用，使结构更紧凑。
              </p>
              <p>
                <a class="btn btn-primary" href="#">浏览</a> <a class="btn" href="#">分享</a>
              </p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <div class="row-fluid" style="width: 1200px; text-align: center;">
    <h2 style="text-align: left; margin-left: 40px;">
      最新文章
    </h2>
    <div class="span9" style="width: 839px; margin-left: 30px;">
      <div class="page-header">
        <h2>
          页标题范例 <small>此处编写页标题 更新时间</small>
        </h2>
      </div>
      <img alt="140x140" src="/Public/images/071.png" style="height: " />
      <dl class="dl-horizontal">
        <dt>
          <strong>文章内容文章内容文章内容文章内容</strong>
        </dt>
        <dt>
          <strong>文章内容文章内容文章内容文章内容</strong>
        </dt>
        <dt>
          <strong>文章内容文章内容文章内容文章内容</strong>
        </dt>
        <dt>
          <strong>文章内容文章内容文章内容文章内容</strong>
        </dt>
      </dl>
    </div>
    <div class="span3" style="width: 300px;">
      <h3 class="page-header">
        文章排行
      </h3>
      <dl>
        <dt>
          Rolex
        </dt>
        <dd>
          劳力士创始人为汉斯.威尔斯多夫，1908年他在瑞士将劳力士注册为商标。
        </dd>
      </dl>
      <ul class="unstyled">
        <li>
          <h2>
            新闻资讯
          </h2>
        </li>
        <li>
          <h2>
            体育竞技
          </h2>
        </li>
        <li>
          <h2>
            娱乐八卦
          </h2>
        </li>
        <li>
          <h2>
            前沿科技
          </h2>
        </li>
        <li>
          <h2>
            环球财经
          </h2>
        </li>
        <li>
          <h2>
            天气预报
          </h2>
        </li>
        <li>
          <h2>
            房产家居
          </h2>
        </li>
        <li>
          <h2>
            网络游戏
          </h2>
        </li>
      </ul>
      <hr/>
      <img alt="140x140" src="/Public/images/071.png" /><img alt="140x140" src="/Public/images/071.png" />
    </div>
  </div>
  <div class="row-fluid">
    <div class="span12">
      <h1>
        <strong>页尾</strong>
      </h1>
    </div>
  </div>
</div>
</div>
</body>
</html>