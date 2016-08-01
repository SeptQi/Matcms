<?php
/**
 * @ desc: 推荐位内容模块
 * @ project: Takahashi
 * @ Author: Qi
 * @ Date: 2016-07-26 22:17:48
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

class PositioncontentModel extends Model
{
    private $_db = '';

    public function __construct()
    {
        $this->_db = M('position_content');
    }

    public function insert($data = array())
    {
        //dump($data);die;
        if (!is_array($data) || !$data) {
            return 0;
        }
        return $this->_db->add($data);
    }

    public function select($data = array(), $limit = 0)
    {
        if (isset($data['title']) && $data['title']) {
            $data['title'] = array('like', '%' . $data['title'] . '%');
        }
        $this->_db->where($data)->order('listorder desc,id desc');
        if ($limit) {
            $this->_db->limit($limit);
        }
        $list = $this->_db->select();
        //echo $this->_db->getLastSql(); die;
        return $list;
    }

    public function getPositioncontentCount($data = array())
    {
        if (isset($data['title']) && $data['title']) {
            $data['title'] = array('like', '%' . $data['title'] . '%');
        }
        return $this->_db->where($data)->count();
    }

    public function find($id)
    {
        return $this->_db->find($id);
    }

    public function updateById($id, $data)
    {
        //dump($data);die;
        if (!$data || !is_array($data)) {
            throw_exception('修改数据不合法');
        }
        return $this->_db->where('id=' . $id)->save($data);
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
        //echo $this->_db->getLastSql();die;
    }
    public function updateListorderById($id, $listorder)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('listorder' => intval($listorder));
        return $this->_db->where('id=' . $id)->save($data);
    }
}