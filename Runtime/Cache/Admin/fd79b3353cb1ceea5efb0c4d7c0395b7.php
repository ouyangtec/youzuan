<?php if (!defined('THINK_PATH')) exit();?><!-- 管理员用户组新增和编辑页面 -->
<!doctype html><html><head>	<meta charset="UTF-8">	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">	<title>网站后台管理系统</title>	<link href="/Public/Admin/images/favicon.ico" type="image/x-icon" rel="shortcut icon">	<!-- Loading Bootstrap -->	<link href="/Public/Admin/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/default_color.css" media="all">	<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>	<script type="text/javascript" src="/Public/layer/layer.js"></script>	<link href="/Public/Admin/css/flat-ui.css" rel="stylesheet">	<script src="/Public/Admin/js/flat-ui.min.js"></script>	<script src="/Public/Admin/js/application.js"></script></head><body><div class="navbar navbar-inverse navbar-fixed-top" role="navigation">	<div class="navbar-header">		<a class="navbar-brand" style="width: 200px;text-align: center;" href="#">网站后台管理系统</a>	</div>	<div class="navbar-collapse collapse">		<ul class="nav navbar-nav">			<!-- 主导航 -->			<?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li				<?php if(($menu["class"]) == "current"): ?>class="active"<?php endif; ?>				> <a href="<?php echo (U($menu["url"])); ?>">				<?php if(empty($menu["ico_name"])): ?><span class="glyphicon glyphicon-star" aria-hidden="true"></span>					<?php else: ?>					<span class="glyphicon glyphicon-<?php echo ($menu["ico_name"]); ?>" aria-hidden="true"></span><?php endif; ?>				<?php echo ($menu["title"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>		</ul>		<ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">			<li class="dropdown">				<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo session('admin_username');?><b class="caret"></b>				</a>				<ul class="dropdown-menu">					<li class="center">						<a href="/" target="_blank">							<span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span> 前台首页 </a>					</li>					<li class="center">						<a href="javascript:void(0);" onClick="lockscreen()">							<span class="glyphicon glyphicon-lock" aria-hidden="true"></span> 锁屏休息 </a>					</li>					<li>						<a href="<?php echo U('Tools/index');?>">						<span class="glyphicon glyphicon-leaf" aria-hidden="true"></span> 清除缓存 </a>					</li>					<li>						<a href="<?php echo U('User/setpwd');?>">						<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> 修改密码 </a>					</li>					<li>						<a href="<?php echo U('Login/loginout');?>">							<span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> 退出后台 </a>					</li>				</ul>			</li>		</ul>	</div><!--/.nav-collapse --></div><!-- 边栏 --><div class="sidebar">	<!-- 子导航 -->			<div id="subnav" class="subnav" style="    max-height: 94%;    overflow-x: hidden;    overflow-y: auto;    ">			<?php if(!empty($_extra_menu)): ?> <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>			<?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->				<?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>					<ul class="side-sub-menu">						<?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>								<a class="item" href="<?php echo (U($menu["url"])); ?>">									<?php if(empty($menu["ico_name"])): ?><span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span>										<?php else: ?>										<span class="glyphicon glyphicon-<?php echo ($menu["ico_name"]); ?>" aria-hidden="true"></span><?php endif; ?>									<?php echo ($menu["title"]); ?> </a>							</li><?php endforeach; endif; else: echo "" ;endif; ?>					</ul><?php endif; ?>				<!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>		</div>		<!-- /子导航 --></div><!-- /边栏 --><?php if(($versionUp) == "1"): ?><div id="main-contenta" class="zuocoin_up">		<div id="top-alerta" class="fixed alert alert-success" style="    position: static!important; margin-bottom: 0px;    margin: 10px;  background-color: rgba(26, 188, 156, 0.19);    ">			<button class="close fixed" style="margin-top: 2px; position: static!important; ">&times;</button>			<div class="alert-contenta">有新版本 <a href="<?php echo U('Cloud/index');?>" class="dropdown-toggle" > 立即去升级 </a></div>		</div>	</div>	<script type="text/javascript" charset="utf-8">		/**顶部警告栏*/		var top_alert = $('#top-alerta');		top_alert.find('.close').on('click', function () {			top_alert.removeClass('block').slideUp(200);			// content.animate({paddingTop:'-=55'},200);		});	</script><?php endif; ?>
<style>
	#nav li a{
		padding:0 10px;
	}

	#nav{
		margin-bottom:20px;
	}

	.child_row label{

	}

	#tab-content dt{
		height:35px;
		line-height:35px;
	}

	#tab-content dt label{
		height:35px;
		line-height:35px;
	}

	#tab-content dt input{
		height:28px;
		line-height:35px;
	}
</style>
<link href="/Public/Admin/index_css/style.css" rel="stylesheet">
<div id="main-content">
	<div id="top-alert" class="fixed alert alert-error" style="display: none;">
		<button class="close fixed" style="margin-top: 4px;">&times;</button>
		<div class="alert-content">警告内容</div>
	</div>
	<div id="main" class="main">
		<div class="main-title-h">
			<span class="h1-title">访问授权</span>
			<select name="group" class="navbar-btn  form-control select select-default select-sm" style="       height: 30px; width: 150px;min-width:150px;">
				<?php if(is_array($auth_group)): $i = 0; $__LIST__ = $auth_group;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo U('User/authAccess',array('group_id'=>$vo['id'],'group_name'=>$vo['title']));?>"
					<?php if(($vo['id']) == $this_group['id']): ?>selected<?php endif; ?>
					><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div id="tab-content" class="tab-content">
			<!-- 访问授权 -->
			<div style="display: block" class="tab-pane">
				<form action="<?php echo U('User/authAccessUp');?>" enctype="application/x-www-form-urlencoded" method="POST" class="form-horizontal auth-form">
					<?php if(is_array($node_list)): $i = 0; $__LIST__ = $node_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$node): $mod = ($i % 2 );++$i;?><dl class="checkmod">
							<dt class="hd">
								<label class="checkbox"><input class="auth_rules rules_all" type="checkbox" name="rules[]" value="<?php echo $main_rules[$node['url']] ?>"><?php echo ($node["title"]); ?>管理</label>
							</dt>
							<dd class="bd">
								<?php if(isset($node['child'])): if(is_array($node['child'])): $i = 0; $__LIST__ = $node['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><div class="rule_check">
											<label class="checkbox"
											<?php if(!empty($child['tip'])): ?>title='<?php echo ($child["tip"]); ?>'<?php endif; ?>
											>
											<input class="auth_rules" type="checkbox" name="rules[]" value="<?php echo $auth_rules[$child['url']] ?>"/><?php echo ($child["title"]); ?></label>
											<?php if(!empty($child['operator'])): ?><span class="divsion">&nbsp;</span>
                                           <span class="child_row">
                                               <?php if(is_array($child['operator'])): $i = 0; $__LIST__ = $child['operator'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$op): $mod = ($i % 2 );++$i;?><label class="checkbox"
	                                               <?php if(!empty($op['tip'])): ?>title='<?php echo ($op["tip"]); ?>'<?php endif; ?>
	                                               >
	                                               <input class="auth_rules" type="checkbox" name="rules[]" value="<?php echo $auth_rules[$op['url']] ?>"/><?php echo ($op["title"]); ?></label><?php endforeach; endif; else: echo "" ;endif; ?>
                                           </span><?php endif; ?>
										</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</dd>
						</dl><?php endforeach; endif; else: echo "" ;endif; ?>
					<input type="hidden" name="id" value="<?php echo ($this_group["id"]); ?>"/>
					<button type="submit" class="btn submit-btn ajax-post" target-form="auth-form">确 定</button>
					<button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
				</form>
			</div>
			<!-- 成员授权 -->
			<div class="tab-pane"></div>
			<!-- 分类 -->
			<div class="tab-pane"></div>
		</div>
	</div>
</div>

	<script type="text/javascript" src="/Public/Admin/js/qtip/jquery.qtip.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/Public/Admin/js/qtip/jquery.qtip.min.css" media="all">
	<script type="text/javascript" charset="utf-8">
		+function ($) {
			var rules = [<?php echo ($this_group["rules"]); ?>]
			;
			$('.auth_rules').each(function () {
				if ($.inArray(parseInt(this.value, 10), rules) > -1) {
					$(this).prop('checked', true);
				}
				if (this.value == '') {
					$(this).closest('span').remove();
				}
			});

			//全选节点
			$('.rules_all').on('change', function () {
				$(this).closest('dl').find('dd').find('input').prop('checked', this.checked);
			});
			$('.rules_row').on('change', function () {
				$(this).closest('.rule_check').find('.child_row').find('input').prop('checked', this.checked);
			});

			$('.checkbox').each(function () {
				$(this).qtip({
					content: {
						text: $(this).attr('title'),
						title: $(this).text()
					},
					position: {
						my: 'bottom center',
						at: 'top center',
						target: $(this)
					},
					style: {
						classes: 'qtip-dark',
						tip: {
							corner: true,
							mimic: false,
							width: 10,
							height: 10
						}
					}
				});
			});

			$('select[name=group]').change(function () {
				location.href = this.value;
			});
			//导航高亮
		}(jQuery);


		$('button:not([type="submit"])').on('click', function (e) {
			var $this = $(this);

			if (!!$this.attr('data-radiocheck-check')) {
				var el = $this.attr('data-radiocheck-check');
				$(el).radiocheck('check');
			} else if (!!$this.attr('data-radiocheck-uncheck')) {
				var el = $this.attr('data-radiocheck-uncheck');
				$(el).radiocheck('uncheck');
			} else if (!!$this.attr('data-radiocheck-toggle')) {
				var el = $this.attr('data-radiocheck-toggle');
				$(el).radiocheck('toggle');
			} else if (!!$this.attr('data-radiocheck-indeterminate')) {
				var el = $this.attr('data-radiocheck-indeterminate');
				$(el).radiocheck('indeterminate');
			} else if (!!$this.attr('data-radiocheck-determinate')) {
				var el = $this.attr('data-radiocheck-determinate');
				$(el).radiocheck('determinate');
			} else if (!!$this.attr('data-radiocheck-disable')) {
				var el = $this.attr('data-radiocheck-disable');
				$(el).radiocheck('disable');
			} else if (!!$this.attr('data-radiocheck-enable')) {
				var el = $this.attr('data-radiocheck-enable');
				$(el).radiocheck('enable');
			} else if (!!$this.attr('data-radiocheck-destroy')) {
				var el = $this.attr('data-radiocheck-destroy');
				$(el).radiocheck('destroy');
			} else if (!!$this.attr('data-radiocheck-init')) {
				var el = $this.attr('data-radiocheck-init');
				$(el).radiocheck();
			}

			e.preventDefault();
		});
	</script>







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

	<script type="text/javascript" charset="utf-8">
		//导航高亮
		highlight_subnav("<?php echo U('User/auth');?>");
	</script>