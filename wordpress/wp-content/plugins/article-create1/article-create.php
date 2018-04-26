<?php 
/*
Plugin Name: 前台发布文章
Plugin URI: 
Description: 实现前台发布文章,设置发布字段
Version: 1.0.0
Author: dongxinyu
Author URI: dongxinyu_it@163.om
*/
define('ARTICLE_CREATE_PATH', dirname( __FILE__ ));
define('ARTICLE_CREATE_URL', plugins_url('', __FILE__));
include(ARTICLE_CREATE_PATH.'/functions.php');
// define('TEMURL', get_template_directory());

//引入文件
function add_assets_to_head() {
    // echo '<link rel="stylesheet" href="'.home_url().'/wp-content/themes/busiprof/css/bootstrap.min.css" />';
    // echo '<link rel="stylesheet" href="'.ARTICLE_CREATE_URL . '/assets/css/1.css"></link>';
	echo "<script src=".home_url()."/wp-includes/js/jquery/jquery-1.8.3.min.js></script>";
}
add_action( 'wp_head', 'add_assets_to_head' );

//引入js文件
function add_assets_to_footer(){
 //    echo '<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>';
    // echo '<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
    // echo '<script src="'.ARTICLE_CREATE_URL . '/assets/js/1.js"></script>';
}
add_action('wp_footer','add_assets_to_footer');

//创建项目页面
function do_create_project($arg){
    require ARTICLE_CREATE_PATH . '/projectCreateTags.php';
}
//上传项目页面
function do_submit_project(){
    require ARTICLE_CREATE_PATH . '/do_submit.php';
}

//注册创建项目页面
add_shortcode("create-project","do_create_project");
//注册创建项目提交页面
add_shortcode("submit-project","do_submit_project");

 function add_stylesheet_to_head() {
    // echo "<link href='http://fonts.useso.com/css?family=Open+Sans:300,400,600&subset=latin,latin-ext' rel='stylesheet'>";
}
 add_action( 'wp_head', 'add_stylesheet_to_head' );

// 显示主菜单和子菜单
add_action('admin_menu','add_settings_menu');
function add_settings_menu() {
    add_menu_page(__(''), __('前台文章'), 'administrator',  __FILE__, 'my_function_menu', plugin_dir_url( __FILE__ ).'images/article-create-logo.jpg', 100);
    add_submenu_page(__FILE__,'','创建项目设置', 'administrator', '创建项目字段设置', 'my_function_submenu1');
    // add_submenu_page(__FILE__,'','*', 'administrator', '*', 'my_function_submenu2');
    // add_submenu_page(__FILE__,'','*', 'administrator', '*', 'my_function_submenu3');
}
function my_function_menu() {
  echo "<h2>　</h2>";
}
function my_function_submenu1() {
   echo "<h2>　</h2>";
}
// function my_function_submenu2() {
//     echo "<h2>　</h2>";
// }
// function my_function_submenu3() {
//     echo "<h2>　</h2>";
// }

//
?>
<?php 
	function jump_login(){
	// js代码实现3秒钟后跳转登录页 -->
?>
    <script>
        var sectime = 3;
        var timmer = setInterval(function(){
            $(".jump").html('请先登录, '+sectime+" 秒后跳转到登录页面");
            if(sectime == 1)
                {
                    clearInterval(timmer);
                    location.href = "<?php echo home_url()?>/login/";
                }
            sectime--;          
        },1000)
    </script>
<?php    
	}
 ?>