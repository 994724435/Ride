<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class  CommunicateController extends CommonController  {
	public function Lead_mailbox(){
			if(IS_POST){
   			if($_POST['name']){
   			       $user = M('advice');
					$time =time();
					$nowtime=date('Y-m-d',$time);
		        	$save = array(
		        		'ad_name'=>I('post.name'),
		        		'ad_email'=>I('post.email'),
		      			'ad_tel'=>I('post.tel'),	
		        		'ad_youzhen'=>I('post.youzhen'),
		        		'ad_address'=>I('post.address'),
		        		'ad_class'=>1,
		        		'ad_tousu'=>I('post.tousu'),
		        		'ad_theme'=>I('post.theme'),
		        		'ad_content'=>I('post.content'),
						'ad_time'=>$nowtime
		        		); 
		        	$res = $user->add($save);
		        	if($res){
						echo "<script>alert('留言成功');</script>";
		        	}else{
		        		echo "<script>alert('留言失败');</script>";
		        	}	
				
   			}else{
   				echo "<script>alert('留言失败');</script>";
   			}
        	
		}	
		
		$this->display();
	}

	public function jiwei(){
		if(IS_POST){
//			print_r($_POST);die;
  				if($_POST['name']){
  					   $user = M('advice');
						$time =time();
						$nowtime=date('Y-m-d',$time);
			        	$user = M('advice');
			        	$save = array(
			        		'ad_name'=>I('post.name'),
			        		'ad_email'=>I('post.email'),
			      			'ad_tel'=>I('post.tel'),	
			        		'ad_youzhen'=>I('post.youzhen'),
			        		'ad_address'=>I('post.address'),
			        		'ad_class'=>2,
			        		'ad_tousu'=>I('post.tousu'),
			        		'ad_theme'=>I('post.theme'),
			        		'ad_content'=>I('post.content'),
							'ad_time'=>$nowtime
			        		); 
			        	$res = $user->add($save);
			        	if($res){
							echo "<script>alert('留言成功');</script>";
			        	}else{
			        		echo "<script>alert('留言失败');</script>";
			        	}
  				}else{
  					        echo "<script>alert('留言失败');</script>";
  				}
        	
		}
		$this->display();
	}
	
	public function suggest(){
		if(IS_POST){
			  if($_POST['name']){
			  	    $user = M('advice');
					$time =time();
					$nowtime=date('Y-m-d',$time);			
		        	$save = array(
		        		'ad_theme'=>I('post.theme'),
		        		'ad_class'=>3,
		        		'ad_content'=>I('post.content'),
		        		'ad_time'=>$nowtime
		        		); 
		        	$res = $user->add($save);
		        	if($res){
						echo "<script>alert('建言成功');</script>";
		        	}else{
		        		echo "<script>alert('建言失败');</script>";
		        	}   
			  }else{
			  	   echo "<script>alert('建言失败');</script>";
			  }
        	
		}	
		$this->display();
	}
}