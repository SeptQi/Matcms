<?php
/**
 * @ desc: 推荐位管理模型
 * @ project: takahashi
 * @ Author: Qi
 * @ Date: 2016-07-23 19:54:20
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
namespace Common\Model;
use Think\Model;

class PositionModel extends Model
{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('position');
    }
    public function getPosition($data, $page, $pageSize = 10)
    {
        $conditions = $data;
        $conditions['status'] = array('neq', -1);
        $offset = ($page - 1) * $pageSize;
        $list = $this->_db
            ->where($conditions)
            ->order('id desc')
            ->limit($offset, $pageSize)
            ->select();
        return $list;
    }
    public function getPositionCount()
    {
        $conditions['status'] = array('neq', -1);
        return $this->_db->where($conditions)->count();
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
        return $this->_db->where('id=' . $id)->save($data);
    }
    public function getNormalPositions()
    {
        $conditions = array('status' => 1);
        return $list = $this->_db->where($conditions)->order('id')->select();
    }
}