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
	<!-- Global site tag (gtag.js) - Google Ads: 801000103 -->
<script async src="https://www.googletagmanager.com/gtag/js?id=AW-801000103"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'AW-801000103');
</script>
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5RG7H3N');</script>
<!-- End Google Tag Manager -->
<!-- Event snippet for Chat web conversion page
In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
<script>
function gtag_report_conversion(url) {
  var callback = function () {
    if (typeof(url) != 'undefined') {
      window.location = url;
    }
  };
  gtag('event', 'conversion', {
      'send_to': 'AW-801000103/AUONCMG3o5UBEKeV-f0C',
      'event_callback': callback
  });
  return false;
}
</script>

	<meta name="facebook-domain-verification" content="tn32fdw132nnhvoabx2ff7qt8f7u1j" />
</head>

<body <?php body_class();?>>
	
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5RG7H3N"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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