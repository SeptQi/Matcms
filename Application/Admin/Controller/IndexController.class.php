<?php
/**
 * 后台Index相关
 */
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    
    public function index()
    {
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



