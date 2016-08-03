<?php
namespace Home\Controller;
class IndexController extends CommonController
{
    public function index()
    {
        
        $topPicNews = D('Positioncontent')->select(array('status' => 1, 'position_id' => 1));
        $news       = D('Positioncontent')->select(array('status' => 1, 'position_id' => 2), 3);
        $technology = D('Positioncontent')->select(array('status' => 1, 'position_id' => 3), 3);
        $amusement  = D('Positioncontent')->select(array('status' => 1, 'position_id' => 4), 3);
        $sport      = D('Positioncontent')->select(array('status' => 1, 'position_id' => 5), 3);
        $navs = D('Menu')->getBarMenus();
        $this->assign('result', array(
            'topPicNews' => $topPicNews,
            'news'       => $news,
            'technology' => $technology,
            'amusement'  => $amusement,
            'sport'      => $sport,
            'rankNews'   => $rankNews,
            'navs'       => $navs,
            ));
        $this->display();
        //$this->show();
    }
    public function check()
    {
        $_POST['password'] = md5($_POST['password'].C('MD5_PRE'));
        $admin = D('Admin');
        $res = $admin -> checkUser($_POST);
        if(!$res){
            return show(0,'用户不存在，请先注册');
        }
        if($res['password'] != $_POST['password']){
            return show(0,'密码错误');
        }
        session('userInfo',$res);
        return show(1, '登陆成功');
    }

    // 前台用户登出操作
    public function loginout()
    {
        session('userInfo', null);
        $this->redirect('/index.php');
        return show(1,'退出登录成功');
    }

    public function insert()
    {
        return show(1, '注册成功');
    }

}