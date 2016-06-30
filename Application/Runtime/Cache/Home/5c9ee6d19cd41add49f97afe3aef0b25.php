<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="页面描述"/>
	<meta name="keywords" content="关键字,关键字"/>
	<meta name="robots" content="index,follow"/>
	<meta name="renderer" content="webkit">
	<title></title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/global.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/login.css"/>
</head>
<body>
<div id="top">
	<div class="top">
		<div class="top-left">
			<span>用户：</span>
			<input type="text" value="" />
			<span>密码：</span>
			<input type="text" value="" />
			<span>验证：</span>
			<input type="text" value="" />
			<img src="/Public/Home/images/yz.png" alt="验证码" />
			<a href="" class="landing">登录</a>
			<a href="/index.php/Home/user/register" class="register">注册</a>
			<a href="" class="forget">忘了密码</a>
		</div>
		<div class="top-right">
			<a href="">专题报道</a>
			<a href="">图片新闻</a>
			<a href="/index.php/Home/Communicate/Lead_mailbox">互动交流</a>
			<a href="" class="last">论坛交流</a>
		</div>
	</div>
</div>

<div id="banner">
	<div id="flash">
		<script type="text/javascript" language="javascript">swf('/Public/Home/source/Flash.swf','1000','228');</script>
		<div class="flash"></div>
	</div>
<!-- 	<div class="banner">
		<img src="/Public/Home/images/banner.gif" alt="banner">
	</div> -->
</div>

<div id="nav">
	<div class="nav">
		<div class="nav02"><a href="/index.php/Home/Index/index">首页</a>
      		<dl>
      			<dd></dd>
      		</dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Article/Dadui">大队要闻</a>
        	<dl>
        		<dd></dd>
        	</dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Article/Jiguan">机关信息</a>
        	<dl>
                <dd><a href="/index.php/Home/Article/Jiguan">训练处</a></dd>
                <dd><a href="/index.php/Home/Article/Jiguan">政治处</a></dd>
                <dd><a href="/index.php/Home/Article/Jiguan">保障处</a></dd>
            </dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Article/Jicen">基层动态</a>
        	<dl>
                <dd><a href="/index.php/Home/Article/Jicen">一营</a></dd>
                <dd><a href="/index.php/Home/Article/Jicen">二营</a></dd>
                <dd><a href="/index.php/Home/Article/Jicen">三营</a></dd>
            </dl>
        </div>
		<div class="nav02"><a href="/index.php/Home/Article/Tieqi">铁骑之声</a>
        	<dl>
        		<dd></dd>
        	</dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Article/zhengce">政策法规</a>
        	<dl>
        		<dd></dd>
        	</dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Communicate/Lead_mailbox">互动交流</a>
        	<dl>
                <dd><a href="/index.php/Home/Communicate/Lead_mailbox">首长信箱</a></dd>
                <dd><a href="">咨询留言</a></dd>
                <dd><a href="/index.php/Home/Communicate/complaint">投诉举报</a></dd>
                <dd><a href="">建言献策</a></dd>
            </dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/video/video">视频影音</a>
        	<dl>
        		<dd></dd>
        	</dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Article/Download">下载中心</a>
        	<dl>
        		<dd></dd>
        	</dl>
		</div>
		<div class="nav02"><a href="">铁骑论坛</a>
        	<dl>
        		<dd></dd>
        	</dl>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	jQuery.navlevel2 = function(level1,dytime) {
		
	  $(level1).mouseenter(function(){
		  varthis = $(this);
		  delytime=setTimeout(function(){
			varthis.find('dl').slideDown();
			varthis.addClass("on");
		},dytime);
	  });
	  $(level1).mouseleave(function(){
		 clearTimeout(delytime);
		 $(this).find('dl').slideUp();
		 $(this).removeClass("on");
	  });
	  
	};
  $.navlevel2("div.nav02",200);
});
</script>
	<div class="center-block">
		<div class="login_block cl">
			<div class="login fr">
				<div class="name">登 录</div>
				<div class="login_main">
					<input type="text" name="username" id="username" placeholder="邮箱/昵称" autocomplete="off" />
					<p>请输入您的用户名或注册邮箱</p>
					<input type="password" name="password" id="password" placeholder="请输入密码" autocomplete="off" />
					<p>请输入密码</p>
					<input type="checkbox" name="remember" id="remember"/><label for="remember">记住我（两周免登陆）</label>
					<input type="button" class="button" value="立即登录"/>
					<div class="support cl">
						<a href="" class="fl">忘记密码？</a><a href="" class="fr">新用户注册</a>
					</div>
					<p>你也可以用以下方式登录：</p>
					<div class="support2 cl">
						<a href=""><img src="/Public/Home/images/icon1.jpg"/></a>
						<a href=""><img src="/Public/Home/images/icon2.jpg"/></a>
						<a href=""><img src="/Public/Home/images/icon3.jpg"/></a>
						<a href=""><img src="/Public/Home/images/icon4.jpg"/></a>
						<a href=""><img src="/Public/Home/images/icon5.jpg"/></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" src="/Public/Home/js/jquery-1.11.3.min.js"></script>
<script>
	$('.button').click(function(){
		var account = $('#username').val();
		var password = $('#password').val();
		if(account.length>=6 && password.length>=6){
			$.post('/index.php/Home/User/login_ajax',{'account':account,'password':password},function(data){
				if(data['res'] == 0){
					$('#password').next().text('密码错误');
				}else if(data['res'] ==1){
					$('#username').next().text('用户名不存在');
				}else{
					window.location.href='/index.php/Home/Index/index';
				}
			},'json');
		}
	})
</script>