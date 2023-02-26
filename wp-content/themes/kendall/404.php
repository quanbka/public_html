<?php get_header(); ?>
<?php

$kendall_elated_error_404_style = '';
$kendall_elated_error_404_bck_image =  kendall_elated_options()->getOptionValue( '404_background_image' );
if( $kendall_elated_error_404_bck_image !=='' ) {
    $kendall_elated_error_404_style  = 'background-image:url('.esc_url($kendall_elated_error_404_bck_image).')';
}

?>

<?php kendall_elated_get_title(); ?>

	<div class="eltd-full-width">
		<?php do_action( 'kendall_elated_after_container_open' ); ?>
		<div class="eltd-full-width-inner eltd-404-page" <?php echo kendall_elated_get_inline_style($kendall_elated_error_404_style); ?>>
			<div class="eltd-page-not-found">
				<h1>
					<?php if ( kendall_elated_options()->getOptionValue( '404_title' ) ) {
						printf(
							__( '%s', 'kendall' ),
							esc_html(kendall_elated_options()->getOptionValue( '404_title' ))
						);
					} else {
						esc_html_e( 'Page you are looking is not found', 'kendall' );
					} ?>
				</h1>
				<h4>
					<?php if ( kendall_elated_options()->getOptionValue( '404_text' ) ) {
						printf(
							__( '%s', 'kendall' ),
							esc_html(kendall_elated_options()->getOptionValue( '404_text' ))
						);

					} else {
						esc_html_e( 'The page you are looking for does not exist. It may have been moved, or removed altogether. Perhaps you can return back to the site\'s homepage and see if you can find what you are looking for.', 'kendall' );
					} ?>
				</h4>
				<?php
				$kendall_elated_params = array(
					'text' => kendall_elated_options()->getOptionValue( '404_back_to_home' ) !== '' ? kendall_elated_options()->getOptionValue( '404_back_to_home' ) : esc_html__( 'Back to Home Page', 'kendall' ),
					'link' => esc_url( home_url( '/' ) ),
					'type' => 'solid'
				);
				echo kendall_elated_get_button_html( $kendall_elated_params );
				?>
			</div>
		</div>
		<?php do_action( 'kendall_elated_before_container_close' ); ?>
	</div>
<?php get_footer(); ?>