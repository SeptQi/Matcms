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
        //搜索功能
        if (isset($_POST['search'])) {
            $cond['title'] = '%' . $_POST['search'] . '%';
        }
        //获取菜单id
        if (isset($_GET['catid'])) {
           $cond['catid'] = $_GET['catid'];
        }
        //获取菜单名
        $catName = D('Menu')->find($cond['catid'])['name'];
        //选择为打开状态的文章
        $cond['status'] = 1;
        //获取列表页
        $list = D('News')->select($cond);
        foreach ($list as $key => $value) {
            $list[$key]['content'] = strip_tags(htmlspecialchars_decode(D('NewsContent')->find($value['news_id'])['content']));
        }
        //header.html需要数据
        $navs = D('Menu')->getBarMenus();
        $config = D('Basic')->select();
        $this->assign(array(
            'catname' => $catName,
            'list'    => $list,
            'navs'    => $navs,
            'config'  => $config,
            'catId'   => $cond['catid'],
            'search'  => $_GET['search'],
            ));
        $this->display();
    }
}