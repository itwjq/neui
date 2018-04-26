<?php 
	require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
	global $wpdb;

	if(isset($_POST['username'])){
		$uname = $_POST['username'];
		if($uname == ''){
			$sql = "select ID as uid , user_login as uname from wp_users";
			// echo json_encode($_POST);
		}else{
			$sql = "select ID as uid , user_login as uname from wp_users where user_login like '%{$uname}%'";
			// echo json_encode($sql);
		}
	}else{
		$sql = "select ID as uid , user_login as uname from wp_users";
		// echo 1;
	}

    $res = $wpdb->get_results($sql,ARRAY_A);
	if($res){
		echo json_encode($res);
	}else{
		echo 0;
	}
 ?>