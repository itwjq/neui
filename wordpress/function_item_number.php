<?php 
//每个参与者的项目个数函数
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
function select_item_number($uid){
	global $wpdb;
	$numbers="select * from wp_postmeta where meta_value like '%{$uid}#-user--do-#%'";
	$this_user_pronum = $wpdb->get_results($numbers,ARRAY_A);
	return $this_user_pronum;
}
add_shortcode( 'select_match_user_item', 'select_item_number' );

// 查询
 function select_data( $range ) {
   global $wpdb;
     $pagesize = 1;
 	//确定页数P参数
 	$t = $_GET['t']?$_GET['t']:1;
 	//数据指针
	$offset = ($t-1)*$pagesize;
	if($range=='303_user'){
		//获取数据库中人数
    	$sql_brabch="select * from user_match where relation_key='{$range}' order by id desc limit $offset,$pagesize";
    	//获取数据个数
   		$res_brabch=$wpdb->get_results($sql_branch,ARRAY_A);
	}else if($range=='303_pro'){
		$sql_brabch="select relation_value from user_match where relation_key = '{$range}' order by id desc limit $offset,$pagesize";
		$res_brabch = $wpdb->get_results($sql_brabch,ARRAY_A);
	}else{
		echo ".......";
 	}
 	return $res_brabch;

// }	
?>

	
<!-- <?php
	//分页
	function branch_pages_all($data){
	global $wpdb; 
    $number= count($wpdb->get_results("select id from user_match where relation_key='{$data}'",ARRAY_A));
    $pagenum = ceil($number/$pagesize);
    echo '共',$number,"个项目";
   echo "123456";
  ?>
<?php  
	}
 ?>

