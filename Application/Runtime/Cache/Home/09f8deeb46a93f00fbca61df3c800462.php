<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv=”X-UA-Compatible” content=”IE=8,chrome=1″ >
	<title>视频列表</title>
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
				<div class="left-title">影音视频</div>
				<div class="left-content">
					<!--<ul>
						<li><a href="">一月训练视频</a></li>
						<li><a href="">二月训练视频</a></li>
						<li class="active active01"><a href="">三月训练视频</a></li>
						<li><a href="">四月训练视频</a></li>
						<li><a href="">五月训练视频</a></li>
						<li class="last"><a href="">六月训练视频</a></li>
					</ul>-->
				</div>
			</div>

		</div>

		<div class="content-right">
			<div class="title title01">
				<a href="/index.php/Home/Index/index">首页</a> > <a href="/index.php/Home/video/video">影音视频</a> > <a href="" class="on">大队视频</a>
				<a href="" class="last">more 》</a>
			</div>

			<div class="video-list">
				<div class="vlt01 fl">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[0]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[0]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[0]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[0]['v_time']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[1]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[1]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[1]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[1]['v_time']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[2]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[2]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[2]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[2]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[3]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[3]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[3]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[3]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[4]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[4]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[4]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[4]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[5]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[5]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[5]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[5]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[6]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[6]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[6]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[6]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[7]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[7]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[7]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[7]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[8]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[8]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[8]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[8]['v_atime']); ?></span>
						</div>
					</div>
				</div>
				<div class="vlt01 fl">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[9]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[9]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[9]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[9]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[10]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[10]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[10]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[10]['v_atime']); ?></span>
						</div>
					</div>
				</div>

				<div class="vlt01 fl ml">
					<a href="/index.php/Home/video/video_details/id/<?php echo ($data[11]['v_id']); ?>"><img src="/Public/Home/images/vd01.jpg" alt="视频" /></a>
					<div>
						<p><?php echo ($data[11]['v_name']); ?></p>
						<div>
							<span class="fl">发布人：<i><?php echo ($data[11]['v_admin']); ?></i></span>
							<span class="fr"><?php echo ($data[8]['v_atime']); ?></span>
						</div>
					</div>
				</div>

			</div>

			<div class="paging">
				<span><span></span></span>
				<ul>
					<li>1</li>
					<li>2</li>
					<li>3</li>
					<li class="on">4</li>
					<li>5</li>
					<li class="nb">...</li>
					<li>10</li>
					<li>20</li>
					<li>30</li>
				</ul>
				<span><span class="paging-right"></span></span>
				<button>跳转</button>
				<input type="text" />
				<span class="last01">页</span>
			</div>
		</div>
	</div>
</div>


</body>
</html>