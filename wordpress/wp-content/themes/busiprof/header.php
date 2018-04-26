<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
	  <script type="text/javascript" src="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/0f3d20e9cb"></script>
	  <script src="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/nr-1071.min.js"></script>
	  <script src="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/1055054847899682" async=""></script>
	  <script async="" src="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/fbevents.js"></script>
	  <title>Maker City</title>
	  <link rel="stylesheet" media="all" href="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/application-8149c69ba9c7e84dc1383aba51b304385068aa838adb11a45c9e71a2856870a9.css" />
	  <link href="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/client_bundle.035b83eeac5fb4f7c06b.css" rel="stylesheet" />
	  <meta content="#1cacf7" name="theme-color" />
	  <meta content="Hackster" name="apple-mobile-web-app-title" />
	  <meta content="Hackster" name="application-name" />
 <!--  <link type="text/css" rel="stylesheet" charset="UTF-8" href="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/translateelement.css" /> -->
 </head>
 <body style="">
  <img src="<?php echo home_url()?>/wp-content/themes/busiprof/contest.io_files/activity" width="1" height="1" border="0/" /> 
  <noscript>
    &lt;img src=&quot;https://pubads.g.doubleclick.net/activity;xsp=226950;ord=1?&quot; width=1 height=1 border=0/&gt; 
  </noscript>

	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>

<?php wp_head(); 
$current_options = wp_parse_args(  get_option( 'busiprof_theme_options', array() ), theme_setup_data() );
?>	
</head>
<body <?php body_class(); ?>>

<!-- Navbar -->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo home_url( '/' ); ?>" class="brand">
				<?php
				if( $current_options['enable_logo_text'] == true ){
					bloginfo('name');
				}else{
				?>
				<img alt="<?php bloginfo("name"); ?>" src="<?php echo ( esc_url($current_options['upload_image']) ? $current_options['upload_image'] : get_template_directory_uri() . '/images/logo.png' ); ?>" 
				alt="<?php bloginfo("name"); ?>"
				class="logo_imgae" style="width:<?php echo esc_html($current_options['width']).'px'; ?>; height:<?php echo esc_html($current_options['height']).'px'; ?>;">
				<?php } ?>
			</a>
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php 
				wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'  => 'nav-collapse collapse navbar-inverse-collapse',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'busiprof_fallback_page_menu',
				'walker' => new busiprof_nav_walker()) 
				); 
			?>			
		</div>
	</div>
</nav>	
<!-- End of Navbar -->