<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head>	<meta charset="utf-8">	<title><?php echo C('web_title');?></title>	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />	<script src="/Public/Home/js/rem.js"></script>	<!-- <script src="js/mui.min.js"></script> -->	<link rel="stylesheet" href="/Public/Home/css/reset.css" />	<link href="/Public/Home/css/mui.css" rel="stylesheet"/>	<link rel="stylesheet" href="/Public/Home/css/main.css" />	<link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />	<script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>	<script src="/Public/Home/js/highcharts.js"></script>	<script src="/Public/layer/layer.js"></script>	<script src="/Public/Home/js/main.js"></script>	<link rel="stylesheet" href="/Public/Home/css/style.css"/></head><style>	.deposit-info-title{		width:90%;		margin:0 auto;		padding-bottom:10px;		border-bottom:1px dotted #DEDEDE;		text-align:center;		font-size:24px;		color:#E55600;		font-weight:normal;		margin-top:20px;	}	.cuntips{		width:77%;		margin:20px auto;		color:#E55600;		font-size:14px;	}	.cuntips span{		color:#E55600;	}	.doubles input{		font-size:12px;		padding:9px 8px;		width:100px;		border:1px solid #D5D5D5;		height:14px;	}	.zxc{		width:205px;		height:200px;		overflow:scroll;	}	.zxc li{		cursor:pointer;		float:left;		text-align:left;		width:205px;		overflow:hidden;		background-color:#FFF;		border:1px solid transparent;		padding:5px 12px;		margin-bottom:0 !important;		height:42px;		box-sizing:border-box;	}	.zxc li:hover{		background-color:#EEE;	}	.blankRemittance ul li{		min-height:35px;		line-height:35px;		margin-bottom:10px;	}	.blankRemittance ul li.tipps{		line-height:25px;		margin-bottom:15px;	}	.blankRemittance ul li.safetyTips{		line-height:25px;	}	.blankRemittance ul li span.cc1{		font-size:14px;	}	.blankRemittance ul li span.cc1{		display:inline-block;		text-align:right;		width:145px;	}	.displayBankNumberNew{		position:absolute;		left:169px;		top:58px;		z-index:3;		background:#FFFFE4;		height:25px;		line-height:25px;		border:1px solid #E4E4E4;		font-weight:600;		font-size:16px;		min-width:199px;		max-width:250px;		overflow:hidden;	}	.blankRemittance ul li span.cc2{		display:inline-block;		font-size:14px;		font-weight:700;		padding-left:20px;		text-align:left;	}	.button-main2{		border-radius:3px;		margin-top:0px;		background:#AA5800;		border:#AA5800 solid 1px;		height:35px;		line-height:35px;		color:#FFF;		padding:0 15px;		cursor:pointer;		display:inline-block;		font-size:14px;		margin-bottom:20px;	}	.online_pay .text{		color:#333;	}	.blankRemittance ul li span.care{		display:inline-block;		font-size:14px;		padding-left:20px;		text-align:left;		width:360px;		color:#767676;	}	.blankRemittance ul li span.safe{		display:inline-block;		background:#FFFCF0;		font-size:12px;		margin-left:14px;		padding:10px;		text-align:left;		width:480px;		color:#767676;	}	.blankRemittance ul li span input.blankInformation{		height:25px;		width:185px;		padding-left:10px;		border:1px solid #D5D5D5;	}	.naka{		width:200px !important;	}	input.naka{		padding-left:5px;		font-size:14px;	}	#right_cny{		color:red;	}	.lighttips a{		color:#E55600;	}	.blankRemittance ul li{		min-height:35px;		line-height:35px;		margin-bottom:10px;	}	.blankRemittance ul li.tipps{		line-height:25px;		margin-bottom:15px;	}	.blankRemittance ul li.safetyTips{		line-height:25px;	}	.blankRemittance ul li span.cc1{		font-size:14px;	}	.blankRemittance ul li span.cc1{		display:inline-block;		text-align:right;		width:145px;	}	.displayBankNumberNew{		position:absolute;		left:169px;		top:58px;		z-index:3;		background:#FFFFE4;		height:25px;		line-height:25px;		border:1px solid #E4E4E4;		font-weight:600;		font-size:16px;		min-width:180px;		max-width:250px;		overflow:hidden;	}	.blankRemittance ul li span.cc2{		display:inline-block;		font-size:14px;		font-weight:700;		padding-left:20px;		text-align:left;	}	.button-main2{		text-decoration:none !important;		margin-top:0px;		background:#E55600;		border:#E55600 solid 1px;		height:35px;		line-height:35px;		color:#FFF;		padding:0 15px;		cursor:pointer;		display:inline-block;		font-size:14px;		margin-bottom:20px;	}	.online_pay .text{		color:#333;	}	.blankRemittance ul li span.care{		display:inline-block;		font-size:14px;		padding-left:20px;		text-align:left;		width:360px;		color:#767676;	}	.dialog_body .connphone li span.cc1{		display:inline-block;		text-align:right;		color:#434A54;		width:100px;		text-align:left;		font-size:12px;	}	.dialog_body .connphone li.exampleTips{		margin-top:15px;		padding:17px	}	.dialog_body .connphone li.exampleTips div{		background:#F5F5F5;		padding:10px;		width:396px;		display:inline-block;		height:162px;	}	.dialog_body .connphone li.exampleTips div p{		display:inline-block;		height:28px;		line-height:28px;		margin-top:20px;	}	.dialog_body .connphone li.exampleTips div span{		height:26px;		line-height:28px;		display:inline-block;		margin:0px 5px;	}	.dialog_body .connphone li.exampleTips div span.spanInput{		background:#FFF;		text-align:right;		width:148px;		padding-right:10px;	}	.dialog_body .connphone li.exampleTips div span.spanInput.true{		border:1px solid #CCC;	}	.dialog_body .connphone li.exampleTips div span.spanInput.error{		border:1px solid red;	}	.dialog_body .connphone li.exampleTips div img{		vertical-align:middle;		margin:0px 10px 3px;	}	.blankRemittance ul li span input.blankInformation{		height:25px;		width:185px;		padding-left:10px;		border:1px solid #D5D5D5;	}	.dialog_content{		display:none;		position:absolute;		width:666px;		z-index:2001;		color:#333;		background:none repeat scroll 0 0 #FFF;		box-shadow:3px -3px 12px #636363;	}	.dialog_title{		width:100%;		height:36px;		line-height:36px;		padding-left:10px;		box-sizing:border-box;		font-size:14px;		border-bottom:1px solid #E6E6E6;		font-weight:700;		background-color:#F6F6F9;	}	.dialog_body{		background:none repeat scroll 0 0 #FFF;		overflow:hidden;	}	.center{		text-align:center;	}	.dialog_body .connphone{		border-bottom:1px dotted #DEDEDE;		padding:5px 0 20px;		margin:0 auto;		width:90%;		margin-top:20px;	}	.dialog_body .connphone li{		margin-left:100px;		padding:6px 30px;		text-align:left;	}	.dialog_body .connphone li span.cc1{		display:inline-block;		text-align:right;		color:#434A54;		width:100px;		text-align:left;		font-size:14px;	}	.dialog_content.modal-out{		opacity:0;		z-index:1109;		-webkit-transition-duration:300ms;		transition-duration:300ms;		-webkit-transform:translate3d(0, 0, 0) scale(0.815);		transform:translate3d(0, 0, 0) scale(0.815);	}	.red{		color:#F00;		font-style:normal !important;	}	.dialog_closed{		position:relative;		float:right;		font-size:28px;		text-decoration:none !important;		font-weight:normal;		margin:0px 13px 5px 5px;		display:inline-block;		width:20px;		height:20px;		color:#3F3D4D;	}	.exampleTips-card{		border-radius:4px;		min-height:150px;		vertical-align:middle;	}	.exampleTips-card.correct{		background-color:#34CD75;		color:#FFF;	}	.exampleTips-card.wrong{		background-color:#D11222;		display:inline-block;	}	.exampleTips-card > span{		display:block;		text-align:center;		color:#FFF;	}	.exampleTips-card > span > em{		background-color:#FFF;		width:90%;		padding:5px 0;		margin:15px auto 30px auto;		display:block;		border-radius:4px;		color:#333;		font-style:normal !important;	}	.exampleTips-card > span > img{		vertical-align:middle;		margin-right:10px;	}	.exampleTips > span{		display:inline-block;		width:28%;		vertical-align:middle;		margin-left:2%;	}	.exampleTips .iyou{		color:#3F3D4D;		padding:8px;		width:37%;		box-sizing:border-box;		text-indent:2em;		margin-left:0;		line-height:2;	}	#form-cnyin input{		font-size:12px;		padding:12px 8px;		width:300px;		line-height:39px;		border:1px solid #D5D5D5;		height:14px;	}	#quick-searchdiv{		top:33px;		left:169px;		background-color:#FFF;		list-style:none;		margin:0;		padding:0;		width:180px;		display:none;		margin-top:1px;		min-height:0px;		text-align:left;		z-index:999;		position:absolute;		bottom:10px;	}	#quick-searchdiv ul li{		width:178px;		overflow:hidden;		white-space:nowrap;		background-color:#FFF;		font-family:"Open Sans", "Helvetica Neue", Helvetica, sans-serif;		margin:0;		padding:0;		font-variant:normal;		color:#000;	}	#quick-searchdiv ul{		border:1px solid #EAEAEA;	}	#quick-searchdiv ul li a{		font-size:12px;		border-bottom:1px solid #F7F7F7;		color:#000;		display:block;		margin:0;		padding:0px 8px;		text-decoration:none;		min-height:20px;	}	#quick-searchdiv ul li a:hover{		background:#FFFCF0;		border-bottom:1px solid #FFFCF0;	}	#quick-searchdiv ul li.selected{		background-color:#FFFCF0;	}	#quick-searchdiv ul li.selected a{	}	.arrow-down{		position:absolute;		top:18px;		right:-3px;		width:0;		height:0;		border-left:5px solid transparent;		border-right:5px solid transparent;		border-top:5px solid #E55600;	}	.banlist-sele{		padding-bottom:5px;		width:100%;		overflow:hidden;	}	.banlist-sele li{		height:24px;		padding:5px 0px;		padding-left:5px;		width:100%;		margin-bottom:0px !important;	}	.banlist-sele li:hover{		background-color:#F7F7F7;	}	.banlist-sele li.grey:hover{		background-color:#FFF;	}	#selectedbank{		position:absolute;		top:0px;		left:25px;	}	.selectbanklist{		display:none;		position:absolute;		top:39px;		background-color:#FFF;		border:1px solid rgb(225, 225, 225);		width:317px;		box-sizing:border-box;	}	.pay_code button{		width:60px;		height:25px;		border-radius:3px;		background:#E55600;		border:none;		color:#FFF;		margin-top:10px;	}</style><body><div id="dialog_ali" class="mana-app styled-pane" >	<div class="mana-app-title">微信转账汇款		<span id="wait" style="color:#E55600;">（				<?php if(($mycz["status"]) == "0"): ?>未付款					<a onclick="myczHuikuan(<?php echo ($mycz['id']); ?>)" href="javascript:void(0)" style="    color: #2674FF!important;">已汇款</a><?php endif; ?>				<?php if(($mycz["status"]) == "1"): ?>充值成功<?php endif; ?>				<?php if(($mycz["status"]) == "2"): ?>人工到账<?php endif; ?>				<?php if(($mycz["status"]) == "3"): ?>处理中<?php endif; ?>）			</span>	</div>	<div class="lighttips">请使用微信转账至以下账号或扫描二维码进行转账，若有疑问请		<a href="http://wpa.qq.com/msgrd?v=3&amp;uin=<?php echo ($C['contact_qq'][0]); ?>&amp;site=qq&amp;menu=yes" target="_blank">联系客服</a>	</div>	<div class="clearfix cz-form-box">		<form>			<table class="mana-app-table info">				<tbody>				<tr>					<td>官方账号：</td>					<td><?php echo ($myczType["username"]); ?></td>				</tr>				<tr>					<td>开户名称：</td>					<td><?php echo ($myczType["truename"]); ?></td>				</tr>				<tr>					<td>开户地址：</td>					<td><?php echo ($myczType["kaihu"]); ?></td>				</tr>				<tr>					<td>支付金额：</td>					<td>						<b id="right_cny"><?php echo ($mycz["num"]); ?></b>					</td>				</tr>				<tr>					<td>订单编号：</td>					<td>						<em class="cnyin_msg" style="color:red;font-style:normal;font-weight: bold;"><?php echo ($mycz["tradeno"]); ?></em>					</td>				</tr>				</tbody>			</table>		</form>		<?php if(!empty($myczType['img'])): ?><div class="pay_code">				<img src="/Upload/public/<?php echo ($myczType['img']); ?>" >				<p >官网收款微信账号</p>				<p>扫描二维码进行转账</p>			</div><?php endif; ?>	</div>	<div class="pay_con_r">		<p>请在汇款［备注/附言］中严格按要求填写充值订单编号：<em class="cnyin_msg" style="font-weight: bold;color:#E55600;font-style:normal;color:red;"><?php echo ($mycz["tradeno"]); ?></em></p>		<p>不要填写其它字符（比特币、莱特币等），否则不能正确到账！</p>		<p>我们会在收到汇款后20分钟内为您入账，在此期间无需联系客服，如有问题我们会主动联系您。</p>	</div></div><script>    function myczHuikuan(id) {        $.post("<?php echo U('Finance/myczHuikuan');?>", {id: id}, function (data) {            if (data.status == 1) {                layer.msg(data.info, {icon: 1});                window.location.reload();            } else {                layer.msg(data.info, {icon: 2});            }        }, "json");    }</script>