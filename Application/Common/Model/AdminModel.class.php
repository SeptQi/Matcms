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
}