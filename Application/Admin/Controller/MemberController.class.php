<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class MemberController extends CommonController {
	
    public function index(){
        $url = get_url();//获取当前页面的URL地址
        $memb = M('Member');
        if(IS_POST){
            $idarr = I('post.idarr');
            $where = array('vip_id'=>array('in',$idarr));
            $res = $memb->where($where)->delete();
            if($res){
                echo "<script>window.location.href=".$url.";</script>";
            }else{
                echo "<script>alert('删除失败');window.history.go(-1);</script>";
            }
        }
        $current = I('get.page',1);
        $limit = 20;
        $art = ($current-1)*$limit;
        $fir = strpos($url,'page');
        if($fir){
            $purl = mb_substr($url,0,$fir-1);
        }else{
            $purl = $url;
        }
        $count=$memb->count();
        $show = list_page($current,$limit,$count,$purl);
        $vip = $memb->order('vip_addtime DESC')->limit($art,$limit)->select();
        $data = array(
                'vip'=>$vip,
                'show'=>$show
            );
        $this->assign($data);
        $this->display();
    }

    public function delVip(){
        $id = I('get.vip_id');
        $memb = M('Member');
        $res = $memb->where(array('vip_id'=>$id))->delete();
        if($res){
            echo "<script>window.location.href = '/Admin/Member/index';</script>";
        }else{
            echo "<script>alert('删除失败');window.history.go(-1);</script>";
        }
    }

    public function add(){
        if(IS_POST){
            $user = I('post.vip_user');
            $pswd1 = I('post.vip_pswd1');
            $pswd2 = I('post.vip_pswd2');
            $account =  I('post.vip_account');
            $memb = M('Member');
            $res = $memb->where(array('vip_account'=>$account))->find();
            $tmp = $memb->where(array('vip_username'=>$user))->find();
            if($user=='' || $pswd1=='' || $pswd2=='' || $account==''){
                echo "<script>alert('带*号的内容为必填项');window.history.go(-1);</script>";die;
            }else if($pswd1 == $pswd2 && strlen($pswd1)>=6 && strlen($pswd2)>=6 && strlen($user)>=6 && strlen($account)>=6 && $res=='' && $tmp==''){
                $arr = array(
                    'vip_username'=>I('post.vip_user'),
                    'vip_account'=>I('post.vip_account'),
                    'vip_password'=>I('post.vip_pswd1'),
                    'vip_addtime'=>time(),
                    'vip_relname'=>I('post.vip_relname'),
                    'vip_tel'=>I('post.vip_tel'),
                    'vip_mail'=>I('post.vip_mail'),
                    'vip_address'=>I('post.vip_address'),
                    'vip_birthday'=>I('post.vip_birthday'),
                    'vip_sex'=>I('post.vip_sex'),
                    'vip_zipCode'=>I('post.vip_zipCode'),
                    'vip_fixedTel'=>I('post.vip_fixedTel'),
                    'vip_state'=>1
                );
                $memb = M('Member');
                $vip = $memb->add($arr);
                if($vip){
                    echo "<script>window.location.href = '/Admin/Member/index';</script>";
                }else{
                     echo "<script>alert('添加失败');window.history.go(-1);</script>";
                }
            }else{
                echo "<script>alert('请填写正确的信息');window.history.go(-1);</script>";die;
            }
        }
        $this->display();
    }
    function account(){
        $account = $_POST['account'];
        $memb = M('Member');
        $res = $memb->where(array('vip_account'=>$account))->select();
        echo json_encode($res);
    }
    function user(){
        $user = $_POST['user'];
        $memb = M('Member');
        $res = $memb->where(array('vip_username'=>$user))->select();
        echo json_encode($res);
    }
   function state(){
        $id = $_POST['id'];
        $memb = M('Member');
        $vip = $memb->where(array('vip_id'=>$id))->find();
        if($vip['vip_state']){
            $res = $memb->where(array('vip_id'=>$id))->save(array('vip_state'=>0));
        }else{
            $res = $memb->where(array('vip_id'=>$id))->save(array('vip_state'=>1));
        }
        $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
        $arr = array(
                'url'=>$url,
                'res'=>$res
            );
        echo json_encode($arr);
   }
}