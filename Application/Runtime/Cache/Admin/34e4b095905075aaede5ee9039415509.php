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


<div class="rightfix">
  <a class="home1"></a><a class="home_pass">产品管理</a><a class="home_now">产品列表</a>
  <div class="clear"></div>
  <div class="article_list" style="width:980px;">
    <div class="title">
      <div class="span">选择分类</div>
      <div id="dd" class="wrapper-dropdown-3" tabindex="1">
        <span style="color:#e2e1e1;"><?php if($cid != 0): echo ($cate["cate_name"]); else: ?>未分类<?php endif; ?></span>
      	<ul class="dropdown">
          <li><a onclick="javascript:window.location.href='<?php echo U('/Admin/Product/index');?>'">未分类</a></li>
          <?php if(is_array($acate)): foreach($acate as $key=>$val): ?><li><a onclick="javascript:window.location.href='<?php echo U('/Admin/Product/index',array('cid'=>$val['cate_id']));?>'"><?php echo ($val["cate_name"]); ?></a></li><?php endforeach; endif; ?>
      	</ul>
      </div>
      <div id="aa" class="wrapper-dropdown-3" tabindex="1">
        <span style="color:#e2e1e1;"><?php if($cid && $sid){echo $ccate['cate_name'];}else{echo "未分类";} ?></span>
        <?php if($cid != 0): ?><ul class="dropdown">
            <li><a onclick="javascript:window.location.href='<?php echo U('/Admin/Product/index',array('cid'=>$cate['cate_id']));?>'">未分类</a></li>
            <?php if(is_array($scate)): foreach($scate as $key=>$val): ?><li><a onclick="javascript:window.location.href='<?php echo U('/Admin/Product/index',array('cid'=>$cate['cate_id'],'sid'=>$val['cate_id']));?>'"><?php echo ($val["cate_name"]); ?></a></li><?php endforeach; endif; ?>
          </ul>
        <?php else: ?>
          <ul class="dropdown">
            <li><a onclick="javascript:window.location.href='<?php echo U('/Admin/Product/index',array('cid'=>$cate['cate_id']));?>'">未分类</a></li>
          </ul><?php endif; ?>
      </div>
      <form class="allen" action="<?php echo U('/Admin/Product/index');?>"> 
          <button type="submit"><span class="glyphicon glyphicon-search"></span></button>
          <input type="text" value="" class="search" placeholder="输入关键字搜索" name="q" id="searchBox" >
      </form>
      <div class="clear"></div>
    </div>
    <form action="<?php echo U('Admin/Product/formDelete');?>" style="margin:20px 20px;" method="post">
      <table>
        <tr class="table_title">
          <td class="table1"><input id="allbox1" type="checkbox" />全选</td>
          <td class="table4">标题</td>
          <td class="table2">操作</td>
          <td class="table3">顺序</td>
          <td class="table3">分类</td>
        </tr>
        <div class="clear"></div>
        <?php if(is_array($news)): foreach($news as $key=>$value): ?><tr class="table_list">
          <td class="table1"><input type="checkbox" value="<?php echo ($value['pro_id']); ?>" name="idarr[]"/></td>
          <td class="table4"><?php echo ($value["pro_name"]); ?></td>
          <td div class="table2">
          <?php if($value['pro_isshow'] == 1): ?><a class="aa1" href="javascript:;" isshow="1" artID="<?php echo ($value["pro_id"]); ?>" style="display:inline">隐藏</a><a href="javascript:;" class="aa4" isshow="0" artID="<?php echo ($value["pro_id"]); ?>" style="display:none" >显示</a>
              <?php else: ?><a class="aa1" href="javascript:;" isshow="0" artID="<?php echo ($value["pro_id"]); ?>" style="display:none">隐藏</a><a href="javascript:;" class="aa4" isshow="0" artID="<?php echo ($value["pro_id"]); ?>" style="display:inline" >显示</a><?php endif; ?> /  <a href="<?php echo U('/Admin/Product/editor',array('aid'=>$value['pro_id']));?>" class="aa2">编辑</a> /  <a href="<?php echo U('/Admin/Product/delete',array('aid'=>$value['pro_id']));?>" class="aa3">删除</a>/<a class="pinglun" href="<?php echo U('/Admin/Product/comment',array('pid'=>$value['pro_id']));?>"><?php if($value['mentNum']){echo "评论(".$value['mentNum'].")";}else{echo "评论(0)";} ?></a></td>
          <td class="table3"><input type="text" value="<?php echo ($value["pro_order"]); ?>" artID="<?php echo ($value["pro_id"]); ?>" class="order"/></td>
          <td class="table3"><?php echo ($value["cate_name"]); ?></td>
        </tr>
        <div class="clear"></div><?php endforeach; endif; ?>
      </table>
      <div class="pagelist">
          <button type="submit" class="delete">删除所选</button><a class="save">保存修改</a>
          <div class="pagenum"><?php echo ($show); ?></div>
        </div>
      </form>
    </div>
  </div>
      <!-- 权限判断 -->
      <input type="hidden" name="power" value="<?php echo ($current_admin["admin_power"]); ?>">
      
      <script type="text/javascript">
        var adm_power = $("input[name='power']").val();
        if(adm_power.indexOf('产品列表') === -1){
          $('.order,.aa1,.aa4').addClass('friendShip1_notice_block show_block');
          $('.aa2,.aa3,.pinglun').addClass('friendShip1_notice_block show_block').attr('href','javascript:;');
          $('.delete').addClass('friendShip1_notice_block show_block').attr('type','button'); 
        }else{
          var oldOrder;
          $('.order').focus(function(){
            oldOrder = $(this).val();
          })
          console.log(oldOrder);
          $('.order').blur(function(){
            var order = $(this).val();
            var id = $(this).attr('artID');
            $.post('/Admin/Product/order',{'oldOrder':oldOrder,'order':order,'id':id},function(data){
              // console.log(data);
              if(!data){
                return false;
              }  
            },'json');
          })
          $('.aa4').click(function(){
            var show = $(this).attr('isshow');
            var id = $(this).attr('artID');
            $.post('/Admin/Product/isshow',{'show':show,'id':id},function(data){
              if(data == false){
                return false;
              }
            },'json')
          })
          $('.aa1').click(function(){
            var show = $(this).attr('isshow');
            var id = $(this).attr('artID');
            $.post('/Admin/Product/isshow',{'show':show,'id':id},function(data){
              if(data == false){
                return false;
              }
            },'json')
          });
          $(function(){
            $(".aa1").click(
              function(){
              $(this).css("display","none");
              $(this).next().css("display","inline-block");
              }
            );
          });

          $(function(){
            $(".aa4").click(
              function(){
              $(this).css("display","none");
              $(this).prev().css("display","inline-block");
              }
            );
          });
        }
	function DropDown(el) {
	this.dd = el;
	this.placeholder = this.dd.children('span');
	this.opts = this.dd.find('ul.dropdown > li');
	this.val = '';
	this.index = -1;
	this.initEvents();
	}
	DropDown.prototype = {
	initEvents : function() {
	var obj = this;
	
	obj.dd.on('click', function(event){
	$(this).toggleClass('active');
	return false;
	});
	
	obj.opts.on('click',function(){
	var opt = $(this);
	obj.val = opt.text();
	obj.index = opt.index();
	obj.placeholder.text(obj.val);
	});
	},
	getValue : function() {
	return this.val;
	},
	getIndex : function() {
	return this.index;
	}
	}
	
	$(function() {
	
	var dd = new DropDown( $('#dd') );
  var aa = new DropDown( $('#aa') );
	
	$(document).click(function() {
	// all dropdowns
	$('.wrapper-dropdown-3').removeClass('active');
	});
	
	});


$("#allbox1").click(function(){    
    if (this.checked){
		$(".rightfix :checkbox").each(function(){
			this.checked=true;
		});
	}else{
		$(".rightfix :checkbox").each(function(){
			this.checked=false;
		});
	}
});
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