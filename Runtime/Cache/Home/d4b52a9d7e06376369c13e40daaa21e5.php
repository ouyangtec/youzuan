<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>发布求购</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
    <script src="/Public/layer/layer.js"></script>
    <script src="/Public/Home/js/main.js"></script>
</head>
<body class="gray-body">
    <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>发布求购</span>
    </header>
    <div class="mui-content">
        <div class="release-form">
            <form action="" method="post">
                <div class="form-group">
                    <label for="">单价：</label>
                    <input name="price" id="price" type="text">
                </div>
                 <div class="form-group">
                    <label for="">数量：</label>
                    <input name="num" id="num"  type="text">
                </div>
                <div class="form-group">
                    <label for="">收货信息：</label>
                    <input name="address" id="address"  type="text">
                </div>
                <div class="form-group">
                    <label for="">联系信息：</label>
                    <input name="contact" id="contact" type="text">

                </div>
                <button type="button" onclick="release()" class="confirm-btn">确认提交</button>
            </form>
        </div>
    </div>

    <script>
        var trans_lock=0;
        var market = "<?php echo ($market); ?>";
        function release() {
            if (trans_lock) {
                layer.msg('不要重复提交', {icon: 2});
                return;
            }
            trans_lock = 1;
            //        var price= $('#price').val();
            //        var num = $('#buy-num').val();
            var price = parseFloat($('#price').val());
            var num = parseFloat($('#num').val());
            var address = ($('#address').val());
            var contact = ($('#contact').val());
            //var paypassword = $('#buy_pass').val();
            if (price == "" || price == null) {
                layer.tips('请输入内容', '#price', {tips: 3});
                return false;
            }
            if (contact == "" || contact == null) {
                layer.tips('请输入内容', '#contact', {tips: 3});
                return false;
            }
            if (address == "" || address == null) {
                layer.tips('请输入内容', '#address', {tips: 3});
                return false;
            }
            if (num == "" || num == null) {
                layer.tips('请输入内容', '#num', {tips: 3});
                return false;
            }
            //加载层-风格3
            layer.load(2);
            //此处演示关闭
            setTimeout(function () {
                layer.closeAll('loading');
                trans_lock = 0;
            }, 10000);
            $.post("<?php echo U('Trade/release');?>", {
                price: $('#price').val(),
                num: $('#num').val(),
                //paypassword: $('#buy_pass').val(),
                address:address,
                contact:contact,
                market: market,
            }, function (data) {
                layer.closeAll('loading');
                trans_lock = 0;
                if (data.status == 1) {
                    layer.msg(data.info, {icon: 1});
                    window.location.href="seek?market="+market;
                  //  history.go(-1);
                } else {
                    layer.msg(data.info, {icon: 2});
                }
            }, 'json');
        }
    </script>

</body>