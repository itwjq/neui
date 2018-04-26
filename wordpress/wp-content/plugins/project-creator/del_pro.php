<?php 
// die;
	require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
	global $wpdb;
	global $current_user;
	
	home_url().'/home/account/del_pro/?pid=';//删除的链接
	home_url().'/home/project-show/page-particular/?pid=1233';//查看项目的链接
	home_url().'/home/account/create-project/?edit&pid=1233';//修改的链接
	// die;
	if($_GET['pid']){
		$proid = $_GET['pid'];
	}else{
		die("<h2>请通过正确的方式进行项目删除</h2>");
	}
if(is_user_logged_in()){
    //用户登录
    get_currentuserinfo();
    echo "<h2 class = 'wel' style='display:block'>欢迎　".$current_user->user_login."</h2>";
    echo "<input type='hidden' name='post_author' value='{$current_user->ID}'>";
    echo "<input type='hidden' id='login_name' value='{$current_user->user_login}'>";
?>
    <!-- js代码实现欢迎用户,3秒钟后消失 -->
    <script type="text/javascript">
        var login_time = 3;
        var timmer = setInterval(function(){
            if(login_time == 1)
                {
                    clearInterval(timmer);
                    $(".wel").css('display','none');
                }
            login_time--;          
        },1000)
    </script>
<?php
}else{
    //用户没登录
?>
    <h2 class = 'jump'></h2>
    <!-- js代码实现3秒钟后跳转登录页 -->
    <script>
        var sectime = 3;
        var timmer = setInterval(function(){
            $(".jump").html('请先登录, '+sectime+" 秒后跳转到登录页面");
            if(sectime == 1)
                {
                    clearInterval(timmer);
                    location.href = "<?php echo home_url()?>/login-2/?pid=1215";
                }
            sectime--;          
        },1000)
    </script>
<?php 
}
	//查项目上传用户ID
    $sql = "select post_author from wp_posts where ID = {$proid}";
    $res = $wpdb->get_results($sql,ARRAY_A);
    if($res[0]['post_author'] != $current_user->ID){
        echo "<h2>您只能删除您自己上传的项目</h2>";
        die;
    }
	//创建删除项目的语句数组
	$sql_del = array();
	//删除项目大图,项目三个图片,项目详情,项目团队信息,项目用具
	$sql_del['thing'] = "delete from wp_user_things where projectid = {$proid}";//删除项目用具信息

	//获取项目团队id
	$tid = $wpdb->get_results("select id from wp_project_team where projectid = {$proid}",ARRAY_A);
	if($tid){
		foreach($tid as $value){
			$sql_delteam = "delete from team_partner where tid = {$value['id']}";//删除队员
			$wpdb->get_results($sql_delteam);
		}
	}
	//删除项目团队
	$sql_del['team'] = "delete from wp_project_team where projectid = '{$proid}' ";

	//查找详情图片删除
	$sql_content = "select post_content from wp_posts where id = {$proid}";
	$res_content = $wpdb->get_results($sql_content,ARRAY_A);
	if($res_content){
		// echo $res_content[0]['post_content'].'<br>';
		$preg = '/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i';
		preg_match_all($preg, $res_content[0]['post_content'], $imgArr);
		// var_dump($imgArr['1']);
		if($imgArr['1']){
			if(is_file($dir)){
				unlink($dir);
				// echo $dir.'<br>';
			}
		}
	}
		
	//查找大图路径并删除指定图片
	$sql_pic = "select pro_pic from wp_project where projectid = {$proid}";
	$res_pic = $wpdb->get_results($sql_pic,ARRAY_A);
	if($res_pic){
		foreach($res_pic as $value){
		    $dir = str_replace("\\","/",WP_CONTENT_DIR);//取当前绝对路径
			$dir = $dir.$value['pro_pic'];
			// echo $dir.'<br>';
			if(is_file($dir)){
				unlink($dir);
			}
		}
	}
	//查找图片路径并删除指定图片
	$sql_pics = "select path from wp_attachments where projectid = {$proid}";
	$res_pics = $wpdb->get_results($sql_pics,ARRAY_A);
	if($res_pics){
		foreach($res_pics as $value){
		    $dir = str_replace("\\","/",WP_CONTENT_DIR);//取当前绝对路径
			$dir = $dir.$value['path'];
			// echo $dir.'<br>';
			if(is_file($dir)){
				unlink($dir);
			}
		}
	}

	$sql_del['attachment'] = "delete from wp_attachments where projectid = {$proid}";//删除图片信息
	$sql_del['post'] = "delete from wp_posts where id = {$proid}";//删除项目信息
	$sql_del['project'] = "delete from wp_project where projectid = {$proid}";//删除项目
	//删除回复
	$sql_comments = "select id from pro_comment where pid = {$proid}";
	$res_comments = $wpdb->get_results($sql_comments,ARRAY_A);
	// var_dump($res_comments);
	if($res_comments){
		foreach($res_comments as $v){
			$sql_delreply = "delete from pro_reply where comid = {$v['id']}";
			$wpdb->get_results($sql_delreply);
		}
	}
	$sql_del['comment'] = "delete from pro_comment where pid = {$proid}";//删除评论
	foreach($sql_del as $value){
		$wpdb->get_results($value);//全部执行
		// echo $value.'<br>';
	}


 ?>
 <h2>删除成功啦 ! 点击　<a href = "<?php echo home_url().'/home/account/'; ?>">跳转回个人中心</a></h2>
