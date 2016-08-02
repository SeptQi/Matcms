<?php
/**
 * Created for takahashi.
 * User: Qi
 * Date: 2016.7.6
 *                        . .
 *                      '.-:-.`  
 *                      '  :  `
 *                   .-----:     
 *                 .'       `.
 *           ,    /       (o) \   
 *           \`._/          ,__)
 *       ~~~~~~~~~~~~~~~~~~~~~~~~~~~~
 *       
 *       Code is far away from bug with the dolphin protecting
 *                       海豚保佑,代码无bug
 */

namespace Admin\Controller;
use Think\Exception;

class MenuController extends CommonController
{
    /**
     * 菜单首页
     */
    public function index()
    {
        $data = array();
        //菜单默认选择后台菜单
        $data['type'] = (isset($_REQUEST['type']) && in_array($_REQUEST['type'], array(0, 1))) ? intval($_REQUEST['type']) : 1;
        //分页操作
        $page = isset($_REQUEST['p']) ? $_REQUEST['p'] : 1;
        $pageSize = isset($_REQUEST['pageSize']) ? $_REQUEST['pageSize'] : 5;
        $menus = D('Menu')->getMenus($data, $page, $pageSize);
        foreach ($menus as $k => $v) {
            $pos_id = $v['pos_id'];
            if ($pos_id) {
                $pos = D('position')->find($pos_id);
                $menus[$k]['posname'] = $pos['name'];     
            }
        }
        $menusCount = D('Menu')->getMenuCount($data);
        $res = new \Admin\Vendor\Page($menusCount, $pageSize);
        $pageRes = $res->show();
        $this->assign(array(
            'pageRes' => $pageRes,
            'menus'   => $menus,
            'type'    => $data['type'],
            ));
        $this->display();
    }
    /**
     * 添加页面
     */
    public function add()
    {
        if ($_POST) {
            if (!isset($_POST['name']) || !$_POST['name']) {
                return show('0', '菜单名不可为空');
            }
            if (!isset($_POST['m']) || !$_POST['m']) {
                return show('0', '模块名不可为空');
            }
            if (!isset($_POST['c']) || !$_POST['c']) {
                return show('0', '控制器不可为空');
            }
            if (!isset($_POST['f']) || !$_POST['f']) {
                return show('0', '方法名不可为空');
            }
            if ($_POST['menu_id']) {
                return $this->save($_POST);
            }
            $menuId = D("Menu")->insert($_POST);
            if ($menuId) {
                return show(1, '添加成功', $menuId);
            }
            return show(0, '添加失败', $menuId);
        } else {
            $this->display();
        }
    }
    /**
     * 编辑页面
     */
    public function edit()
    {
        $menuId = $_GET['id'];
        $menu = D("Menu")->find($menuId);
        $this->assign('menu', $menu);
        $this->display();
    }
    /**
     * 保存方法
     */
    public function save($data)
    {
        $menuId = $data['menu_id'];
        unset($data['menu_id']);
        try {
            $id = D('Menu')->updateMenuById($menuId, $data);
            if ($id == false) {
                return show(0, '更新失败');
            }
            return show(1, '更新成功');
        } catch (Exception $e) {
            return show(0, $e->getMessage());
        }
    }
    /**
     * 获取列表
     */
    public function listOrder()
    {
        return parent::listorder('Menu');
    }
    /**
     * 修改状态
     */
    public function setStatus()
    {
        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
            );
        return parent::setStatus($data, 'Menu');
    }
}