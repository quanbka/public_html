<?php do_action('kendall_elated_before_page_header'); ?>

<header class="eltd-page-header">
    <?php if($show_fixed_wrapper) : ?>
        <div class="eltd-fixed-wrapper">
    <?php endif; ?>
    <div class="eltd-menu-area" <?php kendall_elated_inline_style($menu_area_background_color); ?>>
        <?php if($menu_area_in_grid) : ?>
            <div class="eltd-grid">
        <?php endif; ?>
			<?php do_action( 'kendall_elated_after_header_menu_area_html_open' )?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left <?php  if($header_standard_position === 'left'){ esc_html_e('eltd-header-standard-left-menu','kendall'); } ?>">
                    <div class="eltd-position-left-inner">
                        <?php
                        if(!$hide_logo) {
                            kendall_elated_get_logo();
                        }
                        if($header_standard_position === 'left'){
                            kendall_elated_get_main_menu();
                        }
                        ?>
                    </div>
                </div>
                <?php if($header_standard_position === 'center'){ ?>
                    <div class="eltd-position-center">
                        <?php kendall_elated_get_main_menu(); ?>
                    </div>
                <?php } ?>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">

                        <?php
                            if($header_standard_position === 'right'){
                                kendall_elated_get_main_menu();
                            }
                            if(is_active_sidebar('eltd-right-from-main-menu')) :
                                dynamic_sidebar('eltd-right-from-main-menu');
                            endif; ?>
                    </div>
                </div>
            </div>
        <?php if($menu_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        </div>
    <?php endif; ?>
    <?php if($show_sticky) {
        kendall_elated_get_sticky_header();
    } ?>
</header>

<?php do_action('kendall_elated_after_page_header'); ?>

