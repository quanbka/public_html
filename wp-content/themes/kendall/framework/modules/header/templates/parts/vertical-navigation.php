<?php do_action('kendall_elated_before_top_navigation'); ?>

<!--    <nav data-navigation-type='float' class="eltd-vertical-menu eltd-vertical-dropdown-float">-->
    <nav data-navigation-type='dropdown-toggle-click' class="eltd-vertical-menu eltd-vertical-dropdown-toggle">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'vertical-navigation' ,
            'container'  => '',
            'container_class' => '',
            'menu_class' => 'clearfix',
            'menu_id' => '',
            'fallback_cb' => 'top_navigation_fallback',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'walker' => new KendallElatedTopNavigationWalker()
        ));
        ?>
    </nav>

<?php do_action('kendall_elated_after_top_navigation'); ?>