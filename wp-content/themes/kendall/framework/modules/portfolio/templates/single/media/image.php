<?php if(!empty($lightbox)) : ?>
    <a title="<?php echo esc_attr($media['title']); ?>" data-rel="prettyPhoto[single_pretty_photo]" href="<?php echo esc_url($media['image_url']); ?>">
<?php endif; ?>

	<?php if ($gallery) { ?>
		<span class="eltd-portfolio-gallery-text-holder">
			<span class="eltd-portfolio-gallery-text-holder-inner">
				<span><?php echo esc_html($media['title']); ?></span>
			</span>
		</span>
	<?php } ?>
    <?php if ($media['image_url']!=='') {?>
    <img src="<?php echo esc_url($media['image_url']); ?>" alt="<?php echo esc_attr($media['description']); ?>" />
    <?php } ?>
<?php if(!empty($lightbox)) : ?>
    </a>
<?php endif; ?>
