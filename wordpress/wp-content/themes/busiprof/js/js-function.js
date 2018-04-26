	$("#leave").click(function(){
		$.ajax({
			type:'POST',
			url:'<?php echo get_template_directory_uri(); ?>/do-join-contest.php',
			data:{'submit_do':'leave','pageid':<?php echo $pageid; ?>,'uid':<?php echo $current_user->ID ?>},
			success:function(data){
				if(data == 0){
					alert("请先登录");
					location.href='<?php echo home_url().'/login' ?>';
				}
				else location.href='';
			}
		});
	});
	$("#join").click(function(){
		$.ajax({
			type:'POST',
			url:'<?php echo get_template_directory_uri(); ?>/do-join-contest.php',
			data:{'submit_do':'join','pageid':<?php echo $pageid; ?>,'uid':<?php echo $current_user->ID ?>},
			success:function(data){
				if(data == 0){
					alert("请先登录");
					location.href='<?php echo home_url().'/login' ?>';
				}else{
					location.href='';
				}
			}
		});
	});
	$("a[name='delete_pro']").click(function(){
		//取项目id
		var proid = $(this).attr('id');
		$.ajax({
			type:'POST',
			url:'<?php echo get_template_directory_uri(); ?>/do-join-contest.php',
			data:{'submit_do':'delete_pro','proid':proid,'pageid':<?php echo $pageid; ?>},
			success:function(data){
				if(data == 0){
					alert("请先登录");
					location.href='<?php echo home_url().'/login' ?>';
				}
				else location.href='';
			}
		});
	});
	$("#add_pro").click(function(){
		//取项目id
		var proid = $("#project_id option:selected").val();
		$.ajax({
			type:'POST',
			url:'<?php echo get_template_directory_uri(); ?>/do-join-contest.php',
			data:{'submit_do':'add_pro','proid':proid,'pageid':<?php echo $pageid; ?>},
			success:function(data){
				if(data == 0){
					alert("请先登录");
					location.href='<?php echo home_url().'/login' ?>';
				}
				else location.href='';
			}
		});
	});