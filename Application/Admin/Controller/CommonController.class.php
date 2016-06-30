<?php
namespace Admin\Controller;
use Think\Controller;
class CommonController extends Controller {

	public function _initialize(){
		if(!cookie('is_login')){
			if(!session('login_state')){
				echo "<script>alert('请登录');";
	            echo "window.location.href='/index.php/Admin/User/login';";
	            echo "</script>";
				exit;
			}
		}
		$admin=M('admin');
		$admin_id = session('user_id');
    	$admin_user = $admin->select();
    	$this->assign('admin_user',$admin_user);
    	$current_admin = $admin->where(array('admin_id'=>$admin_id))->find();

        $this->assign('current_admin',$current_admin);
		$this->_menu();
		$this->_page();
	}
	private function _menu(){
		$nav = M('Nav');
    	$nav1 = $nav->select();
    	$n_nav = array();
    	foreach($nav1 as $key => $val){
    		if($val['nav_pid'] == 0){
    			$n_nav[$key] = $val;
    		}
    	}
    	foreach($n_nav as $k => $v){
    		foreach($nav1 as $ke => $va){
    			if($v['nav_id'] == $va['nav_pid']){
    				$n_nav[$k]['sid'][] = $va;
    			}
    		}
    	}
		// print_r($n_nav);die;
		$this->assign(array('n_nav'=>$n_nav));
	}

	//管理员分页
	public function _page(){
		$Admin=M('admin');
		$count=$Admin->count();
		$num=10;
		$all = ceil($count/$num);
    	$apage = getAdminPage($count,$num);
    	$ashow=$apage['show'];
    	$user=$Admin->order('admin_id','ASC')->limit($apage['firstRow'].','.$apage['listRows'])->select();
    	$this->assign(array('ashow'=>$ashow,'user'=>$user,'allp'=>$all));
	}

	function admin_page(){
		$nowPage = $_POST['page'];
		$Admin=M('admin');
		$count=$Admin->count();
		$num=10;
		$all = ceil($count/$num);
		$limit = ($nowPage-1)*$num;
		$user = $Admin->order('admin_id','ASC')->limit($limit,$num)->select();
	    $res = array('user'=>$user,'allp'=>$all,'num'=>$num);
		echo json_encode($res);
	}
}