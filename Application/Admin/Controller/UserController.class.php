<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {

	public function login(){
        if(IS_POST){
            $admin_user = I('post.username');
            $admin_pswd = I('post.password');
            $autologin = I('post.autologin');
            $code= I('post.code');
            $verify = new \Think\Verify(); 
            $res =$verify->check($code);
            if(!$res){
                echo "<script>alert('验证码错误');</script>";
            }else{
            	$admin = M('Admin');
	            $admin_id = $admin->where(array('admin_username' => $admin_user))->find();
	            if($admin_id){
	                if($admin_pswd == $admin_id['admin_password']){
	                    $setId = session('user_id',$admin_id['admin_id']);
	                    // $this->success('登录成功','/Admin/Index/index');
	                    $login_state = session('login_state',1);
                        session('admin_user',$admin_id['admin_username']);
	                    if($autologin){
				            cookie('is_login','1',3600*24*30); 
				        }else{
				            cookie(null);
				        }
                        
	                    echo "<script>window.location.href='/index.php/Admin/Index/index';</script>";
	                }else{
	                    echo "<script>alert('密码错误');</script>";
	                }
	            }else{
	                echo "<script>alert('用户名不存在');";
	                echo "window.history.go(-1);";
	                echo "</script>";
	            }
            }
        }

        $this->display();
    }

    public function logOut(){
        session('login_state',null);
        cookie('is_login',null);
        echo "<script>window.location.href = '/index.php/Admin/User/login';</script>";
    }

    public function del(){
        $admin_id = I('get.admin_id',0);
        // print_r($admin_id);die;
        $admin = M('Admin');
        $res = $admin->where(array('admin_id'=>$admin_id))->delete();
        if($res){
            echo "<script>window.location.href = '/index.php/Admin/Index/index';</script>";
        }
        die;
    }

    public function change(){
    	$data = array(
    		'passowrd' => '123456'
    		);
    	$this->assign($data);
    	$this->display();
    }

    function verify(){

        $Verify = new \Think\Verify();
        $Verify->fontSize = 13;
        $Verify->length = 4;
        $Verify->imageW = 66;
        $Verify->imageH = 18;
        $Verify->useCurve = false;

        $Verify->entry();

    }

    function admin(){
        $admin_id = I('post.admin_id');
        if($admin_id){
            $adm = M('Admin');
            $admin = $adm->where(array('admin_id'=>$admin_id))->find();
            echo json_encode($admin);
        }     
    }

    public function ajax(){
        $this->display();
    }
    public function check(){
        if($_POST){
            $page = $_POST['page'];
            // 这里是去数据库查对应的数据
            // 获取对应的分页链接
            // $Admin=M('admin');
            // $ad = $Admin->sleect();
            $news = array(
                    array(
                            'title'=> 'hello',
                            'content' => 'hello',
                        ),
                    array(
                            'title'=> 'world',
                            'content' => 'world',
                        ),
                    array(
                            'title'=> 'test',
                            'content' => 'test',
                        ),
                );


            $page_link = "<a href='javascript:;' data-page='1' >1</a><a href='javascript:;' class='current' data-page='2' >2</a><a href='javascript:;' data-page='3' >3</a>";

            $res = array(
                    'page_link' => $page_link,
                    'news' =>$news
                );
            echo json_encode($res);exit;


        }
    }

}



 ?>