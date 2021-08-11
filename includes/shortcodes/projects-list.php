<?php


function sppr_projects_list_filter( $risks, $networks ) {
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
}

function sppr_projects_list_shortcode( $atts ) {

	// Attributes
	$atts = shortcode_atts(
		array(),
		$atts,
		'sppr-projects-list'
	);

    $posts = SPPRProjectHelper::get_posts_meta();
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
	if( !empty( $posts) && count( $posts ) > 0){
		foreach($posts as $post){
			echo '<div class="sppr-item">';
			echo '<div class="sppr-title">';
			echo '<span class="sppr-new">New</span>';
			echo '<div class="sppr-name">'.$post['post_title'].'</div>';
			echo '</div>';
			echo '<div class="sppr-button"><span class="sppr-risks sppr-risks-'.$post['risks'].'">'.$risks[$post['risks']].'</span></div>';
			echo '<div class="sppr-network"><span class="sppr-network sppr-network-'.$post['network'].'">'.$networks[$post['network']].'</span></div>';
			echo '<div class="sppr-site"><a href="'.$post['action_buttons']['button_1_link'].'">Visit</a></div>';
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