<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="baidu-site-verification" content="unXl91MyB6" />
	<link rel="stylesheet" type="text/css" href="/xyhcms_lqs/Data/static/bootstrap/3.3.5/css/bootstrap.min.css" media="screen">	
	<link rel='stylesheet' type="text/css" href="/xyhcms_lqs/App/Manage/View/Public/css/main.css" />
	<!-- 头部css文件|自定义  -->
	

	<script type="text/javascript" src="/xyhcms_lqs/Data/static/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/xyhcms_lqs/Data/static/jq_plugins/nicescroll/3.6.8/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="/xyhcms_lqs/Data/static/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		<script src="/xyhcms_lqs/Data/static/js/html5shiv.min.js"></script>
		<script src="/xyhcms_lqs/Data/static/js/respond.min.js"></script>
    <![endif]-->
	
	<script type="text/javascript" src="/xyhcms_lqs/App/Manage/View/Public/js/jquery.form.min.js"></script>
	<script type="text/javascript" src="/xyhcms_lqs/Data/static/jq_plugins/layer/layer.js"></script>
	<script language="JavaScript">
	    <!--
	    var URL = '/xyhcms_lqs/lqs.php?s=/Public';
	    var APP	 = '/xyhcms_lqs/lqs.php?s=';
	    var SELF='/xyhcms_lqs/lqs.php?s=/Public/main';
	    var PUBLIC='/xyhcms_lqs/App/Manage/View/Public';
	    var data_path = "/xyhcms_lqs/Data";
		var tpl_public = "/xyhcms_lqs/App/Manage/View/Public";
	    //-->
	</script>
	<script type="text/javascript" src="/xyhcms_lqs/App/Manage/View/Public/js/common.js"></script> 
	<!-- 头部js文件|自定义 -->
	
</head>
<body>
	<div class="lqs-content">
		
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-info">
				<!-- Default panel contents -->		
				<div class="panel-heading"><em class="glyphicon glyphicon-star"></em> 我的个人信息</div>
				<div class="panel-body">
					<p>
						您好，<?php echo (session('yang_adm_username')); ?>
						<br/>		
						上次登录时间：<?php echo (session('yang_adm_logintime')); ?>
						<br/>		
						上次登录IP：<?php echo (session('yang_adm_loginip')); ?>
						<br/>		
					</p>
				</div>
			</div>


			<div class="panel panel-success">
				<!-- Default panel contents -->		
				<div class="panel-heading">系统信息</div>
				<div class="panel-body">
					操作系统：<?php echo ($os); ?> <br />
					服务器软件：<?php echo ($software); ?><br />
					MySQL 版本：<?php echo ($mysql_ver); ?><br />
					上传文件：<?php echo ($environment_upload); ?><br />	
				</div>
			</div>
			


		</div>

		<div class="col-md-6">
			<div class="panel panel-warning">
				<!-- Default panel contents -->		
				<div class="panel-heading">安全提示</div>
				<div class="panel-body">
					<p>
						1.取消uploads目录的执行权限！
						<br/>		

					</p>
				</div>
			</div>





		</div>


	</div>




			
	</div>	
</body>
</html>