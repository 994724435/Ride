<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="renderer" content="webkit">
	<meta http-equiv=”X-UA-Compatible” content=”IE=8,chrome=1″ >
	<title>注册页面</title>
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/public.css" />
	<link rel="stylesheet" type="text/css" href="/Public/Home/css/style.css" />
	<script src="/Public/Home/js/jquery-1.11.3.min.js"></script>
	<script src="/Public/Home/js/jquery.SuperSlide.2.1.1.js"></script>
	<script src="/Public/Home/js/flash.js"></script>
	<script src="/Public/Home/js/js.js"></script>
<style type="text/css">
.enroll form input[type=password] {
    width: 240px;
    height: 16px;
    padding: 2px 10px;
    border: 1px solid #b2b2b2;
    background: url(/Public/Home/images/enroll01.png) no-repeat;
    line-height: 16px;
    font-size: 12px;
    color: #b2b2b2;
}
.workplace{
    width: 260px;
    padding: 2px 10px;
    border: 1px solid #b2b2b2;
    background: url(/Public/Home/images/enroll01.png) no-repeat;
    line-height: 16px;
    font-size: 12px;
    color: #b2b2b2;
}		
</style>

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



<div id="enroll">
	<div class="enroll">
		<h4>会员注册</h4>
		<p>为了使您能正常使用本系统，请详细填写每一项资料</p>
		<form action="/index.php/Home/Common/register" method="post" >
			<div>
				<span class="erl01">用户名：</span>
				<input type="text" placeholder="请输入6-12字符，字母、字符或数字" name="name" value="" />
				<span class="name"></span>
			</div>
			<div>
				<span class="erl01">密码：</span>
				<input type="password" placeholder="请输入密码"  class="passd" name="passd" value="" />
				<span class="password"></span>
			</div>
			<div>
				<span class="erl01">验证密码：</span>
				<input type="password" placeholder="请再次输入密码" name="password" value="" />
				<span class="password"></span>
			</div>
			<div>
				<span class="erl01">提示问题：</span>
					<select class="workplace" name="question">
					  <option value ="你在那一年入伍">你在那一年入伍？</option>	
					  <option value ="你母亲的名字">你父亲的名字</option>
					  <option value ="你母亲的名字">你母亲的名字</option>
					  <option value="你小学就读的学校">你小学就读的学校</option>
					</select>
			</div>				
			<!--<div>
				<span class="erl01">提示问题：</span>
				<div class="dropdown">
					<span class="erl03"><span class="serl01">你在那一年入伍？</span><span class="serl02"></span></span>
					<ul>
						<li>你在那一年入伍</li>
						<li>你在那一年入</li>
						<li>你在那一年</li>
					</ul>
				</div>
				<script type="text/javascript">
					$(".dropdown").click(function(){
						$(this).find("ul").slideToggle();
					});
					$(".dropdown ul li").click(function(){
						var n = $(this).text();
						$(".dropdown .serl01").text(n);
					});
				</script>
			</div>-->
			<div>
				<span class="erl01">问题答案：</span>
				<input type="text"  name="answer" placeholder="请输入答案" value="" />
				<span class="erl02"></span>
			</div>
			<div>
				<span class="erl01">真实姓名：</span>
				<input type="text"  name="rel_name" placeholder="请填写您身份证上的姓名" value="" />
				<span class="erl02"></span>
			</div>
			<div>
				<span class="erl01">工作单位：</span>
					<select class="workplace" name="workplace">
					  <option value ="军机处">军机处</option>
					  <option value ="军需处">军需处</option>
					  <option value="军宣处">军宣处</option>
					</select>
			</div>			
			<div>
				<!--<span class="erl01">工作单位：</span>
				<div class="dropdown01">
					<span class="erl03"><span class="serl01">请选择工作单位</span>
					<span class="serl02"></span></span>
					<select>
					  <option value ="军机处">军机处</option>
					  <option value ="军需处">军需处</option>
					  <option value="军宣处">军宣处</option>
					</select>
					<ul>
						<li>军机处</li>
						<li>军需处</li>
						<li>军宣处</li>
					</ul>
				</div>-->
				<script type="text/javascript">
					$(".dropdown01").click(function(){
						$(this).find("ul").slideToggle();
					});
					$(".dropdown01 ul li").click(function(){
						var n = $(this).text();
						$(".dropdown01 .serl01").text(n);
					});
				</script>
			</div>
			<div>
				<span class="erl01">性 别：</span>
				<input type="radio" checked="checked" name="Sex" value="male" />
				<label for="male">男</label>
				<input type="radio" name="Sex" value="female" /><label for="female">女</label>
			</div>
			<div>
				<span class="erl01">生日：</span>
				<input type="text"  name="birthday" placeholder="请输入您的生日 如：1979/01/01" value="" />
				<span class="birthday"></span>
			</div>
			<div>
				<span class="erl01">联系电话：</span>
				<input type="text" placeholder="请输入您的联系电话" name="tel" value="" />
				<span class="tel"></span>
			</div>
			<div>
				<span class="erl01">电子邮件：</span>
				<input type="text" placeholder="请填写您的邮箱" name="email" value="" />
				<span  class="email"></span>
			</div>
			<div>
				<span class="erl01">自我介绍：</span>
				<textarea name="introduce" id="" cols="30" rows="10" placeholder="请不要超过30个字符"></textarea>
				<div class="erl04">
				<input type="checkbox" checked="checked" /><span>我已阅读并接受<a href="">版权声明</a>和<a href="">隐私保护</a>条款</span>
				</div>
			</div>
			<div class="erl05"><button class="btt">立即注册</button></div>
		</form>
	</div>
</div>
<script type="text/javascript">
// //生日验证
//$(function(){
//$(":input[name='birthday']").blur(function(){
// var birthday = $(this).val();
// var reg = /^\d{3,}$/;
//  if(reg.test(birthday)){
//         $(".birthday").text("生日正确");
//     }else{ 
//       $(".birthday").text("生日不正确");
//      }
//});
// });

 //用户名验证
  $(function(){
  $(":input[name='name']").blur(function(){
   var name = $(this).val();
   var reg =/[0-9a-zA-Z]{6,13}/;
    if(name==''){
           $(".name").text("用户名不能为空");
       }else{ 
       	if (reg.test(name)) {  
       	  $(".name").text("用户名正确");
       	}else{ 
               $(".name").text("用户名不正确");		
       	}
        
        }
  });
 });

 //密码验证
  $(function(){
  $(":input[name='password']").blur(function(){
   var password = $(this).val();
    var passd=$('.passd').val();
 
    if(passd==''|| password==''){
           $(".password").text("密码不能为空");
       }else{ 
       if(password==passd){
         $(".password").text("密码一致");
        }else{	
            $(".password").text("密码不一致");
    	  }

        }
  });
 });

//邮箱验证
 $(function(){
  $(":input[name='email']").blur(function(){
   var email = $(this).val();
   var reg = /\w+[@]{1}\w+[.]\w+/;
   if(reg.test(email)){
     $(".email").text("email合法");
   }else{	
      $(".email").text("email不合法");
   }
  });
 });
 //电话验证
  $(function(){
  $(":input[name='tel']").blur(function(){
   var tel = $(this).val();
var isPhone = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
var isMob=/^((\+?86)|(\(\+86\)))?(13[012356789][0-9]{8}|15[012356789][0-9]{8}|18[02356789][0-9]{8}|147[0-9]{8}|1349[0-9]{7})$/;
   if(isPhone.test(tel)||isMob.test(tel) ){
     $(".tel").text("电话号码合法");
   }else{	
      $(".tel").text("电话号码不合法");
   }
  });
 });

  
</script>
</body>
</html>