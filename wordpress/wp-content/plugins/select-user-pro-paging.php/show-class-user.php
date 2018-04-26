<?php 
	//显示指定用户
	$res = select_user_type($arg);
	if(count($res)>0){
		foreach($res as $k=>$v){
			//输出单个项目的div
			show_participants($v['user_id']);
			// echo $v['user_id'];
		}
		show_page($arg);
	}else{
		echo "<h2>还没有用户报名!</h2>";
	}
 ?>