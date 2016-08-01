<?php
/**
 * @ desc: 测试控制器
 * @ project: takahashi
 * @ Author: Qi
 * @ Date: 2016-07-24 18:34:32
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
use Think\Exception;

class TestController extends Controller
{
    function getCount()
    {
        $navs = '555';
        try {
            $navs = ($navs == 'content') ? 'news' : $navs;
            $navs = ucfirst($navs);
            $getc = 'get' . $navs . 'Count';
            echo D($navs)->$getc();
        } catch(Exception $e) {
            echo 0;
        }
    }
}