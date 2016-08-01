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

class NewsContentModel extends Model
{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('news_content');
    }
    public function insert($data = array())
    {
        if (!is_array($data) || !$data) {
            return 0;
        }
        $data['create_time'] = time();
        if (isset($data['content']) && $data['content']) {
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->add($data);
    }
    public function find($id)
    {
        $data = $this->_db->where('news_id=' . $id)->find();
        return $data;
    }
    public function updateNewsById($id, $data)
    {
        if (!$id || !is_numeric($id)) {
            throw_exception('id不合法');
        }
        if (!$data || !is_array($data)) {
            throw_exception('更新数据不合法');
        }
        if (isset($data['content']) && $data['content']) {
            $data['content'] = htmlspecialchars($data['content']);
        }
        return $this->_db->where('news_id=' . $id)->save($data);
    }
}

