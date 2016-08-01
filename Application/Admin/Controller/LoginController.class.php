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
        if (session('adminUser')) {
            $this->redirect('/admin.php?c=index&a=index');
        }
    	return $this->display();
    }
    //登录验证
    public function check()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if (!trim($username)) {
            return show(0, '用户名不可为空');
        }
        if (!trim($password)) {
            return show(0, '密码不可为空');
        }
        //使用
        $ret = D('Admin')->getAdminByUsername($username);
        if (!$ret) {
            return show(0, '该用户不存在');
        }
        if ($ret['password'] != getMd5Password($password) ) {
            return show(0, '密码错误');
        }
        session('adminUser', $ret);
        return show(1, '登陆成功');
    }
    //登出
    public  function loginout()
    {
        session('adminUser', null);
        $this->redirect('/admin.php?c=login&a=index');
    }
    public function login()
    {
        $this->display();
    }
}