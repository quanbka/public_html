<li class="eltd-<?php echo esc_html($name) ?>-share">
	<a class="eltd-share-link" href="#" onclick="<?php print $link; ?>">
		<?php if ($custom_icon !== '') { ?>
			<img src="<?php echo esc_url($custom_icon); ?>" alt="<?php echo esc_html($name); ?>" />
		<?php } else {
			echo esc_html( $label );
		} ?>
	</a>
</li>