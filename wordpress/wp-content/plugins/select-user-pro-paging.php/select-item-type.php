<?php 
	require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
	//返回项目id数组
	global $wpdb;
	global $current_user;
	/*
		每个用户下的项目 		每个用户下的项目 		match_item 			查询每个大赛下的项目 	
		all_item  				查询所有项目			platform_item		平台项目
	*/
	//判断传来的值的类型
	$type=['user_item'=>0,'match_item'=>1,'all_item'=>2,'platform_item'=>3];  
	$uid=$_GET['uid']?$_GET['uid']:$current_user->ID;
	switch($arg){
		// 每个用户下的项目
		case $arg['num']==$type['user_item'] :
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;	
				$numbers="select post_id as pro_id  from wp_postmeta where meta_key='pro_users' and meta_value like '{$uid}#-user--do-#%' order by meta_id desc limit $offset,$pagesize ";
				$res_projects = $wpdb->get_results($numbers,ARRAY_A);
			}else{
				$numbers="select post_id as pro_id from wp_postmeta where meta_key='pro_users' and meta_value like '{$uid}#-user--do-#%'";
				$res_projects = $wpdb->get_results($numbers,ARRAY_A);
				
			}

			return $res_projects;
			break;
		// 查询每个大赛下的项目
		case $arg['num']==$type['match_item'] :
			$id=$arg['id'].'_pro';
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;	
				$sql_projects="select relation_value as pro_id from user_match where relation_key = '{$id}' order by id desc limit $offset,$pagesize";
				$res_projects= $wpdb->get_results($sql_projects,ARRAY_A);
			}else{
				$sql_projects="select relation_value as pro_id from user_match where relation_key = '{$id}'";
	 			$res_projects= $wpdb->get_results($sql_projects,ARRAY_A);
				return $res_projects;
			}
			break;
		//查询所有项目 
		case $arg['num']==$type['all_item'] :
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;	
				$sql_projects="select post_id as pro_id from wp_postmeta where meta_key='this_post_type' and meta_value='project' order by meta_id desc limit $offset,$pagesize";
				$res_projects= $wpdb->get_results($sql_projects,ARRAY_A);
				return $res_projects;
			}else{
				$sql_projects="select post_id as pro_id from wp_postmeta where meta_key='this_post_type' and meta_value='project'";
				$res_projects= $wpdb->get_results($sql_projects,ARRAY_A);
				return $res_projects;
			}	
			break;
		//平台项目 
		case $arg['num']==$type['platform_item'] :
			$id=$arg['id'].'_pro';
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;	
				$sql_projects="select relation_value as pro_id from user_platform where relation_key = '{$id}' order by id desc limit $offset,$pagesize";
				$res_projects= $wpdb->get_results($sql_projects,ARRAY_A);
				return $res_projects;
			}else{
				$sql_projects="select relation_value as pro_id from user_platform where relation_key = '{$id}'";
	 			$res_projects= $wpdb->get_results($sql_projects,ARRAY_A);
				return $res_projects;
			}
			break;
	}
 ?>
