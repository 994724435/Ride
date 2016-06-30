<?php

namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class MessageController extends CommonController {
    public function Lead_mailbox(){
		$message=M('advice');
		$res=$message->where(array('ad_class'=>1))->select();
		$this->assign('msg',$res);
		$this->display();    	
    }

   
    
	public function index(){
		$message=M('advice');
		$res=$message->where(array('ad_class'=>1))->select();
		$this->assign('msg',$res);
		$this->display();
	}
	public function Lead_mailbox_delete(){
		$message=M('advice');
		$res=$message->where(array('ad_id'=>$_GET['id']))->delete();		
		if($res){
			echo "<script>alert('删除成功');window.location.href='/index.php/Home/Index/header';</script>";exit;
		}else{
			echo "<script>alert('删除失败');window.location.href='/index.php/Home/Index/header';</script>";exit;
		}
		
	}
	
	public function jiwei(){
		$message=M('advice');
		$res=$message->where(array('ad_class'=>2))->select();
		$this->assign('msg',$res);
		$this->display();	
	}
	
	public function jiwei_delete(){
		$message=M('advice');
		$res=$message->where(array('ad_id'=>$_GET['id']))->delete();		
		if($res){
			echo "<script>alert('删除成功');window.location.href='/index.php/Home/Index/jiwei';</script>";exit;
		}else{
			echo "<script>alert('删除失败');window.location.href='/index.php/Home/Index/jiwei';</script>";exit;
		}	
	}


	public function advice(){
		$message=M('advice');
		$res=$message->where(array('ad_class'=>3))->select();
		$this->assign('msg',$res);
		$this->display();
	}

    public function advice_delete(){
    	$message=M('advice');
		$res=$message->where(array('ad_id'=>$_GET['id']))->delete();		
		if($res){
			echo "<script>alert('删除成功');window.location.href='/index.php/Admin/Message/advice';</script>";exit;
		}else{
			echo "<script>alert('删除失败');window.location.href='/index.php/Admin/Message/advice';</script>";exit;
		}	
    }

	
	

}