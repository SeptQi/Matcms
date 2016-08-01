<?php
/**
 * @ desc: 基本配置模型层
 * @ project: Takahashi
 * @ Author: Qi
 * @ Date: 2016-07-29 21:20:15
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

class BasicModel extends Model
{
    public function __construct()
    {

    }
    public function save($data = array())
    {
        if (!$data) {
            throw_exception('未提交数据');
        }
        $id = F('basic_web_config', $data);
        return $id;
    }
    public function select()
    {
        return F('basic_web_config');
    }
}