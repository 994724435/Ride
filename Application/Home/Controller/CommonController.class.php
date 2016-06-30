<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function _initialize(){
		
		if($user = session('name')){
			  //设置session
			$data = array(
				'user'=>$user
				);
//			session('[destroy]');  //消除session	
			$this->assign($data);
			
		}
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
				session('name',I('post.name'));  //设置session
				echo "<script>alert('注册成功');window.location.href='/index.php/Home/Index/index';</script>";
        	}
		}
		$this->display();
	}




public function tuichu(){
		session('[destroy]');  //消除session	
		 echo "<script>alert('退出成功');window.location.href='/index.php/Home/Index/index';</script>";
}


    function verify(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 13;
        $Verify->length = 4;
        $Verify->imageW = 66;
        $Verify->imageH = 18;
        $Verify->useCurve = false;
        $Verify->entry();
    }	

public function login(){   //mima
	if($_POST){
		    $code= I('post.code');
			$user= I('post.name');
			$password= I('post.pass');
			$userobj=M('Member');
			$res1= $userobj->where(array('vip_username'=>$user))->select();
			if($res1[0]['vip_password']==$password){
				$res_pass= $userobj->where(array('vip_password'=>$password))->select();
				if(TRUE){
				 	$verify = new \Think\Verify(); 
					$res = $verify->check($code);
					if($res){
					 session('name',$_POST['name']);  //设置session
					 echo "<script>window.location.href='/index.php/Home/Index/index';</script>";	
					 }else{
					 echo "<script>alert('验证码错误');window.location.href='/index.php/Home/Index/index';</script>";	
							}					
				}
			}
			else{
			echo "<script>alert('用户名或密码错误');window.location.href='/index.php/Home/Index/index';</script>";	
			}
			
			
	}

}
}