<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>提现</title>
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
<body class="gray-body">
     <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>提现</span>
    </header>
    <div class="common-content1 pay-select-con">
        <ul>
            <li class="active">
                <a href="/finance/mytx?type=alipay">
                    <h5>支付宝</h5>
                    <i class="iconfont">&#xe601;</i>
                </a>

            </li>
       <!--     <li>
                <a href="/finance/mytx?type=weixin">
                    <h5>微信</h5>
                    <i class="iconfont">&#xe601;</i>
                </a>

            </li>-->
            <li>
                <a href="/finance/mytx?type=bank">
                    <h5>银行</h5>
                    <i class="iconfont">&#xe601;</i>
                </a>

            </li>
        </ul>
    </div>
    <script>
        $('.pay-select-con li').on('click',function(){
            $(this).addClass('active').siblings('li').removeClass('active')
        })
    </script>
</body>