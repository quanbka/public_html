<div class="eltd-portfolio-info-holder">
    <?php
    //get portfolio categories section
    kendall_elated_portfolio_get_info_part('categories');

    //get portfolio content section
    kendall_elated_portfolio_get_info_part('content');

    //get portfolio date section
    kendall_elated_portfolio_get_info_part('date');

    //get portfolio tags section
    kendall_elated_portfolio_get_info_part('tags');

    //get portfolio custom fields section
    kendall_elated_portfolio_get_info_part('custom-fields');

    //get portfolio share section
    ?>
    <div class="eltd-ptf-social-holder">
        <?php
        kendall_elated_portfolio_get_info_part('social');
        ?>
        <div class="eltd-ptf-like-holder">
            <?php
            echo kendall_elated_get_like(get_the_ID());
            ?>
        </div>
    </div>
</div>

<div class="eltd-portfolio-single-holder">
    <?php
        echo kendall_elated_get_ptf_masonry_layout();
    ?>
</div>