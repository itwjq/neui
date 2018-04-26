<?php 
/*  
* Template Name: 参与者模板
*/
get_header();
// 输出文章内容
// the_post(); the_content();
 ?>
<?php
  // 输出文章内容
  echo do_shortcode('[show-contests-head]');
?>
<section class="main-section">
   <div class="container">
    	<div class="container">
     		<div class="row equal-columns">
     			<?php
            // 输出文章内容
            the_post(); the_content();
          ?>
     		</div>
    	</div>
    </div>
</section>
<?php get_footer();?>
