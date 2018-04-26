<?php 
global $wpdb;
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
if(isset($_POST['do'])){
	$do = $_POST['do'];
	//查用户
	if($do == 'getusers'){
		$uname = $_POST['username'];
		$sql_users = "SELECT user_login , ID FROM {$wpdb->prefix}users WHERE {$wpdb->prefix}users.user_login like '%{$uname}%' limit 10";
		$res = $wpdb->get_results($sql_users,ARRAY_A);
		if($res){
			echo json_encode($res);
		}
		else{
			echo 0;
		}
	}
	//查软硬件

	//
}

?>