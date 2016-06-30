<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<!-- <meta http-equiv="X-UA-Compatible" content="IE=8" > 使用IE8 -->
	<meta >
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/index.css" />
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
	<div class="remind"><div></div></div>
	<div class="content">
		<div class="content-left">
			<div class="clt01">

				<div class="sclt01">
					<div id="slideBox" class="slideBox01">
					    <div class="hd">
					        <ul><li></li><li></li><li></li><li></li></ul>
					    </div>
					    <div class="bd">
					        <ul>
					            <li><a href="" target="">
						            <img src="/Public/Home/images/lunbo01.jpg" alt="" />
						            <span><p>习主席视察集团军部队发表重要讲话</p></span>
					            </a></li>
					            <li><a href="" target="">
						            <img src="/Public/Home/images/lunbo02.jpg" alt="" />
						            <span><p>大队新训工作全面展开</p></span>
					            </a></li>
					            <li><a href="" target="">
						            <img src="/Public/Home/images/lunbo03.jpg" alt="" />
						            <span><p>官兵对车辆模型进行参观了解车辆构造</p></span>
					            </a></li>
					            <li><a href="" target="">
						            <img src="/Public/Home/images/lunbo04.jpg" alt="" />
						            <span><p>大队着力建设网络军网颇有成效</p></span>
					            </a></li>
					        </ul>
					    </div>
					</div>
					<script type="text/javascript">
						jQuery(".slideBox01").slide({mainCell:".bd ul",autoPlay:true});
					</script>  
				</div>

				<div class="sclt02">
					<div><a href="/index.php/Home/Article/Dadui" style="color: #ffffff;">大队要闻</a></div>
					<ul>
	                  <?php if(is_array($data10)): foreach($data10 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>								
					</ul>
				</div>

			</div>

			<div class="clt02"><img src="/Public/Home/images/clt02.jpg" alt=""></div>

			<div class="clt03" style="border: none;">
				<div class="clt-left03 fl">
					<div class="public">
						<h3 class="fl"><a href="/index.php/Home/Article/Jiguan" style=";color: #ffffff;height: 400px;">机关信息</a></h3>
					    <a href="/index.php/Home/Article/Jiguan" class="fr"><span>more</span><span class="ss01">》</span></a>
					</div>
					<ul>
	                   <?php if(is_array($data4)): foreach($data4 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>						


					</ul>
				</div>

				<div class="clt-left03 fr" >
					<div class="public" >
						<h3 class="fl"><a href="/index.php/Home/Article/shizheng" style="color: #ffffff;height: 400px;">时政要闻</a></h3>
						<a href="/index.php/Home/Article/shizheng" class="fr"><span>more</span><span class="ss01">》</span></a>
					</div>
					<ul>
	                  <?php if(is_array($data5)): foreach($data5 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>	
					</ul>
				</div>
			</div>
			
			<div style="border-bottom: 2px solid #e62422;overflow: hidden;">
				<div class="clt-left03 fl mt" >
					<div class="public">
						<h3 class="fl"><a href="/index.php/Home/Article/jianbao" style="color: #ffffff;">工作简报</a></h3>
						<a href="/index.php/Home/Article/jianbao" class="fr"><span>more</span><span class="ss01">》</span></a>
					</div>
					<ul>
	                  <?php if(is_array($data6)): foreach($data6 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>	
						<div><input type="hidden" name="" id="" value="12" /></div>
						<div><input type="hidden" name="" id="" value="12" /></div>
					</ul>
				</div>
				<div class="clt-left03 fr mt" >
					<div class="public">
						<h3 class="fl"><a href="/index.php/Home/Article/Jicen" style="color: #ffffff;">基层动态</a></h3>
						<a href="/index.php/Home/Article/Jicen" class="fr"><span>more</span><span class="ss01">》</span></a>
					</div>
					<ul>
	                  <?php if(is_array($data7)): foreach($data7 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>							
					</ul>
				</div>
			</div>
<div style="clear: both;"></div>
			<div class="clt04" >
			<div class="picScroll-left">
				<div class="hd">
					<a class="next"></a>
					<a class="prev"></a>
				</div>
				<div class="bd">
					<ul class="picList">
					  <?php if(is_array($banner)): foreach($banner as $key=>$val): ?><li>
							<div class="pic"><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>"><img src="<?php echo ($val["art_thumb"]); ?>" /></a></div>
							<div class="title"><?php echo ($val["art_title"]); ?></div>
						</li><?php endforeach; endif; ?>		
					</ul>
				</div>
			</div>
			<script type="text/javascript">
				jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:false,vis:4,trigger:"click"});
			</script>
			</div>

			<div class="clt05">
				<div class="clt-left03 fl">
					<div class="public">
						<h3 class="fl"><a href="/index.php/Home/Article/Tieqi" style="color: #ffffff;">铁骑之声</a></h3>
						<a href="/index.php/Home/Article/Tieqi" class="fr"><span>more</span><span class="ss01">》</span></a>
					</div>
					<ul>
	                  <?php if(is_array($data8)): foreach($data8 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>							
					</ul>
				</div>

				<div class="clt-left03 fr">
					<div class="public">
						<!--<h3 class="fl">政策法规</h3>-->
						<h3 class="fl"><a href="/index.php/Home/Article/zhengce" style="color: #ffffff;">政策法规</a></h3>
						<a href="/index.php/Home/Article/zhengce" class="fr"><span>more</span><span class="ss01">》</span></a>
					</div>
					<ul>
	                  <?php if(is_array($data9)): foreach($data9 as $key=>$val): ?><li><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>">
								<div class="fl ss02"><em>■</em><?php echo ($val["art_title"]); ?></div>
								<div class="fr ss03"><?php echo ($val["art_addtime"]); ?></div>
							</a></li><?php endforeach; endif; ?>							
					</ul>
				</div>
			</div>

		</div>

		<div class="content-right">
			<!--<div class="crt01">
				<h4><span>专题学习</span></h4>
				<?php if(is_array($data19)): foreach($data19 as $key=>$val): ?><p style="margin-top:5px ;"><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>" style="color: black;">★<?php echo ($val["art_title"]); ?></a></p><?php endforeach; endif; ?>	
			</div>-->

			<div class="crt01">
				<h4><span>专题学习</span></h4>
				<a href=""><img src="/Public/Home/images/crt02.jpg" alt=""></a>
				<a href=""><img src="/Public/Home/images/crt02.jpg" alt=""></a>
				<a href=""><img src="/Public/Home/images/crt02.jpg" alt=""></a>
			</div>

			
			<div class="crt01">
				<h4><span>报刊链接 </span></h4>
			<p style="margin-top:2px ;"><a href="" style="color: black;"><img src="/Public/Home/images/crt02.jpg" alt="" /></a></p>
			<p style="margin-top:2px ;"><a href="" style="color: black;"><img src="/Public/Home/images/crt02.jpg" alt="" /></a></p>
			<p style="margin-top:2px ;"><a href="" style="color: black;"><img src="/Public/Home/images/crt02.jpg" alt="" /></a></p>
			<p style="margin-top:2px ;"><a href="" style="color: black;"><img src="/Public/Home/images/crt02.jpg" alt="" /></a></p>
			<!--<p style="margin-top:5px ;"><a href="" style="color: black;">★报刊链接2</a></p>
			<p style="margin-top:5px ;"><a href="" style="color: black;">★报刊链接3</a></p>
			<p style="margin-top:5px ;"><a href="" style="color: black;">★报刊链接4</a></p>-->

			</div>

			<div class="crt01" style="margin-top: 25px;">
				<h4><span>通知公告</span></h4>
				<?php if(is_array($data11)): foreach($data11 as $key=>$val): ?><p style="margin-top:5px ;"><a href="/index.php/Home/Article/Details/artid/<?php echo ($val["art_id"]); ?>" style="color: black;">★<?php echo ($val["art_title"]); ?></a></p><?php endforeach; endif; ?>	
				
		
			</div>
			<div class="crt03">
				<h4><span>训练视频</span></h4>
				<!--<video width="320" height="240" controls autoplay>
                   <source src="/Public/Home/source/demo.mp4" type="video/mp4">
								</video>-->
				<!--<video width="320" height="240" controls>
				  <source src="/Public/Home/source/demo.mp4" type="video/mp4">
				  <object data="/Public/Home/source/demo.mp4" width="320" height="240">
				  </object> 
				</video>				-->
			<!--<img src="/Public/Home/images/crt03.png" alt="">-->
			<!--视频二 <video id="really-cool-video" class="video-js vjs-default-skin" controls
			 preload="auto" width="300" height="164" poster="http://video-js.zencoder.com/oceans-clip.png"
			 data-setup='{}'>
			 	<source src="/monkey.mp4" type='video/mp4' />
				<source src="http://vjs.zencdn.net/v/oceans.webm" type='video/webm'>
			    <source src="http://vjs.zencdn.net/v/oceans.ogv" type='video/ogg'>
			</video>-->
  <video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="230" height="144"
      poster="http://video-js.zencoder.com/oceans-clip.png"
      data-setup="{}">
    <source src="/monkey.mp4" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
    <track kind="captions" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
    <track kind="subtitles" src="demo.captions.vtt" srclang="en" label="English"></track><!-- Tracks need an ending tag thanks to IE9 -->
  </video>
		</div>
		<div style="clear: both;"></div>
		    <div class="crt04" >
				<h4><span>其他栏目</span></h4>
				<div><span class="scrt01"></span><span class="scrt02"><a href="/index.php/Home/Communicate/Lead_mailbox" style="color: #64c085;">首长信箱</a></span></div>
				<div><span class="scrt03"></span><span class="scrt02"><a href="/index.php/Home/Communicate/jiwei" style="color: #64c085;">纪委信箱</a></span></div>
				<!--<div><span class="scrt04"></span><span class="scrt02"><a href="/index.php/Home/Communicate/complaint" style="color: #64c085;">投诉举报</a></span></div>-->
				<div><span class="scrt05"></span><span class="scrt02"><a href="/index.php/Home/Communicate/suggest" style="color: #64c085;">建议献策</a></span></div>
		     </div>
	</div>

</div>




<div id="footer">
	<div class="footer">
		<p><a>|人民网</a> <a>|新华网</a><a> |中国网</a><a> | 央视</a><a>|国际</a>  <a>| 中国日</a>报国际在线<a> | 中青网</a><a>| 中国经济网 </a><a>| 光明日报<a> |中华新闻传媒网<a> | 中新网<a> | 新浪网<a> | 环球网<a> | 搜狐网<a> | 中青在线 
|中国长城网</a><a>| 中国评论通讯社</a> <a>| 全军考试中心 </a><a>| 科技日报</a> <a>| 法制日报</a> <a>| 猫扑网</a> <a>| 中国网络媒体论坛</a><a> | 华夏经纬</a><a> | 海峡之声网</a><a>中国政府网</a><a> | 中央党校学习时报</a><a>
中国公众科技网</a> <a>|河北国防教育网 </a><a>| 东方网</a><a> | 南方网<a/><a> | 千龙网</a> <a>| 新桂网</a><a> | 中国广播网</a> <a>| 人民公安报</a><a> | 中国台湾网 </a><a>| 工人日报</a> <a>| 农民日报</a><a> | 中国联通</a><a> | TOM</a></p>
	</div>
</div>

</body>
</html>