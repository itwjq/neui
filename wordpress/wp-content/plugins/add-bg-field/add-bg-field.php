<?php 
/*
Plugin Name: 后台分类加 category_type_[分类的ID]字段
Plugin URI: 
Description: 给后台分类绑定字段,可以建立分类间额外的关联关系
Version: 1.0.0
Author: dongxinyu
Author URI: dongxinyu_it@163.om
*/
 ?>
<?php 

// 显示主菜单和子菜单
add_action('admin_menu','add_plugwork_menu');
function add_plugwork_menu() {
    add_menu_page(__(''), __('分类添加字段'), 'administrator',  __FILE__, 'show_something', plugin_dir_url( __FILE__ ).'images/logo.jpg', 99);
}
function show_something(){
	echo "<h2>　</h2>";
}

//修改类时工作 
function ashu_edit_cat_field($tag){
	$category_type_value = get_option('category_type_'.$tag->term_id);
	//初始化
	$show_type_arr = [
		'brief'=>'简介类',
		'role'=>'规则类',
		'project'=>'项目类',
		'jieshao'=>'介绍类',
	];
    echo '<tr>';
	    echo '<th>'.$tag->term_id.' 号分类 -->含义'.'</th>';
	    if($category_type_value && $category_type_value == 'none') 
    		echo "<td><input type='radio' name='category_type' value='none' checked> 其他类 </td>";
    	else if($category_type_value) 
    		echo "<td><input type='radio' name='category_type' value='none'> 其他类 </td>";
	    else
    		echo "<td><input type='radio' name='category_type' value='none' checked> 其他类 </td>"; 
    echo "</tr>";  
    foreach($show_type_arr as $k=>$v){
    	if($category_type_value == $k)
    		echo "<tr><th></th><td><input type='radio' name='category_type' value='{$k}' checked> {$v} </td></tr>"; 
    	else
    		echo "<tr><th></th><td><input type='radio' name='category_type' value='{$k}' > {$v} </td></tr>"; 
    }

}  
//分类再编辑需要接受参数    
add_action('category_edit_form_fields','ashu_edit_cat_field', 10, 2); 

//添加类时工作
function ashu_add_cat_field(){   
    echo '<div class="form-field">';   
    echo '<label for="ashu_cat_value" >创建分类含义</label>';
    echo "<label><input type='radio' name='category_type' value='none' checked> 其他类　　　　　　　　　　</label>";  
    echo '<label for="ashu_cat_value" >　创建比赛　</label>';
    echo "<label><input type='radio' name='category_type' value='brief' > 简介类　　　　　　　　　　　</label>";
    echo "<label><input type='radio' name='category_type' value='role' > 规则类　　　　　　　　　　　</label>";
    echo "<label><input type='radio' name='category_type' value='project' > 项目类　　　　　　　　　　　</label>";  
    echo '<p>如果您正在创建比赛,请务必选择上边几项中的某一项</p>';   
    echo '</div>';    
    echo '<label for="ashu_cat_value" >　创建平台　</label>';
    echo "<label><input type='radio' name='category_type' value='jieshao' > 介绍类　　　　　　　　　　　</label>";
    echo '<p>如果您正在创建平台,请务必选择上边几项中的某一项</p>';   
}    
add_action('category_add_form_fields','ashu_add_cat_field', 10, 2);     
  
//保存数据接受的参数为分类ID
function ashu_taxonomy_metadata($term_id){   
    if(isset($_POST['category_type'])){   
        //判断权限--可改   
        if(!current_user_can('manage_categories')){   
            return $term_id ;   
        }   
           
        $data = $_POST['category_type'];   
        $key = 'category_type_'.$term_id; //选项名为 category_type_1 类型   
        var_dump($key);
        update_option( $key, $data ); //更新选项值   
    }   
}  
add_action('created_category', 'ashu_taxonomy_metadata', 10, 1);   
add_action('edited_category','ashu_taxonomy_metadata', 10, 1);   
  
 ?>