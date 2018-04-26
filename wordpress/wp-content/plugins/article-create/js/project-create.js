var unames = [];//初始化用户名称数组
var uids = [];//初始化用户ID数组
//提交前检查必填项
$("form").submit(function(e){
    //取值判断不能为空的项
    var input_arr = [];
    var err_word_arr = [];
    input_arr.push($("input[name='post_title']").val());//项目名
    err_word_arr.push('项目名不能为空');
    input_arr.push($("textarea[name='excerpt']").val());//摘要
    err_word_arr.push('项目简介不能为空');
    input_arr.push($("input[name='pro_pic']").val());//项目图片
    err_word_arr.push('您没添加项目名展示图片');
    input_arr.push($("body[class='view']").find("p").html());//项目图片
    err_word_arr.push('您没添写项目故事');
    for(var i = 0;i<input_arr.length;i++){
        if(judge_isempty(input_arr[i])){
            alert(err_word_arr[i]);
            return false;
        }
    }
});
//判断空函数
function judge_isempty($str){
    if($str == '') return true;
    else return false;
}
//选择用户事件
$(".teammate").on('change',function(){
    uname_choose = $(".teammate option:selected").html();//获取选中的用户名
    uid_choose = $(".teammate option:selected").val();//获取选中的用户id
});
//添加成员
$("a[name='add_partner']").click(function(){
    //取当前表格中所有用户-->去重
    var u_font_choose = $("tr[name='partner_tem']").find("td[class='td-fir']").find("font");
    var u_choose = [];
    //数组存储原本用户ID信息
    for(var i = 0;i<u_font_choose.length;i++){
        var uid = u_font_choose[i].getAttribute('id');//取ID
        if(inArray(uid,u_choose)){
            continue;
        }else{
            // u_choose.push(u_font_choose[i].innerHTML);
            u_choose.push(uid);
        }
    }
    // console.log(u_choose);
    //新用户信息录入
    if(inArray(uid_choose,u_choose)){
        alert("您添加过该用户了");
        return false;
    }else{
        //插入用户
        var u_do = $("#add_userdo").val();
        var new_tr = $("tr[name='partner_tem']:first").clone(true);
        new_tr.find("td[class='td-fir']").find("font").text(uname_choose);//显示的用户名
        new_tr.find("td[class='td-fir']").find("font").attr('id',uid_choose);//用户id
        new_tr.find("td[class='td-fir']").find("input").val(uid_choose);//提交的用户ID
        new_tr.find("td[class='td-third']").find("textarea").val(u_do);//用户贡献
        $("#add_userdo").val('');//清空用户贡献默认值
        //插入删除按钮
        var del_user_button = $("<a class='btn btn-sm btn-danger remove_nested_fields' name='del_user' href='javascript:void(0)'><i class='fa fa-times-circle-o'></i></a>");
        new_tr.find(".del_td").find("a[name='del_user']").remove();
        new_tr.find(".del_td").append(del_user_button);
        $("#pro_partners").prepend(new_tr);//插入用户贡献
    }
});
//实时搜索
$("body").on("input porpertychange",".search_input",function(){
    // var thisTxt=$("#name").val();
    // $(this).siblings("p").html(thisTxt);
    var userIN = $(this).val();
    // console.log(userIN);
    //获取字符超过三个开始搜索
    if(userIN.length<4){
        $(".teammate").empty();
        $(".teammate").append($("<option>请继续输入...</option>"));
    }else{
        $(".teammate").empty();
        $(".teammate").append($("<option>正在搜索,请稍后...</option>"));
        // $(".teammate").find(".teammate_opt").text("正在搜索,请稍后...");
    }
    ajax_search('getusers',userIN);
});
//禁止回车提交
$("form").keydown(function(e){
    if(e.keyCode==13){
        return false;
    }
});
function ajax_search(user_do,search_info){
    var pendingRequests = {};
    // 指定预处理参数选项的函数
    $.ajaxPrefilter( function(options, originalOptions, get_ajax){
        var key = options.url;
        console.log(key);
        if (!pendingRequests[key]) {
            pendingRequests[key] = get_ajax;
        }else{
            pendingRequests[key].abort();   // 放弃先触发的提交
        }
    });
    var get_ajax = $.ajax({
        type:"POST",
        url:plugin_url+"/get_results.php",
        data:{'do':user_do,'username':search_info},
        success:function(data){
            if(data == 0){
                $(".teammate").empty();
                $(".teammate").append($("<option disabled selected>抱歉,没有找到您输入的用户名</option>"));

            }else{
                // results = eval('('+data+')');
                users = JSON.parse(data);
                var option = $("<option></option>");
                $(".teammate").empty();//清空
                $(".teammate").append($("<option disabled selected>请选择</option>"));
                for(var i = 0;i<users.length;i++){
                    var clone_opt = option.clone();//克隆option标签
                    clone_opt.html(users[i]['user_login']);//写入值
                    clone_opt.val(users[i]['ID']);
                    $(".teammate").append(clone_opt);//插入用户
                }       
            }
        },
    },'json');
}
//删除用户事件
$("body").on("click","a[name='del_user']",function(){
    // var uid = $(this).attr('id');
    // console.log(uid);
    $(this).parents('tr').remove();
});