<?php 
	/**
 * @package select-user-pro-paging
 * @version 1.0
 */
/*
Plugin Name: user-pro-paging
Plugin URI: www.wjq.com
Description: 查询每个用户下的项目/所有项目/大赛下的项目/平台下项目/大赛下用户/平台用户/所有用户
Author: Wujiaqi
Version: 1.0
*/
define('PROJECT_CREATOR_PATH', dirname( __FILE__ ));
define('PROJECT_CREATOR_URL', plugins_url('', __FILE__));

//分页
function show_page($arg){
	require PROJECT_CREATOR_PATH . '/show_paging.php';
}

//查询项目
function select_item_type($arg){
	require PROJECT_CREATOR_PATH . '/select-item-type.php';
	return $res_projects;

}

//查询参与者 
function select_user_type($arg){
	require PROJECT_CREATOR_PATH . '/select-user-type.php';
	// var_dump($res_users);
	// die;
	return $res_users;
}

//显示项目
function show_class_item($arg){
	require PROJECT_CREATOR_PATH . '/show-class-item.php';
}

// 显示参与者
function show_class_user($arg){
	require PROJECT_CREATOR_PATH . '/show-class-user.php';
}

//分页
add_shortcode("show-page","show_page");

//查询项目
add_shortcode("show-class-item","show_class_item");

//查询用户 
add_shortcode("show-class-user","show_class_user");

 ?>
