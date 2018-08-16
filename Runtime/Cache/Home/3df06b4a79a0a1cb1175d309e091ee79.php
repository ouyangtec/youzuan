<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>客服</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>

    <script src="/Public/layer/layer.js"></script>
    <!-- <script src="js/textBox.min.js"></script> -->
    <script src="/Public/Home/js/main.js"></script>
</head>
<body class="gray-body">
<header class="common-header">
    <a href="javaScript:history.go(-1)" class="back">
        <i class="iconfont">&#xe60f;</i>
    </a>
    <span>客服</span>
</header>
<div class="mui-content">
    <div class="main-form1">
            <div class="form-group">
              电话:<?php echo ($data['contact_moble']); ?>
            </div>
            <div class="form-group">
                QQ:<?php echo ($data['contact_qq']); ?>
            </div>
            <div class="form-group">
                微信:<?php echo ($data['contact_weixin']); ?>
            </div>
    </div>
</div>

</body>