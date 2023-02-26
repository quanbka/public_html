<?php

if(!function_exists('kendall_elated_single_portfolio')) {
    function kendall_elated_single_portfolio() {
        $portfolio_template = kendall_elated_get_portfolio_single_type();

        $params = array(
            'portfolio_template' => $portfolio_template,
            'fullwidth'          => $portfolio_template == 'full-width-custom',
            'holder_class'       => array(
                $portfolio_template,
                'eltd-portfolio-single-holder'
            )
        );

        if ($portfolio_template == 'gallery') {
            $params['holder_class'][] = 'eltd-portfolio-gallery-' . kendall_elated_options()->getOptionValue('portfolio_single_numb_columns');
        }

        kendall_elated_get_module_template_part('templates/single/holder', 'portfolio', '', $params);
    }
}

if(!function_exists('kendall_elated_get_portfolio_single_type')) {
    function kendall_elated_get_portfolio_single_type() {
        return kendall_elated_get_meta_field_intersect('portfolio_single_template');
    }
}

if(!function_exists('kendall_elated_get_portfolio_single_media')) {
    function kendall_elated_get_portfolio_single_media() {
        $image_ids       = get_post_meta(get_the_ID(), 'eltd_portfolio-image-gallery', true);
        $videos          = get_post_meta(get_the_ID(), 'eltd_portfolio_images', true);
        $portfolio_media = array();

        if($image_ids !== '') {
            $image_ids = explode(',', $image_ids);

            foreach($image_ids as $image_id) {
                $media                = array();
                $media['title']       = get_the_title($image_id);
                $media['type']        = 'image';
                $media['description'] = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                $media['image_src']   = wp_get_attachment_image_src($image_id, 'full');

                $portfolio_media[] = $media;
            }
        }

        if(is_array($videos) && count($videos)) {
            usort($videos, 'kendall_elated_compare_portfolio_videos');
            foreach($videos as $video) {
                $media = array();

                if(!empty($video['portfoliovideotype'])) {
                    $media['title']       = $video['portfoliotitle'];
                    $media['type']        = $video['portfoliovideotype'];
                    $media['description'] = 'video';
                    $media['video_url']   = kendall_elated_portfolio_get_video_url($video);

                    if($video['portfoliovideotype'] == 'self') {
                        $media['video_cover'] = !empty($video['portfoliovideoimage']) ? $video['portfoliovideoimage'] : '';
                    }

                    if($video['portfoliovideotype'] !== 'self') {
                        $media['video_id'] = $video['portfoliovideoid'];
                    }
                } elseif(!empty($video['portfolioimgtype'])) {
                    $media['title']     = $video['portfoliotitle'];
                    $media['type']      = $video['portfolioimgtype'];
                    $media['image_src'] = $video['portfolioimg'];
                }

                $portfolio_media[] = $media;
            }
        }

        return $portfolio_media;
    }
}

if(!function_exists('kendall_elated_portfolio_get_video_url')) {
    function kendall_elated_portfolio_get_video_url($video) {
        switch($video['portfoliovideotype']) {
            case 'youtube':
                return 'http://www.youtube.com/embed/'.$video['portfoliovideoid'].'?wmode=transparent';
                break;
            case 'vimeo';
                return 'http://player.vimeo.com/video/'.$video['portfoliovideoid'].'?title=0&amp;byline=0&amp;portrait=0';
                break;
            case 'self':
                $return_array = array();
                if(!empty($video['portfoliovideowebm'])) {
                    $return_array['webm'] = $video['portfoliovideowebm'];
                }

                if(!empty($video['portfoliovideomp4'])) {
                    $return_array['mp4'] = $video['portfoliovideomp4'];
                }

                if(!empty($video['portfoliovideoogv'])) {
                    $return_array['ogv'] = $video['portfoliovideoogv'];
                }

                return $return_array;

                break;
        }
    }
}

if(!function_exists('kendall_elated_portfolio_get_media_html')) {
    function kendall_elated_portfolio_get_media_html($media) {
        global $wp_filesystem;
        $params = array();

        //For adding image overlay in gallery template type
        $params['gallery'] = (kendall_elated_get_portfolio_single_type() == 'gallery') ? true : false;

        if($media['type'] == 'image') {
            $params['lightbox'] = kendall_elated_options()->getOptionValue('portfolio_single_lightbox_images') == 'yes';

            $media['image_url'] = is_array($media['image_src']) ? $media['image_src'][0] : $media['image_src'];
            if(empty($media['description'])) {
                $media['description'] = $media['title'];
            }
        }

        if(in_array($media['type'], array('youtube', 'vimeo'))) {
            $params['lightbox'] = kendall_elated_options()->getOptionValue('portfolio_single_lightbox_videos') == 'yes';

            if($params['lightbox']) {
                switch($media['type']) {
                    case 'vimeo':
						WP_Filesystem();
                        $url      = 'http://vimeo.com/api/v2/video/'.$media['video_id'].'.php';
                        $response = unserialize($wp_filesystem->get_contents($url));

                        $params['video_title']    = $response[0]['title'];
                        $params['lightbox_thumb'] = $response[0]['thumbnail_large'];
                        break;
                    case 'youtube':
                        $url      = 'http://gdata.youtube.com/feeds/api/videos/'.trim($media['video_id']).'?alt=json';

                        $params['video_title'] = $media['title'];

                        $params['lightbox_thumb'] = 'http://img.youtube.com/vi/'.trim($media['video_id']).'/maxresdefault.jpg';
                        break;
                }
            }
        }

        $params['media'] = $media;

        kendall_elated_get_module_template_part('templates/single/media/'.$media['type'], 'portfolio', '', $params);
    }
}

if(!function_exists('kendall_elated_compare_portfolio_videos')) {
    /**
     * Function that compares two portfolio image for sorting
     *
     * @param $a int first image
     * @param $b int second image
     *
     * @return int result of comparison
     */
    function kendall_elated_compare_portfolio_videos($a, $b) {
        if(isset($a['portfolioimgordernumber']) && isset($b['portfolioimgordernumber'])) {
            if($a['portfolioimgordernumber'] == $b['portfolioimgordernumber']) {
                return 0;
            }

            return ($a['portfolioimgordernumber'] < $b['portfolioimgordernumber']) ? -1 : 1;
        }

        return 0;
    }
}

if(!function_exists('kendall_elated_compare_portfolio_options')) {
    /**
     * Function that compares two portfolio options for sorting
     *
     * @param $a int first option
     * @param $b int second option
     *
     * @return int result of comparison
     */
    function kendall_elated_compare_portfolio_options($a, $b) {
        if(isset($a['optionlabelordernumber']) && isset($b['optionlabelordernumber'])) {
            if($a['optionlabelordernumber'] == $b['optionlabelordernumber']) {
                return 0;
            }

            return ($a['optionlabelordernumber'] < $b['optionlabelordernumber']) ? -1 : 1;
        }

        return 0;
    }
}

if(!function_exists('kendall_elated_portfolio_get_info_part')) {
    function kendall_elated_portfolio_get_info_part($part) {
        $portfolio_template = kendall_elated_get_portfolio_single_type();

        kendall_elated_get_module_template_part('templates/single/parts/'.$part, 'portfolio', $portfolio_template);
    }
}

if ( ! function_exists( 'kendall_elated_porftolio_image_size_media' ) ) {
	/**
	 * Add Portfolio Image Sizes option
	 *
	 * @param $form_fields array, fields to include in attachment form
	 * @param $post object, attachment record in database
	 *
	 * @return mixed
	 */
	function kendall_elated_porftolio_image_size_media( $form_fields, $post ) {

		$options = array(
			'default'   => esc_html__('Default', 'kendall'),
			'large_height' => esc_html__('Large Height', 'kendall'),
			'large_width_height' => esc_html__('Large Width/Height', 'kendall')
		);

		$html = '';
		$selected = get_post_meta( $post->ID, 'portfolio_image_size', true );

		$html .= '<select name="attachments['. $post->ID .'][portfolio-image-size]" class="portfolio-image-size" data-setting="portfolio-image-size">';
		// Browse and add the options
		foreach ( $options as $key => $value ) {
			if ( $key == $selected ) {
				$html .= '<option value="' . $key . '" selected>' . $value . '</option>';
			} else {
				$html .= '<option value="' . $key . '">' . $value . '</option>';
			}
		}

		$html .= '</select>';

		$form_fields['portfolio-image-size'] = array(
			'label' => 'Portfolio Image Size',
			'input' => 'html',
			'html' => $html,
			'value' => get_post_meta( $post->ID, 'portfolio_image_size', true )
		);

		return $form_fields;
	}

	add_filter( 'attachment_fields_to_edit', 'kendall_elated_porftolio_image_size_media', 10, 2 );

}

if ( ! function_exists( 'kendall_elated_porftolio_image_size_media_save' ) ) {
	/**
	 * Save values of Portfolio Image sizes in media uploader
	 *
	 * @param $post array, the post data for database
	 * @param $attachment array, attachment fields from $_POST form
	 *
	 * @return mixed
	 */
	function kendall_elated_porftolio_image_size_media_save( $post, $attachment ) {

		if( isset( $attachment['portfolio-image-size'] ) ) {
			update_post_meta( $post['ID'], 'portfolio_image_size', $attachment['portfolio-image-size'] );
		}

		return $post;

	}

	add_filter( 'attachment_fields_to_save', 'kendall_elated_porftolio_image_size_media_save', 10, 2 );

}

function kendall_elated_get_ptf_masonry_layout(){
    $html = '';
    $image_gallery_val = get_post_meta(get_the_ID(), 'eltd_portfolio-image-gallery', true);
    if($image_gallery_val !== ""){

        $html .= '<div class="eltd-ptf-gallery">';
        $html .= '<div class="eltd-ptf-gallery-sizer"></div>';
        $html .= '<div class="eltd-ptf-gallery-gutter"></div>';

        if($image_gallery_val != '' ) {
            $image_gallery_array = explode(',',$image_gallery_val);
        }
        if ( isset($image_gallery_array) && count($image_gallery_array) !== 0) {

            foreach($image_gallery_array as $image_gallery_id){

                $image_size = get_post_meta($image_gallery_id, 'portfolio_image_size', true);
                $image_size_class = 'default';
	            $image_size_value = 'kendall_elated_landscape';
                if($image_size){
                    switch($image_size){
                        case 'large_width_height' :
                            $image_size_class = 'eltd-ptf-img-large-height-width';
	                        $image_size_value = 'kendall_elated_landscape';
                            break;
                        case 'large_height' :
                            $image_size_class = 'eltd-ptf-img-large-height';
	                        $image_size_value = 'kendall_elated_portrait';
                            break;
                        default:
                            $image_size_class = 'default';
	                        $image_size_value = 'kendall_elated_landscape';
                            break;
                    }
                }

                $html .= '<div class="eltd-ptf-gallery-item '.esc_attr($image_size_class).'">';
                $html .= '<a href="'.wp_get_attachment_url($image_gallery_id).'" data-rel="prettyPhoto[single_pretty_photo]" title="'.get_the_title($image_gallery_id).' ">';
                $html .=  wp_get_attachment_image($image_gallery_id, $image_size_value);
                $html .=  '</a>';
                $html .= '</div>';
            }

        }
        $html .= '</div>'; //close eltd-ptf-gallery
    }
    return $html;
}