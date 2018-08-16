<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>忘记密码</title>
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
	<div class="login-header">
		<a href="javaScript:history.go(-1)"><i class="iconfont">&#xe647;</i></a>
	</div>
	<div class="login-wrap">
		<div class="main-form login-form">
			<form>
				<div class="form-group">
					<input type="text"  id="moble" name="moble" placeholder="手机号" class="inp">
				</div>
				<div class="form-group">
					<input type="text" name="verify"  id="verify" placeholder="验证码" class="code-inp inp">
					<div class="code-img">
						<img id="codeImg reloadverifyindex" class="reloadverifyindex" src="<?php echo U('Verify/code');?>" width="110" height="38" onclick="this.src=this.src+'?t='+Math.random()" style="margin-top: 1px; cursor: pointer;" title="换一张">

					</div>

				</div>
				<div class="form-group">
					<input type="text" id="moble_verify" name="moble_verify" placeholder="手机验证码" class="code-inp inp">
					<input type="button"  onclick="SendCode()" value="发送验证码" class="code-inp phone-inp" style="background-color: #ff7324;color:white">
				</div>
				<div class="form-group">
					<input type="password"  id="password" name="password"  placeholder="新密码" class="inp">
				</div>
				<div class="form-group">
					<input type="password"  id="repassword" name="repassword" placeholder="确认密码" class="inp">

				</div>
				<button type="button" class="login-btn" onclick="Update()">确定</button>
			</form>

		</div>
	</div>
</body>
<script>
    function SendCode(){

//		var username=$("#username").val();

        var moble=$("#moble").val();

        var verify=$("#verify").val();

//		if(username==""||username==null){
//
//			layer.tips('请输入用户名','#username',{tips:3});
//
//			return false;
//
//		}

        if(moble==""||moble==null){

            layer.tips('请输入手机号码','#moble',{tips:3});

            return false;

        }

        if(verify==""||verify==null){

            layer.tips('请输入图形验证码','#verify',{tips:3});

            return false;

        }





        $.post("<?php echo U('Verify/findpwd');?>",{moble:moble,verify:verify},function(data){

            if(data.status==1){

                $('#regBtn').attr("disabled","disabled");

                layer.msg(data.info,{icon:1});

                var obj=$('#regBtn');

                var wait=120;

                var interval=setInterval(function(){

                    obj.css('backgroundColor','#999B9C');

                    obj.val('（'+wait+'）秒后再次发送');

                    wait--;

                    if(wait<0){

                        clearInterval(interval);

                        obj.val('获取验证码');

                        obj.css('backgroundColor','#ff7324');

                    }

                    ;

                },1000);

            }else{

                layer.msg(data.info,{icon:2});

            }

        },"json");

    }

    function Update(){

//		var username=$("#username").val();

        var moble=$("#moble").val();

        var moble_verify=$("#moble_verify").val();

        var verify=$("#verify").val();

        var password=$("#password").val();

        var repassword=$("#repassword").val();

//		if(username==""||username==null){
//
//			layer.tips('请输入用户名','#username',{tips:3});
//
//			return false;
//
//		}

        if(moble==""||moble==null){

            layer.tips('请输入手机号码','#moble',{tips:3});

            return false;

        }

        if(moble_verify==""||moble_verify==null){

            layer.tips('请输入短信验证码','#moble_verify',{tips:3});

            return false;

        }

        if(verify==""||verify==null){

            layer.tips('请输入图形验证码','#verify',{tips:3});

            return false;

        }

        if(password==""||password==null){

            layer.tips('请输入新登录密码','#password',{tips:3});

            return false;

        }

        if(repassword==""||repassword==null){

            layer.tips('请输入确认登录密码','#repassword',{tips:3});

            return false;

        }

        if(password!=repassword){

            layer.tips('确认登录密码错误','#repassword',{tips:3});

            return false;

        }

        $.post("<?php echo U('Login/findpwd');?>",{moble:moble,moble_verify:moble_verify,verify:verify,password:password,repassword:repassword},function(data){

            if(data.status==1){

                layer.msg(data.info,{icon:1});

                window.setTimeout("window.location='<?php echo U('Login/index');?>'",1000);

            }else{

                layer.msg(data.info,{icon:2});

            }

        },"json");

    }
</script>