<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>推荐奖励</title>
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
<body>
<header class="common-header">
    <a href="javaScript:history.go(-1)" class="back">
        <i class="iconfont">&#xe60f;</i>
    </a>
    <span>推荐奖励</span>
</header>
<div class="mui-content">
    <table class="main-table">
        <thead>
        <tr>
            <th class="first">时间</th>
            <th>方式</th>
            <th>被推人</th>
            <th class="last">奖励</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td class="first"><?php echo (addtime($vo["addtime"])); ?></td>
                <td><?php echo ($vo["name"]); ?></td>
                <td><?php echo ($vo["invit"]); ?></td>
                <td class="last"><?php echo (NumToStr($vo["fee"])); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>


        </tbody>
    </table>
    <div class="Pagination"><?php echo ($page); ?></div>
</div>
</body>