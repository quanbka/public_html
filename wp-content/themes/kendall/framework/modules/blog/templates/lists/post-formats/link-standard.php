<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="eltd-post-content" style="background-image: url(' <?php echo esc_url($params['link_image'][0]); ?> ')">

		<div class="eltd-post-text">

			<div class="eltd-post-mark">
				<span class="icon_link_alt eltd-link-quote-mark eltd-link-mark"></span>
			</div>

			<div class="eltd-post-info eltd-top-section">
				<?php kendall_elated_post_info(array(
					'date' => 'yes',
					'category' => 'yes'
				)) ?>
			</div>

			<?php kendall_elated_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
            <?php kendall_elated_post_info(array(
                    'author' => 'yes'
                ));
            ?>

			<div class="eltd-post-info eltd-bottom-section clearfix">

				<div class="eltd-left-section">
					<?php kendall_elated_post_info(array(
                        'share' => 'yes',
					)) ?>
				</div>

				<div class="eltd-right-section">
					<?php kendall_elated_post_info(array(
						'comments' => 'yes',
					)) ?>
				</div>

			</div>

		</div>

	</div>
</article>