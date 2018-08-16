<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>充值</title>
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
    <a href="<?php echo U('User/index');?>" class="back">
        <i class="iconfont">&#xe60f;</i>
    </a>
    <span>充值</span>
</header>
<div class="mui-content">
    <div class="recharge-form">
        <form action="">
            <div class="form-group1">
                <label >充值金额</label>
                <div class="inp-b">
                    ￥<input type="text"  placeholder="请输入充值金额" id="money">
                </div>
            </div>
            <button type="button" class="recharge-btn" id="next">下一步</button>
        </form>
    </div>
    <div style="text-align:left;padding-left: 10px;margin-top: .4rem;padding: 0 .2rem;font-size: .22rem;color: #000;line-height: 1.8;"  >
        <div class="game-rules">
            <p class="p1">1.QQ钱包充值额度100-500，大于500元推荐使用支付宝，网银。网银转账必须选择实时到账</p>
            <p class="p1">2.请确保汇款人姓名和注册账号姓名一致</p>
            <p class="p1">3.转账后请点击已汇款。请勿违规操作。</p>

        </div>
    </div>
    <div style="padding-top: 70px">
        <div class="mui-content">
            <table class="main-table">
                <thead >
                <tr style="background-color:#ff7324;color: white" >
                    <th class="first" style="width: 1.5rem;">时间</th>
                    <th class="last">订单</th>
                    <th class="last">方式</th>
                    <th class="last" style="width: 1.0rem;">操作数量</th>
                 <!--   <th class="last">实际到账</th>-->
                    <th class="last" style="width: 1.0rem;">状态</th>
                    <th class="last">操作</th>
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
                       <td><?php echo ($v["tradeno"]); ?></td>
                       <td><?php echo ($v["type"]); ?></td>
                      <!-- <td><?php echo (strtoupper($v["m_type"])); ?></td>-->

                           <td><?php echo ((isset($v['num']) && ($v['num'] !== ""))?($v['num']):"0.00"); ?></td>



                  <!--     <td><?php echo ((isset($v['mum']) && ($v['mum'] !== ""))?($v['mum']):"0.00"); ?></td>-->
                       <td>
                           <?php if($v['name'] != mytx): if(($v["status"]) == "0"): ?>未付款
                                   <a onclick="myczHuikuan(<?php echo ($v['id']); ?>)" href="javascript:void(0)" style="    color: #2674FF!important;">已汇款</a><?php endif; ?>
                               <?php if(($v["status"]) == "1"): ?>充值成功<?php endif; ?>
                               <?php if(($v["status"]) == "2"): ?>人工到账<?php endif; ?>
                               <?php if(($v["status"]) == "3"): ?>处理中<?php endif; ?>
                               <?php else: ?>
                               <?php if(($v["status"]) == "0"): ?>已申请
                                   <a onclick="mytxChexiao(<?php echo ($v['id']); ?>)" href="javascript:void(0)" style="    color: #2674FF!important;">撤销</a><?php endif; ?>
                               <?php if(($v["status"]) == "1"): ?>提现成功<?php endif; ?>
                               <?php if(($v["status"]) == "2"): ?>已撤销<?php endif; ?>
                               <?php if(($v["status"]) == "3"): ?>正在处理<?php endif; endif; ?>
                       </td>
                       <td>
                           <?php if($v['name'] != mytx): ?><a onclick="myczChakan(<?php echo ($v['id']); ?>)" href="javascript:void(0)" class="cur" style="    color: #E55600!important;">查看</a><?php endif; ?>
                       </td>
                   </tr><?php endforeach; endif; ?>
                </tbody>

            </table>
            <div class="Pagination"><?php echo ($page); ?></div>
        </div>
    </div>
</div>
<div class="recharge-popup">
    <div class="popup-shade">
    </div>
    <div class="popup-con" id="pop-con">
        <div class="bottom-payment">
            <i class="iconfont close">&#xe635;</i>
            <span class="tit">确认付款</span>
        </div>
        <div class="money">￥0.00</div>
        <div class="order-info">
            <ul>
                <li><span class="order-left">订单信息</span>
                    <span class="order-right">充值</span>
                </li>
                <li id="pay-way">
                    <span class="order-left">付款方式</span>
                    <span class="order-right">
                        <span class="payway" value="alipay" >支付宝转账支付</span>
                        <i class="iconfont">&#xe62e;</i>
                    </span>
                </li>
            </ul>
        </div>
        <div class="pass-btn" id="prompt" onclick="myczUp()">立即付款</div>
    </div>
    <!-- 选择支付方式 -->
    <div class="popup-con select-pay-re pop" style="display: none;" id="select-pay-re">
        <div class="bottom-payment"><i class="iconfont back">&#xe647;</i><span class="tit">选择支付方式</span></div>
        <div class="order-info" id="re-pay-way1">
            <ul>
                <?php if(is_array($myczTypeList)): $i = 0; $__LIST__ = $myczTypeList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><span class="order-left"   value="<?php echo ($key); ?>" ><?php echo ($vo); ?></span><span class="order-right iconfont">&#xe601;</span></li><?php endforeach; endif; else: echo "" ;endif; ?>
               <!-- <li><span class="order-left">支付宝</span><span class="order-right iconfont">&#xe601;</span></li>
                <li><span class="order-left">微信</span><span class="order-right iconfont">&#xe601;</span></li>
                <li><span class="order-left">银行卡</span><span class="order-right iconfont">&#xe601;</span></li>-->
            </ul>
        </div>
    </div>
    <div class="pop popup-con1" style="display: none;"><!--
        <div class="pass-head">
            <i class="iconfont back" id="pass-back">&#xe647;</i>
            <h5>输入支付密码</h5>
        </div>

        <div class="mm_box">
            <form id="password">
                <input readonly="" class="pass" type="password" maxlength="1" value="" disabled="disabled">
                <input readonly="" class="pass" type="password" maxlength="1" value="" disabled="disabled">
                <input readonly="" class="pass" type="password" maxlength="1" value="" disabled="disabled">
                <input readonly="" class="pass" type="password" maxlength="1" value="" disabled="disabled">
                <input readonly="" class="pass" type="password" maxlength="1" value="" disabled="disabled">
                <input readonly="" class="pass" type="password" maxlength="1" value="" disabled="disabled">
            </form>
        </div>
        <div class="numb_box">
            <ul class="nub_ggg" id="keyboard">
                <li class="symbol"><span class="off  ">1</span></li>
                <li class="symbol"><span class="off zj_x ">2</span></li>
                <li class="symbol btn_number_"><span class="off">3</span></li>
                <li class="tab"><span class="off">4</span></li>
                <li class="symbol"><span class="off zj_x ">5</span></li>
                <li class="symbol btn_number_"><span class="off">6</span></li>
                <li class="tab"><span class="off">7</span></li>
                <li class="symbol"><span class="off zj_x ">8</span></li>
                <li class="symbol btn_number_"><span class="off ">9</span></li>
                <li class="cancle btn_number_"><span></span></li>
                <li class="symbol"><span class="off zj_x">0</span></li>
                <li class="delete lastitem"><span>删除</span></li>

            </ul>
        </div>

    --></div>
</div>
<script>

    $('#money').change();
    function clearNoNum(obj){
        obj.value = obj.value.replace(/[^\d.]/g,"");  //清除“数字”和“.”以外的字符
        obj.value = obj.value.replace(/\.{2,}/g,"."); //只保留第一个. 清除多余的
        obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");
        obj.value = obj.value.replace(/^(\-)*(\d+)\.(\d\d).*$/,'$1$2.$3');//只能输入两个小数
        if(obj.value.indexOf(".")< 0 && obj.value !=""){

            obj.value= parseFloat(obj.value);
            //以上已经过滤，此处控制的是如果没有小数点，首位不能为类似于 01、02的金额
        }
    }
    $('#money').on('blur keyup',function(){

;
        console.log($(this)[0].value);
        if (clearNoNum($(this)[0])) {
            layer.open({
                skin:'msg',
                content:'请输入正确的数字',
                time:3,
                // ania:'',
            })
            return false;
        }
    })

    $('#money').on('change',function(){
        var fla="<?php echo ($fla); ?>";
        $('#money').val($(this)[0].value+'.'+fla);

        console.log($(this)[0].value);
    })
    function myczUp() {
        $('.popup-con').hide();
        var mbTest_num = /^[1-9]{1}\d*?$/;
        var type = $('#pay-way .payway').attr('value');
        var num = $("#money").val();
        if (num == "" || num == null) {
            layer.tips('请输入充值数量', '#money', {tips: 3});
            return false;
        }
     /*   if (!mbTest_num.test(num)) {
            layer.tips('充值数量格式错误 (数字)', '#money', {tips: 3});
            return false;
        }*/

        if (type == "" || type == null) {
            layer.tips('请选择充值方式', '#mycz_type', {tips: 3});
            return false;
        }
        $.post("<?php echo U('Finance/myczUp');?>", {
            coin:'zc',
            num: num,
            type:type
        }, function (data) {
            if (data.status == 1) {
                var index=layer.open({
                    title: '充值',
                    type: 2,
                    area: ['300px', '600px'],
                    content: ["<?php echo U('Pay/mycz');?>?id=" + data.url.id, 'no'],
                    offset: '30px',
                    cancel: function(){
                        window.location.reload();
                        return false;
                    }
                });
                layer.full(index);
            } else {
                layer.msg(data.info, {icon: 2,offset: '300px',
                end:function (){
                    $('.recharge-popup').hide();
                    $('.popup-con').show();
                    $('.select-pay-re').hide()

                }
                });

                if (data.url) {
                    window.location = data.url;
                }
            }
        }, "json");
    }
    function myczHuikuan(id) {
        $.post("<?php echo U('Finance/myczHuikuan');?>", {id: id}, function (data) {
            if (data.status == 1) {
                layer.msg(data.info, {icon: 1,offset: '300px' });
                window.location.reload();
            } else {
                layer.msg(data.info, {icon: 2,offset: '300px'});
            }
        }, "json");
    }
    function myczChakan(id) {
        var index=layer.open({
            title: '充值',
            type: 2,
            area: ['300px', '600px'],
            content: ["<?php echo U('Pay/mycz');?>?id=" + id, 'no'],
            offset: '30px',
            maxmin: true
        });
        layer.full(index);
    }
    $(function(){

        $('#next').click(function() {
            if($('#money').val()!=""){
                var money='¥'+$('#money').val();
                $('.money').empty();
                $('.money').append(money);
                $('.recharge-popup').show();
            }else{
                layer.open({
                    skin:'msg',
                    content:'请输入充值金额',
                    time:3,
                })
            }

            // $('.popup-con').addClass('ania-up')
        });
        $('.close').on('click',function(){
            $('.recharge-popup').hide('fast');
        })


           /* $('.popup-con').hide()
            $('.popup-con1').show()*/



        $('#pay-way').click(function() {
            $('.popup-con').hide();
            $('.select-pay-re').show()

        });
        $('#re-pay-way1 li').on('click',function(){
            $('#re-pay-way1 li').removeClass('active');
            $(this).addClass('active');
            var $this = $(this);
            setTimeout(function(){
                $('#pay-way .payway').text($('#re-pay-way1 li.active').find('.order-left').text())
                $('#pay-way .payway').attr('value',$('#re-pay-way1 li.active').find('.order-left').attr('value'))
                $this.parents('#select-pay-re').hide();
                $('#pop-con').addClass('aina-up')
                $('#pop-con').show();

            },500);




        })
        $('#pass-back').on('click',function(){
            $(this).parents('.popup-con1').hide();
            $('#pop-con').show()
        })
        $('.back').on('click',function(){
            $(this).parents('.pop').hide();
            $('#pop-con').addClass('aina-up')
            $('#pop-con').show()
        })


        // 密码
        var character,index = 0,passwords = $('#password').get(0),check_pass_word='';
        $('#keyboard li').click(function(e) {
            if($(this).hasClass('delete')){
                $($('#password .pass').eq(--index)).val('');
                if($('#password .pass').eq(0).val()==''){
                    index = 0;
                }
                return false;
            }
            if ($(this).hasClass('symbol') || $(this).hasClass('tab')){
                character =$(this).text();
                // console.log(character)
                $('#password .pass').eq(index++).val(character);
                if($('#password .pass').eq(index).val()!=''){
                    index = 0;
                }
            }
            if($('#password .pass').eq(5).val()!='') {
                var temp_rePass_word = '';
                console.log(passwords.elements.length)
                for (var i = 0; i < passwords.elements.length; i++) {
                    temp_rePass_word +=  $(passwords.elements[i]).val();
                }
                // check_pass_word是后台接收的密码的值。
                check_pass_word = temp_rePass_word;
                //在这写ajax
                if(check_pass_word=="123456"){
                    layer.open({
                        content: '充值成功',
                        time:1000,
                        style:'font-size:.36rem;color:#0c0c0c',
                        end:function(){
                            window.location.href='person.html';
                        }
                    });

                }else{
                    layer.open({
                        content: '密码错误请重新输入'
                        ,btn: ['再次输入']
                        ,yes: function(index){
                            // location.reload();
                            layer.close(index);
                            for (var i = 0; i < passwords.elements.length; i++) {
                                $(passwords.elements[i]).val('');
                            }

                        }
                    });
                }
                // console.log(check_pass_word)
            }


        });



    })

    // 密码





</script>
</body>