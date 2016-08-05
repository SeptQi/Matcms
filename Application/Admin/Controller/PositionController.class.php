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
    /*添加推荐位*/
    public function add()
    {
    	if(IS_POST) {
    		if(!isset($_POST['name']) || !$_POST['name']) {
    			return show(0,'推荐位名称为空');
    		}
    		if($_POST['id']) {
    			return $this->save($_POST);
    		}
    		try{
    			$id=M('Position')->add($_POST);
    			if($id) {
    				return show(1,'新增成功',$id);
    			}
    			return show(0,'新增失败',$id);
    		}catch(Exception $e) {
    			return show(0,$e->getMessage());
    		}
    		return show(0,'新增失败',$newsId);
    	}else{
    		$this->display();
    	}

    }
    /*编辑*/
    public function edit()
    {
    	$data = array(
    			'status'=>array('neq',-1),
    		);
    	$id = $_GET['id'];
    	$position = M('Position')->find($id);
    	$this->assign('vo',$position);
    	$this->display();
    }
    public function save($data)
    {
    	$id = $data['id'];
    	unset($data['id']);
       // dump($id);die;
    	try{
    		$id = D('Position')->updateById($id,$data);

    		if($id === false) {
    			return show(0,'更新失败');
    		}
    		return show(1,'更新成功');
    	}catch(Exception $e){
    		return show(0,$e->getMessage());
    	}
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