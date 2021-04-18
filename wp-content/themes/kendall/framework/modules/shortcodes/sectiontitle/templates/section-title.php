<div class="eltd-section-title-outer-holder" <?php  kendall_elated_inline_style($section_title_holder_style); ?>>

    <?php if($title!==''){ ?>
	<div class="eltd-section-title-title-holder">
		<<?php echo esc_html($title_h_element);?> class="eltd-section-title" <?php  kendall_elated_inline_style($section_title_style); ?>>
			<?php echo esc_html($title); ?>
		</<?php echo esc_html($title_h_element);?>>
	</div>
    <?php } ?>
	<span class="eltd-title-separator <?php  echo esc_attr($separator_classes); ?>"></span>
    <?php if($subtitle!==''){ ?>
         <div class="eltd-section-subtitle-holder">
            <<?php echo esc_html($subtitle_h_element);?> class="eltd-section-subtitle" <?php  kendall_elated_inline_style($section_subtitle_style); ?> >
            <?php echo esc_html($subtitle); ?>
        </<?php echo esc_html($subtitle_h_element);?>>
        </div>
    <?php } ?>

</div>