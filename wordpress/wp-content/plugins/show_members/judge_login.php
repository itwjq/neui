<?php
global $wpdb;
global $current_user;
if(is_user_logged_in()){
    //用户登录
    // get_currentuserinfo();
    wp_get_current_user();
    echo "<input type='hidden' name='post_author' value='{$current_user->ID}'>";
    echo "<input type='hidden' id='login_name' value='{$current_user->user_login}'>";
?>
<?php
}else{
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
                    location.href = "<?php echo home_url()?>/login/";
                }
            sectime--;          
        },1000)
    </script>
<?php 
}
?>