<?php do_action('kendall_elated_before_sticky_header'); ?>

<div class="eltd-sticky-header">
    <?php do_action( 'kendall_elated_after_sticky_menu_html_open' ); ?>
    <div class="eltd-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="eltd-grid">
            <?php endif; ?>
            <div class=" eltd-vertical-align-containers">
                <div class="eltd-position-left">
                    <div class="eltd-position-left-inner">
                        <?php
                            if(!$hide_logo) {
                                kendall_elated_get_logo('sticky');
                            }

                        ?>
                    </div>
                </div>
                <div class="eltd-position-center">
                    <div class="eltd-position-center-inner">
                        <?php
                        kendall_elated_get_sticky_menu('eltd-sticky-nav');
                        ?>
                    </div>
                </div>
                <div class="eltd-position-right">
                    <div class="eltd-position-right-inner">
                        <?php if(is_active_sidebar('eltd-sticky-right')) : ?>
                            <?php dynamic_sidebar('eltd-sticky-right'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action('kendall_elated_after_sticky_header'); ?>