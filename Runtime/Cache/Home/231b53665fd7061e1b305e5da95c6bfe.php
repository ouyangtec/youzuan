<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
<!--	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />-->
	<script src="/Public/Home/js/rem.js"></script>
	<!-- <script src="js/mui.min.js"></script> -->
	<script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>
	<link href="/Public/Home/css/layer.css" rel="stylesheet"/>
	<link href="/Public/Home/css/mui.css" rel="stylesheet"/>

	<link rel="stylesheet" href="/Public/Home/css/main.css" />
	<link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
	<script src="/Public/Home/js/layer.js"></script>


	<script src="/Public/Home/js/highcharts.js"></script>

	<script src="/Public/Home/js/main.js"></script>


</head>
<style>
	.draw tr td .name{font-size:.25rem;}
</style>
<body>
	<div class="luck-bg">
		<div class="luck-head">
			<a href="javaScript:history.go(-1)" class="back iconfont">&#xe647;</a>
		</div>
		<div class="tit-img">
			<img src="/Public/Home/images/luck-pic1.png" alt="">
		</div>
		<div class="draw" id="lottery">
			<table border="0" cellpadding="0" cellspacing="0">
				<tbody>
				<tr>
					<td class="lottery-unit lottery-unit-0">
						<img src="/Upload/duobao/<?php echo ($data['0']['img']); ?>">
						<span class="name"><?php echo ($data['0']['name']); ?>
							<?php if(($data['0']['type']) != "empty"): ?><!--(<?php echo ($data['0']['num']); echo ($data['0']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
					<td class="lottery-unit lottery-unit-1">
						<img src="/Upload/duobao/<?php echo ($data['1']['img']); ?>">
						<span class="name"><?php echo ($data['1']['name']); ?>
							<?php if(($data['1']['type']) != "empty"): ?><!--(<?php echo ($data['1']['num']); echo ($data['1']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
					<td class="lottery-unit lottery-unit-2">
						<img src="/Upload/duobao/<?php echo ($data['2']['img']); ?>">
						<span class="name"><?php echo ($data['2']['name']); ?>
							<?php if(($data['2']['type']) != "empty"): ?><!--(<?php echo ($data['2']['num']); echo ($data['2']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
		            <td class="lottery-unit lottery-unit-3">
						<img src="/Upload/duobao/<?php echo ($data['3']['img']); ?>">
						<span class="name"><?php echo ($data['3']['name']); ?>
							<?php if(($data['3']['type']) != "empty"): ?><!--(<?php echo ($data['3']['num']); echo ($data['3']['unit']); ?>)--><?php endif; ?></span>
		            </td>
				</tr>
				<tr>
					<td class="lottery-unit lottery-unit-11">
						<img src="/Upload/duobao/<?php echo ($data['11']['img']); ?>">
						<span class="name"><?php echo ($data['11']['name']); ?>
							<?php if(($data['11']['type']) != "empty"): ?><!--(<?php echo ($data['11']['num']); echo ($data['11']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
					<td colspan="3" rowspan="2"  class="chou">
						<a href="javascript:void(0)">
						</a>
					</td>
					<td class="gap"></td>
					<td class="lottery-unit lottery-unit-4">
						<img src="/Upload/duobao/<?php echo ($data['4']['img']); ?>">
						<span class="name"><?php echo ($data['4']['name']); ?>
							<?php if(($data['4']['type']) != "empty"): ?><!--(<?php echo ($data['4']['num']); echo ($data['4']['unit']); ?>)--><?php endif; ?></span>
					</td>
				</tr>
				<tr>
					<td class="lottery-unit lottery-unit-10">
						<img src="/Upload/duobao/<?php echo ($data['10']['img']); ?>">
						<span class="name"><?php echo ($data['10']['name']); ?>
							<?php if(($data['10']['type']) != "empty"): ?><!--	(<?php echo ($data['10']['num']); echo ($data['10']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
					<td class="gap"></td>
					<td class="lottery-unit lottery-unit-5">
						<img src="/Upload/duobao/<?php echo ($data['5']['img']); ?>">
						<span class="name"><?php echo ($data['5']['name']); ?>
							<?php if(($data['5']['type']) != "empty"): ?><!--(<?php echo ($data['5']['num']); echo ($data['5']['unit']); ?>)--><?php endif; ?></span>
					</td>
				</tr>
		        <tr>
					<td class="lottery-unit lottery-unit-9">
						<img src="/Upload/duobao/<?php echo ($data['9']['img']); ?>">
						<span class="name"><?php echo ($data['9']['name']); ?>
							<?php if(($data['9']['type']) != "empty"): ?><!--(<?php echo ($data['9']['num']); echo ($data['9']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
					<td class="lottery-unit lottery-unit-8">
						<img src="/Upload/duobao/<?php echo ($data['8']['img']); ?>">
						<span class="name"><?php echo ($data['8']['name']); ?>
							<?php if(($data['8']['type']) != "empty"): ?><!--	(<?php echo ($data['8']['num']); echo ($data['8']['unit']); ?>)--><?php endif; ?></span>
					</td>
					<td class="gap"></td>
					<td class="lottery-unit lottery-unit-7">
						<img src="/Upload/duobao/<?php echo ($data['7']['img']); ?>">
						<span class="name"><?php echo ($data['7']['name']); ?>
							<?php if(($data['7']['type']) != "empty"): ?><!--(<?php echo ($data['7']['num']); echo ($data['7']['unit']); ?>)--><?php endif; ?>
						</span>
					</td>
					<td class="gap"></td>
		            <td class="lottery-unit lottery-unit-6">
		            	<img  src="/Upload/duobao/<?php echo ($data['6']['img']); ?>">
		            	<span class="name"><?php echo ($data['6']['name']); ?>
							<?php if(($data['6']['type']) != "empty"): ?><!--	(<?php echo ($data['6']['num']); echo ($data['6']['unit']); ?>)--><?php endif; ?></span>
		            </td>
				</tr>
			</tbody>
			</table>
		</div>


		<div class="winner-box" style="padding: .4rem 0.6rem.4rem;">
			<!-- <h4>获奖记录</h4> -->
			<div class="winner-list">
				<div class="winner-scroll">
					<ul>
						<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><?php echo ($vo["username"]); ?>&nbsp;&nbsp;刚刚抽中&nbsp;&nbsp;<?php echo ($vo["name"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
					<!--
						<li>133444&nbsp;&nbsp;刚刚抽中&nbsp;&nbsp;蓝钻</li>
						<li>133444&nbsp;&nbsp;刚刚抽中&nbsp;&nbsp;蓝钻</li>
						<li>133444&nbsp;&nbsp;刚刚抽中&nbsp;&nbsp;蓝钻</li>
						<li>133444&nbsp;&nbsp;刚刚抽中&nbsp;&nbsp;蓝钻</li>-->
						<!-- <li>133444&nbsp;&nbsp;刚刚抽中&nbsp;&nbsp;蓝钻</li> -->
					</ul>
				</div>
			</div>
		</div>
		<div class="game-rules-box">
			<h4>抽奖规则</h4>
			<div class="game-rules">
				<p class="p1">a.参与条件：</p>
				<p class="p2">每位实名注册会员，每日可抽奖一次</p>
				<p class="p1">b.抽奖奖品：</p>
				<p class="p2">蓝钻（回购奖）抽中后，待平台开放蓝钻回购，可回购给平台</p>
				<p class="p2">红钻（现金奖）抽中后，打开是现金奖励</p>
				<p class="p2">金钻（稀有奖）抽中后，待平台开放金钻交易，可出售给其它会员</p>
			</div>
		</div>
	</div>
	<style>

	</style>
	<script>
		function autoScroll(obj) {
		    $(obj).find("ul").animate({
		        marginTop: "-25px"
		    }, 1000, function() {
		        $(this).css({marginTop: "0px"}).find("li:first").appendTo(this);
		    })
		}
		$(function() {
		    var scroll = setInterval('autoScroll(".winner-scroll")', 1500);
		   
		});
		var lottery = {
        index: -1, //当前转动到哪个位置，起点位置
        count: 0, //总共有多少个位置
        timer: 0, //setTimeout的ID，用clearTimeout清除
        speed: 20, //初始转动速度
        times: 0, //转动次数
        cycle: 50, //转动基本次数：即至少需要转动多少次再进入抽奖环节
        prize: -1, //中奖位置
        init: function(id) {
            if($('#' + id).find('.lottery-unit').length > 0) {
                $lottery = $('#' + id);
                $units = $lottery.find('.lottery-unit');
                this.obj = $lottery;
                this.count = $units.length;
                $lottery.find('.lottery-unit.lottery-unit-' + this.index).addClass('active');
            };
        },
        roll: function() {
            var index = this.index;
            var count = this.count;
            var lottery = this.obj;
            $(lottery).find('.lottery-unit.lottery-unit-' + index).removeClass('active');
            index += 1;
            if(index > count - 1) {
                index = 0;
            };
            $(lottery).find('.lottery-unit.lottery-unit-' + index).addClass('active');
            this.index = index;
            return false;
        },
        stop: function(index) {
            this.prize = index;
            return false;
        }
    };

    function roll() {
        lottery.times += 1;
        lottery.roll(); //转动过程调用的是lottery的roll方法，这里是第一次调用初始化

        if(lottery.times > lottery.cycle + 10 && lottery.prize == lottery.index) {
           // alert(lottery.prize+'/'+lottery.times+'/'+lottery.index);
           /* layer.open({
                content: $('#layer')
                ,style: 'width:80%;background-color:#fff; color:#000; border:1px solid #eee;font-size:16px;' //自定风格
                ,time: 5
            });*/
            /*layer.style(index,{
                "background": '#333333',
                "opacity": 0.5
            });*/
            clearTimeout(lottery.timer);
            layer.open({
                type: 1,
                shadeClose: true,
                shade: false,
                maxmin: true, //开启最大化最小化按钮
                area: ['360px', '300px'],
                content: $("#info").html()
            });


            // msg($('.lottery-unit.active .name').text());
      

            lottery.prize = -1;
            lottery.times = 0;
            click = false;
        } else {

            if(lottery.times < lottery.cycle) {
                lottery.speed -= 10;
            } else if(lottery.times == lottery.cycle) {

                $.ajax({ url:'/duobao/duobao',dataType:'json',success: function(msg) {

                        if(msg.type=='empty'){
                            $('#yihan').show();
                            $('#gongxi').hide();
                           // $('#yihan img').attr('src','/upload/duobao/'+msg.img);
                          //  $('#yihan span').text(msg.name);

                        }else if(msg.type=='blue'){

                            $('#yihan').hide();
                            $('#gongxi').show();

                            $('#gongxi #icon').attr('src','/upload/duobao/'+msg.img);
                            $('#gongxi span').text(msg.name+msg.num+msg.unit);
                        }else{
                            $('#yihan').hide();
                            $('#gongxi').show();
                            $('#gongxi #icon').attr('src','/upload/duobao/'+msg.img);
                            $('#gongxi span').text(msg.name+msg.num+msg.unit);
                        }
                        var index = msg.sort-1;
                        lottery.prize = index;


                    }
                    })


            } else {

                if(lottery.times > lottery.cycle + 10 && ((lottery.prize == 0 && lottery.index == 11) || lottery.prize == lottery.index + 1)) {
					//alert(msg.name+'/'+msg.num);
                    lottery.speed += 110;
                } else {
                    lottery.speed += 20;
                }
            }
            if(lottery.speed < 40) {
                lottery.speed = 40;
            };
            lottery.timer = setTimeout(roll, lottery.speed); //循环调用
        }


        return false;
    }

    var click = false;

    window.onload = function() {
        lottery.init('lottery');
        $('.chou').click(function() {
            if(click) { //click控制一次抽奖过程中不能重复点击抽奖按钮，后面的点击不响应
                return false;

            } else {
                /*layer.open({
                    type: 1,
                    shadeClose: true,
                    shade: false,
                    maxmin: true, //开启最大化最小化按钮
                    area: ['360px', '300px'],
                    content: $("#info").html()
                });
                return false;*/
                $.ajax({ url:'/duobao/time',dataType:'json',success:function(data) {

						if(data.status==1){
                            lottery.speed = 100;
                            roll(); //转圈过程不响应click事件，会将click置为false
                            click = true; //一次抽奖完成后，设置click为true，可继续抽奖

						}else{
                            alert(data.info);
                            return false;

						}



                    }


            })
            }
        });
    };
    
    function layerclose() {
			layer.closeAll();
    }

	</script>
	<style>
		#gongxi span {    color: white;
			position: absolute;
			top: 67%;
			width: 120px;
			left: 50%;
			margin-left: -60px;
			text-align: center;
			font-size: 24px;}
		#gongxi #icon{

			position: absolute;
			top: 49%;
			width: 120px;
			left: 50%;
			margin-left: -60px;
			text-align: center;

		}
	</style>
	<div  id="info"  style="display:none" >
		<!---->
		<!--<img src="/Public/Home/images/gongxi.png" width="100%" >-->
		<<div id="gongxi"  align="center" style="  display: none; padding-top:21%;">
           <a onclick="layerclose()" href="javascript:void(0)"><img src="/Public/Home/images/gongxi.png" width="100%" ></a>
            <img  id="icon"  src="/Upload/duobao/<?php echo ($data['6']['img']); ?>" width="100px">
            <span class="name"><?php echo ($data['6']['name']); ?>(<?php echo ($data['6']['num']); echo ($data['6']['unit']); ?>)</span>
        </div>
        <div id="yihan" align="center" style="display: none;">
			<a onclick="layerclose()" href="javascript:void(0)"><img  src="/Public/Home/images/yihan.png" width="200%" style="margin-left: -47%;" ></a>>
        </div>

	</div>
</body>