<?php do_action('kendall_elated_before_mobile_logo'); ?>

<div class="eltd-mobile-logo-wrapper">
    <a href="<?php echo esc_url(home_url('/')); ?>" <?php kendall_elated_inline_style($logo_styles); ?>>
        <img src="<?php echo esc_url($logo_image); ?>" alt="<?php esc_html_e('Mobile Logo','kendall'); ?>"/>
    </a>
</div>

<?php do_action('kendall_elated_after_mobile_logo'); ?>