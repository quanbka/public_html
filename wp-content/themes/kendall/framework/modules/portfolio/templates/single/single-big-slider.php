<div class="eltd-big-image-holder">
	<?php
	$media = kendall_elated_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="eltd-portfolio-media eltd-owl-slider">
			<?php foreach($media as $single_media) : ?>
				<div class="eltd-portfolio-single-media">
					<?php kendall_elated_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>

<div class="eltd-two-columns-66-33 clearfix">
	<div class="eltd-column1">
		<div class="eltd-column-inner">
			<?php
			//get portfolio categories section
				kendall_elated_portfolio_get_info_part('categories');
				kendall_elated_portfolio_get_info_part('content');
			?>
		</div>
	</div>
	<div class="eltd-column2">
		<div class="eltd-column-inner">
			<div class="eltd-portfolio-info-holder">
				<?php

				//get portfolio date section
				kendall_elated_portfolio_get_info_part('date');

				//get portfolio tags section
				kendall_elated_portfolio_get_info_part('tags');

				//get portfolio custom fields section
				kendall_elated_portfolio_get_info_part('custom-fields');

				//get portfolio share section
				?>
				<div class="eltd-ptf-social-holder">
					<?php
					kendall_elated_portfolio_get_info_part('social');
					?>
					<div class="eltd-ptf-like-holder">
						<?php
							echo kendall_elated_get_like(get_the_ID());
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>