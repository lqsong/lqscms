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
	    var URL = '/xyhcms_lqs/lqs.php?s=/System';
	    var APP	 = '/xyhcms_lqs/lqs.php?s=';
	    var SELF='/xyhcms_lqs/lqs.php?s=/System/site';
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
		<div class="col-lg-12">
			<h4 class="page-header"><em class="glyphicon glyphicon-home"></em>
			网站设置   
		    </h4>
		</div>
		
	</div>
	<div class="row margin-botton">
        <div class="col-md-12 text-right">
            <div class="btn-group btn-group-md">
                 <button class="btn btn-default" type="button" onclick="goUrl('<?php echo U('index');?>')"><em class="glyphicon glyphicon-th-list"></em> 配置项管理</button>
            </div>
        </div>
    </div>


	<div class="row">
		<div class="col-lg-12">
			<div>
			
				<!-- Nav tabs -->			
				<ul class="nav nav-tabs" role="tablist">
					<?php if(is_array($configgroup)): foreach($configgroup as $key=>$v): ?><li role="presentation" <?php if($key == 1): ?>class="active"<?php endif; ?>>
						<a href="#tabConent<?php echo ($key); ?>" aria-controls="tabConent<?php echo ($key); ?>" role="tab" data-toggle="tab"><?php echo ($v); ?></a>
					</li><?php endforeach; endif; ?>
				</ul>

				<form method='post' class="form-horizontal" id="form_do" name="form_do" action="<?php echo U('site');?>">
					<!-- Tab panes -->			
					<div class="tab-content" style="margin-top:20px;">
						<?php if(is_array($vlist)): foreach($vlist as $key=>$v): ?><div role="tabpanel" <?php if($key == 1): ?>class="tab-pane active"<?php else: ?>class="tab-pane"<?php endif; ?> id="tabConent<?php echo ($key); ?>">
							<?php if(is_array($v)): foreach($v as $key=>$config): ?><div class="form-group">
								<label for="" class="col-sm-2 control-label"><?php echo ($config["title"]); ?></label>
								<div class="col-sm-9">
									<?php echo get_element_html("config[".$config['name']."]",$config['typeid'], $config['tvalue'], $config['value']);?>								
								</div>
							</div><?php endforeach; endif; ?>							
						</div><?php endforeach; endif; ?>

					</div>
					<div class="row">
						<div class="col-sm-offset-2 col-sm-9">
							<div class="btn-group">
								<button type="submit" class="btn btn-primary"> <i class="glyphicon glyphicon-saved"></i>
									保存
								</button>
							</div>
						</div>
					</div>
				</form>

			</div>
	
		</div>
	</div>

		



			
	</div>	
</body>
</html>