<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>推荐</title>
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
	<div class="groom-poster-bg">
		<div class="post-head clearfix">
			<a href="javaScript:history.go(-1)" class="back"><i class="iconfont">&#xe60f;</i></a>
			<a href="" class="share"><i class="iconfont">&#xe624;</i></a>
		</div>
		<div class="invitation">
			<h4>邀请码：jssxx</h4>
		</div>
		<div class="groom-poster-code">
			<img src="/Public/Home/images/groom-code.png" alt="">
			<h5>扫二维码下载有钻</h5>
		</div>
	</div>
	<div class="groom-poster-explain">
		<h4>推荐奖</h4>
		<div class="poster-explain">
			<ul>
				<li>
					<p class="red-tit">a.签到奖：</p>
					<p>实名认证会员可每日参与签到活动，抽取蓝钻，红钻，以及金钻</p>
				</li>
				<li>
					<p class="red-tit">b.推荐奖：</p>
					<p>推荐人享有被推荐人认购金钻金额的10%现金奖励</p>
				</li>
				<li>
					<p class="red-tit">c.交易奖：</p>
					<p>推荐人永久享有被推荐人每次（热门大厅）交易金额的0.5%手续费奖励</p>
				</li>
				<li>
					<p class="red-tit">d.红钻奖：</p>
					<p>会员持有金钻数量越多，每日可领取（热门大厅）红钻机会越多</p>
				</li>
				<li>
					<p class="red-tit">e.分红奖：</p>
					<p>会员持有金钻，还可享有推荐大厅交易手续费分红。</p>
				</li>
			</ul>
		</div>
	</div>
	<script>
		$('.groom-poster-explain').css('margin-top',$('.groom-poster-bg').height()+34)
	</script>
</body>