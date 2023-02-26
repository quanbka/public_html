<?php
if( !function_exists('kendall_elated_get_blog') ) {
	/**
	 * Function which return holder for all blog lists
	 *
	 * @return holder.php template
	 */
	function kendall_elated_get_blog($type) {

		$sidebar = kendall_elated_sidebar_layout();

		$params = array(
			"blog_type" => $type,
			"sidebar" => $sidebar
		);
		kendall_elated_get_module_template_part('templates/lists/holder', 'blog', '', $params);
	}

}

if( !function_exists('kendall_elated_get_blog_type') ) {

	/**
	 * Function which create query for blog lists
	 *
	 * @return blog list template
	 */

	function kendall_elated_get_blog_type($type) {
		
		$blog_query = kendall_elated_get_blog_query();
		
		$paged = kendall_elated_paged();

		if(kendall_elated_options()->getOptionValue('blog_page_range') != ""){
			$blog_page_range = esc_attr(kendall_elated_options()->getOptionValue('blog_page_range'));
		} else{
			$blog_page_range = $blog_query->max_num_pages;
		}
		$blog_classes = kendall_elated_get_blog_holder_classes($type);
		$blog_data_params = kendall_elated_set_blog_holder_data_params($type);
		
		$params = array(
			'blog_query' => $blog_query,
			'paged' => $paged,
			'blog_page_range' => $blog_page_range,
			'blog_type' => $type,
			'blog_classes' => $blog_classes,
		    'blog_data_params' => $blog_data_params
		);

		kendall_elated_get_module_template_part('templates/lists/' .  $type, 'blog', '', $params);
	}

}

if(!function_exists('kendall_elated_get_blog_holder_classes')){
	/**
	 * Function set blog holder class
	 *
	 * return string
	 */

	function kendall_elated_get_blog_holder_classes($type){


		$show_load_more = kendall_elated_enable_load_more();

		$blog_classes = array(
			'eltd-blog-holder'
		);

		if($show_load_more){
			$blog_classes[] = 'eltd-blog-load-more';
		}

		switch ($type) {

			case 'standard':
				$blog_classes[] = 'eltd-blog-type-standard';
				break;

			case 'standard-whole-post':
				$blog_classes[] = 'eltd-blog-type-standard';
				break;

			case 'masonry':
				$blog_classes[] = 'eltd-blog-type-masonry';
				break;

			case 'masonry-full-width':
				$blog_classes[] = 'eltd-blog-type-masonry eltd-masonry-full-width';
				break;

			case 'masonry-gallery':
				$blog_classes[] = 'eltd-blog-type-masonry-gallery ';
				break;

			case 'masonry-gallery-full-width':
				$blog_classes[] = 'eltd-blog-type-masonry-gallery eltd-masonry-gallery-full-width';
				break;

			default:
				$blog_classes[] = 'eltd-blog-type-standard';
				break;
		}

		if($type == 'masonry' || $type == 'masonry-full-width'){

			$masonry_columns = kendall_elated_get_meta_field_intersect('masonry_columns');

			switch ($masonry_columns) {
				case 'four':
					$blog_classes[] = 'eltd-masonry-four-cols';
					break;
				case 'three':
					$blog_classes[] = 'eltd-masonry-three-cols';
					break;
				case 'two':
					$blog_classes[] = 'eltd-masonry-two-cols';
					break;
			}

		}

		return implode(' ',$blog_classes);
	}

}

if(!function_exists('kendall_elated_get_blog_query')){
	/**
	* Function which create query for blog lists
	*
	* @return wp query object
	*/
	function kendall_elated_get_blog_query(){
		global $wp_query;
		
		$id = kendall_elated_get_page_id();
		$category = esc_attr(get_post_meta($id, "eltd_blog_category_meta", true));
		if(esc_attr(get_post_meta($id, "eltd_show_posts_per_page_meta", true)) != ""){
			$post_number = esc_attr(get_post_meta($id, "eltd_show_posts_per_page_meta", true));
		}else{			
			$post_number = esc_attr(get_option('posts_per_page'));
		} 
		
		$paged = kendall_elated_paged();
		$query_array = array(
			'post_type' => 'post',
			'paged' => $paged,
			'cat' 	=> $category,
			'posts_per_page' => $post_number
		);
		if(is_archive()){
			$blog_query = $wp_query;
		}else{
			$blog_query = new WP_Query($query_array);
		}
		return $blog_query;
		
	}
}


if( !function_exists('kendall_elated_get_post_format_html') ) {

	/**
	 * Function which return html for post formats
	 * @param $type
	 * @return post hormat template
	 */

	function kendall_elated_get_post_format_html($type = "", $ajax = '') {

		$post_format = get_post_format();

		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');

		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		$params = array();
		if($type === 'masonry-gallery' || $type === 'masonry-gallery-full-width'){
			$params['masonry_gallery_class'] = kendall_elated_get_blog_masonry_gallery_classes(get_the_ID());
		}
		$background_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
		$params['background_image_style'] = 'background-image: url('.esc_url($background_image[0]).')';

		switch( $post_format ) {
			case 'standard':
				break;
			case 'audio':
				break;
			case 'video':
				break;
			case 'link':
				$params['link_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
				break;
			case 'quote':
				$params['quote_text'] = '';
				$params['quote_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');

				$quote_text =  get_post_meta(get_the_ID(),'eltd_post_quote_text_meta',true);
				if($quote_text && $quote_text !== ''){
					$params['quote_text'] = $quote_text;
				}
				break;
			case 'gallery':
				break;
			default:
		}
		//use same post format templates as masonry gallery in grid template
		if($type === 'masonry-gallery-full-width'){
			$type = 'masonry-gallery';
		}

		$slug = '';
		if($type !== ""){
			$slug = $type;
		}

		$chars_array = kendall_elated_blog_lists_number_of_chars();

		if(isset($chars_array[$type])) {
			$params['excerpt_length'] = $chars_array[$type];
		} else {
			$params['excerpt_length'] = '';
		}

		if($ajax == ''){
			kendall_elated_get_module_template_part('templates/lists/post-formats/' . $post_format, 'blog', $slug, $params);
		}
		if($ajax == 'yes'){
			return kendall_elated_get_blog_module_template_part('templates/lists/post-formats/' . $post_format, $slug, $params);
		}
		

	}

}

if( !function_exists('kendall_elated_get_default_blog_list') ) {
	/**
	 * Function which return default blog list for archive post types
	 *
	 * @return post format template
	 */

	function kendall_elated_get_default_blog_list() {

		$blog_list = kendall_elated_options()->getOptionValue('blog_list_type');
		return $blog_list;

	}

}


if (!function_exists('kendall_elated_pagination')) {

	/**
	 * Function which return pagination
	 *
	 * @return blog list pagination html
	 */

	function kendall_elated_pagination($pages = '', $range = 4, $paged = 1){

		$showitems = $range+1;
		$pagination_params = array(
			'showitems' => $showitems
		);

		if($pages == ''){
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages){
				$pages = 1;
			}
		}

		$pagination_params['pages'] = $pages;
		$pagination_params['paged'] = $paged;
		$pagination_params['range'] = $range;

		$show_load_more = kendall_elated_enable_load_more();

		$search_template = 'no';
		if(is_search()){
			$search_template = 'yes';
		}


		if($pages != 1){
			if($show_load_more == 'yes'  && $search_template !== 'yes'){

				echo kendall_elated_get_load_more_button_html();

			}
			else{
				echo kendall_elated_get_default_pagination_html($pagination_params);
			}
		}
	}
}

if(!function_exists('kendall_elated_post_info')){
	/**
	 * Function that loads parts of blog post info section
	 * Possible options are:
	 * 1. date
	 * 2. category
	 * 3. author
	 * 4. comments
	 * 5. like
	 * 6. share
	 *
	 * @param $config array of sections to load
	 */
	function kendall_elated_post_info($config){
		$default_config = array(
			'date' => '',
			'category' => '',
			'author' => '',
			'comments' => '',
			'like' => '',
			'share' => ''
		);

		extract(shortcode_atts($default_config, $config));

		if($date == 'yes'){
			kendall_elated_get_module_template_part('templates/parts/post-info-date', 'blog');
		}
		if($category == 'yes'){
			kendall_elated_get_module_template_part('templates/parts/post-info-category', 'blog');
		}
		if($author == 'yes'){
			kendall_elated_get_module_template_part('templates/parts/post-info-author', 'blog');
		}
		if($share == 'yes'){
			kendall_elated_get_module_template_part('templates/parts/post-info-share', 'blog');
		}
		if($comments == 'yes' && comments_open()){
			kendall_elated_get_module_template_part('templates/parts/post-info-comments', 'blog');
		}
		if($like == 'yes'){
			kendall_elated_get_module_template_part('templates/parts/post-info-like', 'blog');
		}
	}
}

if(!function_exists('kendall_elated_excerpt')) {
	/**
	 * Function that cuts post excerpt to the number of word based on previosly set global
	 * variable $word_count, which is defined in eltd_set_blog_word_count function.
	 *
	 * It current post has read more tag set it will return content of the post, else it will return post excerpt
	 *
	 */
	function kendall_elated_excerpt($excerpt_length = '') {
		global $post;

		if(post_password_required()) {
			echo get_the_password_form();
		}

		//does current post has read more tag set?
		elseif(kendall_elated_post_has_read_more()) {
			global $more;

			//override global $more variable so this can be used in blog templates
			$more = 0;
			the_content(true);
		}

		//is word count set to something different that 0?
		elseif($excerpt_length != '0') {
			//if word count is set and different than empty take that value, else that general option from theme options
			$word_count = '45';
			if(isset($excerpt_length) && $excerpt_length != ""){
				$word_count = $excerpt_length;

			} elseif(kendall_elated_options()->getOptionValue('number_of_chars') != '') {
				$word_count = esc_attr(kendall_elated_options()->getOptionValue('number_of_chars'));
			}
			//if post excerpt field is filled take that as post excerpt, else that content of the post
			$post_excerpt = $post->post_excerpt != "" ? $post->post_excerpt : strip_tags($post->post_content);

			//remove leading dots if those exists
			$clean_excerpt = strlen($post_excerpt) && strpos($post_excerpt, '...') ? strstr($post_excerpt, '...', true) : $post_excerpt;

			//if clean excerpt has text left
			if($clean_excerpt !== '') {
				//explode current excerpt to words
				$excerpt_word_array = explode (' ', $clean_excerpt);

				//cut down that array based on the number of the words option
				$excerpt_word_array = array_slice ($excerpt_word_array, 0, $word_count);

				//add exerpt postfix
				$excert_postfix		= apply_filters('kendall_elated_excerpt_postfix', '...');

				//and finally implode words together
				$excerpt 			= implode (' ', $excerpt_word_array).$excert_postfix;

				//is excerpt different than empty string?
				if($excerpt !== '') {
					echo '<p class="eltd-post-excerpt">'.wp_kses_post($excerpt).'</p>';
				}
			}
		}
	}
}

if(!function_exists('kendall_elated_get_blog_single')) {

	/**
	 * Function which return holder for single posts
	 *
	 * @return single holder.php template
	 */

	function kendall_elated_get_blog_single() {
		$sidebar = kendall_elated_sidebar_layout();

		$params = array(
			"sidebar" => $sidebar
		);

		kendall_elated_get_module_template_part('templates/single/holder', 'blog', '', $params);
	}
}

if( !function_exists('kendall_elated_get_single_html') ) {

	/**
	 * Function return all parts on single.php page
	 *
	 *
	 * @return single.php html
	 */

	function kendall_elated_get_single_html() {

		$post_format = get_post_format();
		$supported_post_formats = array('audio', 'video', 'link', 'quote', 'gallery');
		if(in_array($post_format,$supported_post_formats)) {
			$post_format = $post_format;
		} else {
			$post_format = 'standard';
		}

		//Related posts
		$related_posts_params = array();
		$show_related = (kendall_elated_options()->getOptionValue('blog_single_related_posts') == 'yes') ? true : false;
		if ($show_related) {
			$hasSidebar = kendall_elated_sidebar_layout();
			$post_id = get_the_ID();
			$related_post_number = ($hasSidebar == '' || $hasSidebar == 'default' || $hasSidebar == 'no-sidebar') ? 4 : 3;
			$related_posts_options = array(
				'posts_per_page' => $related_post_number
			);
			$related_posts_params = array(
				'related_posts' => kendall_elated_get_related_post_type($post_id, $related_posts_options)
			);
		}
		$params = array();
		switch( $post_format ) {
			case 'standard':
				break;
			case 'audio':
				break;
			case 'video':
				break;
			case 'link':
				$link = '';
				$link_meta = get_post_meta(get_the_ID(), 'eltd_post_link_link_meta' , true);
				if($link_meta && $link_meta !== ''){
					$link = $link_meta;
				}
				$params['link_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');
				$params['link_meta'] = $link;

				break;
			case 'quote':
				$params['quote_text'] = '';
				$params['quote_image'] = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large');

				$quote_text =  get_post_meta(get_the_ID(),'eltd_post_quote_text_meta',true);
				if($quote_text && $quote_text !== ''){
					$params['quote_text'] = $quote_text;
				}
				break;
			case 'gallery':
				break;
			default:
		}

		kendall_elated_get_module_template_part('templates/single/post-formats/' . $post_format, 'blog', '', $params );
		kendall_elated_get_module_template_part('templates/single/parts/author-info', 'blog');
		kendall_elated_get_module_template_part('templates/single/parts/single-navigation', 'blog');

		if ($show_related) {
			kendall_elated_get_module_template_part('templates/single/parts/related-posts', 'blog', '', $related_posts_params);
		}
		if(kendall_elated_show_comments()){
			comments_template('', true);
		}
	}

}
if( !function_exists('kendall_elated_additional_post_items') ) {

	/**
	 * Function which return parts on single.php which are just below content
	 *
	 * @return single.php html
	 */

	function kendall_elated_additional_post_items() {

		if(has_tag()){
			kendall_elated_get_module_template_part('templates/single/parts/tags', 'blog');
		}

	}
	add_action('kendall_elated_before_blog_article_closed_tag', 'kendall_elated_additional_post_items');
}


if (!function_exists('kendall_elated_comment')) {

	/**
	 * Function which modify default wordpress comments
	 *
	 * @return comments html
	 */

	function kendall_elated_comment($comment, $args, $depth) {

		$GLOBALS['comment'] = $comment;

		global $post;

		$is_pingback_comment = $comment->comment_type == 'pingback';
		$is_author_comment  = $post->post_author == $comment->user_id;

		$comment_class = 'eltd-comment clearfix';

		if($is_author_comment) {
			$comment_class .= ' eltd-post-author-comment';
		}

		if($is_pingback_comment) {
			$comment_class .= ' eltd-pingback-comment';
		}

		?>

		<li>
		<div class="<?php echo esc_attr($comment_class); ?>">
			<?php if(!$is_pingback_comment) { ?>
				<div class="eltd-comment-image"> <?php echo kendall_elated_kses_img(get_avatar($comment, 77)); ?> </div>
			<?php } ?>
			<div class="eltd-comment-text">
				<h5 class="eltd-comment-name">
					<?php
					if ( $is_pingback_comment ) {
						esc_html_e('Pingback:', 'kendall');
					}
					echo wp_kses_post(get_comment_author_link());
					if($is_author_comment) { ?>
						<i class="fa fa-user post-author-comment-icon"></i>
					<?php } ?>
				</h5>
				<?php if(!$is_pingback_comment) { ?>
					<div class="eltd-text-holder" id="comment-<?php comment_ID(); ?>">
						<?php comment_text(); ?>
					</div>
					<div class="eltd-comment-info clearfix">
						<div class="eltd-left">
							<span class="eltd-comment-date"><?php comment_time(get_option('date_format')); ?> <?php esc_html_e('at', 'kendall'); ?> <?php comment_time(get_option('time_format')); ?></span>
						</div>
						<div class="eltd-right">
							<?php
							comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) );
							edit_comment_link();
							?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<?php //li tag will be closed by WordPress after looping through child elements
	}
}

if( !function_exists('kendall_elated_blog_archive_pages_classes') ) {

	/**
	 * Function which create classes for container in archive pages
	 *
	 * @return array
	 */

	function kendall_elated_blog_archive_pages_classes($blog_type) {

		$classes = array();
		if(in_array($blog_type, kendall_elated_blog_full_width_types())){
			$classes['holder'] = 'eltd-full-width';
			$classes['inner'] = 'eltd-full-width-inner';
		} elseif(in_array($blog_type, kendall_elated_blog_grid_types())){
			$classes['holder'] = 'eltd-container';
			$classes['inner'] = 'eltd-container-inner clearfix';
		}

		return $classes;

	}

}

if( !function_exists('kendall_elated_blog_full_width_types') ) {

	/**
	 * Function which return all full width blog types
	 *
	 * @return array
	 */

	function kendall_elated_blog_full_width_types() {

		$types = array('masonry-full-width', 'masonry-gallery-full-width');

		return $types;

	}

}

if( !function_exists('kendall_elated_blog_grid_types') ) {

	/**
	 * Function which return in grid blog types
	 *
	 * @return array
	 */

	function kendall_elated_blog_grid_types() {

		$types = array('standard', 'masonry', 'masonry-gallery', 'standard-whole-post');

		return $types;

	}

}

if( !function_exists('kendall_elated_blog_types') ) {

	/**
	 * Function which return all blog types
	 *
	 * @return array
	 */

	function kendall_elated_blog_types() {

		$types = array_merge(kendall_elated_blog_grid_types(), kendall_elated_blog_full_width_types());

		return $types;

	}

}

if( !function_exists('kendall_elated_blog_templates') ) {

	/**
	 * Function which return all blog templates names
	 *
	 * @return array
	 */

	function kendall_elated_blog_templates() {

		$templates = array();
		$grid_templates = kendall_elated_blog_grid_types();
		$full_templates = kendall_elated_blog_full_width_types();
		foreach($grid_templates as $grid_template){
			array_push($templates, 'blog-'.$grid_template);
		}
		foreach($full_templates as $full_template){
			array_push($templates, 'blog-'.$full_template);
		}

		return $templates;

	}

}

if( !function_exists('kendall_elated_blog_lists_number_of_chars') ) {

	/**
	 * Function that return number of characters for different lists based on options
	 *
	 * @return int
	 */

	function kendall_elated_blog_lists_number_of_chars() {

		$number_of_chars = array();

		if(kendall_elated_options()->getOptionValue('standard_number_of_chars')) {
			$number_of_chars['standard'] = kendall_elated_options()->getOptionValue('standard_number_of_chars');
		}
		if(kendall_elated_options()->getOptionValue('masonry_number_of_chars')) {
			$number_of_chars['masonry'] = kendall_elated_options()->getOptionValue('masonry_number_of_chars');
		}
		$number_of_chars['masonry-full-width'] = kendall_elated_options()->getOptionValue('masonry_full_width_number_of_chars') ? kendall_elated_options()->getOptionValue('masonry_full_width_number_of_chars') : 20;

		$number_of_chars['masonry-gallery'] = kendall_elated_options()->getOptionValue('masonry_gallery_number_of_chars') ? kendall_elated_options()->getOptionValue('masonry_gallery_number_of_chars') : 30;

		return $number_of_chars;

	}

}

if (!function_exists('kendall_elated_excerpt_length')) {
	/**
	 * Function that changes excerpt length based on theme options
	 * @param $length int original value
	 * @return int changed value
	 */
	function kendall_elated_excerpt_length( $length ) {

		if(kendall_elated_options()->getOptionValue('number_of_chars') !== ''){
			return esc_attr(kendall_elated_options()->getOptionValue('number_of_chars'));
		} else {
			return 45;
		}
	}

	add_filter( 'excerpt_length', 'kendall_elated_excerpt_length', 999 );
}

if (!function_exists('kendall_elated_excerpt_more')) {
	/**
	 * Function that adds three dotes on the end excerpt
	 * @param $more
	 * @return string
	 */
	function kendall_elated_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'kendall_elated_excerpt_more');
}

if(!function_exists('kendall_elated_post_has_read_more')) {
	/**
	 * Function that checks if current post has read more tag set
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function kendall_elated_post_has_read_more() {
		global $post;

		return strpos($post->post_content, '<!--more-->');
	}
}

if(!function_exists('kendall_elated_post_has_title')) {
	/**
	 * Function that checks if current post has title or not
	 * @return bool
	 */
	function kendall_elated_post_has_title() {
		return get_the_title() !== '';
	}
}

if (!function_exists('kendall_elated_modify_read_more_link')) {
	/**
	 * Function that modifies read more link output.
	 * Hooks to the_content_more_link
	 * @return string modified output
	 */
	function kendall_elated_modify_read_more_link() {
		$link = '<div class="eltd-more-link-container">';
		$link .= kendall_elated_get_button_html(array(
			'link' => get_permalink().'#more-'.get_the_ID(),
			'type' => 'transparent',
			'size' => 'small',
			'text' => esc_html__('Continue reading', 'kendall'),
			'font_weight' => '700'
		));

		$link .= '</div>';

		return $link;
	}

	add_filter( 'the_content_more_link', 'kendall_elated_modify_read_more_link');
}


if(!function_exists('kendall_elated_has_blog_widget')) {
	/**
	 * Function that checks if latest posts widget is added to widget area
	 * @return bool
	 */
	function kendall_elated_has_blog_widget() {
		$widgets_array = array(
			'eltd_latest_posts_widget'
		);

		foreach ($widgets_array as $widget) {
			$active_widget = is_active_widget(false, false, $widget);

			if($active_widget) {
				return true;
			}
		}

		return false;
	}
}

if(!function_exists('kendall_elated_has_blog_shortcode')) {
	/**
	 * Function that checks if any of blog shortcodes exists on a page
	 * @return bool
	 */
	function kendall_elated_has_blog_shortcode() {
		$blog_shortcodes = array(
			'eltd_blog_list',
			'eltd_blog_slider',
			'eltd_blog_carousel'
		);

		$slider_field = get_post_meta(kendall_elated_get_page_id(), 'eltd_page_slider_meta', true); //TODO change

		foreach ($blog_shortcodes as $blog_shortcode) {
			$has_shortcode = kendall_elated_has_shortcode($blog_shortcode) || kendall_elated_has_shortcode($blog_shortcode, $slider_field);

			if($has_shortcode) {
				return true;
			}
		}

		return false;
	}
}


if(!function_exists('kendall_elated_load_blog_assets')) {
	/**
	 * Function that checks if blog assets should be loaded
	 *
	 * @see is_home()
	 * @see is_single()
	 * @see eltd_has_blog_shortcode()
	 * @see is_archive()
	 * @see is_search()
	 * @see eltd_has_blog_widget()
	 * @return bool
	 */
	function kendall_elated_load_blog_assets() {
		return kendall_elated_is_blog_template() || is_home() || is_single() || kendall_elated_has_blog_shortcode() || is_archive() || is_search() || kendall_elated_has_blog_widget();
	}
}

if(!function_exists('kendall_elated_is_blog_template')) {
	/**
	 * Checks if current template page is blog template page.
	 *
	 *@param string current page. Optional parameter.
	 *
	 *@return bool
	 *
	 * @see kendall_elated_get_page_template_name()
	 */
	function kendall_elated_is_blog_template($current_page = '') {

		if($current_page == '') {
			$current_page = kendall_elated_get_page_template_name();
		}

		$blog_templates = kendall_elated_blog_templates();

		return in_array($current_page, $blog_templates);
	}
}

if(!function_exists('kendall_elated_read_more_button')) {
	/**
	 * Function that outputs read more button html if necessary.
	 * It checks if read more button should be outputted only if option for given template is enabled and post does'nt have read more tag
	 * and if post isn't password protected
	 *
	 * @param string $option name of option to check
	 * @param string $class additional class to add to button
	 *
	 */
	function kendall_elated_read_more_button($option = '', $class = '') {
		if($option != '') {
			$show_read_more_button = kendall_elated_options()->getOptionValue($option) == 'yes';
		}else {
			$show_read_more_button = 'yes';
		}
		if($show_read_more_button && !kendall_elated_post_has_read_more() && !post_password_required()) {
			echo kendall_elated_get_button_html(array(
				'size'         => 'small',
				'type'         => 'solid',
				'link'         => get_the_permalink(),
				'text'         => esc_html__('Read More', 'kendall'),
				'font_weight'  => 500,
				'custom_class' => $class,
				'color'        => '#fff',
				'hover_color'        => '#ebebeb',
				'background_color' => '#ebebeb',
				'border_color' => '#ebebeb',
				'hover_background_color' => '#444',
				'hover_border_color' => '#444'
			));
		}
	}
}

if(!function_exists('kendall_elated_set_blog_holder_data_params')){
	/**
	 * Function which set data params on blog holder div
	 */
	function kendall_elated_set_blog_holder_data_params($type){
		
		$show_load_more = kendall_elated_enable_load_more();
		if($show_load_more){
			$current_query = kendall_elated_get_blog_query();

			$data_params = array();
			$data_return_string = '';

			$data_params['data-blog-type'] = $type;

			$paged = kendall_elated_paged();

			if(get_post_meta(get_the_ID(), "eltd_show_posts_per_page_meta", true) != ""){
				$posts_number = get_post_meta(get_the_ID(), "eltd_show_posts_per_page_meta", true);
			}else{			
				$posts_number = get_option('posts_per_page');
			} 
			$category = get_post_meta(kendall_elated_get_page_id(), 'eltd_blog_category_meta', true);
			
			
			//set data params
			$data_params['data-next-page'] = $paged+1;
			$data_params['data-max-pages'] =  $current_query->max_num_pages;
			
			if($posts_number !=''){
				$data_params['data-post-number'] = $posts_number;
			}
			
			if($category !=''){
				$data_params['data-category'] = $category;
			}

			if(is_archive()){
				if(is_category()){
					$cat_id = get_queried_object_id();
					$data_params['data-archive-category'] = $cat_id;
				}
				if(is_author()){
					$author_id = get_queried_object_id();
					$data_params['data-archive-author'] = $author_id;
 				}
				if(is_tag()){
					$current_tag_id = get_queried_object_id();
					$data_params['data-archive-tag'] = $current_tag_id;
				}
				if(is_date()){
					$day  = get_query_var('day');
					$month = get_query_var('monthnum');
					$year = get_query_var('year');
					
					$data_params['data-archive-day'] = $day;
					$data_params['data-archive-month'] = $month;
					$data_params['data-archive-year'] = $year;
				}				
			}
			if(is_search()){
				$search_query = get_search_query();
				$data_params['data-archive-search-string'] = $search_query; // to do, not finished
			}
			
			foreach($data_params as $key => $value) {
				if($key !== '') {
					$data_return_string .= $key.'= '.esc_attr($value).' ';
				}
			}
			
			return $data_return_string;
			
		}
	}
}

if(!function_exists('kendall_elated_enable_load_more')){
	/**
	 * Function that check if load more is enabled
	 * 
	 * return boolean
	 */
	function kendall_elated_enable_load_more(){
		$enable_load_more = false;

		if(kendall_elated_options()->getOptionValue('pagination') === 'yes'){

			if(kendall_elated_options()->getOptionValue('pagination_type') === 'load_more_pagination'){

				$enable_load_more = true;

			}

		}

		return $enable_load_more;
	}
}
if(!function_exists('kendall_elated_is_masonry_template')){
	/**
     * Check if is masonry template enabled
     * return boolean
     */ 
	function kendall_elated_is_masonry_template(){
			
			$page_id = kendall_elated_get_page_id();
			$page_template = get_page_template_slug($page_id);
			$page_options_template = kendall_elated_options()->getOptionValue('blog_list_type');

			if(!is_archive()){
				if($page_template == 'blog-masonry.php' ||  $page_template =='blog-masonry-full-width.php'){
					return true;
				}
			}elseif(is_archive() || is_home()){
				if($page_options_template == 'masonry' || $page_options_template == 'masonry-full-width'){
					return true;
				}
			}			
			else{
				return false;
			}
	}
	
	
}

if(!function_exists('kendall_elated_set_ajax_url')){
	/**
     * load themes ajax functionality
     * 
     */
	function kendall_elated_set_ajax_url() {
		echo '<script type="application/javascript">var ElatedAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'kendall_elated_set_ajax_url');
	
}

/**
	 * Loads more function for blog posts.
	 *
	 */
if(!function_exists('kendall_elated_blog_load_more')){
	
	function kendall_elated_blog_load_more(){
	
	$return_obj = array();
	$paged = $post_number = $category = $blog_type = '';
	$archive_category = $archive_author = $archive_tag = $archive_day = $archive_month = $archive_year = '';
	
	if (!empty($_POST['nextPage'])) {
        $paged = $_POST['nextPage'];
    }
	if (!empty($_POST['number'])) {
        $post_number = $_POST['number'];
    }
	if (!empty($_POST['category'])) {
        $category = $_POST['category'];
    }
	if (!empty($_POST['blogType'])) {
        $blog_type = $_POST['blogType'];
    }
	if (!empty($_POST['archiveCategory'])) {
        $archive_category = $_POST['archiveCategory'];
    }
	if (!empty($_POST['archiveAuthor'])) {
        $archive_author = $_POST['archiveAuthor'];
    }
	if (!empty($_POST['archiveTag'])) {
        $archive_tag = $_POST['archiveTag'];
    }
	if (!empty($_POST['archiveDay'])) {
        $archive_day = $_POST['archiveDay'];
    }
	if (!empty($_POST['archiveMonth'])) {
        $archive_month = $_POST['archiveMonth'];
    }
	if (!empty($_POST['archiveYear'])) {
        $archive_year = $_POST['archiveYear'];
    }
	
	
	$html = '';
	$query_array = array(
		'post_type' => 'post',
		'paged' => $paged,
		'posts_per_page' => $post_number
	);

	if($category != ''){
		$query_array['cat'] = $category;
	}
	if($archive_category != ''){
		$query_array['cat'] = $archive_category;
	}
	if($archive_author != ''){
		$query_array['author'] = $archive_author;
	}
	if($archive_tag != ''){
		$query_array['tag'] = $archive_tag;
	}
	if($archive_day !='' && $archive_month != '' && $archive_year !=''){
		$query_array['day'] = $archive_day;
		$query_array['monthnum'] = $archive_month;
		$query_array['year'] = $archive_year;
	}
	$query_results = new \WP_Query($query_array);
	
	if($query_results->have_posts()):			
		while ( $query_results->have_posts() ) : $query_results->the_post();
			$html .=  kendall_elated_get_post_format_html($blog_type, 'yes');
		endwhile;
		else:
			$html .= '<p>'. esc_html__('Sorry, no posts matched your criteria.', 'kendall') .'</p>';
		endif;
		
	$return_obj = array(
		'html' => $html,
	);
	
	echo json_encode($return_obj); exit;
}
}


add_action('wp_ajax_nopriv_kendall_elated_blog_load_more', 'kendall_elated_blog_load_more');
add_action( 'wp_ajax_kendall_elated_blog_load_more', 'kendall_elated_blog_load_more' );

if(!function_exists('kendall_elated_get_max_number_of_pages')) {
    /**
     * Function that return max number of posts/pages for pagination
     * @return int
     *
     * @version 0.1
     */
    function kendall_elated_get_max_number_of_pages() {
        global $wp_query;

        $max_number_of_pages = 10; //default value
        
        if($wp_query) {
            $max_number_of_pages = $wp_query->max_num_pages;
        }

        return $max_number_of_pages;
    }
}

if(!function_exists('kendall_elated_get_blog_page_range')) {
    /**
     * Function that return current page for blog list pagination
     * @return int
     *
     * @version 0.1
     */
    function kendall_elated_get_blog_page_range() {
        global $wp_query;

        if(kendall_elated_options()->getOptionValue('blog_page_range') != ""){
            $blog_page_range = esc_attr(kendall_elated_options()->getOptionValue('blog_page_range'));
        } else{
            $blog_page_range = $wp_query->max_num_pages;
        }

        return $blog_page_range;
    }
}

if ( ! function_exists( 'kendall_elated_comment_form_submit_button' ) ) {

	function kendall_elated_comment_form_submit_button() {
		echo '<input name="submit" class="eltd-submit-form-button eltd-btn eltd-btn-medium eltd-btn-solid" type="submit" value="' . __( 'Post Comment', 'kendall' ) . '" />';
	}

	add_action( 'comment_form', 'kendall_elated_comment_form_submit_button' );

}

if(!function_exists('kendall_elated_get_blog_masonry_gallery_classes')){
	/**
	 * Function that return css class for each article in blog masonry gallery list
	 * @return string
	 *
	 */

	function kendall_elated_get_blog_masonry_gallery_classes($post_id){

		$masonry_gallery_class = 'eltd-default-masonry-item';
		$masonry_gallery_type = get_post_meta($post_id,'eltd_masonry_gallery_type_meta', true);

		if($masonry_gallery_type){
			switch($masonry_gallery_type){
				case 'large_height_width':
					$masonry_gallery_class = 'eltd-large-width-height-masonry-item';
					break;
				case 'large_height':
					$masonry_gallery_class = 'eltd-large-height-masonry-item';
					break;
				case 'large_width':
					$masonry_gallery_class = 'eltd-large-width-masonry-item';
					break;
				default:
					$masonry_gallery_class = 'eltd-default-masonry-item';
					break;
			}
		}

		return $masonry_gallery_class;
	}

}
if ( ! function_exists( 'kendall_elated_get_load_more_button_html' ) ) {

	function kendall_elated_get_load_more_button_html() {
		$button_params = array(
			'type'  => 'solid',
			'text'  => esc_html__('Load More' , 'kendall'),
			'link'  => '#'
		);
		$button_html = '<div class= "eltd-load-more-ajax-pagination">';
		$button_html .= kendall_elated_get_button_html($button_params);
		$button_html .= '</div>';
		return $button_html;

	}

}

if(!function_exists('kendall_elated_get_default_pagination_html')){

	function kendall_elated_get_default_pagination_html($params){

		extract($params);
		$html = '';
		$show_first_page = false;
		$show_last_page = false;
		$prev_first_class = '';
		$next_last_class = '';

		if($paged > 2 && $paged > $range+1 && $showitems < $pages){
			$show_first_page = true;
			$prev_first_class = 'eltd-pagination prev-first';
		}

		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages){
			$show_last_page = true;
			$next_last_class = 'eltd-pagination-next-last';
		}

		if($pages > $paged){
			$next_link_url = esc_url(get_pagenum_link($paged + 1));
		}else{
			$next_link_url = esc_url(get_pagenum_link($paged));
		}

		$html .= '<div class="eltd-pagination">';
		$html .= '<ul>';

		//get first page html
		if($show_first_page){
			$html .= '<li class="eltd-pagination-first-page">';
			$html .= '<a href="'.esc_url(get_pagenum_link(1)).'">';
			$html .= '<span class="arrow_carrot-2left"></span>';
			$html .= '</a>';
			$html .= '</li>';
		}

		//get previous page html
		$html .= '<li class="eltd-pagination-prev '.$prev_first_class.'"> ';
		$html .= '<a href="'.esc_url(get_pagenum_link($paged - 1)).'">';
		$html .= '<span class="arrow_carrot-left"></span>';
		$html .= '</a>';
		$html .= '</li>';

		// get pages links
		for ($i=1; $i <= $pages; $i++){

			if ($pages !==  1  && ( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ) ){
				if( $paged === $i ){
					$html .= '<li class="active">';
					$html .= '<span>'.$i.'</span>';
					$html .= '</li>';
				}else{
					$html .= '<li>';
					$html .= '<a href = "'.esc_url(get_pagenum_link($i)).'" class="inactive">'.$i.'</a>';
					$html .= '</li>';
				}
			}

		}

		//get next page html
		$html .= '<li class="eltd-pagination-next '.$next_last_class.'" >';
		$html .= '<a href="'.esc_url($next_link_url).'" >';
		$html .= '<span class="arrow_carrot-right"></span>';
		$html .= '</a>';
		$html .= '</li>';


		//get last page html
		if ($show_last_page){
			$html .= '<li class="eltd-pagination-last-page">';
			$html .= '<a href="'.esc_url(get_pagenum_link($pages)).'">';
			$html .= '<span class="arrow_carrot-2right"></span>';
			$html .= '</a>';
			$html .= '</li>';
		}

		$html .= '</ul>';
		$html .= '</div>';

		return $html;

	}

}