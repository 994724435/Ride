<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="/Public/Admin/js/jquery-1.11.3.min.js"></script>
<link rel="stylesheet" href="/Public/Admin/css/css.css" type="text/css">
<link rel="stylesheet" href="/Public/Admin/css/default.css" />
  <link rel="stylesheet" href="/Public/Admin/css/prettify.css" />
  <link rel="stylesheet" href="/Public/Admin/css/page.css" />
  <script charset="utf-8" src="/Public/Admin/js/kindeditor.js"></script>
  <script charset="utf-8" src="/Public/Admin/js/zh_CN.js"></script>
  <script charset="utf-8" src="/Public/Admin/js/prettify.js"></script>
  <script>
    KindEditor.ready(function(K) {
      var editor1 = K.create('textarea[name="content1"]', {
        cssPath : '/Public/Admin/css/prettify.css',
        uploadJson : '/Public/Admin/php/upload_json.php',
        fileManagerJson : '/Public/Admin/php/file_manager_json.php',
        allowFileManager : true,
        afterCreate : function() {
          var self = this;
          K.ctrl(document, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
          K.ctrl(self.edit.doc, 13, function() {
            self.sync();
            K('form[name=example]')[0].submit();
          });
        }
      });
      prettyPrint();
    });
  </script>
<script type="text/javascript">
$(function(){
  $("#tip1").mouseover(
    function(){
    $(".set").finish();
    $(".set").slideDown(500);
    }
  );
});

$(function(){
  $(".set").mouseleave(
    function(){
    $(".set").finish();
    $(".set").show().delay(1000).slideUp(500);
    }
  );
});

$(document).ready(function(){
  var l = $(window).width()-218;
    $(".rightfix").css("width",l);
  $(window).resize(function(){
    $(".rightfix").css("width",$(window).width()-218);
  });
  var h = $(window).height()-105;
    $(".rightfix").css("height",h);
  $(window).resize(function(){
    $(".rightfix").css("height",$(window).height()-105);
  });
});

$(function(){
  $(".step").click(
    function(){
    $(this).next('div').finish();
    $(this).toggleClass("stepclick");
    $(this).parent().siblings('div').children('ul').slideUp(500);
    $(this).parent().siblings('div').children('p').removeClass("stepclick");
    $(this).next('ul').slideToggle(500);

    }
  );
});
</script>

<title>首页</title>
</head>
<body>
<div class="set">
  <?php if($current_admin['admin_level'] == 1): ?><a id="ch_pa1" class="circle1  show_block changePassword_block">修改密码</a><a id="addadmin1" class="circle2 show_block addAdmin_block">添加管理员</a><a id="setpower1" class="circle3 show_block changePermissions_block">设置权限</a><a id="logout1" class="circle4 show_block friendShip2_notice_block">退出系统</a>
  <?php else: ?><a id="ch_pa1" class="circle1  show_block changePassword_block">修改密码</a><a id="logout1" class="circle4 show_block friendShip2_notice_block">退出系统</a><?php endif; ?>
</div>

<div class="top">
  <div class="logo">网站后台管理系统</div>
  <div class="admin">
    <p><?php echo ($current_admin["admin_relname"]); ?></p>
    <a id="tip1">
      <?php if($current_admin['admin_level'] == 1): ?>（超级管理员）
      <?php else: ?>（普通管理员）<?php endif; ?>
    </a>
  </div>
  <a class="gotoindex" onclick="javascript:window.location.href='http://www.aiston.com'" >浏览网站</a>
  <div class="welc">您好，欢迎您登录网站后台管理平台</div>
</div>
<div class="clear"></div>
<div class="leftfix">
<?php if(is_array($n_nav)): foreach($n_nav as $key=>$val): ?><div>
    <p class="<?php echo 'step'.$val['nav_id']; ?> step" name="<?php echo ($val["nav_url"]); ?>"><?php echo ($val["nav_name"]); ?><span class="arrowL"></span><span class="arrowR"></span></p>
    <ul class="slidedown">
      <?php if(is_array($val["sid"])): foreach($val["sid"] as $key=>$value): ?><li><a href="<?php echo ($value["nav_url"]); ?>"><?php echo ($value["nav_name"]); ?></a></li><?php endforeach; endif; ?>
    </ul>
  </div><?php endforeach; endif; ?>
  
</div>

<!--文章添加-->
<div class="rightfix">
  <a class="home1"></a><a class="home_pass">产品管理</a><a href="<?php echo U('/Admin/Product/index');?>" class="home_pass">产品列表</a><a class="home_now">产品分类</a>
  <div class="clear"></div>
	  <div class="article_type_containners">
		  <form action="<?php echo U('/Admin/Product/cateDelete');?>" method="post">
		  	<div class="article_type">
		  		<div class="article_head">
		  			<div class="head_col1 f"><input type="checkbox" class="allchoose"/><label class="allchoose_text">全选</label></div>
		  			<div class="head_col2 f"><label class="top_title">标题</label></div>
		  			<div class="head_col3 f"><label class="top_title">移动</label></div>
		  			<div class="head_col4 f"><label class="top_title">操作</label></div>
		  		</div>
		  		<?php if(is_array($cate)): foreach($cate as $key=>$val): ?><div class="article_conn">
				  		<div class="aticle_content">
				  			<div class="content_col1 f"><input type="checkbox" class="choose_zi" name="idarr[<?php echo ($val['cate_id']); ?>]"/></div>
				  			<div class="content_col2 f"><input type="button" value="" class="fold" placeholder=""/><input type="text" class="edit_text" value="<?php echo ($val["cate_name"]); ?>" /></div>
				  			<div class="content_col3 f"><input type="hidden" name="cate_pid" value="<?php echo ($val["cate_id"]); ?>"><div class="mov_rang mov_top"></div><div class="mov_rang mov_s"></div><div class="mov_rang mov_x"></div><div class="mov_rang mov_bottom"></div></div>
				  			<div class="content_col4 f"><p class="operation"><span class="hid">显示</span>/<span class="edit">编辑</span>/<a href="<?php echo U('/Admin/Product/classDel',array('cate_id'=>$val['cate_id']));?>">删除</a></p></div>
				  			<div class="clear"></div>
				  		</div>

				  		<div class="aticle_zi_container">
					  		<?php if($val["sid"] != false): if(is_array($val["sid"])): foreach($val["sid"] as $key=>$v): ?><div class="aticle_content_zi1">
					  				<div class="content_col1 f"></div>
					  				<div class="content_col2 f"><input class="second_edit_text" value="<?php echo ($v["cate_name"]); ?>"></div>
					  				<div class="content_col3 f"><input type="hidden" name="cate" value="<?php echo ($v["cate_id"]); ?>"></div>
					  				<div class="content_col4 f"><p class="operation"><span class="edit">编辑</span>/<a class="delet" href="<?php echo U('/Admin/Product/classDel',array('cate_id'=>$v['cate_id']));?>">删除</a></p></div>
					  				<div class="clear"></div>	
					  			</div><?php endforeach; endif; endif; ?>
					  		<div class="aticle_content_zi">
					  			<div class="content_col1 f"></div>
					  			<div class="content_col2 f"><div class="second_rang_container"><div class="direction f"></div><input type="button" class="second_rang f" value=""/></div></div>
					  			<div class="content_col3 f"></div>
					  			<div class="content_col4 f"></div>
					  			<div class="clear"></div>
					  		</div>
				  		</div>
			  		</div><?php endforeach; endif; ?>
		  	</div>
		  	<div class="shanchu_all">
		  		<div ><input type="submit" class="delet_choose f" value="删除所选"></div>
		  		<div class="chuanjian f"></div>
		  		<p class="fold_container"><label class="zhankai">展开</label>|<label class="shouqi">收起</label></p>
		  	</div>
		  	<div class="clear chongdang"></div>
		  </form>
	  </div>
  	<div class="clear"></div>
	<!-- 权限判断 -->
    <input type="hidden" name="power" value="<?php echo ($current_admin["admin_power"]); ?>">
</div>
<script type="text/javascript">
	var adm_power = $("input[name='power']").val();
    if(adm_power.indexOf('产品分类') === -1){
    	$('.edit,.mov_rang,.chuanjian,.edit_text,.second_edit_text,.second_rang').addClass('friendShip1_notice_block show_block');
    	$('.delet_choose').addClass('friendShip1_notice_block show_block').attr('type','button');
    	$('.delet').addClass('friendShip1_notice_block show_block').attr('href','javascript:;');
	}else{
		$('.mov_rang').click(function(){
		setTimeout(function(){
			var order = [];
			$('.article_type .content_col2 .edit_text').each(function(){
				order.push($(this).val());
			});
			$.post('/Admin/Product/fir_order',{'order':order},function(data){
				if(data.cateOrder){
					return true;
				}
			},'json')
		},500)
	})
	$('.second_edit_text,.edit_text').blur(function(){
		var sec_class = $(this).val();
		var cate = $(this).parent().siblings('.content_col3').find('input').val();
		console.log(cate);
		$.post('/Admin/Product/classification',{'class':sec_class,'cate':cate},function(data){
			if(data.res){
				return true;
			}
		},'json')
	})

	$(function(){
		//显示和隐藏的控制调用
		fold_s_r();
		hid_apear();
		//文本文字消失的调用
		//删除
		delet();
		//编辑
		zhankai_hid();
		allchoos();
		add_yiji();
		child_delet();
		add_second_rank();
		move_to_xia();
		move_to_shang();
		move_to_top();
		move_to_bottom();
		position_button();
	})
	//按钮显示和隐藏的控制方法
	function fold_s_r(){
		$(".fold").click(function(){
			var zi=$(".aticle_zi_container");
			if(!zi.is(":animated")){
			var hid_text=$(this).parents(".aticle_content").children().children().children(".hid").text();
			if(hid_text=="显示"){
				$(this).parents(".aticle_content").children().children().children(".hid").text("隐藏");
				$(this).css("background","url(/Public/Admin/images/unfold.png)");
			}else{
				$(this).parents(".aticle_content").children().children().children(".hid").text("显示");
				$(this).css("background","url(/Public/Admin/images/fold.png)");
			}
		 $(this).parents(".aticle_content").next(".aticle_zi_container").slideToggle();
		 }
		})
	}
	//显示和隐藏文字的控制方法
	function hid_apear(){
		$(".hid").click(function(){
			var zi=$(".aticle_zi_container");
			if(!zi.is(":animated")){
		 var tex=$(this).html();
		 if(tex=="显示"){
		 		$(this).html("隐藏");
		 		$(this).parents(".aticle_content").children().children(".fold").css("background","url(/Public/Admin/images/unfold.png)");
		 }else{
		 		$(this).html("显示");
		 		$(this).parents(".aticle_content").children().children(".fold").css("background","url(/Public/Admin/images/fold.png)");
		 }
		 $(this).parent().parent().parent().next(".aticle_zi_container").slideToggle();
		 }
		})
	}
	//获取焦点文字消失的方法

	function delet(){
		$(".aticle_content .delet").click(function(){
			$(this).parents(".article_conn").remove().next().remove();
			position_button();
		})
	}
	//文板框的编辑功能
	//张开和收起
	function zhankai_hid(){
		$(".zhankai").click(function(){
			$(".aticle_content").slideDown();
		})
		$(".shouqi").click(function(){
			$(".aticle_content").slideUp();
			$(".aticle_zi_container").slideUp();
			$(".hid").text("显示");
		});
	}
//全选
var panduan=true;
function allchoos(){
	$(".allchoose").click(function(){    
	    if(this.checked){
			$(".article_type :checkbox").each(function(){
				this.checked=true;
			});
		}else{
			$(".article_type :checkbox").each(function(){
				this.checked=false;
			});
		}
	});
}
//删除选中
// function delete_choose(){
// 	$(".delet_choose").click(function(){
// 	$(".choose_zi").each(function(index,element){
// 		if($(element).is(":checked")){
// 			$(element).parents(".article_conn").remove();
// 		};
// 	})
// 	position_button();
// 	})
// }
//添加一级分类
function add_yiji(){
	$(".chuanjian").click(function(){
		$(".article_type").append('<div class="article_conn"><div class="aticle_content"><div class="content_col1 f"><input class="choose_zi" type="checkbox" name="idarr[<?php echo ($val['cate_id']); ?>]""/></div><div class="content_col2 f"><form method="post" action="/Admin/Product/fir_class"><input type="button" value="" class="fold" placeholder=""/><input type="text" name="fir_class" class="edit_text"/><input type="submit" value="确认" class="queren1"></form></div><div class="content_col3 f"><div class="mov_rang mov_top"></div><div class="mov_rang mov_s"></div><div class="mov_rang mov_x"></div><div class="mov_rang mov_bottom"></div></div><div class="content_col4 f"><p class="operation"><span class="hid">显示</span>/<span class="edit">编辑</span>/<span  class="delet">删除</span></p></div><div class="clear"></div></div><div class="aticle_zi_container"><div class="aticle_content_zi"><div class="content_col1 f"></div><div class="content_col2 f"><div class="second_rang_container"><div class="direction f"></div><input type="button" class="second_rang f" value=""/></div></div><div class="content_col3 f"></div><div class="content_col4 f"></div><div class="clear"></div></div></div></div>');
		diaoyong();
	})
}
function diaoyong(){
	add_second_rank();
	fold_s_r();
	hid_apear();
	delet();
	zhankai_hid();
	allchoos(); 
	delete_choose();
	child_delet();
		move_to_xia();
	move_to_shang();
	move_to_top();
	move_to_bottom();
	position_button();
	
}
//向下移动
function move_to_xia(){
	$(".mov_x").click(function(){
		position_button();
		var num=$(this).parents(".article_conn").index(".article_conn");
		var obj_onw=$(this).parents(".article_conn");
		num++;
		var obj=$(".article_conn");
		if(num<=$(".article_conn").length){
			obj.eq(num).after(obj_onw);
			position_button();
			preventDefault();
		}
	})
}
function move_to_shang(){
	$(".mov_s").click(function(){
		position_button();
		var num=$(this).parents(".article_conn").index(".article_conn");
		var obj_onw=$(this).parents(".article_conn");
		num--;
		var obj=$(".article_conn");
		if(num>=0){
		obj.eq(num).before(obj_onw);
		position_button();
		preventDefault();
		}
	})
}
function move_to_top(){
	$(".mov_top").click(function(){
		var obj_onw=$(this).parents(".article_conn");
		var obj=$(".article_conn");
		obj.eq(0).before(obj_onw);
		position_button();
	})
}
function move_to_bottom(){
	$(".mov_bottom").click(function(){
		var obj_onw=$(this).parents(".article_conn");
		var obj=$(".article_conn");
		var l=$(".obj").length;
		obj.eq(l-1).after(obj_onw);
		position_button();
	})
}
function child_delet(){
	$(".aticle_zi_container .delet").click(function(){
		$(this).parents(".aticle_content_zi1").remove();
	})
}
//添加二级
function add_second_rank(){
	$(".second_rang").click(function(){
		var cate_pid = $(this).parents('.article_conn').find("input[name='cate_pid']").val();
		$(this).parents(".aticle_zi_container").append('<div class="aticle_content_zi1"><div class="content_col1 f"></div><form method="post"><div class="content_col2 f"><input class="second_edit_text" name="sec_class"><input type="hidden" name="cate_pid" value='+cate_pid+'><input type="submit" value="确认" class="queren1"></div></form><div class="content_col3 f"></div><div class="content_col4 f"><p class="operation"><span class="edit">编辑</span>/<span  class="delet">删除</span></p></div><div class="clear"></div></div>');
		var obj1=$(this).parents(".aticle_content_zi").next(".aticle_content_zi1");
		var xian=$(this).parents(".aticle_content_zi");
		xian.before(obj1);
		child_delet();
	})
}
function position_button(){
	$(".article_conn").each(function(index,element){
		var local_obj=$(element);
		var i=local_obj.index();
		var l=$(".article_conn").length;
		if(i==1){
			$(element).children().children(".content_col3").children(".mov_top").css("background","url(/Public/Admin/images/mov_to_head_unedit.png)")
			$(element).children().children(".content_col3").children(".mov_bottom").css("background","url(/Public/Admin/images/move_to_last.png)");
			$(element).children().children(".content_col3").children(".mov_s").css("background","url(/Public/Admin/images/mov_to_prev_unedit.png)");
			$(element).children().children(".content_col3").children(".mov_x").css("background","url(/Public/Admin/images/mov_top_next.png)");
		}
		if(i==l){
			$(element).children().children(".content_col3").children(".mov_top").css("background","url(/Public/Admin/images/mov_to_head.png)")
			$(element).children().children(".content_col3").children(".mov_bottom").css("background","url(/Public/Admin/images/mov_to_last_unedit.png)");
			$(element).children().children(".content_col3").children(".mov_s").css("background","url(/Public/Admin/images/mov_to_prev.png)");
			$(element).children().children(".content_col3").children(".mov_x").css("background","url(/Public/Admin/images/mov_to_next_unedit.png)");
		}
		if(1<i&&i<l){
			$(element).children().children(".content_col3").children(".mov_top").css("background","url(/Public/Admin/images/mov_to_head.png)")
			$(element).children().children(".content_col3").children(".mov_bottom").css("background","url(/Public/Admin/images/move_to_last.png)");
			$(element).children().children(".content_col3").children(".mov_s").css("background","url(/Public/Admin/images/mov_to_prev.png)");
			$(element).children().children(".content_col3").children(".mov_x").css("background","url(/Public/Admin/images/mov_top_next.png)");
		}
	})
}
	}
	
</script>
<div class="clear"></div>
<div class="bottom">声明：系统开发版权归重庆艾斯顿文化传媒有限公司所有，翻版必究</div>

<!--修改权限弹框-->
<div class="changepower block changePermissions_block">
  	<div class="xx"></div>
  	<p class="tishi">设置权限</p>
  	<p class="adminlist">管理员列表</p>
  	<form action="<?php echo U('Admin/Index/formDelete');?>" method="post">
	  	<div class="greykuang1"><input id="allBox" type="checkbox" />全选</div><div class="greykuang2">账号</div><div class="greykuang3">称号</div><div class="greykuang4">操作</div>
      <div class='clear'></div>
      <div id="demo">
	  	<?php if(is_array($user)): foreach($user as $key=>$val): ?><div class="subbox">
		      	<div class="bkuang1"><input name="idarr[<?php echo ($val['admin_id']); ?>]" type="checkbox" value="1" /></div>
		      	<div class="bkuang2"><?php echo ($val["admin_username"]); ?></div>
		      	<div class="bkuang3"><?php if($val['admin_level']==1): ?>超级管理员<?php else: ?>管理员<?php endif; ?></div>
		      	<div class="bkuang4"><a class="a1" href="<?php echo U('/Admin/User/del','admin_id='.$val['admin_id']);?>">删除</a> /  <a adminid="<?php echo ($val["admin_id"]); ?>" class="a2  show_block setPermissions_block">权限设置</a> /  <a class="a3  changePassword_block show_block" admID="<?php echo ($val["admin_id"]); ?>">修改资料</a></div>
	    	</div>
        <div class='clear'></div><?php endforeach; endif; ?>
      </div>
	  	<div class="clear"></div>
	  	  <button type="submit" class="deleteall">删除所选</button>
        <div id="page_link"><?php echo ($ashow); ?></div>
          
	  	<div class="clear"></div>
  	</form>
  	<!-- <a class="cancle">关闭窗口</a> --><!-- <input type="submit" value="保存修改" class="makesure" /> -->
</div>

<!--修改权限弹框下的设置权限-->
<div class="changepower2 block setPermissions_block">
  	<div class="xxxx"></div>
  	<p class="tishi">设置权限</p>
  	<p class="setting">管理员列表<span id="msg6"></span><span id="msg7"></span></p>
	<div class="greykuang1"><input type="checkbox" class="check1" />全选</div><div class="greykuang2">网站栏目</div>
	<div class="scrollkuang">
    <form action="<?php echo U('/Admin/Index/add');?>" method="post" id="form">
    <?php if(is_array($n_nav)): foreach($n_nav as $key=>$val): ?><div class="bkuang1"><input type="checkbox"  class="check2"  value="<?php echo ($val["nav_name"]); ?>"/></div><div class="bkuang2"><?php echo ($val["nav_name"]); ?><span>&gt;</span></div><div class="clear"></div>
    <ul class="setslide">
	    <?php if(is_array($val["sid"])): foreach($val["sid"] as $key=>$value): ?><li class="setslidedown" style="background-image:url(/Public/Admin/images/set_up.jpg); background-position:center top; background-repeat:no-repeat;"><input type="checkbox" class="powe" name="powe[]" value="<?php echo ($value["nav_name"]); ?>" style="margin-right:15px;" /><?php echo ($value["nav_name"]); ?></li><input type="hidden" name="field_name" id="uid" value="">
	    <input type="hidden" name="new_admin_user" value=""><input type="hidden" name="new_admin_pswd" value=""><?php endforeach; endif; ?>
    </ul><?php endforeach; endif; ?>
  	</div>
	<input type="submit" value="保存修改" class="makesure" /><a class="canc">返回上一步</a>
	</form>
</div>

<!--添加管理员-->
<div class="addadmin  block addAdmin_block">
  	<div class="xx" id="tuichu14"></div>
  	<p class="tishi">添加管理员</p>
  	<div class="inputkuang">帐号名称：<input name="name" type="text" value="" id="acc" /><span id="msg3"></span></div>
  	<div class="inputkuang">设置密码：<input name="name" type="password" value="" id="psd3" /><span id="msg4"></span></div>
  	<div class="inputkuang">确认密码：<input name="name" type="password" value="" id="psd4" /><span id="msg5"></span></div>
  	<a class="next setPermissions_block show_block" id="next">下一步</a>
</div>

<!--没有权限弹框-->
<div class="nopower friendShip1_notice_block block">
  	<div class="xxx"></div>
  	<p class="tishi">友情提示</p>
  	<div class="cry">
    	<p class="p1">很遗憾，您没有该权限！</p>
    	<p class="p2">如有需要请联系超级管理员开通！！</p>
  	</div>
</div>

<!--修改密码弹框-->

<div class="changepassword  changePassword_block block">
  	<div class="xx"></div>
	<p class="tishi">修改帐号密码</p>
	<form action="<?php echo U('Admin/Index/change');?>" method="post">
	<div class="inputkuang">帐号名称：<input name="change_user" type="text" maxlength="16" value="" style="width:216px;" id="account" /><span id="msg"></span></div>
   	<div class="inputkuang">请输入现在的密码：<input name="name" type="text" maxlength="16" style="width:186px;" value="" id="psd0" /><span id="msg0"></span></div>
   	<div class="inputkuang">请输入新的密码：<input name="new_pswd" type="password" maxlength="16" value="" id="psd1" /><span id="msg1"></span></div>
    <div class="inputkuang">请再次输入新的密码：<input name="name" type="password" maxlength="16" value="" style="width:171px;" id="psd2" /><span id="msg2"></span></div>
    <input type="submit" value="确定退出" class="makesure">
  	</form>
  	<a class="cancle">取消</a>
</div>

<!--退出弹框-->
<div class="logout friendShip2_notice_block block">
  	<div class="xx"></div>
  	<p class="tishi">友情提示</p>
  	<p class="tishi1">您将要退出系统吗？确定继续退出吗？</p>
  	<a class="makesure" href="<?php echo U('Admin/User/logout');?>">确定退出</a><a class="cancle">取消</a>
</div>

<input type="hidden" name="nav" value="<?php echo ($n_nav); ?>">

<script>
  $('#account').blur(function(){
      var account = $(this).val();
      $.post('/Admin/index/account_ajax',{'account':account},function(num){
          if(num == 0){
            $('#msg').text('用户名不存在');
          }else{
            $('#msg').empty();
          }
      },'json');
      $('#psd0').blur(function(){
          var psd0 = $(this).val();
          $.post('/Admin/Index/ajax',{'psd':psd0,'acc':account},function(data){
            if(data == 0){
                $('#msg0').text('密码错误');
            }else{
                $('#msg0').empty();
            }
          },'json');
      })
    })
    $('#psd1').keyup(function(){
      var psd1 = $(this).val();
      var len1 = psd1.length;
      if(len1 < 6){
          $('#msg1').text('密码太短');
      }else{
          $('#msg1').empty();
      }
    })
    $('#psd2').keyup(function(){
      var psd2 = $(this).val();
      var len2 = psd2.length;
      if(len2 < 6){
          $('#msg2').text('密码太短');
      }else{
          $('#msg2').empty();
      }
      var psd1 = $('#psd1').val();
      if(psd1 != psd2){
          $('#msg2').text('密码不同');
      }
    })
    $('.a3').click(function(){
      var admID = $(this).attr('admID');
      $.post('/Admin/User/admin',{'admin_id':admID},function(data){
        $('#account').val(data.admin_username);
        $('#psd0').val(data.admin_password);
      },'json')
  })
  $(function(){
      $(".a1").click(function(){
        $(this).parent().parent().css("display","none");
      });
  });
 
  $("#allBox").click(function(){    
      if (this.checked){
      $("input[name='subBox']").each(function(){
        this.checked=true;
      });
    }else{
      $("input[name='subBox']").each(function(){
        this.checked=false;
      });
    }
  });
  $(function(){
      $(".bkuang2").click(function(){
      $(this).next().next('ul').finish();
      $(this).css("color","#15837e");
      $(this).siblings(".bkuang2").css("color","#767676");
      $(this).next().next('ul').siblings('ul').slideUp(500);
      $(this).next().next('ul').slideToggle(500);
      });
  });

  $(".check1").click(function(){    
      if (this.checked){
      $(".scrollkuang :checkbox").each(function(){
        this.checked=true;
      });
    }else{
      $(".scrollkuang :checkbox").each(function(){
        this.checked=false;
      })
    }
  });

  $(".check2").click(function(){    
      if (this.checked){
      $(this).parent().next().next().next().find(":checkbox").each(function(){
        this.checked=true;
      });
    }else{
      $(this).parent().next().next().next().find(":checkbox").each(function(){
        this.checked=false;
      })
    }
  });
  function findstr(str,arr){
      var b = false;
      for(var i=0;i<arr.length;i++){
        if(arr[i] == str){
            b = true;
            return b;
            break;
          }
      }
  }

    $('#next').click(function(){
      var nuna = $('#acc').val();
      var pswd = $('#psd3').val();
      $.post('/Admin/Index/prev_add',{'nuna':nuna,'pswd':pswd},function(data){
          var new_admin_user = data.admin_username;
          var new_admin_pswd = data.admin_password;
          $("input[name=new_admin_user]").val(new_admin_user);
          $("input[name=new_admin_pswd]").val(new_admin_pswd);
      },'json');
    })  

    $('#addadmin2').click(function(){
      var nuna = $('#acc').val();
      var pswd = $('#psd3').val();
      var msg2 = $('#msg2').text();
      var msg3 = $('#msg3').text();
      var msg4 = $('#msg4').text();
      var msg5 = $('#msg5').text();
      if(nuna != '' && pswd != '' && msg3 == '' && msg4 == '' && msg5 == ''){
          $('#next').addClass('setPermissions_block show_block');
      }else{
          $('#next').removeClass('setPermissions_block show_block');
      }
    })

    $('#acc,#psd3').keyup(function(){
      var nuna = $('#acc').val();
      var pswd = $('#psd3').val();
      var psd4 = $('#psd4').val();
      var msg3 = $('#msg3').text();
      var msg4 = $('#msg4').text();
      var msg5 = $('#msg5').text();
      if(nuna != '' && pswd != '' && psd4 != '' && msg3 == '' && msg4 == '' && msg5 == ''){
          $('#next').addClass('setPermissions_block show_block');
      }else{
          $('#next').removeClass('setPermissions_block show_block');
      }
    })

    $('.addAdmin_block').mouseover(function(){
      var nuna = $('#acc').val();
      var pswd = $('#psd3').val();
      var psd4 = $('#psd4').val();
      var msg3 = $('#msg3').text();
      var msg4 = $('#msg4').text();
      var msg5 = $('#msg5').text();
      if(nuna != '' && pswd != '' && psd4 != '' && msg3 == '' && msg4 == '' && msg5 == ''){
          $('#next').addClass('setPermissions_block show_block');
      }else{
        $('#next').removeClass('setPermissions_block show_block');
      }
    })

  var block_zIndex = 0;
  var ms_zIndex = -1;
  var blockName = ['changePassword_block','addAdmin_block','changePermissions_block','friendShip2_notice_block','friendShip1_notice_block','setPermissions_block'];
  $('.show_block').click(function(){
      var admin_id = $(this).attr('adminid');
      $("input[name=field_name]").val(admin_id);
      $.post('/Admin/User/admin',{'admin_id':admin_id},function(data){
          $('#msg6').text('账户：'+data.admin_username);
          if(data.admin_level == 1){
            var call = '超级管理员';
        }else{
            var call = '管理员';
        };
        $('#msg7').text('称呼：'+call);
        var pow = data.admin_power;
        var power = [];
        power = pow.split(",");
        for(i in power){
          var p = power[i];
          $('.powe').each(function(){
            if($(this).val() == p){
              $(this).attr('checked',true);
            };
          });
        };
        if(data){
          $('#form').attr('action',"<?php echo U('/Admin/Index/update');?>");
        };
        $('.setslide').each(function(){
          var s = true;

          $(this).find('.powe').each(function(i,e){
            if($(e).attr('checked') !== 'checked'){s = false};
          });
          if(s){$(this).prev().prev().prev().find('.check2').attr('checked','true')};
        });
    },'json');
  block_zIndex = block_zIndex + 2;
  ms_zIndex = ms_zIndex + 2;
  for(var i = 0;i < blockName.length;i++){
    if($(this).hasClass(blockName[i])){
      $('.'+blockName[i]+'.block').fadeIn(188);
      $('.'+blockName[i]+'.block').css('zIndex',block_zIndex);
    }
  }
  if($('body .opacitybg').length > 0){
    $('body .opacitybg').last().after("<div class='opacitybg'></div>");
  }else{
    // $('body').append("<div class='opacitybg'></div>");
  };
  $('body .opacitybg').last().css('zIndex',ms_zIndex);
  });
  $('.xx,.makesure,.cancle').click(function(){
    $(this).parent().fadeOut(188);
    // window.location.href = '/Admin/Index/index';
    $('#msg,#msg0,#msg1,#msg2,#msg3,#msg4,#msg5').text('');
    $('input[type="checkbox"]').attr('checked',false);
  });
  $('.xxx').click(function(){
     $(this).parent().fadeOut(188);
     
  })
  $('.xxxx,.canc').click(function(){
     window.location.href = "<?php echo $url; ?>";
  })
  $('#cancle').click(function(){
    window.location.href ="<?php echo $url ?>";
  })
    $('#acc').blur(function(){
      var acc = $(this).val();
      $.post('/Admin/Index/acc_ajax',{'acc':acc},function(num){
          if(num == 1){
            $('#msg3').text('用户名已存在');
          }else{
            $('#msg3').empty();
          }
      },'json');
    });
    $('#psd4').keyup(function(){
        var psd3 = $('#psd3').val();
        var psd4 = $('#psd4').val();
        if(psd3 != psd4){
          $('#msg5').text('密码不同');
        }else if(psd3 == psd4){
          $('#msg5').text('');
        }
    });
    $('#psd3').keyup(function(){
      var psd3 = $(this).val();
      var len3 = psd3.length;
      if(len3 < 6){
          $('#msg4').text('密码太短');
      }else{
          $('#msg4').empty();
      }
    });
    var t = true;
    var endPage = <?php echo $allp; ?>;
    $('.num').click(function(){

      $(this).siblings('.current').addClass('num').removeClass('current');
      $(this).addClass('current');
      var page = $(this).text();
      if(page==endPage){
        $.post('/Admin/Common/admin_page',{'page':endPage},function(data){
        if($('.current').text()==endPage){
          for(var i=0;i<data.user.length;i++){
            $('#demo .subbox:eq('+i+') .bkuang1').attr('name',"idarr['+data.user[i]['admin_id']+']");
            $('#demo .subbox:eq('+i+') .bkuang2').text(data.user[i]['admin_username']);
            if(data.user[i]['admin_level'] == 1){
              $('#demo .subbox:eq('+i+') .bkuang3').text('超级管理员');
            }else{
              $('#demo .subbox:eq('+i+') .bkuang3').text('管理员');
            };
            $('#demo .subbox:eq('+i+') .bkuang4 .a2').attr('adminid',data.user[i]['admin_id']);
            $('#demo .subbox:eq('+i+') .bkuang4 .a3').attr('admID',data.user[i]['admin_id']);
          };
          for(var n=data.user.length;n<data.num+1;n++){
            // $('#demo .subbox:eq('+n+')').remove();
            $('#demo .subbox:eq('+n+') .bkuang1').hide();
            $('#demo .subbox:eq('+n+') .bkuang2').hide();
            $('#demo .subbox:eq('+n+') .bkuang3').hide();
            $('#demo .subbox:eq('+n+') .bkuang4').hide();
          }
        }
        },'json');

      }else{
        $.post('/Admin/Common/admin_page',{'page':page},function(data){
        for(var i=0;i<data.user.length;i++){
          $('#demo .subbox:eq('+i+') .bkuang1').show().attr('name',"idarr['+data.user[i]['admin_id']+']");
          $('#demo .subbox:eq('+i+') .bkuang2').show().text(data.user[i]['admin_username']);
          if(data.user[i]['admin_level'] == 1){
            $('#demo .subbox:eq('+i+') .bkuang3').show().text('超级管理员');
          }else{
            $('#demo .subbox:eq('+i+') .bkuang3').show().text('管理员');
          };
          $('#demo .subbox:eq('+i+') .bkuang4').show();
          $('#demo .subbox:eq('+i+') .bkuang4 .a2').attr('adminid',data.user[i]['admin_id']);
          $('#demo .subbox:eq('+i+') .bkuang4 .a3').attr('admID',data.user[i]['admin_id']);
        };
        var all = data.allp-1;
        if($('.current').text()<4){
          $('.page1').text(1);$('.page2').text(2);$('.page3').text(3);$('.page4').text(4);$('.page5').text(5);
        }
        if($('.current').text()>3 && $('.current').text()<all){
          var curr = $('.current').text();
          $('.current').removeClass('current');
          var currc = parseInt(curr)+2;
          var currd = parseInt(curr)-2;
          $('.page1').text(currd);$('.page2').text(currd+1);$('.page3').text(curr).addClass('current');$('.page4').text(currc-1);$('.page5').text(currc);
          if(t){
            $('#page_link div').prepend("<a class='first listtip'>首页</a><a class='prev listtip'>上一页</a>");t = false;
            $('.prev').click(function(){
              var current = $('.current').text();
              var prevPage = parseInt(current)-1;
              $('.num').each(function(){
                var num = $(this).text();
                if(num==prevPage){
                  $(this).trigger('click');
                }
              })
            })
            $('.first').click(function(){
              $.post('/Admin/Common/admin_page',{'page':1},function(data){
                for(var i=0;i<data.user.length;i++){
                  $('#demo .subbox:eq('+i+') .bkuang1').show().attr('name',"idarr['+data.user[i]['admin_id']+']");
                  $('#demo .subbox:eq('+i+') .bkuang2').show().text(data.user[i]['admin_username']);
                  if(data.user[i]['admin_level'] == 1){
                    $('#demo .subbox:eq('+i+') .bkuang3').show().text('超级管理员');
                  }else{
                    $('#demo .subbox:eq('+i+') .bkuang3').show().text('管理员');
                  };
                  $('#demo .subbox:eq('+i+') .bkuang4').show();
                  $('#demo .subbox:eq('+i+') .bkuang4 .a2').attr('adminid',data.user[i]['admin_id']);
                  $('#demo .subbox:eq('+i+') .bkuang4 .a3').attr('admID',data.user[i]['admin_id']);
                };
                $('.page1').text(1).addClass('current');$('.page2').text(2).removeClass('current');$('.page3').text(3).removeClass('current');$('.page4').text(4).removeClass('current');$('.page5').text(5).removeClass('current');
              },'json');
            })
          }
        }
      },'json');
    }
    })
    
    $('.end').click(function(){
      $.post('/Admin/Common/admin_page',{'page':endPage},function(data){
        $('.page1').text(endPage-4).removeClass('current');$('.page2').text(endPage-3).removeClass('current');$('.page3').text(endPage-2).removeClass('current');$('.page4').text(endPage-1).removeClass('current');$('.page5').text(endPage).addClass('current');
        if($('.current').text()==endPage){
          for(var i=0;i<data.user.length;i++){
            $('#demo .subbox:eq('+i+') .bkuang1').attr('name',"idarr['+data.user[i]['admin_id']+']");
            $('#demo .subbox:eq('+i+') .bkuang2').text(data.user[i]['admin_username']);
            if(data.user[i]['admin_level'] == 1){
              $('#demo .subbox:eq('+i+') .bkuang3').text('超级管理员');
            }else{
              $('#demo .subbox:eq('+i+') .bkuang3').text('管理员');
            };
            $('#demo .subbox:eq('+i+') .bkuang4 .a2').attr('adminid',data.user[i]['admin_id']);
            $('#demo .subbox:eq('+i+') .bkuang4 .a3').attr('admID',data.user[i]['admin_id']);
          };
          for(var n=data.user.length;n<data.num+1;n++){
            $('#demo .subbox:eq('+n+') .bkuang1').hide();
            $('#demo .subbox:eq('+n+') .bkuang2').hide();
            $('#demo .subbox:eq('+n+') .bkuang3').hide();
            $('#demo .subbox:eq('+n+') .bkuang4').hide();
          }
        }
      },'json');
      if(t){
        $('#page_link div').prepend("<a class='first listtip'>首页</a><a class='prev listtip'>上一页</a>");t = false;
            $('.prev').click(function(){
              var current = $('.current').text();
              var prevPage = parseInt(current)-1;
              $('.num').each(function(){
                var num = $(this).text();
                if(num==prevPage){
                  $(this).trigger('click');
                }
              })
            })
            $('.first').click(function(){
              $.post('/Admin/Common/admin_page',{'page':1},function(data){
                for(var i=0;i<data.user.length;i++){
                  $('#demo .subbox:eq('+i+') .bkuang1').show().attr('name',"idarr['+data.user[i]['admin_id']+']");
                  $('#demo .subbox:eq('+i+') .bkuang2').show().text(data.user[i]['admin_username']);
                  if(data.user[i]['admin_level'] == 1){
                    $('#demo .subbox:eq('+i+') .bkuang3').show().text('超级管理员');
                  }else{
                    $('#demo .subbox:eq('+i+') .bkuang3').show().text('管理员');
                  };
                  $('#demo .subbox:eq('+i+') .bkuang4').show();
                  $('#demo .subbox:eq('+i+') .bkuang4 .a2').attr('adminid',data.user[i]['admin_id']);
                  $('#demo .subbox:eq('+i+') .bkuang4 .a3').attr('admID',data.user[i]['admin_id']);
                };
                $('.page1').text(1).addClass('current');$('.page2').text(2).removeClass('current');$('.page3').text(3).removeClass('current');$('.page4').text(4).removeClass('current');$('.page5').text(5).removeClass('current');
              },'json');
            })
      }
    })
    $('.next').click(function(){
      var current = $('.current').text();
      var nextPage = parseInt(current)+1;
      $('.num').each(function(){
        var num = $(this).text();
        if(num==nextPage){
          $(this).trigger('click');
        }
      })
    })
</script>
</body>
</html>