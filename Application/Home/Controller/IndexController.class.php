<?php
namespace Home\Controller;
class IndexController extends CommonController
{
    public function index()
    {
        
        $topPicNews = D('Positioncontent')->select(array('status' => 1, 'position_id' => 1));
        $news       = D('Positioncontent')->select(array('status' => 1, 'position_id' => 2), 3);
        $technology = D('Positioncontent')->select(array('status' => 1, 'position_id' => 3), 3);
        $amusement  = D('Positioncontent')->select(array('status' => 1, 'position_id' => 4), 3);
        $sport      = D('Positioncontent')->select(array('status' => 1, 'position_id' => 5), 3);
        $this->assign('result', array(
            'topPicNews' => $topPicNews,
            'news'       => $news,
            'technology' => $technology,
            'amusement'  => $amusement,
            'sport'      => $sport,
            'rankNews'   => $rankNews,
            ));
        $this->display();
        //$this->show();
    }
    public function check()
    {
        return show(1, '登陆成功');
    }
    public function insert()
    {
        return show(1, '注册成功');
    }

}