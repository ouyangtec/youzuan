<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>首页</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />	
	<script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home//css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
</head>
<body>
	<div class="con-pb100">
		<div class="banner-wrapper">
			<img src="/Public/Home/images/banner1.jpg">
			<h1>有钻.com</h1>
			<a href="<?php echo U('Issue/index');?>">立即抢购</a>
		</div>
		<div class="activity-box">
			<ul>
				<li>
					<a href="<?php echo U('duobao/index');?>">
						<span class="icon sign">
							<i class="icon1"></i>
						</span>
						<span>签到挖矿</span>
					</a>
					
				</li>
				<li >
					<a href="javascript:" onclick="undone()">
						<span class="icon shop">
							<i class="icon1"></i>
						</span>
						<span>有钻商城</span>
					</a>
					
				</li>
				<li >
					<a href="<?php echo U('finance/mytj');?>">
						<span class="icon activity">
							<i class="icon1"></i>
						</span>
						<span>邀请活动</span>
					</a>
				</li>
				<li >
					<a href="<?php echo U('Article/index');?>">
						<span class="icon notice">
							<i class="icon1"></i>
						</span>
						<span>平台公告</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="financing-wrap">
			<h4>投资专区</h4>
			<div class="financ-img">
				<img src="/Public/Home/images/finac-pic1.jpg" alt="">
			</div>
		</div>
		<div class="buy-back">
			<div class="gold-drill clearfix">
				<i class="icon left"></i>
				<div class="right-tit">
					<h5>金钻认购</h5>
					<p>待定待定待定</p>
				</div>
			</div>
			<div class="repo-box clearfix">
				<div class="repo-info-box">
					<div class="repo-info repo-price">
						<span class="red"><span class="num"><?php echo (round($issue['price'],2)); ?></span>元</span>
						<span class="info1">当前认购价格</span>
					</div>
					<div class="repo-info">
						<span class="red"><span class="num"><?php echo (round($issue['num']/$issue['num']*100-$issue['deal']/$issue['num']*100,2)); ?></span>%</span>
						<span class="info1">当前剩余百分比/当前剩余数量</span>
					</div>
					
				</div>
				<div class="repo-link">
						<a href="<?php echo U('Issue/index');?>"><span>认购</span></a>
					
				</div>
			</div>
		</div>
		<div class="buy-back buy-back1">
			<div class="gold-drill blur-drill clearfix">
				<i class="icon left"></i>
				<div class="right-tit">
					<h5>蓝钻回购</h5>
					<p>待定待定待定</p>
				</div>
			</div>
			<div class="repo-box blue-repo-box clearfix">
				<div class="repo-info-box">
					<div class="repo-info repo-price">
						<span class="red"><span class="num"><?php echo ($C['repurchaseprice']); ?></span>元</span>
						<span class="info1">当前回购价格</span>
					</div>
					<div class="repo-info">
						<span class="red"><span class="num"><?php echo ($C['repurchasenum']); ?></span></span>
						<span class="info1">当前回购数量</span>
					</div>
					
				</div>
				<div class="repo-link">
						<a href="javascript:" onclick="repur()"><span>回购</span></a>
					
				</div>
			</div>
		</div>
	</div>
	<script>
        layer.config({extend: 'extend/layer.ext.js'});
		function repur(){

            layer.prompt({title: '输入回购数量,并确认', formType: 3}, function(text, index){
                layer.close(index);
                layer.prompt({title: '输入交易密码，并确认', formType: 1}, function(pass, index){
                    layer.close(index);
                    //layer.msg('演示完毕！您的口令：'+ pass +'<br>您最后写下了：'+text);
                    $.post("<?php echo U('Trade/repurchase');?>", {paypassword: pass,num:text}, function (data) {
							if(data.status==1){
                                layer.msg(data.info,{icon:1});
                                window.location.reload();
							}else{
                                layer.msg(data.info,{icon:2});

                            }
					});
                });
            });
        }
        
        function undone() {
            layer.msg('敬请期待');
        }
	</script>
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