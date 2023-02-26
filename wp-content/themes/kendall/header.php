<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see kendall_elated_header_meta() - hooked with 10
     * @see eltd_user_scalable - hooked with 10
     */
    ?>
	<?php do_action('kendall_elated_header_meta'); ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class();?>>
<?php kendall_elated_get_side_area(); ?>


<?php 
if(kendall_elated_options()->getOptionValue('smooth_page_transitions') == "yes") {
    $kendall_elated_ajax_class = 'eltd-mimic-ajax';
?>
<div class="eltd-smooth-transition-loader <?php echo esc_attr($kendall_elated_ajax_class); ?>">
    <div class="eltd-st-loader">
        <div class="eltd-st-loader1">
            <?php kendall_elated_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="eltd-wrapper">
    <div class="eltd-wrapper-inner">
        <?php kendall_elated_get_header(); ?>

        <?php if (kendall_elated_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='eltd-back-to-top'  href='#'>
                <span class="eltd-icon-stack">
                     <?php
                        kendall_elated_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php kendall_elated_get_full_screen_menu(); ?>

        <div class="eltd-content" <?php kendall_elated_content_elem_style_attr(); ?>>
            <div class="eltd-content-inner">