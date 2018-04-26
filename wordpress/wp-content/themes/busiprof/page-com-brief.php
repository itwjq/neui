<?php 
/*  
* Template Name: 大赛简介模板
*/
get_header();
the_post(); the_content();
?>
<?php 
    $contest_id = get_this_contestid();
    //比赛信息
    $contest = get_post_meta($contest_id);
    //引入选择项目的模态框
    echo do_shortcode('[add-sel-pros-model]');
 ?>
<?php 
 ?>
  <section class="main-section">
   <div class="container">
    <div class="row">
     <div class="col-md-4 col-md-push-8">
      <noscript>
       &lt;div class=&quot;alert alert-warning&quot;&gt;&lt;p&gt;Please ensure that JavaScript is enabled in your browser to use this page.&lt;/p&gt;&lt;/div&gt;
      </noscript>
      <?php echo do_shortcode('[user-join-contest]');//引入右侧加入比赛边栏 ?>
      <section class="section-thumbs">
       <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">邀请其他人参与竞争</font></font></h4>
       <!-- AddToAny BEGIN -->
       <div class="a2a_kit a2a_kit_size_32 a2a_default_style" style="line-height: 32px;">
        <a class="a2a_button_facebook" target="_blank" href="/#facebook" rel="nofollow noopener"><span class="a2a_svg a2a_s__default a2a_s_facebook" style="background-color: rgb(59, 89, 152);">
          <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 32 32">
           <path fill="#FFF" d="M17.78 27.5V17.008h3.522l.527-4.09h-4.05v-2.61c0-1.182.33-1.99 2.023-1.99h2.166V4.66c-.375-.05-1.66-.16-3.155-.16-3.123 0-5.26 1.905-5.26 5.405v3.016h-3.53v4.09h3.53V27.5h4.223z"></path>
          </svg></span><span class="a2a_label"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Facebook </font></font></span></a>
        <font style="vertical-align: inherit;"><a class="a2a_button_google_plus" target="_blank" href="/#google_plus" rel="nofollow noopener"><span class="a2a_label"><font style="vertical-align: inherit;">Google+ </font></span></a><a class="a2a_button_linkedin" target="_blank" href="/#linkedin" rel="nofollow noopener"><span class="a2a_label"><font style="vertical-align: inherit;">LinkedIn </font></span></a><a class="a2a_button_pinterest" target="_blank" href="/#pinterest" rel="nofollow noopener"><span class="a2a_label"><font style="vertical-align: inherit;">Pinterest </font></span></a><a class="a2a_button_reddit" target="_blank" href="/#reddit" rel="nofollow noopener"><span class="a2a_label"><font style="vertical-align: inherit;">Reddit </font></span></a><a class="a2a_button_twitter" target="_blank" href="/#twitter" rel="nofollow noopener"><span class="a2a_label"><font style="vertical-align: inherit;">Twitter</font></span></a></font>
        <a class="a2a_button_google_plus" target="_blank" href="/#google_plus" rel="nofollow noopener"><span class="a2a_svg a2a_s__default a2a_s_google_plus" style="background-color: rgb(221, 75, 57);">
          <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 32 32">
           <path d="M27 15h-2v-2h-2v2h-2v2h2v2h2v-2h2m-15-2v2.4h3.97c-.16 1.03-1.2 3.02-3.97 3.02-2.39 0-4.34-1.98-4.34-4.42s1.95-4.42 4.34-4.42c1.36 0 2.27.58 2.79 1.08l1.9-1.83C15.47 9.69 13.89 9 12 9c-3.87 0-7 3.13-7 7s3.13 7 7 7c4.04 0 6.72-2.84 6.72-6.84 0-.46-.05-.81-.11-1.16H12z" fill="#FFF"></path>
          </svg></span><span class="a2a_label"><font style="vertical-align: inherit;"></font></span></a>
        <a class="a2a_button_linkedin" target="_blank" href="/#linkedin" rel="nofollow noopener"><span class="a2a_svg a2a_s__default a2a_s_linkedin" style="background-color: rgb(0, 123, 181);">
          <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 32 32">
           <path d="M6.227 12.61h4.19v13.48h-4.19V12.61zm2.095-6.7a2.43 2.43 0 0 1 0 4.86c-1.344 0-2.428-1.09-2.428-2.43s1.084-2.43 2.428-2.43m4.72 6.7h4.02v1.84h.058c.56-1.058 1.927-2.176 3.965-2.176 4.238 0 5.02 2.792 5.02 6.42v7.395h-4.183v-6.56c0-1.564-.03-3.574-2.178-3.574-2.18 0-2.514 1.7-2.514 3.46v6.668h-4.187V12.61z" fill="#FFF"></path>
          </svg></span><span class="a2a_label"><font style="vertical-align: inherit;"></font></span></a>
        <a class="a2a_button_pinterest" target="_blank" href="/#pinterest" rel="nofollow noopener"><span class="a2a_svg a2a_s__default a2a_s_pinterest" style="background-color: rgb(189, 8, 28);">
          <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 32 32">
           <path fill="#FFF" d="M16.539 4.5c-6.277 0-9.442 4.5-9.442 8.253 0 2.272.86 4.293 2.705 5.046.303.125.574.005.662-.33.061-.231.205-.816.27-1.06.088-.331.053-.447-.191-.736-.532-.627-.873-1.439-.873-2.591 0-3.338 2.498-6.327 6.505-6.327 3.548 0 5.497 2.168 5.497 5.062 0 3.81-1.686 7.025-4.188 7.025-1.382 0-2.416-1.142-2.085-2.545.397-1.674 1.166-3.48 1.166-4.689 0-1.081-.581-1.983-1.782-1.983-1.413 0-2.548 1.462-2.548 3.419 0 1.247.421 2.091.421 2.091l-1.699 7.199c-.505 2.137-.076 4.755-.039 5.019.021.158.223.196.314.077.13-.17 1.813-2.247 2.384-4.324.162-.587.929-3.631.929-3.631.46.876 1.801 1.646 3.227 1.646 4.247 0 7.128-3.871 7.128-9.053.003-3.918-3.317-7.568-8.361-7.568z"></path>
          </svg></span><span class="a2a_label"><font style="vertical-align: inherit;"></font></span></a>
        <a class="a2a_button_reddit" target="_blank" href="/#reddit" rel="nofollow noopener"><span class="a2a_svg a2a_s__default a2a_s_reddit" style="background-color: rgb(255, 69, 0);">
          <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 32 32">
           <path d="M28.543 15.774a2.953 2.953 0 0 0-2.951-2.949 2.882 2.882 0 0 0-1.9.713 14.075 14.075 0 0 0-6.85-2.044l1.38-4.349 3.768.884a2.452 2.452 0 1 0 .24-1.176l-4.274-1a.6.6 0 0 0-.709.4l-1.659 5.224a14.314 14.314 0 0 0-7.316 2.029 2.908 2.908 0 0 0-1.872-.681 2.942 2.942 0 0 0-1.618 5.4 5.109 5.109 0 0 0-.062.765c0 4.158 5.037 7.541 11.229 7.541s11.22-3.383 11.22-7.541a5.2 5.2 0 0 0-.053-.706 2.963 2.963 0 0 0 1.427-2.51zm-18.008 1.88a1.753 1.753 0 0 1 1.73-1.74 1.73 1.73 0 0 1 1.709 1.74 1.709 1.709 0 0 1-1.709 1.711 1.733 1.733 0 0 1-1.73-1.711zm9.565 4.968a5.573 5.573 0 0 1-4.081 1.272h-.032a5.576 5.576 0 0 1-4.087-1.272.6.6 0 0 1 .844-.854 4.5 4.5 0 0 0 3.238.927h.032a4.5 4.5 0 0 0 3.237-.927.6.6 0 1 1 .844.854zm-.331-3.256a1.726 1.726 0 1 1 1.709-1.712 1.717 1.717 0 0 1-1.712 1.712z" fill="#fff"></path>
          </svg></span><span class="a2a_label"><font style="vertical-align: inherit;"></font></span></a>
        <a class="a2a_button_twitter" target="_blank" href="/#twitter" rel="nofollow noopener"><span class="a2a_svg a2a_s__default a2a_s_twitter" style="background-color: rgb(85, 172, 238);">
          <svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 32 32">
           <path fill="#FFF" d="M28 8.557a9.913 9.913 0 0 1-2.828.775 4.93 4.93 0 0 0 2.166-2.725 9.738 9.738 0 0 1-3.13 1.194 4.92 4.92 0 0 0-3.593-1.55 4.924 4.924 0 0 0-4.794 6.049c-4.09-.21-7.72-2.17-10.15-5.15a4.942 4.942 0 0 0-.665 2.477c0 1.71.87 3.214 2.19 4.1a4.968 4.968 0 0 1-2.23-.616v.06c0 2.39 1.7 4.38 3.952 4.83-.414.115-.85.174-1.297.174-.318 0-.626-.03-.928-.086a4.935 4.935 0 0 0 4.6 3.42 9.893 9.893 0 0 1-6.114 2.107c-.398 0-.79-.023-1.175-.068a13.953 13.953 0 0 0 7.55 2.213c9.056 0 14.01-7.507 14.01-14.013 0-.213-.005-.426-.015-.637.96-.695 1.795-1.56 2.455-2.55z"></path>
          </svg></span><span class="a2a_label"><font style="vertical-align: inherit;"></font></span></a>
        <div style="clear: both;"></div>
       </div>
       <script>var a2a_config = a2a_config || {};
            a2a_config.onclick = 1;
            a2a_config.color_main = "D7E5ED";
            a2a_config.color_border = "AECADB";
            a2a_config.color_link_text = "333333";
            a2a_config.color_link_text_hover = "333333";
            a2a_config.templates = {
              twitter: "Check out Unleash Invisible Intelligence https://www.hackster.io/contests/maximunleash via @hacksterio"
            };
            a2a_config.linkname = "Unleash Invisible Intelligence"
            a2a_config.linkurl = "https://www.hackster.io/contests/maximunleash";</script>
       <script src="//static.addtoany.com/menu/page.js" type="text/javascript"></script>
       <!-- AddToAny END -->
      </section>

      
      <section class="section-thumbs">
       <h4><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">奖品</font></font></h4>
        <!-- 奖品 -->
        <h3><?php get_post_meta($contest_id,'prize_word_'.$i,true) ?></h3>
       <?php for($i = 0;$i<10;++$i){ ?>
        <?php 
            $prize_word = get_post_meta($contest_id,'prize_word_'.$i,true);
            $prize_pic_id = get_post_meta($contest_id,'prize_pic_'.$i,true);
            $prize_pic = get_the_guid($prize_pic_id,'guid',true);
                // var_dump($prize_word);
            if($prize_word !="" ){
         ?>
       <div class="award">
       
        <h3><?php echo $prize_word; ?></h3><!-- 奖项名称 -->
        <!--
        <h5><i class="fa fa-trophy"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">大奖</font></font></h5>-->
        <div>
        <!-- 奖项图片 -->
         <a target="_blank" rel="noopener nofollow" href="https://www.microsoft.com/en-us/hololens/buy"><img src="<?php echo $prize_pic ?>"></a>
        </div>
        <!-- <p><a target="_blank" rel="noopener nofollow" href="https://www.microsoft.com/en-us/hololens/buy"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">微软HoloLens开发版</font></font></a></p>
        <p class="small text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 3,000的价值 </font></font></p> -->
       </div>

    <?php
        }?>
   <?php }
     ?>
       <!-- <div class="award">
        <h5><i class="fa fa-trophy"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">运动与时尚第一名</font></font></h5>
        <div>
         <a target="_blank" rel="noopener nofollow" href="https://www.apple.com/iphone-x/"><img src="https://hackster.imgix.net/uploads/attachments/465117/iphone-x-gray-select-2017.png?auto=compress%2Cformat&amp;w=400&amp;h=300&amp;fit=max" alt="Iphone x灰色选择2017年" /></a>
        </div>
        <p><a target="_blank" rel="noopener nofollow" href="https://www.apple.com/iphone-x/"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">iPhone X（256GB）</font></font></a></p>
        <p class="small text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">$ 1,000的价值 </font></font></p>
       </div>
       <div class="award">
        <h5><i class="fa fa-trophy"></i><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">运动与时尚第二名</font></font></h5>
        <div>
         <a target="_blank" rel="noopener nofollow" href="https://www.nintendo.com/switch/buy-now/"><img src="https://hackster.imgix.net/uploads/attachments/465121/nintendo_switch.jpg?auto=compress%2Cformat&amp;w=400&amp;h=300&amp;fit=max" alt="任天堂切换器" /></a>
        </div>
        <p><a target="_blank" rel="noopener nofollow" href="https://www.nintendo.com/switch/buy-now/"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">任天堂开关</font></font></a></p>
        <p class="small text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">300美元的价值 </font></font></p>
       </div> -->
       
       
    
      </section>
      <!-- <section class="section-thumbs">
       <h4>Timeline</h4>
       <div class="highlight-date">
        <p style="margin-bottom:0"><strong>Project submissions open:</strong> </p>
        <p>April 12, 2018 at 8:00 PM PT</p>
       </div>
       <div>
        <p style="margin-bottom:0"><strong>Deadline to apply for free devices:</strong> </p>
        <p>May 12, 2018 at 11:59 PM PT</p>
       </div>
       <div>
        <p style="margin-bottom:0"><strong>Project submissions close:</strong> </p>
        <p>July 12, 2018 at 11:59 PM PT</p>
       </div>
       <div>
        <p style="margin-bottom:0"><strong>Winners announced by:</strong> </p>
        <p>July 19, 2018</p>
       </div>
      </section> -->
     </div>
     <div class="col-md-8 col-md-pull-4">
      <section class="section-container">
        <center>
            <h2 >
                <div class="title">
                <font font-size="7"><?php echo $contest['contest_brief'][0] ?> </font>
                 
                </div>
            </h2>
        </center>
       <div class="section-content medium-editor">
        <p></p>
        <div class="embed-frame">
         <figure class="youtube">
          <div class="embed widescreen" contenteditable="false">
           <iframe width="100%" height="60%" src="http://127.0.0.1/wordpress/wp-content/themes/busiprof/images/brief.jpg" frameborder="0" allowfullscreen=""></iframe>
          </div>
         </figure>
        </div>
        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">我们的事情的智慧可能不是很明显，但它在那里。</font><font style="vertical-align: inherit;">最好的物联网应用程序让我们可以监控我们从未想过要监控的事情，并在设置好后自行管理。</font><font style="vertical-align: inherit;">在本次比赛中，我们向您挑战，想出创造性的方法，使用MAX32620FTHR快速开发平台将智能注入新应用。</font></font></p>
        <div class="embed-frame image-gallery-container">
         <figure>
          <img alt="SF71654LOGO-58e84a913df78c516202b11d.jpeg" src="https://hackster.imgix.net/uploads/attachments/460047/sf71654logo-58e84a913df78c516202b11d_UKPwLkOuIZ.jpeg?auto=compress%2Cformat&amp;w=680&amp;h=510&amp;fit=max" width="428" />
         </figure>
        </div>
        <p><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">随着</font></font></span><a href="https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;MAX32620FTHR &quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAX32620FTHR </font></font></a><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">板，可以快速实现基于便携，功能丰富，电池优化的解决方案 </font></font></span><a href="https://www.maximintegrated.com/en/products/microcontrollers/MAX32620.html" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;MAX32620&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/microcontrollers/MAX32620.html&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAX32620 </font></font></a><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ARM&reg;Cortex&reg;-M4微控制器，浮点单元，Maxim的新家庭的一部分</font></font></span><a href="https://www.maximintegrated.com/en/products/microcontrollers/low-power-microcontrollers/meet-darwin.html" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;DARWIN MCUs&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/microcontrollers/low-power-microcontrollers/meet-darwin.html&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">DARWIN的MCU </font></font></a><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">。</font><font style="vertical-align: inherit;">以小尺寸提供高效的电源转换和电池管理，电路板包括：</font></font></span></p>
        <ul>
         <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">该</font></font></span><a href="https://www.maximintegrated.com/en/products/power/battery-management/MAX77650.html" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;MAX77650&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/power/battery-management/MAX77650.html&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAX77650 </font></font></a><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">超低功率PMIC设有单输入，多输出（SIMO）技术和高度集成的电池充电</font></font></span></li>
        </ul>
        <ul>
         <li><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">该</font></font></span><a href="https://www.maximintegrated.com/en/products/power/battery-management/MAX17055.html" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;MAX17055&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/power/battery-management/MAX17055.html&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">MAX17055 </font></font></a><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">燃料计与中电网™M5 EZ算法，其提供高精确度而不电池表征</font></font></span></li>
        </ul>
        <div class="embed-frame image-gallery-container">
         <figure>
          <img alt="9596.png" src="https://hackster.imgix.net/uploads/attachments/460035/9596_cYlzpj4QRz.png?auto=compress%2Cformat&amp;w=680&amp;h=510&amp;fit=max" width="680" />
         </figure>
        </div>
        <p><span><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">考虑到该电路板的所有独特功能，它可以为各种智能解决方案打下坚实的基础。</font><font style="vertical-align: inherit;">参加比赛有机会赢得这些委员会之一。</font><font style="vertical-align: inherit;">如果您迫不及待想要</font></font></span><font style="vertical-align: inherit;"><a href="https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html/tb_tab3?utm_source=Hackster&amp;utm_medium=landing-pg&amp;utm_content=32620FTHR&amp;utm_campaign=FY18_Q4_2018_APR_MNS-Micros_AMER_HacksterContest_EN" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;buy your own from the Maxim website for $20.&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html/tb_tab3?utm_source=Hackster\u0026utm_medium=landing-pg\u0026utm_content=32620FTHR\u0026utm_campaign=FY18_Q4_2018_APR_MNS-Micros_AMER_HacksterContest_EN&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;">购买</font></a><span><font style="vertical-align: inherit;">MAX32620FTHR，您可以</font></span></font><a href="https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html/tb_tab3?utm_source=Hackster&amp;utm_medium=landing-pg&amp;utm_content=32620FTHR&amp;utm_campaign=FY18_Q4_2018_APR_MNS-Micros_AMER_HacksterContest_EN" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;buy your own from the Maxim website for $20.&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html/tb_tab3?utm_source=Hackster\u0026utm_medium=landing-pg\u0026utm_content=32620FTHR\u0026utm_campaign=FY18_Q4_2018_APR_MNS-Micros_AMER_HacksterContest_EN&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">以20美元的价格从Maxim网站购买自己的产品。</font></font></a><span> </span></p>
        <p><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">在这些比赛类别之一中展现你的创造力</font></font></strong></p>
        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">通过提交一份书面提案，在以下其中一个类别中列出您的设计理念，以加入比赛：</font></font></p>
        <ul>
         <li>Sports and Fashion: Want to create technology that redefines the colorful fashion landscape? Solutions that power the next big thing in sporting wearables? Send us your concept. </li>
        </ul>
        <ul>
         <li>Smarter Planet: Thinking about a new way to address climate change, make your city more livable, or help grow enough food to feed the next billion people on the planet? This is your category. </li>
        </ul>
        <ul>
         <li>Personal Safety Monitoring: From a tracker that assures you a loved one is safe, to a device that helps someone with limited mobility move about with confidence, to a solution that keeps tabs on your beloved pet, the possibilities in this category are wide open. </li>
        </ul>
        <ul>
         <li>Home Control: Here, we’re looking for novel ideas to make devices and systems used in the home smarter, safer, and greener.</li>
        </ul>
        <p>After our judges review all of the proposals, we’ll award a minimum of 50 MAX32620FTHR boards to the top entrants with the most innovative and scalable ideas. These top contestants will then move to the next phase of the contest: creating a design prototype using the board. From this point, competitors will vie for one of several prizes for their category and a grand prize.</p>
        <div class="embed-frame image-gallery-container">
         <figure>
          <a href="https://www.maximintegrated.com/en/products/microcontrollers/MAX32620FTHR.html/tb_tab3" target="_blank"><img alt="maximpurchase2.PNG" src="https://hackster.imgix.net/uploads/attachments/467195/maximpurchase2_fiUb6PFIsx.PNG?auto=compress%2Cformat&amp;w=680&amp;h=510&amp;fit=max" width="680" /></a>
         </figure>
        </div>
        <p><span> </span><strong>Timeline: </strong></p>
        <ul>
         <li>Project submission opens: April 12, 2018</li>
        </ul>
        <ul>
         <li>Idea submission deadline: May 12, 2018</li>
        </ul>
        <ul>
         <li>Project submission deadline: July 12, 2018</li>
        </ul>
        <ul>
         <li>Winners announced: July 19, 2018</li>
        </ul>
        <p>Happy designing!</p>
        <p><strong>About Maxim</strong></p>
        <p><span>Maxim sees the internet of things (IoT) as an opportunity to solve problems in new and better ways. Our analog and mixed-signal products and technologies are designed to help you create smaller and smarter solutions with enhanced security and increased energy efficiency. Learn more at </span><a href="https://www.maximintegrated.com/en/markets/internet-of-things.html" data-ha="{&quot;eventName&quot;:&quot;Clicked link&quot;,&quot;customProps&quot;:{&quot;value&quot;:&quot;https://www.maximintegrated.com/en/markets/internet-of-things.html.&quot;,&quot;href&quot;:&quot;https://www.maximintegrated.com/en/markets/internet-of-things.html&quot;,&quot;type&quot;:&quot;story&quot;,&quot;location&quot;:&quot;story&quot;},&quot;clickOpts&quot;:{&quot;delayRedirect&quot;:true}}" rel="nofollow">https://www.maximintegrated.com/en/markets/internet-of-things.html.</a><span> </span></p>
       </div>
      </section>
     </div>
    </div>
   </div>
  </section>
  <script charset="UTF-8" src="<?php bloginfo('template_url');?>/Hackster.io_files/zh-CN.js"></script>
<?php get_footer();  ?> 
