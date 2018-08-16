<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>热门大厅</title>
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
    <!-- <script src="js/textBox.min.js"></script> -->
    <script src="/Public/Home/js/main.js"></script>
</head>
<body class="gray">
    <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>交易记录</span>
    </header>
    <div class="mui-content">
        <div class="hot-hall-tab">
            <a href="javascript:void(0)" class="active">买入挂单</a>
            <a href="javascript:void(0)">卖出挂单</a>
            <a href="javascript:void(0)">已成交记录</a>
        </div>
        <p align="center" style="padding-top: .28rem;font-size: 12px;color: red">(只显示近15天的几录)</p>
        <div class="hot-tab-con">
            <table>
                <thead>
                <tr style="background-color: #ff7324;color: white">
                        <th class="first">市场</th>
                        <th>时间</th>
                        <th>个数</th>
                        <th>价格</th>
                        <th>已交易</th>
                        <th class="last">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['type']) == "1"): ?><tr>
                            <td class="first"><?php echo ($vo["market"]); ?></td>
                            <td  width="100px"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                            <td><?php echo (NumToStr($vo["num"])); ?></td>
                            <td><?php echo (NumToStr($vo["price"])); ?></td>
                            <td><?php echo (NumToStr($vo["deal"])); ?></td>
                            <td class="last"><a class="cancel" id="<?php echo ($vo['id']); ?>" href="javascript:void(0);"> 撤销</a></td>
                        </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                   <!-- <tr>
                        <td class="first">2018.6.15</td>
                        <td>10</td>
                        <td>40</td>
                         <td class="last"><a href="">撤销</a></td>
                    </tr>
                    -->
                </tbody>
            </table>
            <table style="display: none;">
                <thead>


                <tr style="background-color: #ff7324;color: white">
                        <th class="first">市场</th>
                        <th>时间</th>
                        <th>个数</th>
                        <th>价格</th>
                        <th>数量</th>
                        <th class="last">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['type']) == "2"): ?><tr>
                                <td class="first"><?php echo ($vo["market"]); ?></td>
                                <td class="first" width="100px"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                                <td><?php echo (NumToStr($vo["num"])); ?></td>
                                <td><?php echo (NumToStr($vo["price"])); ?></td>
                                <td><?php echo (NumToStr($vo["deal"])); ?></td>
                                <td class="last"><a class="cancel" id="<?php echo ($vo["id"]); ?>" href="javascript:void(0);"> 撤销</a></td>
                            </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>

                    
                </tbody>
            </table>
            <table style="display: none;" class="trans-record">
                <thead>
                    <tr style="background-color: #ff7324;color: white">
                        <th class="first">市场</th>
                        <th >时间</th>
                        <th>买方</th>
                        <th>卖方</th>
                        <th>个数</th>
                        <th>价格</th>
                      
                    </tr>
                </thead>
                <tbody>
                    <?php if(is_array($listlog)): $i = 0; $__LIST__ = $listlog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td class="first"><?php echo ($vo["market"]); ?></td>
                                <td class="first" width="100px"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                                <td>ID<?php echo (NumToStr($vo["userid"])); ?></td>
                                <td>ID<?php echo (NumToStr($vo["peerid"])); ?></td>
                                <td><?php echo (NumToStr($vo["num"])); ?></td>
                                <td><?php echo (NumToStr($vo["price"])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                   <!-- <tr>
                        <td class="first">2018.6</td>
                        <td>ID:123456</td>
                        <td>ID:123567</td>
                        <td>40</td>
                         <td>40.00</td>
                    </tr>-->
                    
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $('.hot-hall-tab a').on('click',function(){
            $(this).addClass('active').siblings('a').removeClass('active');
            $('.hot-tab-con table').eq($(this).index()).show().siblings('.hot-tab-con table').hide()
        })

        $('.cancel').click(function(){
            $.post("<?php echo U('Trade/chexiao');?>",{id : $(this).attr('id'), },function(data){
                if(data.status==1){
                    layer.msg(data.info,{icon : 1 });
                    window.setTimeout("window.location.reload()",1000);
                }else{
                    layer.msg(data.info,{icon : 2 });
                }
            });
        });

    </script>
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


</body>