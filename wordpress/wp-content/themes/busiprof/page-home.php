<?php 
/*  
* Template Name: 主页
*/
	// the_post(); the_content();
$arr = getRewriteRules();
	function getRewriteRules() {   
	    global $wp_rewrite; //global重写类   
	    return $wp_rewrite->rewrite_rules();   
	}
echo '<pre>';
var_dump($arr);
echo '</pre>';
?>