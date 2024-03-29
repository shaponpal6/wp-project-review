<?php

if ( ! function_exists('sppr_projects_list_shortcode') ) {
function sppr_projects_list_filter( $risks, $networks ) {
	ob_start();
	?>
	<div class="sppr-filter-container" id="sppr-filter-container">
		<div class="sppr-filter-network">
			<select id="sppr-filter-network" name="sppr-filter-network" multiple>
				<?php 
				foreach ( $networks as $key => $value ) {
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
				?>
			</select>
		</div>
		<div class="sppr-filter-risks">
			<select name="sppr-filter-risks" multiple id="sppr-filter-risks">
				<?php 
				foreach ( $risks as $key => $value ) {
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
				?>
			</select>
		</div>
		<div class="sppr-filter-audited">
			<input type="checkbox" name="audited" value="0" id="sppr-filter-audited"/> 
			<label for="sppr-filter-audited">Audited</label>
		</div>
		<div class="sppr-filter-search">
			<input type="text" name="sppr-search" value="" id="sppr-search" placeholder="Search here"/>
		</div>
	</div>
	<?php
	return ob_get_clean();
}

function sppr_projects_list_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'sppr-projects-list'
	);

    $posts = SPPRProjectHelper::get_posts_meta('');
    $risks = SPPRTemplates::$risks;
    $networks = SPPRTemplates::$networks;

    // echo '<pre>';
    // print_r( $posts );

    // echo '<div class="">Hello</div>';

	ob_start();
	echo '<div class="sppr-container">';
	echo '<section class="sppr-section">';
	echo sppr_projects_list_filter($risks, $networks);
	echo '</section>';
	echo '<section class="sppr-section">';
	echo '<div id="sppr-items" class="sppr-items">';
	echo '<div class="sppr-loader-wrapper"><div class="sppr-loader"></div></div>';
	echo '</div>';
	echo '<div class="sppr-load-more-wrapper"><div id="sppr-lode-more">Load More</div></div>';
	echo '</section>';
	echo '</div>';
	return ob_get_clean();

}
add_shortcode( 'sppr-projects-list', 'sppr_projects_list_shortcode' );
}