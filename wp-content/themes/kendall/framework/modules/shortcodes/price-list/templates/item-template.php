<div class="eltd-price-list-item <?php if($trending_item ===  'yes'){ esc_attr_e('eltd-trending-item','kendall');}?>">

	<div class="eltd-price-list-item-inner">

		<?php if ($title !== '' || $price !== '' ) {?>

			<div class="eltd-price-list-title-price-holder clearfix">

				<?php if ($title !== '') { ?>

					<<?php echo esc_attr($title_tag);?> class="eltd-price-list-title" >
						<span class="eltd-price-list-title-area" <?php kendall_elated_inline_style($title_style); ?>>
							<?php echo esc_html($title); ?>
							<?php if($trending_item ===  'yes'){?>
								<span class="eltd-price-list-trending-item icon_star" <?php kendall_elated_inline_style($title_style); ?>></span>
							<?php } ?>
						</span>
					</<?php echo esc_attr($title_tag);?>>
				<?php }

				if ($price !== '') { ?>

					<div class="eltd-price-list-price-holder">
						<h5 class="eltd-price-list-price">
							<span class="eltd-price-list-currency"><?php echo esc_html($currency); ?></span>
							<span class="eltd-price-list-number"><?php echo esc_html($price); ?></span>
						</h5>
					</div>

				<?php } ?>

			</div>

		<?php } ?>

		<?php if ($description !== '') { ?>
			<p class="eltd-price-list-desc"><?php echo esc_html($description); ?></p>
		<?php } ?>
	</div>
</div>