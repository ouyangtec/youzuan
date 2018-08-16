<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>金钻认购</title>
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
<body>
  <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont"></i>
        </a>
        <span>金钻认购</span>
  </header>
  <div class="mui-content release-buy-con">
    <ul class="release-ul">
      <li>
        <span class="writen">发行数量：</span>
        <span class="num"><?php echo ($issue['num']*1); ?></span>
      </li>
      <li>
        <span class="writen">开放时间：</span>
        <span class="num"><?php echo ($issue['time']); ?></span>
      </li>
      <li>
        <span class="writen">已认购：</span>
        <span class="num"><?php echo ($issue['deal']*1); ?></span>
      </li>
      <li>
        <span class="writen">当前阶段：</span>
        <span class="num"><?php if($zt == 1): ?>认购结束
                                    <?php else: ?>
                                    <?php if($zt == -1): ?>暂未开放
                                        <?php else: ?>
                                       认购中<?php endif; endif; ?>
        </span>
      </li>
    </ul>
    <div class="relse-buy-form">
      <form action="">
        <div class="form-group">
          <label for="">账户余额：<?php echo ($user_coin[$issue['buycoin']]*1); echo (strtoupper($issue['buycoin'])); ?></label>

        </div>
        <div class="form-group">
          <label for="">认购数量：</label>
          <input type="text" id="num" name="num">
        </div>
        <div class="form-group">
          <label for="">交易密码：</label>
          <input type="password" name="" placeholder="请输入交易密码" id="paypassword">
        </div>
        <div  style="padding-bottom:30px;padding-top: 10px">

          <a style="float: right;color:#666;font-size: .28rem" href="<?php echo U('login/findpaypwd');?>">忘记交易密码？</a>
        </div>
        <button type="button" onclick="Update()" class="buy-btn">立即认购</button>
      </form>
    </div>
    <div class="detail-box">
      <h5>详细介绍</h5>
      <ul>
        <li>
          <span class="detail-writen">售卖时间：</span>
          <span class="detail-writen1"><?php echo ($issue["time"]); ?></span>
        </li>
        <li>
          <span class="detail-writen">支付币种：</span>
          <span class="detail-writen1"><?php echo (strtoupper($issue["buycoin"])); ?></span>
        </li>
        <li>
          <span class="detail-writen">兑换币种：</span>
          <span class="detail-writen1">1 <?php echo (strtoupper($issue["coinname"])); ?> =<?php echo ($issue["price"]); ?> <?php echo (strtoupper($issue["buycoin"])); ?></span>
        </li>
        <li>
          <span class="detail-writen">售卖细节：</span>
          <span class="detail-writen1">认购周期  <?php echo ($issue["tian"]); ?>，每次认购数量<?php echo ($issue["min"]); ?>--<?php echo ($issue["max"]); echo (strtoupper($issue["coinname"])); ?>一个投资人仅限认购 <?php echo ($issue["limit"]); ?> <?php echo (strtoupper($issue["coinname"])); ?></span>
        </li>
        <li>
          <span class="detail-writen">认购进度：</span>
          <span class="detail-writen1"><?php echo ($issue['bili']); ?>%</span>
        </li>
      </ul>
    </div>
  </div>

  <script>



      function Update() {

          if ("<?php echo ($zt); ?>" != 0 )
          {
              layer.msg('不在认购期间');
              return false;
          }

          var id = "<?php echo ($issue['id']); ?>";

          var num = $('#num').val();

          var paypassword = $('#paypassword').val();

          if (num == "" || num == null) {

              layer.tips('请输入认购数量', '#num', {tips: 3});

              return false;

          }

          if (paypassword == "" || paypassword == null) {

              layer.tips('请输入交易密码', '#paypassword', {tips: 3});

              return false;

          }

          $.post("<?php echo U('Issue/upbuy');?>", {id: id, num: num, paypassword: paypassword}, function (data) {

              if (data.status == 1) {

                  layer.msg(data.info);

                  window.location.reload();

              } else {

                  layer.msg(data.info);

                  if (data.url) {

                      window.location = data.url;

                  }

              }

          }, "json");

      }

  </script>
</body>