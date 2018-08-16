<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>修改交易密码</title>
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
        <span>修改交易密码</span>
    </header>
    <div class="mui-content">
        <div class="main-form1">
            <form action="">
                <div class="form-group">
                    <input type="password" id="oldpassword" placeholder="原交易密码">
                </div>
                 <div class="form-group">
                    <input type="password" id="newpassword" placeholder="新交易密码">
                </div>
                 <div class="form-group">
                    <input type="password" id="repassword" placeholder="再次输入新交易密码">
                </div>
                <button type="button" onclick="Update()" class="confirm-btn">确定</button>
            </form>
        </div>
    </div>
</body>
<script>

    $('input').focus(function () {

        var t = $(this);

        if (t.attr('type') == 'text' || t.attr('type') == 'password')

            t.css({'box-shadow': '0px 0px 3px #1583fb', 'border': '1px solid #1583fb', 'color': '#333'});

        if (t.val() == t.attr('placeholder'))

            t.val('');

    });

    $('input').blur(function () {

        var t = $(this);

        if (t.attr('type') == 'text' || t.attr('type') == 'password')

            t.css({'box-shadow': 'none', 'border': '1px solid #e1e1e1', 'color': '#333'});

        if (t.attr('type') != 'password' && !t.val())

            t.val(t.attr('placeholder'));

    });

    function Update() {

        $.post("<?php echo U('User/uppaypassword');?>", {

            oldpaypassword: $('#oldpassword').val(),

            newpaypassword: $('#newpassword').val(),

            repaypassword: $('#repassword').val()

        }, function (data) {

            if (data.status == 1) {

                layer.msg(data.info, {icon: 1});

                window.location = "<?php echo U('User/paypassword');?>";

            } else {

                layer.msg(data.info, {icon: 2});

                if (data.url) {

                    window.location = data.url;

                }

            }

        }, "json");

    }

</script>