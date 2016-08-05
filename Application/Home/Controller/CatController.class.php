<?php
/**
 * @ desc: XXXXXXXXXXX
 * @ project: XXXXXXXXXXX
 * @ Author: Qi
 * @ Date: 2016-08-01 15:22:24
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
namespace Home\Controller;

class CatController extends CommonController
{
    public function index()
    {
        $catId = $_GET['catid'];
        $catName = D('Menu')->find($catId)['name'];
        $list = D('News')->select(array('status' => 1, 'catid' => $catId));
        foreach ($list as $key => $value) {
            $list[$key]['content'] = strip_tags(htmlspecialchars_decode(D('NewsContent')->find($value['news_id'])['content']));
        }
        //header.html需要数据
        $navs = D('Menu')->getBarMenus();
        $config = D('Basic')->select();
        $this->assign(array(
            'catname' =>$catName,
            'list'    => $list,
            'navs'    => $navs,
            'config'  => $config,
            'catId'   => $catId,
            ));
        $this->display();
    }
}