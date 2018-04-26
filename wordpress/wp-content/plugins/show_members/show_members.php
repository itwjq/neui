<?php
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
global $wpdb;
global $current_user;
global $post;
    $uid=$current_user->ID;
    //获取当前页的父id  当前为参与者页
    $parent_id = $post -> post_parent;
    $mid=$parent_id.'_user';
   $arg=['num'=>5,'id'=>$mid,'page_size'=>24];
	$res_member = show_class_user($arg);
    //判断是否有值
    if(!$res_member){
    	echo "<h2>还没有人报名，请稍后再试！</h2>";
    }	
   	//获取所有参赛人员的详细信息
   	for ($i=0; $i < count($res_member); $i++) {
   		//每个参与者下的项目数 
		$this_user_pronum = select_item_number($res_member[$i]['relation_value']);
   		$user_information="select * from wp_users where ID='{$res_member[$i]['relation_value']}'";
   		$res_information[]=$wpdb->get_results($user_information,ARRAY_A);
   		//获取参与者昵称
   		$res_member[$i]['name']=$res_information[$i][0]['user_nicename'];
   		//获取参与者头像
   		$ids=$res_member[$i]['relation_value'];
   		$user_img="select meta_value from wp_usermeta where user_id='{$ids}' and meta_key='profile_photo'";
   		$res_img = $wpdb->get_results($user_img,ARRAY_A);
   		$res_member[$i]['pic']=$res_img[0]['meta_value'];
   		//参与者参与的项目数量
   		$res_member[$i]['pro_num'] = count($this_user_pronum);
   		$users=get_avatar( get_the_author_meta('ID'),$res_member[$i]['relation_value']);
   	}
?>
<style>
		.media-left img{
			width:90px;
			height:55px;
			border-radius: 50%;
		}
	</style>


<section class="main-section">
	<div class="container">
		<div class="container">
			<div class="row equal-columns">
   				<?php 
					if($res_member){
					foreach ($res_member as $data){ 
				?>
   				<div class=" col-lg-3" style="width:270px;">
   					<div class="user-card media" style="float:right;margin-right:20px">
   						<!-- 图片 --><center>
       					<div class="media-left">
           					<a href="#">
					<?php if(!$data['pic']){ ?>
		           		<img alt="" src="<?php echo home_url()?>/wp-content/uploads/ultimatemember/default/default.png"/>
		           	<?php }else{ ?>
		           		<img alt="" src="<?php echo home_url()?>/wp-content/uploads/ultimatemember/<?php echo $data['relation_value'] ?>/<?php echo $data['pic']; ?>"/>
		           	<?php } ?>		
		        </a>
		    </div>
		    <!-- 信息 -->
		    <div class="media-body" style="width:150px;height:130px;margin-top:7px">
		       	<h3 class="hckui__typography__h3" style="font-size:17px; line-height:32px;margin:0px 0px 5px">
		           	<a class="hckui__typography__link" href="<?php echo home_url()?>/user-2/<?php echo $data['name']; ?>">
		           		<font style="vertical-align: inherit;">
		           			<?php if(!$data['name']){ ?>
		           				<font style="width:45px;height:20px;">****</font>
		           			<?php }else{ ?>
		           				<font style="width:45px;height:20px;"><?php echo $data['name'] ?></font>
		           			<?php } ?>
		           		</font>
		           	</a> 
		        </h3>
		        <div class="hckui__typography__bodyS hckui__typography__pebble" >
		           	<font style="vertical-align: inherit;">
		            	<font style="vertical-align: inherit;" style="width:150px"><?php echo $data['pro_num'] ?>个项目</font>
		            </font>
		        </div>
		        <div class="hckui__layout__marginTop15" style="margin-top:5px;font-size:15px">
		            <span style="display:inline-block;vertical-align:bottom;">
		             	<span data-hypernova-key="UserRelationButton" data-hypernova-id="4198b3f9-a413-470a-9f81-45502744e549">
                	    <a class="hckui__buttons__sm" type="button" data-reactroot="" href="#">
                			<font style="vertical-align: inherit;">
                				<font style="vertical-align: inherit;margin-right:10px">跟随</font>
                			</font>
                		</a>
		            	</span> 
		            </span>
		            <a class="hckui__buttons__sm hckui__buttons__secondary reactPortal" href="#">
		            	<font style="vertical-align: inherit;">
		            		<font style="vertical-align: inherit;margin-left:10px">联系</font>
		            	</font>
		            </a>
	           	</div>
	        </div></center>
	    </div>
	</div>
       	<?php }}  ?>
			
			</div>
		</div>
	</div>
</section>

<?php if($res_member){ ?>
  
<?php branch_pages($arg); ?>

<?php } ?>