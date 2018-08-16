<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>推荐大厅</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
</head>
<script>
    window.onload=function ()
    {
        var aLi=document.getElementsByTagName('li');

        for(var i=0;i<aLi.length;i++)
        {
            //i 0 1 2 3 4 5 6....
            if(i%3==0)
            {
                //0 2 4 6 8 10
                aLi[i].style.background='#79b1fe';
            }
            else if(i%3==1)
            {
                //1 3 5 7 9
                aLi[i].style.background='#f4bd5b';
            }else if(i%3==2){
                aLi[i].style.background='#ff8e92';
			}
        }
    };
</script>

<body>
	<header class="groom-header">
		<p class="p1">更多丰富币种，</p>
		<p>请您每日关注有钻活动!</p>
	</header>
	<div class="groom-con con-pb100">
		<ul>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="background-color: #79b1fe" class="clearfix">
					<div class="coin-left">
						<img src="/Upload/coin/<?php echo ($vo["img"]); ?>" alt="">
						<div class="coin-writen">
							<h6><?php echo (strtoupper($vo["title"])); ?></h6>
							<span></span>
						</div>
					</div>
					<div class="enter">
						<a href="seek?market=<?php echo ($vo["name"]); ?>">进入</a>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>


		</ul>
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