<div class="eltd-post-info-date">
	<?php if(!kendall_elated_post_has_title()) { ?>
		<a href="<?php the_permalink() ?>">
	<?php }

		the_time(get_option('date_format'));

	if(!kendall_elated_post_has_title()) { ?>
		</a>
	<?php } ?>
</div>