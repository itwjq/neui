<?php
/*
* @Author 		PickPlugins
* Copyright: 	2015 PickPlugins.com
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

add_action('qa_user_profile','qa_user_profile_section', 10, 1);




function qa_user_profile_section($author_id){

    ?>
    <div class="profile-sidebar">
	    <?php do_action('qa_user_profile_sidebar', $author_id); ?>
    </div>
    <div class="profile-main">
	    <?php do_action('qa_user_profile_main', $author_id); ?>
    </div>

    <?php

}





add_action('qa_user_profile_sidebar','qa_user_profile_header', 10, 1);
//add_action('qa_user_profile_sidebar','qa_user_profile_badges', 10, 1);

add_action('qa_user_profile_main','qa_user_profile_main', 10, 1);



function qa_user_profile_header($author_id){

	$author 	= get_userdata($author_id);
	$cover_photo = get_user_meta($author_id, 'cover_photo', true);

	$profile_photo = get_user_meta($author_id, 'profile_photo', true);

	if(empty($profile_photo)){
		$profile_photo = get_avatar_url( $author_id, array('size'=>'75') );
	}


	if(empty($cover_photo)){
		$cover_photo = QA_PLUGIN_URL."assets/front/images/card-cover.jpg";
	}



	global $wpdb;
	$table = $wpdb->prefix . "qa_follow";
	$logged_user_id = get_current_user_id();

	$follow_result = $wpdb->get_results("SELECT * FROM $table WHERE author_id = '$author_id' AND follower_id = '$logged_user_id'", ARRAY_A);

	$already_insert = $wpdb->num_rows;
	if($already_insert > 0 ){
		$follow_text = __('Following', 'question-answer');
		$follow_class = 'following';
	}
	else{
		$follow_text = __('Follow', 'question-answer');
		$follow_class = '';
	}





	?>

    <div class="section">
        <div class="inner">
            <div class="user-card">
                <div class="card-cover">
                    <img src="<?php echo $cover_photo; ?>" />
                </div>
                <div class="card-avatar">
                    <img src="<?php echo $profile_photo; ?>" />
                </div>

                <div class="author-follow qa-follow <?php echo $follow_class; ?>" author_id="<?php echo $author_id; ?>"><?php echo $follow_text;  ?></div>
                <div class="author-name"><?php echo $author->display_name; ?></div>
            </div>

        </div>

    </div>




	<?php

}



function qa_user_profile_badges($author_id){

	$author 	= get_userdata($author_id);
	$cover_photo = get_user_meta($author_id, 'cover_photo', true);

	$profile_photo = get_user_meta($author_id, 'profile_photo', true);

	if(empty($profile_photo)){
		$profile_photo = get_avatar_url( $author_id, array('size'=>'75') );
	}


	if(empty($cover_photo)){
		$cover_photo = QA_PLUGIN_URL."assets/front/images/card-cover.jpg";
	}

	?>

    <div class="section">
        <div class="inner">

            <div class="section-title">Badges</div>

        </div>

    </div>




	<?php

}

















function qa_user_profile_main($author_id){

	$author 	= get_userdata($author_id);
	$wp_query = new WP_Query( array (
		'post_type' => 'question',
		//'post_status' => empty( $filter_by ) ? array( 'publish', 'private' ) : $filter_by,
		'author' => $author_id,
		//'post__not_in' => $qa_featured_questions,
		//'ignore_sticky_posts'=>true,
		//'s' => $keywords,
		//'order' => empty( $order ) ? 'DESC' : $order,
		//'orderby' => empty( $order_by ) ? 'date' : $order_by,
		//'tax_query' => $tax_query,
		//'meta_query' => $meta_query,
		//'date_query' => $date_query,
		'posts_per_page' => 5,
		//'paged' => $paged,
	) );

	?>
    <div class=" section">

        <div class="inner">
            <div class="section-title">Highlight</div>

            <div class="highlight">

                <div class="item">
                    Total question: <?php echo qa_author_total_question($author_id); ?>
                </div>

                <div class="item">
                    Total answer: <?php echo qa_author_total_answer($author_id); ?>
                </div>

                <div class="item">
                    Total comment: <?php echo qa_author_total_comment($author_id); ?>
                </div>

                <div class="item">
                    Total follower: <?php echo qa_author_total_follower($author_id); ?>
                </div>

                <div class="item">
                    Total following: <?php echo qa_author_total_following($author_id); ?>
                </div>

                <div class="item">
                    Total vote received on questions: <?php echo qa_author_q_received_vote_count($author_id); ?>
                </div>
                <div class="item">
                    Total vote received on answers: <?php echo qa_author_a_received_vote_count($author_id); ?>
                </div>

                <div class="item">
                    Vote on others question: <?php echo qa_author_vote_other_q_count($author_id); ?>
                </div>

                <div class="item">
                    Vote on others answer: <?php echo qa_author_vote_other_a_count($author_id); ?>
                </div>

            </div>
        </div>





        <div class="section">
            <div class="inner">
                <div class="section-title">Recent Question</div>





                <div class="recent-questions">

                    <?php

                    if ( $wp_query->have_posts() ) :
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();

                            ?>
                            <div class="item">
                                <a href=""><?php echo get_the_title(); ?></a>
                            </div>
                            <?php


                        endwhile;
                    endif;

                    ?>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="inner">
                <div class="section-title">Recent Answer</div>





                <div class="recent-questions">

                    <?php

                    if ( $wp_query->have_posts() ) :
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();

                            ?>
                            <div class="item">
                                <a href=""><?php echo get_the_title(); ?></a>
                            </div>
                            <?php


                        endwhile;
                    endif;

                    ?>
                </div>
            </div>
        </div>








    </div>



	<?php

}