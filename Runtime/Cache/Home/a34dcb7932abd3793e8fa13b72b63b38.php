<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>冻结资金</title>
	<meta charset="utf-8">
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
    <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>冻结资金</span>
    </header>
    <div class="mui-content">
        <?php if(is_array($coinList)): $i = 0; $__LIST__ = $coinList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="asset-box frozen-box">
                <div class="asset-list">
                    <div class="pic-box"><img src="/upload/coin/<?php echo ($v["img"]); ?>" alt=""></div>
                    <span class="asset-num jin"><?php echo ($v["xnbd"]); ?></span>
                </div>
                <h6><?php echo ($v["title"]); ?></h6>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
      <!--   <div class="asset-box asset-box1 frozen-box">
            <div class="asset-list">
                <div class="pic-box"><img src="images/frozen-pic3.png" alt=""></div>
                <span class="asset-num lan">100</span>
            </div>
            <h6>人民币冻结资产</h6>
        </div>-->
    </div>
</body>