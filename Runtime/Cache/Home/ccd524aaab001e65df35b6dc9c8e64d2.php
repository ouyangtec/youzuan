<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>提现</title>
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
<style>
    .Pagination a:hover,.current{background-color: #f5930c;border: 1px solid #f5980c;color: #ffffff; }
    .Pagination{float: right;height: auto;_height: 45px; line-height: 20px;margin-right: 15px;_margin-right: 5px; color:#565656;margin-top: 10px;_margin-top: 20px; clear:both;}
    .Pagination a,.Pagination span{ font-size: 14px;text-decoration: none;display: block;float: left;color: #565656;border: 1px solid #ccc;height: 34px;line-height: 34px;margin: 0 2px;width: 34px;text-align: center;}
</style>
<body class="gray-body">
	<header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>提现</span>
    </header>

        <div class="pay-select">
            <?php if(empty($userBankList)): ?><div class="mui-content">
                    <a href="/User/<?php echo ($type); ?>">
                        <span>没有该地址,请点击添加</span>
                    </a>
                </div>
                <div class="mui-content" style="padding-top: 10px">
                    <a href="<?php echo U('finance/payselect');?>">
                        <span>选择其他方式</span>
                        <i class="iconfont">&#xe678;</i>
                    </a>
                </div>
            <?php else: ?>
                <div class="mui-content">
                    <a href="<?php echo U('finance/payselect');?>">
                        <input type="hidden" id="mytx_type" value="<?php echo ($userBankList["id"]); ?>">
                        <span><?php echo ($userBankList["type"]); echo ($userBankList["bankcard"]); ?></span>

                        <i class="iconfont">&#xe678;</i>
                    </a>
                </div><?php endif; ?>


        <div class="recharge-form">
            <form action="">
                <div class="form-group1 withdraw-form-group1">
                    <label for="">提现金额</label>
                    <div class="inp-b">
                        ￥<input id="mcliang" type="text">
                    </div>
                </div>
                <div class="withdraw-form-group2">
                    <span>可用余额：</span>
                    <span><?php echo ($user_coin["zc"]); ?>元</span>
                </div>
                <button type="button"  onclick="mytxUp('zc')" class="recharge-btn">确定</button>
            </form>
        </div>
            <div style="text-align:left;padding-left: 10px;margin-top: .4rem;padding: 0 .2rem;font-size: .22rem;color: #000;line-height: 1.8;"  >
                <div class="game-rules">
                    <p class="p1">1.每天只可发起一次提现，请提现申请时认真查看提现信息。</p>
                    <p class="p1">2.提现到账时间</p>
                    <p class="p1">3.单笔提现限额5-20000元</p>

                </div>
            </div>
            <div style="padding-top: 70px">
                <div class="mui-content">
                    <table class="main-table">
                        <thead >
                        <tr style="background-color:#ff7324;color: white" >
                            <th class="first" style="width: 1.5rem;">时间</th>

                            <th class="last">方式</th>
                            <th class="last">操作数量</th>
                            <!--   <th class="last">实际到账</th>-->
                            <th class="last" >状态</th>
                      <!--      <th class="last">操作</th>-->
                        </tr>
                        </thead>
                        <tbody>
                        <!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
                                 <td class="first"><?php echo (addtime($v["addtime"])); ?></td>
                                 <?php if($v['name'] == mytx): ?><td>提现</td>
                                     <?php else: ?>
                                     <td>充值</td><?php endif; ?>
                                 <td><?php echo (addtime($v["addtime"])); ?></td>
                                 <td class="last"><?php echo ($v["moble"]); ?></td>

                             </tr><?php endforeach; endif; else: echo "" ;endif; ?>-->
                        <?php if(empty($list)): ?><tr>
                                <td colspan="6">
                                    <div class="bk-norecord">
                                        <p><i class="bk-ico info"></i>暂时没有相关记录。</p>
                                    </div>
                                </td>
                            </tr><?php endif; ?>
                        <?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
                                <td style="width: 1.5rem;"><?php echo (date('y-m-d H:i:s',$v["addtime"])); ?></td>

                                <td><?php echo ($v["bank"]); ?></td>
                                <!-- <td><?php echo (strtoupper($v["m_type"])); ?></td>-->

                                <td><?php echo ((isset($v['num']) && ($v['num'] !== ""))?($v['num']):"0.00"); ?></td>



                                <!--     <td><?php echo ((isset($v['mum']) && ($v['mum'] !== ""))?($v['mum']):"0.00"); ?></td>-->
                                <td>
                                    <?php if($v['name'] == mytx): if(($v["status"]) == "0"): ?>未处理<?php endif; ?>

                                        <?php if(($v["status"]) == "1"): ?>提现成功<?php endif; ?>
                                        <?php if(($v["status"]) == "2"): ?>已撤销<?php endif; ?>
                                        <?php if(($v["status"]) == "3"): ?>正在处理<?php endif; endif; ?>
                                </td>
                                <!--<td>
                                    <?php if(($v["status"]) == "0"): ?><a onclick="mytxChexiao(<?php echo ($v['id']); ?>)" href="javascript:void(0)" style="    color: #2674FF!important;">撤销</a><?php endif; ?>
                                </td>-->
                            </tr><?php endforeach; endif; ?>
                        </tbody>

                    </table>
                    <div class="Pagination"><?php echo ($page); ?></div>
                </div>
            </div>
        </div>
    </div>
<script>
    function mytxUp(coin) {

        var mbTest_num = /^[1-9]{1}\d*?$/;
        var type = $('#mytx_type').val();
        var num = $("#mcliang").val();

        if (num == "" || num == null) {
            layer.tips('提现数量', '#mcliang', {tips: 3});
            return false;
        } else {
            num = num;
        }
     /*   if (!mbTest_num.test(num)) {
            layer.tips('卖出量格式错误 (数字)', '#mcliang', {tips: 3});
            return false;
        }*/



        if (type == "" || type == null) {
            layer.tips('请选择提现地址', '#mytx_type', {tips: 3});
            return false;
        }
        
        var index =   layer.open({
            type: 2,
            title: '密码确认',
            shadeClose: true,
            shade: 0.8,
            area: ['320px', '500px'],
            offset: '50px',
            content: ["<?php echo U('Pay/mytx');?>",'no']

        });
    }
    function GetValue(msg1,msg2) {

        var type = $('#mytx_type').val();
        var num = $("#mcliang").val();
        var moble_verify=msg1;
        var paypassword=msg2;
      //  var google=body.find('#google').val();
     //   alert(paypassword);
        if(moble_verify==''||paypassword==''){
            return false;
        }


        $.post("<?php echo U('Finance/mytxUp');?>", {
            type: type,
            coin:'zc',
            num: num,
            paypassword: paypassword,
            moble_verify: moble_verify,
        }, function (data) {
            if (data.status == 1) {
                layer.msg(data.info, {
                    icon: 1,
                    offset: '300px'
                });
                window.location.reload();
            } else {
                layer.msg(data.info, {
                    icon: 2,
                    offset: '300px'
                });
                if (data.url) {
                    window.location = data.url;
                }
            }
        }, "json");
    }
    function mytxChexiao(id) {
        $.post("<?php echo U('Finance/mytxChexiao');?>", {id: id,coin:'zc'}, function (data) {
            if (data.status == 1) {
                layer.msg(data.info, {icon: 1,offset: '300px'});
                window.location.reload();
            } else {
                layer.msg(data.info, {icon: 2,offset: '300px'});
            }
        }, "json");
    }
</script>
</body>