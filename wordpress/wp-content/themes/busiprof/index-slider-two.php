<?php 
$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), theme_setup_data() );
if( $current_options['home_banner_strip_enabled'] == 'on' && $current_options['slider_head_title'] != '' ) { ?>
<div class="clearfix"></div>
<!-- Slider -->
<?php } if($current_options['slider_image']!='' ) { ?>
<div id="main" role="main">
	<?php echo do_shortcode('[metaslider id="4"]'); ?>
</div>
<!-- End of Slider -->
<div class="clearfix"></div>
<?php } else{
	
	?>
<?php
}
?>
<?php 
    // 列出顶部导航菜单，菜单名称为mymenu，只列出一级菜单
    // wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );
?>
<?php if( $current_options['home_banner_strip_enabled'] == 'on') {?>
<section class="header-title"><h2><?php echo esc_html($current_options['slider_head_title']); ?> </h2></section>
<div class="clearfix"></div>
<?php } ?>