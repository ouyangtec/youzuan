<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>实名认证</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <script src="/Public/Home/js/rem.js"></script>
    <!-- <script src="js/mui.min.js"></script> -->
    <link rel="stylesheet" href="/Public/Home/css/reset.css" />
    <link href="/Public/Home/css/mui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="/Public/Home/css/main.css" />
    <link rel="stylesheet" href="/Public/Home/iconfont/iconfont.css" />
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.js"></script>

    <script src="/Public/layer/layer.js"></script>
    <!-- <script src="js/textBox.min.js"></script> -->
    <script src="/Public/Home/js/main.js"></script>
</head>
<body class="gray-body">
    <header class="common-header">
        <a href="javaScript:history.go(-1)" class="back">
            <i class="iconfont">&#xe60f;</i>
        </a>
        <span>实名认证</span>
    </header>
    <div class="mui-content">
        <div class="main-form1">
            <form action="">
                <div class="form-group">
                    <input type="text" name="truename" id="name" placeholder="姓名" value="<?php echo ($user["truename"]); ?>" >
                </div>
                 <div class="form-group">
                    <input type="text"  name="idcard" id="idcard" placeholder="身份证号" value="<?php echo ($user["idcard"]); ?>">
                </div>
                    <input type="hidden" id="zt" value="<?php echo ($zt); ?>">
                <?php if(($zt) != "1"): ?><div class="form-group-img">
                             <h6>本人身份证正面照片</h6>
                            <div class="input-img-box" onclick="F_Open_dialog('img')" id="img_area">
                                <div class="exp-img1"></div>
                            </div>

                            <input type="file" id="img" style="display: none" onchange="javascript:setImagePreview('img','result','img_area');"/>
                            <textarea name="face" id="result" rows=30 cols=300 style="display: none">123</textarea>


                        </div>
                        <div class="form-group-img">
                             <h6>本人身份证背面照片</h6>
                            <div class="input-img-box" onclick="F_Open_dialog('img2')" id="img_area2">
                                 <div class="exp-img2"></div>
                            </div>
                            <input type="file" id="img2" style="display: none" onchange="javascript:setImagePreview('img2','result2','img_area2');"/>
                            <textarea name="back" id="result2" rows=30 cols=300 style="display: none">5</textarea>
                        </div>
                        <div class="tips">*请确保照片的内容完整并清晰可见，证件必须在有效期内，仅支持jpg图片格式。文件大小在500k以下</div>
                        <button type="button" class="confirm-btn" id="sm_submit">确定</button><?php endif; ?>
            </form>
        </div>
    </div>
    <script>
       if( $('#zt').val()==1){
           $('#name').attr("readonly","readonly");
           $('#idcard').attr("readonly","readonly");
       }


        function msg(data){
            layer.msg(data,{icon:2});
        }
        function F_Open_dialog(id){
            document.getElementById(id).click();
        }
        function setImagePreview(imgs,res,area){
            var input = document.getElementById(imgs);
            var result= document.getElementById(res);
            var img_area = document.getElementById(area);
            if ( typeof(FileReader) === 'undefined' ){
                result.innerHTML = "抱歉，你的浏览器不支持 FileReader，请使用现代浏览器操作！";
                input.setAttribute( 'disabled','disabled' );
            } else {
                readFile(input,result,img_area);
    //            input.addEventListener( 'change',readFile(result,img_area),false );
            }
        }
        function readFile(input,result,img_area){
            var file = input.files[0];
            if (file.size > 500000){
                msg('图片太大，500K以下');
                return false;
            }

            //这里我们判断下类型如果不是图片就返回 去掉就可以上传任意文件
            if(!/image\/\w+/.test(file.type)){
                alert("请确保文件为图像类型");
                return false;
            }
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                result.innerHTML = this.result;
                img_area.innerHTML = '<img style="width: 206px;height: 118px" src="'+this.result+'" alt=""/>';
            }
        }

        $("#sm_submit").on('click',function () {
            var truename=$("#name").val();
            var idcard=$("#idcard").val();
            var face=$("#result").val();
            var back=$("#result2").val();
            if (truename=="" || idcard=="" || face=="" || back==""){
                msg('请检查数据是否完整');
                return false;
            }
            var reg=/(^\d{15}$)|(^\d{17}([0-9]|X|x)$)/;
            if (!reg.test(idcard)){
                msg('身份证号格式错误');
                return false;
            }
            $(this).attr('disabled',true);
            $.ajax({
               type:"post",
              url:"<?php echo U('User/nameauthhandle');?>",
              data:{truename:truename,idcard:idcard,face:face,back:back},
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
        })
    </script>
</body>