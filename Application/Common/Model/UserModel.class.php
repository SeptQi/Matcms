<?php
namespace Common\Model;
use Think\Model;

class UserModel extends Model
{
    private $_db='';
    public function __construct()
    {
        $this->_db = M('Admin');
    }

    public function getUser()
    {
        return $this->_db->where('status = 1')->select();
    }
    
    public function insert($data = array()){
        if(!$data || !is_array($data)){
            return 0;
        }
        return $this->_db->add($data);
    }

    public function updateById($data = array()){
        if(!$data || !is_array($data)){
            throw_exception('更新的数据不合法');
        }
        return $this->_db->where('admin_id ='.$data['admin_id'])->save($data);
    }
    
    public function getUserInfo($data){
        $conditions = $data;
        $conditions['status'] = 1;
        if(isset($data['title']) && $data['title']){
            $conditions['username'] = array('like','%'.$data['title'].'%');
        }
        if(isset($data['type']) && $data['type'] ){
            $conditions['type'] = intval($data['type']);
        }
        $list = $this->_db->where($conditions)->select();
        return $list;
    }
}