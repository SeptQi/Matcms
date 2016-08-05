<?php
/**
 * @ desc: 推荐位内容管理
 * @ project: takahashi
 * @ Author: Qi
 * @ Date: 2016-07-23 19:38:49
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
use \Admin\Vendor\Page;

class PositioncontentController extends CommonController
{
    public function index()
    {
        $positions = D('Position')->getNormalPositions();
        $data['status'] = array('neq', -1);
        if ($_GET['title']) {
            $data['title'] = trim($_GET['title']);
            $title = $data['title'];
        }
        $data['position_id'] = $_GET['position_id'] ? $_GET['position_id'] : $positions[0]['id']; 
        $positionid = $data['position_id'];
        //分页
        $page = $_GET['p'] ? $_GET['p'] : 1;
        $pageSize = 5;
        $startRow = ($page - 1) * $pageSize;
        $count = D('Positioncontent')->getPositioncontentCount($data);
        $pageObj =new Page($count, $pageSize);
        $limit = $startRow . "," . $pageSize;
        $lists = D('Positioncontent') -> select($data, $limit);
        $this->assign(array(
            'positions'  => $positions,
            'title'      => $title,
            'lists'      => $lists,
            'positionid' => $positionid,
            'pageres'       => $pageObj->show(),
            ));
        $this->display();
    }
    public function add()
    {
        if ($_POST) {
            if (!isset($_POST['position_id']) || !$_POST['position_id']) {
                return show(0, '推荐位ID不能为空');
            }
            if (!isset($_POST['title']) || !$_POST['title']) {
                return show(0, '标题不能为空');
            }
            if (!$_POST['url'] && !$_POST['news_id']) {
                return show(0, 'URL和文章ID不可同时为空');
            }
            if (!isset($_POST['thumb']) || !$_POST['thumb']) {
                if ($_POST['news_id']) {
                    $res = D('news')->find($_POST['news_id']);
                    if ($res && is_array($res)) {
                        $_POST['thumb'] = $res['thumb'];
                    }
                } else {
                   return show(0, '缩略图不能为空');
                }
            }
            if ($_POST['id']) {
                $this->save($_POST);
            }
            $_POST['create_time'] = time();
            try {
                $id = D('Positioncontent')->insert($_POST);
                if ($id) {
                    return show(1, '添加成功 ');
                }
                return show(0, '添加失败');
            } catch(Excption $e) {
                return show(0, $e->getMessage());
            }
        }
        $positions = D('Position')->getNormalPositions();
        $this->assign(array(
            'positions' => $positions,
            ));
        $this->display();
    }
    public function edit()
    {
        $id = $_GET['id'];
        $positioncont = D('Positioncontent')->find($id);
        $positions = D('Position')->getNormalPositions();
        $this->assign(array(
            'positions' => $positions,
            'positioncont' => $positioncont,
            ));
        $this->display();   
    }
    public function save($post)
    {
        //dump($post);die;
        $id = $post['id'];
        unset($post['id']);
        try {
            $res = D('Positioncontent')->updateById($id, $post);
            if ($res === 0) {
                return show(0, '未修改');
            } elseif($res === false) {
                return show(0, '修改失败');
            }
            return show(1, '修改成功');               
        } catch(Exception $e) {
            return show(0, $e->getMessage());
        }
    }
    public function setStatus()
    {
        $data = array(
            'id' => intval($_POST['id']),
            'status' => intval($_POST['status']),
            );
        return parent::setStatus($data, 'Positioncontent');
    }
    public function listorder()
    {
        return parent::listorder('Positioncontent');
    }
}
