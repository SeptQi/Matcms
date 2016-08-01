<?php
namespace Admin\Controller;
use Think\Controller;

class UserController extends Controller
{
    public function index()
    {
        $conds = array();
        $title = $_GET['title'];
        $type = $_GET['type'];
        if($title){
            $conds['title'] = $title;
        }
        if($type){
            $conds['type'] = $type;
        }
        $data = D('User') -> getUserInfo($conds);
        $this->assign('data',$data);
        $this->assign('conds',$conds);
        $this->display();
    }

    public function add()
    {
        if($_POST){
            if(!isset($_POST['username']) || !$_POST['username']){
                return show(0,'用户名不能为空');
            }
            if(!isset($_POST['password']) || !$_POST['password']){
                return show(0,'密码不能为空');
            }
            if(!isset($_POST['email']) || !$_POST['email']){
                return show(0,'Email地址不能为空');
            }
            if(!isset($_POST['realname']) || !$_POST['realname']){
                return show(0,'真实姓名不能为空');
            }
            $_POST['password'] = md5($_POST['password'].C('MD5_PRE'));
            if($_POST['type'] == 1 ){
                $adminId = D('User') -> insert($_POST);
                if($adminId){
                    return show(1,'新增管理员成功');
                }
                return show(0,'新增管理员失败');
            }


            $userId = D("User") -> insert($_POST);
            if ($userId) {
                return show(1,'新增用户成功',$userId);
            }
            return show(0,'新增用户失败',$menuId);
        }else{
            $this->display();
        }
    }

    public function save($data){
        dump($data);
        D('User')->updateById($data);
    }
    
    
}