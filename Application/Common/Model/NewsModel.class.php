<?php
/**
 * 文章内容model操作
 * Created for takahashi.
 * Author: Qi
 * Date: 2016.7.22
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

class NewsModel extends Model
{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('news');
    }
    public function insert($data = array())
    {
        if (!is_array($data) || !$data) {
            return 0;
        }
        $data['create_time'] = time();
        $data['username'] = getLoginUsername();
        return $this->_db->add($data);
    }
    public function select($data = array(), $limit = 0)
    {
        $conditions = $data;
        if (isset($data['title']) && $data['title']) {
            $conditions['title'] = array('like','%' . $data['title'] . '%');
        }
        if (isset($data['catid']) && $data['catid']) {
            $conditions['catid'] = $data['catid'];
        }
        $list = $this->_db
            ->where($conditions)
            ->order('listorder desc,news_id desc')
            ->limit($limit)
            ->select();
        return $list;
    }
    public function getNewsCount($data = array())
    {
        if (isset($data['title']) && $data['title']) {
            $data['title'] = array('like','%' . $data['title'] . '%');
        }
        return $this->_db->where($data)->count();
    }
    public function find($id)
    {
        $data = $this->_db->where('news_id=' . $id)->find();
        return $data;
    }
    public function updateById($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception('id不合法');
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        return $this->_db->where('news_id=' . $id)->save($data);
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
        return $this->_db->where('news_id=' . $id)->save($data);
    }
    public function updateListorderById($id, $listorder)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception('ID不合法');
        }
        $data = array('listorder' => intval($listorder));
        return $this->_db->where('news_id=' . $id)->save($data);
    }
    public function getNewsByNewsId($newsIds)
    {
        if (!is_array($newsIds)) {
            throw_exception('参数不合法');
        }
        $data = array(
            'news_id' => array('in', implode(',', $newsIds)),
            );
        return $this->_db->where($data)->select();
    }
    /**
     * 获取文章排行
     * @param  array   $data
     * @param  integer $limit
     * @return array
     */
    public function getRank($data = array(), $limit = 100)
    {
        $list = $this->_db->where($data)->order('count desc,news_id desc')->limit($limit)->select();
        return $list;
    }
}