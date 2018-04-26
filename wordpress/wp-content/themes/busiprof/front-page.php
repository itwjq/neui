<?php 
/*  
* Template Name: Home
*/
?>
<?php get_header();?>
<div id="outer-wrapper">
     <div id="main">
        <noscript>
         &lt;div class=&quot;alert alert-warning&quot;&gt;&lt;p&gt;Please ensure that JavaScript is enabled in your browser to view this page.&lt;/p&gt;&lt;/div&gt;
        </noscript>
         <div data-reactroot="">
            <?php echo do_shortcode('[metaslider id="4"]'); ?>
            <span>
              <?php get_template_part('index', 'more') ; ?>
            </span>
            <div class="layout__container__3L3Cc">
               <div class="layout__wrapper1170__3EDsw layout__wrapper__1EOxq">
                
               <?php get_template_part('index', 'project') ; ?>
               <?php get_template_part('index', 'flat') ; ?>
               <?php //get_template_part('index', 'testimonials') ; ?>

               </div>
            </div>
         </div>
      </div>
   </div>
<?php get_footer();  ?> 
</html>