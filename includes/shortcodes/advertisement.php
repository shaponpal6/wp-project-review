<?php

if ( ! function_exists('sppr_advertisement_display') ) {
	function sppr_advertisement_display( $atts ) {

        $id = get_category_by_slug('header');
        $args = array(  
            'post_type' => 'advertisement',
            'post_status' => 'publish',
            'posts_per_page' => 8, 
            'orderby' => 'title', 
            'order' => 'rand', 
            // 'cat' => $id->term_id, 
            'category_name' => 'header', 
            );

        $loop = new WP_Query( $args ); 
        $posts = $loop->posts; 
        $random = $posts[ Rand(0, count($posts)-1) ];

        ob_start();
		echo '<div class="sppr-advertisement-wrapper">';
		echo get_the_post_thumbnail( $random->ID);
        echo '<small>'.get_post_meta($random->ID,"short_text",true).'</small>';
		echo '</div>';
		return ob_get_clean();

	}
	add_shortcode( 'sppr-advertisement-header', 'sppr_advertisement_display' );
}

// Footer
if ( ! function_exists('sppr_advertisement_footer') ) {
	function sppr_advertisement_footer( $atts ) {
		 $id = get_category_by_slug('footer');
        $args = array(  
            'post_type' => 'advertisement',
            'post_status' => 'publish',
            'posts_per_page' => 8, 
            'orderby' => 'title', 
            'order' => 'rand', 
            // 'cat' => $id->term_id, 
            'category_name' => 'footer', 
            );

        $loop = new WP_Query( $args ); 
        $posts = $loop->posts; 
        $random = $posts[ Rand(0, count($posts)-1) ];

        ob_start();
		echo '<div class="sppr-advertisement-wrapper">';
		echo get_the_post_thumbnail( $random->ID);
		echo '<small>'.get_post_meta($random->ID,"short_text",true).'</small>';
		echo '</div>';
		return ob_get_clean();

	}
	add_shortcode( 'sppr-advertisement-footer', 'sppr_advertisement_footer' );
}