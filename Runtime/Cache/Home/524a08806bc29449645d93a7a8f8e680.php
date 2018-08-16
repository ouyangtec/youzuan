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
			<form>
				<div class="form-group">
					<input type="text" name="username" onblur="regphone()" id="username"  placeholder="手机号" class="inp">

				</div>

				
				<div class="form-group">
					<input type="text" name="verify"  id="verify" placeholder="验证码" class="code-inp inp">
					<div class="code-img">
						<img id="codeImg reloadverifyindex" class="reloadverifyindex" src="<?php echo U('Verify/code');?>" width="110" height="38" onclick="this.src=this.src+'?t='+Math.random()" style="margin-top: 1px; cursor: pointer;" title="换一张">

					</div>

				</div>
				<div class="form-group">
					<input type="text" name="phone-verify" id="phone-verify" placeholder="手机验证码" class="code-inp inp">
					<input type="button" name="send-phone-code" id="send-phone-code" onclick="SendCode()" value="发送验证码" class="code-inp phone-inp">

				</div>
				<div class="form-group">
					<input type="password" name="password" onblur="regpassword()"  id="password" placeholder="密码" class="inp">

				</div>
				<div class="form-group">
					<input type="password" name="repassword"  onblur="regrepassword()"  id="repassword" placeholder="确认密码" class="inp">

				</div>
				<div class="form-group">
					<input type="text"  id="invit" name="invite"  placeholder="邀请码(选填)" value="<?php echo (session('invit')); ?>" class="inp"
					<?php if(!empty($_SESSION['invit'])): ?>readonly<?php endif; ?> />
				</div>
			
				<button type="button" class="login-btn" onclick="Update()">注册</button>
				<div class="protocol">通过点击"注册"，并同意我们的<a onclick="registerAgreement()">服务条款</a>。</div>
			</form>

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
    function SendCode() {
        var moble = $("#username").val();
        var verify = $("#verify").val();
       // var country_code = $("#country_code").val();
        var country_code = 86;
        if (moble == "" || moble == null) {
            layer.tips('请输入手机号码', '#username', {tips: 3});
            return false;
        }
        if (verify == "" || verify == null) {
            layer.tips('请输入图形验证码', '#verify', {tips: 3});
            return false;
        }
        $('#send-phone-code').attr("disabled", "disabled");


        $.post("<?php echo U('Verify/checkphonemsg');?>", {moble: moble, verify: verify,country_code:country_code}, function (data) {
            if (data.status == 1) {

                //刷新验证码
                $('#send-phone-code').attr("disabled", "disabled");
                layer.msg(data.info, {icon: 1});
                var obj = $('#send-phone-code');
                var wait = 60;
                var interval = setInterval(function () {
                    obj.css('backgroundColor', '#999B9C');
                    obj.val(wait + '秒再次发送');
                    wait--;
                    if (wait < 0) {
                        clearInterval(interval);
                        obj.val('获取验证码');
                        obj.css('backgroundColor', '#ff7324');
                        $('#send-phone-code').removeAttr("disabled");
                    }
                }, 1000);
            } else {

                //刷新验证码

                layer.msg(data.info, {icon: 2});

                $(".reloadverifyindex").click();

                $("#verify").val('');
                $('#send-phone-code').removeAttr("disabled");
                /* if (data.url) {

                 window.location = data.url;

                 }*/

            }
        }, "json");

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

        var username=$("#username").val();

        var password=$("#password").val();

        var repassword=$("#repassword").val();

        var invit=$("#invit").val();

        var verify=$("#verify").val();

        //var country_code=$("#country_code").val();
        var country_code=86;

        var phone_verify=$("#phone-verify").val();

        if(username==""||username==null){

            layer.tips('请输入用户名','#username',{tips:3});

            slider.init();

            return false;

        }

        if(password==""||password==null){
            layer.tips('请输入登录密码','#password',{tips:3});


            slider.init();

            return false;

        }

        if(repassword==""||repassword==null){

            layer.tips('请输入确认密码','#repassword',{tips:3});

            slider.init();

            return false;

        }

        if(password!=repassword){

            layer.tips('确认密码不正确','#repassword',{tips:3});

            slider.init();

            return false;

        }



        if(verify==""||verify==null){

            layer.tips('请输入验证码','#verify',{tips:3});

            slider.init();

            return false;

        }
        if(phone_verify==""||phone_verify==null){

            layer.tips('请输入短信验证码','#phone_verify',{tips:3});

            slider.init();

            return false;

        }

        $.post("<?php echo U('Login/upregister');?>",{phone:username,password:password,repassword:repassword,invit:invit,verify:verify,phoneverify:phone_verify,country_code:country_code},function(data){

            if(data.status==1){

                layer.msg(data.info,{icon:1});

                $.cookies.set('cookie_username',username);

                window.location="<?php echo U('login/register2');?>";

            }else{

                layer.msg(data.info,{icon:2});

                if(data.url){

                    window.location=data.url;

                }else{

                    slider.reset();

                }

            }

        },"json");

    }














</script>
</html>