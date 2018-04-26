<?php
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );

/****************************************************************
*加入比赛功能
/***************************************************************/
function join_content($contestid,$userid){
	global $wpdb;
	if($wpdb -> insert("user_match", array("relation_key" => $contestid,"relation_value" => $userid ))){
		return true;
	}else{
		return false;
	}
}

/****************************************************************
*引入头文件
/***************************************************************/
function get_include_head(){
  include(dirname(__FILE__).'/page-head-include.php');
}
/****************************************************************
*返回当前页面的父页面ID(比赛ID)
/***************************************************************/
function get_this_contestid(){
	//获取当前页面父页ID(比赛简介ID)
	$parent_page_id = get_post(get_the_ID(),ARRAY_A);
	return $parent_page_id['post_parent'];
}

/****************************************************************
*显示比赛页面公共头
/***************************************************************/
function show_contests_head(){	
	//获取当前页面父页ID(比赛简介ID)
	$parent_page_id = get_this_contestid();
	//当前比赛信息
	$contest_info = get_post($parent_page_id,ARRAY_A);
	// var_dump($contest_info);
	//显示大赛图片//图片ID号
	$contest_background = get_post_meta($parent_page_id,'contest_background',true);
	echo "<img src = '".get_the_guid($contest_background,true)."' style='width:100%;height:400px'>";
	get_thispage_menu(get_the_ID());
}
//注册短代码-->显示比赛页面公共头
add_shortcode( 'show-contests-head', 'show_contests_head' );

/****************************************************************
*判断user_match表内是否有数据
/***************************************************************/
function is_join_contest($arr){
	global $wpdb;
    $res = $wpdb->get_var("select id from user_match where relation_key = '{$arr['key']}' and relation_value = '{$arr['val']}'");
    return $res;
}
?>
<?php

/****************************************************************
*输出当前页导航栏
/***************************************************************/
function get_thispage_menu($pageid){
	global $wpdb;
	// //引入样式文件
    // echo "<link rel='stylesheet' href='".dirname(__FILE__)."/css/style-extend.css />";
	//查当前页所在菜单id
	$menuid =  $wpdb->get_var( "select post_id from {$wpdb->prefix}postmeta where meta_key = '_menu_item_object_id' and meta_value = {$pageid} " );
	//查当前菜单父级菜单
	$parent_menu_name = $wpdb->get_var( "select name from {$wpdb->prefix}terms where term_id = (select term_taxonomy_id from {$wpdb->prefix}term_relationships where object_id = {$menuid} )" );
	//所有菜单
	$arg = array(
		'menu' => $parent_menu_name,
		'depth' => 1,
		// 'container' => ,//(字符串)(可选) 默认值: div ul 父节点（这里指导航菜单的容器）的标签类型 可以用false（container => false）去掉ul父节点标签。
		// 'container_class' => 'menu-contest-box', //默认值: menu-{menu slug}-container ul 父节点的 class 属性值。
		'container_class' => 'group-nav-inner hidden-xs', //默认值: menu-{menu slug}-container ul 父节点的 class 属性值。
		'container_id'=> 'menu-contest',//默认值: None ul 父节点的 id 属性值。
		// 'menu_class'=> 'menu-contest-ul',//默认值: menu ul 节点的 class 属性值。
		'menu_class'=> 'nav nav-tabs',//默认值: menu ul 节点的 class 属性值。
		'menu_id'=> 'menu-contest-ul-id',//(字符串)(可选) 默认值: menu slug, 自增长的 ul 节点的 id 属性值。
		// 'echo'=> false,//(布尔型)(可选) 默认值: true (直接显示) 确定直接显示导航菜单还是返回 HTML 片段，如果想将导航的代码作为赋值使用，可设置为false。
		// 'fallback_cb'=> //(字符串)(可选)默认值: wp_page_menu (显示页面列表作为菜单) 用于没有在后台设置导航时调的回调函数。
		// 'before'=> //(字符串)(可选) 默认值: None 显示在每个菜单链接前的文本。
		// 'after'=> //(字符串)(可选) 默认值: None 显示在每个菜单链接后的文本。
		// 'link_before'=> //(字符串)(可选) 默认值: None 显示在每个菜单链接文本前的文本。
		// $link_after=> //(字符串)(可选) 默认值: None 显示在每个菜单链接文本后的文本。
		// 'items_wrap'=> none//(字符串)(可选)默认值: None 使用字符串替换修改ul的class。
	);
	$res = wp_nav_menu( $arg );
	return $res;
} ?>
<?php

/****************************************************************
*返回指定标题对应的文章id
/***************************************************************/
function find_thistitle_postid($title){
	global $wpdb;
	$ID = $wpdb->get_var( "select ID from {$wpdb->prefix}posts where post_title = '{$title}' ");
	return $ID;
	// return "select ID from {$wpdb->prefix}posts where post_title = '{$title}' ";
}
/****************************************************************
*当前用户加入当前比赛
/***************************************************************/
function user_join_contest(){
	global $wpdb;
	require( dirname( __FILE__ ) . '/join-contest.php');
	// return "select ID from {$wpdb->prefix}posts where post_title = '{$title}' ";
}
//注册用户加入比赛短代码
add_shortcode('user-join-contest', 'user_join_contest');
//注册用户加入比赛短代码
add_shortcode('add-sel-pros-model', 'add_sel_pros_model');
/****************************************************************
*取当前用户创建的所有项目
/***************************************************************/
function get_this_users_pros($uid){
	global $wpdb;
	$sql = "select post_title as title , ID as pro_id from {$wpdb->prefix}posts as a join {$wpdb->prefix}postmeta as b where a.post_author = {$uid} and a.ID = b.post_id and b.meta_key = 'this_post_type' and b.meta_value = 'project'";
	$res = $wpdb->get_results($sql,ARRAY_A);
	return $res;
}
/****************************************************************
*引入模态框
/***************************************************************/
function add_sel_pros_model(){
?>	
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin-top:15%">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" id="myModalLabel">提交比赛项目</h4>
            </div>
            <div class="modal-body">
                <div class="">
                    <p>用现有的项目参赛吗? 您可以请选择一个您提交过的项目</p>
                    <select name="pro_id" id="project_id" class="form-control mg-10">
                        <?php 
                            global $current_user;
                            wp_get_current_user();
                            //查该用户提交的所有项目
                            $this_user_pro = get_this_users_pros($current_user->ID);
                            if(count($this_user_pro) > 0){
                                foreach($this_user_pro as $v){
                         ?>
                            <option value="<?php echo $v['pro_id'] ?>"><?php echo $v['title'] ?></option>
                        <?php }}else{ ?>
                            <option value="">您还没有项目</option>
                        <?php } ?>
                    </select>
                    <a id="add_pro" name="commit" class="btn btn-primary">提交这个项目参赛</a>
                    <div class="hr"> 或 者 </div>
                    <p>还没提交过项目?</p>

                    <a class="btn btn-secondary" href="<?php echo home_url().'/create-pro/?'.get_this_contestid() ?>">现在就去创建一个项目</a>
                    <p class="text-muted" style="margin-top:20px;font-size:14px">*注意 : 点击这个传送门创建的项目将自动报名参赛</p>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>
<?php
}
/****************************************************************
*加入对user_match表的插入操作
/***************************************************************/
function insert_user_match($arr){
	global $wpdb;
	if(!is_join_contest($arr)){
		return $wpdb -> insert("user_match", array("relation_key" => $arr['key'],"relation_value" => $arr['val']));
	}
}
/****************************************************************
*加入对user_match表的删除操作
/***************************************************************/
function delete_user_match($arr){
	global $wpdb;
	return $wpdb -> delete("user_match",  array("relation_key" => $arr['key'],"relation_value" => $arr['val']));
}
/****************************************************************
*输出项目详情
/***************************************************************/
function show_project_particular(){
	global $wpdb;
	global $current_user;
	wp_get_current_user();
	//取项目id
	$pro_id = get_query_var('proid');
	if(!this_post_is_project($pro_id)){
		get_header();
		die("<br><br><br><br><center><h2>您访问的项目不存在{$pro_id}</h2></center>");
	}
	$pro = get_post($pro_id,ARRAY_A);
	$res = $wpdb->get_results("select meta_key , meta_value from {$wpdb->prefix}postmeta where post_id = {$pro_id}",ARRAY_A);
	foreach($res as $k=>$v){
		if($v['meta_key'] == 'pro_users') $pro_meta['pro_users'][] = $v['meta_value'];
		else if($v['meta_key'] == 'pro_thing_h') $pro_meta['pro_thing_h'][] = $v['meta_value'];
		else if($v['meta_key'] == 'pro_thing_s') $pro_meta['pro_thing_s'][] = $v['meta_value'];
		else $pro_meta[$v['meta_key']] = $v['meta_value'];
	}
	if($current_user->ID == $pro['post_author']){
		require(dirname( __FILE__ )."/page-extend/pro-edit-info.php");	
	}
	//项目详情
	require(dirname( __FILE__ )."/page-extend/proinfo.php");
}
?>

<?php
/****************************************************************
*显示所有比赛框函数
/***************************************************************/
function show_all_contests(){	
	$posts = get_children(get_the_ID(),ARRAY_A);
	if($posts){
		foreach($posts as $k => $v){
			$value = get_post_meta($v['ID']);
?>		
			<div class="challenge-thumb-full">
			    <div class="row">
			        <div class="col-md-3 col-sm-4 details-container">
			            <div class="details">
			                <h4>
							   <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
							   <a href="<?php echo get_permalink($v['ID']).get_post_meta($v['ID'],'contest_url',true); ?>"><?php echo $v['post_title'] ?></a>
							   </font></font>
							   </a>
							</h4>
			                <div class="small challenge-sponsors">
							    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"></font></font>
							    <strong><a href="javascript:void(0)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $value['contest_brief']['0'] ?></font></font></a></strong>
							</div>
		                    <div class="bottom">
							    <div class="date">
									<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">参与时间为</font></font>
									<br />
									<!-- <strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><a href="<?php //the_permalink(); ?>"><time datetime=""><?php //the_time('M j,Y');?></time></a></font></font></strong> -->
									<strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><time datetime=""><?php echo get_post_meta($v['ID'],'end_time',true); ?></time></font></font></strong>
							    </div>
								<a class="btn btn-primary" href="<?php echo get_permalink($v['ID']).get_post_meta($v['ID'],'contest_url',true); ?>">参加比赛</a>
							</div>
			            </div>
			        </div>
			        <div class="col-md-9 col-sm-8 hidden-xs">
			            <div class="row">
			            	<!-- 比赛展示图片 -->
			                <div class="col-md-9 col-sm-8">
								<?php 
									$contest_bg_id = get_post_meta($v['ID'],'contest_background',true);
									$contest_bg = get_the_guid($contest_bg_id,'guid',true);
								 ?>
			                    <div class="cover img-loader loaded" style="background-image: url(<?php echo $contest_bg; ?>?auto=compress%2Cformat&w=600&h=300&fit=min);"></div>
			                </div>
			                <!-- 奖品 -->
			                <div class="col-md-3 col-sm-4">
			                    <div class="prize">
			                        <div>
			                			<?php for($i = 0;$i<10;$i++){ ?>
			                            <?php 
											$prize_word = get_post_meta($v['ID'],'prize_word_'.$i,true);
											$prize_pic_id = get_post_meta($v['ID'],'prize_pic_'.$i,true);
											if($prize_pic_id){
												$prize_pic = get_the_guid($prize_pic_id,'guid',true);
												break;
											}else if($prize_word){
												break;
											}else{
												$prize_pic = '';
											}
										?>
										<?php 
											}
										?>
			                            <h5>
			                                <i class="fa fa-star"></i>
			                                <span>最高奖励</span>
			                            </h5>
			                        </div>
			                        <img alt="Top prize" class="img-loader loaded" src="<?php echo $prize_pic ?>">
			                        <div class="description"><?php echo $prize_word; ?></div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
		    </div>

<?php	
		}
	}
}
//注册短代码-->显示所有比赛框
add_shortcode( 'show-all-contests', 'show_all_contests' );

//跳转首页
add_shortcode('go-home', 'go_home');
function go_home(){
	header("Location:".home_url()."");
}
/**************************************************
*判断是不是项目
**************************************************/
function this_post_is_project($pid = 0){
	global $wpdb;
	return $wpdb->get_results("select meta_id from {$wpdb->prefix}postmeta where meta_key = 'this_post_type' and meta_value = 'project' and post_id = {$pid}");
}

//添加路由规则  
function add_rewrite_rules($aRules) {
	$aNewRules = array(
		'platforms/([^/]+)/?$' => 'index.php?pagename=platforms&platform_id=$matches[1]',
		'user-info/([^/]+)/?$' => 'index.php?pagename=user-info&uid=$matches[1]',
		'particulars/([^/]+)/?$' => 'index.php?pagename=particulars&proid=$matches[1]'
	);
	$aRules = $aNewRules + $aRules;
	return $aRules;
}
add_filter('rewrite_rules_array', 'add_rewrite_rules');
 
function add_query_vars($aVars) {
	$aVars[] = "platform_id";
	$aVars[] = "uid";
	$aVars[] = "proid";
	return $aVars;
}
add_filter('query_vars', 'add_query_vars');