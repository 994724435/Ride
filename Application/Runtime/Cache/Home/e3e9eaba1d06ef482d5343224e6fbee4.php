<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv=”X-UA-Compatible” content=”IE=8,chrome=1″ >
	<title>投诉页</title>
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
			<span>用户：</span>
			<input type="text" value="" />
			<span>密码：</span>
			<input type="text" value="" />
			<span>验证：</span>
			<input type="text" value="" />
			<img src="<?php echo U('/index.php/Admin/User/verify',array());?>" id="ive" alt="" title="点击刷新" />
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
				<div class="left-title">互动交流</div>
				<div class="left-content">
					<ul>
						<li><a href="">领导信箱</a></li>
						<li><a href="">网上咨询</a></li>
						<li class="active active01"><a href="">投诉举报</a></li>
						<li class="last"><a href="">建言献策</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="content-right">
			<div class="title">
				<a href="">首页</a> > <a href="">互动交流</a> > <a href="" class="on">投诉举报</a>
			</div>
			<div class="complaint">
				<div class="complaint01">
					<h4>投诉举报对象</h4>
					<dl>
						<dd>1、党政机关的工作人员；</dd>
						<dd>2、人大机关、政协机关、审判机关、检察机关的工作人员；</dd>
						<dd>3、具有行政管理职能的事业单位的工作人员；</dd>
						<dd>4、群众团体中的机关工作人员等。 </dd>
						<dt>受理范围</dt>
						<dd>1、态度冷漠、生硬，作风蛮横、粗暴等不礼貌、不文明的作为；</dd>
						<dd>2、上班时间无正当理由脱岗、离岗，或在岗聊天、办私事等擅离职守的行为；</dd>
						<dd>3、办事拖拉、推诿扯皮、敷衍塞责、工作效率低下，无故超过办事时限等不负责任的行为；</dd>
						<dd>4、对群众提出的正当要求置之不理，可以办、应该办的事不予办理等不作为行为；</dd>
						<dd>5、不按规定程序公开、公平、公正办事等不公道、不正派行为；</dd>
						<dd>6、不给好处不办事，给了好处乱办事，或者故意拖延刁难等"吃、拿、卡、要"行为；</dd>
						<dd>7、其他不满意的行为。 </dd>
						<dt>投诉举报人应该遵守的规定</dt>
						<dd>1、 有明确的投诉举报对象；</dd>
						<dd>2、 投诉举报内容客观、真实，不得捏造或歪曲事实；</dd>
						<dd>3、 内容简明扼要，说清事实；</dd>
						<dd>4、 投诉举报人如实填写本人真实姓名、联系电话、工作单位、家庭地址，不得留下虚假信息干扰投诉举报中心日常工作。</dd>
					</dl>
					<p>投诉举报电话:XXXX-XXXXXXX 投诉举报 Wygkcn_Mail:webmaster@wygk.cn </p>
				</div>

				<div class="complaint02">
					<h4>我要写信</h4>
					<div class="cmlt01">
						<div class="fl"><span>您的姓名：</span><input type="text" /></div>
						<div class="fr"><span>联系电话：</span><input type="text" /></div>
						<div class="fl"><span>联系信箱：</span><input type="text" /></div>
						<div class="fr"><span>邮政编码：</span><input type="text" /></div>
						<div class="fl"><span>联系地址：</span><input type="text" /></div>
					</div>
					<div class="cmlt02">
						<div>
							<span>类型：</span>
							<input type="radio" checked="checked" name="Sex" value="male" /><label for="male">投诉</label><input type="radio" name="Sex" value="female" /><label for="female">举报</label>
						</div>
						<div>
							<span>主题：</span>
							<input type="text" />
						</div>
						<div>
							<span>发信内容：</span>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</div>
						<div><a href="">返回</a><button>发表</button></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


</body>
</html>