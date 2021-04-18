<?php

//Testimonials

if(!function_exists('kendall_elated_testimonials_meta_box_map')) {

	function kendall_elated_testimonials_meta_box_map() {

		$testimonial_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__('Testimonial', 'kendall'),
				'name'  => 'testimonial_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__('Title', 'kendall'),
				'description' => esc_html__('Enter testimonial title', 'kendall'),
				'parent'      => $testimonial_meta_box,
			)
		);


		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__('Author', 'kendall'),
				'description' => esc_html__('Enter author name', 'kendall'),
				'parent'      => $testimonial_meta_box,
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__('Job Position', 'kendall'),
				'description' => esc_html__('Enter job position', 'kendall'),
				'parent'      => $testimonial_meta_box,
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__('Text', 'kendall'),
				'description' => esc_html__('Enter testimonial text', 'kendall'),
				'parent'      => $testimonial_meta_box,
			)
		);

		//init icon pack hide and show array. It will be populated dinamically from collections array
		$testimonial_icon_pack_hide_array = array();
		$testimonial_icon_pack_show_array = array();

		//do we have some collection added in collections array?
		if (is_array(kendall_elated_icon_collections()->iconCollections) && count(kendall_elated_icon_collections()->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$testimonial_icon_collections_params = kendall_elated_icon_collections()->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach (kendall_elated_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
				$testimonial_icon_pack_hide_array[$dep_collection_key] = '';

				//we need to include only current collection in show string as it is the only one that needs to show
				$testimonial_icon_pack_show_array[$dep_collection_key] = '#eltd_testimonial_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($testimonial_icon_collections_params as $testimonial_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($testimonial_icon_collections_param !== $dep_collection_object->param) {
						$testimonial_icon_pack_hide_array[$dep_collection_key] .= '#eltd_testimonial_icon_' . $testimonial_icon_collections_param . '_container,';
					}
				}

				//remove remaining ',' character
				$testimonial_icon_pack_hide_array[$dep_collection_key] = rtrim($testimonial_icon_pack_hide_array[$dep_collection_key], ',');
			}

		}

		kendall_elated_add_meta_box_field(
			array(
				'parent' => $testimonial_meta_box,
				'type' => 'select',
				'name' => 'testimonial_icon_pack',
				'default_value' => 'font_awesome',
				'label' => esc_html__('Testimonial Icon Pack', 'kendall'),
				'description' => esc_html__('Choose icon pack for Testimonial', 'kendall'),
				'options' => kendall_elated_icon_collections()->getIconCollections(),
				'args' => array(
					'dependence' => true,
					'hide' => $testimonial_icon_pack_hide_array,
					'show' => $testimonial_icon_pack_show_array
				)
			)
		);

		if (is_array(kendall_elated_icon_collections()->iconCollections) && count(kendall_elated_icon_collections()->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach (kendall_elated_icon_collections()->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = kendall_elated_icon_collections()->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$testimonial_icon_hide_values = $icon_collections_keys;

				$testimonial_icon_container = kendall_elated_add_admin_container(
					array(
						'parent' => $testimonial_meta_box,
						'name' => 'testimonial_icon_' . $collection_object->param . '_container',
						'hidden_property' => 'testimonial_icon_pack',
						'hidden_value' => '',
						'hidden_values' => $testimonial_icon_hide_values
					)
				);

				kendall_elated_add_meta_box_field(
					array(
						'parent' => $testimonial_icon_container,
						'type' => 'select',
						'name' => 'testimonial_icon_' . $collection_object->param,
						'default_value' => 'fa-bars',
						'label' => esc_html__('Testimonial Icon', 'kendall'),
						'description' => esc_html__('Choose Testimonial Icon', 'kendall'),
						'options' => $icons_array,
					)
				);

			}

		}
	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_testimonials_meta_box_map');
}