<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Exception;
/**
 * use Common\Model 这块可以不需要使用，框架默认会加载里面的内容
 */
class CommonController extends Controller
{
	public function __construct() {
		parent::__construct();
		$this->_init();
	}
	/**
	 * 初始化
	 * @return
	 */
	private function _init() {
		// 如果已经登录
		$isLogin = $this->isLogin();
		if(!$isLogin) {
			// 跳转到登录页面
			$this->redirect('/admin.php?c=login');
		}
	}

	/**
	 * 获取登录用户信息
	 * @return array
	 */
	public function getLoginUser() {
		return session("adminUser");
	}

	/**
	 * 判定是否登录
	 * @return boolean 
	 */
	public function isLogin() {
		$user = $this->getLoginUser();
		if($user && is_array($user)) {
			return true;
		}
		return false;
	}
	/**
	 * 设置状态
	 */
    public function setStatus($data, $model)
    {
        //异常处理
        try {
            if ($data) {
                $id = $data['id'];
                $status = $data['status'];
                if (!$id) {
                    return show(0, 'id不存在');
                }
                $res = D($model)->updateStatusById($id, $status);
                if ($res) {
                    return show(1, '操作成功');
                } else {
                    return show(0, '操作失败');
                }
            }
            return show(0, '未提交内容');
        } catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }
    /**
     * 排序操作
     */
    public function listorder($model = '')
    {
        $listorder = $_POST['listorder'];
        $jump_url = $_SERVER['HTTP_REFERER'];
        $errers = array();
        try {
            if ($listorder) {
                //遍历传来数组，逐条修改数据库
               foreach ($listorder as $id => $v) {
                   $id = D($model)->updateListorderById($id, $v);
                   if ($id === false) {
                        $errers[] = $newId;
                   }
               }
               if ($errers) {
                   return show(0, '排序失败-' . implode(',', $errers), array('jump_url' => $jump_url));
               }
               return show(1, '排序成功', array('jump_url' => $jump_url));
            }
        } catch(Exception $e) {
            return show(0, $e->getMessage());
        }
        return show(0, '排序数据失败', array('jump_url' => $jump_url));
    }
}