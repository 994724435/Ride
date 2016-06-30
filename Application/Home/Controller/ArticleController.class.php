<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class  ArticleController extends CommonController  {
	public function jianbao(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>6))->select();
		$this->assign('data',$data);
		$this->display();
	}		
	
	public function shizheng(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>5))->select();
		$this->assign('data',$data);
		$this->display();
	}	
	
	public function zhengzhi(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>2))->select();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function tdetail(){  
		$tg=M('tg');
		$result= $tg->where(array('tg_id'=>$_GET['id']))->select();
		$this->assign('data',$result[0]);
		$this->display();
	}
	
	public function baozhang(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>3))->select();
		$this->assign('data',$data);
		$this->display();
	}	
	
	public function erying(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>14))->select();
		$this->assign('data',$data);
		$this->display();
	}		
	
	public function sanying(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>15))->select();
		$this->assign('data',$data);
		$this->display();
	}		
	public function Dadui(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>10))->select();
		$this->assign('data',$data);
		$this->display();
	}

	public function Jiguan(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>4))->select();
		$this->assign('data',$data);
		$this->display();
	}
	
	public function Jicen(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>7))->select();
		$this->assign('data',$data);
		$this->display();
	}

	public function Tieqi(){
		$article=M('tg');
		$data= $article->where(array('tg_shenghe'=>1))->select();
		$this->assign('data',$data);
		$this->display();
	}
	public function zhengce(){
		$article=M('article');
		$data= $article->where(array('art_cateid'=>9))->select();
		$this->assign('data',$data);
		$this->display();
	}	
	public function Download(){
		$banner = M('Banner');
		$data = $banner->select();
		$this->assign('data',$data);
        $this->display();
	}		
	
	public function tougao(){
		
			if($_POST){
			 if(session('name')){
			 	$time =date('Y-m-d',time());
			 	$Tg =M('Tg');
					$data=array(
					 'tg_unit'=>$_POST['unit'],
					 'tg_name'=>$_POST['name'],
					 'tg_theme'=>$_POST['theme'],
					 'tg_content'=>$_POST['content'],
					 'tg_addtime'=>$time,
					);
					$res=$Tg->add($data);
					if($res){
						echo "<script>alert('投稿成功');window.location.href='/index.php/Home/Article/tougao';</script>";exit;
					}else{
						echo "<script>alert('投稿失败');window.location.href='/index.php/Home/Article/tougao';</script>";exit;
					}
			 }else{echo "<script>alert('请登录');window.location.href='/index.php/Home/Article/tougao';</script>";exit;}	
			
		}
		
		
		
		
		
	
			  $this->display();
	
		
		
	}	
	
	public function Details(){
		$artid=$_GET['artid'];
		$article=M('article');
		$art_cate=M('artcate');
		$id1    =$artid+1;
		$id2    =$artid-1;
		$data= $article->where(array('art_id'=>$artid))->select();
		if($data[0]['art_thumb']==''){
			 unset($data[0]['art_thumb']);
		}
		if($data[0]['art_thumb1']==''){
			 unset($data[0]['art_thumb1']);
		}	
		if($data[0]['art_thumb2']==''){
			 unset($data[0]['art_thumb2']);
		}			
		$data1= $article->where(array('art_id'=>$id1))->select();
		$data2= $article->where(array('art_id'=>$id2))->select();
		$num = $data[0]['art_num']+1;   //文章浏览数
        $arr=array('art_num'=>$num);		
		$result =$article->where(array('art_id'=>$artid))->save($arr);
		$re_name= $art_cate->where(array('cate_id'=>$data[0]['art_cateid']))->select();
		$this->assign('data',$data[0]);
		$this->assign('data1',$data1[0]);  //xiayipain
		$this->assign('data2',$data2[0]);
		$this->display();
	}	
}