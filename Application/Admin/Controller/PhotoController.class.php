<?php

namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class PhotoController extends CommonController {
	public function index(){
		$banner = M('Video');
		$data = $banner->select();
        if(IS_POST){
//      	print_r($_POST);die;
			$time =date('Y-m-d',time());
			$arr=array('v_name'=>$_POST['name'],'v_content'=>$_POST['content'],'v_admin'=>$_POST['admin'],'v_time'=>$time);
         	$res= $banner->where(array('v_id'=>$_POST['id']))->save($arr);
			if($res){
					echo "<script>alert('修改成功');window.location.href='/index.php/Admin/Photo/index';</script>";
				}else{
					echo "<script>alert('修改失败');window.location.href='/index.php/Admin/Photo/index';</script>";
				}
		}

		$this->assign('data',$data);
        $this->display();
    }
	
	public function delete(){
		$id = $_GET['id'];
		$banner = M('Banner');
		$res = $banner->where(array('ban_id'=>$id))->delete();
		if($res){
			echo "<script>alert('修改成功');window.location.href='/index.php/Admin/Photo/lis';</script>";
		}else{
			echo "<script>alert('修改失败');window.location.href='/index.php/Admin/Photo/lis';</script>";
		}
	}
	
	public function lis (){
		$banner = M('Banner');
		$data = $banner->select();
		$this->assign('data',$data);
//		print_r($data);die;
		$this->display();
	}
	
    public function add(){
    	$bp = M('Banner');
    	if(IS_POST){
    	    if($_FILES['ban_url']){
			    $upload = new \Think\Upload();// 实例化上传类
			    $upload->maxSize   =     3145728 ;// 设置附件上传大小
			    $upload->rootPath  =     './Public/'; // 设置附件上传根目录
			    $info   =   $upload->upload();
				$time =time();
				$nowtime=date('Y-m-d',$time);
				$url='/Public/'.$info['ban_url']['savepath'].$info['ban_url']['savename'];
				$arr=array('ban_name'=>$_POST['ban_name'],'ban_url'=>$url,'ban_addtime'=>$nowtime);
				$result= $bp->add($arr);
				if($result){
					echo "<script>alert('添加成功');window.location.href='/index.php/Admin/Photo/lis';</script>";
				}else{
					echo "<script>alert('添加失败');window.location.href='/index.php/Admin/Photo/lis';</script>";
				}
				
			}
    	}
    	$this->display();
    }
    public function bandel(){
    	$id = I('get.ban_id');
    	$banner = M('Banner');
    	$res = $banner->where(array('ban_id'=>$id))->delete();
    	if($res){
    		echo "<script>window.location.href='/index.php/Admin/Photo/index';</script>";
    	}else{
    		echo "<script>alert('删除失败');window.history.go(-1);</script>";
    	}
    }
    function changeName(){
    	$name = $_POST['name'];
    	$id = $_POST['id'];
    	$banner = M('Banner');
    	$res = $banner->where(array('ban_id'=>$id))->save(array('ban_name'=>$name));
    	echo json_encode($res);
    }
    function changeOrder(){
    	$order = $_POST['order'];
    	$id = $_POST['id'];
    	$banner = M('Banner');
    	$res = $banner->where(array('ban_id'=>$id))->save(array('ban_order'=>$order));
    	echo json_encode($res);
    }
    function changeGourl(){
    	$gourl = $_POST['gourl'];
    	$id = $_POST['id'];
    	$banner = M('Banner');
    	$res = $banner->where(array('ban_id'=>$id))->save(array('ban_gourl'=>$gourl));
    	echo json_encode($res);
    }
}