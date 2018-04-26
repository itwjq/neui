<?php 
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
//查询用户函数  5  每个大赛下的用户   6  查询用户
//获取指定用户id
	global $wpdb;
	/*
		match_user		每个大赛下的用户			all_user			查询用户
		platform_user		平台参与者
		
	*/
	$type=['match_user'=>5,'all_user'=>6,'platform_user'=>7];//判断传过来的值的类型
	
	switch($arg){

		case $arg['num']==$type['match_user'] :
			$id=$arg['id'].'_user';
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;	
				$sql_users="select relation_value as user_id from user_match where relation_key = '{$id}' order by id desc limit $offset,$pagesize";
				$res_users= $wpdb->get_results($sql_users,ARRAY_A);
			}else{
				$sql_users="select relation_value as user_id from user_match where relation_key = '{$id}'";
 				$res_users= $wpdb->get_results($sql_users,ARRAY_A);
			}
			break;

		case $arg['num']==$type['all_user'] :
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;	
				$sql_users="select ID as user_id from wp_users order by ID desc limit $offset,$pagesize";
				$res_users= $wpdb->get_results($sql_users,ARRAY_A);
				return $res_users;
			}else{
				$sql_users="select ID as user_id from wp_users";
 				$res_users= $wpdb->get_results($sql_users,ARRAY_A);
				return $res_users;
			}
			break;

		case $arg['num']==$type['platform_user'] :
			$id=$arg['id'].'_user';
			if($arg['page_size']){
				$pagesize=$arg['page_size'];
				//确定页数P参数
		  		$t = $_GET['t']?$_GET['t']:1;
	 	  		//数据指针
	 	  		$offset = ($t-1)*$pagesize;
	 	  		//获取每页显示数据id	
				$sql_users="select relation_value as user_id from user_platform where relation_key = '{$id}' order by id desc limit $offset,$pagesize";
				$res_users= $wpdb->get_results($sql_users,ARRAY_A);
				return $res_users;
			}else{
				$sql_users="select relation_value as user_id from user_platform where relation_key = '{$id}'";
 				$res_users= $wpdb->get_results($sql_users,ARRAY_A);
				return $res_users;
			}
			break;	
	}	

	




//*****************************************
function show_users($user_id){

?>
	<h2><?php echo $user_id; ?></h2>
<?php	
}
?>
