<?php
global $wpdb;
// var_dump($_POST['soft']);
// var_dump($_POST['hard']);
// var_dump($_FILES);
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// die;
if($_POST['project_content'] == '') $_POST['project_content'] = ' ';
if(isset($_POST['edit'])){
    //修改
    $pro_id = $_POST['edit'];
    // echo "<h2>以下是ID为{$pro_id}项目的原本信息</h2>";
    //取原项目信息

    /*开始**************************************************************************/
    //查项目大图
    $sql_propic = "select pro_pic from wp_project where projectid = ".$pro_id;
    $res_propic = $wpdb->get_results($sql_propic,ARRAY_A);//
    //如果有图片
    if($res_propic[0]['pro_pic']){
        $pic = $res_propic[0]['pro_pic'];
    }
    else{
        $pic = '';
    }
    
    //查项目
    $sql_pro = "select a.post_content , a.post_author , a.post_title as pro_name , a.post_excerpt , a.post_date , a.post_modified , a.post_status ,  c.* from wp_posts as a , wp_project as c where c.projectid = ".$pro_id." and c.projectid = a.id";
    $res_pro = $wpdb->get_results($sql_pro,ARRAY_A);//执行返回结果
    // var_dump($res_pro);

    //查项目队员
    //先查项目团队ID
    $sql_teamid = "select id from wp_project_team where projectid = '{$pro_id}' ";
    $res_teamid = $wpdb->get_results($sql_teamid,ARRAY_A);
    if($res_teamid){
        //查到了项目团队ID
        $sql_teamusers = "select * from team_partner where tid = '{$res_teamid[0]['id']}'";
        $res_teamusers = $wpdb->get_results($sql_teamusers,ARRAY_A);
        //避免出错
        if($res_teamusers) ;else $res_teamusers = [];
    }else{
        //没查到项目团队信息
        $res_teamusers = [];
    }

    //查项目用具
    $sql_hardthing = "select b.* , a.num from wp_user_things as a , wp_project_things as b where a.projectid = ".$pro_id." and a.thing_id = b.id and b.thingstype = 1 ";
    $res_hardthing = $wpdb->get_results($sql_hardthing,ARRAY_A);//执行返回结果
    $sql_softthing = "select b.* , a.num from wp_user_things as a , wp_project_things as b where a.projectid = ".$pro_id." and a.thing_id = b.id and b.thingstype = 2";
    $res_softthing = $wpdb->get_results($sql_softthing,ARRAY_A);//执行返回结果
    // var_dump($res_hardthing);
    // var_dump($res_softthing);

    //查代码图
    $sql_code = "select * from wp_attachments where projectid = ".$pro_id ." and type = 1" ;//原理图2 代码1 cad3
    $res_code = $wpdb->get_results($sql_code,ARRAY_A);
    // var_dump($res_code);
    
    //查原理图
    $sql_ylt = "select * from wp_attachments where projectid = ".$pro_id ." and type = 2" ;//原理图2 代码1 cad3
    $res_ylt = $wpdb->get_results($sql_ylt,ARRAY_A);
    
    //查CAD图
    $sql_cad = "select * from wp_attachments where projectid = ".$pro_id ." and type = 3" ;//原理图2 代码1 cad3
    $res_cad = $wpdb->get_results($sql_cad,ARRAY_A);
    // var_dump($pic);
    // var_dump($res_cad[0]['path']);
    // var_dump($res_ylt[0]['path']);
    // var_dump($res_code[0]['path']);
    // die;
    /*结束**************************************************************************/
    $sql_arr = array();
    //将原信息与当前信息比较,并将更新的信息插入数组
    if($_FILES['pro_pic1']['name'] != ''){//项目大图
        $mode = get_type($_FILES['pro_pic1']['name']);//取后缀
        $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$pro_id.'.'.$mode;
        $dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
        $pic_dir = $dir.'/uploads/pro_pic/'.$fileName;
        // var_dump($pic_dir);
        if ($_FILES['pro_pic1']) {
            if (move_uploaded_file($_FILES['pro_pic1']['tmp_name'], $pic_dir)) {
                //删除原图片
                $old_pic = str_replace("\\","/",WP_CONTENT_DIR);//取当前绝对路径
                $old_pic = $old_pic.$pic;
                if(is_file($old_pic)){
                    unlink($old_pic);
                    // echo $old_pic.'<br>';
                }
                //拼接路径
                $pro_pic_path = '/uploads/pro_pic/'.$fileName;
                $sql_arr['pro_pic'] = "update wp_project set pro_pic = '{$pro_pic_path}' where projectid = {$pro_id}";
            }
        }
    }
    if($_FILES['cad_file1']['name'] != ''){//项目CAD图
        $mode = get_type($_FILES['cad_file1']['name']);//取后缀
        $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$pro_id.'.'.$mode;
        $dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
        $cad_dir = $dir.'/uploads/cad_pic/'.$fileName;
        if ($_FILES['cad_file1']) {
            if (move_uploaded_file($_FILES['cad_file1']['tmp_name'], $cad_dir)) {
                //删除原图片
                $old_pic = str_replace("\\","/",WP_CONTENT_DIR);//取当前绝对路径
                $old_pic = $old_pic.$res_cad[0]['path'];
                if(is_file($old_pic)){
                    unlink($old_pic);
                    // echo $old_pic.'<br>';
                }
                //拼接路径
                $path = '/uploads/cad_pic/'.$fileName;
                if(!$res_cad){
                    // $sql_arr['pro_cad'] = "insert into wp_attachments ( `path` ) value( '{$path}' )";
                    $sql_arr['pro_cad'] = "insert into wp_attachments ( `projectid` , `type` , `path` ) values (" . "'{$pro_id}' ,  '1', '{$path}' )";
                }else
                    $sql_arr['pro_cad'] = "update wp_attachments set path = '{$path}' where type = 3 and projectid = {$pro_id}";
            }
        }
    }

    if($_FILES['diagrams_file1']['name'] != ''){//项目原理图
        $mode = get_type($_FILES['diagrams_file1']['name']);//取后缀
        $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$pro_id.'.'.$mode;
        $dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
        $diagrams_dir = $dir.'/uploads/diagrams_pic/'.$fileName;
        if ($_FILES['diagrams_file1']) {
            if (move_uploaded_file($_FILES['diagrams_file1']['tmp_name'], $diagrams_dir)) {
                //删除原图片
                $old_pic = str_replace("\\","/",WP_CONTENT_DIR);//取当前绝对路径
                $old_pic = $old_pic.$res_ylt[0]['path'];
                if(is_file($old_pic)){
                    unlink($old_pic);
                    // echo $old_pic.'<br>';
                }
                //拼接路径
                $path = '/uploads/diagrams_pic/'.$fileName;
                if(!$res_ylt){
                    $sql_arr['pro_ylt'] = "insert into wp_attachments ( `projectid` , `type` , `path` ) values (" . "'{$pro_id}' ,  '2', '{$path}' )";
                }else
                    $sql_arr['pro_ylt'] = "update wp_attachments set path = '{$path}' where type = 2 and projectid = {$pro_id}";
            }
        }
    }

    if($_FILES['code_file1']['name'] != ''){//项目代码图
        $sql_arr['pro_code'] = "";
        $mode = get_type($_FILES['code_file1']['name']);//取后缀
        $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$pro_id.'.'.$mode;
        $dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
        $code_dir = $dir.'/uploads/code_pic/'.$fileName;
        if ($_FILES['code_file1']) {
            if (move_uploaded_file($_FILES['code_file1']['tmp_name'], $code_dir)) {
                //删除原图片
                $old_pic = str_replace("\\","/",WP_CONTENT_DIR);//取当前绝对路径
                $old_pic = $old_pic.$res_code[0]['path'];
                if(is_file($old_pic)){
                    unlink($old_pic);
                    // echo $old_pic.'<br>';
                }
                //拼接路径
                $path = '/uploads/code_pic/'.$fileName;
                if(!$res_code){
                    $sql_arr['pro_code'] = "insert into wp_attachments ( `projectid` , `type` , `path` ) values (" . "'{$pro_id}' ,  '1', '{$path}' )";
                }else
                    $sql_arr['pro_code'] = "update wp_attachments set path = '{$path}' where type = 1 and projectid = {$pro_id}";
            }
        }
    }

    if($_POST['show_url'] != $res_pro[0]['pro_url']){//项目演示视频project表pro_url字段
        $sql_arr['pro_url'] = "update wp_project set pro_url = '{$_POST['show_url']}' where projectid = {$pro_id}";
    }
    if($_POST['teamname'] != $res_pro[0]['teamname']){//项目团队名project表teamname字段
        $sql_arr['teamname'] = "update wp_project set teamname = '{$_POST['teamname']}' where projectid = {$pro_id}";
    }
    if($_POST['project_type'] != $res_pro[0]['type']){//project表type字段
        $sql_arr['project_type'] = "update wp_project set type = '{$_POST['project_type']}' where projectid = {$pro_id}";
    }
    if($_POST['progress'] != $res_pro[0]['progress']){//project表progress字段
        $sql_arr['progress'] = "update wp_project set progress = '{$_POST['progress']}' where projectid = {$pro_id}";
    }
    if($_POST['difficulty'] != $res_pro[0]['difficulty']){//项目难度project表difficulty字段
        $sql_arr['difficulty'] = "update wp_project set difficulty = '{$_POST['difficulty']}' where projectid = {$pro_id}";
    }
    if($_POST['duration'] != $res_pro[0]['duration']){//项目时长project表duration字段
        $sql_arr['duration'] = "update wp_project set duration = '{$_POST['duration']}' where projectid = {$pro_id}";
    }
    if($_POST['license'] != $res_pro[0]['license']){//项目执照project表license字段
        $sql_arr['license'] = "update wp_project set license = '{$_POST['license']}' where projectid = {$pro_id}";
    }
    if($_POST['upload_for'] != $res_pro[0]['upload_for']){//项目执照project表license字段
        $sql_arr['upload_for'] = "update wp_project set upload_for = '{$_POST['upload_for']}' where projectid = {$pro_id}";
    }
    // var_dump($sql_arr);

    //项目软硬件修改
    $sql = "delete from wp_user_things where projectid = '{$pro_id}'";//删除原本的软硬件信息
    // echo $sql."<br>";
    $wpdb->get_results($sql);
    if(is_array($_POST['hard'])){
        foreach($_POST['hard'] as $k=>$v){    //重新录入
            //取出硬件个数
            $hard_num_arr = explode('-------x',$v);
            $hard_num = end($hard_num_arr);
            $sql_ware = "insert into wp_user_things ( `projectid` , `thing_id` , `num` ) values( {$pro_id} , {$k} , {$hard_num})";
            // echo $sql_ware."<br>";
            $wpdb->query($sql_ware);
        }       
    }
    if(is_array($_POST['soft'])){
        foreach($_POST['soft'] as $k=>$v){
            $sql_ware = "insert into wp_user_things ( `projectid` , `thing_id` ) values( {$pro_id} , {$k} )";
            // echo $sql_ware."<br>";
            $wpdb->query($sql_ware);
        }
    }

    //项目队员修改
    $sql_tid = "select id from wp_project_team where projectid = '{$pro_id}' ";
    $tid = $wpdb->get_results($sql_tid,ARRAY_A);
    // var_dump($tid);
    $sql = "delete from team_partner where tid = '{$tid[0]['id']}'";//删除原本的队员信息
    // echo $sql."<br>";
    $wpdb->get_results($sql);
    //插入团队成员到数据库
    $users_arr = $_POST['pro_user'];//成员数组
    $userdo_arr = $_POST['pro_userdo'];//成员贡献数组
    for($i = 0;$i<count($users_arr);$i++){
        //在这里查询用户ID用于拼接sql语句
        $sql_uid = "select ID from wp_users where user_login = '{$users_arr[$i]}'";
        $uid = $wpdb->get_results($sql_uid,ARRAY_A);
        // echo $sql_uid."<br>";
        $sql = "insert into team_partner ( `tid` , `uid` , `uname` , `udo` ) values( {$tid[0]['id']} , {$uid[0]['ID']} , '{$users_arr[$i]}' , '{$userdo_arr[$i]}' )";
        // echo $sql."<br>";
        $wpdb->query($sql);
    }

    $post_update = [];
    $post_update['ID'] = $_POST['edit'];//项目(文章)ID
    $post_update['post_title'] = $_POST['pro_title'];//项目名
    $post_update['post_name'] = $_POST['pro_title'];//项目别名
    $post_update['post_content'] = $_POST['project_content'];//项目详情
    $post_update['post_excerpt'] = $_POST['excerpt'];//项目摘要
    $post_update['post_status'] = $_POST['post_status'];//项目显示状态
    $post_update['comment_status'] = 'open';//项目显示状态
    //更新post表数据
    // var_dump($sql_arr);
    if(is_array($sql_arr)){
        foreach($sql_arr as $v){
            $wpdb->get_results($v);
        }   
    }
    wp_update_post($post_update);
    // var_dump($post_update);

    // die;
?>
<h2><a href="<?php bloginfo('url') ?>/home/project-show/page-particular/?pid=<?php echo $pro_id ?>">去看看您刚刚修改的项目</a></h2>
<?php
}else{
    //如果项目录入过,不再添加
    $sql_isup = "select ID from wp_posts where `post_title` = '{$_POST['pro_title']}' and `post_excerpt` = '{$_POST['excerpt']}' ";
    $res = $wpdb->get_results($sql_isup,ARRAY_A);
    // var_dump($res);
    //判断是否重复录入
    if($res){
        echo "<h2>这个项目已经录入过了,请不要重复刷新　>_<　</h2>";
        die; 
    }

    

    if (!function_exists('is_user_logged_in')) require (ABSPATH . WPINC . '/pluggable.php');
    // 创建文章对象
    $post = array(
        // 'ID'             => [ <post id> ] // 如果需要更新文章，设置id为需要更新文章的id，否则不要设置此值
        'post_author' => $_POST['post_author'], // 文章作者
        'post_content' => $_POST['project_content'], // 文章内容，也就是可视化编辑器里面的输入的内容
        'post_name' => $_POST['pro_title'], // 文章的别名，就是URL里面的名称
        'post_title' => $_POST['pro_title'], // 文章标题
        'post_status' => $_POST['post_status'],//'publish', //[ 'draft' | 'publish' | 'pending'| 'future' | 'private' | custom registered status ] // 文章状态，默认 'draft'.
        'post_excerpt' => $_POST['excerpt'], // 文章摘要。
        'comment_status' => 'open', //[ 'closed' | 'open' ] // 是否允许评论，默认为 'default_comment_status'的值，或'closed'。
        //'post_category'  => [ array(<category id>, ...) ] // 文章分类目录，默认为空 //'post_category' => array(8,39)
        //'tags_input'     => [ '<tag>, <tag>, ...' | array ] // 文章标签，默认为空
        //'tax_input'      => [ array( <taxonomy> => <array | string>, <taxonomy_other> => <array | string> ) ] // 文章的自定义分类法项目，默认为空。
        
    );

    //如果传来id值，创建项目变成编辑项目
    if (!empty($_GET['edit'])) $post['ID'] = $_POST['project_id'];

    // var_dump($post);
    // 插入文章到数据库
    $post_id = wp_insert_post($post);

    //拼装软硬件信息,并插入数据库
    $wares = [];
    if(is_array($_POST['hard'])){
        foreach($_POST['hard'] as $k=>$v){
            //取出硬件个数
            $hard_num_arr = explode('-------x',$v);
            $hard_num = end($hard_num_arr);
            $sql_ware = "insert into wp_user_things ( `projectid` , `thing_id` , `num` ) values( {$post_id} , {$k} , {$hard_num})";
            // echo $sql_ware."<br>";
            $wpdb->query($sql_ware);
        }
    }
    if(is_array($_POST['soft'])){
        foreach($_POST['soft'] as $k=>$v){
            $sql_ware = "insert into wp_user_things ( `projectid` , `thing_id` ) values( {$post_id} , {$k} )";
            // echo $sql_ware."<br>";
            $wpdb->query($sql_ware);
        }
    }

    //插入团队到数据库并返回团队ID
    $sql = "insert into wp_project_team (`projectid`) values( {$post_id} )";
    $wpdb->query($sql);
    $sql = "select @@IDENTITY ";
    $team_id = $wpdb->get_results($sql,ARRAY_A);
    $tid = $team_id[0]['@@IDENTITY'];

    //插入团队成员到数据库
    $users_arr = $_POST['pro_user'];//成员数组
    $userdo_arr = $_POST['pro_userdo'];//成员贡献数组
    for($i = 0;$i<count($users_arr);$i++){
        //在这里查询用户ID用于拼接sql语句
        $sql_uid = "select ID from wp_users where user_login = '{$users_arr[$i]}'";
        $uid = $wpdb->get_results($sql_uid,ARRAY_A);
        // var_dump($uid[0]['ID']);
        $sql = "insert into team_partner ( `tid` , `uid` , `uname` , `udo` ) values( {$tid} , {$uid[0]['ID']} , '{$users_arr[$i]}' , '{$userdo_arr[$i]}' )";
        // var_dump($sql);
        $wpdb->query($sql);

    }

    //拼接项目信息插入
    $teamname = $_POST['teamname']; //团队名称
    $project_type = $_POST['project_type']; //项目类型
    $progress = $_POST['progress']; //项目进度
    $difficulty = $_POST['difficulty']; //项目团队
    $duration = $_POST['duration']; //所需时间
    $pro_url = $_POST['show_url']; //项目图片
    $upload_for = $_POST['upload_for']; //发布目的

    //查询执照
    $sql = "select name from wp_license where id = ".$_POST['license'];
    $license_list = $wpdb->get_results($sql,ARRAY_A);
    if($license_list){
        $license = $license_list[0]['name'];
    }else{
        $license = '';
    }
    //添加到project表
    $sql_pro = "insert into `wp_project` ( `projectid` , `teamname` , `progress` , `type` ,`difficulty` , `duration` ,`license` ,`pro_url` ,`upload_for` ) values ( '{$post_id}' , '{$teamname}', '{$progress}', '{$project_type}', '{$difficulty}',  '{$duration}', '{$license}', '{$pro_url}' ,'{$upload_for}' )";
    // echo $sql_pro;
    $wpdb->query($sql_pro);

    //如果有上传目的,添加到数据库sign_up表
    if($_POST['upload_for'] == 1){
        $cid = $_POST['com_name'];//比赛id
        $pname = $_POST['pro_title'];
        $sql_sign = "insert into sign_up ( `pid` , `cid` , `pname` , `team` ) values ( '{$post_id}' , '{$cid}' , '{$pname}' , '{$teamname}')";
        $wpdb->query($sql_sign);
    }


    //插入封面图到数据库
    // if ($_POST['_thumbnail_id']) {
    //     update_post_meta($post_id, '_thumbnail_id', $_POST['_thumbnail_id']);
    // }
    //插入项目图片路径到数据库
    // var_dump($_FILES);
    $mode = get_type($_FILES['pro_pic']['name']);//取后缀
    $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
    $dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
    $pic_dir = $dir.'/uploads/pro_pic/'.$fileName;
    // var_dump($pic_dir);
    if ($_FILES['pro_pic']) {
        if (move_uploaded_file($_FILES['pro_pic']['tmp_name'], $pic_dir)) {
            //拼接路径
            $pro_pic_path = '/uploads/pro_pic/'.$fileName;
            $sql = "update wp_project set pro_pic = '{$pro_pic_path}' where projectid = {$post_id}";
            $wpdb->query($sql);        
            // var_dump($pro_pic_path);
            // var_dump($sql);
        }
    }
    // die;

    //插入代码附件路径到数据库
    // var_dump($_FILES);
    $mode = get_type($_FILES['code_file']['name']);//取后缀
    $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
    $dir = str_replace("\\","/",dirname(dirname(dirname(__FILE__))));//取当前绝对路径
    $code_dir = $dir.'/uploads/code_pic/'.$fileName;
    if ($_FILES['code_file']) {
        if (move_uploaded_file($_FILES['code_file']['tmp_name'], $code_dir)) {
            //拼接路径
            $path = '/uploads/code_pic/'.$fileName;
            $sql = "insert into wp_attachments ( `projectid` , `type` , `path` , `url` , `comment` , `code` ) values (" . "'{$post_id}' ,  '1', '{$path}' , '{$_POST['url']}' , '{$_POST['comment']}' , '{$_POST['code']}' )";
            $wpdb->query($sql);
            // echo $sql;
        }
    }

    //插入原理图附件路径到数据库
    if ($_FILES['diagrams_file']) {
    $mode = get_type($_FILES['diagrams_file']['name']);//取后缀
    $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
    $diagrams_dir = $dir.'/uploads/diagrams_pic/'.$fileName;
        if (move_uploaded_file($_FILES['diagrams_file']['tmp_name'],    $diagrams_dir)) {
            //拼接路径
            $path = '/uploads/diagrams_pic/'.$fileName;
            $sql = "insert into wp_attachments ( `projectid` , `type` , `path` , `url` , `comment` , `code` ) values (" . "'{$post_id}' ,  '2', '{$path}' , '{$_POST['url']}' , '{$_POST['comment']}' , '{$_POST['code']}' )";
            $wpdb->query($sql);
            // echo $sql;
        }
    }
    //插入CAD附件路径到数据库
    if ($_FILES['cad_file']) {

    $mode = get_type($_FILES['diagrams_file']['name']);//取后缀
    $fileName = date("Y-m-d")."-".rand(1,10000).'-'.$post_id.'.'.$mode;
    $cad_dir = $dir.'/uploads/cad_pic/'.$fileName;
        if (move_uploaded_file($_FILES['cad_file']['tmp_name'], $cad_dir)) {
            $path = '/uploads/cad_pic/'.$fileName;
            $sql = "insert into wp_attachments ( `projectid` , `type` , `path` , `url` , `comment` , `code` ) values (" . "'{$post_id}' ,  '3', '{$path}' , '{$_POST['url']}' , '{$_POST['comment']}' , '{$_POST['code']}' )";
            $wpdb->query($sql);
            // echo $sql;
        }
    }
?>
    <h2><a href='<?php bloginfo('url') ?>/home/project-show/page-particular/?pid=<?php echo $post_id ?>'>去看看您刚刚录入的项目</a></h2>
<?php
}
function get_type($fileName){
    $file = explode('.',$fileName);
    return end($file);
?>
<?php
}
?>