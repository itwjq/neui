<?php 
/* 	
* Template Name: none
*/
get_header();
get_template_part('index', 'bannerstrip');
// 输出文章内容
the_post(); the_content();
 ?>