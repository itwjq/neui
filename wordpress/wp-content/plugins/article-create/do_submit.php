<?php 
	// echo "<pre>";
	// var_dump($_POST);
	// var_dump($_FILES);
	// echo "</pre>";
				// die;
	global $wpdb;
	$date_gmt = date("Y-m-d H:i:s");
	date_default_timezone_set('PRC');//设置时区
	$date = date("Y-m-d H:i:s");
	$post = array(
		'comment_status' =>  'open' ,// 评论的状态
		'post_author' => $_POST['post_author'], //作者
		'post_content' => $_POST['post_content'], //文章内容，必填
		'post_date' => $date, //文章编辑日期
		'post_date_gmt' => $date_gmt, //文章编辑GMT日期
		'post_excerpt' => $_POST['excerpt'], //摘要信息
		'post_name' => $_POST['excerpt'],
		'post_status' => $_POST['post_status'], //新文章的状态
		'post_title' => $_POST['post_title'], //文章标题，必填
		'post_type' => 'post',//文章类型：文章、页面、链接、菜单、其他定制类型
	);
	$the_authers =  query_posts("auther={$_POST['post_author']}");
	if(!isset($_POST['this_is_edit'])){
		foreach($the_authers as $k=>$v){
			if($_POST['post_title'] == $v->post_title){
				echo "<h3>　</h3><center><h2>这个项目已经上传成功啦 ~ 请不要重复刷新页面 >_< </h2></center>";
				die;
			}
		}	
	}
	if(isset($_POST['this_is_edit'])){
		$wpdb -> update($wpdb->prefix."posts", $post, array("ID" => $_POST['this_is_edit']));	
		$pro_contest = $_POST['post_content'];
		$wpdb -> get_results("update {$wpdb->prefix}posts set post_content = '{$pro_contest}' where ID = {$_POST['this_is_edit']}");	
		$pid = $_POST['this_is_edit'];
	}else{
		$pid = wp_insert_post($post);
	}
	if($pid && isset($_POST['contest'])){
		if($_POST['contest']){	
			$arr = ['key'=>$_POST['contest'].'_pro','val'=>$pid];
			insert_user_match($arr);
		}
	}
	if($pid){
		//添加关联
		$post_meta_arr = [];
		if($_POST['show_url']) $post_meta_arr['show_url'] = $_POST['show_url'];//优酷视频
		if($_POST['teamname']) $post_meta_arr['teamname'] = $_POST['teamname'];//团队名,可以不填
		if($_POST['duration']) $post_meta_arr['duration'] = $_POST['duration'];//时间
		$post_meta_arr['this_post_type'] = 'project';//时间
		if(count($_POST['pro_user'])>0){
			if(isset($_POST['this_is_edit'])){		
				$wpdb -> delete($wpdb->prefix."postmeta",array('post_id' => $pid,'meta_key'=>'pro_users'));	
			}
			foreach($_POST['pro_user'] as $k=>$v){
				add_post_meta($pid, 'pro_users', $v.'#-user--do-#'.$_POST['pro_userdo'][$k]);
			}
		}
	    $this_file_dir = str_replace("\\","/",(dirname(dirname(dirname(__FILE__)))));//取当前绝对路径
	    $dir = '/'.'pro-include/'.date("md-Hi").'-'.rand(1,10000).'-'.$pid.'/';
	    // var_dump($dir);
		if(is_array($_FILES) && count($_FILES)>0){
			foreach($_FILES as $k=>$v){
				$mode = get_type($_FILES[$k]['name']);//取后缀
			    $fileName = $k.'_'.time().rand(1,1000).'.'.$mode;
				$pic_dir = $this_file_dir.$dir.$fileName;
				// var_dump($pic_dir);
				mkdirs($this_file_dir.$dir);
				if (move_uploaded_file($v['tmp_name'], $pic_dir)) {
					$post_meta_arr[$k] = $dir.$fileName;
		        }
			}
		}
		foreach($post_meta_arr as $k=>$v){
			// echo "add_post_meta({$pid},{$k},{$v})<br>";
			add_post_meta($pid, $k, $v);
		}
		if(isset($_POST['this_is_edit'])){
			echo "<h3>　</h3><center><h2>这个项目已经修改成功啦 ~ 点击<a href=".home_url().'/particulars/?'.$_POST['post_title']."> 这 里 </a>查看您刚刚修改的项目 , 或者点击<a href=".home_url().">这里</a>回到首页</h2></center>";
		}else{
			echo "<h3>　</h3><center><h2>这个项目已经上传成功啦 ~ 点击<a href=".home_url().'/particulars/?'.$_POST['post_title']."> 这 里 </a>查看您刚刚上传的项目 , 或者点击<a href=".home_url().">这里</a>回到首页</h2></center>";
		}
	}else{
		echo "<h3>　</h3><center><h2>这个项目已经上传成功啦 ~ 请不要重复刷新页面 >_< </h2></center>";
	}
 ?>