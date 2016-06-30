<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {
	public function index(){
		$article = M('Article');
		$data    = $article->select();
		$data4	 =$article->limit(0,6)->where(array('art_cateid'=>4))->select();  //机关  图
		$banner  =$article->limit(0,9)->where(array('art_cateid'=>10))->select();  //lunbotu
		$data5	 =$article->limit(0,6)->where(array('art_cateid'=>5))->select();  //时政
		$data6	 =$article->limit(0,6)->where(array('art_cateid'=>6))->select();  //工作简报
		$data7	 =$article->limit(0,6)->where(array('art_cateid'=>7))->select();
		$data8	 =$article->limit(0,6)->where(array('art_cateid'=>8))->select();
		$data9	 =$article->limit(0,6)->where(array('art_cateid'=>9))->select();
		$data10	 =$article->limit(0,6)->where(array('art_cateid'=>10))->select();   //dadui
		$data11  =$article->limit(0,6)->where(array('art_cateid'=>11))->select();
		$data19  =$article->limit(0,6)->where(array('art_cateid'=>19))->select();
//		print_r($data9);die;

		$this->assign('banner',$banner);
		$this->assign('data4',$data4);
		$this->assign('data5',$data5);
		$this->assign('data6',$data6);	
		$this->assign('data7',$data7);
		$this->assign('data8',$data8);		
		$this->assign('data9',$data9);	
		$this->assign('data10',$data10);	
		$this->assign('data11',$data11);
		$this->assign('data19',$data19);		
		$this->display();
	}

public function header(){
	$message=M('advice');
	$res=$message->where(array('ad_class'=>1))->select();
	$this->assign('msg',$res);
	$this->display();  

}

public function header_delete(){
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

}