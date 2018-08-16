<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	<title>交易</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<script src="/Public/Home/js/rem.js"></script>
	<!-- <script src="js/mui.min.js"></script> -->
	<link rel="stylesheet" href="/Public/Home/css/reset.css" />
	<link href="/Public/Home/css/mui.css" rel="stylesheet"/>
	<link rel="stylesheet" href="/Public/Home/css/main.css" />
	<link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
	<script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
	<script src="/Public/Home/js/highcharts.js"></script>
	<script type="text/javascript" src="/Public/layer/layer.js"></script>
	<script src="/Public/Home/js/main.js"></script>
    <script type="text/javascript" src="/Public/Home/js/jquery.cookies.2.2.0.js"></script>
</head>
<style type="text/css">
	.highcharts-credits{
		display: none;
	}
</style>
<body>
	<div class="con-pb100">
		<div class="rush-box">
			<ul id="red">


			</ul>
		</div>
		<div class="all-coin-info clearfix">
			<div class="coin-left">
				<p><span  >最新价格:</span>￥<span class="large-red" id="market_new_price"></span></p>
				<p>24小时最低<span class="span1"  id="market_min_price"></span></p>
				<p>24小时最高<span id="market_max_price" class="span1"></span></p>
			</div>
			<div class="coin-right">
				<p class="p1"  id="market_change"></p>
				<p>成交量<span class="span1" id="market_volume"></span></p>
			</div>
		</div>


		<div class="trade-box">
			<div class="tab">
				<ul class="clearfix">
					<li ><a href="javascript:void(0)">K线图</a></li>
					<li class="active"><a href="javascript:void(0)">市场挂单</a></li>
					<li><a href="javascript:void(0)">成交记录</a></li>
				</ul>
			</div>

			<div class="tab-content">
				<div class="con kline" id="kline"  style="display: none"></div>
				<div class="con put-box clearfix">
					<div id="th" style="height: 10px">
						<div style="width: 50%; float: left">
							<ul class="clearfix" >
								<li>
									<span class="serial red">&nbsp;&nbsp;&nbsp;</span>
									<span class="price">价格(元)</span>

									<span class="num green">数量</span>
								</li>
							</ul>
						</div>

						<div style="width: 49%; float: right">
							<ul class="clearfix" >

								<li>
									<span class="serial red">&nbsp;&nbsp;&nbsp;</span>
									<span class="price">价格(元)</span>
									<span class="num red">数量</span>
								</li>
							</ul>

						</div>
					</div>



					<div class="buy-put put" style="height:130px;overflow-x: hidden;
    overflow-y: scroll;">
						<ul class="clearfix" id="buylist" >

						</ul>
					</div>

					<div class="sell-put put" style="height:130px;overflow-x: hidden;
    overflow-y: scroll;">
						<ul class="clearfix" id="selllist" ></ul>
					</div>
				</div>
				<div class="con deal-box" style="display: none; ">
					<div class="deal-thead">
						<span>成交时间</span>
						<span class="price">成交价格</span>
						<span class="num">成交量</span>
					</div>
					<div style="height:130px;overflow-x: hidden;
    overflow-y: scroll;">
						<ul class="deal-tbody" id="orderlist">
							<!--<li>
								<span>11:05:05</span>
								<span class="red price">0.055543</span>
								<span class="num">0.055543</span>
							</li>
							<li>
								<span>11:05:05</span>
								<span class="green price">0.055543</span>
								<span class="num">0.055543</span>
							</li>-->

						</ul>
					</div>

				</div>
			</div>
		</div>
		<div class="business-wrap">
			<div class="tab">
				<a href="javascript:void(0)" class="green active">买入</a>
				<a href="javascript:void(0)" class="red">卖出</a>
			</div>
			<div class="tab-con">
				<div class="business-con">
					<form action="">
						<div class="form-group">
							<input type="text" id="buy_price"  placeholder="价格">
							<span class="plus" id="buy_price_jia" name="buy_price"onclick="jia(id)" >+</span>

							<span class="reduce" id="buy_price_jian" onclick="jian(id)" name="buy_price">-</span>
						</div >
						<div class="user-box1">

						</div>
						<div style="margin: 0 .24rem;font-size: .28rem">
							<span class="buyspan">可用<?php echo ($C['coin'][$rmb]['title']); ?>:</span>
							<span id="my_rmb"></span></div>
						<div class="form-group num-form-group">
							<input type="text"   id="buy_num"  placeholder="数量">
							<span class="plus" id="buy_num_jia" onclick="jia(id)"name="buy_num">+</span>
							<span class="reduce" id="buy_num_jian" onclick="jian(id)" name="buy_num">-</span>
						</div>
						<div style="margin: 0 .24rem;font-size: .28rem">
							<span style="color:#690;">总价：</span>
							<span id="buy_mum">-</span><?php echo (strtoupper($rmb)); ?>
							<span class="ft_p" style="padding-left: .5rem">手续费：</span>
							<span> <?php echo C('market')[$market]['fee_buy'];?>%</span>
						</div>
						<div style="margin: 0 .24rem;font-size: .28rem">


						</div>
						<div  style="padding-bottom:20px;padding-top: 10px">

							<a style="float: right;color:#666;font-size: .28rem" href="<?php echo U('login/findpaypwd');?>">忘记交易密码？</a>
						</div>
						<button type="button" class="green-bg"  onclick="tradeadd_buy()">买入</button>
					</form>
				</div>
				<div class="business-con" style="display: none">
					<form action="">
						<div class="form-group">
							<input type="text" id="sell_price" placeholder="价格">
							<span class="plus"  id="sell_price_jia" name="sell_price" onclick="jia(id)" >+</span>
							<span class="reduce" id="sell_price_jian" name="sell_price" onclick="jian(id)" >-</span>
						</div>
						<div style="margin: 0 .24rem;font-size: .28rem">
							<span class="buyspan">可用<?php echo ($C['coin'][$xnb]['title']); ?>:</span>
							<span id="my_xnb">0</span>
						</div>
						<div class="form-group num-form-group">
							<input type="text" id="sell_num"  placeholder="数量">
							<span class="plus" id="sell_num_jia" onclick="jia(id)" name="sell_num">+</span>
							<span class="reduce" id="sell_num_jian" onclick="jian(id)" name="sell_num">-</span>
						</div>
						<div style="margin: 0 .24rem;font-size: .28rem">
							<span style="color:#690;">总价：</span>
							<span id="sell_mum">-</span><?php echo (strtoupper($rmb)); ?>
							<span class="ft_p" style="padding-left: .5rem">手续费：</span>
							<span> <?php echo C('market')[$market]['fee_sell'];?>%</span>
						</div>
						<div  style="padding-bottom:20px;padding-top: 10px">

							<a style="float: right;color:#666;font-size: .28rem" href="<?php echo U('login/findpaypwd');?>">忘记交易密码？</a>
						</div>
						<button type="button" class="red-bg" onclick="tradeadd_sell()">卖出</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<nav class="nav-wrap">
    <a class="tab-item active" href="<?php echo U('index/index');?>">
        <span class="nav-icon index"></span>
        <span class="tab-label">首页</span>
    </a>
    <a class="tab-item" href="<?php echo U('Trade/index');?>">
        <span class="nav-icon trade"></span>
        <span class="tab-label">交易大厅</span>
    </a>
    <a class="tab-item" href="<?php echo U('trade/seeklist');?>">
        <span class="nav-icon groom"></span>
        <span class="tab-label">推荐大厅</span>
    </a>
    <a class="tab-item" href="<?php echo U('User/index');?>">
        <span class="nav-icon personal"></span>
        <span class="tab-label">我的</span>
    </a>
</nav>

<script src="/Public/Home/js/main.js"></script>


	<script>

        var market = "<?php echo ($market); ?>";
        var xnb="<?php echo ($C['coin'][$xnb]['name']); ?>";
        var rmb="<?php echo ($C['coin'][$rmb]['name']); ?>";
        var buy_fee="<?php echo C('market')[$market]['fee_buy'];?>";
        var sell_fee="<?php echo C('market')[$market]['fee_sell'];?>";
        var market_round = "<?php echo ($C['market'][$market]['round']); ?>";
        var market_round_num = 8 - "<?php echo ($C['market'][$market]['round']); ?>";
        var userid = "<?php echo (session('userId')); ?>";
        var trade_moshi = 1;
        var getDepth_tlme = null;
        var trans_lock = 0;
        var goa=null;
        var F = new RegExp("^\\d+(\\.\\d{0,2})?$");
        var N = new RegExp("^\\d+(\\.\\d{0,3})?$");
        $.cookies.set('chart_time',1440);

        function jia(id) {
            var data= $("#"+id).attr("name");
            var zhi = document.getElementById(data);
            zhi.value=parseInt(zhi.value)+1;
        }
        function jian(id) {
            var data= $("#"+id).attr("name");
            var zhi = document.getElementById(data);
            zhi.value=parseInt(zhi.value)-1;
        }

        $('.trade-box .tab li').on('click',function(){
			$(this).addClass('active').siblings('li').removeClass('active');
			$('.tab-content .con').eq($(this).index()).show().siblings('.con').hide()
		})
		$('.business-wrap .tab a').on('click',function(){
			$(this).addClass('active').siblings('a').removeClass('active');
			$('.tab-con .business-con').eq($(this).index()).show().siblings('.business-con').hide()
		})
        function checkNumber(theObj) {
            var reg = /^[0-9]+.?[0-9]*$/;
            if (reg.test(theObj)) {
                return true;
            }
            return false;
        }
       function empty(id) {

           if (!checkNumber($("#"+id).val())) {
               layer.open({
                   content: '请输入数字'
                   ,skin: 'msg'
                   ,style:'bottom:98px;'
                   ,anim:'false'
                   ,time: 100000 //2秒后自动关闭
               });
               return false;
           }
       }

        $('.buy-business .plus').on('click',function(){
            if($(this).prevAll('input').val()){
                var price = (parseFloat($(this).prevAll('input').val())+1).toFixed(2);
                $(this).prevAll('input').val(price)
            }
        })
        $('.buy-business .reduce').on('click',function(){
            if($(this).prevAll('input').val()){
                var price = (Number($(this).prevAll('input').val())-1).toFixed(2);
                $(this).prevAll('input').val(price);
                if(price<=0) {
                    $(this).prevAll('input').val(0)
                    return ;
                }
            }


        })


        // k线图

        var myDate = new Date(); //获取今天日期
        myDate.setDate(myDate.getDate()-16);
        var dateArray = [];
        var dateTemp;
        var flag = 1;
        for (var i = 0; i < 35;i++) {
            dateTemp =(myDate.getMonth()+1)+"-"+myDate.getDate();

            dateArray.push(dateTemp);

            myDate.setDate(myDate.getDate() + flag);
        }
        var option={

            chart: {
                renderTo:'kline',
                type: 'areaspline',

                backgroundColor: 'rgba(0,0,0,0)'
            },
            title: {
                text: '价格走势图',
                style:{
                    'color':'#fff',
                    'font-size':'12px',
                }
            },
            legend: {
                enabled: false
            },

            xAxis: {

                categories: dateArray,
                visible:false,

            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            tooltip: {
                backgroundColor: 'rgba(255,255,255,.5)',

                // valueSuffix: ' '
            },
            plotOptions: {

                areaspline: {
                    fillOpacity: 0.5,

                    lineWidth:1,
                    marker: {
                        enabled: false,
                        lineWidth:1,
                    }

                },

            },
            series: [{
                name: '价格',
                data: [],
                // fillColor: {
                //     linearGradient: [0,  0, 200, 1],
                //     stops: [
                //         [0, '#00a79d'],
                //         [1, '#262262']
                //     ]
                // },
                // fillColor:'#00a79d',
                fillOpacity:0,
                zIndex:100,
                lineColor:'#ff9e57',
                color:'#ff9e57',
                animation: false,

            },
               /* {
                    name: '蓝钻',
                    data: [],
                    // fillColor: {
                    //     linearGradient: [0,  0, 200, 1],
                    //     stops: [
                    //         [0, '#00a79d'],
                    //         [1, '#262262']
                    //     ]
                    // },
                    // fillColor:'#262262',
                    fillOpacity:0,
                    lineColor:'#4f86f5',
                    color:'#4f86f5'
                },*/
            ]
        };

        function timestampToTime(timestamp) {
            var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
            Y = date.getFullYear() + '-';
            M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
            D = date.getDate()/* + ' '*/;
          /*  h = date.getHours() + ':';
            m = date.getMinutes() + ':';
            s = date.getSeconds();*/
            return M+D;
        }
        function getTrendData(){

            var time=$.cookies.get('chart_time');

          /*  alert(time);*/

            //console.log("/Chart/getMarketOrdinaryJson?market="+market+"&time="+time+"&t="+(new Date().getTime()));
            $.get("/Chart/getMarketOrdinaryJson?market="+market+"&time="+time+"&t="+(new Date("").getTime()),function(data){
                //console.log(data);
                if(data){
                   	//jsonq.Diamonds.remove();
                    var diamondsArr = [];
                     var date = [];
                    for(i=0;i<data.length;i++) {
                        var day=timestampToTime(data[i][0]);
                        date[i]=[day];
                        diamondsArr[i]=[day,parseFloat(data[i][3])];

                    }

                    console.log(date);
                    option.series[0].data = diamondsArr;
                    option.xAxis.categories=date;

                    /*option.series[1].data = agateArr;*/
                    var chart = new Highcharts.Chart(option);


                }
            },"json");


            clearInterval(goa);

            var wait=second=5;
            goa=setInterval(function(){
                wait--;
                if(wait<0){
                    clearInterval(goa);
                    getTrendData();
                    wait=second;
                }
            },1000);
        }
        $(function() {
            getTrendData();

        })
        layer.config({extend: 'extend/layer.ext.js'});



		//买入
        function tradeadd_buy() {

            if (trans_lock) {
                layer.msg('不要重复提交', {icon: 2});
                return;
            }

            trans_lock = 1;

            var price = $('#buy_price').val();
            var num = $('#buy_num').val();
            var mum = $('#buy_mum').html();
            if(rmb="zc"){
                rmb="元";
            }

			var  pay =mum*(100*100 + buy_fee*100)/10000;
            layer.confirm('您确定要买入'+xnb+"?</br>"+'价格:'+price+''+rmb+',数量:'+num+'</br> '+'订单总额:'+pay+rmb+'?', {
                btn: ['确定','取消'], //按钮
                closeBtn: 0,
                btn2: function(index){
                    layer.close(index);
                    trans_lock = 0;
                    return false;
                }
            }, function(){



	//        var price= $('#price').val();
	//        var num = $('#buy_num').val();


				//var paypassword = $('#buy_pass').val();
                if(!F.test(price)){
                    layer.tips('请您输入正确的金额（只包含两位小数）', '#buy_price', {tips: 3});
                    trans_lock = 0;
                    return false;

                }
                if(!N.test(num)){
                    layer.tips('请您输入正确的数量（只包含三位小数）', '#buy_num', {tips: 3});
                    trans_lock = 0;
                    return false;
                }

				if (price == "" || price == null||price== 0) {
					layer.tips('请输入内容', '#buy_price', {tips: 3});
					trans_lock = 0;
					return false;
				}
				if (num == "" || num == null||price== 0) {
					layer.tips('请输入内容', '#buy_num', {tips: 3});
					trans_lock = 0;
					return false;
				}

				//加载层-风格3
				layer.load(2);
				//此处演示关闭
				setTimeout(function () {
					layer.closeAll('loading');
					trans_lock = 0;
				}, 10000);
				$.post("<?php echo U('Trade/upTrade');?>", {
					price: $('#buy_price').val(),
					num: $('#buy_num').val(),
					/*paypassword: paypassword,*/
                    market: market,
					type: 1
				}, function (data) {
					layer.closeAll('loading');
					trans_lock = 0;
					if (data.status == 1) {
                        $("#buy_price").val('');
                        $("#buy_num").val('');
                        $("#buy_mum").html('-');
                        $("#sell_price").val('');
                        $("#sell_num").val('');
                        $("#sell_mum").html('-');
						layer.msg(data.info, {icon: 1});
					} else {
						layer.msg(data.info, {icon: 2});
					}
				}, 'json');
            });
        }
        //卖出

        function tradeadd_sell() {
            if (trans_lock) {
                layer.msg('不要重复提交', {icon: 2});
                return;
            }
            trans_lock = 1;

            var price = parseFloat($('#sell_price').val());
            var num = parseFloat($('#sell_num').val());
            var mum = $('#sell_mum').html();
            if(rmb="zc"){
                rmb="元";
            }

            var  pay =mum*(100*100 - sell_fee*100)/10000;

            layer.confirm('您确定要卖出'+xnb+"?</br>"+'价格:'+price+''+rmb+',数量:'+num+'</br> '+'订单总额:'+pay+rmb+'?', {
                btn: ['确定','取消'], //按钮
                closeBtn: 0,
                btn2: function(index){
                    layer.close(index);
                    trans_lock = 0;
                    return false;
                }
            }, function(){


                //var paypassword = $('#sell_pass').val();
                if(!F.test(price)){
                    layer.tips('请您输入正确的金额（只包含两位小数）', '#sell_price', {tips: 3});
                    trans_lock = 0;
                    return false;

                }
                if(!N.test(num)){
                    layer.tips('请您输入正确的数量（只包含三位小数）', '#sell_num', {tips: 3});
                    trans_lock = 0;
                    return false;
                }
                if (price == "" || price == null) {
                    layer.tips('请输入内容', '#sell_price', {tips: 3});
                    return false;
                }
                if (num == "" || num == null) {
                    layer.tips('请输入内容', '#sell_num', {tips: 3});
                    return false;
                }
                layer.load(2);
                //此处演示关闭
                setTimeout(function () {
                    layer.closeAll('loading');
                    trans_lock = 0;
                }, 10000);
                $.post("<?php echo U('Trade/upTrade');?>", {
                    price: $('#sell_price').val(),
                    num: $('#sell_num').val(),
                  /*  paypassword: paypassword,*/
                    market: market,
                    type: 2
                }, function (data) {
                    layer.closeAll('loading');
                    trans_lock = 0;
                    if (data.status == 1) {
                        $("#buy_price").val('');
                        $("#buy_num").val('');
                        $("#buy_mum").html('-');
                        $("#sell_price").val('');
                        $("#sell_num").val('');
                        $("#sell_mum").html('-');
                        layer.msg(data.info, {icon: 1});
                    } else {
                        layer.msg(data.info, {icon: 2});
                    }
                }, 'json');
            });

        }
        function getDepth() {
            if (trade_moshi != 2) {
                $.getJSON("/Ajax/getDepth?market=" + market + "&trade_moshi=" + trade_moshi + "&t=" + Math.random(), function (data) {
                    if (data) {
                        if (data['depth']) {
                            var list = '';
                            var sellk = data['depth']['sell'].length;
                            if (data['depth']['sell']) {
                                for (i = 0; i < data['depth']['sell'].length; i++) {
                                   	list+='<li><span class="serial red">卖'+( i+1)+'</span>\n' +
                                        '<span class="price">'+data['depth']['sell'][i][0]+'</span>\n' +
                                        '<span class="num red">'+data['depth']['sell'][i][1]+'</span></li>'
                                    // list += '<dl class="sell" title="以这个价格买入" style="cursor: pointer;" onclick="autotrust(this,\'sell\',1)"><dt class="sell w40" ><?php echo (L("mai4")); ?>' + (sellk - i) + '</dt><dd class="sell w80">' + data['depth']['sell'][i][0] + '</dd><dd class="sell w110">' + data['depth']['sell'][i][1] + '</dd><dd class="sell w120">' + (data['depth']['sell'][i][0] * data['depth']['sell'][i][1]).toFixed(6) + '</dd></dl>';
                                }
                            }else{
                                list="<li><span class='red'>暂时没有数据</span></li>";
							}
                            $("#selllist").html(list);
                            list = '';
                            if (data['depth']['buy']) {
                                for (i = 0; i < data['depth']['buy'].length; i++) {
                                    list += '<li><span class="serial green">买' + (i + 1) + '</span>\n' +
                                        '<span class="price">' + data['depth']['buy'][i][0] + '</span>\n' +
                                        '<span class="num green">' + data['depth']['buy'][i][1] + '</span></li>'
                                    //list += '<dl class="buy" title="以这个价格卖出" style="cursor: pointer;" onclick="autotrust(this,\'buy\',1)"><dt class="buy first" ><?php echo (L("mai")); ?>' + (i + 1) + '</dt><dd class="buy w80">' + data['depth']['buy'][i][0] + '</dd><dd class="buy w110">' + data['depth']['buy'][i][1] + '</dd><dd class="buy w120">' + (data['depth']['buy'][i][0] * data['depth']['buy'][i][1]).toFixed(6) + '</dd></dl>';
                                }
                            }else{
                                list="<li><span class='green'>暂时没有数据</span></li>";
							}
                            $("#buylist").html(list);
                        }
                    }
                    var elHeight = $('.el_dl dl').css('height');
                    // console.log(elHeight)
                    var elCount= $('#selllist').children().length;
                    $('#selllist').height(elHeight*elCount)
                    $('#sell-b1').scrollTop(140)
                    var buyelcount = $('#buylist').children().length;
                    $('#buylist').height(elHeight*buyelcount)

                });
               clearInterval(getDepth_tlme);
                var wait = second = 5;
                getDepth_tlme = setInterval(function () {
                    wait--;
                    if (wait < 0) {
                        clearInterval(getDepth_tlme);
                        getDepth();
                        wait = second;
                    }
                }, 1000);
            }
        }
        $(function () {
            getDepth();
            getTradelog();
            getEntrustAndUsercoin();
            hongbao();
            getJsonTop();
        });

        function getTradelog() {
            $.getJSON("/Ajax/getTradelog?market=" + market + "&t=" + Math.random(), function (data) {
                if (data) {
                    if (data['tradelog']) {
                        var list = '';
                        var type = '';
                        var typename = '';
                        for (var i in data['tradelog']) {
                            if (data['tradelog'][i]['type'] == 1) {
                                list += '<li><span  >' + data['tradelog'][i]['addtime'] + '</span>\n' +
                                    '<span class="price green">' + data['tradelog'][i]['price'] + '</span>\n' +
                                    '<span class="num green">' + data['tradelog'][i]['num'] + '</span></li>'
                                //list += '<tr title="以这个价格卖出" onclick="autotrust(this,\'buy\',2)"><td class="buy"   width="30%">' + data['tradelog'][i]['addtime'] + '</td><td class="buy"   width="20%"><?php echo (L("mai")); ?></td><td class="buy"   width="20%">' + data['tradelog'][i]['price'] + '</td><td class="buy"  width="30%">' + data['tradelog'][i]['num'] + '</td></tr>';
                                // <td class="buy" width="30%">' + data['tradelog'][i]['mum'] + '</td>
                            } else {
                                list += '<li><span  >' + data['tradelog'][i]['addtime'] + '</span>\n' +
                                    '<span class="price red">' + data['tradelog'][i]['price'] + '</span>\n' +
                                    '<span class="num red">' + data['tradelog'][i]['num'] + '</span></li>'
                               // list += '<tr title="以这个价格买入" onclick="autotrust(this,\'sell\',2)"><td class="sell"   width="30%">' + data['tradelog'][i]['addtime'] + '</td><td class="sell"   width="20%"><?php echo (L("mai4")); ?></td><td class="sell"   width="20%">' + data['tradelog'][i]['price'] + '</td><td class="sell"  width="30%">' + data['tradelog'][i]['num'] + '</td></tr>';
                                // <td class="sell" width="30%">' + data['tradelog'][i]['mum'] + '</td>
                            }
                        }
                        $("#orderlist").html(list);
                    }
                }
            });
            setTimeout('getTradelog()', 5000);
        }


        function hongbao() {

            $.getJSON("/Ajax/gethongbao", function (data) {
                if (data) {
                    var list = '';
                    for (i = 0; i < 10; i++) {
                        list+='<li>'+
                            '<img onclick="chb1()" src="/Public/Home/images/diamond-icon3.png" alt="">' +
							'<span class="time">拆红包</span>'+
                            '</li>'
                        // list += '<dl class="sell" title="以这个价格买入" style="cursor: pointer;" onclick="autotrust(this,\'sell\',1)"><dt class="sell w40" ><?php echo (L("mai4")); ?>' + (sellk - i) + '</dt><dd class="sell w80">' + data['depth']['sell'][i][0] + '</dd><dd class="sell w110">' + data['depth']['sell'][i][1] + '</dd><dd class="sell w120">' + (data['depth']['sell'][i][0] * data['depth']['sell'][i][1]).toFixed(6) + '</dd></dl>';
                    }

					$("#red").html(list);

                }else{
                    var list = '';
                    for (i = 0; i < 10; i++) {
                        list+='<li>'+
                            '<img onclick="chb2()" src="/Public/Home/images/dengdai.png" alt="">' +
                            '<span class="time">请等待</span>'+
                            '</li>'
                        // list += '<dl class="sell" title="以这个价格买入" style="cursor: pointer;" onclick="autotrust(this,\'sell\',1)"><dt class="sell w40" ><?php echo (L("mai4")); ?>' + (sellk - i) + '</dt><dd class="sell w80">' + data['depth']['sell'][i][0] + '</dd><dd class="sell w110">' + data['depth']['sell'][i][1] + '</dd><dd class="sell w120">' + (data['depth']['sell'][i][0] * data['depth']['sell'][i][1]).toFixed(6) + '</dd></dl>';
                    }

                    $("#red").html(list);
				}
            });
           setTimeout('hongbao()', 5000);
        }

        function chb1() {


            $.post("/Trade/hongbao",function (data) {

                if (data.status == 1) {
                    layer.msg(data.info, {icon: 6});
                } else {
                    layer.msg(data.info, {icon: 5});
                }
            },'json');
        }
        function chb2() {
            layer.alert('红包已用完,请稍等', {
                icon: 5,
                skin: 'layer-ext-moon'
            })
        }
        //
        function getEntrustAndUsercoin() {
            $.getJSON("/Ajax/getEntrustAndUsercoin?market=" + market + "&t=" + Math.random(), function (data) {
                if (data) {
                    if (data['entrust']) {
                        $('#entrust_over').show();
                        var list = '';
                        var cont = data['entrust'].length;
                        for (i = 0; i < data['entrust'].length; i++) {
                            if (data['entrust'][i]['type'] == 1) {
                                list += '<tr title="以这个价格卖出" onclick="autotrust(this,\'buy\',2)"><td class="buy" width="20%">' + data['entrust'][i]['addtime'] + '</td><td class="buy" width="10%"><?php echo (L("mai")); ?></td><td class="buy" width="15%">' + data['entrust'][i]['price'] + '</td><td class="buy" width="15%">' + data['entrust'][i]['num'] + '</td><td class="buy" width="15%">' + data['entrust'][i]['deal'] + '</td><td class="buy" width="15%">' + (data['entrust'][i]['price'] * data['entrust'][i]['num']).toFixed(6) + '</td><td width="10%"><a style="color: #2674FF;" class="cancelaa" id="' + data['entrust'][i]['id'] + '" onclick="cancelaa(\'' + data['entrust'][i]['id'] + '\')" href="javascript:void(0);"><?php echo (L("cx")); ?></a></td></tr>';
                            } else {
                                list += '<tr title="以这个价格买入" onclick="autotrust(this,\'sell\',2)"><td class="sell" width="20%">' + data['entrust'][i]['addtime'] + '</td><td class="sell" width="10%"><?php echo (L("mai4")); ?></td><td class="sell" width="15%">' + data['entrust'][i]['price'] + '</td><td class="sell" width="15%">' + data['entrust'][i]['num'] + '</td><td class="sell" width="15%">' + data['entrust'][i]['deal'] + '</td><td class="sell" width="15%">' + (data['entrust'][i]['price'] * data['entrust'][i]['num']).toFixed(6) + '</td><td width="10%"><a style="color: #2674FF;" class="cancelaa" id="' + data['entrust'][i]['id'] + '" onclick="cancelaa(\'' + data['entrust'][i]['id'] + '\')" href="javascript:void(0);"><?php echo (L("cx")); ?></a></td></tr>';
                            }
                        }
                        if (cont == 10) {
                            list += '<tr><td style="text_align:center;" colspan="7"><a href="/Finance/mywt" style="color: #2674FF;">更多委托信息</a>&nbsp;&nbsp;</td></tr>';
                        }
                        $('#entrustlist').html(list);
                    } else {
                        $('#entrust_over').hide();
                    }
                    if (data['usercoin']) {
                        if (data['usercoin']['zc']) {
                            $("#my_rmb").html(data['usercoin']['zc']);
                        } else {
                            $("#my_rmb").html('0.00');
                        }
                        if (data['usercoin']['zcd']) {
                            $("#my_rmbd").html(data['usercoin']['zcd']);
                        } else {
                            $("#my_rmbd").html('0.00');
                        }
                        if (data['usercoin']['xnb']) {
                            $("#my_xnb").html(data['usercoin']['xnb']);
                        } else {
                            $("#my_xnb").html('0.00');
                        }
                        if (data['usercoin']['xnbd']) {
                            $("#my_xnbd").html(data['usercoin']['xnbd']);
                        } else {
                            $("#my_xnbd").html('0.00');
                        }
                    }
                }
            });
            $.getJSON("/Ajax/allfinance?t=" + Math.random(), function (data) {
                $('#user_finance').html(data);
            });
            setTimeout('getEntrustAndUsercoin()', 5000);
        }


        function getJsonTop() {

            $.getJSON("/Ajax/getJsonTop?market=<?php echo ($market); ?>&t=" + Math.random(), function (data) {

                if (data) {

                    if (data['info']['new_price']) {

                        $('#market_new_price').removeClass('buy');

                        $('#market_new_price').removeClass('sell');

                        if ($("#market_new_price").html() > data['info']['new_price']) {

                            $('#market_new_price').addClass('sell');

                        }

                        if ($("#market_new_price").html() < data['info']['new_price']) {

                            $('#market_new_price').addClass('buy');

                        }

                        $("#market_new_price").html(data['info']['new_price']);

                    }

                    if (data['info']['buy_price']) {

                        $('#market_buy_price').removeClass('buy');

                        $('#market_buy_price').removeClass('sell');

                        if ($("#market_buy_price").html() > data['info']['buy_price']) {

                            $('#market_buy_price').addClass('sell');

                        }

                        if ($("#market_buy_price").html() < data['info']['buy_price']) {

                            $('#market_buy_price').addClass('buy');

                        }

                        $("#market_buy_price").html(data['info']['buy_price']);

                        $("#sell_best_price").html(data['info']['buy_price']);

                    }

                    if (data['info']['sell_price']) {

                        $('#market_sell_price').removeClass('buy');

                        $('#market_sell_price').removeClass('sell');

                        if ($("#market_sell_price").html() > data['info']['sell_price']) {

                            $('#market_sell_price').addClass('sell');

                        }

                        if ($("#market_sell_price").html() < data['info']['sell_price']) {

                            $('#market_sell_price').addClass('buy');

                        }

                        $("#market_sell_price").html(data['info']['sell_price']);

                        $("#buy_best_price").html(data['info']['sell_price']);

                    }

                    if (data['info']['max_price']) {

                        $("#market_max_price").html(data['info']['max_price']);

                    }

                    if (data['info']['min_price']) {

                        $("#market_min_price").html(data['info']['min_price']);

                    }

                    if (data['info']['volume']) {

                        if (data['info']['volume'] > 10000) {

                            data['info']['volume'] = (data['info']['volume'] / 10000).toFixed(2) + "万"

                        }

                        if (data['info']['volume'] > 100000000) {

                            data['info']['volume'] = (data['info']['volume'] / 100000000).toFixed(2) + "亿"

                        }

                        $("#market_volume").html(data['info']['volume']);

                    }

                    if (data['info']['change']) {

                        $('#market_change').attr('style',"");



                        if (data['info']['change'] > 0) {

                            $('#market_change').attr('style','color:green');

                        } else {

                            $('#market_change').attr('style','color:red');

                        }

                        $("#market_change").html(data['info']['change'] + "%");

                    }




                }

            });

            setTimeout('getJsonTop()', 5000);

        }

        // 自动填价格

        function toNum(num, round) {
            return Math.round(num * Math.pow(10, round) - 1) / Math.pow(10, round);
        }
        
        $('#buy_price,#buy_num,#sell_price,#sell_num').keyup(function () {

            var buyprice = parseFloat($('#buy_price').val());
            var buynum = parseFloat($('#buy_num').val());
            var sell_price = parseFloat($('#sell_price').val());
            var sell_num = parseFloat($('#sell_num').val());
            var buymum = buyprice * buynum;
            var sellmum = sell_price * sell_num;
            var myrmb = $("#my_rmb").html();
            var myxnb = $("#my_xnb").html();
            var buykenum = 0;
            var sellkenum = 0;

            if (myrmb > 0) {
                buykenum = myrmb / buyprice;
            }
            if (myxnb > 0) {
                sellkenum = myxnb;
            }
            var buyprice = parseFloat($('#buy_price').val());
            //alert("wobianliao");

            if (buyprice != null && buyprice.toString().split(".") != null && buyprice.toString().split(".")[1] != null) {
                if (buyprice.toString().split('.')[1].length > market_round) {
                    $('#buy_price').val(buyprice.toFixed(market_round));
                }
            }
            if (buynum != null && buynum.toString().split(".") != null && buynum.toString().split(".")[1] != null) {
                if (buynum.toString().split('.')[1].length > market_round_num) {
                    $('#buy_num').val(toNum(buynum, market_round_num));
                }
            }
            if (sell_price != null && sell_price.toString().split(".") != null && sell_price.toString().split(".")[1] != null) {
                if (sell_price.toString().split('.')[1].length > market_round) {
                    $('#sell_price').val(sell_price.toFixed(market_round));
                }
            }
            if (sell_num != null && sell_num.toString().split(".") != null && sell_num.toString().split(".")[1] != null) {
                if (sell_num.toString().split('.')[1].length > market_round_num) {
                    $('#sell_num').val(toNum(sell_num, market_round_num));
                }
            }
            if (buymum != null && buymum > 0) {
                $('#buy_mum').html(buymum.toFixed(8) * 1);
            }
            if (sellmum != null && sellmum > 0) {
                $('#sell_mum').html(sellmum.toFixed(8) * 1);
            }
            if (buykenum != null && buykenum > 0 && buykenum != 'Infinity') {
                $('#buy_max').html(toNum(buykenum, market_round_num));
            }
            if (sellkenum != null && sellkenum > 0 && sellkenum != 'Infinity') {
                $('#sell_max').html(sellkenum);
            }
            if(buyprice !=null && buynum>0) {
                $('#buy_mum').text(buymum.toFixed(4))
            }
            if(sell_price !=null && sell_num>0) {
                $('.sell_mum').text(sellmum.toFixed(4))
            }

        }).bind("paste", function () {
            return false;
        }).bind("blur", function () {
            if (this.value.slice(-1) == ".") {
                this.value = this.value.slice(0, this.value.length - 1);
            }
        }).bind("keypress", function (e) {
            var code = (e.keyCode ? e.keyCode : e.which); //兼容火狐 IE
            if (this.value.indexOf(".") == -1) {
                return (code >= 48 && code <= 57) || (code == 46);
            } else {
                return code >= 48 && code <= 57
            }
        });

	</script>

</body>