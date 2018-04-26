<?php 
global $wpdb;
global $current_user;
//用户个人中心网址
$usercenter_url = home_url()."/user-2/";
if(is_user_logged_in()){
    wp_get_current_user();//用户登录状态
}else{
    echo "<center><h2 class = 'jump'></h2></center>";
    jump_login();//跳转登录
    die;
}
?>
<?php 
if(isset($_GET)){
    $contest_title = array_keys($_GET);//取比赛名
    $contest_id = $contest_title[0];//取比赛id
}
 ?>
    <!-- 加载编辑器的容器 --><!-- 配置文件 -->
    <script type="text/javascript" src="<?php echo home_url() ?>/wp-includes/editor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="<?php echo home_url()?>/wp-includes/editor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
<div style="width:80%;height:auto;margin:0 auto;">
<form action="" method="post" name="create_project_post" id="frontier_post" enctype="multipart/form-data">
    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#basics" data-toggle="tab">基本内容</a></li>
        <li>
            <a href="#team" data-toggle="tab">项目团队</a></li>
        <li style="display:none">
            <a href="#things" data-toggle="tab">用到的东西</a></li>    
        <li>
            <a href="#story" data-toggle="tab">详细描述</a></li>
        <li>
            <a href="#attachments" data-toggle="tab">附件</a></li>
        <li>
            <a href="#publish_setting" data-toggle="tab">发布设置</a></li>
    </ul>
    <h3>　</h3>
    <div id="myTabContent" class="tab-content">
        <!-- 基本信息 -->
        <div class="tab-pane fade in active" id="basics">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="" name="post_title" placeholder="请输入项目名"><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">摘要</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="excerpt"></textarea><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目演示视频网址(优酷)</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="" name="show_url" placeholder="请输入项目演示视频链接"><br>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">
                    项目展示图片
                </label>
                <div class="col-sm-10">
                    <div class="panel panel-default" style='display:'>
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <input type="file" name="pro_pic" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- 团队名称 -->
        <div class="tab-pane fade" id="team">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">团队名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo ''; ?>" name="teamname" placeholder="请输入项目团队名称"></div>
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
                                
                                <!-- 当前登录的用户 -->
                                <tr class="fields" name="partner_tem">
                                    <td style="width:40%" class="td-fir">
                                        
                                        <a href="<?php echo $usercenter_url ?>">
                                                <font style="vertical-align: inherit;" id="<?php echo $current_user->ID; ?>" name="pro_uname"><?php echo $current_user->user_login; ?></font>
                                                <input type="hidden" name="pro_user[]" value="<?php echo $current_user->ID; ?>" class="pro_uid">
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
                                    <td class="td-third">
                                        <div class="form-group text optional base_article_team_members_mini_resume"><textarea class="text optional form-control" maxlength="250" name="pro_userdo[]" ></textarea></div>
                                    </td>
                                    <td style="display:none;">
                                        <font style="vertical-align: inherit;"></font>
                                    </td>
                                    <td class="del_td">
                                    </td>
                                </tr>
                                
                                <!-- 添加用户 -->
                                <tr class="fields">
                                    <td style="width:40%">
                                        <div class="form-group select optional base_article_team_members_user_id">
                                            <input type="text" class="search_input" placeholder="请您在这里输入用户名进行搜索" value='' style="margin-bottom:10px;">
                                            <select  class='teammate'>
                                                <option class = 'teammate_opt' disabled selected>
                                                    请输入用户名
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
                                    <td><a name="add_partner" class="btn btn-xs btn-success nested-field-table add_nested_fields" data-association="members" data-blueprint-id="team_members_fields_blueprint" href="javascript:void(0)"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">添加成员</font></font></a>
                                    </td>
                                </tr>
                                <tr class="sortable-disabled">
                                    
                                </tr>
                            </tbody>
                        </table>
                        <input type="hidden" value="89305" name="" id="base_article_team_attributes_id">
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------用到的东西-------------------- -->
        <div class="tab-pane fade" id="things">
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">项目硬件</label>
                <div class="col-sm-6">
                    <select name = 'hard' id = 'selhard'>
                        <option value="" disabled selected>请选择</option>
                    </select>
                </div>
                <label for="firstname" class="col-sm-1 control-label">个数</label>
                <div class="col-sm-2">
                    <input type="number" id = 'h_num' name="num" value = '1' min = '1'>
                </div>
                <label class="col-sm-1 control-label" ID= 'addhard'>添加</label>
    
                <h5>　</h5>
                <div class = "col-sm-12" id = 'div_hard'> 
                    <script type="text/javascript">
                        $("#div_hard").find('input').click(function(){
                            //取值
                            var val = $(this).attr('class').slice(4);
                            // alert(key);
                            remove(arr_choose, val);  
                            $(this).remove();
                        })
                    </script>
                </div>

                <h5>　</h5>
                <label for="firstname" class="col-sm-2 control-label">项目软件</label>
                <div class="col-sm-9">
                    <select name = 'soft' class="form-control" id="selsoft" >
                        <option value="" disabled selected>请选择</option>
                    </select>
                </div>
                <label class="col-sm-1 control-label" ID= 'addsoft'>添加</label>
                <h5>　</h5>
                <div class = "col-sm-12" id = 'div_soft'>
                    <script type="text/javascript">
                        $("#div_soft").find('input').click(function(){
                            //取值
                            var val = $(this).attr('class').slice(4);
                            // alert(key);
                            remove(arr_choose, val);  
                            $(this).remove();
                        })
                    </script>
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
                </div>
            </fieldset>
            
            <fieldset class="frontier_post_fieldset">
                
                <div class="" id="auto">
                    <!--自动完成 DIV--></div>
                <div id="things_software">
                </div>
            </fieldset>
            
        </div>
        <!-- --------------------详细描述-------------------- -->
        <div class="tab-pane fade" id="story">
            <fieldset class="frontier_post_fieldset">
                <legend>故事</legend>
                <div id="frontier_editor_field">
                    <script id="container" name="post_content" type="text/plain">
                        
                    </script>
                </div>
            </fieldset>
        </div>
        <div>
            <?php //echo $pro_content; ?>
        </div>
        <div class='content' style="display:none"></div>
        <!-- --------------------附件-------------------- -->
        <div class="tab-pane fade" id="attachments">
            <div class="panel panel-default">
                <div class="panel-heading">代码</div>
                <div class="panel-body" style="" >
                    <input type="file" name="code_file" value="">
                    <!-- or<textarea name="code"></textarea> -->
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">原理图和电路图</div>
                <div class="panel-body" style="" >
                    <input type="file" name="diagrams_file" value="">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">CAD - 外壳和定制部件</div>
                <div class="panel-body" style="">
                    <input type="file" name="cad_file" value="">
                </div>
            </div>
        </div>
        <!-- --------------------发布设置-------------------- -->
        <div class="tab-pane fade" id="publish_setting">

            <h2>查看权限</h2>
            <div class="radio">
                <label>
                    <input type="radio" name="post_status" checked value="publish" > <p>公共</p>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="post_status" value="private" > <p>加密(只有自己可见)</p>
                </label>
            </div>
            <div class="radio" style="display: none">
                <label>
                    <input type="radio" name="post_status" value="draft" > <p>草稿</p>
                </label>
            </div>

            <h2 style="display:none">难度</h2>
            <div class="form-group" style="display:none">
                <select class="form-control" name="difficulty" id="pro_diff">

                </select>
            </div>

            <h2>完成时间</h2>
            
            <div class="form-group form-inline">
                <input type="text" class="form-control" name="duration" placeholder="请输入时间" value=""><span>　小时</span>
            </div>  
            
            <h2 style="display:none">许可证</h2>
            <div class="form-group" style="display:none">
                <select class="form-control" name="license">
                    
                </select>
            </div>
            <input type="hidden" name="post_author" value="<?php echo $current_user->ID; ?>">
            <?php 
                if($contest_id){
             ?>
            <input type="hidden" name="contest" value="<?php echo $contest_id; ?>">
            <?php } ?>
            <input type="submit" class="btn btn-primary btn-lg pull-right" value="发　布">
        </div>
    </div>
</form>
<div style="font: 0px/0px sans-serif;clear: both;display: block"> </div>
<!-- 引入功能JS文件 -->
<script src=<?php echo ARTICLE_CREATE_URL;?>/js/project-create.js></script>
<!-- 引入JS函数文件 -->
<script src=<?php echo ARTICLE_CREATE_URL;?>/js/functions-js.js></script>
<script>
    var plugin_url = "<?php echo ARTICLE_CREATE_URL;?>";
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
</div>