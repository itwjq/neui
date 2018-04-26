<?php 
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
//分页函数  传来的是数组id   0每个用户下项目分页  1  大赛下项目分页 2 所有项目分页
	global $wpdb;
	/*
		user_item_branch    每个用户下的项目分页   match_item_branch   查询每个大赛下的项目分页
		all_item_branch     查询所有项目分页       match_user          每个比赛下的参与者	
		all_user            所有用户               platform_item       平台下项目
		platform_user       平台下参与者
    */
	$type=['user_item_branch'=>0,'match_item_branch'=>1,'all_item_branch'=>2,'match_user'=>5,'all_user'=>6];  //判断传来的值的类型
	if($arg['num']==$type['user_item_branch']){
?>
<!-- 每个用户下的项目分页 -->
<div class="row text-center">
	<div class="pagination" style="width:1100px;height:75px;float:left">
	    <nav aria-label="Page navigation" style>
	        <ul class="pagination">
			<?php 
			   	if(!$arg['page_size']){
				exit;
			   	}
			   	$pagesize=$arg['page_size'];
			    $sql_projectss="select post_id from wp_postmeta where meta_value like '%{$uid}#-user--do-#%'";
				$res_projectss = $wpdb->get_results($sql_projectss,ARRAY_A);
			    $number=count($res_projectss);
			    $pagenum = ceil($number/$pagesize);	 
			    $bothNum=3;//当前页左右各显示4个页码
				$t=$_GET['t']?$_GET['t']:1;//当前页数             
			?>
			<?php if($number){ ?>
				<li>
			        <a href="?t=1" aria-label="Previous" title='跳至首页'>
			            <span aria-hidden="true">&laquo;</span>
			        </a>
			    </li>
			    <?php 
			        $urll =get_permalink(); 
			        //循环输出个页数及链接  
				    for($i=$bothNum;$i>=1;$i--){
	     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
	          				continue;
	     				}
	    			    $lastPage=$t-$i;
	    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
	 				}
				 	//当前页
				 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
				 	//当前页右边
				 	for($i=1;$i<=$bothNum;$i++){
				     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
				         	break;
				    	}
				    	$lastPage=$t+$i;
				     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
				 	}
				 	echo $pagestr;
				 	// "<li class='active'></li>";
				 	echo '总页数为：'.$pagenum; 
			    ?>
			    <li>
			        <a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			            <span aria-hidden="true">&raquo;</span>
			        </a>
			    </li>
			    <?php } ?>
	        </ul>
	    </nav>
	</div>
</div>

<?php } else if($arg['num']==$type['match_item_branch']) { ?>
<!-- 查询每个大赛下的项目分页 -->
<div class="row text-center">
	<div class="pagination" style="width:1100px;height:75px;float:left">
		<nav aria-label="Page navigation">
			<ul class="pagination">
			<?php 
			   	if(!$arg['page_size']){
			    	exit;
			   	}
			   	$id=$arg['id'].'_pro';
			  	$pagesize=$arg['page_size'];
			   	$sql_projects="select relation_value from user_match where relation_key = '{$id}'";
 				$res_projectss= $wpdb->get_results($sql_projects,ARRAY_A);
			    $number=count($res_projectss);
			    $pagenum = ceil($number/$pagesize);	
			    $bothNum=3;//当前页左右各显示4个页码
				$t=$_GET['t']?$_GET['t']:1;//当前页数            
			?>
			<?php if($number){ ?>
			<li>
			    <a href="?t=1" aria-label="Previous" title='跳至首页'>
			        <span aria-hidden="true">&laquo;</span>
			    </a>
			</li>
			<?php 
			    $urll =get_permalink();
			    //循环输出个页数及链接  
			    for($i=$bothNum;$i>=1;$i--){
     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
          				continue;
     				}
    			    $lastPage=$t-$i;
    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
 				}
			 	//当前页
			 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
			 	//当前页右边
			 	for($i=1;$i<=$bothNum;$i++){
			     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
			         	break;
			    	}
			    	$lastPage=$t+$i;
			     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
			 	}
			 	echo $pagestr;
			 	// "<li class='active'></li>";
			 	echo '总页数为：'.$pagenum; 
			?>
			<li>
				<a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			   	 	<span aria-hidden="true">&raquo;</span>
			  	</a>
			</li>
			<?php } ?>
			</u>
		</nav>
	</div>
</div>
			
<?php }else if($arg['num']==$type['all_item_branch']){ ?>
<!--查询所有项目分页   -->
<div class="row text-center">
    <div class="pagination" style="width:1100px;height:75px;float:left">
	    <nav aria-label="Page navigation" style>
			<ul class="pagination">
				<?php 
			   		if(!$arg['page_size']){
			  			exit;
				}
				    $pagesize=$arg['page_size'];//每页显示个数
				    $sql_projects="select meta_id from wp_postmeta where meta_key='this_post_type' and meta_value='project'";
					$res_projectss= $wpdb->get_results($sql_projects,ARRAY_A);
				    $number=count($res_projectss);
				    $pagenum = ceil($number/$pagesize);	//总页数
				    $bothNum=3;//当前页左右各显示4个页码
					$t=$_GET['t']?$_GET['t']:1;//当前页数  
				?>
				<?php if($number){ ?>
				<li>
			    	<a href="?t=1" aria-label="Previous" title='跳至首页'>
			        	<span aria-hidden="true">&laquo;</span>
			    	</a>
				</li>
				<?php 
				    $urll =get_permalink(); 
				    //循环输出个页数及链接  
				    for($i=$bothNum;$i>=1;$i--){
	     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
	          				continue;
	     				}
	    			    $lastPage=$t-$i;
	    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
	 				}
				 	//当前页
				 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
				 	//当前页右边
				 	for($i=1;$i<=$bothNum;$i++){
				     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
				         	break;
				    	}
				    	$lastPage=$t+$i;
				     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
				 	}
				 	echo $pagestr;
				 	// "<li class='active'></li>";
				 	echo '总页数为：'.$pagenum;
				?>
				<li>
			    	<a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			        	<span aria-hidden="true">&raquo;</span>
			    	</a>
				</li>
				<?php } ?>
			</ul>
		</nav>
	</div>
</div>		
<?php }else if($arg['num']==$type['match_user']){ ?>
<!-- 每个比赛下的参与者 -->
<div class="row text-center">
	<div class="pagination" style="width:1100px;height:75px;float:left">
		<nav aria-label="Page navigation" style>
			<ul class="pagination">
			<?php 
			   	if(!$arg['page_size']){
			    	exit;
			   	}
			   	$id=$arg['id'].'_user';
			  	$pagesize=$arg['page_size'];
			   	$sql_projects="select relation_value from user_match where relation_key = '{$id}'";
 				$res_projectss= $wpdb->get_results($sql_projects,ARRAY_A);
			    $number=count($res_projectss);
			    $pagenum = ceil($number/$pagesize);
			    $bothNum=3;//当前页左右各显示4个页码
				$t=$_GET['t']?$_GET['t']:1;//当前页数  	            
			?>
			<?php if($number){ ?>
			<li>
			    <a href="?t=1" aria-label="Previous" title='跳至首页'>
			        <span aria-hidden="true">&laquo;</span>
			    </a>
			</li>
			<?php 
			    $urll =get_permalink(); 
			    //循环输出个页数及链接  
			    for($i=$bothNum;$i>=1;$i--){
	     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
	          				continue;
	     				}
	    			    $lastPage=$t-$i;
	    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
	 				}
				 	//当前页
				 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
				 	//当前页右边
				 	for($i=1;$i<=$bothNum;$i++){
				     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
				         	break;
				    	}
				    	$lastPage=$t+$i;
				     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
				 	}
				 	echo $pagestr;
				 	// "<li class='active'></li>";
				 	echo '总页数为：'.$pagenum;
			?>
			<li>
				<a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			   	 	<span aria-hidden="true">&raquo;</span>
			  	</a>
			</li>
			<?php } ?>
			</u>
		</nav>
	</div>
</div>
<?php } else if($arg['num']==$type['all_user']){?> 
<!--所有用户  -->
<div class="row text-center">
	<div class="pagination" style="width:1100px;height:75px;float:left">
		<nav aria-label="Page navigation" style>
			<ul class="pagination">
			<?php 
			   	if(!$arg['page_size']){
			    	exit;
			   	}
			  	$pagesize=$arg['page_size'];
			   	$sql_projects="select ID from wp_users";
 				$res_projectss= $wpdb->get_results($sql_projects,ARRAY_A);
			    $number=count($res_projectss);
			    $pagenum = ceil($number/$pagesize);	
			    $bothNum=3;//当前页左右各显示4个页码
				$t=$_GET['t']?$_GET['t']:1;//当前页数             
			?>
			<?php if($number){ ?>
			<li>
			    <a href="?t=1" aria-label="Previous" title='跳至首页'>
			        <span aria-hidden="true">&laquo;</span>
			    </a>
			</li>
			<?php 
			    $urll =get_permalink(); 
			    //循环输出个页数及链接  
			    for($i=$bothNum;$i>=1;$i--){
	     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
	          				continue;
	     				}
	    			    $lastPage=$t-$i;
	    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
	 				}
				 	//当前页
				 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
				 	//当前页右边
				 	for($i=1;$i<=$bothNum;$i++){
				     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
				         	break;
				    	}
				    	$lastPage=$t+$i;
				     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
				 	}
				 	echo $pagestr;
				 	// "<li class='active'></li>";
				 	echo '总页数为：'.$pagenum;
			?>
			<li>
				<a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			   	 	<span aria-hidden="true">&raquo;</span>
			  	</a>
			</li>
			<?php } ?>
			</u>
		</nav>
	</div>
</div>
<?php }else if($arg['num']==$type['platform_item']){ ?>
<!-- 平台下项目 -->
<div class="row text-center">
	<div class="pagination" style="width:1100px;height:75px;float:left">
		<nav aria-label="Page navigation">
			<ul class="pagination">
			<?php 
			   	if(!$arg['page_size']){
			    	exit;
			   	}
			   	$id=$arg['id'].'_pro';
			  	$pagesize=$arg['page_size'];
			   	$sql_projects="select relation_value from user_platform where relation_key = '{$id}'";
 				$res_projectss= $wpdb->get_results($sql_projects,ARRAY_A);
			    $number=count($res_projectss);
			    $pagenum = ceil($number/$pagesize);	
			    $bothNum=3;//当前页左右各显示4个页码
				$t=$_GET['t']?$_GET['t']:1;//当前页数            
			?>
			<?php if($number){ ?>
			<li>
			    <a href="?t=1" aria-label="Previous" title='跳至首页'>
			        <span aria-hidden="true">&laquo;</span>
			    </a>
			</li>
			<?php 
			    $urll =get_permalink();
			    //循环输出个页数及链接  
			    for($i=$bothNum;$i>=1;$i--){
     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
          				continue;
     				}
    			    $lastPage=$t-$i;
    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
 				}
			 	//当前页
			 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
			 	//当前页右边
			 	for($i=1;$i<=$bothNum;$i++){
			     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
			         	break;
			    	}
			    	$lastPage=$t+$i;
			     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
			 	}
			 	echo $pagestr;
			 	echo '总页数为：'.$pagenum; 
			?>
			<li>
				<a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			   	 	<span aria-hidden="true">&raquo;</span>
			  	</a>
			</li>
			<?php } ?>
			</u>
		</nav>
	</div>
</div>
<?php }else if($arg['num']==$type['platform_user']){ ?>
<!-- 平台下参与者 -->
<div class="row text-center">
	<div class="pagination" style="width:1100px;height:75px;float:left">
		<nav aria-label="Page navigation">
			<ul class="pagination">
			<?php 
			   	if(!$arg['page_size']){
			    	exit;
			   	}
			   	$id=$arg['id'].'_user';
			  	$pagesize=$arg['page_size'];
			   	$sql_projects="select relation_value from user_platform where relation_key = '{$id}'";
 				$res_projectss= $wpdb->get_results($sql_projects,ARRAY_A);
			    $number=count($res_projectss);
			    $pagenum = ceil($number/$pagesize);	
			    $bothNum=3;//当前页左右各显示4个页码
				$t=$_GET['t']?$_GET['t']:1;//当前页数            
			?>
			<?php if($number){ ?>
			<li>
			    <a href="?t=1" aria-label="Previous" title='跳至首页'>
			        <span aria-hidden="true">&laquo;</span>
			    </a>
			</li>
			<?php 
			    $urll =get_permalink();
			    //循环输出个页数及链接  
			    for($i=$bothNum;$i>=1;$i--){
     				if(($t - $i) < 1 ) { // 当前页左边花最多 bothnum 个数字
          				continue;
     				}
    			    $lastPage=$t-$i;
    				$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
 				}
			 	//当前页
			 	$pagestr.="<li class='active'><span>$t</span></li>"."  ";
			 	//当前页右边
			 	for($i=1;$i<=$bothNum;$i++){
			     	if(($t + $i) > $pagenum) { // 当前页右边最多 bothnum 个数字
			         	break;
			    	}
			    	$lastPage=$t+$i;
			     	$pagestr.="<li><a href='?t=$lastPage'>$lastPage</a></li>"."  ";
			 	}
			 	echo $pagestr;
			 	echo '总页数为：'.$pagenum; 
			?>
			<li>
				<a href="?t=<?php echo $pagenum; ?>" aria-label="Next" title='跳至尾页'>
			   	 	<span aria-hidden="true">&raquo;</span>
			  	</a>
			</li>
			<?php } ?>
			</u>
		</nav>
	</div>
</div>
<?php 
	} 
//分页短代码
add_shortcode("show-branch-pages","branch_pages");
?>


