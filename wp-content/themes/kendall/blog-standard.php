<?php
    /*
        Template Name: Blog: Standard
    */
get_header();
kendall_elated_get_title();
get_template_part('slider'); ?>
<div class="eltd-container">
    <?php do_action('kendall_elated_after_container_open'); ?>
    <div class="eltd-container-inner" >
        <?php kendall_elated_get_blog('standard'); ?>
    </div>
    <?php do_action('kendall_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>