<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>推荐</title>
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
    #class1 h4{padding-top:10px;padding-bottom: 10px;}
</style>
<body>
<div class="groom-poster-bg" align="center">
    <div class="post-head clearfix">
        <a href="javaScript:history.go(-1)" class="back"><i class="iconfont">&#xe60f;</i></a>
        <a href="" class="share"><i class="iconfont">&#xe624;</i></a>
    </div>

    <div class="clearfix tab-content" id="class1"  style="padding-top: 30%;padding-left:10px;width: 300px;font-size: .28rem" >
       <!-- <div id="qrcode-wallet">
            <saon id="codeaa"></saon>
            <p id="qrcode-t" style="font-size: 22px;text-align: center;margin-top: 30px;color: red;"><?php echo (L("ndzstjm")); ?></p>
        </div>-->
        <div class="quink-wrap">
          <!--  <div class="quicklink invite-content">

                <h4>专属邀请码</h4>

                <p class="tip">这是您的专用邀请码，您可点击【复制】按钮分享给朋友，让他们注册帐号时输入您的邀请码：：</p>

                <p>

                    <input type="text" class="area" id="invite-input" value="<?php echo ($user['invit']); ?>">
                    <input type="button" value="<?php echo (L("copy")); ?>" data-clipboard-target="invite-input" onclick="copy()" class="btn-quick inviteCopyButton" id="copy_button1">

                </p>

                <script type="text/javascript">
                    function copy(){
                        var Url2=document.getElementById("invite-input");
                        Url2.select(); // 选择对象
                        document.execCommand("Copy"); // 执行浏览器复制命令

                    }
                </script>


            </div>

            <div class="quicklink invite-content">

                <h4>专属链接</h4>

                <p class="tip">这是您的专用链接，您可点击【复制】按钮，将本文粘贴并发送给您的好友：：</p>

                <p>

                    <input type="text" class="area" id="invite-inputa" value="http://<?php echo ($_SERVER['HTTP_HOST']); ?>/Login/register/?invit=<?php echo ($user['invit']); ?>">
                    <input type="button" value="<?php echo (L("copy")); ?>" data-clipboard-target="invite-inputa" onclick="copya()" class="btn-quick inviteCopyButton" id="copy_button2">

                </p>
                <script type="text/javascript">
                    function copya(){
                        var Url2=document.getElementById("invite-inputa");
                        Url2.select(); // 选择对象
                        document.execCommand("Copy"); // 执行浏览器复制命令

                    }
                </script>

            </div>-->

            <div class="quicklink invite-content">

                <h4>专属广告语</h4>

                <p class="tip">这是您的专属广告语，您可点击【复制】按钮，将本文粘贴并发送给您的好友：：</p>

                <p>

                    <textarea type="text" style="width:250px;height: 60px" class="area" id="invite-textarea"><?php echo ($C['invit_text_txt']); ?> https://<?php echo ($_SERVER['HTTP_HOST']); ?>/?invit=<?php echo ($user['invit']); ?></textarea>
                    <input type="button" value="<?php echo (L("copy")); ?>" data-clipboard-target="invite-textarea" onclick="copyea()"
                           class="btn-quick inviteCopyButton zeroclipboard-is-hover" id="copy_button3">

                </p>
                <script type="text/javascript">
                    function copyea(){
                        var Url2=document.getElementById("invite-textarea");
                        Url2.select(); // 选择对象
                        document.execCommand("Copy"); // 执行浏览器复制命令

                    }
                </script>

            </div>
        </div>
    </div>



    <div class="groom-poster-code" >
        <img src="/Upload/QRcode/<?php echo ($QR); ?>" alt="">
        <h5 style=" color: #fc600d">扫二维码注册有钻</h5>
    </div>
    <div class="invitation">
        <h4 style="margin-right: 15px">邀请码:<?php echo ($user["invit"]); ?></h4>
    </div>

</div>
<div class="groom-poster-explain">

    <h4>推荐奖</h4>
    <div class="poster-explain">
        <ul>
            <li>
                <p class="red-tit">a.签到奖：</p>
                <p>实名认证会员可每日参与签到活动，抽取蓝钻，红钻，以及金钻</p>
            </li>
            <li>
                <p class="red-tit">b.推荐奖：</p>
                <p>推荐人享有被推荐人认购金钻金额的10%现金奖励</p>
            </li>
            <li>
                <p class="red-tit">c.交易奖：</p>
                <p>推荐人永久享有被推荐人每次（热门大厅）交易金额的0.5%手续费奖励</p>
            </li>
            <li>
                <p class="red-tit">d.红钻奖：</p>
                <p>会员持有金钻数量越多，每日可领取（热门大厅）红钻机会越多</p>
            </li>
            <li>
                <p class="red-tit">e.分红奖：</p>
                <p>会员持有金钻，还可享有推荐大厅交易手续费分红。</p>
            </li>
        </ul>
    </div>
</div>
<script type="text/javascript" src="/Public/Home/js/jquery.qrcode.min.js"></script>

<script type="text/javascript" >

    $('#codeaa').qrcode({

        render: "table", //table方式

        size:200,

        text: "http://<?php echo ($_SERVER['HTTP_HOST']); ?>/Login/register/?invit=<?php echo ($user['invit']); ?>" //任意内容

    }); //任意字符串

</script>

<script type="text/javascript" src="/Public/Home/js/ZeroClipboard.min.js"></script>

<script>

    var client=new ZeroClipboard(document.getElementById("copy-button"));

    client.on("ready",function(readyEvent){

        client.on("aftercopy",function(event){

            event.target.style.display="none";

        });

    });

    ZeroClipboard.config({swfPath:'/Public/Home/js/ZeroClipboard.swf'});

    var clip=new ZeroClipboard(document.getElementById("copy"));

    var _share_title=encodeURI('邀请好友');

    var _share_content=encodeURI("<?php echo ($C['invit_text_txt']); ?>");

    var _share_url=encodeURIComponent("http://<?php echo ($_SERVER['HTTP_HOST']); ?>/?invit=<?php echo ($user['id']); ?>");

    var _share_pic='/';

    $(document).ready(function(){

        var clip1=new ZeroClipboard(document.getElementById("copy_button1"));

        var clip2=new ZeroClipboard(document.getElementById("copy_button2"));

        var clip3=new ZeroClipboard(document.getElementById("copy_button3"));

        clip1.on("copy",function(e){

            layer.msg('复制成功！',{icon:1});

        });

        clip2.on("copy",function(e){

            layer.msg('复制成功！',{icon:1});

        });

        clip3.on("copy",function(e){

            layer.msg('复制成功！',{icon:1});

        });

        $(".wlb_tsina").click(function(){

            window.open("http://v.t.sina.com.cn/share/share.php?url="+_share_url+"&title="+_share_content);

        });

        $(".wlb_douban").click(function(){

            window.open("http://www.douban.com/recommend/?url="+_share_url+"&title="+_share_content);

        });

        $(".wlb_qzone").click(function(){

            window.open("http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url="+_share_url+"&title="+_share_title+"&pics="+_share_pic+"&desc="+_share_content);

        });

    });

</script>
<script>
    $('.groom-poster-explain').css('margin-top',$('.groom-poster-bg').height()+34)
</script>
</body>