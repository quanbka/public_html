<?php if(kendall_elated_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') {

    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = kendall_elated_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';
    $prev_post = get_previous_post();
    $next_post = get_next_post();

    ?>

    <div class="eltd-portfolio-single-nav">
        <?php if(get_previous_post() !== '') { ?>

            <div class="eltd-portfolio-prev">
                <?php
                if($nav_same_category) {
                    previous_post_link('%link', '<div class="eltd-portfolio-prev"><span class="icon-arrows-left eltd-ptf-nav-icons"></span><span class = "eltd-portfolio-navigation-info">'.esc_html__( 'Previous project', 'kendall' ).'</span></div>', TRUE , '' , 'portfolio-category');
                } else {
                    previous_post_link('%link', '<div class="eltd-portfolio-prev"><span class="icon-arrows-left eltd-ptf-nav-icons"></span><span class = "eltd-portfolio-navigation-info">'.esc_html__( 'Previous project', 'kendall' ).'</span></div>');
                }
                ?>

            </div>

        <?php } ?>

        <?php if($back_to_link !== '') { ?>

            <div class="eltd-portfolio-back-btn">

                <a href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <span>
                        <?php esc_html_e('Main Portfolio', 'kendall'); ?>
                    </span>
                </a>

            </div>

        <?php } ?>

        <?php if(get_next_post() !== '') { ?>

            <div class="eltd-portfolio-next">

                <?php if($nav_same_category) {
                    next_post_link('%link', '<div class="eltd-portfolio-next"><span class = "eltd-portfolio-navigation-info">'.esc_html__( 'Next project', 'kendall' ).'</span><span class="icon-arrows-right eltd-ptf-nav-icons"></span></div>', TRUE , '' , 'portfolio-category');
                } else {
                    next_post_link('%link', '<div class="eltd-portfolio-next"><span class = "eltd-portfolio-navigation-info">'.esc_html__( 'Next project', 'kendall' ).'</span><span class="icon-arrows-right eltd-ptf-nav-icons"></span></div>');
                } ?>
            </div>

        <?php } ?>

    </div>

<?php } ?>