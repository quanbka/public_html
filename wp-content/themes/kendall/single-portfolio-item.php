<?php

get_header();
if (have_posts()) :
	while (have_posts()) : the_post();
		kendall_elated_get_title();
		get_template_part('slider');
		kendall_elated_single_portfolio();
	endwhile;
endif;
get_footer();