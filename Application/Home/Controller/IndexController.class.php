<?php
namespace Home\Controller;
class IndexController extends CommonController {
    public function index()
    {
        $rankNews = $this->getRank();
        $topPicNews = D('Positioncontent')->select(array('status' => 1, 'position_id' => 1));
        $topSmallNews1 = D('Positioncontent')->select(array('status' => 1, 'position_id' => 2), 3);
        $topSmallNews2 = D('Positioncontent')->select(array('status' => 1, 'position_id' => 2), '2,3');
        //dump($topPicNews);die;
        $this->assign('result', array(
            'topPicNews' => $topPicNews,
            'topSmallNews1' => $topSmallNews1,
            'topSmallNews2' => $topSmallNews2,
            'rankNews' => $rankNews,
            'catId' => 0,
            ));
        $this->display();
        //$this->show();
    }
    public function _empty()
    {
        $this->display("Empty/empty");
    }
}