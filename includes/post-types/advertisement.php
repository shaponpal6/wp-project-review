<?php
if ( ! function_exists('sppr_advertisement_post_type') ) {
	// Register Custom Post Type
	function sppr_advertisement_post_type() {

		// Advertisement review
		$labels = array(
			'name'                  => _x( 'Advertisements', 'project-review' ),
			'singular_name'         => _x( 'Advertisement', 'project-review' ),
			'menu_name'             => __( 'Advertisements', 'project-review' ),
			'name_admin_bar'        => __( 'Advertisement', 'project-review' ),
			'archives'              => __( 'Advertisement Archives', 'project-review' ),
			'attributes'            => __( 'Advertisement Attributes', 'project-review' ),
			'parent_item_colon'     => __( 'Parent Advertisement:', 'project-review' ),
			'all_items'             => __( 'All Advertisements', 'project-review' ),
			'add_new_item'          => __( 'Add New Advertisement', 'project-review' ),
			'add_new'               => __( 'Add New Advertisement', 'project-review' ),
			'new_item'              => __( 'New Advertisement', 'project-review' ),
			'edit_item'             => __( 'Edit Advertisement', 'project-review' ),
			'update_item'           => __( 'Update Advertisement', 'project-review' ),
			'view_item'             => __( 'View Advertisement', 'project-review' ),
			'view_items'            => __( 'View Advertisements', 'project-review' ),
			'search_items'          => __( 'Search Advertisement', 'project-review' ),
			'not_found'             => __( 'Not found', 'project-review' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'project-review' ),
			'featured_image'        => __( 'Advertisement Featured Image', 'project-review' ),
			'set_featured_image'    => __( 'Set featured image', 'project-review' ),
			'remove_featured_image' => __( 'Remove featured image', 'project-review' ),
			'use_featured_image'    => __( 'Use as featured image', 'project-review' ),
			'insert_into_item'      => __( 'Insert into Advertisement', 'project-review' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Advertisement', 'project-review' ),
			'items_list'            => __( 'Projects list', 'project-review' ),
			'items_list_navigation' => __( 'Projects list navigation', 'project-review' ),
			'filter_items_list'     => __( 'Filter Advertisements list', 'project-review' ),
		);
		$args = array(
			'label'                 => __( 'Advertisement Review', 'project-review' ),
			'description'           => __( 'Add Advertisement to Review', 'project-review' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'thumbnail'),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-welcome-view-site',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capability_type'       => 'post',
			// 'show_in_rest'          => true,
			// 'rest_base'             => 'sppr-project-review',
			// 'rest_controller_class' => 'SPPR_REST_Posts_Controller',
		);
		register_post_type( 'advertisement', $args );

	}
	add_action( 'init', 'sppr_advertisement_post_type', 0 );
}