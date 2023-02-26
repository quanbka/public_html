<?php if(kendall_elated_options()->getOptionValue('enable_social_share') == 'yes'
    && kendall_elated_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="eltd-portfolio-social">
        <?php echo kendall_elated_get_social_share_html() ?>
    </div>
<?php endif; ?>