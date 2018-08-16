<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>我的分红</title>
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
    <span>我的分红</span>
</header>
<div class="mui-content">
    <table class="main-table">
        <thead>
        <tr>
            <th class="first">分红币种</th>
            <th>拥有数量</th>
            <th>分红数量</th>
            <th class="last">时间</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="first"><?php echo ($vo["coinjian"]); ?></td>
                <td><?php echo (NumToStr($vo["num"])); ?></td>
                <td><?php echo (NumToStr($vo["mum"])); ?></td>
                <td class="last"><?php echo (addtime($vo["addtime"])); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
</body>