<?php do_action('kendall_elated_before_page_header'); ?>

<header class="eltd-page-header">
    <div class="eltd-logo-area">
        <?php if($logo_area_in_grid) : ?>
        <div class="eltd-grid">
        <?php endif; ?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php if(!$hide_logo) {
                            kendall_elated_get_logo();
                        } ?>
                    </div>
                </div>
            </div>
        <?php if($logo_area_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
    <?php if($show_fixed_wrapper) : ?>
        <div class="eltd-fixed-wrapper">
    <?php endif; ?>
    <div class="eltd-menu-area">
        <?php if($menu_area_in_grid) : ?>
        <div class="eltd-grid">
            <?php endif; ?>
            <div class="eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
                        <?php kendall_elated_get_main_menu(); ?>
                    </div>
                </div>

                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if(is_active_sidebar('eltd-right-from-main-menu')) : ?>
                            <?php dynamic_sidebar('eltd-right-from-main-menu'); ?>
                        <?php endif; ?>
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