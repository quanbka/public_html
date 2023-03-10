<div class="eltd-page-header page-header clearfix">

    <div class="eltd-theme-name pull-left" >
        <img src="<?php echo esc_url(kendall_elated_get_skin_uri() . '/assets/img/logo.png'); ?>" alt="<?php esc_html_e( 'Logo', 'kendall' ); ?>" class="eltd-header-logo pull-left"/>
        <?php $current_theme = wp_get_theme(); ?>
        <h1 class="pull-left">
            <?php echo esc_html($current_theme->get('Name')); ?>
            <small><?php echo esc_html($current_theme->get('Version')); ?></small>
        </h1>
    </div>
    <div class="eltd-top-section-holder">
        <div class="eltd-top-section-holder-inner">
            <?php $this->getAnchors($active_page); ?>
            <div class="eltd-top-buttons-holder">
                <?php if($show_save_btn) { ?>
                    <input type="button" id="eltd_top_save_button" class="btn btn-info btn-sm" value="<?php esc_html_e('Save Changes', 'kendall'); ?>"/>
                <?php } ?>
            </div>

            <?php if($show_save_btn) { ?>
                <div class="eltd-input-change"><i class="fa fa-exclamation-circle"></i><?php esc_html_e('You should save your changes', 'kendall'); ?></div>
                <div class="eltd-changes-saved"><i class="fa fa-check-circle"></i><?php esc_html_e('All your changes are successfully saved', 'kendall'); ?></div>
            <?php } ?>
        </div>
    </div>

</div> <!-- close div.eltd-page-header -->