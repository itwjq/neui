<?php
	// 全部项目页单位项目显示
	require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
	//注册短代码
   	add_shortcode('show-project', 'show_project_function');
	function show_project_function($pro_id){
		global $wpdb;
			$res_pro = get_post($pro_id,ARRAY_A);
			$post_meta = get_post_meta($pro_id);
		    $author = get_user_meta($res_pro['post_author'],"nickname",true);
		    eve_project($res_pro,$post_meta,$author);
		 }   
?>	
<?php 
	// 全部项目页单个项目样式样式
	function eve_project($res_pro,$post_meta,$author){
	?>
<div  style="margin-top:20px;" class="grid__cellFlex__3HSIm grid__cell__1trkS">
   <div class="project_card__wrapper__1PrMs cards__wrapper__ybxCu">
      <div class="project_card__cardBorder__3AB3C project_card__card__3ZBbS cards__card__nIkNU cards__cardWithBorder__X_vK9 cards__card__nIkNU">
	         <a class="project_card__imageContainer__1cw7g" target="_blank" href="<?php echo home_url().'/particulars/'.$res_pro['ID'];?>">
	            <div class="project_card__itemImage__2W1r8">
	                <div class="project_card__lazyImage__18nwi lazy_image__root__3J0Tw">
	                  <img alt="" class="lazy_image__image__hVuzg lazy_image__fadeIn__1kICV" src="<?php echo home_url()."/wp-content/".$post_meta['pro_pic']['0']?>" />
	                </div>
	            </div>
	            <div class="project_card__overlay__2W-4e">
		            <span class="typography__bodyS__1HnD8">
			            <font style="vertical-align: inherit;">
				            <font style="vertical-align: inherit;">
				            </font>
				            <font style="vertical-align: inherit;"><?php echo $res_pro['post_excerpt']?>
				            </font>
			            </font>
		            </span>
	            </div>
	         </a>
        	<div class="project_card__body__S0LrW cards__body__3yUOQ">
		            <div class="project_card__contentType__3xry3 typography__headerXS__MVs_H">
		              <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WIP</font></font>
		            </div>
	         	 		<a class="project_card__title__3pebx cards__title__1kNED base__darkTextLink__1jxXU base__link__1t_o9 typography__linkM__qx1dO typography__bodyM__fAsI4" href="<?php echo home_url().'/particulars/?'.$post['post_title'];?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $res_pro['post_title']?></font></font></a>
	          		<div class="project_card__spacer__c1zHz cards__spacer__7dinJ">
	          		</div>
		            <div>
		              <a class="project_card__authorLink__1yXKr project_card__authorHeader__1e0xR typography__bodyS__1HnD8 base__textColorLink__izyDW base__link__1t_o9" href="/deyyan"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $author;?></font></font></a>
		            </div>
	        	</div>
       		</div>
		</div>
	</div>
<?php }?>

<?php
	// 显示参赛下的项目
	function show_contest_project($pro_id){
		global $wpdb;
			$res_pro = get_post($pro_id,ARRAY_A);
			$post_meta = get_post_meta($pro_id);
		    $author = get_user_meta($res_pro['post_author'],"nickname",true);
		    contest_project($res_pro,$post_meta,$author);
		 }   
?>	
<?php 
	// 显示参赛下项目样式
	function contest_project($res_pro,$post_meta,$author){
	?>
<div  style="margin-top:20px;" class="mobile-scroll-row-item project-thumb-container col-sm-6 col-md-4 col-lg-3 has-data">
   <div class="project_card__wrapper__1PrMs cards__wrapper__ybxCu">
      <div class="project_card__cardBorder__3AB3C project_card__card__3ZBbS cards__card__nIkNU cards__cardWithBorder__X_vK9 cards__card__nIkNU">
	         <a class="project_card__imageContainer__1cw7g" target="_blank" href="<?php echo home_url().'/particulars/'.$res_pro['ID'];?>">
	            <div class="project_card__itemImage__2W1r8">
	                <div class="project_card__lazyImage__18nwi lazy_image__root__3J0Tw">
	                  <img alt="" class="lazy_image__image__hVuzg lazy_image__fadeIn__1kICV" src="<?php echo home_url()."/wp-content/".$post_meta['pro_pic']['0']?>" />
	                </div>
	            </div>
	            <div class="project_card__overlay__2W-4e">
		            <span class="typography__bodyS__1HnD8">
			            <font style="vertical-align: inherit;">
				            <font style="vertical-align: inherit;">
				            </font>
				            <font style="vertical-align: inherit;"><?php echo $res_pro['post_excerpt']?>
				            </font>
			            </font>
		            </span>
	            </div>
	         </a>
        	<div class="project_card__body__S0LrW cards__body__3yUOQ">
		            <div class="project_card__contentType__3xry3 typography__headerXS__MVs_H">
		              <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">WIP</font></font>
		            </div>
	         	 		<a class="project_card__title__3pebx cards__title__1kNED base__darkTextLink__1jxXU base__link__1t_o9 typography__linkM__qx1dO typography__bodyM__fAsI4" href="<?php echo home_url().'/particulars/?'.$post['post_title'];?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $res_pro['post_title']?></font></font></a>
	          		<div class="project_card__spacer__c1zHz cards__spacer__7dinJ">
	          		</div>
		            <div>
		              <a class="project_card__authorLink__1yXKr project_card__authorHeader__1e0xR typography__bodyS__1HnD8 base__textColorLink__izyDW base__link__1t_o9" href="/deyyan"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $author;?></font></font></a>
		            </div>
	        	</div>
       		</div>
		</div>
	</div>
<?php }?>
<?php
	//创建函数 显示最新（首页）项目
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
		<a class="project_card__imageContainer__1cw7g" target="_blank" href="<?php echo home_url().'/particulars/'.$post['ID'];?>">
			<div class="project_card__itemImage__2W1r8">
				<div class="project_card__lazyImage__18nwi lazy_image__root__3J0Tw">
					<img alt="更新：" class="lazy_image__image__hVuzg lazy_image__fadeIn__1kICV" src="<?php echo home_url()."/wp-content/".$post_meta['pro_pic']['0']?>" />
				</div>
			</div>
			<div class="project_card__overlay__2W-4e">
			<span class="typography__bodyS__1HnD8"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $post['post_excerpt']?></font></font></span>
			</div>
		</a>
		<div class="project_card__body__S0LrW cards__body__3yUOQ">
			<div class="project_card__contentType__3xry3 typography__headerXS__MVs_H">
				<!--<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">橱窗</font></font>-->
			</div>
			<a class="project_card__title__3pebx cards__title__1kNED base__darkTextLink__1jxXU base__link__1t_o9 typography__linkM__qx1dO typography__bodyM__fAsI4" href="<?php echo home_url().'/particulars/'.$post['ID'];?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $post['post_title']?></font></font></a>
			<div class="project_card__spacer__c1zHz cards__spacer__7dinJ"></div>
			<div>
				<a class="project_card__authorLink__1yXKr project_card__authorHeader__1e0xR typography__bodyS__1HnD8 base__textColorLink__izyDW base__link__1t_o9" href="<?php echo home_url().'/particulars/'.$post['ID'];?>"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $author;?></font></font></a>
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
?>

<?php
/**
 * 参与者函数
 */
	// 参与者展示
	function show_participants($user_id){
		echo $user_id;
		global $wpdb;
		// 参与者信息
		$sql = "select * from wp_users where ID = ".$user_id;
		$res = $wpdb->get_results($sql,"ARRAY_A");
		// 图片信息
		$sql1 = "select meta_value from wp_usermeta where user_id='{$user_id}' and meta_key='profile_photo'";
		$res1 = $wpdb->get_results($sql1,"ARRAY_A");
		one_participant($res,$res1);
		}

?>
<?php 
	function one_participant($res,$res1){
		
?>
<?php 
if($res1['0']['meta_value'])
	$user_pic = home_url()."/wp-content/uploads/ultimatemember/2/".$res1['0']['meta_value'];
else
	$user_pic = home_url()."/wp-content/uploads/ultimatemember/default/default.png";
?>
<div class="col-sm-6 col-md-4 col-lg-3">
	<div class="user-card media">
		<div class="media-left">
				<a href="/harshbamoriacool"><img class="img-circle media-object" srcset="" alt="苛刻的Bamoria" src="<?php echo $user_pic?>" /></a>
		</div>
		<div class="media-body">
				<h3 class="hckui__typography__h3"><a class="hckui__typography__link" href="/harshbamoriacool"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $res['0']['display_name']?></font></font></a> </h3>
 			<div class="hckui__typography__bodyS hckui__typography__pebble">
  				<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0个项目•0个关注者</font></font>
 			</div>
	        <div class="hckui__layout__marginTop15">
	          	<span style="display:inline-block;vertical-align:bottom;margin-right:10px"><span data-hypernova-key="UserRelationButton" data-hypernova-id="c7444fd5-994a-450f-ae0c-65d6d03eee18"><button class="hckui__buttons__sm" type="button" data-reactroot=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">跟随</font></font></button></span> <script type="application/json" data-hypernova-key="UserRelationButton" data-hypernova-id="c7444fd5-994a-450f-ae0c-65d6d03eee18"><!--{"id":461279,"type":"followed_user_global_ui"}--></script>
	          	</span>
	         		<a class="hckui__buttons__sm hckui__buttons__secondary reactPortal" action="SigninDialog" data-redirect-to="/messages/new?recipient_id=461279" data-source="user_contact" data-react="{&quot;currentPanel&quot;:&quot;signup&quot;,&quot;simplified&quot;:true}" href=""><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">联系</font></font></a>
        	</div>
		</div>
	</div>
</div>
<?php }?>




