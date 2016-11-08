<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,Chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>后台管理</title>
    <script type="text/javascript" src="/xyhcms_lqs/Data/static/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="/xyhcms_lqs/Data/static/jq_plugins/nicescroll/3.6.8/jquery.nicescroll.min.js"></script>
    <script src="/xyhcms_lqs/App/Manage/View/Public/js/frame.js?v201625" language="javascript" type="text/javascript"></script>
    <script type="text/javascript" src="/xyhcms_lqs/Data/static/jq_plugins/layer/layer.js"></script>
    <link href="/xyhcms_lqs/App/Manage/View/Public/css/frame.css" rel="stylesheet" type="text/css" />

    <!--[if IE 6]>
    <script src="/xyhcms_lqs/App/Manage/View/Public/js/DD_belatedPNG_0.0.8a-min.js" language="javascript" type="text/javascript"></script>
    <script>
      DD_belatedPNG.fix('.nav ul li a,.top_link ul li,background');   /* string argument can be any CSS selector */
    </script>
    <![endif]-->
</head>
<body class="showmenu">
<div class="pagemask"></div>
<iframe class="iframemask"></iframe>
<div class="head">
    <div class="top_logo">
        <a href="<?php echo C('CFG_WEBURL');?>" target="_blank"><img src="/xyhcms_lqs/App/Manage/View/Public/images/main/logo.png" width="153" /> </a>
    </div>

    <div class="nav pull-left">
        <ul>
            <li id="menu_menu"><a id="togglemenu"  href="javascript:void (null);"    data-title="隐藏菜单"></a></li>
        </ul>
    </div>


     <div class="nav" id="nav">
      <ul>
      	<?php if(is_array($menu)): foreach($menu as $k=>$v): ?><li id="menu_<?php echo ($k); ?>"><a <?php if(empty($k)): ?>class="thisclass"<?php endif; ?> href="javascript:void (null);" _for="left_menu_<?php echo ($k); ?>" data-title="<?php echo ($v["name"]); ?>"></a></li><?php endforeach; endif; ?>
          <li id="menu_exit"><a href="<?php echo U('Login/logout');?>"  target="_top"  data-title="退出"></a></li>
      </ul>
    </div>

    <!--
     <div class="top_link">
      <ul>
        <li id="i_self"><?php echo (session('yang_adm_username')); ?></li>
		<li id="i_hide_menu"><a href="#" id="togglemenu">隐藏菜单</a></li>
        <li id="i_home"><a href="<?php echo C('CFG_WEBURL');?>" target="_blank">首页</a></li> 

      </ul>
    </div>
    -->
</div>
<!-- header end -->

<div class="left">
<div class="menu" id="menu" data-url="<?php echo U('Index/getParentCate');?>">
<?php if(is_array($menu)): foreach($menu as $k=>$v): ?><div id="items_left_menu_<?php echo ($k); ?>">
	<?php if(is_array($v["child"])): $k2 = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v2): $mod = ($k2 % 2 );++$k2;?><dl id="dl_items_<?php echo ($k2); ?>_<?php echo ($k); ?>">
		<dt><?php echo ($v2["name"]); ?></dt>
		<dd>
		<ul>

      <?php if($v2['id'] == 7): if(is_array($qmenu)): $k3 = 0; $__LIST__ = $qmenu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k3 % 2 );++$k3;?><li><a href="<?php echo U($v3['module'].'/'.$v3['action'].'', $v3['parameter']);?>" target="main"><?php echo ($v3["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>  
      <?php else: ?>
      <?php if(is_array($v2["child"])): $k3 = 0; $__LIST__ = $v2["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($k3 % 2 );++$k3;?><li><a href="<?php echo U($v3['module'].'/'.$v3['action'].'', $v3['parameter']);?>" target="main"><?php echo ($v3["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
		</ul>
		</dd>
	</dl><?php endforeach; endif; else: echo "" ;endif; ?>	
	
</div><?php endforeach; endif; ?>
<!-- Item End -->


</div>
</div>
<!-- left end -->

<div class="right">
	<div class="rightContent">
	<iframe id="main" name="main" frameborder="0" scrolling="yes" src="<?php echo U('Public/main');?>" ></iframe>
	</div>    
</div>
<!-- right end -->


</body>
</html>