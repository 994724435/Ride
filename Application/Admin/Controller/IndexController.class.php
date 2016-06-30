<?php

namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class IndexController extends CommonController {
	
    public function index(){
        $this->display();
    }
    
    public function update(){
        if(IS_POST){
            $res = I('post.powe');
            $id = I('post.field_name');
            foreach($res as $key => $val){
                $str .= $val.",";
            }
            $str = rtrim($str,',');
            $data = array(
                    'admin_power' =>$str
                );
            // print_r($data);die;
            $admin = M('Admin');
            $ret = $admin->where(array('admin_id'=>$id))->save($data);
            if($ret){
                echo "<script>window.location.href = '/Admin/Index/index';</script>";
            }else{
                echo "<script>alert('设置失败，请重试');window.history.go(-1);</script>";
            }
        }
    }

    public function add(){
        if(IS_POST){
            $power = I('post.powe');
            $admin_username = I('post.new_admin_user');
            $admin_password = I('post.new_admin_pswd');
            foreach($power as $key => $val){
                $str .= $val.",";
            }
            $str = rtrim($str,',');
            if($admin_username && $admin_password){
                $data = array(
                    'admin_power' => $str,
                    'admin_username' => $admin_username,
                    'admin_password' => $admin_password,
                    'admin_level' => 2
                );
                $admin = M('Admin');
                $new_admin = $admin->add($data);
                if($new_admin){
                    echo "<script>window.location.href = '/Admin/Index/index';</script>";
                }
            }else{
                echo "<script>alert('添加失败');window.history.go(-1);</script>";
            }
        }
    }

    public function prev_add(){
       $nuna = $_POST['nuna'];
       $pswd = $_POST['pswd'];
       $new_admin = array(
            'admin_username' => $nuna,
            'admin_password' => $pswd
        );
       echo json_encode($new_admin);
    }

    public function change(){
    	if(IS_POST){
    		$change_user = I('post.change_user');
    		$new_pswd = I('post.new_pswd');
    		$data['admin_password'] = $new_pswd; 
    		$admin = M('Admin');
    		$res = $admin->where(array('admin_username'=>$change_user))->save($data);
    		if($res){
    			echo "<script>window.location.href = '/Admin/Index/index';</script>";
    		}
    	}
    }

    public function ajax(){
    	$id = session('user_id');
    	$admin = M('Admin');
    	$password = $_POST['psd'];
    	$account = $_POST['acc'];
    	$where = array('admin_username' => $account);
		$res = $admin->where($where)->find();
		if($password == $res['admin_password']){
			$tmp = 1;
		}else{
			$tmp = 0;
		}
		echo json_encode($tmp);
    }

    public function account_ajax(){
    	$account = $_POST['account'];
    	$acc = M('Admin');
    	$res = $acc->where(array('admin_username'=>$account))->select();
    	if($res){
    		$ans = 1;
    	}else{
    		$ans = 0;
    	}
    	echo json_encode($ans);
    }

    public function acc_ajax(){
    	$acc = $_POST['acc'];
    	$account = M('Admin');
    	$res = $account->where(array('admin_username'=>$acc))->select();
    	if($res){
    		$ans = 1;
    	}else{
    		$ans = 0;
    	}
    	echo json_encode($ans);
    }
    public function formDelete(){
        $aid = I('post.idarr');

        // print_r($aid);die;
        if($aid){
            $Admin = M('admin');
            foreach($aid as $key=>$value){
                $art = $Admin->where(array('admin_id'=>$key))->find();
                // dump($art);  
                // unlink('Public/home/'.$art['a_img']);
                $data=$Admin->where(array('admin_id'=>$key))->delete();
                if($data){
                    echo "<script>window.location.href='/Admin/Index/index';</script>";
                }else{
                    echo "<script>alert('删除失败');window.history.go(-1);</script>";
                }
            }
            
        }
    }

}