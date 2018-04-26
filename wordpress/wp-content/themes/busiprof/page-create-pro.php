<?php 
/* 	
* Template Name: 创建项目
*/
 ?>
<?php get_header(); ?>
<h2>　</h2>
<?php 
	if(isset($_POST['post_author'])){
		//引入处理页
		echo do_shortcode('[submit-project]');
	}else{
		//引入创建项目框
		echo do_shortcode('[create-project]');
	}
 ?>
<h2>　</h2>
<?php get_footer();  ?>   