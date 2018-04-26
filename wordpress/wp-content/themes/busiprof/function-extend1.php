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
	//创建函数 显示最新项目
	function recent_project_function(){
		require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
		global $wpdb;
		// 获取表里面的关于项目的id
		$sql = "select post_id from wp_postmeta where meta_key = 'this_post_type' and meta_value = 'project' order by post_id desc ";
		$res = $wpdb->get_results($sql,"ARRAY_A");
		// var_dump($res);
		$post_id = $res[0]['post_id'];
		// echo $post_id;
		$sql1 = "select * from  wp_posts  where ID = {$post_id} ";
		$res1 = $wpdb->get_results($sql1,"ARRAY_A");	
		// 获取表里面的关于项目的信息
		foreach ($res as $key => $value) { 

			$post = get_post($value['post_id'],ARRAY_A);
			$post_meta = get_post_meta($value['post_id']);
			$author = get_user_meta($post['post_author'],"nickname",true);

			?>
<div class="view_all__scrollerItemProject__20RRh view_all__scrollerItem__IfvA6">
	<div class="project_card__cardBorder__3AB3C project_card__card__3ZBbS cards__card__nIkNU cards__cardWithBorder__X_vK9 cards__card__nIkNU">
		<a class="project_card__imageContainer__1cw7g" href="https://www.hackster.io/PatelDarshil/updated-solar-power-station-for-arduino-e52b6f">
			<div class="project_card__itemImage__2W1r8">
				<div class="project_card__lazyImage__18nwi lazy_image__root__3J0Tw">
					<img alt="更新：Arduino的太阳能发电站" class="lazy_image__image__hVuzg lazy_image__fadeIn__1kICV" src="<?php echo home_url()."/wp-content/".$post_meta['pro_pic']['0']?>" />
				</div>
			</div>
			<div class="project_card__overlay__2W-4e">
			<span class="typography__bodyS__1HnD8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $post['post_excerpt']?></font></font></span>
			</div>
		</a>
		<div class="project_card__body__S0LrW cards__body__3yUOQ">
			<div class="project_card__contentType__3xry3 typography__headerXS__MVs_H">
				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">橱窗</font></font>
			</div>
			<a class="project_card__title__3pebx cards__title__1kNED base__darkTextLink__1jxXU base__link__1t_o9 typography__linkM__qx1dO typography__bodyM__fAsI4" href="<?php echo home_url().'/particulars/?'.$post['post_title'];?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $post['post_title']?></font></font></a>
			<div class="project_card__spacer__c1zHz cards__spacer__7dinJ"></div>
			<div>
				<a class="project_card__authorLink__1yXKr project_card__authorHeader__1e0xR typography__bodyS__1HnD8 base__textColorLink__izyDW base__link__1t_o9" href="https://www.hackster.io/PatelDarshil"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $author;?></font></font></a>
			</div>
		</div>
	</div>
</div>

		<?php }}?>
	<?php
	//注册短代码
	function register_shortcodes(){
   	add_shortcode('recent-project', 'recent_project_function');
}	
	//Hook into WordPress
	add_action( 'init', 'register_shortcodes');
