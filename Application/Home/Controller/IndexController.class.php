<?php
namespace Home\Controller;
class IndexController extends CommonController
{
    public function index()
    {
        $navs = D('Menu')->getBarMenus();
        foreach ($navs as $key => $value) {
            $catid = $value['menu_id'];
            $pos_name = $value['name'];
            $pos_id = $value['pos_id'];
            $contents[$pos_name] = D('Positioncontent')->select(array('status' => 1, 'position_id' => $pos_id), 3);
            foreach ($contents[$pos_name] as $key => $value) {
                $contents[$pos_name][$key]['content'] = strip_tags(htmlspecialchars_decode(D('NewsContent')->find($value['news_id'])['content']));
                $contents[$pos_name][$key]['catid'] = $catid;
            }
        }
        $topPicNews = D('Positioncontent')->select(array('status' => 1, 'position_id' => 1));
        $config = D('Basic')->select();
        $catId = $_GET['id'] ? $_GET['id'] : 0;
        $this->assign(array(
            'topPicNews' => $topPicNews,
            'contents'   => $contents,
            'navs'       => $navs,
            'config'     => $config,
            'catId'      => $catId,
            ));
        $this->display();
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