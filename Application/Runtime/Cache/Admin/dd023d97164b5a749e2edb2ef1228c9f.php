<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="robots" content="index,follow"/>
		<meta name="renderer" content="webkit">
		<title>艾斯顿文化传媒网站管理系统</title>
		<link rel="stylesheet" href="/Public/Admin/css/login.css" />
		<script type="text/javascript" src="/Public/Admin/js/jquery-1.11.3.min.js"></script>
		<script type="text/javascript">
				window.onload = function(){
					aDiv = function(){
						if(document.querySelectorAll){							//元素选择
							return document.querySelectorAll('.focus');
						}else if(document.getElementsByClassName){
							return document.getElementsByClassName('focus');
						}else{
							var ele = [];
							tags = document.getElementsByTagName('*');
							for(var i = 0;i < tags.length;i++){
								if(tags[i].className.indexOf('focus') != -1){
									ele.push(tags[i]);
								}
							}
							return ele;
						}
					};

					for(var i = 0;i < aDiv().length;i++){
						aDiv()[i].onclick = function(){
							for(var n = 0;n<aDiv().length;n++){
								aDiv()[n].removeAttribute('style');				//点击清除所有输入框的颜色
							}
							this.style.border = '1px solid #15847e';			//点击让当前输入框显示高亮
							this.getElementsByTagName('input')[0].focus();		//由于input点击范围较小，当点击DIV的时候即使没有点击到input也让其获得焦点
						}
					}

				};
		</script>
	</head>
	<body>
		<div class="wrapper">
			<div class="logo">
				<img src="/Public/Admin/images//login/logo.png" alt="" />
			</div>
			<div class="mid"></div>
			<div class="login_box">
				<div class="box">
					<div class="title_row">
						<div class="title fl">网站管理员登录</div>
						<div class="warning fr">请务必正确填写信息</div>
						<div class="cl"></div>
					</div>
					<form action="" method="post">
						<div class="username focus">
							<input type="text" name="username" id="username" maxlength="16" value="" autocomplete="off" placeholder="请输入您的用户名" />
						</div>
						<div class="password focus">
							<input type="password" name="password" id="password" maxlength="16" value="" autocomplete="off" placeholder="请输入您的密码" />
						</div>
						<div class="validation focus">
							<img src="<?php echo U('/index.php/Admin/User/verify',array());?>" id="ive" alt="" title="点击刷新" />
							<input type="text" name="code" id="validation" maxlength="4" autocomplete="off" value="" placeholder="请在此输入正确的答案" />
							<a href="javascript:;" id="allen">看不清，换一张</a>
						</div>
						<input type="checkbox" id="checkbox" name="autologin" /><span>下次自动登录</span>
						<input type="submit" name="login" id="login" value="立即登录"/>
					</form>
				</div>
			</div>
			<div class="cl"></div>
		</div>
		<div class="copyright">声明：系统开发版权归重庆艾斯顿文化传媒有限公司所有，翻版必究</div>
	</body>
</html>
<script>
	var ive = $('#ive')  ;
	var verifyimg = ive.attr("src");  
	ive.attr('title', '点击刷新');  
	ive.click(function(){  
    	if( verifyimg.indexOf('?')>0){  
        	$(this).attr("src", verifyimg+'&random='+Math.random());  
    	}else{  
       	 $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());  
    	}  
	});
	$('#allen').click(function(){
		$('#ive').trigger('click');
	})
</script>