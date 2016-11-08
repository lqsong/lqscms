<?php
/**
 * @copyright   Copyright (c) 2014-2016 lqscms.com All rights reserved.
 * @license     http://www.lqscms.com/help/1.html
 */

if (version_compare(PHP_VERSION, '5.3.0', '<')) {
	die('require PHP > 5.3.0 !');
}

define('BIND_MODULE', 'Manage');
define('APP_DEBUG', false);
define('APP_PATH', "./App/");
define('THINK_PATH', "./Include/");
require THINK_PATH . 'ThinkPHP.php';
