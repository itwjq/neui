<?php 
/* 	
* Template Name: 所有比赛展示模板
*/
get_header();
?>
	
<div id='main' style="background: #f3f3f3">
	<div class='container' id='contest-index'>
		<div id='content'>
			<div class='content'>
				
<?php
the_post(); the_content();
?>
			</div>
		</div>
	</div>
</div>

<?php get_footer();  ?> 
