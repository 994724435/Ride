<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class SetupController extends CommonController {
    public function index(){
        $seo = M('Seo');
        $tmp = $seo->where(array('seo_id'=>1))->find();
        if(IS_POST){
            $arr = array(
                    'seo_keyword'=>I('post.keyword'),
                    'seo_describe'=>I('post.describe')
                );
            $res = $seo->where(array('seo_id'=>1))->save($arr);
            if($res){
                echo "<script>lert('SEO设置成功');window.location.href='/index.php/Admin/Index/index';</script>";
            }else{
                echo "<script>alert('SEO设置失败');window.history.go(-1);</script>";
            }
        }
        $this->assign(array('seo'=>$tmp));
        $this->display();
    }
}