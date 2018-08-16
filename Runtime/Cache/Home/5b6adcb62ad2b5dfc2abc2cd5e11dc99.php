<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>登录</title>
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
	<!--<div class="login-header">
		<a href="javaScript:history.go(-1)"><i class="iconfont">&#xe647;</i></a>
	</div>-->
	<div class="login-wrap">
		<div class="logo">
			<img src="/Public/Home/images/logo.png">
		</div>
		<div class="main-form login-form">
			<form action="/Login/submit" method="post">
				<div class="form-group">
					<input type="text" name="username" id="username" placeholder="手机号" class="inp">
				</div>
				<div class="form-group">
					<input type="password" name="password" id="password" placeholder="密码" class="inp">
				</div>

				<div class="form-group">
					<input type="text" name="verify" id="verify" placeholder="验证码" class="code-inp inp">
					<div class="code-img">
						<img id="codeImg reloadverifyindex" class="reloadverifyindex" src="<?php echo U('Verify/code');?>" width="110" height="38" onclick="this.src=this.src+'?t='+Math.random()" style="margin-top: 1px; cursor: pointer;" title="换一张">

					</div>
				</div>
				<div class="pass-box">
					<div class="remember">
						<input type="checkbox"  id="autologin" >
						<label>记住密码</label>
					</div>
					<a href="<?php echo U('login/findpwd');?>">忘记密码？</a>
				</div>
				<button type="button" class="login-btn" onclick="Update()">登录</button>
				<div class="right-reg">没有账号，<a href="<?php echo U('login/register');?>">立即注册</a></div>
			</form>

		</div>
	</div>
</body>
<script>

    //记住账号



    var cookieusername=$.cookies.get('cookie_username');
    var cookiepassword=$.cookies.get('cookie_password');
    if(cookieusername!=''&&cookieusername!=null||cookiepassword!=''&&cookiepassword!=null){
        $("#username").val(cookieusername);
        $("#password").val(cookiepassword);

        document.getElementById("autologin").checked=true;

    }









    function Update(){

        var username=$("#username").val();

        var password=$("#password").val();

        var verify=$("#verify").val();

        if(username==""||username==null){

            layer.tips('请输入用户名','#username',{tips:3});

            return false;

        }

        if(password==""||password==null){

            layer.tips('请输入登录密码','#password',{tips:3});

            return false;

        }

        if(verify==""||verify==null){

            layer.tips('请输入验证码','#verify',{tips:3});

            return false;

        }





        $.post("/Login/submit",{username:username,password:password,verify:verify},function(data){

            if(data.status==1){

                if(document.getElementById("autologin").checked == true){

                    $.cookies.set('cookie_username',username);
                    $.cookies.set('cookie_password',password);

                }else{

                    $.cookies.set('cookie_username',null);
                    $.cookies.set('cookie_password',null);

                }

                layer.msg(data.info,{icon:1});

                window.setTimeout("window.location='/index/index.html'",1000);

            }else{

                layer.msg(data.info,{icon:2});

                if(data.url){

                    window.setTimeout("window.location="+data.url,1000);

                }

            }

        },"json");

    }

</script>
</html>