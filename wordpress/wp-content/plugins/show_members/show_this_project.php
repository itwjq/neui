<?php 
require( dirname(dirname(dirname(dirname( __FILE__ )))) . '/wp-load.php' );
global $wpdb;
global $current_user;
$uid=$current_user->ID;
// //获取当前页的id  当前页为项目页
 $id=get_the_ID();
//获取当前比赛的id
$sql = "select post_parent from wp_posts where id=$id";
$res = $wpdb->get_results($sql,ARRAY_A);//执行返回结果
$mid=$res[0]['post_parent'].'_pro';
//获取当前比赛的项目id
$arg=['num'=>1,'id'=>$mid,'page_size'=>24];
$res_project=show_class_item($arg);
if(!$res_project){
   echo "<h2>还没有项目！</h2>";
}
//根据项目id获取项目详细信息
for ($i=0; $i < count($res_project); $i++) { 
  $pro_information[]=get_post($res_project[$i]['relation_value'],ARRAY_A);
  //将数据插入到$res_project中
  $res_project[$i]['title']=$pro_information[$i]['post_title'];
  $res_project[$i]['content']=$pro_information[$i]['post_content'];
  $res_project[$i]['excerpt']=$pro_information[$i]['post_excerpt']; 
  //获取头像
  $pro_imgs="select meta_value from wp_postmeta where post_id='{$res_project[$i]['relation_value']}' and meta_key='pro_pic'";
  $res_imgs = $wpdb->get_results($pro_imgs,ARRAY_A);
  $res_project[$i]['pic']=$res_imgs[0]['meta_value'];
}
?>
<section class="main-section">
  <div class="container">
    <div class="project-list">
      <div class="thumb-list">
        <div class="row equal-columns">
          <?php foreach ($res_project as $data) {  ?>
          <div class="mobile-scroll-row-item project-thumb-container col-sm-6 col-md-4 col-lg-3 has-data" data-offset="0" data-ref="challenge" data-ref-id="149">
            <div class="project-card project-88557">
              <a class="card-image project-link-with-ref" href="/dhromya-jani/stepper-actuator-control-using-serial-to-ethernet-converter-84b9aa" title="Stepper Actuator control using Serial to Ethernet Converter">
                <div class="img-container">
                  <?php if(!$data['pic']){ ?>
                  <img  style="width:260px;height:195px;"  alt="" src="<?php echo home_url()?>/wp-content/uploads/ultimatemember/default/default.png"/>
                    <?php }else{ ?>
                      <img  style="width:260px;height:195px;"  alt="" src="<?php echo home_url()?>/wp-content/<?php echo $data['pic']; ?>"/>
                    <?php } ?> 
                    <noscript>
                      <img alt="Stepper Actuator control using Serial to Ethernet Converter" class="loaded" src="https://hackster.imgix.net/uploads/attachments/470078/stepper_1oIDk9OJHK.png?auto=compress%2Cformat&amp;w=400&amp;h=300&amp;fit=min" />
                    </noscript>
                  </div>
                  <div class="card-image-overlay">
                    <p><?php echo $data['content'] ?></p>
                  </div>
                </a>
                <div class="card-body">
                  <div class="project-content-type">
                    <span><?php echo $data['title'] ?></span>
                  </div>
                  <h4>
                    <i class="fa fa-battery-half istooltip small" title="" data-original-title="Work in progress"></i> 
                    <a class="project-link-with-ref" title="Stepper Actuator control using Serial to Ethernet Converter" href="/dhromya-jani/stepper-actuator-control-using-serial-to-ethernet-converter-84b9aa"><?php echo $data['excerpt'] ?></a>
                  </h4>
                  <div class="spacer"></div>
                  <div class="authors">
                    <a title="dhromya jani" href="/dhromya-jani"></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
      </div>
      <div class="row text-center"></div>
    </div>
  </div>
</section>
<?php if($res_project) {  ?>
  <?php branch_pages($arg); ?>
<?php } ?>
