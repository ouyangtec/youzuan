<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>设置</title>
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
    <!-- <script src="js/textBox.min.js"></script> -->
    <script src="/Public/Home/js/main.js"></script>
</head>
<body class="gray-body">
    <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>设置</span>
    </header>
    <div class="common-content1">
        <ul>
            <li>
                <a href="<?php echo U('User/password');?>">
                    <h5>修改密码</h5>
                    <i class="iconfont">&#xe678;</i>
                </a>

            </li>
            <li>
                <a href="<?php echo U('User/paypassword');?>">
                    <h5>修改交易密码</h5>
                    <i class="iconfont">&#xe678;</i>
                </a>

            </li>
            <li>
                <a href="<?php echo U('User/nameauth');?>">
                    <h5>实名认证</h5>
                    <i class="iconfont">&#xe678;</i>
                </a>

            </li>
            <li>
                <a href="<?php echo U('User/payment');?>">
                    <h5>绑定收款方式</h5>
                    <i class="iconfont">&#xe678;</i>
                </a>

            </li>
            <li>
                <a href="<?php echo U('User/contact');?>">
                    <h5>联系客服</h5>
                    <i class="iconfont">&#xe678;</i>
                </a>

            </li>
             <li>
                <a href="<?php echo U('Article/aboutus');?>">
                    <h5>关于我们</h5>
                    <i class="iconfont">&#xe678;</i>
                </a>

            </li>

        </ul>

    </div>
    <nav class="nav-wrap" >
        <li style="width: 100%;height: .9rem;line-height: .9rem;margin-bottom: .1rem;padding-left: 40%;background: #ff7324;">
            <a class="tab-item active" href="<?php echo U('Login/loginout');?>" style="display: block;display: flex;justify-content: space-between;">

                <h5 style="font-size: .28rem;color: #ffffff;">退出登录</h5>
            </a>
        </li>

    </nav>
</body>