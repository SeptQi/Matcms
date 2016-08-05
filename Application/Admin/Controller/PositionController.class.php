<?php
/**
 * @ desc: 推荐位管理
 * @ project: takahashi
 * @ Author: Qi
 * @ Date: 2016-07-23 19:42:26
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
use Think\Controller;

class PositionController extends CommonController
{
    public function index()
    {
        $page = $_REQUEST['p'] ? $_REQUEST['p'] : 1;
        $pageSize = 5;
        $position = D('Position')->getPosition($conds, $page, $pageSize);
        $count = D('Position')->getPositionCount();
        //dump($count);die;
        $res = new \Think\Page($count, $pageSize);
        $pageres = $res->show();
        $this->assign(array(
            'pageres'     => $pageres,
            'position'    => $position,
            'conds'       => $conds,
            ));
        $this->display();
    }
    public function setStatus()
    {
        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
            );
        return parent::setStatus($data, 'Position');
    }
    public function listorder()
    {
        return parent::listorder('Position');
    }
}