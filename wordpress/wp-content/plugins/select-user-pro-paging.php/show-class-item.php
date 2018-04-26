<?php
	//显示指定项目 
    $res =select_item_type($arg);
	if(count($res)>0){
		foreach($res as $k=>$v){
			//输出单个用户的div
			show_contest_project($v['pro_id']);	
		}
		show_page($arg);
	}else {
		echo "<h2>还没有项目!</h2><a href='home.url/wordpress/create-pro/'><h4 style='color:blue;margin-top:10px'>去创建一个</h4></a>";

	}
	 
 ?>