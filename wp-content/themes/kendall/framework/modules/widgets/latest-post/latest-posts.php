<?php

class KendallElatedLatestPosts extends KendallElatedWidget {
	protected $params;
	public function __construct() {
		parent::__construct(
			'eltd_latest_posts_widget', // Base ID
			esc_html__('Elated Latest Post', 'kendall'), // Name
			array( 'description' => esc_html__( 'Display posts from your blog', 'kendall' ), ) // Args
		);

		$this->setParams();
	}

	protected function setParams() {
		$this->params = array(
			array(
				'name' => 'title',
				'type' => 'textfield',
				'title' => esc_html__('Title', 'kendall')
			),
			array(
				'name' => 'number_of_posts',
				'type' => 'textfield',
				'title' => esc_html__('Number of posts', 'kendall')
			),
			array(
				'name' => 'order_by',
				'type' => 'dropdown',
				'title' => esc_html__('Order By', 'kendall'),
				'options' => array(
					'title' => esc_html__('Title', 'kendall'),
					'date' => esc_html__('Date', 'kendall')
				)
			),
			array(
				'name' => 'order',
				'type' => 'dropdown',
				'title' => esc_html__('Order', 'kendall'),
				'options' => array(
					'ASC' => esc_html__('ASC', 'kendall'),
					'DESC' => esc_html__('DESC', 'kendall')
				)
			),
			array(
				'name' => 'category',
				'type' => 'textfield',
				'title' => esc_html__('Category Slug', 'kendall')
			),
			array(
				'name' => 'text_length',
				'type' => 'textfield',
				'title' => esc_html__('Number of characters', 'kendall')
			),
			array(
				'name' => 'title_tag',
				'type' => 'dropdown',
				'title' => esc_html__('Title Tag', 'kendall'),
				'options' => array(
					""   => "",
					"h2" => "h2",
					"h3" => "h3",
					"h4" => "h4",
					"h5" => "h5",
					"h6" => "h6"
				)
			)			
		);
	}

	public function widget($args, $instance) {
		extract($args);

		//prepare variables
		$content        = '';
		$params         = array();
		$params['type'] = 'minimal';
		//is instance empty?
		if(is_array($instance) && count($instance)) {
			//generate shortcode params
			foreach($instance as $key => $value) {
				$params[$key] = $value;
			}
		}
		if(empty($params['title_tag'])){
			$params['title_tag'] = 'h4';
		}

		print $args['before_widget'];
		print $args['before_title'];
		print $instance['title'];
		print $args['after_title'];
		print kendall_elated_execute_shortcode('eltd_blog_list', $params);
		print $args['after_widget'];

	}
}
