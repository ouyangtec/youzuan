<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>注册</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />	
	<script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
	<link rel="stylesheet" href="/Public/Home/css/style.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/Home/js/jquery.cookies.2.2.0.js"></script>
</head>
<body>
	<div class="login-header">
		<a href="javaScript:history.go(-1)"><i class="iconfont">&#xe647;</i></a>
	</div>
	<div class="login-wrap">
		<div class="logo">
			<img src="/Public/Home/images/logo.png">
		</div>
		<div class="main-form login-form">

			<div class="autoboxs" id="reg-step4">
				<div class="reg_info">

					<div class="reg_su">

						<div class="reg_su_title" >恭喜您，已经注册成功！</div>


					</div>

					<div class="auto_btn marb15">

						<a href="/trade/" class="center">去交易</a>

						<!-- <div class="right_side"></div> -->

					</div>

					<div class="reg_otherlink">

						您还可以：

						<a href="<?php echo U('User/nameauth');?>" >实名认证</a>　

						<a href="<?php echo U('Finance/mycz');?>" >充值</a>

					</div>



				</div>
			</div>


		</div>
	</div>
</body>
<script>




    function registerAgreement(){

        layer.open({

            type:2,

            skin:'layui-layer-rim', //加上边框

            area:['800px','600px'], //宽高

            title:'注册协议', //不显示标题

            content:"<?php echo U('Login/webreg');?>"

        });

    }





    function regphone() {

        var phone=$("#username").val();
        if (phone=='' || phone==null)
        {
            layer.tips('请输入手机号码','#username',{tips:3});
            return false;
        }

            $.post("<?php echo U('login/chkphone');?>",{phone:phone},function (data) {
                if (data.status)
                {
                   //formMsg('username',1);
                    return true;
                }
                else
                {
                    layer.tips(data.info,'#username',{tips:3});

                    return false;
                }
            },'json');


    }


    var mbTest_password=/^[a-zA-Z0-9_]{6,16}$/;

    function regpassword(){

        var password = $('#password').val();

        if(password==""||password==null){
            layer.tips('请输入登录密码','#password',{tips:3});

            return false;

        }else{

            if(!mbTest_password.test(password)){
                layer.tips('登录密码格式错误 (6~16个字符)','#password',{tips:3});

                return false;

            }else{

               // formMsg('password', 1);

                return true;

            }

        }

    }



    function regrepassword(){

        var password = $('#password').val();

        var repassword = $('#repassword').val();

        if(repassword==""||repassword==null){

            layer.tips('请输入确认密码','#repassword',{tips:3});

            return false;

        }else{

            if(!mbTest_password.test(repassword)){

                layer.tips('确认密码格式错误 (6~16个字符)','#repassword',{tips:3});

                return false;

            }else{

                if(password!=repassword){

                    layer.tips('确认密码不正确 (6~16个字符)','#repassword',{tips:3});

                    return false;

                }else{

                   //
					// formMsg('repassword', 1);

                    return true;

                }

            }

        }

    }




    function Update(){

        var paypassword=$("#paypassword").val();

        var repaypassword=$("#repaypassword").val();



        if(paypassword==""||paypassword==null){

            formMsg('paypassword', 0, '请输入交易密码');

            slider.init();

            return false;

        }

        if(repaypassword==""||repaypassword==null){

            formMsg('repaypassword', 0, '请输入确认密码');

            slider.init();

            return false;

        }

        if(paypassword!=repaypassword){

            formMsg('repaypassword', 0, '确认密码错误');

            slider.init();

            return false;

        }



        $.post("<?php echo U('Login/upregister2');?>",{paypassword:paypassword,repaypassword:repaypassword},function(data){

            if(data.status==1){

                layer.msg(data.info,{icon:1});

                window.location='/Login/register4';

            }else{

                layer.msg(data.info,{icon:2});

                if(data.url){

                    window.location=data.url;

                }

            }

        },"json");

    }














</script>
</html>