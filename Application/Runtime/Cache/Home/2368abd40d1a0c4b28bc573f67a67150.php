<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv=”X-UA-Compatible” content=”IE=8,chrome=1″ >
	<title>视频详情</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
	<script src="/Public/Home/js/flash.js"></script>

<link href="/Public/Home/css/video-js.css" rel="stylesheet">
<script src="/Public/Home/js/video.js"></script>
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
				<div class="left-title">视频详情</div>
				<div class="left-content">
					<!--<ul>
						<li><a href="">秘书处</a></li>
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
						<li class="last"><a href="">纪检处</a></li>
					</ul>-->
				</div>
			</div>

			<div class="left-nav">
				<!--<div class="left-title">最新图文</div>-->
			</div>
		</div>

		<div class="content-right">
			<div class="title">
				<a href="">首页</a> > <a href="/index.php/Home/video/video">视频列表</a> > <a href="" class="on">视频详情</a>
			</div>
			<div class="right-content">
				<h4><?php echo ($data['v_name']); ?></h4>
				<div class="ctt01"> | 作者：<?php echo ($data['v_admin']); ?> | 发表于： <?php echo ($data['v_time']); ?> </div>

				<div class="">
					<!--<img src="/Public/Home/images/vd02.jpg" alt="视频详情" />-->
					<div style="margin-left: 170px;">	
						<!--<video id="really-cool-video" class="video-js vjs-default-skin" controls
						 preload="auto" width="400" height="264" poster="http://video-js.zencoder.com/oceans-clip.png"
						 data-setup='{}'>
						  <?php if($_GET['id']){ echo "<source src='/".$_GET['id'].".mp4' type='video/mp4' /> "; }else{ echo "暂无视频"; } ?>
						 	
							<source src="http://vjs.zencdn.net/v/oceans.webm" type='video/webm'>
						    <source src="http://vjs.zencdn.net/v/oceans.ogv" type='video/ogg'>
						</video>-->
						  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="430" height="244"
						      poster="http://video-js.zencoder.com/oceans-clip.png"
						      data-setup="{}">
						    <!--<source src="monkey.mp4" type='video/mp4' />-->
						    <?php if($_GET['id']){ echo "<source src='/".$_GET['id'].".mp4' type='video/mp4' /> "; }else{ echo "暂无视频"; } ?>
						    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
						    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
						    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
						    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
						  </video>
					</div>	
				</div>

				<dl class="ddt01">
					<dt><h4 style="margin-top: 20px;">视频介绍：</h4></dt>
					<dt class="sctt01">
					<?php echo ($data['v_content']); ?>	
					</dt>
					<!--<dt class="sctt01">
						我们将推出更多的政府政工机构网站,单位网站管理系统,做中国最好,易用,安全的政工上网,政工部门信息化网站系统。应用本网站管理系立,市,县,区政工使用的网站模板、政工办公室网站系统正式版和政工法制宣传科网页模板,项目审批科网站管理系统商业版,综合管理科网划科的宣传网站，(政工监察大队)
					</dt>-->
				</dl>
			</div>
			<div class="ctt02">
				<!--<div>上一篇：<span>军队政工网站,军事网站模板下载</span></div>
				<div>下一篇：<span>军队政工网站,军事网站模板下载</span></div>			-->
			</div>
		</div>
	</div>
</div>


</body>
</html>