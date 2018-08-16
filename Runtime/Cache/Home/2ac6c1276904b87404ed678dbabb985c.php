<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>首页</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="/Public/Home/js/rem.js"></script>
	<!-- <script src="js/mui.min.js"></script> -->
	<link rel="stylesheet" href="/Public/Home/css/reset.css" />
	<link href="/Public/Home/css/mui.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/Public/Home/css/main.css" />
	<link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
	<script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
	<script src="/Public/Home/js/highcharts.js"></script>
	<script src="/Public/layer/layer.js"></script>
	<script src="/Public/Home/js/main.js"></script>
</head>
<style>
	.Pagination a:hover,.current{background-color: #f5930c;border: 1px solid #f5980c;color: #ffffff; }
	.Pagination{float: right;height: auto;_height: 45px; line-height: 20px;margin-right: 15px;_margin-right: 5px; color:#565656;margin-top: 10px;_margin-top: 20px; clear:both;}
	.Pagination a,.Pagination span{ font-size: 14px;text-decoration: none;display: block;float: left;color: #565656;border: 1px solid #ccc;height: 34px;line-height: 34px;margin: 0 2px;width: 34px;text-align: center;}
</style>
<body class="gray-body">
	<header class="fixed news-header">
		<a href="javaScript:history.go(-1)" class="back"><i class="iconfont">&#xe647;</i></a>
		<span class="tit">公告</span>
	</header>
	<div class="mui-content news-content">
		<div class="news-list">
			<ul>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a href="<?php echo U('Article/detail','id='.$vo['id']);?>" class="clearfix">
							<div class="list-left">
								<h4><?php echo ($vo["title"]); ?></h4>
								<p><?php echo (msubstr($vo["content"],0,30,'utf-8',true)); ?></p>
							</div>
							<div class="time"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></div>
						</a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>


			
			</ul>
			<div class="Pagination"><?php echo ($page); ?></div>
		</div>
	</div>
	<nav class="nav-wrap">
    <a class="tab-item active" href="<?php echo U('index/index');?>">
        <span class="nav-icon index"></span>
        <span class="tab-label">首页</span>
    </a>
    <a class="tab-item" href="<?php echo U('Trade/index');?>">
        <span class="nav-icon trade"></span>
        <span class="tab-label">交易大厅</span>
    </a>
    <a class="tab-item" href="<?php echo U('trade/seeklist');?>">
        <span class="nav-icon groom"></span>
        <span class="tab-label">推荐大厅</span>
    </a>
    <a class="tab-item" href="<?php echo U('User/index');?>">
        <span class="nav-icon personal"></span>
        <span class="tab-label">我的</span>
    </a>
</nav>

<script src="/Public/Home/js/main.js"></script>


</body>