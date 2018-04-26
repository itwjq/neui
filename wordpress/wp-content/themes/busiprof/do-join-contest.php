<?php 
	require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
	global $current_user;
    wp_get_current_user();
    if(isset($_POST['submit_do'])){
    	if($current_user->ID == 0){
    		echo 0;die;
    	}else if($_POST['submit_do'] == 'join'){
			$arr = [ 'key'=>$_POST['pageid'].'_user', 'val'=>$_POST['id']];
            insert_user_match($arr);
    	}else if($_POST['submit_do'] == 'leave'){
			$arr = [ 'key'=>$_POST['pageid'].'_user', 'val'=>$_POST['id']];
    		delete_user_match($arr);
    	}else if($_POST['submit_do'] == 'delete_pro'){
    		$arr = [ 'key'=>$_POST['pageid'].'_pro', 'val'=>$_POST['id']];
    		delete_user_match($arr);
    	}else if($_POST['submit_do'] == 'add_pro'){
			$arr = [ 'key'=>$_POST['pageid'].'_pro', 'val'=>$_POST['id']];
            insert_user_match($arr);
    	}
    	echo 1;
    }
 ?>