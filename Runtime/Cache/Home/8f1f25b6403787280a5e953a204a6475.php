<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>出售</title>
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
        <span>ID:<?php echo ($data["userid"]); ?></span>
    </header>
    <div class="mui-content">
        <div class="release-form sell-form1">
            <form action="">
                <div class="form-group">
                    <p style="color:red">请在一小时内完成发货,否则订单取消,造成损失概不负责</p>
                </div>
                <div class="form-group">
                    <label for="">单价：</label>
                    <input name="price" id="price" type="text" value="<?php echo ($data["price"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">数量：</label>
                    <input name="num" id="num"  type="text" value="<?php echo ($data["num"]); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="">总价：</label>
                    <input name="contact" id="contact" type="text" value="<?php echo ($data["mum"]); ?>" readonly>

                </div>
                <div class="form-group1">
                    <textarea name="" id="" class="collect" readonly>联系信息：<?php echo ($data["contact"]); ?></textarea>
                </div>

                <div class="form-group1">
                    <textarea name="" id="" class="collect" readonly>收货信息：<?php echo ($data["address"]); ?></textarea>
                </div>


                <button type="button" onclick="sell()" class="confirm-btn">确认出售</button>
            </form>
        </div>
    </div>
    <script>
        var id="<?php echo ($data["id"]); ?>";
        var market="<?php echo ($data["market"]); ?>";
        function sell() {



                //加载层-风格3
                layer.load(2);
                //此处演示关闭
                setTimeout(function () {
                    layer.closeAll('loading');
                    trans_lock = 0;
                }, 10000);
                $.post("<?php echo U('Trade/sellstatus');?>", {
                    id: id

                }, function (data) {
                    layer.closeAll('loading');

                    if (data.status == 1) {
                        layer.open(  {content:data.info,icon: 1,
                        end:function(){
                            window.location.href="seek?market="+market;
                        }
                        });

                        //  history.go(-1);
                    } else {

                        layer.msg(data.info, {icon: 2});
                    }
                }, 'json');

        }
    </script>
</body>