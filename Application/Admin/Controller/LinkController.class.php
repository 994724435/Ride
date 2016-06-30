<?php

namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class LinkController extends CommonController {
    public function img_link(){
		$tg = M('Tg');
		$result = $tg->where(array('tg_shenghe'=>0))->select();
		$this->assign('res',$result);
        $this->display();
    }

    public function img_del(){
        $id = I('get.img_id');
        $img = M('tg');
        $res = $img->where(array('tg_id'=>$id))->delete();
        if($res){
            echo "<script>alert('删除成功');window.location.href='/index.php/Admin/Link/img_link';</script>";
        }else{
            echo "<script>alert('删除失败');window.history.go(-1);</script>";
        }
    }
     
    public function words_del(){
        $id = I('get.img_id');
        $img = M('tg');
        $res = $img->where(array('tg_id'=>$id))->delete();
        if($res){
            echo "<script>alert('删除成功');window.location.href='/index.php/Admin/Link/words_link';</script>";
        }else{
            echo "<script>alert('删除失败');window.history.go(-1);</script>";
        }
    }
		 
	public function img_edit(){
		$id = I('get.img_id');
        $img = M('tg');
		$data=array('tg_shenghe'=>1);
        $res = $img->where(array('tg_id'=>$id))->save($data);
		if($res){
            echo "<script>alert('审核成功');window.location.href='/index.php/Admin/Link/img_link';</script>";
        }else{
            echo "<script>alert('审核失败');window.history.go(-1);</script>";
        }
	} 

   public function words_link(){
     		$tg = M('Tg');
		$result = $tg->where(array('tg_shenghe'=>1))->select();
		$this->assign('res',$result);
        $this->display();
   }

}