<?php 
	global $wpdb;
	global $current_user;
    wp_get_current_user();
	$pageid = get_this_contestid();//比赛id
	// 查用户是否在比赛中
	$wpdb->get_var("select id from user_match where relation_key = '{$pageid}_user' and relation_value = '{$current_user->ID}'");
	$arr = [ 'key'=>$pageid.'_user', 'val'=>$current_user->ID];
	$is_join = is_join_contest($arr);
	$users_pro = $wpdb->get_results("select post_title as title , ID as pro_id from {$wpdb->prefix}posts as a join {$wpdb->prefix}postmeta as b where a.post_author = {$current_user->ID} and a.ID = b.post_id and b.meta_key = 'this_post_type' and b.meta_value = 'project'", ARRAY_A);
	$contest_pro = $wpdb->get_results("select relation_value as proid from user_match where relation_key = '{$pageid}_pro'",ARRAY_A);
	// var_dump($contest_pro);
	// var_dump($users_pro);
	foreach($users_pro as $k=>$v){
		$flag = $wpdb->get_results("select relation_value as proid from user_match where relation_key = '{$pageid}_pro' and relation_value = {$v['pro_id']}",ARRAY_A);
		if($flag) $user_join_pro[] = $v['pro_id'];
	}
	if($is_join && count($user_join_pro) > 0){
?>
		<section class="section-thumbs">
			<h4>您添加的项目</h4>
			<ul class="entries-list list-unstyled">
<?php
		foreach($user_join_pro as $value){
 ?>
			<li class="award">
				<h5><a href="<?php echo home_url().'/particulars/?'.get_the_title($value); ?>"><?php echo get_the_title($value); ?></a></h5>
				<p class="clearfix small">
					<span class="pull-left"><strong>状态:</strong>审核通过</span>
					<span class="pull-right">
						<a id="<?php echo $value ?>" name = 'delete_pro' class="btn btn-danger btn-xs entry-withdraw" data-confirm="" data-method="delete" href="javascript:void(0)"><i class="fa fa-times"></i><span></span></a>
					</span>
				</p>
				<p style="display: none">Is your project complete? <a class="btn btn-primary btn-sm modal-open" data-target="#entry-submit-popup-6589" href="javascript:void(0)">Submit to contest</a></p>
			</li>
<?php
		}
?>
			</ul>
			
			<p>　</p>
			<button class="btn btn-primary btn-block btn-ellipsis btn-standout enter-challenge challenge-cta" data-toggle="modal" data-target="#myModal">
				继续添加项目
			</button>
		</section>
<?php
	}else if($is_join){

?>
 <section class="section-thumbs">
	<h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理您的输入</font></font></h4>
	<p><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">您已成功报名！</font></font></strong> 
		<a class="btn btn-danger btn-xs" id="leave" href="javascript:void(0)" title="点击退出比赛" ><i class="fa fa-times"></i></a> 
	</p>
	<p>　</p>
	<button class="btn btn-primary btn-block btn-ellipsis btn-standout enter-challenge challenge-cta" data-toggle="modal" data-target="#myModal">
		添加我的项目
	</button>
	<!-- <a class="btn btn-primary btn-block btn-ellipsis btn-standout enter-challenge challenge-cta" href="javascript:void(0)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加我的项目</font></font></a> -->
	<p>
		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">需要硬件来完成您的提交？</font><font style="vertical-align: inherit;">我们正在赠送数量有限的</font></font>
		<a href="https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">免费MAX32620FTHR器件</font></font></a>
		<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">。</font><font style="vertical-align: inherit;">申请截止日期为2018年5月12日晚上11:59。</font>
		<font style="vertical-align: inherit;">每个团队最多一个设备。</font></font>
	</p>
	<p><strong><a href="/contests/maximunleash/ideas/new"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">申请接收MAX32620FTHR。</font></font></a></strong>
	</p>
</section>
<?php
	}else{
		//查比赛截止日期
		$contest_endtime = get_post_meta($pageid,'end_time',true);
		//当前日期
		date_default_timezone_set('Asia/Shanghai');
		$time_now=strtotime (date("Y-m-d h:i:s")); //当前时间  
		$contest_endtime=strtotime (get_post_meta($pageid,'end_time',true).' 00:00:00');  //过年时间
		$end_join=ceil(($contest_endtime-$time_now)/86400); //60s*60min*24h  
?>
	<a id="join" class="btn btn-primary btn-block btn-ellipsis btn-standout challenge-cta reactPortal" href="javascript:void(0)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">注册成为参与者</font></font></a>
	<p>　</p>
	<section class="section-thumbs" style="display:">
		<h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">比赛状态</font></font></h4>
		<p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">距离报名截止还有</font></font><strong><span data-react-class="TimeLeft" data-react-props="{&quot;timestamp&quot;:1531465140}"><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $end_join; ?>天</font></font></span></span></strong> </p>
		<p style="font-size:11px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">于<?php echo get_post_meta($pageid,'end_time',true); ?> 晚 11:59 结束 </font></font></p>
	</section>
<?php } ?>
<script>
	//取提交路径
	var purpose_url = '<?php echo get_template_directory_uri(); ?>/do-join-contest.php';
	$("#leave").click(function(){
		about_contest(purpose_url,'leave',<?php echo $pageid; ?>,<?php echo $current_user->ID ?>);
	});
	$("#join").click(function(){
		about_contest(purpose_url,'join',<?php echo $pageid; ?>,<?php echo $current_user->ID ?>);
	});
	$("a[name='delete_pro']").click(function(){
		//取项目id
		var proid = $(this).attr('id');
		about_contest(purpose_url,'delete_pro',<?php echo $pageid; ?>,proid);
	});
	$("#add_pro").click(function(){
		//取项目id
		var proid = $("#project_id option:selected").val();
		about_contest(purpose_url,'add_pro',<?php echo $pageid; ?>,proid);
	});
	function about_contest(purpose_url,submit_do,pageid,id){
		$.ajax({
			type:'POST',
			url:purpose_url,
			data:{'submit_do':submit_do,'pageid':pageid,'id':id},
			success:function(data){
				if(data == 0){
					alert("请先登录");
					location.href='<?php echo home_url().'/login' ?>';
				}else{
					location.href='';
				}
			}
		});
	}
</script>