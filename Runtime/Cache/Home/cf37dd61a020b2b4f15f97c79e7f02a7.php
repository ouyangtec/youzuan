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
					<input type="password" name="paypassword" onblur="regpassword()"  id="paypassword" placeholder="交易密码" class="inp">

				</div>
				<div class="form-group">
					<input type="password" name="paypassword"  onblur="regrepassword()"  id="repaypassword" placeholder="确认交易密码" class="inp">

				</div>
				<button type="button" class="login-btn" onclick="Update()">提交</button>

			</form>

		</div>
	</div>
</body>
<script>


    function formMsg(o, status, msg){

        $('#'+o+'-msg').attr('class', 'form_explain_'+(status?'pass':'error')).html((typeof msg == 'undefined'? '': msg)+'<em></em>').show();

        return true;

    }






    var mbTest_password=/^[a-zA-Z0-9_]{6,16}$/;

    function regpassword(){

        var paypassword = $('#paypassword').val();

        if(paypassword==""||paypassword==null){
            layer.tips('请输入交易密码','#paypassword',{tips:3});

            return false;

        }else{

            if(!mbTest_password.test(paypassword)){
                layer.tips('交易密码格式错误 (6~16个字符)','#paypassword',{tips:3});

                return false;

            }else{

               // formMsg('password', 1);

                return true;

            }

        }

    }



    function regrepassword(){

        var paypassword=$("#paypassword").val();

        var repaypassword=$("#repaypassword").val();

        if(repaypassword==""||repaypassword==null){

            layer.tips('请输入确认密码','#repaypassword',{tips:3});

            return false;

        }else{

            if(!mbTest_password.test(repaypassword)){

                layer.tips('确认密码格式错误 (6~16个字符)','#repaypassword',{tips:3});

                return false;

            }else{

                if(paypassword!=repassword){

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



            return false;

        }

        if(repaypassword==""||repaypassword==null){

            formMsg('repaypassword', 0, '请输入确认密码');


            return false;

        }

        if(paypassword!=repaypassword){

            formMsg('repaypassword', 0, '确认密码错误');



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