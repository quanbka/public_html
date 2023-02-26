<?php
/**
 * Team info on hover shortcode template
 */
?>
<div class="eltd-team <?php echo esc_attr( $team_type ) ?>">
	<div class="eltd-team-inner">
		<?php if ( $team_image !== '' ) { ?>
			<div class="eltd-team-image">
				<?php echo wp_get_attachment_image( $team_image, 'full' ); ?>
				<div class="eltd-team-info-over">
					<div class="eltd-team-table">
						<div class="eltd-team-cell">
							<?php if ( $team_description !== '' ) { ?>
								<div class="eltd-team-description">
									<p><?php echo esc_html( $team_description ) ?></p>
								</div>
							<?php } ?>
							<div class="eltd-team-social <?php echo esc_attr( $team_social_icon_type ) ?>">
								<?php foreach ( $team_social_icons as $team_social_icon ) {
									print $team_social_icon;
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
		<div class="eltd-team-info-below">
			<?php if ( $team_name !== '' ) { ?>
				<h5 class="eltd-team-name">
					<?php echo esc_html( $team_name ); ?>
				</h5>
			<?php }
			if ( $team_position !== '' ) { ?>
				<h6 class="eltd-team-position"><?php echo esc_html( $team_position ) ?></h6>
			<?php } ?>
		</div>
	</div>
</div>