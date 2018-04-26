 <?php 
/*  
* Template Name: 个人项目
*/
get_header();
// 输出文章内容
the_post(); the_content();
 ?>
<?php get_template_part("index","personal-header");?>
<div>
   <div class="layout__container__3L3Cc">
    <div class="layout__wrapper1170__3EDsw layout__wrapper__1EOxq">
     <div class="profile__container__1cNdA">
      <span class="content_placeholder__label__2QUnU "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">项目</font></font></span>
      <span class="content_placeholder__label__2QUnU profile__placeholderLabelSegment__2mvT9"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0</font></font></span>
      <div class="content_placeholder__content__3sKt4">
       <span class="undefined "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">您尚未公开分享任何项目。</font></font></span>
       <a class="content_placeholder__placeholderLink__3qleR " href="/projects/new"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">创建一个项目</font></font></a>
      </div>
     </div>
    </div>
   </div>
  </div>
 <?php get_footer();?>