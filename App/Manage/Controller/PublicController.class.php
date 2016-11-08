<?php

namespace Manage\Controller;

class PublicController extends CommonController
{

    public function index()
    {

    }

    //后台内容主页
    public function main()
    {
        /* phpversion */
        $this->assign('phpversion', phpversion());
        $this->assign('software', $_SERVER["SERVER_SOFTWARE"]);
        $this->assign('os', PHP_OS);

        $_mysql_ver = M()->query('SELECT VERSION() as ver;');

        if (is_array($_mysql_ver)) {
            $mysql_ver = $_mysql_ver[0]['ver'];
        } else {
            $mysql_ver = '';
        }
        $this->assign('mysql_ver', $mysql_ver);
        $this->assign('saeflag', defined('APP_SAE_FLAG') ? 1 : 0);

        /* uploads */
        $this->assign('environment_upload', ini_get('file_uploads') ? ini_get('upload_max_filesize') : '不支持');
        $this->assign('cms_info', rw_data('ver', '', './Data/resource/'));
        $this->display();
    }

    public function editorMethod()
    {
        $_editor = new \Org\Editor\Ueditor();
    }

    //上传图片
    /**
     * 上传图片
     * @param  integer $img_flag 是否是图片(带缩略图)
     * @return [type]               [description]
     */
    public function upload($img_flag = 0)
    {
        header("Content-Type:text/html; charset=utf-8"); //不然返回中文乱码
        $result   = array('state' => '失败', 'url' => '', 'name' => '', 'original' => '');
        $sub_path = I('post.sfile', '', 'trim,htmlspecialchars'); //判断其他子目录

        $img_flag = empty($img_flag) ? 0 : 1;

        $yun_upload    = new \Common\Lib\YunUpload($img_flag, $sub_path);
        $upload_result = $yun_upload->upload();

        if ($upload_result['status']) {
            $result['state'] = 'SUCCESS';
            $result['info']  = $upload_result['data'];
        } else {
            $result['state'] = $upload_result['info'];
        }
        echo json_encode($result);

    }

    //文件/夹管理
    public function browseFile($spath = '', $stype = 'file')
    {
        $base_path  = '/uploads/img1';
        $enocdeflag = I('encodeflag', 0, 'intval');
        switch ($stype) {
            case 'picture':
                $base_path = '/uploads/img1';
                break;
            case 'file':
                $base_path = '/uploads/file1';
                break;
            case 'ad':
                $base_path = '/uploads/abc1';
                break;
            default:
                exit('参数错误');
                break;
        }

        if ($enocdeflag) {
            $spath = base64_decode($spath);
        }

        $spath = str_replace('.', '', $spath);
        if (strpos($spath, $base_path) === 0) {
            $spath = substr($spath, strlen($base_path));
        }

        $path = $base_path . '/' . $spath;
        $path = str_replace('//', '/', $path);

        $dir  = new \Common\Lib\Dir('.' . $path); //加上.
        $list = $dir->toArray();
        for ($i = 0; $i < count($list); $i++) {

            $list[$i]['isImg'] = 0;
            if ($list[$i]['isFile']) {
                $url = __ROOT__ . rtrim($path, '/') . '/' . $list[$i]['filename'];
                $ext = explode('.', $list[$i]['filename']);
                $ext = end($ext);
                if (in_array($ext, array('jpg', 'png', 'gif'))) {
                    $list[$i]['isImg'] = 1;
                }
            } else {
                //为了兼容URL_MODEL(1、2)
                if (in_array(C('URL_MODEL'), array(1, 2, 3))) {
                    $url = U('Public/browseFile', array('stype' => $stype, 'encodeflag' => 1, 'spath' => base64_encode(rtrim($path, '/') . '/' . $list[$i]['filename'])));
                } else {
                    $url = U('Public/browseFile', array('stype' => $stype, 'spath' => rtrim($path, '/') . '/' . $list[$i]['filename']));
                }

            }
            $list[$i]['url']  = $url;
            $list[$i]['size'] = get_byte($list[$i]['size']);
        }
        //p($list);
        $parentpath = substr($path, 0, strrpos($path, '/'));
        //为了兼容URL_MODEL(1、2)
        if (in_array(C('URL_MODEL'), array(1, 2, 3))) {
            $purl = U('Public/browseFile', array('spath' => base64_encode($parentpath), 'encodeflag' => 1, 'stype' => $stype));
        } else {
            $purl = U('Public/browseFile', array('spath' => $parentpath, 'stype' => $stype));
        }

        $this->assign('purl', $purl);
        $this->assign('vlist', $list);
        $this->assign('stype', $stype);
        $this->assign('type', '浏览文件');
        $this->display();

    }

}
