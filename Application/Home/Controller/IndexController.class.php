<?php
namespace Home\Controller;
class IndexController extends CommonController
{
    public function index()
    {
        $navs = D('Menu')->getBarMenus();
        foreach ($navs as $key => $value) {
            $catid = $value['menu_id'];
            $pos_name = $value['name'];
            $pos_id = $value['pos_id'];
            $contents[$pos_name] = D('Positioncontent')->select(array('status' => 1, 'position_id' => $pos_id), 3);
            foreach ($contents[$pos_name] as $key => $value) {
                $contents[$pos_name][$key]['content'] = strip_tags(htmlspecialchars_decode(D('NewsContent')->find($value['news_id'])['content']));
                $contents[$pos_name][$key]['catid'] = $catid;
            }
        }
        $topPicNews = D('Positioncontent')->select(array('status' => 1, 'position_id' => 1));
        $config = D('Basic')->select();
        $catId = $_GET['id'] ? $_GET['id'] : 0;
        $this->assign(array(
            'topPicNews' => $topPicNews,
            'contents'   => $contents,
            'navs'       => $navs,
            'config'     => $config,
            'catId'      => $catId,
            ));
        $this->display();
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
        $_POST['lastlogintime'] = time();
        $_POST['lastloginip'] = ip2long($_SERVER['REMOTE_ADDR']);
        $_POST['admin_id'] = $_SESSION['userInfo']['admin_id'];
        $admin -> updateById($_POST);
        return show(1, '登陆成功');
    }

    // 前台用户登出操作
    public function loginout()
    {
        session('userInfo', null);
        $this->redirect('/index.php');
        return show(1,'退出登录成功');
    }

    public function registerUser()
    {
        $_POST['type'] = 1;
        $_POST['password'] = md5($_POST['password'].C('MD5_PRE'));
        $admin = D('Admin');
        $res = $admin -> insert($_POST);
        if(!$res){
            return show(0,'注册失败，请稍后再试');
        }
        return show(1, '注册成功');
    }

    public function editUserInfo()
    {
        $_POST['admin_id'] = $_SESSION['userInfo']['admin_id'];
        $res = D('User')->updateById($_POST);
        if($res === false){
            return show(0,'用户信息修改失败');
        }
        session('userInfo',null);
        
        return show(1,'用户信息修改成功,请重新登录');
    }
}