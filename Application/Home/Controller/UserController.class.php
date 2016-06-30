<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class UserController extends CommonController  {
	public function login(){
		$this->display();
	}

	public function register(){
		if(IS_POST){
//			print_r($_POST);die;
        	$user = M('Member');
        	$save = array(
        		'vip_username'=>I('post.name'),
        		'vip_password'=>I('post.password'),
        		'vip_question'=>I('post.question'),
        		'vip_answer'=>I('post.answer'),
        		'vip_relname'=>I('post.rel_name'),
        		'vip_address'=>I('post.workplace'),
        		'vip_sex'=>I('post.Sex'),
        		'vip_birthday'=>I('post.birthday'),
        		'vip_tel'=>I('post.tel'),
        		'vip_introduce'=>I('post.introduce'),
        		'vip_mail'=>I('post.mail')
        		); 
        	$res = $user->add($save);
        	if($res){
        		$this->display('succeed');
				session('name',$_POST['name']);  //设置session
				echo "<script>alert('注册成功');</script>";
        	}
		}
		$this->display();
	}

	public function logout(){
		session(null);
		echo "<script>window.location.href='/index.php/Home/Index/index';</script>";
	}

	function login_ajax(){
		$username = $_POST['account'];
		$password = $_POST['password'];
		$member = M('Member');
		$user = $member->where(array('vip_account'=>$username))->find();
		if(!$user){
			$user = $member->where(array('vip_username'=>$username))->find();
			if(!$user){
				$user = $member->where(array('vip_mail'=>$username))->find();
				if(!$user){
					$res['res'] = 1;
				}
			}
		}
		if(!$res){
			if($password == $user['vip_password']){
				$res['res'] = 2;
			}else{
				$res['res'] = 0;
			}
		}
		$res['login_state'] = session('login_state',1);
		$res['login_user'] = session('login_user',$user['vip_mail']);
		if(!$res['login_user']){
			$res['login_user'] = session('login_user',$user['vip_account']);
			if(!$res['login_user']){
				$res['login_user'] = session('login_user',$user['vip_username']);
			}
		}
		$res['login_id'] = session('login_id',$user['vip_id']);
		echo json_encode($res);
	}

}