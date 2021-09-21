<?php

if ( ! function_exists('sppr_projects_list_short_code_single') ) {
	function sppr_projects_list_short_code_single( $atts ) {
		// Attributes
		$atts = shortcode_atts(
			array(
				id => 0
			),
			$atts,
		);
		$id = $atts['id'];
		// $post = get_post( $id );
		// print_r($post);

		$post = SPPRProjectHelper::get_posts_meta($id)[$id];
		$risks = SPPRTemplates::$risks;
		$networks = SPPRTemplates::$networks;

		// echo '<pre>';
		// print_r( $post );

		// echo '<div class="">Hello</div>';

		ob_start();
		?>
		<h2 class="sppr-single-title"><a href="<?php echo isset($post['action_buttons']['button_1_link']) && $post['action_buttons']['button_1_link'] !== '' ? $post['action_buttons']['button_1_link'] : "#"; ?>"><?php echo $post['post_title']; ?> &nbsp;<span class="iconify" data-icon="fa-solid:external-link-alt"></span></a></h2>
		<?php 
		echo '<div class="sppr-container-single">';
		
		echo '<section class="sppr-section">';
		?>
		<div class="sppr-item-wrapper">
			<div class="sppr-item">
				<div class="sppr-title">
					<div class="sppr-name">DesignRug Review</div>
				</div>
				<div class="sppr-button">
					<span class="sppr-risks sppr-risks-high"><?php echo $post['risks']; ?></span>
				</div>
			</div>
			<div class="sppr-details" style="display: block">
				<div class="sppr-details-wrapper">
					<div class="sppr-details-left">
						<p class="sppr-details-title"><?php echo $post['feature_title']; ?></p>
						<?php 
						$features = $post['project_features'];
						$features_count = count($features);
						$features_count = round($features_count/2);
						if ($features_count > 0) : ?>
						<ul class="sppr-features">
							<?php 
							for($i = 1; $i <= $features_count; $i++){
								if(isset($features['feature_'.$i]) && $features['feature_'.$i] !== ''){
									echo '<li class="sppr-features-item-wrap"><p class="sppr-features-item">'.$features['feature_'.$i].'</p>';
									if(isset($features['feature_'.$i.'_desc']) && $features['feature_'.$i.'_desc'] !== ''){
										echo '<p class="sppr-features-item-desc">'.$features['feature_'.$i.'_desc'].'</p>';
									}
									echo '</li>';
								}
							}
							?>
						</ul>
						<?php endif; ?>
						<p class="sppr-details-note"><?php echo $post['note']; ?></p>
						<p class="sppr-details-alert">⚠️<?php echo $post['alert']; ?></p>
						<p class="sppr-details-date"><?php echo $post['post_date']; ?></p>
						<?php 
						$buttons = $post['action_buttons'];
						$buttons_count = count($buttons);
						$buttons_count = round($buttons_count/2);
						if ($buttons_count > 0) : ?>
						<div class="sppr-buttons">
							<?php 
							for($i = 1; $i <= $buttons_count; $i++){
								if(isset($buttons['button_'.$i]) && $buttons['button_'.$i] !== ''){
									if(isset($buttons['button_'.$i.'_link']) && $buttons['button_'.$i.'_link'] !== ''){
										echo '<a target="_blank" href="'.$buttons['button_'.$i.'_link'].'">'.$buttons['button_'.$i].'</a>';
									}
								}
							}
							?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
		echo '</section>';
		echo '<section class="sppr-section sppr-section-right">';
		?>
		<div class="sppr-item-wrapper">
			<div class="sppr-item-single">
				<div class="sppr-title">
					<div class="sppr-name">Links</div>
				</div>
				<div class="sppr-site">
					<a href="<?php echo isset($post['action_buttons']['button_1_link']) && $post['action_buttons']['button_1_link'] !== '' ? $post['action_buttons']['button_1_link'] : "#"; ?>" class="sppr-name"><i class="fas fa-globe-americas"></i> Website</a>
				</div>
				<hr/>
				<div class="sppr-title">
					<div class="sppr-name">Farming Starts</div>
				</div>
				<p class="sppr-date-single">16 September 2021, 11:00 pm UTC</p>
				<a href="#" class="sppr-countdown-single">Countdown to block 19189467</a>
			</div>
		</div>

		<?php
		echo '</section>';
		echo '</div>';
		return ob_get_clean();

	}
	add_shortcode( 'sppr-project', 'sppr_projects_list_short_code_single' );
}