<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<div id="main-content">
    <div id="top-alert" class="fixed alert alert-error" style="display: none;">
        <button class="close fixed" style="margin-top: 4px;">&times;</button>
        <div class="alert-content">警告内容</div>
    </div>
    <div id="main" class="main">
        <div class="main-title-h">
            <span class="h1-title">财产统计</span>
        </div>
        <div class="tab-wrap">
            <div class="tab-content">
                <form id="form" class="form-horizontal">
                    <div id="tab" class="tab-pane in tab">
                        <div class="form-item cf">
                            <table>
                                <tr class="controls">
                                    <td class="item-label">用户id :</td>
                                    <td><?php echo ($data['userid']); ?></td>
                                    <td class="item-note"></td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label">用户名 :</td>
                                    <td><?php echo ($data['username']); ?> </td>
                                    <td class="item-note"></td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label">统计币种 :</td>
                                    <td><?php echo ($data['coinname']); ?></td>
                                    <td class="item-note"></td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label"></td>
                                    <td></td>
                                    <td class="item-note"> </td>
                                </tr>


                                <tr class="controls">
                                    <td class="item-label">正常余额 :</td>
                                    <td><?php echo ($data['zhengcheng']); ?></td>
                                    <td class="item-note">用户账户里面实际余额</td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label">冻结余额 :</td>
                                    <td><?php echo ($data['dongjie']); ?></td>
                                    <td class="item-note">用户账户里面实际余额</td>
                                </tr>

                                <tr class="controls">
                                    <td class="item-label">总计余额 :</td>
                                    <td><?php echo ($data['zongji']); ?></td>
                                    <td class="item-note">  用户账户里面实际余额</td>
                                </tr>

                                <tr class="controls">
                                    <td class="item-label"></td>
                                    <td></td>
                                    <td class="item-note"> </td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label">累计充值人民币 :</td>
                                    <td><?php echo ($data['chongzhicny']); ?></td>
                                    <td class="item-note">用户转入到网站的</td>
                                </tr>


                                <tr class="controls">
                                    <td class="item-label">累计提现人民币 :</td>
                                    <td><?php echo ($data['tixiancny']); ?></td>
                                    <td class="item-note">用户从网站转出的</td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label">提现冻结人民币 :</td>
                                    <td><?php echo ($data['tixiancnyd']); ?></td>
                                    <td class="item-note">用户从网站转出的</td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label"></td>
                                    <td></td>
                                    <td class="item-note"> </td>
                                </tr>
                                <tr class="controls">
                                    <td class="item-label">累计转入虚拟币 :</td>
                                    <td><?php echo ($data['chongzhi']); ?></td>
                                    <td class="item-note">用户转入到网站的</td>
                                </tr>


                                <tr class="controls">
                                    <td class="item-label">累计转出虚拟币 :</td>
                                    <td><?php echo ($data['tixian']); ?></td>
                                    <td class="item-note">用户从网站转出的</td>
                                </tr>

                                <tr class="controls">
                                    <td class="item-label"></td>
                                    <td></td>
                                    <td class="item-note">以上数据仅供参考 </td>
                                </tr>


                            </table>
                        </div>
                    </div>
                </form>
                <script type="text/javascript">
                    //提交表单
                    $('#submit').click(function () {
                        $('#form').submit();
                    });
                </script>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //搜索功能
    $(function () {
        $('#search').click(function () {
            $('#formSearch').submit();
        });
    });
    //回车搜索
    $(".search-input").keyup(function (e) {
        if (e.keyCode === 13) {
            $("#search").click();
            return false;
        }
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
        highlight_subnav("<?php echo U('User/coin');?>");
    </script>