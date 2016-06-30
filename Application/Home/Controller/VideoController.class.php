<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class VideoController extends CommonController  {
	public function video(){
		$banner = M('Video');
		$data = $banner->select();
		$this->assign('data',$data);
        $this->display();
	}

	public function video_details(){
		$banner = M('Video');
		$data = $banner->where(array('v_id'=>$_GET['id']))->select();
		$this->assign('data',$data[0]);
        $this->display();
	}

}