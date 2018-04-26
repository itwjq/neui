<?php
/*
Plugin Name: Project-Creator
Plugin URI: http://zhangdalin.me/project-creator.html
Description: 创建项目
Version: 0.0.1
Author: zhangdalin
Author URI: http://zhangdalin.me
*/
define('ARTICLE_CREATE_PATH', dirname( __FILE__ ));
define('ARTICLE_CREATE_URL', plugins_url('', __FILE__));

//引入css文件
function add_assets_to_head() {
    echo '<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css" />';
	echo '<link rel="stylesheet" href="'.ARTICLE_CREATE_URL . '/assets/css/1.css"></link>';
}
add_action( 'wp_head', 'add_assets_to_head' );

//引入js文件
function add_assets_to_footer(){
	echo '<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>';
	echo '<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
	// echo '<script src="'.ARTICLE_CREATE_URL . '/assets/js/1.js"></script>';
	
}
add_action('wp_footer','add_assets_to_footer');

//创建项目页面
function create_project(){
	//如果有POST变量
	if($_POST){
		// echo 123;
		// die;
		require ARTICLE_CREATE_PATH . '/submit_post.php';
		exit;
	}
	// die('sdfghjkl;');
	require ARTICLE_CREATE_PATH . '/create_project.php';
}

//创建编辑项目页面
function project_creator2(){
	echo "9999999";
}

//创建删除项目页面
function del_pro(){
	require ARTICLE_CREATE_PATH . '/del_pro.php';
}

//注册短网址
//注册创建项目页面
add_shortcode("create-project","create_project");
//注册编辑项目页面
add_shortcode("edit_project","project_creator2");
//注册删除项目页面
add_shortcode("del-project","del_pro");




 function add_stylesheet_to_head() {
    // echo "<link href='http://fonts.useso.com/css?family=Open+Sans:300,400,600&subset=latin,latin-ext' rel='stylesheet'>";
}
 add_action( 'wp_head', 'add_stylesheet_to_head' );


?>