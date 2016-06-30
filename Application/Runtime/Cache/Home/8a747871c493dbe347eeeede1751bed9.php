<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv=”X-UA-Compatible” content=”IE=8,chrome=1″ >
	<title>详情页</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
	<script src="/Public/Home/js/flash.js"></script>

</head>
<body>
<div id="top">
	<div class="top">
		<div class="top-left">
			<?php if($user=='admin1'): ?><p style="margin-left: 30px;margin-top: 3px;;"><span style="color: red;"><?php echo ($user); ?></span> 您 好 <span id="">
            	<a href="/index.php/Home/Index/header" style="color: red;">我的邮箱</a></span>
                           <span id="">
            	<a href="/index.php/Home/Common/tuichu" style="color: red;">退出</a></span>
            </p>
            <?php elseif($user=='admin2' ): ?>
               <p style="margin-left: 30px;margin-top: 3px;;"><span style="color: red;"><?php echo ($user); ?></span> 您 好 <span id="">
            	<a href="/index.php/Home/Index/jiwei" style="color: red;">我的邮箱</a></span>
               <span id="">
            	<a href="/index.php/Home/Common/tuichu" style="color: red;">退出</a></span>
               </p>
             <?php elseif($user!='' ): ?>
            <p style="margin-left: 30px;margin-top: 3px;;"><span style="color: red;"><?php echo ($user); ?></span> 您 好 <span id="">
            	<a href="/index.php/Home/Index/header" style="color: red;">我的邮箱</a></span>
                           <span id="">
            	<a href="/index.php/Home/Common/tuichu" style="color: red;">退出</a></span>
            </p>
			<?php else: ?>
			<form action="/index.php/Home/Common/login" method="post">
				<span>用户：</span>
				<input type="text" value="" name="name"/>
				<span>密码：</span>
				<input type="password" value="" name="pass"/>
				<span>验证：</span>
				<input type="text" value="" name="code"/>
				<img src="<?php echo U('/index.php/Home/Common/verify',array());?>" id='ive' />
				<input type="submit" value="登录" />
				<a href="/index.php/Home/user/register" style="none"><input type="button" value="注册" /></a> 

				<!--<a href="/index.php/Home/user/register" style="background-color:darkgray;"><p>注册</p></a>-->
				<!--<a href='/index.php/Home/user/register' class='register' style="display: inline-block;margin-top:-10px;height: 30px;line-height: 30px;" >注册</a>-->
			</form><?php endif; ?>
		</div>
		<div class="top-right">
			<!--<a href="/index.php/Home/Article/Dadui">专题报道</a>
			<a href="/index.php/Home/Article/Jiguan">图片新闻</a>
			<a href="/index.php/Home/Communicate/Lead_mailbox">互动交流</a>
			<a href="" class="last">论坛交流</a>--> 
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
                <dd><a href="/index.php/Home/Article/zhengzhi">政治处</a></dd>
                <dd><a href="/index.php/Home/Article/baozhang">保障处</a></dd>
            </dl>
		</div>
		<div class="nav02"><a href="/index.php/Home/Article/Jicen">基层动态</a>
        	<dl>
                <dd><a href="/index.php/Home/Article/Jicen">一营</a></dd>
                <dd><a href="/index.php/Home/Article/erying">二营</a></dd>
                <dd><a href="/index.php/Home/Article/sanying">三营</a></dd>
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
                <dd><a href="/index.php/Home/Communicate/jiwei">纪委信箱 </a></dd>
                <dd><a href="/index.php/Home/Communicate/suggest">建言献策</a></dd>
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
		<div class="nav02"><a href="/BBS" target="_blank">铁骑论坛</a>
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



<div id="content">
	<div class="content">
		<div class="content-left-nav">
			<div class="left-nav">
				<div class="left-title">处室信息</div>
				<div class="left-content">
					<ul>
						<!--<li><a href="">秘书处</a></li>
						<li><a href="">组织处</a></li>
						<li class="active"><a href="">干部人事处</a>
							<dl>
								<dd><a href="">政工研究</a></dd>
								<dd><a href="" class="on">政工简讯</a></dd>
								<dd><a href="">群众工作</a></dd>
								<dd class="last"><a href="">司法信访</a></dd>
							</dl>
						</li>
						<li><a href="">宣传处</a></li>
						<li><a href="">保卫处</a></li>
						<li class="last"><a href="">纪检处</a></li>-->
						<li><a href="/index.php/Home/Article/Dadui">大队要闻</a></li>
						<li><a href="/index.php/Home/Article/Jiguan">机关信息</a></li>
						<li><a href="/index.php/Home/Article/Jicen">基层动态</a></li>
						<li><a href="/index.php/Home/Article/Tieqi">铁骑之声</a></li>
						<li><a href="/index.php/Home/Article/zhengce">政策法规</a></li>
						<li class="last"><a href="/index.php/Home/Article/Download">下载中心</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="content-right">
			<div class="title">
				<a href="">首页</a> ><a href="" class="on">铁骑之声</a>
			</div>
			<div class="right-content">
				<h4><?php echo ($data["tg_theme"]); ?></h4>
				<div class="ctt01">  作者：<span style="clolor:red"><?php echo ($data["tg_name"]); ?></span>| 发表于： <?php echo ($data["tg_addtime"]); ?> </div>
				<dl style="text-align: center;">
                   <?php echo ($data["tg_content"]); ?>
				</dl>
			</div>
			<!--<div class="ctt02">
				<div>上一篇：<span><a href="/index.php/Home/Article/Details/artid/<?php echo $data['art_id']-1; ?>" style="color: red;">军队政工网站,军事网站模板下载</a> </span></div>
				<div>下一篇：<span><a href="/index.php/Home/Article/Details/artid/<?php echo $data['art_id']+1; ?>" style="color: red;">军队政工网站,军事网站模板下载</a></span></div>			
			</div>-->
		</div>
	</div>
</div>


</body>
</html>