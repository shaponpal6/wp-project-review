<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.shapon.me
 * @since      1.0.0
 *
 * @package    Project_Review
 * @subpackage Project_Review/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Project_Review
 * @subpackage Project_Review/includes
 * @author     Shapon Pal <shaponpal4@gmail.com>
 */
class Project_Review_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		 $post_details = array(
			'post_title'    => 'Projects',
			'post_content'  => '[sppr-projects-list]',
			'post_status'   => 'publish',
			'post_author'   => 1,
			'post_type' => 'page'
		);
		wp_insert_post( $post_details );
		return;
	}

}
