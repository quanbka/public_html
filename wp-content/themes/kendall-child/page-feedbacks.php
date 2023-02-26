<?php $kendall_elated_sidebar = kendall_elated_sidebar_layout(); ?>
<?php get_header(); ?>
<?php kendall_elated_get_title(); ?>
<?php get_template_part('slider'); ?>
<div class="eltd-container">
    <?php do_action('kendall_elated_after_container_open'); ?>
    <div class="eltd-container-inner clearfix">
        <div class="vc_row wpb_row vc_row-fluid eltd-section vc_custom_1619063169520 eltd-content-aligment-left eltd-grid-section" style="">
            <div class="clearfix eltd-section-inner">
                <div class="eltd-section-inner-margin clearfix">
                    <div class="wpb_column vc_column_container vc_col-sm-12">
                        <div class="vc_column-inner ">
                            <div class="wpb_wrapper">
                                <div class="eltd-testimonials-holder clearfix">
                                    <div class="eltd-testimonials eltd-cards" data-items="3" data-autoplay-speed="3000" data-navigation="no" data-pagination="yes">
                                        <?php
                                            $posts = get_posts([
                                                'post_type'   => 'testimonials'
                                            ]);
                                            foreach ($posts as $key => $post) {
                                        ?>
                                            <div class="eltd-testimonial-content">
                                                <div class="eltd-testimonial-card">
                                                    <div class="">
                                                        <div class="">
                                                            <div >
                                                                <?php echo the_title(); ?>
                                                            </div>
                                                            <div class="">
                                                                <?php echo the_post_thumbnail(); ?>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } ?>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php do_action('kendall_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>
