<form method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>">
	<div class="clearfix">
		<label class="screen-reader-text" for="s"><?php esc_html_e('Search for:','kendall');  ?></label>
		<input type="text" value="" placeholder="<?php esc_html_e('Search', 'kendall'); ?>" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="&#xe090;" />
	</div>
</form>