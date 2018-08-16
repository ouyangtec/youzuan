<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>我的资产</title>
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
        <span>我的资产</span>
    </header>
    <div class="mui-content">
        <table class="main-table">
            <thead>
            <tr>
                <th class="first"></th>
                <th >币种</th>
                <th>可用</th>
                <th>冻结</th>
                <th class="last">总计</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($coinList)): $i = 0; $__LIST__ = $coinList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td class="first"><img src="/Upload/coin/<?php echo ($vo["img"]); ?>" width="20px"  alt=""></td>
                    <td><?php echo ($vo["title"]); ?></td>
                    <td><?php echo (NumToStr($vo["xnb"])); ?></td>
                    <td><?php echo (NumToStr($vo["xnbd"])); ?></td>
                    <td class="last"><?php echo (NumToStr($vo["xnbz"])); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>


            </tbody>
        </table>
        <div class="Pagination"><?php echo ($page); ?></div>
        <!--<?php if(is_array($coinList)): $i = 0; $__LIST__ = $coinList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="asset-box">
                <div class="asset-list">
                    <div class="pic-box"><img src="/upload/coin/<?php echo ($v["img"]); ?>" alt=""></div>
                    <span class="asset-num jin"><?php echo ($v["xnb"]); ?></span>
                </div>
                <h6></h6>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>-->
         <!--<div class="asset-box asset-box1">
            <div class="asset-list">
                <div class="pic-box"><img src="images/diamond-icon1.png" alt=""></div>
                <span class="asset-num lan">100个</span>
            </div>
            <h6>蓝钻数量</h6>
        </div>-->
    </div>
</body>