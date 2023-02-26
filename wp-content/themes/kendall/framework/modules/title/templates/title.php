<?php
do_action('kendall_elated_before_page_title');
if($show_title_area !== 'no') { ?>

    <div class="eltd-title <?php echo kendall_elated_title_classes(); ?>" style="<?php echo esc_attr($title_height); echo esc_attr($title_background_color); echo esc_attr($title_background_image); ?>" data-height="<?php echo esc_attr(intval(preg_replace('/[^0-9]+/', '', $title_height), 10));?>" <?php echo esc_attr($title_background_image_width); ?>>
        <div class="eltd-title-image"><?php if($title_background_image_src != ""){ ?><img src="<?php echo esc_url($title_background_image_src); ?>" alt="&nbsp;" /> <?php } ?></div>
        <div class="eltd-title-holder" <?php kendall_elated_inline_style($title_holder_height); ?>>
            <div class="eltd-container clearfix">
                <div class="eltd-container-inner">
                    <div class="eltd-title-subtitle-holder" style="<?php echo esc_attr($title_subtitle_holder_padding); ?>">
                        <div class="eltd-title-subtitle-holder-inner">
                        <?php switch ($type){
                            case 'standard': ?>
                                <h1 <?php kendall_elated_inline_style($title_color); ?> class="<?php echo esc_attr($title_size_class) ?>">
                                    <span><?php kendall_elated_title_text(); ?></span>
                                </h1>
                                <?php if($has_subtitle){ ?>
                                    <span class="eltd-subtitle" <?php kendall_elated_inline_style($subtitle_color); ?>><span><?php kendall_elated_subtitle_text(); ?></span></span>
                                <?php } ?>
                                <?php if($enable_breadcrumbs == 'yes'){ ?>
                                    <div class="eltd-breadcrumbs-holder"> <?php kendall_elated_custom_breadcrumbs(); ?></div>
                                <?php } ?>
                            <?php break;
                            case 'breadcrumb': ?>
                                <div class="eltd-breadcrumbs-holder"> <?php kendall_elated_custom_breadcrumbs(); ?></div>
                            <?php break;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>
<?php do_action('kendall_elated_after_page_title'); ?>