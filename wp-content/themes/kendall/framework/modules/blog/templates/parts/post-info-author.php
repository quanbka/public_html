<div class="eltd-post-info-author eltd-item-info-section">

	<div class="eltd-post-author-image">
		<a class="eltd-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
			<?php echo kendall_elated_kses_img(get_avatar(get_the_author_meta( 'ID' ), 29)); ?>
		</a>
	</div>

	<div class="eltd-post-author-content">

		<span class="eltd-post-info-author-text">
			<?php esc_html_e('by', 'kendall'); ?>
		</span>
		<a class="eltd-post-info-author-link" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ) )); ?>">
			<?php the_author_meta('display_name'); ?>
		</a>
	</div>
</div>
