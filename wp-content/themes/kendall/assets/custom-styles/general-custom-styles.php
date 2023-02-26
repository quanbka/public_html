<?php
if(!function_exists('kendall_elated_design_styles')) {
    /**
     * Generates general custom styles
     */
    function kendall_elated_design_styles() {

        $preload_background_styles = array();

        if(kendall_elated_options()->getOptionValue('preload_pattern_image') !== ""){
            $preload_background_styles['background-image'] = 'url('.kendall_elated_options()->getOptionValue('preload_pattern_image').') !important';
        }else{
            $preload_background_styles['background-image'] = 'url('.esc_url(ELATED_ASSETS_ROOT."/img/preload_pattern.png").') !important';
        }

        echo kendall_elated_dynamic_css('.eltd-preload-background', $preload_background_styles);

		if (kendall_elated_options()->getOptionValue('google_fonts')){
			$font_family = kendall_elated_options()->getOptionValue('google_fonts');
			if(kendall_elated_is_font_option_valid($font_family)) {
				echo kendall_elated_dynamic_css('body', array('font-family' => kendall_elated_get_font_option_val($font_family)));
			}
		}

        if(kendall_elated_options()->getOptionValue('first_color') !== "") {
            $color_selector = array(
                'a',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a',
                '.eltd-portfolio-list-holder article .eltd-item-icons-holder a',
                '.eltd-blog-list-holder.eltd-blog-author-top .eltd-blog-list-item .eltd-item-info-section',
                '.eltd-blog-list-holder.eltd-blog-border-bottom .eltd-blog-list-item .eltd-item-info-section.eltd-small-info-section',
                '.eltd-blog-list-holder.eltd-blog-minimal .eltd-blog-list-item .eltd-item-text-holder .eltd-item-info-section',
                '.eltd-blog-list-holder.eltd-masonry .eltd-blog-list .eltd-blog-list-masonry-item .eltd-item-info-section',
                '.eltd-portfolio-list-holder article .eltd-ptf-category-holder',
                '.eltd-blog-carousel-holder .eltd-blog-carousel-item .eltd-item-info-section.eltd-large-info-section',
                '.eltd-blog-list-holder.eltd-blog-border-bottom .eltd-blog-list-item .eltd-item-info-section.eltd-large-info-section',
                '.eltd-blog-list-holder.eltd-blog-simple .eltd-blog-list-item .eltd-item-info-section.eltd-large-info-section',
                '.eltd-blog-list-holder.eltd-blog-simple .eltd-blog-list-item .eltd-item-info-section.eltd-small-info-section',
                '.eltd-blog-list-holder.eltd-blog-standard .eltd-blog-list-item .eltd-item-text-holder .eltd-item-info-section',
                '.eltd-blog-carousel-holder .eltd-blog-carousel-item .eltd-item-info-section.eltd-large-info-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-list-holder.eltd-blog-border-bottom .eltd-blog-list-item .eltd-item-info-section.eltd-large-info-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-list-holder.eltd-blog-simple .eltd-blog-list-item .eltd-item-info-section.eltd-large-info-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-list-holder.eltd-blog-simple .eltd-blog-list-item .eltd-item-info-section.eltd-small-info-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-list-holder.eltd-blog-standard .eltd-blog-list-item .eltd-item-text-holder .eltd-item-info-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-comment-holder .eltd-comment .eltd-comment-info .eltd-right a:hover',
                '.eltd-pagination ul li.active>a',
                '.eltd-pagination ul li.active>span',
                '.eltd-pagination ul li:hover>a',
                '.eltd-pagination ul li:hover>span',
                '.eltd-main-menu ul li a:hover',
                '.eltd-main-menu ul li.eltd-active-item a',
                '.eltd-main-menu.eltd-sticky-nav ul li a:hover',
                '.eltd-light-header .eltd-page-header>div:not(.eltd-sticky-header) .eltd-main-menu>ul>li>a.current',
                '.eltd-light-header .eltd-page-header>div:not(.eltd-sticky-header) .eltd-main-menu>ul>li>a:hover',
                '.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-main-menu>ul>li>a.current',
                '.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-main-menu>ul>li>a:hover',
                '.eltd-dark-header .eltd-page-header>div:not(.eltd-sticky-header) .eltd-main-menu>ul>li>a.current',
                '.eltd-dark-header .eltd-page-header>div:not(.eltd-sticky-header) .eltd-main-menu>ul>li>a:hover',
                '.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-main-menu>ul>li>a.current',
                '.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-main-menu>ul>li>a:hover',
                '.eltd-drop-down .second .inner ul li a:hover',
                '.eltd-drop-down .second .inner ul li h4:hover',
                '.eltd-drop-down .second .inner ul li.sub ul li:hover>a',
                '.eltd-drop-down .second .inner ul li.current-menu-item a',
                '.eltd-drop-down .second .inner>ul>li:hover>a',
                '.eltd-drop-down .wide .second .inner>ul>li>a:hover',
                '.eltd-drop-down .wide.icons .second ul li a:hover i',
                '.eltd-header-vertical .eltd-vertical-dropdown-float .second .inner ul li a:hover',
                '.eltd-header-vertical .eltd-vertical-dropdown-toggle .second .inner ul li.open>a',
                '.eltd-header-vertical .eltd-vertical-menu ul li a:hover',
                '.eltd-header-dual .eltd-page-header .eltd-menu-area .eltd-main-menu>ul>li.eltd-active-item>a',
                '.eltd-header-vertical .eltd-vertical-menu>ul>li.open>a',
                '.eltd-header-vertical .eltd-vertical-menu>ul>li>a:hover',
                '.eltd-header-dual .eltd-page-header .eltd-search-opener:hover',
                '.eltd-header-dual .eltd-page-header .eltd-search-opener:hover .eltd-search-icon-text',
                '.widget.eltd-sticky-right .eltd-search-opener:hover',
                '.widget.eltd-sticky-right .eltd-shopping-cart-widget .eltd-shopping-cart a:hover',
                '.eltd-mobile-header .eltd-mobile-nav a:hover',
                '.eltd-mobile-header .eltd-mobile-nav h4:hover',
                '.eltd-mobile-header .eltd-mobile-menu-opener a:hover',
                '.eltd-title .eltd-title-holder .eltd-breadcrumbs a:hover',
                '.eltd-side-menu-button-opener:hover span',
                'nav.eltd-fullscreen-menu ul li a:hover',
                'nav.eltd-fullscreen-menu ul li ul li a:hover',
                '.eltd-search-opener:hover span',
                '.eltd-search-fade .eltd-fullscreen-search-holder.eltd-animate .eltd-fullscreen-search-close:hover',
                '.eltd-portfolio-single-holder .eltd-portfolio-single-nav .eltd-portfolio-back-btn:hover a>span',
                '.eltd-portfolio-single-holder .eltd-portfolio-single-nav .eltd-portfolio-next:hover .eltd-portfolio-navigation-info',
                '.eltd-portfolio-single-holder .eltd-portfolio-single-nav .eltd-portfolio-next:hover .eltd-ptf-nav-icons',
                '.eltd-portfolio-single-holder .eltd-portfolio-single-nav .eltd-portfolio-prev:hover .eltd-portfolio-navigation-info',
                '.eltd-portfolio-single-holder .eltd-portfolio-single-nav .eltd-portfolio-prev:hover .eltd-ptf-nav-icons',
                '.eltd-portfolio-single-holder .eltd-ptf-social-holder .eltd-ptf-like-holder a.liked .eltd-ptf-like-icon',
                '.eltd-portfolio-single-holder .eltd-ptf-social-holder .eltd-ptf-like-holder a:hover .eltd-ptf-like-icon',
                '.eltd-team .eltd-team-social .eltd-icon-shortcode a:hover',
                '.eltd-message .eltd-message-inner a.eltd-close i:hover',
                '.eltd-ordered-list ol>li:before',
                '.eltd-icon-list-item .eltd-icon-list-icon-holder-inner .font_elegant',
                '.eltd-icon-list-item .eltd-icon-list-icon-holder-inner i',
                '.eltd-testimonials.eltd-with-icon .eltd-testimonials-icon>i',
                '.eltd-testimonials.eltd-with-icon .eltd-testimonials-icon>span',
                '.eltd-testimonials.eltd-with-image .eltd-testimonials-image>i',
                '.eltd-testimonials.eltd-with-image .eltd-testimonials-image>span',
                '.eltd-testimonials.eltd-cards .owl-controls .owl-nav>div>span',
                '.eltd-pricing-tables.eltd-bigger-featured .eltd-price-table.eltd-featured .eltd-table-title h6',
                '.eltd-pie-chart-holder .eltd-to-counter',
                '.eltd-pie-chart-with-icon-holder .eltd-percentage-with-icon i',
                '.eltd-pie-chart-with-icon-holder .eltd-percentage-with-icon span',
                '.eltd-tabs.eltd-transparent-tabs.eltd-vertical-tab .eltd-tabs-nav li a:hover',
                '.eltd-tabs.eltd-transparent-tabs.eltd-vertical-tab .eltd-tabs-nav li.ui-state-active a',
                '.eltd-accordion-holder .eltd-title-holder.ui-state-active',
                '.eltd-accordion-holder .eltd-title-holder.ui-state-hover',
                '.eltd-blog-list-holder.eltd-blog-simple .eltd-blog-list-item .eltd-item-info-section.eltd-large-info-section .eltd-post-info-category',
                '.eltd-blog-list-holder.eltd-blog-border-bottom .eltd-blog-list-item .eltd-item-info-section.eltd-large-info-section .eltd-post-info-category',
                '.eltd-blog-list-holder.eltd-blog-minimal .eltd-blog-list-item .eltd-item-text-holder .eltd-item-title a:hover',
                '.eltd-blog-carousel-holder .eltd-blog-carousel-item .eltd-item-info-section.eltd-large-info-section .eltd-post-info-category',
                '.eltd-blog-carousel-holder .eltd-blog-carousel-item .eltd-item-info-section.eltd-small-info-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-btn.eltd-btn-outline',
                '.eltd-btn.eltd-btn-transparent:hover',
                '.eltd-video-button-play',
                '.eltd-video-button-play:hover',
                '.eltd-dropcaps',
                '.eltd-ptf-light-shader .eltd-portfolio-list-holder article .eltd-item-title',
                '.eltd-portfolio-list-holder-outer.eltd-ptf-standard article .eltd-ptf-title-like-holder .eltd-ptf-like-holder a.eltd-like.liked',
                '.eltd-portfolio-list-holder-outer.eltd-ptf-standard article .eltd-ptf-title-like-holder .eltd-ptf-like-holder a.eltd-like:hover',
                '.eltd-portfolio-list-holder-outer.eltd-ptf-standard-no-space article .eltd-ptf-category-like-holder .eltd-ptf-like-holder a.eltd-like.liked',
                '.eltd-portfolio-list-holder-outer.eltd-ptf-standard-no-space article .eltd-ptf-category-like-holder .eltd-ptf-like-holder a.eltd-like:hover',
                '.eltd-iwt .eltd-icon-shortcode.circle a',
                '.eltd-social-share-holder.eltd-list li a:hover',
                '.eltd-social-share-holder.eltd-dropdown .eltd-social-share-dropdown-opener:hover',
                '.eltd-social-share-holder.eltd-dropdown .eltd-social-share-dropdown ul li a:hover',
                '.eltd-product .eltd-product-price',
                '.eltd-product-list-holder.eltd-product-list-with-filter .eltd-product-list-filter li span',
                '.eltd-product-list-holder.eltd-product-list-with-filter .eltd-product-list-filter li.active span',
                '.carousel .carousel-control .eltd-next-nav',
                '.carousel .carousel-control .eltd-prev-nav',
                '.carousel .carousel-control .eltd-next-nav:hover',
                '.carousel .carousel-control .eltd-prev-nav:hover',
                '.eltd-right-from-main-menu-widget.widget.widget_eltd_side_area_opener:hover a span',
                '.eltd-sticky-header.widget.widget_eltd_side_area_opener:hover a span',
                '.widget.widget_nav_menu ul li a:hover',
                'footer .widget ul a:hover',
                'footer .widget.widget_eltd_twitter_widget li a',
                'footer .widget.widget_eltd_social_icon_widget .eltd-icon-shortcode a:hover',
                '.eltd-side-menu .widget.widget_recent_entries ul li a:hover',
                '.eltd-blog-holder article .eltd-post-info.eltd-bottom-section .eltd-left-section',
                '.eltd-blog-holder article .eltd-post-info.eltd-bottom-section .eltd-right-section',
                '.eltd-blog-holder.eltd-blog-single article .eltd-blog-tags-info-holder .eltd-post-info',
                '.eltd-blog-holder.eltd-blog-single article .eltd-blog-tags-info-holder .eltd-single-tags-holder',
                '.eltd-blog-holder.eltd-blog-type-masonry-gallery article .eltd-post-info',
                '.eltd-blog-holder.eltd-blog-type-masonry-gallery article.format-link .eltd-quote-author',
                '.eltd-blog-holder.eltd-blog-type-masonry-gallery article.format-quote .eltd-quote-author',
                '.eltd-blog-holder article .eltd-post-info.eltd-top-section',
                '.eltd-blog-holder.eltd-blog-type-masonry .eltd-post-info.eltd-bottom-section',
                '.eltd-blog-holder article .eltd-post-info.eltd-top-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-holder.eltd-blog-type-masonry .eltd-post-info.eltd-bottom-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-holder article.format-link .eltd-post-info.eltd-top-section',
                '.eltd-blog-holder article.format-link .eltd-post-info.eltd-top-section a',
                '.eltd-blog-holder article.format-quote .eltd-post-info.eltd-top-section',
                '.eltd-blog-holder article.format-quote .eltd-post-info.eltd-top-section a',
                '.eltd-blog-holder article.format-quote .eltd-quote-author',
                '.eltd-filter-blog-holder li.eltd-active',
                '.eltd-single-links-pages .eltd-single-links-pages-inner>span',
                '.eltd-single-links-pages a',
                '.eltd-blog-holder.eltd-blog-type-standard article .eltd-post-author-content a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article.format-link .eltd-post-info.eltd-bottom-section .eltd-left-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article.format-quote .eltd-post-info.eltd-bottom-section .eltd-left-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article.format-link .eltd-post-info.eltd-bottom-section .eltd-right-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article.format-quote .eltd-post-info.eltd-bottom-section .eltd-right-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article.format-link .eltd-post-author-content>a',
                '.eltd-blog-holder.eltd-blog-type-standard article.format-link .eltd-post-author-content>span',
                '.eltd-blog-holder.eltd-blog-type-standard article:not(.format-quote):not(.format-link) .eltd-post-info.eltd-top-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article:not(.format-quote):not(.format-link) .eltd-post-info.eltd-bottom-section .eltd-right-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article:not(.format-quote):not(.format-link) .eltd-post-info.eltd-bottom-section .eltd-right-section a.eltd-share-link:hover',
                '.eltd-blog-holder.eltd-blog-type-standard article:not(.format-quote):not(.format-link) .eltd-post-info.eltd-bottom-section .eltd-left-section a:hover',
                '.eltd-blog-holder.eltd-blog-type-masonry article.format-link .eltd-post-title a:hover',
                '.eltd-blog-holder.eltd-blog-type-masonry article.format-quote .eltd-post-title a:hover',
                '.eltd-blog-holder.eltd-blog-type-masonry-gallery article.format-link .eltd-icon-post-mark span',
                '.eltd-blog-holder.eltd-blog-type-masonry-gallery article.format-quote .eltd-icon-post-mark span',
                '.eltd-blog-holder.eltd-blog-single article.format-link .eltd-post-text .eltd-post-author-content',
                '.eltd-blog-holder.eltd-blog-single article.format-quote .eltd-post-text .eltd-post-author-content',
                '.eltd-blog-holder.eltd-blog-single article.format-link .eltd-post-text .eltd-post-author-content .eltd-post-info-author-text',
                '.eltd-blog-holder.eltd-blog-single article.format-quote .eltd-post-text .eltd-post-author-content .eltd-post-info-author-text',
                '.eltd-blog-holder.eltd-blog-single article.format-link .eltd-post-info.eltd-bottom-section .eltd-left-section .eltd-blog-share ul li a:hover',
                '.eltd-blog-holder.eltd-blog-single article.format-quote .eltd-post-info.eltd-bottom-section .eltd-left-section .eltd-blog-share ul li a:hover',
                '.eltd-blog-holder.eltd-blog-single article .eltd-blog-tags-info-holder .eltd-post-info .eltd-blog-share ul li a:hover',
                '.eltd-blog-holder.eltd-blog-single article.format-link .eltd-post-info.eltd-bottom-section .eltd-right-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-holder.eltd-blog-single article.format-quote .eltd-post-info.eltd-bottom-section .eltd-right-section .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-holder.eltd-blog-single article .eltd-blog-tags-info-holder .eltd-post-info .eltd-post-info-comments-holder .eltd-post-info-comments:hover',
                '.eltd-blog-holder.eltd-blog-single article:not(.format-quote):not(.fornat-link) .eltd-post-info.eltd-top-section .eltd-post-info-category:before',
                '.eltd-blog-holder.eltd-blog-single .eltd-author-description .eltd-author-social-holder a:hover',
                '.eltd-blog-holder.eltd-blog-single .eltd-blog-single-navigation .eltd-blog-navigation-info:hover',
                '.eltd-blog-holder.eltd-blog-single .eltd-related-posts-holder .eltd-related-post .eltd-related-post-title-holder a:hover h4',
                '.eltd-footer-inner #lang_sel ul ul a:hover',
                '.eltd-side-menu #lang_sel ul ul a:hover',
                '.woocommerce-account input[type=submit]:hover',
                '.eltd-woocommerce-page .star-rating:before',
                '.woocommerce .star-rating:before',
                '.eltd-woocommerce-page .star-rating span:before',
                '.woocommerce .star-rating span:before',
                '.woocommerce-pagination .page-numbers li>a.current',
                '.woocommerce-pagination .page-numbers li>a:hover',
                '.woocommerce-pagination .page-numbers li>span.current',
                '.woocommerce-pagination .page-numbers li>span:hover',
                '.eltd-single-product-summary .eltd-single-product-actions .yith-wcwl-add-to-wishlist a:hover',
                '.eltd-single-product-summary .product_meta .eltd-woocommerce-meta-table a:hover',
                '.eltd-single-product-summary #reviews .comment-form-rating .stars.selected a:after',
                '.eltd-shopping-cart-widget .eltd-shopping-cart-dropdown .eltd-shopping-cart-item .eltd-shopping-cart-item-details h6 a:hover',
                '.select2-container-multi .select2-choices .select2-search-choice',
                '.widget_shopping_cart .buttons a:hover',
                'eltd-fullscreen-search-holder .eltd-search-submit:hover'
            );

            $color_important_selector = array(
                '.eltd-dark-header .eltd-side-menu-button-opener:hover span',
                '.eltd-light-header .eltd-side-menu-button-opener:hover span',
                '.eltd-light-header .eltd-page-header>div:not(.eltd-sticky-header) .eltd-search-opener:hover span',
                '.eltd-light-header .eltd-top-bar .eltd-search-opener:hover span',
                '.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-search-opener:hover span',
                '.eltd-main-menu ul li.current_page_item',
                '.eltd-dark-header .eltd-page-header>div:not(.eltd-sticky-header) .eltd-search-opener:hover span',
                '.eltd-dark-header .eltd-top-bar .eltd-search-opener:hover span',
                '.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-search-opener:hover span',
                '.eltd-portfolio-single-holder .eltd-ptf-social-holder .eltd-ptf-like-holder a.liked',
                '.eltd-portfolio-single-holder .eltd-ptf-social-holder .eltd-ptf-like-holder a:hover',
                '.eltd-menu-area .eltd-position-center .widget_icl_lang_sel_widget #lang_sel ul ul li a:hover',
                '.eltd-menu-area .eltd-position-right .widget_icl_lang_sel_widget #lang_sel ul ul li a:hover',
                '.eltd-sticky-header .eltd-position-center .widget_icl_lang_sel_widget #lang_sel ul ul li a:hover',
                '.eltd-sticky-header .eltd-position-right .widget_icl_lang_sel_widget #lang_sel ul ul li a:hover',
                '.eltd-shopping-cart-widget .eltd-shopping-cart a:hover>i',
                '.eltd-dark-header .eltd-menu-area .widget .eltd-shopping-cart-dropdown .eltd-shopping-cart-item .eltd-shopping-cart-item-details h6 a:hover',
                '.eltd-light-header .eltd-menu-area .widget .eltd-shopping-cart-dropdown .eltd-shopping-cart-item .eltd-shopping-cart-item-details h6 a:hover',
                );


            $background_color_selector = array(
                '.eltd-st-loader .eltd-dropcaps.eltd-circle .eltd-line',
                '.eltd-st-loader .eltd-square .eltd-line',
                '.eltd-st-loader .pulse',
                '.eltd-st-loader .double_pulse .double-bounce1',
                '.eltd-st-loader .double_pulse .double-bounce2',
                '.eltd-st-loader .cube',
                '.eltd-st-loader .rotating_cubes .cube1',
                '.eltd-st-loader .rotating_cubes .cube2',
                '.eltd-st-loader .stripes>div',
                '.eltd-st-loader .wave>div',
                '.eltd-st-loader .two_rotating_circles .dot1',
                '.eltd-st-loader .two_rotating_circles .dot2',
                '.eltd-st-loader .five_rotating_circles .container1>div',
                '.eltd-st-loader .five_rotating_circles .container2>div',
                '.eltd-st-loader .five_rotating_circles .container3>div',
                '.eltd-st-loader .lines .line1',
                '.eltd-st-loader .lines .line2',
                '.eltd-st-loader .lines .line3',
                '.eltd-st-loader .lines .line4',
                '.eltd-portfolio-list-holder article .eltd-item-icons-holder',
                '.slick-slider.slick-initialized .slick-dots .slick-active',
                '.eltd-header-vertical .eltd-vertical-dropdown-toggle .second:after',
                '.eltd-header-vertical .eltd-vertical-menu>ul>li>a:before',
                '.eltd-header-vertical .eltd-vertical-menu>ul>li>a:after',
                '.eltd-fullscreen-menu-opener:hover .eltd-line',
                '.eltd-fullscreen-menu-opener.opened:hover .eltd-line:after',
                '.eltd-fullscreen-menu-opener.opened:hover .eltd-line:before',
                '.eltd-icon-shortcode.circle',
                '.eltd-icon-shortcode.square',
                '.eltd-icon-shortcode.square:hover',
                '.eltd-progress-bar .eltd-progress-content-outer .eltd-progress-content',
                '.eltd-progress-bar .eltd-progress-number-wrapper.eltd-floating-outside .eltd-progress-number',
                '.eltd-price-table.eltd-featured .eltd-table-title',
                '.eltd-pie-chart-doughnut-holder .eltd-pie-legend ul li .eltd-pie-color-holder',
                '.eltd-pie-chart-pie-holder .eltd-pie-legend ul li .eltd-pie-color-holder',
                '.eltd-tabs.eltd-color-tabs .eltd-tabs-nav li.ui-state-active a',
                '.eltd-tabs.eltd-color-tabs .eltd-tabs-nav li:hover a',
                '.eltd-tabs.eltd-transparent-tabs.eltd-horizontal-tab .eltd-tabs-nav .eltd-tab-line',
                '.eltd-tabs.eltd-transparent-tabs.eltd-vertical-tab .eltd-tabs-nav .eltd-tab-line',
                '.eltd-accordion-holder .eltd-title-holder.ui-state-active .eltd-accordion-mark',
                '.eltd-accordion-holder .eltd-title-holder.ui-state-hover .eltd-accordion-mark',
                '.eltd-accordion-holder.eltd-boxed.light .eltd-title-holder.ui-state-active',
                '.eltd-accordion-holder.eltd-boxed.light .eltd-title-holder.ui-state-hover',
                '.eltd-accordion-holder.eltd-boxed.dark .eltd-title-holder.ui-state-active',
                '.eltd-accordion-holder.eltd-boxed.dark .eltd-title-holder.ui-state-hover',
                '.eltd-blog-list-holder.eltd-blog-border-bottom .eltd-blog-list-item:after',
                '.eltd-carousel[data-image-animation=underline]:not([data-show_in_two_rows=yes]) .eltd-underline .eltd-carousel-line',
                '.eltd-carousel-holder .eltd-carousel.owl-carousel .owl-dots .owl-dot.active span',
                '.eltd-image-gallery .owl-controls .owl-dots .owl-dot.active span',
                '.eltd-dropcaps.eltd-circle',
                '.eltd-dropcaps.eltd-square',
                '.eltd-ptf-overlay .eltd-portfolio-list-holder article .eltd-item-text-overlay',
                '.eltd-ptf-slide-up .eltd-portfolio-list-holder article .eltd-item-text-overlay',
                '.eltd-portfolio-filter-holder .eltd-portfolio-filter-holder-inner ul .eltd-filter-line',
                '.eltd-portfolio-slider-holder .eltd-portfolio-list-holder.owl-carousel .owl-dots .owl-dot.active span',
                '.carousel .carousel-indicators:not(.thumbnails) li.active',
                '.carousel .carousel-indicators:not(.thumbnails) li:hover',
                '.eltd-dark-header .carousel .carousel-indicators:not(.thumbnails) li.active',
                '.tagcloud a:hover',
                '.eltd-single-links-pages .eltd-single-links-pages-inner>span:hover',
                '.eltd-single-links-pages a:hover',
                '.eltd-blog-holder.eltd-blog-single .eltd-single-tags-holder .eltd-tags a:hover',
                '.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a',
                '.woocommerce-account input[type=submit]',
                '.eltd-single-product-summary .cart .reset_variations:hover',
                '.eltd-shopping-cart-widget .eltd-shopping-cart a .eltd-shopping-cart-number',
                '.widget_price_filter .price_slider .ui-slider-handle',
            );

            $background_color_important_selector = array(
                '.mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.mejs-controls .mejs-time-rail .mejs-time-current',
                '.eltd-pricing-tables.eltd-bigger-featured .eltd-price-table.eltd-featured .eltd-table-button .eltd-btn',
                '.eltd-btn.eltd-btn-outline:not(.eltd-btn-custom-hover-bg):hover',

            );

            $border_color_selector = array(
                '.eltd-st-loader .pulse_circles .ball',
                '.eltd-portfolio-list-holder article .eltd-item-icons-holder a',
                '.comment-respond input[type=text]:focus',
                '.comment-respond input[type=email]:focus',
                '.comment-respond textarea:focus',
                '.post-password-form input[type=password]:focus',
                '.widget input:focus',
                '.widget select:focus',
                '.wpcf7-form-control.wpcf7-date:focus',
                '.wpcf7-form-control.wpcf7-number:focus',
                '.wpcf7-form-control.wpcf7-quiz:focus',
                '.wpcf7-form-control.wpcf7-select:focus',
                '.wpcf7-form-control.wpcf7-text:focus',
                '.wpcf7-form-control.wpcf7-textarea:focus',
                '.wpcf7-form.cf7_custom_style_1 .wpcf7-form-control.wpcf7-date:focus',
                '.wpcf7-form.cf7_custom_style_1 .wpcf7-form-control.wpcf7-number:focus',
                '.wpcf7-form.cf7_custom_style_1 .wpcf7-form-control.wpcf7-quiz:focus',
                '.wpcf7-form.cf7_custom_style_1 .wpcf7-form-control.wpcf7-select:focus',
                '.wpcf7-form.cf7_custom_style_1 .wpcf7-form-control.wpcf7-text:focus',
                '.wpcf7-form.cf7_custom_style_1 .wpcf7-form-control.wpcf7-textarea:focus',
                '.slick-slider.slick-initialized .slick-dots li',
                '.slick-slider.slick-initialized .slick-dots .slick-active',
                '.eltd-icon-shortcode.square:hover',
                '.eltd-testimonials .owl-controls .owl-dots .owl-dot span',
                '.eltd-accordion-holder .eltd-title-holder.ui-state-active .eltd-accordion-mark',
                '.eltd-accordion-holder .eltd-title-holder.ui-state-hover .eltd-accordion-mark',
                '.eltd-accordion-holder.eltd-boxed.dark .eltd-title-holder.ui-state-active',
                '.eltd-accordion-holder.eltd-boxed.dark .eltd-title-holder.ui-state-hover',
                '.eltd-btn.eltd-btn-outline',
                '.eltd-carousel-holder .eltd-carousel.owl-carousel .owl-dots .owl-dot span',
                '.eltd-image-gallery .owl-controls .owl-dots .owl-dot span',
                '.eltd-video-button-play',
                '.eltd-video-button-play:hover',
                '.eltd-portfolio-slider-holder .eltd-portfolio-list-holder.owl-carousel .owl-dots .owl-dot span',
                '.carousel .carousel-indicators:not(.thumbnails) li',
                '.eltd-dark-header .carousel .carousel-indicators:not(.thumbnails) li',
                '.tagcloud a:hover',
                '.eltd-single-links-pages .eltd-single-links-pages-inner>span:hover',
                '.eltd-single-links-pages a:hover',
                '.eltd-blog-holder.eltd-blog-single .eltd-single-tags-holder .eltd-tags a:hover',
                '.eltd-woocommerce-page input[type=text]:focus',
                '.eltd-woocommerce-page input[type=email]:focus',
                '.eltd-woocommerce-page input[type=tel]:focus',
                '.eltd-woocommerce-page input[type=password]:focus',
                '.eltd-woocommerce-page textarea:focus',
                '.eltd-progress-bar .eltd-progress-number-wrapper.eltd-floating .eltd-down-arrow',
                '.eltd-product-list-holder.eltd-product-list-with-filter .eltd-product-list-filter li.active span',
                '.search-no-results .eltd-search-form input[type="text"]:focus'
            );

            $border_color_important_selector = array(
                '.eltd-pricing-tables.eltd-bigger-featured .eltd-price-table.eltd-featured .eltd-table-button .eltd-btn',
                '.eltd-btn.eltd-btn-outline:not(.eltd-btn-custom-border-hover):hover',
            );

            echo kendall_elated_dynamic_css($color_selector, array('color' => kendall_elated_options()->getOptionValue('first_color')));
            echo kendall_elated_dynamic_css($color_important_selector, array('color' => kendall_elated_options()->getOptionValue('first_color').'!important'));
            echo kendall_elated_dynamic_css('::selection', array('background' => kendall_elated_options()->getOptionValue('first_color')));
            echo kendall_elated_dynamic_css('::-moz-selection', array('background' => kendall_elated_options()->getOptionValue('first_color')));
            echo kendall_elated_dynamic_css($background_color_selector, array('background-color' => kendall_elated_options()->getOptionValue('first_color')));
            echo kendall_elated_dynamic_css($background_color_important_selector, array('background-color' => kendall_elated_options()->getOptionValue('first_color').'!important'));
            echo kendall_elated_dynamic_css($border_color_selector, array('border-color' => kendall_elated_options()->getOptionValue('first_color')));
            echo kendall_elated_dynamic_css($border_color_important_selector, array('border-color' => kendall_elated_options()->getOptionValue('first_color').'!important'));

        }

        if(kendall_elated_options()->getOptionValue('second_color') !== "") {
            $color_selector = array(

            );

            $color_important_selector = array(

            );


            $background_color_selector = array(
                '.widget_price_filter .price_slider .ui-slider-range',
            );

            $background_color_important_selector = array(

            );

            $border_color_selector = array(

            );

            $border_color_important_selector = array(

            );

            echo kendall_elated_dynamic_css($color_selector, array('color' => kendall_elated_options()->getOptionValue('second_color')));
            echo kendall_elated_dynamic_css($color_important_selector, array('color' => kendall_elated_options()->getOptionValue('second_color').'!important'));
            echo kendall_elated_dynamic_css('::selection', array('background' => kendall_elated_options()->getOptionValue('second_color')));
            echo kendall_elated_dynamic_css('::-moz-selection', array('background' => kendall_elated_options()->getOptionValue('second_color')));
            echo kendall_elated_dynamic_css($background_color_selector, array('background-color' => kendall_elated_options()->getOptionValue('second_color')));
            echo kendall_elated_dynamic_css($background_color_important_selector, array('background-color' => kendall_elated_options()->getOptionValue('second_color').'!important'));
            echo kendall_elated_dynamic_css($border_color_selector, array('border-color' => kendall_elated_options()->getOptionValue('second_color')));
            echo kendall_elated_dynamic_css($border_color_important_selector, array('border-color' => kendall_elated_options()->getOptionValue('second_color').'!important'));

        }



		if (kendall_elated_options()->getOptionValue('page_background_color')) {
			$background_color_selector = array(
				'.eltd-wrapper-inner',
				'.eltd-content'
			);
			echo kendall_elated_dynamic_css($background_color_selector, array('background-color' => kendall_elated_options()->getOptionValue('page_background_color')));
		}

		if (kendall_elated_options()->getOptionValue('selection_color')) {
			echo kendall_elated_dynamic_css('::selection', array('background' => kendall_elated_options()->getOptionValue('selection_color')));
			echo kendall_elated_dynamic_css('::-moz-selection', array('background' => kendall_elated_options()->getOptionValue('selection_color')));
		}

		$boxed_background_style = array();
		if (kendall_elated_options()->getOptionValue('page_background_color_in_box')) {
			$boxed_background_style['background-color'] = kendall_elated_options()->getOptionValue('page_background_color_in_box');
		}

		if (kendall_elated_options()->getOptionValue('boxed_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(kendall_elated_options()->getOptionValue('boxed_background_image')).')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat'] = 'no-repeat';
		}

		if (kendall_elated_options()->getOptionValue('boxed_pattern_background_image')) {
			$boxed_background_style['background-image'] = 'url('.esc_url(kendall_elated_options()->getOptionValue('boxed_pattern_background_image')).')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat'] = 'repeat';
		}

		if (kendall_elated_options()->getOptionValue('boxed_background_image_attachment')) {
			$boxed_background_style['background-attachment'] = (kendall_elated_options()->getOptionValue('boxed_background_image_attachment'));
		}

		echo kendall_elated_dynamic_css('.eltd-boxed .eltd-wrapper', $boxed_background_style);
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_design_styles');
}

if (!function_exists('kendall_elated_h1_styles')) {

    function kendall_elated_h1_styles() {

        $h1_styles = array();

        if(kendall_elated_options()->getOptionValue('h1_color') !== '') {
            $h1_styles['color'] = kendall_elated_options()->getOptionValue('h1_color');
        }
        if(kendall_elated_options()->getOptionValue('h1_google_fonts') !== '-1') {
            $h1_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('h1_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('h1_fontsize') !== '') {
            $h1_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h1_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h1_lineheight') !== '') {
            $h1_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h1_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h1_texttransform') !== '') {
            $h1_styles['text-transform'] = kendall_elated_options()->getOptionValue('h1_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('h1_fontstyle') !== '') {
            $h1_styles['font-style'] = kendall_elated_options()->getOptionValue('h1_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('h1_fontweight') !== '') {
            $h1_styles['font-weight'] = kendall_elated_options()->getOptionValue('h1_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('h1_letterspacing') !== '') {
            $h1_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h1_letterspacing')).'px';
        }

        $h1_selector = array(
            'h1'
        );

        if (!empty($h1_styles)) {
            echo kendall_elated_dynamic_css($h1_selector, $h1_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_h1_styles');
}

if (!function_exists('kendall_elated_h2_styles')) {

    function kendall_elated_h2_styles() {

        $h2_styles = array();

        if(kendall_elated_options()->getOptionValue('h2_color') !== '') {
            $h2_styles['color'] = kendall_elated_options()->getOptionValue('h2_color');
        }
        if(kendall_elated_options()->getOptionValue('h2_google_fonts') !== '-1') {
            $h2_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('h2_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('h2_fontsize') !== '') {
            $h2_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h2_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h2_lineheight') !== '') {
            $h2_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h2_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h2_texttransform') !== '') {
            $h2_styles['text-transform'] = kendall_elated_options()->getOptionValue('h2_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('h2_fontstyle') !== '') {
            $h2_styles['font-style'] = kendall_elated_options()->getOptionValue('h2_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('h2_fontweight') !== '') {
            $h2_styles['font-weight'] = kendall_elated_options()->getOptionValue('h2_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('h2_letterspacing') !== '') {
            $h2_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h2_letterspacing')).'px';
        }

        $h2_selector = array(
            'h2'
        );

        if (!empty($h2_styles)) {
            echo kendall_elated_dynamic_css($h2_selector, $h2_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_h2_styles');
}

if (!function_exists('kendall_elated_h3_styles')) {

    function kendall_elated_h3_styles() {

        $h3_styles = array();

        if(kendall_elated_options()->getOptionValue('h3_color') !== '') {
            $h3_styles['color'] = kendall_elated_options()->getOptionValue('h3_color');
        }
        if(kendall_elated_options()->getOptionValue('h3_google_fonts') !== '-1') {
            $h3_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('h3_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('h3_fontsize') !== '') {
            $h3_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h3_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h3_lineheight') !== '') {
            $h3_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h3_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h3_texttransform') !== '') {
            $h3_styles['text-transform'] = kendall_elated_options()->getOptionValue('h3_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('h3_fontstyle') !== '') {
            $h3_styles['font-style'] = kendall_elated_options()->getOptionValue('h3_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('h3_fontweight') !== '') {
            $h3_styles['font-weight'] = kendall_elated_options()->getOptionValue('h3_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('h3_letterspacing') !== '') {
            $h3_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h3_letterspacing')).'px';
        }

        $h3_selector = array(
            'h3'
        );

        if (!empty($h3_styles)) {
            echo kendall_elated_dynamic_css($h3_selector, $h3_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_h3_styles');
}

if (!function_exists('kendall_elated_h4_styles')) {

    function kendall_elated_h4_styles() {

        $h4_styles = array();

        if(kendall_elated_options()->getOptionValue('h4_color') !== '') {
            $h4_styles['color'] = kendall_elated_options()->getOptionValue('h4_color');
        }
        if(kendall_elated_options()->getOptionValue('h4_google_fonts') !== '-1') {
            $h4_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('h4_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('h4_fontsize') !== '') {
            $h4_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h4_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h4_lineheight') !== '') {
            $h4_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h4_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h4_texttransform') !== '') {
            $h4_styles['text-transform'] = kendall_elated_options()->getOptionValue('h4_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('h4_fontstyle') !== '') {
            $h4_styles['font-style'] = kendall_elated_options()->getOptionValue('h4_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('h4_fontweight') !== '') {
            $h4_styles['font-weight'] = kendall_elated_options()->getOptionValue('h4_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('h4_letterspacing') !== '') {
            $h4_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h4_letterspacing')).'px';
        }

        $h4_selector = array(
            'h4'
        );

        if (!empty($h4_styles)) {
            echo kendall_elated_dynamic_css($h4_selector, $h4_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_h4_styles');
}

if (!function_exists('kendall_elated_h5_styles')) {

    function kendall_elated_h5_styles() {

        $h5_styles = array();

        if(kendall_elated_options()->getOptionValue('h5_color') !== '') {
            $h5_styles['color'] = kendall_elated_options()->getOptionValue('h5_color');
        }
        if(kendall_elated_options()->getOptionValue('h5_google_fonts') !== '-1') {
            $h5_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('h5_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('h5_fontsize') !== '') {
            $h5_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h5_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h5_lineheight') !== '') {
            $h5_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h5_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h5_texttransform') !== '') {
            $h5_styles['text-transform'] = kendall_elated_options()->getOptionValue('h5_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('h5_fontstyle') !== '') {
            $h5_styles['font-style'] = kendall_elated_options()->getOptionValue('h5_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('h5_fontweight') !== '') {
            $h5_styles['font-weight'] = kendall_elated_options()->getOptionValue('h5_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('h5_letterspacing') !== '') {
            $h5_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h5_letterspacing')).'px';
        }

        $h5_selector = array(
            'h5'
        );

        if (!empty($h5_styles)) {
            echo kendall_elated_dynamic_css($h5_selector, $h5_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_h5_styles');
}

if (!function_exists('kendall_elated_h6_styles')) {

    function kendall_elated_h6_styles() {

        $h6_styles = array();

        if(kendall_elated_options()->getOptionValue('h6_color') !== '') {
            $h6_styles['color'] = kendall_elated_options()->getOptionValue('h6_color');
        }
        if(kendall_elated_options()->getOptionValue('h6_google_fonts') !== '-1') {
            $h6_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('h6_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('h6_fontsize') !== '') {
            $h6_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h6_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h6_lineheight') !== '') {
            $h6_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h6_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('h6_texttransform') !== '') {
            $h6_styles['text-transform'] = kendall_elated_options()->getOptionValue('h6_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('h6_fontstyle') !== '') {
            $h6_styles['font-style'] = kendall_elated_options()->getOptionValue('h6_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('h6_fontweight') !== '') {
            $h6_styles['font-weight'] = kendall_elated_options()->getOptionValue('h6_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('h6_letterspacing') !== '') {
            $h6_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('h6_letterspacing')).'px';
        }

        $h6_selector = array(
            'h6'
        );

        if (!empty($h6_styles)) {
            echo kendall_elated_dynamic_css($h6_selector, $h6_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_h6_styles');
}

if (!function_exists('kendall_elated_text_styles')) {

    function kendall_elated_text_styles() {

        $text_styles = array();

        if(kendall_elated_options()->getOptionValue('text_color') !== '') {
            $text_styles['color'] = kendall_elated_options()->getOptionValue('text_color');
        }
        if(kendall_elated_options()->getOptionValue('text_google_fonts') !== '-1') {
            $text_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('text_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('text_fontsize') !== '') {
            $text_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('text_fontsize')).'px';
        }
        if(kendall_elated_options()->getOptionValue('text_lineheight') !== '') {
            $text_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('text_lineheight')).'px';
        }
        if(kendall_elated_options()->getOptionValue('text_texttransform') !== '') {
            $text_styles['text-transform'] = kendall_elated_options()->getOptionValue('text_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('text_fontstyle') !== '') {
            $text_styles['font-style'] = kendall_elated_options()->getOptionValue('text_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('text_fontweight') !== '') {
            $text_styles['font-weight'] = kendall_elated_options()->getOptionValue('text_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('text_letterspacing') !== '') {
            $text_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('text_letterspacing')).'px';
        }

        $text_selector = array(
            'p'
        );

        if (!empty($text_styles)) {
            echo kendall_elated_dynamic_css($text_selector, $text_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_text_styles');
}

if (!function_exists('kendall_elated_link_styles')) {

    function kendall_elated_link_styles() {

        $link_styles = array();

        if(kendall_elated_options()->getOptionValue('link_color') !== '') {
            $link_styles['color'] = kendall_elated_options()->getOptionValue('link_color');
        }
        if(kendall_elated_options()->getOptionValue('link_fontstyle') !== '') {
            $link_styles['font-style'] = kendall_elated_options()->getOptionValue('link_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('link_fontweight') !== '') {
            $link_styles['font-weight'] = kendall_elated_options()->getOptionValue('link_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('link_fontdecoration') !== '') {
            $link_styles['text-decoration'] = kendall_elated_options()->getOptionValue('link_fontdecoration');
        }

        $link_selector = array(
            'a',
            'p a'
        );

        if (!empty($link_styles)) {
            echo kendall_elated_dynamic_css($link_selector, $link_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_link_styles');
}

if (!function_exists('kendall_elated_link_hover_styles')) {

    function kendall_elated_link_hover_styles() {

        $link_hover_styles = array();

        if(kendall_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_hover_styles['color'] = kendall_elated_options()->getOptionValue('link_hovercolor');
        }
        if(kendall_elated_options()->getOptionValue('link_hover_fontdecoration') !== '') {
            $link_hover_styles['text-decoration'] = kendall_elated_options()->getOptionValue('link_hover_fontdecoration');
        }

        $link_hover_selector = array(
            'a:hover',
            'p a:hover'
        );

        if (!empty($link_hover_styles)) {
            echo kendall_elated_dynamic_css($link_hover_selector, $link_hover_styles);
        }

        $link_heading_hover_styles = array();

        if(kendall_elated_options()->getOptionValue('link_hovercolor') !== '') {
            $link_heading_hover_styles['color'] = kendall_elated_options()->getOptionValue('link_hovercolor');
        }

        $link_heading_hover_selector = array(
            'h1 a:hover',
            'h2 a:hover',
            'h3 a:hover',
            'h4 a:hover',
            'h5 a:hover',
            'h6 a:hover'
        );

        if (!empty($link_heading_hover_styles)) {
            echo kendall_elated_dynamic_css($link_heading_hover_selector, $link_heading_hover_styles);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_link_hover_styles');
}

if (!function_exists('kendall_elated_smooth_page_transition_styles')) {

    function kendall_elated_smooth_page_transition_styles() {
        
        $loader_style = array();

        if(kendall_elated_options()->getOptionValue('smooth_pt_bgnd_color') !== '') {
            $loader_style['background-color'] = kendall_elated_options()->getOptionValue('smooth_pt_bgnd_color');
        }

        $loader_selector = array('.eltd-smooth-transition-loader');

        if (!empty($loader_style)) {
            echo kendall_elated_dynamic_css($loader_selector, $loader_style);
        }

        $spinner_style = array();

        if(kendall_elated_options()->getOptionValue('smooth_pt_spinner_color') !== '') {
            $spinner_style['background-color'] = kendall_elated_options()->getOptionValue('smooth_pt_spinner_color');
        }

        $spinner_selectors = array(
            '.eltd-st-loader .eltd-square .eltd-line',
            '.eltd-st-loader .pulse', 
            '.eltd-st-loader .double_pulse .double-bounce1', 
            '.eltd-st-loader .double_pulse .double-bounce2', 
            '.eltd-st-loader .cube', 
            '.eltd-st-loader .rotating_cubes .cube1', 
            '.eltd-st-loader .rotating_cubes .cube2', 
            '.eltd-st-loader .stripes > div', 
            '.eltd-st-loader .wave > div', 
            '.eltd-st-loader .two_rotating_circles .dot1', 
            '.eltd-st-loader .two_rotating_circles .dot2', 
            '.eltd-st-loader .five_rotating_circles .container1 > div', 
            '.eltd-st-loader .five_rotating_circles .container2 > div', 
            '.eltd-st-loader .five_rotating_circles .container3 > div', 
            '.eltd-st-loader .atom .ball-1:before', 
            '.eltd-st-loader .atom .ball-2:before', 
            '.eltd-st-loader .atom .ball-3:before', 
            '.eltd-st-loader .atom .ball-4:before', 
            '.eltd-st-loader .clock .ball:before', 
            '.eltd-st-loader .mitosis .ball', 
            '.eltd-st-loader .lines .line1', 
            '.eltd-st-loader .lines .line2', 
            '.eltd-st-loader .lines .line3', 
            '.eltd-st-loader .lines .line4', 
            '.eltd-st-loader .fussion .ball', 
            '.eltd-st-loader .fussion .ball-1', 
            '.eltd-st-loader .fussion .ball-2', 
            '.eltd-st-loader .fussion .ball-3', 
            '.eltd-st-loader .fussion .ball-4', 
            '.eltd-st-loader .wave_circles .ball', 
            '.eltd-st-loader .pulse_circles .ball' 
        );

        if (!empty($spinner_style)) {
            echo kendall_elated_dynamic_css($spinner_selectors, $spinner_style);
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_smooth_page_transition_styles');
}