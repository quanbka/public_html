<?php do_action('kendall_elated_before_page_header'); ?>

    <header class="eltd-page-header" <?php kendall_elated_inline_style($menu_area_background_color); ?>>

        <div class="eltd-logo-area" <?php kendall_elated_inline_style($header_dual_logo_area_height); ?>>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php if(!$hide_logo) {
                            kendall_elated_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="eltd-menu-area" <?php kendall_elated_inline_style($header_dual_menu_area_height); ?>>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php kendall_elated_get_main_menu(); ?>
                        <?php
                        if(is_active_sidebar('eltd-right-from-main-menu-dual')) :
                            ?>
                            <div class="eltd-header-dual-widget-area-holder">
                            <?php
                            dynamic_sidebar('eltd-right-from-main-menu-dual');
                            ?></div><?php
                        endif; ?>
                    </div>
                </div>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if(is_active_sidebar('eltd-header-dual')) : ?>
                            <?php dynamic_sidebar('eltd-header-dual'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if($show_sticky) {
            kendall_elated_get_sticky_header();
        } ?>
    </header>

<?php do_action('kendall_elated_after_page_header'); ?>