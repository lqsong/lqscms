<?php

namespace Manage\Controller;

class TempletsController extends CommonController {

	public function index($ftype = 0) {

		$vlistFileType = array('PC默认模板', '手机默认模板');

		$file_path = !$ftype ? './Public/Home/' . C('CFG_THEMESTYLE') . '/' : './Public/Mobile/' . C('CFG_MOBILE_THEMESTYLE') . '/';

		$list = glob($file_path . '*');
		$fileArray = array();
		foreach ($list as $file) {

			if (is_file($file)) {
				$name = basename($file);
				$fileArray[] = array(
					'name' => $name,
					'bname' => base64_encode($name),
					'path' => $file,
					'write' => is_writable($file),
					'mtime' => filemtime($file),
				);
			}
		}

		$this->assign('vlist', $fileArray);
		$this->assign('vlistFileType', $vlistFileType);
		$this->assign('ftype', $ftype);
		$this->assign('type', '模板列表');
		$this->display();

	}

	public function edit() {
		$ftype = I('ftype', 0, 'intval');
		$fname = I('fname', '', 'trim,htmlspecialchars');
		$file_path = !$ftype ? './Public/Home/' . C('CFG_THEMESTYLE') . '/' : './Public/Mobile/' . C('CFG_MOBILE_THEMESTYLE') . '/';
		if (IS_POST) {
			if (empty($fname)) {
				$this->error('未指定文件名');
			}

			$content = I('content', '', '');
			$fname = ltrim($fname, './');
			$truefile = $file_path . $fname;
			if (false !== file_put_contents($truefile, $content)) {
				$this->success('保存成功', U('index', array('ftype' => $ftype)));
			} else {
				$this->error('保存文件失败，请重试');
			}

			exit();
		}

		$fname = base64_decode($fname);
		if (empty($fname)) {
			$this->error('未指定要编辑的文件');
		}
		$truefile = $file_path . $fname;

		if (!file_exists($truefile)) {
			$this->error('文件不存在');
		}
		$content = file_get_contents($truefile);
		if ($content === false) {
			$this->error('读取文件失败');
		}
		$content = htmlspecialchars($content);

		$this->assign('ftype', $ftype);
		$this->assign('fname', $fname);
		$this->assign('content', $content);
		$this->assign('type', '修改模板');
		$this->display();

	}

	public function add($ftype = 0, $flag = 2) {
		$ftype = intval($ftype);
		$file_path = !$ftype ? './Public/Home/' . C('CFG_THEMESTYLE') . '/' : './Public/Mobile/' . C('CFG_MOBILE_THEMESTYLE') . '/';

		$fname_prefix = $flag == 2 ? 'Show_' : ($flag == 1 ? 'List_' : 'Index_');

		$fname = uniqid($fname_prefix) . '.html';
		$content = '';

		$this->assign('ftype', $ftype);
		$this->assign('fname', $fname);
		$this->assign('content', $content);
		$this->assign('type', '新建模板');
		$this->display('edit');

	}

	public function del() {
		$ftype = I('ftype');
		$fname = I('fname', '', 'base64_decode');
		if (empty($fname)) {
			$this->error('参数错误');
		}
		$file_path = !$ftype ? './Public/Home/' . C('CFG_THEMESTYLE') . '/' : './Public/Mobile/' . C('CFG_MOBILE_THEMESTYLE') . '/';
		$truefile = $file_path . $fname;

		if (unlink($truefile)) {
			$this->success('删除文件成功', U('index', array('ftype' => $ftype)));
		} else {
			$this->error('删除文件失败');
		}

	}

}
