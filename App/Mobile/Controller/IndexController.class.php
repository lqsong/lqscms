<?php
/**
 *
 * @Last Modified time: 2016-06-21 12:40:12
 */

namespace Mobile\Controller;

class IndexController extends MobileCommonController
{
    //方法：index
    public function index()
    {

        $this->assign('title', C('CFG_WEBNAME'));
        $this->display();

    }
}
