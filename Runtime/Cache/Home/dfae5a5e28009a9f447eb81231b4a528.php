<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>推荐大厅</title>
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
<body class="gray">
    <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>推荐大厅</span>
    </header>
    <div class="mui-content">
        <div class="hot-hall-tab recomm-hall-tab">
            <a href="javascript:void(0)" class="active">已发布求购</a>
            <a href="javascript:void(0)">待处理订单</a>
            <a href="javascript:void(0)">已成交求购</a>
        </div>
        <div class="hot-tab-con">
            <table>
                <thead>

                <tr style="background-color: #ff7324;color: white">
                        <th>币种</th>
                        <th class="first">时间</th>
                        <th>个数</th>
                        <th>价格</th>
                        <th class="last">操作</th>
                    </tr>

                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['status']) == "0"): ?><tr>
                            <th><?php echo ($vo["name"]); ?></th>
                            <td class="first" width="100px"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                            <td><?php echo (NumToStr($vo["num"])); ?></td>
                            <td><?php echo (NumToStr($vo["price"])); ?></td>
                             <td class="last"><a class="cancel" id="<?php echo ($vo['id']); ?>" href="javascript:void(0);">撤销</a></td>
                        </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <!--  <tr>
                        <th>金钻</th>
                        <td class="first">2018.6.15</td>
                        <td>10</td>
                        <td>40</td>
                         <td class="last"><a href="">发布</a></td>
                    </tr>-->
                    
                </tbody>
            </table>
            <table style="display: none;" class="treated-order">
                <thead>
                <tr style="background-color: #ff7324;color: white">
                        <th>币种</th>
                        <th class="first">时间</th>
                        <th>详情</th>
                       <!-- <th>价格</th>-->
                        <th>买/卖</th>
                        <th>对方</th>
                        <th>附件</th>
                        <th class="last">操作</th>
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(in_array(($vo['status']), explode(',',"1,2,4,5"))): ?><tr>
                            <input type="hidden" id="id" value="<?php echo ($vo["id"]); ?>">
                            <th><?php echo ($vo["name"]); ?></th>
                            <td class="first" width="80px"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                            <td><a id="<?php echo ($vo["id"]); ?>" onclick="xq(id)">详情</a></td>
                           <!--<td><?php echo (NumToStr($vo["price"])); ?></td>-->
                            <?php if(($vo['type']) == "0"): ?><td>买</td>
                                <td>ID<?php echo ($vo["peerid"]); ?></td>
                                <td><a href="javascript:void(0)" onclick="ck()"class="look">查看</a>
                                    <textarea name="face" id="result"  style="display: none"><?php echo ($vo["img"]); ?></textarea>
                                </td>
                                <td class="last">
                                    <?php if(($vo['status']) == "1"): ?>发货中<?php endif; ?>
                                    <?php if(($vo['status']) == "2"): ?><a href="javascript:void(0)" onclick="Receive()">确认收货</a><a style="background-color: #ff7324" href="javascript:void(0)" onclick="not()">未收货</a><?php endif; ?>
                                    <?php if(($vo['status']) == "4"): ?>争议订单<?php endif; ?>
                                    <?php if(($vo['status']) == "5"): ?>客服介入<?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td>卖</td>
                                <td>ID<?php echo ($vo["userid"]); ?></td>
                                <td> <?php if(($vo['status']) == "1"): ?><a href="javascript:void(0)" onclick="F_Open_dialog('img')" id="img_area"  class="upload">上传</a>
                                    <?php else: ?><a href="javascript:void(0)" onclick="ck()" class="look">查看</a><?php endif; ?>
                                    <input type="file" id="img" style="display: none" onchange="javascript:setImagePreview('img','result','img_area');"/>
                                    <textarea name="face" id="result"  style="display: none"><?php echo ($vo["img"]); ?></textarea>
                                </td>
                                <td class="last">
                                    <?php if(($vo['status']) == "1"): ?><a href="javascript:void(0)"  onclick="send()" >确认发货</a><?php endif; ?>
                                    <?php if(($vo['status']) == "2"): ?>等待收货<?php endif; ?>
                                    <?php if(($vo['status']) == "4"): ?>争议订单<?php endif; ?>
                                    <?php if(($vo['status']) == "5"): ?>客服介入<?php endif; ?>
                                </td><?php endif; ?>

                        </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                   <!-- <tr>

                        <td class="first">金钻</td>
                        <td>2018.6.3</td>
                        <td>买</td>
                        <td>100002</td>
                        <td><a href="" class="look">查看</a></td>
                        <td class="last">确认收货</td>
                    </tr>-->
                    
                </tbody>
            </table>
            <table style="display: none;" class="trans-record">
                <thead>
                <tr style="background-color: #ff7324;color: white">
                    <th>币种</th>
                    <th class="first">时间</th>
                    <th>详情</th>
                    <!-- <th>价格</th>-->
                    <th>买/卖</th>
                    <th>对方</th>
                    <th>附件</th>
                    <th class="last">操作</th>
                      
                    </tr>
                </thead>
                <tbody>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo['status']) == "3"): ?><tr>
                            <th><?php echo ($vo["name"]); ?></th>
                            <td class="first"  width="80px"><?php echo (date("Y-m-d H:i:s",$vo["addtime"])); ?></td>
                            <td><a id="<?php echo ($vo["id"]); ?>" onclick="xq(id)">详情</a></td>
                          <!--  <td><?php echo (NumToStr($vo["num"])); ?></td>
                            <td><?php echo (NumToStr($vo["price"])); ?></td>-->
                            <?php if(($vo['type']) == "0"): ?><td>买</td>
                                <td>ID<?php echo ($vo["peerid"]); ?></td>
                            <!--    <td><a href="" class="look">查看</a></td>-->

                                <?php else: ?>
                                <td>卖</td>
                                <td>ID<?php echo ($vo["userid"]); ?></td>
                              <!--  <td><a href="javascript:void(0)" class="upload">上传</a></td>--><?php endif; ?>
                            <td><a href="javascript:void(0)" onclick="ck()"class="look">查看</a>
                                <textarea name="face"  style="display: none"><?php echo ($vo["img"]); ?></textarea>
                            </td>
                             <td class="last">已完成</td>
                        </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                  <!--  <tr>
                        <th>金钻</th>
                        <td class="first">2018.6.15</td>
                        <td>10</td>
                        <td>40</td>
                         <td class="last"><a href="">发布</a></td>
                    </tr>
                    -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function msg(data){
            layer.msg(data,{icon:2});
        }
        $('.hot-hall-tab a').on('click',function(){
            $(this).addClass('active').siblings('a').removeClass('active');
            $('.hot-tab-con table').eq($(this).index()).show().siblings('.hot-tab-con table').hide()
        })
        function xq(msg) {
            var html="";
            $.post("/Ajax/getseeklog",{id : msg},function(data){
                if(data){


                    if(data.type==1){
                        html="<div>市场:"+data['market']+"</div>"+
                            "<div>卖方:"+data['peerid']+"</div>"+
                            "<div>数量:"+data['num']+"</div>"+
                            "<div>价格:"+data['price']+"</div>"+
                            "<div>收货地址:"+data['address']+"</div>"+
                            "<div>联系方式:"+data['contact']+"</div>";
                    }else{
                        html="<div>市场:"+data['market']+"</div>"+
                            "<div>买方:"+data['userid']+"</div>"+
                            "<div>数量:"+data['num']+"</div>"+
                            "<div>价格:"+data['price']+"</div>";
                    }
                    layer.msg(html,{time: 20000,btn:'关闭'});
                  /*  layer.open({
                        type: 1 //Page层类型
                        ,area: ['300px', '500px']
                        ,title: '求购详情。'
                        ,shade: 0.6 //遮罩透明度
                        ,maxmin: true //允许全屏最小化
                        ,anim: 1 //0-6的动画形式，-1不开启
                        ,content: html
                    });*/
                }else{
                    layer.msg('错误',{icon : 2 });
                }
             },'json');
        }
        $('.cancel').click(function(){
            $.post("<?php echo U('User/seekchexiao');?>",{id : $(this).attr('id'), },function(data){
                if(data.status==1){
                    layer.msg(data.info,{icon : 1 });
                    window.setTimeout("window.location.reload()",1000);
                }else{
                    layer.msg(data.info,{icon : 2 });
                }
            });
        });

        function F_Open_dialog(id){
            document.getElementById(id).click();
        }
        function setImagePreview(imgs,res,area){
            var input = document.getElementById(imgs);
            var result= document.getElementById(res);
            var img_area = document.getElementById(area);
            if ( typeof(FileReader) === 'undefined' ){
                result.innerHTML = "抱歉，你的浏览器不支持 FileReader，请使用现代浏览器操作！";
               // input.setAttribute( 'disabled','disabled' );
            } else {
                readFile(input,result,img_area);
                //            input.addEventListener( 'change',readFile(result,img_area),false );
            }
        }
      function readFile(input,result,img_area){
            var file = input.files[0];
            if (file.size > 500000){
                msg('图片太大，5000K以下');
                return false;
            }


            //这里我们判断下类型如果不是图片就返回 去掉就可以上传任意文件
            if(!/image\/\w+/.test(file.type)){
                msg("请确保文件为图像类型");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                result.innerHTML = this.result;
                layer.open({
                    type: 1,
                    title: false,
                    maxHeight:'500px',
                    offset: ['100px', '50px'],
                    maxWidth:'300px',
                    closeBtn: 0,
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true,
                    content: '<img style="max-width: 300px;max-height: 500px" src="'+this.result+'" alt=""/>'
                });

            }
        }

        function ck() {
            var img=$("textarea[name=face]").val();
            //alert(img);
            layer.open({
                type: 1,
                title: false,
                maxHeight:'500px',
                offset: ['100px', '50px'],
                maxWidth:'300px',
                closeBtn: 0,
                skin: 'layui-layer-nobg', //没有背景色
                shadeClose: true,
                content: '<img style="max-width: 300px;max-height: 500px" src="'+img+'" alt=""/>'
            });
        }
        function Receive() {

            var id=$("#id").val();

            $.post({
                url:"<?php echo U('User/seekend');?>",
                data:{id:id},
                success:function (data) {
                    if (data.status==1){
                        layer.open({
                            content: data.info,
                            skin: 'msg',
                            style: 'background-color:black; color:#fff; border:none;',
                            end:function () {
                                location.reload();
                            }
                        });
                    }else {
                        msg(data.info);
                        $("#sm_submit").removeAttr('disabled');
                    }
                },
                error:function () {
                    msg('False');
                    $("#sm_submit").removeAttr('disabled');
                }
            })
        }
        function not() {

            var id=$("#id").val();

            $.post({
                url:"<?php echo U('User/seekend');?>",
                data:{id:id,action:"not"},
                success:function (data) {
                    if (data.status==1){
                        layer.open({
                            content: data.info,
                            skin: 'msg',
                            style: 'background-color:black; color:#fff; border:none;',
                            end:function () {
                                location.reload();
                            }
                        });
                    }else {
                        msg(data.info);
                        $("#sm_submit").removeAttr('disabled');
                    }
                },
                error:function () {
                    msg('False');
                    $("#sm_submit").removeAttr('disabled');
                }
            })
        }
        function  send() {
            var img=$("#result").val();
            var id=$("#id").val();
            if (img==""){
                msg('请上传截图');
                return false;
            }
            $.post({
                url:"<?php echo U('User/seekimg');?>",
                data:{img:img,id:id},
                success:function (data) {
                    if (data.status==1){
                        layer.open({
                            content: data.info,
                            skin: 'msg',
                            style: 'background-color:black; color:#fff; border:none;',
                            end:function () {
                                location.reload();
                            }
                        });
                    }else {
                        msg(data.info);
                        $("#sm_submit").removeAttr('disabled');
                    }
                },
                error:function () {
                    msg('False');
                    $("#sm_submit").removeAttr('disabled');
                }
            })

        }
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