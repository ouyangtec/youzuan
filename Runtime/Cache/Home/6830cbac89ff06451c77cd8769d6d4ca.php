<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>个人中心</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />	
	<script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />

    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
</head>
<body class="gray-body">
	<div class="con-pb100">
		<header class="person-header">
			<div class="head-info clearfix">
				<div class="head-box">
					<span class="head">
					</span>
					<span class="name">ID:<?php echo ($user["id"]); ?></span>
				</div>
				<div class="setUp">
					<a href="<?php echo U('User/config');?>"><i class="iconfont">&#xe606;</i></a>
				</div>
			</div>
			<div class="assets">
				<span class="num"><?php if(empty($zc)): ?>0.00<?php else: echo ($zc); endif; ?>¥</span>
				<span class="writen">余额账户（元）</span>
			</div>
			<div class="bottom-bg1"></div>
		</header>
		<div class="person-nav-wrap">
			<ul>
				<li>
					<a href="<?php echo U('finance/mytx');?>">
						<span class="icon forward-icon"></span>
						<span class="writen">提现</span>
					</a>
				</li>
				<li>
					<a href="<?php echo U('finance/mycz');?>">
						<span class="icon recharge-icon"></span>
						<span class="writen">充值</span>
					</a>
				</li>
				<!--<li>
					<a href="<?php echo U('finance/mydj');?>">
						<span class="icon frozen-icon"></span>
						<span class="writen">冻结资金</span>
					</a>
				</li>-->
				<li>
					<a href="<?php echo U('finance/index');?>">
						<span class="icon assets-icon"></span>
						<span class="writen">我的资产</span>
					</a>
				</li>
				<li class="mb16">
					<a href="<?php echo U('User/traderecord');?>">
						<span class="icon hot-icon"></span>
						<span class="writen">交易记录</span>
					</a>
				</li>
				<!--<li class="mb16">
					<a href="<?php echo U('User/seekrecord');?>">
						<span class="icon groom-icon"></span>
						<span class="writen">推荐大厅</span>
					</a>
				</li>-->
				<li class="mb16">
					<a href="javascript:void(0)" onclick="wkf()">
						<span class="icon recharge-icon"></span>
						<span class="writen">转入数字资产</span>
					</a>
				</li>
				<li class="mb16">
					<a href="javascript:void(0)" onclick="wkf()">
						<span class="icon forward-icon"></span>
						<span class="writen">转出数字资产</span>
					</a>
				</li>
				<li class="mb16">
					<a href="<?php echo U('User/redrocome');?>">
						<span class="icon drill-icon"></span>
						<span class="writen">红钻收入</span>
					</a>
				</li>
				<li class="mb16">
					<a href="<?php echo U('Fenhong/index');?>">
						<span class="icon bonus-icon"></span>
						<span class="writen">我的分红</span>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Finance/mywd');?>">
						<span class="icon recommend-icon"></span>
						<span class="writen">我的推荐</span>
					</a>
				</li>
				<li>
					<a href="<?php echo U('Finance/myjp');?>">
						<span class="icon recommend-icon1"></span>
						<span class="writen">推荐奖励</span>
					</a>
				</li>
			</ul>
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
<script>
	function wkf(){
	    layer.msg('暂未开放,敬请期待');
	}
</script>