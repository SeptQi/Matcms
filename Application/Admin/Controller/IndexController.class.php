<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends CommonController {
    
    public function index()
    {
        $new = D('News') -> maxcount();
        $newsCount = D('news')->getNewsCount(array('status'=>1));
        $positionCount = D('Position') -> getCount(array('status'=>1));
        $adminCount = D('Admin') -> getLastLoginUser();
        // 阅读数
        $this->assign( 'news',$news);
        // 文章数量
        $this->assign( 'newscount',$newsCount);
        // 推荐位数
        $this->assign( 'positioncount',$positionCount);
        // 用户登录数
        $this->assign( 'admincount',$adminCount);
        if (session('adminUser')) {
            return $this->display();
        }
        $this->redirect('/admin.php?c=login&a=index');
    }

    public function main()
    {
        $this->display();
    }
}



