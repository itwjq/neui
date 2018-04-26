<?php 
	/**
 * @package item_members
 * @version 1.0
 */
/*
Plugin Name: Members
Plugin URI: https:127.0.0.1/plugins/item_members/
Description: 参与人显示,项目显示
Author: Wujiaqi
Version: 1.0
*/
define('PROJECT_CREATOR_PATH', dirname( __FILE__ ));
define('PROJECT_CREATOR_URL', plugins_url('', __FILE__));

//引入css文件
function add_css_head() {
   
	echo '<link rel="stylesheet" href="'.PROJECT_CREATOR_URL . '/css/botchat.min.css"></link>';
	echo '<link rel="stylesheet" href="'.PROJECT_CREATOR_URL . '/css/Site.min.css"></link>';
	echo '<link rel="stylesheet" href="'.PROJECT_CREATOR_URL . '/css/translateelement.css"></link>';
}
add_action( 'wp_head', 'add_css_head' );

//引入js
function add_js_footer(){
    echo "<script src=".home_url()."/wp-content/plugins/show_members/js/jquery-1.8.3.min.js></script>";
}
add_action('wp_footer','add_js_footer');

//判断是否登录
function judge_login(){
	require PROJECT_CREATOR_PATH . '/judge_login.php';
}	
//显示参与者页面
function show_members(){
	require PROJECT_CREATOR_PATH . '/show_members.php';
}

//新版本
function show_this_project(){
	require PROJECT_CREATOR_PATH . '/show_this_project.php';
}
//测试
function show_match(){
	require PROJECT_CREATOR_PATH . '/show_match.php';
}
//参与者页面
add_shortcode("show_members","show_members");
//判断是否登录页面
add_shortcode("judge_login","judge_login");
//显示项目页面
add_shortcode("show_this_project","show_this_project");
//ceshi
add_shortcode("show_match","show_match");
 ?>
