<?php
global $wpdb;
global $current_user;
$isEdit = 0;
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
                    location.href = "<?php echo home_url()?>/login-2/";
                }
            sectime--;          
        },1000)
    </script>
<?php 
    // die;
}
//如果用户是要修改项目判断这个项目是不是该用户上传的
if(isset($_GET['edit']) && isset($_GET['pid'])){
    $pro_id = $_GET['pid'];
    //查项目上传用户ID
    $sql = "select post_author from wp_posts where ID = {$pro_id}";
    $res = $wpdb->get_results($sql,ARRAY_A);
    if($res[0]['post_author'] != $current_user->ID){
        echo "<h2>您只能修改您自己上传的项目</h2>";
        die;
    }
    //变量存储页面添加或者修改
    $isEdit = 1;
    //查项目信息
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
    // var_dump($pic);
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

    /*结束**************************************************************************/
}
    //查所有软硬件列表
    $sql_hard = "select * from wp_project_things where thingstype = 1";
    $res_hard = $wpdb->get_results($sql_hard,ARRAY_A);
    $sql_soft = "select * from wp_project_things where thingstype = 2";
    $res_soft = $wpdb->get_results($sql_soft,ARRAY_A);

    //查难度列表
    $sql_diff = "select * from pro_difficulty";
    $res_diff = $wpdb->get_results($sql_diff,ARRAY_A);

    //查执所有照信息
    $res_license = $wpdb->get_results("select * from wp_license",ARRAY_A);

    //查所有用户信息
    $sql_user = "select * from wp_usermeta where user_id = {$current_user->ID}";
    $res_user = $wpdb->get_results($sql_user,ARRAY_A);
    // var_dump($res_user);

    //查所有开启的比赛
    $sql_coms = "select * from compate where status = 1";
    $res_coms = $wpdb->get_results($sql_coms,ARRAY_A);
    // echo '<pre>';
    // var_dump($res_coms);
    // echo '</pre>';

    //拼接显示信息
    $pro_name = $isEdit ? $res_pro[0]['pro_name'] : '';//项目名
    $pro_url = $isEdit ? $res_pro[0]['pro_url'] : '';//演示视频网址
    $pro_excerpt = $isEdit ? $res_pro[0]['post_excerpt'] : '';//演示视频网址
    $pic_word = $isEdit ? '重新选择项目展示图片(不选择默认使用原图)' : '项目展示图片';
    $pro_team = $isEdit ? $res_pro[0]['teamname'] : '';//项目团队名
    $pro_content = $isEdit ? $res_pro[0]['post_content'] : '';//项目详情
    $pro_period = $isEdit ? $res_pro[0]['duration'] : 1;//项目时长
    $pro_license = $isEdit ? $res_pro[0]['license'] : '';//执照
    $selected_arr = [$res_pro[0]['difficulty']=>'selected'];//难度
    // var_dump($res_diff);
    // var_dump($selected_arr);
?>
<!-- 引入百度编辑器 -->
    <!-- 加载编辑器的容器 -->
    <!-- 配置文件 -->
    <script type="text/javascript" src="<?php bloginfo('url') ?>/wp-includes/editor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo home_url()?>/wp-includes/editor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
<!-- 以上引入百度编辑器 -->
<script src = "<?php bloginfo('url') ?>/wp-includes/js/jquery-1.8.3.min.js"></script>
<form action="" method="post" name="create_project_post" id="frontier_post" enctype="multipart/form-data">
    <?php if($isEdit){ ?>
        <input type="hidden" name="edit" value="<?php echo $pro_id ?>">
    <?php } ?>
    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#basics" data-toggle="tab">基本内容</a></li>
        <li>
            <a href="#team" data-toggle="tab">项目团队</a></li>
        <li>
            <a href="#things" data-toggle="tab">用到的东西</a></li>    
        <li>
            <a href="#story" data-toggle="tab">详细描述</a></li>
        <li>
            <a href="#attachments" data-toggle="tab">附件</a></li>
        <li>
            <a href="#publish_setting" data-toggle="tab">发布设置</a></li>
    </ul>
    <!-- ------------------------------------------ -->
    <div id="myTabContent" class="tab-content">
        <!-- --------------------基本内容-------------------- -->
        <div class="tab-pane fade in active" id="basics">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $pro_name; ?>" name="pro_title" placeholder="请输入项目名"><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">摘要</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="excerpt"><?php echo $pro_excerpt; ?></textarea><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目演示视频网址(优酷)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $pro_url ?>" name="show_url" placeholder="请输入项目演示视频链接"><br>
                </div>
            </div>

            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">
                    项目展示图片
                </label>
                <?php if($isEdit){ ?>
                <div class="col-sm-10">
                    <img title='双击修改项目图片' class='pro_pic' src="<?php echo home_url().'/wp-content'.$pic?>">
                    <div class="panel panel-default" style='display:none'>
                        <div class="panel-heading"><?php echo $pic_word ?></div>
                        <div class="panel-body">
                            <input type="file" name="pro_pic1" value="">
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-sm-10 pro_pic" <?php if($isEdit) echo "style='display:none'"?>>
                    <div class="panel panel-default">
                        <div class="panel-heading"><?php echo $pic_word ?></div>
                        <div class="panel-body">
                            <input type="file" name="pro_pic" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------项目团队-------------------- -->
        <div class="tab-pane fade" id="team">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">团队名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $pro_team; ?>" name="teamname" placeholder="请输入项目团队名称"></div>
            </div>

            <h4>　</h4>

            <div class="box-content">
                <div id="team-form" style="">
                    <div class="fields">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th style="width:40%">
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">用户</font></font>
                                    </th>
                                    <th style="display:none;">
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">允许</font></font>
                                    </th>
                                    <th style="width:40%">
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">贡献</font></font>
                                    </th>
                                    <th style="display:none;">
                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">状态</font></font>
                                    </th>
                                    <th><font style="vertical-align: inherit;">操作</font></th>
                                </tr>
                            </thead>
                            <tbody id="pro_partners">
                                
                                <?php if($isEdit){ ?>
                                    <?php foreach($res_teamusers as $value){ ?>
                                    <tr class="fields" name="partner_tem">
                                        <td style="width:40%">
                                            <div class="form-group hidden base_article_team_members_id">
                                                <input class="hidden" type="hidden" value="103649" name="" id="base_article_team_attributes_members_attributes_1_id">
                                            </div>
                                            <a href="#">
                                                    <font style="vertical-align: inherit;" name="pro_uname"><?php echo $value['uname'] ?></font>
                                                <input type="hidden" name="pro_user[]" value="<?php echo $value['uname'] ?>" class="pro_uid">
                                            </a>
                                        </td>
                                        <td style="display:none;">
                                            <div class="form-group select optional base_article_team_members_permission_action">
                                                <select class="select optional form-control" name="" id="base_article_team_attributes_members_attributes_1_permission_action">
                                                    <option value=""></option>
                                                    <option selected="selected" value="manage">
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理</font></font>
                                                    </option>
                                                    <option value="read">
                                                        <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">读</font></font>
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group text optional base_article_team_members_mini_resume"><textarea class="text optional form-control" maxlength="250" name="pro_userdo[]" ><?php echo $value['udo'] ?></textarea></div>
                                        </td>
                                        <td style="display:none;">
                                            <font style="vertical-align: inherit;"></font></font>
                                        </td>
                                        <td class="del_td">
                                            <?php if($value['uname'] != $current_user->user_login){ ?>
                                            <a class='btn btn-sm btn-danger remove_nested_fields' name='del_user' href='javascript:void(0)'><i class='fa fa-times-circle-o'></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                <script type="text/javascript">
                                    $("a[name='del_user']").click(function(){
                                        get_allusers();
                                        $(this).parents("tr").remove();
                                    });
                                </script>
                                <?php }else{ ?>

                                <!-- 当前登录的用户 -->
                                <tr class="fields" name="partner_tem">
                                    <td style="width:40%">
                                        <div class="form-group hidden base_article_team_members_id">
                                            <input class="hidden" type="hidden" value="103649" name="" id="base_article_team_attributes_members_attributes_1_id">
                                        </div>
                                        <a href="#">
                                                <font style="vertical-align: inherit;" name="pro_uname"><?php echo $current_user->user_login ?></font>
                                            <input type="hidden" name="pro_user[]" value="<?php echo $current_user->user_login ?>" class="pro_uid">
                                        </a>
                                    </td>
                                    <td style="display:none;">
                                        <div class="form-group select optional base_article_team_members_permission_action">
                                            <select class="select optional form-control" name="" id="base_article_team_attributes_members_attributes_1_permission_action">
                                                <option value=""></option>
                                                <option selected="selected" value="manage">
                                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">管理</font></font>
                                                </option>
                                                <option value="read">
                                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">读</font></font>
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group text optional base_article_team_members_mini_resume"><textarea class="text optional form-control" maxlength="250" name="pro_userdo[]" ></textarea></div>
                                    </td>
                                    <td style="display:none;">
                                        <font style="vertical-align: inherit;"></font></font>
                                    </td>
                                    <td class="del_td">
                                        
                                    </td>
                                </tr>
                                <!-- 当前登录的用户 -->
                                <?php } ?>

                                <tr class="fields">
                                    <td style="width:40%">
                                        <div class="form-group select optional base_article_team_members_user_id">
                                            <input type="text" id="search_user" placeholder="您可以在这里输入用户名进行搜索" style="margin-bottom:10px;" onblur="get_search()">
                                            <select class="select optional form-control select2 select2-hidden-accessible"  id='teammate'>
                                                <option class = 'teammate_opt'>
                                                    <font style='vertical-align: inherit;'>
                                                        选择一个用户
                                                    </font>
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td style="display:none;">
                                        <div class="form-group select optional base_article_team_members_permission_action">
                                            <select class="select optional form-control" name="" id="base_article_team_attributes_members_attributes_2_permission_action">
                                                <option value=""></option>
                                                <option selected="selected" value="manage">
                                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">(默认管理,功能不明确)</font></font>
                                                </option>
                                                <option value="read">
                                                    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">读</font></font>
                                                </option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group text optional base_article_team_members_mini_resume">
                                            <textarea class="text optional form-control" maxlength="250" name="" id="add_userdo"></textarea>
                                        </div>
                                    </td>
                                    <td style="display:none;">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;"></font>
                                        </font>
                                    </td>
                                    <td>
                                        
                                    </td>
                                </tr>
                                <tr class="sortable-disabled">
                                    <td colspan="3"><a name="add_partner" class="btn btn-xs btn-success nested-field-table add_nested_fields" data-association="members" data-blueprint-id="team_members_fields_blueprint" href="javascript:void(0)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加成员</font></font></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" value="89305" name="" id="base_article_team_attributes_id">
                    </div>
                </div>
            </div>

            <fieldset class="frontier_post_fieldset">
                <div align="center" style="padding-top:50px" style="display:none">
                    <input type="text" style="width:300px;height:20px;font-size:14pt;display:none" placeholder="请输入a或b模拟效果" id="team_input" onkeyup="autoComplete_team.start(event,'2','auto_team','team_members','team_members','http://127.0.0.1/wordpress/?json=hello.get_user&dev=1&name='+autoComplete_team.obj.value)">
                    <div class="cpm-form-item cpm-project-role">
                        <table id="thinglist_team"></table>
                    </div>
                </div>
                <div class="" id="auto_team"><!--自动完成 DIV--></div>
                <div id="team_members">
                <?php
                    // foreach($project_team as $key=>$val) {
                    //     echo '<tr id="thing'.$val['id'].'"><td>'.$val['userid'].'</td><td><input type="hidden" name="team_members[]" value="'.$val['userid'].'"><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123('.$val['id'].')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>';
                    // }
                ?>
                </div>
            </fieldset>
        </div>
        <!-- --------------------用到的东西-------------------- -->
        <div class="tab-pane fade" id="things">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目硬件</label>
                <div class="col-sm-6">
                    <select name = 'hard' id = 'selhard'>
                        <option value="" disabled selected>请选择</option>
                        <?php 
                            if($res_hard){
                                foreach($res_hard as $v){
                        ?>
                            <option value = "<?php echo $v['id']?>" ><?php echo $v['name']?></option>
                        <?php }} ?>
                    </select>
                </div>
                <label for="firstname" class="col-sm-1 control-label">个数</label>
                <div class="col-sm-2">
                    <input type="number" id = 'h_num' name="num" value = '1' min = '1'>
                </div>
                <label class="col-sm-1 control-label" ID= 'addhard'>添加</label>
    
                <h5>　</h5>
                <div class = "col-sm-12" id = 'div_hard'> 

                    <?php 
                        if($isEdit){
                            foreach($res_hardthing as $value){
                                echo "<input style='margin-top:2px;' readonly type='text' class='hard{$value['id']}' name=hard[{$value['id']}] value='{$value['name']}-------x{$value['num']}' >";
                            }
                    ?>
                        <script type="text/javascript">
                            $("#div_hard").find('input').click(function(){
                                //取值
                                var val = $(this).attr('class').slice(4);
                                // alert(key);
                                remove(arr_choose, val);  
                                $(this).remove();
                            })
                        </script>
                    <?php }?>
                </div>

                <h5>　</h5>
                <label for="firstname" class="col-sm-2 control-label">项目软件</label>
                <div class="col-sm-9">
                    <select name = 'soft' class="form-control" id="selsoft" >
                        <option value="" disabled selected>请选择</option>
                        <?php 
                            if($res_soft){
                                foreach($res_soft as $v){
                        ?>
                            <option value = <?php echo $v['id']?>><?php echo $v['name']?></option>
                        <?php }} ?>
                    </select>
                </div>
                <label class="col-sm-1 control-label" ID= 'addsoft'>添加</label>
                <h5>　</h5>
                <div class = "col-sm-12" id = 'div_soft'> 
                    <?php 
                        if($isEdit){
                            foreach($res_softthing as $value){
                                echo "<input style='margin-top:2px;' readonly type='text' class='soft{$value['id']}' name=soft[{$value['id']}] value='{$value['name']}' >";
                            }
                    ?>
                    <script type="text/javascript">
                        $("#div_soft").find('input').click(function(){
                            //取值
                            var val = $(this).attr('class').slice(4);
                            // alert(key);
                            remove(arr_choose, val);  
                            $(this).remove();
                        })
                    </script>
                    <?php }?>
                </div>
            </div>

            <fieldset class="frontier_post_fieldset">
                <div align="center" style="padding-top:50px">
                    <!-- <input type="text" style="width:300px;height:20px;font-size:14pt;" placeholder="请输入硬件名称" id="hardware_input" onkeyup="autoComplete_hardware.start(event,'1','auto_hardware','things_hardware','things_hardware','http://127.0.0.1/wordpress/?json=hello.get_things&dev=1&name='+autoComplete_hardware.obj.value + '&type=1')"> -->
                    <div class="cpm-form-item cpm-project-role">
                    </div>
                </div>
                <div class="" id="auto_hardware">
                    <!--自动完成 DIV--></div>
                <div id="things_hardware">
                <?php
                    // $project_team = $wpdb->get_results("SELECT * FROM `wp_user_things` WHERE thingstype='1' AND projectid='".$_GET['edit']."'",ARRAY_A); 
                    // foreach($project_team as $key=>$val) {
                    //     echo '<tr id="thing'.$val['id'].'"><td>'.$val['productid'].'</td><td><input type="hidden" name="team_members[]" value="'.$val['productid'].'"><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123('.$val['id'].')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>';
                    // }
                ?>
                </div>
            </fieldset>
            
            <fieldset class="frontier_post_fieldset">
                
                <div class="" id="auto">
                    <!--自动完成 DIV--></div>
                <div id="things_software">
                <?php
                    // $project_team = $wpdb->get_results("SELECT * FROM `wp_user_things` WHERE thingstype='2' AND projectid='".$_GET['edit']."'",ARRAY_A); 
                    // foreach($project_team as $key=>$val) {
                    //     echo '<tr id="thing'.$val['id'].'"><td>'.$val['productid'].'</td><td><input type="hidden" name="team_members[]" value="'.$val['productid'].'"><a hraf="#" class="cpm-del-proj-role cpm-assign-del-user" onclick="delete123('.$val['id'].')"><span class="dashicons dashicons-trash"></span> <span class="title">删除</span></a></td></tr>';
                    // }
                ?>
                </div>
            </fieldset>
            
        </div>
        <!-- --------------------详细描述-------------------- -->
        <div class="tab-pane fade" id="story">
            <fieldset class="frontier_post_fieldset">
                <legend>故事</legend>
                <div id="frontier_editor_field">
                    <script id="container" name="project_content" type="text/plain">
                        
                    </script>
                </div>
            </fieldset>
        </div>
        <div>
            <?php //echo $pro_content; ?>
        </div>
        <div class='content' style="display:none"><?php echo $pro_content; ?></div>
        <!-- --------------------附件-------------------- -->
        <div class="tab-pane fade" id="attachments">
            <?php //foreach($res_code as $value){ ?>
            <div class="panel panel-default">
                <div class="panel-heading">代码</div>
                <?php if($isEdit && $res_code){ ?>
                    <center class='pro_pic'><img title='双击修改代码图片' src="<?php echo home_url().'/wp-content'.$res_code[0]['path']?>"></center>
                    <div class="panel-body" style="display:none">
                        <div class="panel-body">
                            <input type="file" name="code_file1" value="">
                        </div>
                    </div>
                <?php } ?>
                <div class="panel-body" style="<?php if($isEdit && $res_code) echo "display:none"; ?>" >
                    <input type="file" name="code_file<?php if($isEdit && !$res_ylt) echo "1"; ?>" value="">
                    <!-- or<textarea name="code"></textarea> -->
                </div>
            </div>
            <?php //} ?>
            <?php //foreach($res_ylt as $value){ ?>
            <div class="panel panel-default">
                <div class="panel-heading">原理图和电路图</div>
                <?php if($isEdit && $res_ylt){ ?>
                    <center class='pro_pic'><img title='双击修改原理图' src="<?php echo home_url().'/wp-content'.$res_ylt[0]['path']?>"></center>
                    <div class="panel-body" style="display:none">
                        <input type="file" name="diagrams_file1" value="">
                    </div>
                <?php } ?>
                <div class="panel-body" style="<?php if($isEdit && $res_ylt) echo "display:none"; ?>" >
                    <input type="file" name="diagrams_file<?php if($isEdit && !$res_ylt) echo "1"; ?>" value="">
                </div>
            </div>
            <?php //} ?>
            <?php //foreach($res_cad as $value){ ?>
            <div class="panel panel-default">
                <div class="panel-heading">CAD - 外壳和定制部件</div>
                <?php if($isEdit && $res_cad){ ?>
                    <center class='pro_pic'><img title='双击修改图片' src="<?php echo home_url().'/wp-content'.$res_cad[0]['path']?>"></center>
                    <div class="panel-body" style="display:none">
                        <input type="file" name="cad_file1" value="">
                    </div>
                <?php } ?>
                <div class="panel-body" style="<?php if($isEdit && $res_cad) echo "display:none"; ?>">
                    <input type="file" name="cad_file<?php if($isEdit && !$res_ylt) echo "1"; ?>" value="">
                </div>
            </div>
            <?php //} ?>
        </div>
        <!-- --------------------发布设置-------------------- -->
        <div class="tab-pane fade" id="publish_setting">
            <h2>发布目的</h2>
            <div class="radio">
                <select name="upload_for">
                    <option value="none" selected disabled>请选择发布目的( * 必选)</option>
                    <option value="0" <?php if(!$isEdit) echo ' checked'; ?> <?php if ($isEdit && $res_pro[0]['upload_for'] == '0') echo 'checked'; ?> >我要把这个项目展示给大家</option>
                    <option value="1" <?php if(!$isEdit) echo ' checked'; ?> <?php if ($isEdit && $res_pro[0]['upload_for'] == '1') echo 'checked'; ?> >这个项目用来参加比赛</option>
                </select>
            </div>
            <div class="radio" name="com_div" style="display:none">
                <select name="com_name">
                    <!-- <option value="none" selected disabled>请选择比赛( * 必选)</option> -->
                    <?php 
                        if($res_coms){
                            foreach($res_coms as $k=>$v){
                                echo "<option value='{$v['id']}'>{$v['name']}</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <h2>项目类型</h2>
            <div class="radio">
                <label>
                    <input type="radio" name="project_type" value="select_wip" <?php if(!$isEdit) echo 'checked'; ?> <?php if ($isEdit && $res_pro[0]['type'] == 'select_wip') echo 'checked'; ?>> 我正在记录我如何建立一个项目
                    <p>例如：气象站，智能恒温器</p>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="project_type" value="protips" <?php if ($isEdit && $res_pro[0]['type'] == 'protips') echo 'checked'; ?>>我只是描述如何使用组件或应用程序
                    <p>例子：如何用Arduino Uno控制电机，开始使用Raspberry Pi</p>
                </label>
            </div>
            <h2>进展</h2>
   
            <div class="radio">
                <label>
                    <input type="radio" name="progress" value="wip" <?php if ($isEdit && $res_pro[0]['progress'] == 'wip') echo 'checked'; ?>> <p>我仍在研究我的项目</p>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="progress" value="select_tuto" <?php if(!$isEdit) echo 'checked'; ?> <?php if ($isEdit && $res_pro[0]['progress'] == 'select_tuto') echo 'checked'; ?>> <p>我的项目已完成</p>
                </label>
            </div>


            <h2>难度</h2>
            <div class="form-group">
                <select class="form-control" name="difficulty" id="difficulty123">
                    <?php foreach($res_diff as $k=>$v){ ?>
                        <option value = "<?php echo $v['diff_value'] ?>" <?php if(isset($selected_arr[$v['diff_value']])) echo $selected_arr[$v['diff_value']] ?> ><?php echo $v['diff_name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <h2>所需时间</h2>
            
            <div class="form-group form-inline">
                <input type="text" class="form-control" name="duration" placeholder="请输入时间" value="<?php echo $pro_period; ?>"><span>　小时</span>
            </div>  
            
            <h2>执照</h2>
            <div class="form-group">
                <select class="form-control" name="license">
                    <?php
                        foreach($res_license as $value){
                            if($pro_license == $value['name']) 
                                echo "<option selected>{$value['name']}</option>";
                            else
                                echo "<option>{$value['name']}</option>";
                        } 
                    ?>
                </select>
            </div>
    
    
            <h2>状态设置</h2>
            <div class="radio">
                <label>
                    <input type="radio" name="post_status" value="private" <?php if ($isEdit && $res_pro[0]['post_status'] == 'private') echo 'checked'; ?>> <p>只能访问你</p>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="post_status" value="publish" <?php if(!$isEdit) echo 'checked'; ?> <?php if ($isEdit && $res_pro[0]['post_status'] == 'publish') echo 'checked'; ?>> <p>任何人都能访问</p>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="post_status" value="draft" <?php if ($isEdit && $res_pro[0]['post_status'] == 'draft') echo 'checked'; ?>> <p>草稿</p>
                </label>
            </div>



            <button class="btn btn-primary btn-lg pull-right" type="submit" name="user_post_submit" id="user_post_publish"  value="publish">发布</button>

                </div>
            </div>
        </form>

<script type="text/javascript">
    //图片标签ID为pro_pic
    $(".pro_pic").dblclick(change);
    function change(){
        $(this).css('display','none');
        $(this).next('div').css('display','block');
    }
</script>
<script type="text/javascript">
    // var img = $("<input type='text' value='1'>")
    $(function(){
        var text = $(".content").html();
        //判断ueditor 编辑器是否创建成功
        ue.addListener("ready", function () {
            // editor准备好之后才可以使用
            // ue.setContent(<?php //echo $pro_content; ?>);
            ue.execCommand( 'inserthtml', text);
            // ue.append(img);
        });
    });
</script>   
<script type="text/javascript">
    /**************************************************************
    项目硬件
    **************************************************************/
    //所有硬件
    var hardlist = $("#selhard").find("option");
    //硬件信息拼成数组
    var hard_arr = [];var id,value;
    hardlist.each(function(){  //遍历所有option  
        id = $(this).val();   //获取option值   
        value = $(this).text();
        if(value){  
            hard_arr[id]=value; 
        }  
    })  
    //创建数组存储选择了哪些标签
    var arr_choose = [];
    //创建数组存储选择了哪些软件
    var s_arr_choose = [];
    //执行函数把当前页面的软硬件设备放进去
    push_arr_choose();
    function push_arr_choose(){
        var inputs_hard = $("#div_hard").find('input');
        var inputs_soft = $("#div_soft").find('input');
        for(var i = 0;i<inputs_hard.length;i++){
            arr_choose.push(inputs_hard[i].className.slice(4));
        }
        for(var i = 0;i<inputs_soft.length;i++){
            s_arr_choose.push(inputs_soft[i].className.slice(4));
        }
        // console.log(arr_choose);
        // console.log(s_arr_choose);
    }
    $("#addhard").click(function(){
        //创建展示的input标签
        var inp = $("<input style='margin-top:2px;' readonly type='text' >");
        //给硬件显示标签添加事件
        inp.click(function(){
            //取值
            var val = $(this).attr('class').slice(4);
            // alert(key);
            remove(arr_choose, val);  
            $(this).remove();
        })
        //获取个数
        var num = $("#h_num").val();
        // alert(num);
        //选中的硬件信息
        var hard_opt = $("#selhard").find("option:selected");
        //选中的的硬件id
        var hard_val = hard_opt.val();
        // console.log(arr_choose);
        //没选硬件
        if(hard_val == ''){
            alert('请选择硬件后添加');
        //选硬件了
        }else{
            if(inArray(hard_val,arr_choose)){
                //更新数量
                var old_text = $("input[class=hard"+hard_val+"]").val();
                //函数作用,返回个数
                var old_num = Myexplode('x',old_text);
                // console.log(old_num+'---'+num);
                var new_num = parseInt(num)+parseInt(old_num);
                var new_text = hard_arr[hard_val]+"-------x"+new_num;
                //根据ID选择出标签,改变个数
                $("input[class=hard"+hard_val+"]").val(new_text);
            }else{
                //直接放进去
                arr_choose.push(hard_val);
                // console.log(arr_choose);
                //拼接显示信息
                inp.val($("#selhard").find("option:selected").text()+'-------x'+num);
                //拼装标签
                inp.attr('class','hard'+hard_val);
                inp.attr('name','hard['+hard_val+']');
                //插入标签
                $(div_hard).append(inp);
                // console.log(inp);
            }
            console.log(arr_choose);
            // console.log();
        }
    });
    /**************************************************************
    项目软件
    **************************************************************/
    //所有软件
    var softlist = $("#selsoft").find("option");
    //所有软件信息拼成数组
    var soft_arr = [];var s_id,s_value;
    softlist.each(function(){  //遍历所有option  
        s_id = $(this).val();   //获取option值   
        s_value = $(this).text();
        if(s_value){  
            soft_arr[id]=s_value; 
        }  
    })  
    $("#addsoft").click(function(){
        //创建展示的input标签
        var s_inp = $("<input style='margin-top:2px;' readonly type='text' >");
        //给软件显示标签添加事件
        s_inp.click(function(){
            //取值
            var val = $(this).attr('class').slice(4);
            // alert(key);
            remove(s_arr_choose, val);  
            $(this).remove();
        })
        //选中的软件信息
        var soft_opt = $("#selsoft").find("option:selected");
        //选中的的软件id
        var soft_val = soft_opt.val();
        //没选软件
        if(soft_val == ''){
            alert('请选择软件后添加');
        //选了
        }else{
            if(inArray(soft_val,s_arr_choose)){
                alert("您已经添加过这个软件了");
            }else{
                // 直接放进去
                s_arr_choose.push(soft_val);
                // console.log(arr_choose);
                //拼接显示信息
                s_inp.val($("#selsoft").find("option:selected").text());
                //拼装标签
                s_inp.attr('class','soft'+soft_val);
                s_inp.attr('name','soft['+soft_val+']');
                //插入标签
                $("#div_soft").append(s_inp);
                // console.log(s_inp);
            }

        }
    });
    function inArray(val,arr){
        //数组为空返回false
        if(arr.length == 0) return false;
        for(var i = 0;i<arr.length;i++){
            //在数组内返回true
            if(val == arr[i]) return true;
        }
        return false;       
    }
    function Myexplode(shotstr,longstr){
        var str = '';
        for(var i = longstr.length-1;i>=0;i--){
            if(longstr[i] == shotstr){
                return parseInt(str);
            }else{
                str = longstr[i]+str;
            }
        }
        return parseInt(str);
    }
    //删除数组指定的值
    function remove(arr, val) {  
      for(var i=0; i<arr.length; i++) {  
        if(arr[i] == val) {  
          arr.splice(i, 1);  
          break;  
        }  
      }  
    }  
</script>

<script type="text/javascript">
    //获取
    var team_opts = $(".teammate_opt");
    var sel_users = $("#teammate");
    //用户数组
    var users = [];
    var user_search = $("#search_user");
    var user_name = '';
    //定义搜索框获取焦点事件
    user_search.focus(function(){
        users.splice(0,users.length);//清空数组users
    });
    get_search();//执行第一次查询,查所有用户
    function get_search(){
        user_name = user_search.val();//取用户输入的用户名
        $.ajax({
            type: 'POST',
            url: "<?php echo WP_PLUGIN_URL?>/project-creator/getusers.php",
            // dataType:"json",
            data:{'username':user_name},
            success: function(data){
                if(data != 0){
                    // console.log(JSON.parse(data));
                    var res_data = JSON.parse(data);
                    for(var i = 0;i<res_data.length;i++){
                        if(res_data[i].uname){
                            if(inArray(res_data[i].uname,users)) ;
                            else{
                                users.push(res_data[i].uname);
                            }
                        }
                    }
                    // console.log('查指定开始');
                    // console.log(users);
                    // console.log('查指定结束');
                }
                add_tags();
            }
        });
    }
    function add_tags(){
        //清空所有标签
        sel_users.empty();
        //插入提示标签
        var new_opt = team_opts.clone();
        new_opt.html('<--请选择-->');
        new_opt.attr('disabled',true);
        new_opt.attr('selected',true);
        sel_users.append(new_opt);
        //插入标签
        for(var j = 0;j<users.length;j++){
            var new_opt = team_opts.clone();
            new_opt.html(users[j]);
            if(users[j] == $("#login_name").val()){
                new_opt.attr('disabled',true);
            }
            sel_users.append(new_opt);                      
        }
    }
</script>
<script type="text/javascript">
    //删除成员
    var deluser_btn = $("<a class='btn btn-sm btn-danger remove_nested_fields' name='del_user' href='javascript:void(0)'><i class='fa fa-times-circle-o'></i></a>");
    deluser_btn.click(function(){
        get_allusers();
        $(this).parents("tr").remove();
    });
    //添加成员
    //成员行
    var tr = $("tr[name='partner_tem']:first");
    var all_names = [];//定义数组取现在界面所有的用户名
    //添加成员事件
    get_allusers();
    $("a[name='add_partner']").click(add_tr);
    function add_tr(){
        //取用户名
        var userName = sel_users.find('option:selected').text();
        if(userName == '<--请选择-->'){
            //不能添加空用户
            alert('请选择用户');
            return ;
        }
        get_allusers();//取所有选过的用户
        //重复就不添加
        if(inArray(userName,all_names)){
            alert("您已经添加过该成员了");
            return ;
        }
        
        var new_tr = tr.clone(true);//克隆一行
        var tbody = $("#pro_partners");//找到tbody
        var userDo = $("#add_userdo").val();//成员贡献
        var has_del = new_tr.find("a[name='del_user']").size();
        // alert(has_del);
        if(has_del == 1){
            ;
        }else{
            //克隆 删除按钮
            var new_deluser_btn = deluser_btn.clone(true);
            new_tr.find(".del_td").append(new_deluser_btn);//把删除按钮放进去
        }
            new_tr.find("font[name='pro_uname']").html(userName);//设置用户名显示
            new_tr.find("input[name='pro_user[]']").val(userName);//设置用户名传值
            new_tr.find("textarea[name='pro_userdo[]']").val(userDo);//设置贡献
            tbody.prepend(new_tr);//插入新的行
    }
    function get_allusers(){
        all_names = [];
        var all_username = $("font[name='pro_uname']");//所有用户名对象
        for(var i = 0;i<all_username.length;i++){
            if(inArray(all_username[i].innerHTML,all_names)){
                ;
            }else{
                all_names.push(all_username[i].innerHTML);
            }
        }
        // console.log(all_names);
    }

    $("select[name='upload_for']").change(function(){
        var user_do = $("select[name='upload_for'] option:selected").val();
        //满足条件就弹出来所有比赛
        if(user_do == 1){
            //比赛框显示
            $("div[name='com_div']").css('display','block');
        }else{
            //比赛框不显示
            $("div[name='com_div']").css('display','none');
        }
    });
    $("form[name='create_project_post']").submit(function(){
        // alert();
        var can_submit = Array();//内容数组
        var can_submit_word = Array();//内容提示项数组
        var flag = true;
        //项目名
        can_submit.push($("input[name='pro_title']").val());
        can_submit_word.push('项目名不能为空');
        //项目团队
        can_submit.push($("input[name='teamname']").val());
        can_submit_word.push('项目团队名称不能为空');
        //项目大图
        if($("img[class='pro_pic']").size() == 0){
            can_submit.push($("input[name='pro_pic']").val());
            can_submit_word.push('您还没添加项目展示图片');
        }
        for(var i = 0;i<can_submit.length;i++){
            if(can_submit[i] == ''){
                alert(can_submit_word[i]);
                flag = false;
            }
        }
        if(!flag) return false;
        //发布目的
        if($("select[name='upload_for'] option:selected").val() == 'none'){
            alert("请在发布设置中选择发布目的");
            return false;
        }
    });
</script>
<script>
</script>

