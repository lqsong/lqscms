<?php
/**
 *
 * @Last Modified time: 2016-06-21 12:40:00
 */
namespace Mobile\Controller;

class AbcController extends MobileCommonController
{
    //shows
    public function shows()
    {

        $id   = I('id', 0, 'intval');
        $flag = I('flag', 0, 'intval');
        if (!empty($id)) {
            echo get_abc($id, $flag);
        } else {
            echo '';
        }

    }
}
