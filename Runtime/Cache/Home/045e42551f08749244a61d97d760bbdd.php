<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>绑定支付方式</title>
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
        <span>支付宝</span>
        <input type="hidden" id="user" value="<?php echo ($user["id"]); ?>">
    </header>
    <div class="mui-content1">
        <div class="main-form1" id="none" style="display: block">
            <form action="">
                <div class="form-group">
                    <input type="text" name="truename" id="name" placeholder="姓名" value="<?php echo ($user["name"]); ?>" >
                </div>
                 <div class="form-group">
                    <input type="text"  name="idcard" id="idcard" placeholder="支付宝帐号" value="<?php echo ($user["bankcard"]); ?>">
                </div>
                <div class="form-group">
                    <input type="password"  name="paypassword" id="paypassword" placeholder="交易密码">
                </div>
                <div  style="padding-top: 10px">

                    <a style="float: right;color:#666;font-size: .28rem" href="<?php echo U('login/findpaypwd');?>">忘记交易密码？</a>
                </div>
               <!-- <div class="form-group-code">
                    <div class="iconfont code1">&#xe631;</div>
                    <div class="writen">
                        <i class="iconfont">&#xe600;</i><span>上传支付宝二维码</span>
                    </div>
                </div>-->
                <button type="button" onclick="Update()" class="confirm-btn">完成</button>
            </form>
        </div>
        <div class="main-form1" id="onlyread" style="display: none">
            <form action="">
                <div class="form-group">
                    姓名:<?php echo ($user["name"]); ?>
                </div>
                <div class="form-group">
                    支付宝账号:<?php echo ($user["bankcard"]); ?>
                </div>

                <!-- <div class="form-group-code">
                     <div class="iconfont code1">&#xe631;</div>
                     <div class="writen">
                         <i class="iconfont">&#xe600;</i><span>上传支付宝二维码</span>
                     </div>
                 </div>-->
                <button type="button" onclick="eidt()" class="confirm-btn">修改</button>
            </form>
        </div>
    </div>
</body>
<script>
    if($("#user").val()){
        $("#onlyread").show();
        $("#none").hide();
    }else{
        $("#onlyread").hide();
        $("#none").show();
    }

    function eidt() {
        $("#onlyread").hide();
        $("#none").show();
    }


    function Update(){

        var id=$('#user').val();

        var bank="支付宝";

        var name=$('#name').val();

        var bankcard=$('#idcard').val();

        var paypassword=$('#paypassword').val();

        if(name==""||name==null){

            layer.tips('请输入备注名称','#name',{tips:3});

            return false;

        }



        if(bankcard==""||bankcard==null){

            layer.tips('请输入支付宝账号','#idcard',{tips:3});

            return false;

        }

        if(paypassword==""||paypassword==null){

            layer.tips('请输入交易密码','#paypassword',{tips:3});

            return false;

        }





        $.post("<?php echo U('User/upbank');?>",{type:'alipay',id:id,name:name,bank:bank,bankcard:bankcard,paypassword:paypassword},function(data){

            if(data.status==1){

                layer.msg(data.info,{icon:1});

                window.location="<?php echo U('User/payment');?>";

            }else{

                layer.msg(data.info,{icon:2});

                if(data.url){

                    window.location=data.url;

                }

            }

        },"json");

    }

</script>