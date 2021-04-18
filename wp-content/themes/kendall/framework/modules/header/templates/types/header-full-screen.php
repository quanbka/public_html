<?php
    do_action('kendall_elated_before_page_header');
?>


<header class="eltd-page-header">
    <?php if($show_fixed_wrapper) : ?>
        <div class="eltd-fixed-wrapper">
    <?php endif; ?>
    <div class="eltd-menu-area" <?php kendall_elated_inline_style($menu_area_background_color); ?>>

			<?php do_action( 'kendall_elated_after_header_menu_area_html_open' )?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
                        <?php if(!$hide_logo) {
                            kendall_elated_get_logo();
                        } ?>
                    </div>
                </div>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <a href="javascript:void(0)" class="eltd-fullscreen-menu-opener <?php echo esc_attr( $full_screen_icon_size )?>">
                            <span class="eltd-fullscreen-menu-opener-inner">
                                <i class="eltd-line">&nbsp;</i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        kendall_elated_get_sticky_header();
    } ?>
</header>

<?php do_action('kendall_elated_after_page_header'); ?>

