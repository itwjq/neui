<?php 
// Template Name: 实验插件
?>
<?php 
	// get_header();
$arg = array(
        'type' => 'post',
        'parent' => 21,
        'hide_empty' => 0,
        'hierarchical' => 0,
        'exclude' => '',
        'include' => '',
        'number' => '1',
        'taxonomy' => 'category',
        'pad_counts' => false
    );
$types = get_categories( $arg );
$pros = sel_pros(22);
$users = sel_users(22);
echo '<pre>';
// var_dump($pros);
var_dump($users);
// var_dump($types);
echo '</pre>';
?>