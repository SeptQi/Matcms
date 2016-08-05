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

class DetailController extends CommonController
{
    public function index()
    {
        $id = $_GET['id'];
        $catId = $_GET['catid'];
        $catName = D('Menu')->find($catId)['name'];
        $article = D('News')->find($id);
        $article['content'] = htmlspecialchars_decode(D('NewsContent')->find($article['news_id'])['content']);
        //header.html需要数据
        $navs = D('Menu')->getBarMenus();
        $config = D('Basic')->select();
        $this->assign(array(
            'article' => $article,
            'catname' => $catName,
            'navs'    => $navs,
            'config'  => $config,
            'catId'   => $catId,
            ));
        $this->display();
    }
}