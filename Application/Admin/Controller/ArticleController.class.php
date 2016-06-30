<?php
namespace Admin\Controller;
use Think\Controller;
class articleController extends CommonController {
    public function index(){
    	$article=M('article');
    	$Artcate=M('artcate');
 
    	$cid=I('get.cid',0);//一级分类id
        $sid=I('get.sid',0);//二级分类ID

    	$q=I('get.q','');//搜索
        $cate = $Artcate->where(array('cate_id'=>$cid))->find();
        // dump($cate);die;
        $ccate = $Artcate->where(array('cate_id'=>$sid))->find();
        // dump($ccate);die;

        $url = get_url();

        $acate=$Artcate->where(array('cate_pid'=>0))->select();//一级分类

        $scate = $Artcate->where(array('cate_pid'=>$cid))->select();//二级分类
        // dump($scate);die;
        $current = I('get.page',1);
        $limit = 10;
        $art = ($current-1)*$limit;
        $url = get_url();//获取当前页面的URL地址
        $fir = strpos($url,'page');
        if($fir){
            $purl = mb_substr($url,0,$fir-1);
        }else{
            $purl = $url;
        }
    	if($q){
    		$count=$article->where(array('art_title'=>array('like',"%$q%")))->count();
            $news=$article->join('`ast_artcate` ON ast_article.art_cateid = ast_artcate.cate_id')->where(array('art_title'=>array('like',"%$q%")))->order('art_addtime DESC')->limit($art,$limit)->select();
    	}else{
            if($sid){
                $count=$article->where(array('art_cateid'=>$sid))->count();
                $news=$article->join('`ast_artcate` ON ast_article.art_cateid = ast_artcate.cate_id')->where(array('art_cateid'=>$sid))->order('art_addtime DESC')->limit($art,$limit)->select();
            }else{
                if($cid){
                    $ids=$Artcate->field('cate_id')->where(array('cate_pid'=>$cid))->select();
                    $idr=array(0=>$cid);
                    foreach($ids as $value){
                        $idr[]=$value['cate_id'];
                    }
                    $count=$article->where(array('art_cateid'=>array('IN',$idr)))->count();
                    $news=$article->join('`ast_artcate` ON ast_article.art_cateid = ast_artcate.cate_id')->where(array('art_cateid'=>array('IN',$idr)))->order('art_addtime DESC')->limit($art,$limit)->select();
                }else{
                    $count=$article->count();
                    $news=$article->join('`ast_artcate` ON ast_article.art_cateid = ast_artcate.cate_id')->order('art_addtime DESC')->limit($art,$limit)->select();
                }
            }
    		
    	}
        $show = list_page($current,$limit,$count,$purl);
        $comment = M('Artcomment');
        $ment = $comment->select();
        foreach($news as $key=>$val){
            foreach($ment as $k=>$v){
                if($v['cmt_art_id']==$val['art_id']){
                    $news[$key]['mentNum'] += 1;
                }
            }
        }
        // print_r($news);die;
    	$data=array(
    			'news'=>$news,
    			'cid'=>$cid,
                'sid'=>$sid,
                'acate'=>$acate,
    			'scate'=>$scate,
                'ccate'=>$ccate,
    			'show'=>$show,
                'cate'=>$cate,
                'url'=>$url
    		);
    	$this->assign($data);
        $this->display();

        $show = $_POST['show'];
        $id = $_POST['id'];
        if($show){
            $atc = $article->where(array('art_id'=>$id))->save(array('art_isshow'=>0));
        }else{
            $atc = $article->where(array('art_id'=>$id))->save(array('art_isshow'=>1));
        }
        echo json_encode($atc);

    }

    public function order(){
        $oldOrder = $_POST['oldOrder'];
        $order = $_POST['order'];
        $id = $_POST['id'];
        $article = M('article');
        $art = $article->field('art_id')->where(array('art_order'=>$order))->find();
        if($art['art_id'] != 0){
            $burr_art = $article->where(array('art_id'=>$art['art_id']))->save(array('art_order'=>$oldOrder));
            $curr_art = $article->where(array('art_id'=>$id))->save(array('art_order'=>$order));
            echo json_encode(array('curr_art'=>$curr_art,'burr_art'=>$burr_art));
        }else{
            $curr_art = $article->where(array('art_id'=>$id))->save(array('art_order'=>$order));
            echo json_encode($curr_art);
        }
       
    }

    public function delete(){
    	$aid = I('get.aid');
        $article = M('article');
        $art = $article->where(array('art_id'=>$aid))->find();
        // unlink('Public/home/'.$art['a_img']);
        $date=$article->where(array('art_id'=>$aid))->delete();
        
        if($date){
            echo "<script>window.location.href='/index.php/Admin/article/index';</script>";exit;
        }else{
            echo "<script>alert('删除失败');window.location.href='/index.php/Admin/article/index';</script>";exit;
        }
    }

    public function formDelete(){
        $aid = I('post.idarr');
        // print_r($aid);die;
        if($aid){
            $article = M('article');
            $where = array('art_id'=>array('in',$aid));
            // dump($idarr);die;
           $data = $article->where($where)->delete();
            if($data){
                echo "<script>window.location.href='/index.php/Admin/article/index';</script>";exit;
            }else{
                echo "<script>alert('删除失败');window.location.href='/index.php/Admin/article/index';</script>";exit;
            }
            
        }else{
            echo "<script>window.location.href='/index.php/Admin/article/index';</script>";exit;
        }
    }
 
    public function picload(){
//  	 print_r($_GET);die;
         $article=M('article');
		 $res=$article->where(array('art_id'=>$_GET['id']))->select();
		 if($_FILES['thumb']['name']){
		 	     $thumb = imgFile();
                 $info = $thumb['info'];
			     $path = $info['thumb']['savepath'];
                 $p = ltrim($path,'.');
                 $img = $info['thumb']['savename'];
                 $src=$p.$img;
                 $result= $article->where(array('art_id'=>$_GET['id']))->save(array($_GET['name']=>$src));				 	 
				 if($result){
				 	 echo "<script>alert('更新成功');window.location.href='/index.php/Admin/Article/index';</script>";
				 }else{
				 	 echo "<script>alert('更新失败');window.location.href='/index.php/Admin/Article/index';</script>";
				 }
		 }
		 $this->assign('res',$res[0]);
    	 $this->display(); 
    } 


    public function editor(){
        $aid = I('get.aid');
        $article=M('article');
        $artcate=M('artcate');
        $cate=$artcate->where(array('cate_pid'=>0))->select();
        $art=$article->join('`ast_artcate` ON ast_article.art_cateid = ast_artcate.cate_id')->where(array('art_id'=>$aid))->find();
        $acate = $artcate->where(array('cate_id'=>$art['art_cateid']))->find();
        $pid = $acate['cate_pid'];
        if($pid == 0){
            $scate = $artcate->where(array('cate_pid'=>$acate['cate_id']))->select();
        }else{
            $scate = $artcate->where(array('cate_pid'=>$pid))->select();
        }
        $data=array(
                    'art'=>$art,
                    'aid'=>$aid,
                    'cate'=>$cate,
                    'acate'=>$acate,
                    'scate'=>$scate,
                    'pid'=>$pid
                );
        if(IS_POST){
		$time= time();
		$nowtime = date('Y-m-d',$time);  
//		print_r($_POST);die;
            $arr=array(
                    'art_title'=>I('post.title'),
                    'art_author'=>I('post.author'),
                    'art_cateid'=>I('post.cate'),
                    'art_from'=>I('post.source'),
                    'art_isshow'=>I('post.isshow'),
                    'art_summary'=>I('post.summary'),
                    'art_content'=>I('post.content1'),
                    'art_addtime'=>$nowtime,
                    'art_order'=>$order
                );
            $res=$article->where(array('art_id'=>$aid))->save($arr);
            if(FALSE){
                $this->error('更新失败！');
            }else{
                if($_FILES['thumb']['name']){
                    $thumb = imgFile();
                    $info = $thumb['info'];
                    if(!$info) {// 上传错误提示错误信息
                        $error;
                    }else{// 上传成功
                        $path = $info['thumb']['savepath'];
                        $p = ltrim($path,'.');
                        $img = $info['thumb']['savename'];
                        $src=$p.$img;
                        $root = rtrim($thumb['rootPath'],'\ThinkPHP/');
                        $roo = str_replace("\\","/",$root);
                        $url = ltrim($info['thumb']['savepath'],'.');
                        $uploadedfile = $roo.$url.$info['thumb']['savename'];
                        $oldFile = $roo.$art['art_thumb'];
                        unlink($oldFile);//删除原来的缩略图
                        $tmp = imagecreatefromjpeg($uploadedfile);
                        list($width,$height)=getimagesize($uploadedfile);
                        $newwidth=100;
                        $newheight=($height/$width)*$newwidth;
                        img_create_small($uploadedfile,$newwidth,$newheight,$uploadedfile);
                        $article->where(array('art_id'=>$aid))->save(array('art_thumb'=>$src));
                        echo "<script>window.location.href='/index.php/Admin/Article/index';</script>";
                    }
                }else{
                    echo "<script>window.location.href='/index.php/Admin/Article/index';</script>";
                }
            } 
        }
        $this->assign($data);
        $this->display();
    }

    public function cateAjax(){
        $artcate = M('artcate');
        $pid = $_POST['pid'];
        if($pid){
            $scate = $artcate->where(array('cate_pid'=>$pid))->order('cate_id DESC')->select();
            echo json_encode($scate);
        }
        
    }

    public function sortAjax(){
        $cid = $_POST['cid'];
        $sort = $_POST['sort'];
        $artcate = M('artcate');
        
        if(!$cid){
            $cate_order = $artcate->where(array('cate_pid'=>0))->order('cate_order DESC')->limit(1)->find();
            if(!$cate_order){
                $order = 1;
            }else{
                $order = $cate_order['cate_order']+1;
            };

            $arr = array(
                    'cate_name'=>$sort,
                    'cate_pid'=>0,
                    'cate_order'=>$order,
                );
            $res = $artcate->add($arr);
            $ret = $artcate->where(array('cate_pid'=>$cid))->select();  
        }else{
            $cate_order = $artcate->where(array('cate_pid'=>$cid))->order('cate_order DESC')->limit(1)->select();
            if(!$cate_order){
                $order = 1;
            }else{
                $order = $cate_order[0]['cate_order']+1;
            };

            $arr=array(
                    'cate_name'=>$sort,
                    'cate_pid'=>$cid,
                    'cate_order'=>$order,
                );
            $res = $artcate->add($arr);
            $ret = $artcate->where(array('cate_pid'=>$cid))->select();
        }
        echo json_encode($ret);
    }

    function add(){
        $artcate = M('artcate');
        $article = M('article');
        $cate = $artcate->where(array('cate_pid'=>0))->order('cate_id ASC')->select();
        $maxorder = $article->field('art_order')->order('art_order DESC')->limit(1)->find();//文章列表的最大排序
        // dump($maxorder);die;
        if(!$maxorder){
            $order = 1;
        }else{
            $order = $maxorder['art_order']+1;
        };
        $time = time();
        $arr=array();
        if(IS_POST){
		$time= time();
		$nowtime = date('Y-m-d',$time);         	
            $arr=array(
                    'art_title'=>I('post.title'),
                    'art_author'=>I('post.author'),
                     'art_cateid'=>I('post.cate'),
                    'art_from'=>I('post.source'),
                    'art_isshow'=>I('post.isshow'),
                    'art_summary'=>I('post.summary'),
                    'art_content'=>I('post.content1'),
                    'art_addtime'=>$nowtime,
                    'art_order'=>$order,
                );
            $scate = I('post.scate');
            $acate = I('post.cate');
            if(!$scate){
                $arr['art_cateid']=$acate;
            }else{
                $arr['art_cateid']=$scate;
            }
            // dump($arr);die;
            $res = $article->add($arr);
            // dump($res);die;
            if(!$res){
                $this->error('更新失败！');
            }else{
                if($_FILES['thumb']['name']){

                    $thumb = imgFile();
                    $info = $thumb['info'];
                    if(!$info) {// 上传错误提示错误信息
                        $error;
                    }else{// 上传成功
                        $path = $info['thumb']['savepath'];
                        $p = ltrim($path,'.');
                        $img = $info['thumb']['savename'];
                        $src=$p.$img;
                        $root = rtrim($thumb['rootPath'],'\ThinkPHP/');
                        $roo = str_replace("\\","/",$root);
                        $url = ltrim($info['thumb']['savepath'],'.');
                        $uploadedfile = $roo.$url.$info['thumb']['savename'];
                        $oldFile = $roo.$art['art_thumb'];
                        unlink($oldFile);//删除原来的缩略图
                        $tmp = imagecreatefromjpeg($uploadedfile);
                        list($width,$height)=getimagesize($uploadedfile);
                        $newwidth=142;
                        $newheight=($height/$width)*$newwidth;
                        img_create_small($uploadedfile,$newwidth,$newheight,$uploadedfile);
                        $article->where(array('art_id'=>$res))->save(array('art_thumb'=>$src));
                        echo "<script>alert('上传成功');window.location.href='/index.php/Admin/Article/index';</script>";
                    }
                }else{
                    echo "<script>alert('上传成功');window.location.href='/index.php/Admin/Article/index';</script>";
                }
            }
        }
        
        $data=array(
                'cate'=>$cate,
                'time'=>$time,
            );
        $this->assign($data);
        $this->display();
    }

    function addImg(){
        $path = $_POST['path'];
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     THINK_PATH; // 设置附件上传根目录
        $upload->savePath  =     '../Public/Uploads/'; // 设置附件上传（子）目录
            // 上传文件 
        $info   =   $upload->upload();
        echo json_encode($info);
    }

    public function sort(){ //文章分类页
        
        if(IS_POST){    //二级分类添加
            $sec_class = I('post.sec_class');
            $cate_pid = I('post.cate_pid');
            $sec_cate = M('artcate');
            $cate_order = $sec_cate->where(array('cate_pid'=>$cate_pid))->order('cate_order ASC')->limit(1)->select();
            if(!$cate_order){
                $order = 1;
            }else{
                $order = $cate_order[0]['cate_order']+1;
            }
            $arr = array(
                    'cate_order' => $order,
                    'cate_pid' => $cate_pid,
                    'cate_name' => $sec_class
                );
            $res = $sec_cate->add($arr);
        }
        $artcate=M('artcate');
        $cate = $artcate->order('cate_order ASC')->select();

        //重构分类列表
        foreach($cate as $key => $val){
            if($val['cate_pid'] == 0){
                $one_cate[$key] = $val;
            }
        }
        foreach($one_cate as $k => $v){
            foreach($cate as $ke => $va){
                if($v['cate_id'] == $va['cate_pid']){
                    $one_cate[$k]['sid'][] = $va;
                }
            }
        }
        // dump($one_cate);die;
        $data=array(
                'cate'=>$one_cate,
            );

        $this->assign($data);
        $this->display();
    }
    public function fir_test(){
        $fir_class = I('post.fir_class');
        $cate = M('Artcate');
        $cate_order = $cate->where(array('cate_pid'=>0))->order('cate_order DESC')->limit(1)->select();
        if(!$cate_order){
            $order = 1;
        }else{
            $order = $cate_order[0]['cate_order']+1;
        }
        $data = array(
                    'cate_pid'=>0,
                    'cate_name'=>$fir_class,
                    'cate_order'=>$order
                );
        $res = $cate->add($data);
        echo json_encode($res);
    }
    public function fir_class(){    //一级分类添加
        if(IS_POST){
            $fir_class = I('post.fir_class');
            $cate = M('Artcate');
            $cate_order = $cate->where(array('cate_pid'=>0))->order('cate_order DESC')->limit(1)->select();
            if(!$cate_order){
                $order = 1;
            }else{
                $order = $cate_order[0]['cate_order']+1;
            }
            $data = array(
                    'cate_pid'=>0,
                    'cate_name'=>$fir_class,
                    'cate_order'=>$order
                );
            $res = $cate->add($data);
            if($res){
                echo "<script>window.location.href='/index.php/Admin/Article/sort';</script>";
            }
        }
    }

    public function fir_order(){    //一级分类排序
        $order = $_POST['order'];
        foreach($order as $key=>$val){
            $cate = M('Artcate');
            $arr = array(
                    'cate_order' => $key+1
                );
            $cateOrder[] = $cate->where(array('cate_name'=>$val))->save($arr);
        }
        echo json_encode($cateOrder);
    }

    public function classDel(){     //分类删除及相应文章删除
        $cate_id = I('get.cate_id');
        $cate = M('Artcate');
        $art = M('Article');
        $res = $cate->where(array('cate_id'=>$cate_id))->delete();
        $art->where(array('art_cateid'=>$cate_id))->delete();
        $cate->where(array('cate_pid'=>$cate_id))->delete();
        if($res){
            echo "<script>window.location.href='/index.php/Admin/Article/sort';</script>";
        }
    }
    public function cateDelete(){
        $cid = I('post.idarr');
        // print_r($cid);die;
        if($cid){
            $cate = M('Artcate');
            $art = M('Article');            
            foreach($cid as $key=>$value){
                $cate_id=$cate->field('cate_id')->where(array('cate_pid'=>$key))->select();
                // dump($cate_id);die;
                $data=$cate->where(array('cate_id'=>$key))->delete();
                $cate->where(array('cate_pid'=>$key))->delete();
                $art->where(array('art_cateid'=>$key))->delete();
                foreach($cate_id as $val){
                    $art->where(array('art_cateid'=>$val['cate_id']))->delete();
                }   
            }

            if($data){
                    echo "<script>window.location.href='/index.php/Admin/article/sort';</script>";exit;
                }else{
                    echo "<script>alert('删除失败');window.location.href='/index.php/Admin/article/sort';</script>";exit;
                }
            
        }else{
            echo "<script>window.location.href='/index.php/Admin/article/sort';</script>";exit;
        }
    }

    public function classification(){   //更改二级分类名称
        $class = $_POST['class'];
        $cate_id = $_POST['cate'];
        $cate = M('Artcate');
        $res = $cate->where(array('cate_id'=>$cate_id))->save(array('cate_name'=>$class));
        echo json_encode($res);
    }

    public function comment(){
        if(IS_GET){
            $aid = I('get.aid');
            $cmt = M('Artcomment');
            $current = I('get.page',1);
            $limit = 10;
            $art = ($current-1)*$limit;
            $url = get_url();//获取当前页面的URL地址
            $fir = strpos($url,'page');
            if($fir){
                $purl = mb_substr($url,0,$fir-1);
            }else{
                $purl = $url;
            }
            $count=$cmt->count();
            $res = $cmt->where(array('cmt_art_id'=>$aid))->limit($art,$limit)->select();
            $reply = M('Artcmt_reply');
            $rep = $reply->select();
            foreach($res as $key=>$val){
                $res[$key]['cmt_ctitle'] = str_cut($val['cmt_content'], 0, 21);
                foreach($rep as $k=>$v){
                    if($v['reply_cmtid']==$val['cmt_id']){
                        $res[$key]['cmt_reply'][] = $v;
                    }
                }
            }
            $show = list_page($current,$limit,$count,$purl);
            // print_r($res);die;
            $data = array(
                    'cmt'=>$res,
                    'show'=>$show
                );
            $this->assign($data);
            $this->display();
        }   
        if(IS_POST){
            // print_r(I('post.idarr'));die;
            $id = I('post.idarr');
            $cmt = M('Artcomment');
            $reply = M('Artcmt_reply');
            $cres = $cmt->where(array('cmt_id'=>array('in',$id)))->delete();
            $rres = $reply->where(array('reply_cmtid'=>array('in',$id)))->delete();
            $url = get_url();
            if($cres){
                echo "<script>window.location.href='".$url."';</script>";exit;
            }else{
                echo "<script>alert('删除失败');window.location.href='".$url."';</script>";exit;
            }
        }

    }
    public function commentDel(){
            $acid = I('get.acid');
            $cmt = M('Artcomment');
            $res = $cmt->where(array('cmt_id'=>$acid))->delete();
            $artid = $cmt->field('cmt_art_id')->where(array('cmt_id'=>$acid))->find();
            // $a = $cmt->getLastSql();
            // print_r($artid);die;
            if($res){
                echo "<script>window.location.href='/index.php/Admin/Article/comment/aid/".$artid['cmt_art_id']."'.html;</script>";
            }else{
                echo "<script>alert('删除失败');window.location.href='/index.php/Admin/Article/comment';</script>";die;
            }
    }

}