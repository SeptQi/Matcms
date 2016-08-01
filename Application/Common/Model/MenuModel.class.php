<?php
/**
 * Created for takahashi.
 * User: Qi
 * Date: 2016.7.6
 */

namespace Common\Model;

use Think\Model;

class MenuModel extends Model
{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('menu');
    }
    public function insert($data = array())
    {
        if (!$data || !is_array($data)) {
            return 0;
        }
        return $this->_db->add($data);
    }
    public function getMenus($data, $page, $pageSize = 10)
    {
        $data['menu_id'] = array('neq', 1);
        $data['status'] = array('neq', -1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db->where($data)->order('listorder desc, menu_id desc')->limit($offset, $pageSize)->select();
        return $list;
    }
    public function getMenuCount($data = array())
    {
        $data['menu_id'] = array('neq', 1);
        $data['status'] = array('neq', -1);
        return $this->_db->where($data)->count();
    }
    public function find($id)
    {
        if (!$id || !is_numeric($id)) {
            return array();
        }
        return $this->_db->where('menu_id='.$id)->find();
    }
    public function updateMenuById($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        return $this->_db->where('menu_id='.$id)->save($data);
    }
    public function updateStatusById($id ,$status)
    {
        if (!is_numeric($status)) {
            throw_exception('status不合法');
        }
        if (!$id || !is_numeric($id)) {
            throw_exception('id不合法');
        }
        $data['status'] = $status;
        return $this->_db->where('menu_id=' . $id)->save($data);
        //echo $this->_db->getLastSql();die;
    }
    public function updateListOrderById($id, $listorder)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array(
            'listorder' => intval($listorder),
        );
        return $this->_db->where('menu_id='.$id)->save($data);
    }
    public function getAdminMenus()
    {
        $data = array(
            'status' => 1,
            'type' => 1,//后台
        );
        return $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
    }
    public function getBarMenus()
    {
        $data = array(
            'status' => 1,
            'type' => 0,//前台
        );
        $res = $this->_db->where($data)->order('listorder desc,menu_id desc')->select();
        return $res;
    }
}