<?php 

if ( ! function_exists('sppr_post_type') ) {

	// Register Custom Post Type
	function sppr_post_type() {

		// Project review
		$labels = array(
			'name'                  => _x( 'Project Reviews', 'Post Type General Name', 'project-review' ),
			'singular_name'         => _x( 'Project Review', 'Post Type Singular Name', 'project-review' ),
			'menu_name'             => __( 'Project Reviews', 'project-review' ),
			'name_admin_bar'        => __( 'Project Review', 'project-review' ),
			'archives'              => __( 'Project Archives', 'project-review' ),
			'attributes'            => __( 'Project Attributes', 'project-review' ),
			'parent_item_colon'     => __( 'Parent Project:', 'project-review' ),
			'all_items'             => __( 'All Projects', 'project-review' ),
			'add_new_item'          => __( 'Add New Project', 'project-review' ),
			'add_new'               => __( 'Add New Project', 'project-review' ),
			'new_item'              => __( 'New Project', 'project-review' ),
			'edit_item'             => __( 'Edit Project', 'project-review' ),
			'update_item'           => __( 'Update Project', 'project-review' ),
			'view_item'             => __( 'View Project', 'project-review' ),
			'view_items'            => __( 'View Projects', 'project-review' ),
			'search_items'          => __( 'Search Project', 'project-review' ),
			'not_found'             => __( 'Not found', 'project-review' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'project-review' ),
			'featured_image'        => __( 'Project Featured Image', 'project-review' ),
			'set_featured_image'    => __( 'Set featured image', 'project-review' ),
			'remove_featured_image' => __( 'Remove featured image', 'project-review' ),
			'use_featured_image'    => __( 'Use as featured image', 'project-review' ),
			'insert_into_item'      => __( 'Insert into Project', 'project-review' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Project', 'project-review' ),
			'items_list'            => __( 'Projects list', 'project-review' ),
			'items_list_navigation' => __( 'Projects list navigation', 'project-review' ),
			'filter_items_list'     => __( 'Filter Projects list', 'project-review' ),
		);
		$args = array(
			'label'                 => __( 'Project Review', 'project-review' ),
			'description'           => __( 'Add Project to Review', 'project-review' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
			'taxonomies'            => array( 'category', 'post_tag' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 5,
			'menu_icon'             => 'dashicons-pinterest',
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
		register_post_type( 'project-review', $args );

	}
	add_action( 'init', 'sppr_post_type', 0 );
}
