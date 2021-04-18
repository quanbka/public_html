<?php do_action( 'kendall_elated_before_page_header' ); ?>

<header class="eltd-page-header">
	<?php if ( $show_fixed_wrapper ) : ?>
	<div class="eltd-fixed-wrapper">
		<?php endif; ?>
		<div class="eltd-menu-area eltd-menu-area-divided" <?php kendall_elated_inline_style( $menu_area_background_color ); ?>>
			<?php do_action( 'kendall_elated_after_header_menu_area_html_open' ) ?>
			<div class="eltd-vertical-align-containers">
				<div class="eltd-position-left">
					<div class="eltd-position-left-inner">
						<?php kendall_elated_get_left_menu(); ?>
					</div>
				</div>
				<?php if ( ! $hide_logo ) { ?>
				<div class="eltd-position-center" <?php kendall_elated_inline_style( $logo_holder_width ); ?>>
					<div class="eltd-position-center-inner">
						<?php kendall_elated_get_logo('divided'); ?>
					</div>
				</div>
				<?php } ?>
				<div class="eltd-position-right">
					<div class="eltd-position-right-inner">
						<?php kendall_elated_get_right_menu(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php if ( $show_fixed_wrapper ) : ?>
	</div>
<?php endif; ?>
	<?php if ( $show_sticky ) {
		kendall_elated_get_sticky_header();
	} ?>
</header>

<?php do_action( 'kendall_elated_after_page_header' ); ?>

