<?php
/**
 * Created for takahashi.
 * User: Qi
 * Date: 2016.7.4
 */
namespace Common\Model;
use Think\Model;

class AdminModel extends Model
{
    private $_db = '';
    public function __construct()
    {
        $this->_db = M('admin');
    }
    public function getAdminByUsername($username)
    {
        $ret = $this->_db->where('username="' . $username . '"')->find();
        return $ret;
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

    public function checkUser($data)
    {
        if(!$data || !is_array($data)){
            throw_exception('数据不合法');
        }
        return $this -> _db -> where('username = "'.$data['username'].'"') -> find();
    }
}