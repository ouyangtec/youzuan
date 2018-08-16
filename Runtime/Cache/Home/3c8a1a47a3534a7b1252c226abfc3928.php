<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>公告详情</title>
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
<body>
	<header class="fixed news-header">
		<a href="javaScript:history.go(-1)" class="back"><i class="iconfont">&#xe647;</i></a>
		<span class="tit">公告</span>
	</header>

		<div class="news-content news-detail-con">
			<h3><?php echo ($data["title"]); ?></h3>
			<span>发布时间：<?php echo (date("Y-m-d H:i:s",$data["addtime"])); ?></span>
			<!--//<img src="images/pic1.jpeg" alt="">-->
			<div class="news-detail">
				<p><?php echo ($data['content']); ?></p>

			</div>
		</div>
	</div>
</body>