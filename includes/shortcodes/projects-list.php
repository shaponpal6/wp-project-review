<?php

// Add Shortcode
function sppr_projects_list_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(
		),
		$atts,
		'sppr-projects-list'
	);

    $posts = SPPRProjectHelper::get_posts_meta();

    // echo '<pre>';
    // print_r( $posts );

    // echo '<div class="">Hello</div>';

	ob_start();
	echo '<div class="sppr-container">';
	echo '<section class="sppr-section">';
	echo '</section>';
	echo '<section class="sppr-section">';
	echo '<div class="sppr-items">';
	if( !empty( $posts) && count( $posts ) > 0){
		foreach($posts as $post){
			echo '<div class="sppr-item">';
			echo '<div class="sppr-title">';
			echo '<span class="sppr-new">New</span>';
			echo '<div class="sppr-name">'.$post['post_title'].'</div>';
			echo '</div>';
			echo '<div class="sppr-button">'.$post['risks'].'</div>';
			echo '<div class="sppr-link">'.$post['network'].'</div>';
			echo '<div class="sppr-site">'.$post['action_buttons']['button_1_link'].'</div>';
			echo '<div class="sppr-arrow"> > </div>';
			echo '</div>';
		}
	}
	echo '</div>';
	echo '</section>';
	echo '</div>';
	return ob_get_clean();

}
add_shortcode( 'sppr-projects-list', 'sppr_projects_list_shortcode' );