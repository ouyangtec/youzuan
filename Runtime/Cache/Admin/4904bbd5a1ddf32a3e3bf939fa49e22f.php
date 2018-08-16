<?php if (!defined('THINK_PATH')) exit();?><!doctype html><html><head>	<meta charset="UTF-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<title>网站后台管理系统</title>	<link href="/Public/Admin/images/favicon.ico" type="image/x-icon" rel="shortcut icon">	<!-- Loading Bootstrap -->	<link href="/Public/Admin/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/default_color.css" media="all">	<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>	<script type="text/javascript" src="/Public/layer/layer.js"></script>	<link href="/Public/Admin/css/flat-ui.css" rel="stylesheet">	<script src="/Public/Admin/js/flat-ui.min.js"></script>	<script src="/Public/Admin/js/application.js"></script></head><body><div class="navbar navbar-inverse navbar-fixed-top" role="navigation">	<div class="navbar-header">		<a class="navbar-brand" style="width: 200px;text-align: center;" href="#">网站后台管理系统</a>	</div>	<div class="navbar-collapse collapse">		<ul class="nav navbar-nav">			<!-- 主导航 -->			<?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li				<?php if(($menu["class"]) == "current"): ?>class="active"<?php endif; ?>				> <a href="<?php echo (U($menu["url"])); ?>">				<?php if(empty($menu["ico_name"])): ?><span class="glyphicon glyphicon-star" aria-hidden="true"></span>					<?php else: ?>					<span class="glyphicon glyphicon-<?php echo ($menu["ico_name"]); ?>" aria-hidden="true"></span><?php endif; ?>				<?php echo ($menu["title"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>		</ul>		<ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">			<li class="dropdown">				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo session('admin_username');?><b class="caret"></b>				</a>				<ul class="dropdown-menu">					<li class="center">						<a href="/" target="_blank">							<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 前台首页 </a>					</li>					<li class="center">						<a href="javascript:void(0);" onClick="lockscreen()">							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 锁屏休息 </a>					</li>					<li>						<a href="<?php echo U('Tools/index');?>">						<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span> 清除缓存 </a>					</li>					<li>						<a href="<?php echo U('User/setpwd');?>">						<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 修改密码 </a>					</li>					<li>						<a href="<?php echo U('Login/loginout');?>">							<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出后台 </a>					</li>				</ul>			</li>		</ul>	</div><!--/.nav-collapse --></div><!-- 边栏 --><div class="sidebar">	<!-- 子导航 -->			<div id="subnav" class="subnav" style="    max-height: 94%;    overflow-x: hidden;    overflow-y: auto;    ">			<?php if(!empty($_extra_menu)): ?> <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>			<?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->				<?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>					<ul class="side-sub-menu">						<?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>								<a class="item" href="<?php echo (U($menu["url"])); ?>">									<?php if(empty($menu["ico_name"])): ?><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>										<?php else: ?>										<span class="glyphicon glyphicon-<?php echo ($menu["ico_name"]); ?>" aria-hidden="true"></span><?php endif; ?>									<?php echo ($menu["title"]); ?> </a>							</li><?php endforeach; endif; else: echo "" ;endif; ?>					</ul><?php endif; ?>				<!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>		</div>		<!-- /子导航 --></div><!-- /边栏 --><?php if(($versionUp) == "1"): ?><div id="main-contenta" class="zuocoin_up">		<div id="top-alerta" class="fixed alert alert-success" style="    position: static!important; margin-bottom: 0px;    margin: 10px;  background-color: rgba(26, 188, 156, 0.19);    ">			<button class="close fixed" style="margin-top: 2px; position: static!important; ">&times;</button>			<div class="alert-contenta">有新版本 <a href="<?php echo U('Cloud/index');?>" class="dropdown-toggle" > 立即去升级 </a></div>		</div>	</div>	<script type="text/javascript" charset="utf-8">		/**顶部警告栏*/		var top_alert = $('#top-alerta');		top_alert.find('.close').on('click', function () {			top_alert.removeClass('block').slideUp(200);			// content.animate({paddingTop:'-=55'},200);		});	</script><?php endif; ?>
<div id="main-content">
    <div id="main" class="main">
        <div class="main-title-h">
            <span class="h1-title">VIP等级管理</span>
        </div>
        <div id="top-alert" class="alert">
            <div class="alert-content" style="color: #2ecc71;font-size: 14px;">
                温馨提示:<br>
                1.不同等级请严格按照币种数量递增形式填写升级规则,否则容易造成等级错乱.<br>
                &nbsp;&nbsp;&nbsp;&nbsp;(等级越高,所需币种数量和数目肯定比前一个等级多)<br>
                2.等级设置后,运营期间请勿随意修改,否则会造成会员等级错位现象.<br>
                3.默认等级vip0,完善资料且符合vip1规则则自动升级为vip1,后续依次类推.
            </div>
        </div>
        <div class="cf">
            <div class="fl">
                <a class="btn btn-success navbar-btn btn-sm" href="<?php echo U('App/vip_config_edit');?>">新 增</a>
                <button class="btn ajax-post btn-info navbar-btn btn-sm" url="<?php echo U('App/vip_config_edit_status',array('method'=>'resume'));?>" target-form="ids">启 用</button>
                <button class="btn ajax-post btn-warning navbar-btn btn-sm" url="<?php echo U('App/vip_config_edit_status',array('method'=>'forbid'));?>" target-form="ids">禁 用</button>
                <button class="btn ajax-post confirm btn-danger navbar-btn btn-sm" url="<?php echo U('App/vip_config_edit_status',array('method'=>'delete'));?>" target-form="ids">删 除</button>
            </div>
        </div>
        <div class="data-table table-striped">
            <table class="">
                <thead>
                <tr>
                    <th class="row-selected row-selected"><input class="check-all" type="checkbox" /></th>
                    <th class="">ID</th>
                    <th class="">次序</th>
                    <th class="">VIP等级名称</th>
                    <th class="">日限次</th>
                    <th class="">奖励</th>
                    <th class="">升级规则</th>
                    <th class="">添加时间</th>
                    <th class="">状态</th>
                    <th class="">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td><input class="ids" type="checkbox" name="id[]" value="<?php echo ($vo["id"]); ?>" /></td>
                        <td><?php echo ($vo["id"]); ?></td>
                        <td><?php echo ($vo["tag"]); ?></td>
                        <td><?php echo ($vo["name"]); ?></td>
                        <td><?php echo ($vo["times"]); ?>次</td>
                        <td><?php echo ($coinMap[$vo['price_coin']]); ?>:<?php echo ($vo["price_num"]); ?>个</td>
                        <td>
                            <?php if(is_array($vo["rule"])): $i = 0; $__LIST__ = $vo["rule"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_rule): $mod = ($i % 2 );++$i; echo ($coinMap[$sub_rule['id']]); ?>:<?php echo ($sub_rule["num"]); ?>个<br><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                        <td><?php echo (addtime($vo["addtime"])); ?></td>
                        <td><?php if(($vo["status"]) == "1"): ?>可用<?php else: ?>禁用<?php endif; ?></td>
                        <td>
                            <a href="<?php echo U('App/adsblock_edit?id='.$vo['id']);?>" class="btn btn-warning btn-xs"><?php echo ($vo["name"]); ?>会员</a>
                            <a href="<?php echo U('App/vip_config_edit?id='.$vo['id']);?>" class="btn btn-primary btn-xs">编辑</a>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?> <?php else: ?>
                    <td colspan="12" class="text-center">Oh! 暂时还没有内容!</td><?php endif; ?>
                </tbody>
            </table>
            <div class="page">
                <div><?php echo ($page); ?></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //主导航高亮
    //	$('.Appads-box').addClass('current');
    //	//边导航高亮
    //	$('.Appads-index').addClass('current');
</script>
<!-- /内容区 -->






<script type="text/javascript" src="/Public/Admin/js/common.js"></script>
<script type="text/javascript">
	+function(){
		//$("select").select2({dropdownCssClass: 'dropdown-inverse'});//下拉条样式
		layer.config({
			extend: 'extend/layer.ext.js'
		});

		var $window = $(window), $subnav = $("#subnav"), url;
		$window.resize(function(){
			//$("#main").css("min-height", $window.height() - 90);
		}).resize();

		/* 左边菜单高亮 */
		url = window.location.pathname + window.location.search;

		url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
		$subnav.find("a[href='" + url + "']").parent().addClass("current");

		/* 左边菜单显示收起 */
		$("#subnav").on("click", "h3", function(){
			var $this = $(this);
			$this.find(".icon").toggleClass("icon-fold");
			$this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
			prev("h3").find("i").addClass("icon-fold").end().end().hide();
		});

		$("#subnav h3 a").click(function(e){e.stopPropagation()});

		/* 头部管理员菜单 */
		$(".user-bar").mouseenter(function(){
			var userMenu = $(this).children(".user-menu ");
			userMenu.removeClass("hidden");
			clearTimeout(userMenu.data("timeout"));
		}).mouseleave(function(){
			var userMenu = $(this).children(".user-menu");
			userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
			userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
		});

		/* 表单获取焦点变色 */
		$("form").on("focus", "input", function(){
			$(this).addClass('focus');
		}).on("blur","input",function(){
			$(this).removeClass('focus');
		});
		$("form").on("focus", "textarea", function(){
			$(this).closest('label').addClass('focus');
		}).on("blur","textarea",function(){
			$(this).closest('label').removeClass('focus');
		});

		// 导航栏超出窗口高度后的模拟滚动条
		var sHeight = $(".sidebar").height();
		var subHeight  = $(".subnav").height();
		var diff = subHeight - sHeight; //250
		var sub = $(".subnav");
		if(diff > 0){
//			$(window).mousewheel(function(event, delta){
//				if(delta>0){
//					if(parseInt(sub.css('marginTop'))>-10){
//						sub.css('marginTop','0px');
//					}else{
//						sub.css('marginTop','+='+10);
//					}
//				}else{
//					if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
//						sub.css('marginTop','-'+(diff-10));
//					}else{
//						sub.css('marginTop','-='+10);
//					}
//				}
//			});
		}
	}();

	//导航高亮
	function highlight_subnav(url){
		$('.side-sub-menu').find('a[href="'+url+'"]').closest('li').addClass('current');
	}

	function lockscreen(){
		layer.prompt({
			title: '输入一个锁屏密码',
			formType: 1,
			btn: ['锁屏','取消'] //按钮
		}, function(pass){
			if(!pass){
				layer.msg('需要输入一个密码!');
			}else{
				$.post("<?php echo U('Login/lockScreen');?>",{pass:pass},function(data){
					layer.msg(data.info);
					layer.close();
					if(data.status){
						window.location.href = "<?php echo U('Login/lockScreen');?>";
					}
				},'json');
			}
		});
	}
</script>

</body>
</html>