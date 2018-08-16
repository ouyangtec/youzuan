<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>密码确认</title>
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
<div class="login-wrap">
    <div class="main-form login-form">
        <form>
            <div class="form-group">
                <input type="text" name="" placeholder="手机验证码" id="moble_verify" class="code-inp inp">
                <input type="button" name="" value="发送验证码" onclick="SendCode()" style="background:#ff7324;color: white" class="code-inp phone-inp">
            </div>
            <div class="form-group">
                 <span style="color:#EA6647; font-size: 15px;margin-left: 20px;margin-top: 10px; display: inline-block; font-weight: 900;"  >接收短信的手机<?php echo ($moble); ?></span>
            </div>
            <div class="form-group">
                <input type="password" id="paypassword" name="paypassword"placeholder="交易密码" class="inp">
            </div>
            <div  style="padding-bottom:30px;padding-top: 10px">

                <a style="float: right;color:#666;font-size: .28rem" href="<?php echo U('login/findpaypwd');?>">忘记交易密码？</a>
            </div>
            <button style="padding-top: 10px" type="button" id="tijiao" onclick="Update()"  class="login-btn">确定</button>
        </form>

    </div>
</div>
</body>
<script>

    function Update(){



        var moble_verify= $('#moble_verify').val();
        var paypassword= $('#paypassword').val();
        if(moble_verify === ''){
            parent.layer.msg('短信验证码不能为空');
            return;
        }
        if(paypassword === ''){
            parent.layer.msg('交易密码不能为空');
            return;
        }


        var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引


        parent.GetValue(moble_verify,paypassword);
        parent.layer.close(index); //再执行关闭当前iframe页面
    }


    function SendCode() {
        $('#regBtn').attr("disabled", "disabled");

        $.post("<?php echo U('Verify/mytx');?>", {}, function (data) {

            if (data.status == 1) {
                layer.msg(data.info, {
                    icon: 1
                });
                var obj = $('#regBtn');
                var wait = 120;
                var interval = setInterval(function () {
                    obj.css('backgroundColor', '#999B9C');
                    obj.val(wait + '秒再次发送');
                    wait--;
                    if (wait < 0) {
                        clearInterval(interval);
                        obj.val('获取验证码');
                        obj.css('backgroundColor', '#ff7324');
                    }

                }, 1000);
            } else {
                layer.msg(data.info, {
                    icon: 2
                });
            }
        }, "json");



    }


    $("#regBtn").click(function(){

        $(this).css("background","gray");
    })

    //   setTimeout("change()",3000);
    //
    //  function change(){
    //  	let reg=document.getElementById("regBtn");
    //  	reg.style.backgroundColor="#1798f2";
    //  }
    //




    $("#tijiao").click(function(){
        $(this).css("background","gray");
    })

    setTimeout("change1()",3000);

    function change1(){
        let tijiao=document.getElementById("tijiao");
        tijiao.style.backgroundColor="#ff7324";
    }





</script>