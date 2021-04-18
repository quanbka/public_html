<?php
$rand_number = rand();
if(is_array($filter_categories) && count($filter_categories)){ ?>

	<div class="eltd-product-list-filter-outer">
		<div class="eltd-product-list-filter-inner">

			<ul class="eltd-product-list-filter">

				<li data-class="filter_<?php print $rand_number ?>" class="filter_<?php print $rand_number ?>" data-filter="*">
					<span>
						<?php echo esc_html__('All', 'kendall')?>
					</span>
				</li>

				<?php foreach($filter_categories as $cat){ ?>

					<li data-class="filter_<?php print $rand_number ?>" class="filter filter_<?php print $rand_number ?>" data-filter = ".product_cat-<?php print $cat->slug  ?>">
						<span>
							<?php print $cat->name ?>
						</span>
					</li>

				<?php } ?>

			</ul>

		</div>
	</div>

<?php }