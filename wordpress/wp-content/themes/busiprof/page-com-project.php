<?php 
/*  
* Template Name: 项目模板
*/
get_header();
?>
<?php
	// 输出文章内容
	echo do_shortcode('[show-contests-head]');
?>
<section class="main-section">
   	<div class="container">
    	<div class="project-list">
	    	<div class="thumb-list">
	     		<div class="row equal-columns">
	      			<!-- <div class="mobile-scroll-row-item project-thumb-container col-sm-6 col-md-4 col-lg-3 has-data"> -->
	       			<?php
						// 输出文章内容
						the_post(); the_content();
					?>
				    <!-- </div> -->
			    </div>
			</div>
		</div>
   </div>
</section>
<?php get_footer();?>

 
