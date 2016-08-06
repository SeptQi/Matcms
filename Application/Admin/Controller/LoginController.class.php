<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */

class LoginController extends Controller {
    //显示登录页
    public function index()
    {
        if(session('adminUser')){
            $this->redirect('?c=index');
        }
        return $this->display();
    }
    //登录验证
    public function check()
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        if(!trim($username)){
            return show(0,'用户名不能为空');
        }
        if(!trim($password)){
            return show(0,'密码不能为空');
        }
        $user = D('Admin');
        $ret = $user -> getAdminByUsername($username);
        $ret['lastloginip'] = ip2long($_SERVER['REMOTE_ADDR']);
        if(!$ret){
            return show(0,'该用户不存在');
        }
        if($ret['password'] != getMd5Password($password)){
            return show(0,'密码错误');
        }
        session('adminUser',$ret);
        $data['lastloginip'] = $ret['lastloginip'];
        $data['admin_id'] = $ret['admin_id'];
        $data['lastlogintime'] = time();
        $a = $user -> updateById($data);
        if($a === false){
            return show(0,'有数据更新失败');
        }
        if($ret['type'] != 2){
            return show(0,'您没有权限登录后台，请联系管理员');
        }
        return show(1,'登陆成功!');
    }
    //登出
    public  function loginout()
    {
        session('adminUser', null);
        $this->redirect('/admin.php?c=login&a=index');
    }
}