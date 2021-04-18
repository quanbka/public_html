<?php

class KendallElatedFieldFlagProduct extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$dependence_hide_on_yes = "";
		if(isset($args["dependence_hide_on_yes"]))
			$dependence_hide_on_yes = $args["dependence_hide_on_yes"];
		$dependence_show_on_yes = "";
		if(isset($args["dependence_show_on_yes"]))
			$dependence_show_on_yes = $args["dependence_show_on_yes"];
		?>

		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($name); ?>">


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->



			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "product") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagproduct" value="product"<?php if (kendall_elated_option_get_value($name) == "product") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagproduct" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
							</p>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldRange extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$range_min = 0;
		$range_max = 1;
		$range_step = 0.01;
		$range_decimals = 2;
		if(isset($args["range_min"]))
			$range_min = $args["range_min"];
		if(isset($args["range_max"]))
			$range_max = $args["range_max"];
		if(isset($args["range_step"]))
			$range_step = $args["range_step"];
		if(isset($args["range_decimals"]))
			$range_decimals = $args["range_decimals"];
		?>

		<div class="eltd-page-form-section">


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="eltd-slider-range-wrapper">
								<div class="form-inline">
									<input type="text"
										class="form-control eltd-form-element eltd-form-element-xsmall pull-left eltd-slider-range-value"
										name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>

									<div class="eltd-slider-range small"
										data-step="<?php echo esc_attr($range_step); ?>" data-min="<?php echo esc_attr($range_min); ?>" data-max="<?php echo esc_attr($range_max); ?>" data-decimals="<?php echo esc_attr($range_decimals); ?>" data-start="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"></div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldRangeSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		?>

		<div class="col-lg-3" id="eltd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<div class="eltd-slider-range-wrapper">
				<div class="form-inline">
					<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
					<input type="text"
						class="form-control eltd-form-element eltd-form-element-xxsmall pull-left eltd-slider-range-value"
						name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>

					<div class="eltd-slider-range xsmall"
						data-step="0.01" data-max="1" data-start="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"></div>
				</div>

			</div>
		</div>
		<?php

	}

}

class KendallElatedFieldRadio extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value)
			$checked = "checked";
		$html = '<input type="radio" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));

	}

}

class KendallElatedFieldRadioGroup extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$dependence = isset($args["dependence"]) && $args["dependence"] ? true : false;
		$show = !empty($args["show"]) ? $args["show"] : array();
		$hide = !empty($args["hide"]) ? $args["hide"] : array();

		$use_images = isset($args["use_images"]) && $args["use_images"] ? true : false;
		$hide_labels = isset($args["hide_labels"]) && $args["hide_labels"] ? true : false;
		$hide_radios = $use_images ? 'display: none' : '';
		$checked_value = kendall_elated_option_get_value($name);
		?>

		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>

			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<?php if(is_array($options) && count($options)) { ?>
								<div class="eltd-radio-group-holder <?php if($use_images) echo "with-images"; ?>">
									<?php foreach($options as $key => $atts) {
										$selected = false;
										if($checked_value == $key) {
											$selected = true;
										}

										$show_val = "";
										$hide_val = "";
										if($dependence) {
											if(array_key_exists($key, $show)) {
												$show_val = $show[$key];
											}

											if(array_key_exists($key, $hide)) {
												$hide_val = $hide[$key];
											}
										}
										?>
										<label class="radio-inline">
											<input
												<?php echo kendall_elated_get_inline_attr($show_val, 'data-show'); ?>
												<?php echo kendall_elated_get_inline_attr($hide_val, 'data-hide'); ?>
												<?php if($selected) echo "checked"; ?> <?php kendall_elated_inline_style($hide_radios); ?>
												type="radio"
												name="<?php echo esc_attr($name);  ?>"
												value="<?php echo esc_attr($key); ?>"
												<?php if($dependence) kendall_elated_class_attribute("dependence"); ?>> <?php if(!empty($atts["label"]) && !$hide_labels) echo esc_attr($atts["label"]); ?>

											<?php if($use_images) { ?>
												<img title="<?php if(!empty($atts["label"])) echo esc_attr($atts["label"]); ?>" src="<?php echo esc_url($atts['image']); ?>" alt="<?php echo esc_attr("$key image") ?>"/>
											<?php } ?>
										</label>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php
	}

}

class KendallElatedFieldCheckBox extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {

		$checked = "";
		if ($default_value == $value)
			$checked = "checked";
		$html = '<input type="checkbox" name="'.$name.'" value="'.$default_value.'" '.$checked.' /> '.$label.'<br />';
		echo wp_kses($html, array(
			'input' => array(
				'type' => true,
				'name' => true,
				'value' => true,
				'checked' => true
			),
			'br' => true
		));
	}
}

class KendallElatedFieldCheckBoxGroup extends KendallElatedFieldType {

	public function render($name, $label = '', $description = '', $options = array(), $args = array(), $hidden = false) {
		if(!(is_array($options) && count($options))) {
			return;
		}

		$saved_value = kendall_elated_option_get_value($name);

		$enable_empty_checkbox = isset($args["enable_empty_checkbox"]) && $args["enable_empty_checkbox"] ? true : false;
		$inline_checkbox_class = isset($args["inline_checkbox_class"]) && $args["inline_checkbox_class"] ? 'checkbox-inline' : 'checkbox';
		?>
		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="eltd-checkbox-group-holder">
								<?php if($enable_empty_checkbox) { ?>
									<div class="<?php echo esc_attr($inline_checkbox_class); ?>" style="display: none">
										<label>
											<input checked type="checkbox" value="" name="<?php echo esc_attr($name.'[]'); ?>">
										</label>
									</div>
								<?php } ?>
								<?php foreach($options as $option_key => $option_label) : ?>
									<?php
									$i = 1;
									$checked = is_array($saved_value) && in_array($option_key, $saved_value);
									$checked_attr = $checked ? 'checked' : '';
									?>

									<div class="<?php echo esc_attr($inline_checkbox_class); ?>">
										<label>
											<input <?php echo esc_attr($checked_attr); ?> type="checkbox" id="<?php echo esc_attr($option_key).'-'.$i; ?>" value="<?php echo esc_attr($option_key); ?>" name="<?php echo esc_attr($name.'[]'); ?>">
											<label for="<?php echo esc_attr($option_key).'-'.$i; ?>"><?php echo esc_html($option_label); ?></label>
										</label>
									</div>
									<?php $i++; endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->
		</div>
		<?php
	}
}

class KendallElatedFieldDate extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false ) {
		$col_width = 2;
		if(isset($args["col_width"]))
			$col_width = $args["col_width"];
		?>

		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<input type="text"
								id = "portfolio_date"
								class="datepicker form-control eltd-input eltd-form-element"
								name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"
							/></div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php
	}
}

class KendallElatedFieldFactory {

	public function render( $field_type, $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		switch ( strtolower( $field_type ) ) {

			case 'text':
				$field = new KendallElatedFieldText();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textsimple':
				$field = new KendallElatedFieldTextSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textarea':
				$field = new KendallElatedFieldTextArea();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textareasimple':
				$field = new KendallElatedFieldTextAreaSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'textareahtml':
				$field = new KendallElatedFieldTextAreaHtml();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'color':
				$field = new KendallElatedFieldColor();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'colorsimple':
				$field = new KendallElatedFieldColorSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'image':
				$field = new KendallElatedFieldImage();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'imagesimple':
				$field = new KendallElatedFieldImageSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'font':
				$field = new KendallElatedFieldFont();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'fontsimple':
				$field = new KendallElatedFieldFontSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'select':
				$field = new KendallElatedFieldSelect();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'selectblank':
				$field = new KendallElatedFieldSelectBlank();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'selectsimple':
				$field = new KendallElatedFieldSelectSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'selectblanksimple':
				$field = new KendallElatedFieldSelectBlankSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'yesno':
				$field = new KendallElatedFieldYesNo();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'yesnosimple':
				$field = new KendallElatedFieldYesNoSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'onoff':
				$field = new KendallElatedFieldOnOff();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'portfoliofollow':
				$field = new KendallElatedFieldPortfolioFollow();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'zeroone':
				$field = new KendallElatedFieldZeroOne();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'imagevideo':
				$field = new KendallElatedFieldImageVideo();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'yesempty':
				$field = new KendallElatedFieldYesEmpty();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagpost':
				$field = new KendallElatedFieldFlagPost();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagpage':
				$field = new KendallElatedFieldFlagPage();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagmedia':
				$field = new KendallElatedFieldFlagMedia();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagportfolio':
				$field = new KendallElatedFieldFlagPortfolio();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'flagproduct':
				$field = new KendallElatedFieldFlagProduct();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'range':
				$field = new KendallElatedFieldRange();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'rangesimple':
				$field = new KendallElatedFieldRangeSimple();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'radio':
				$field = new KendallElatedFieldRadio();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'checkbox':
				$field = new KendallElatedFieldCheckBox();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'date':
				$field = new KendallElatedFieldDate();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'radiogroup':
				$field = new KendallElatedFieldRadioGroup();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			case 'checkboxgroup':
				$field = new KendallElatedFieldCheckBoxGroup();
				$field->render( $name, $label, $description, $options, $args, $hidden, $repeat );
				break;
			default:
				break;
		}
	}
}

/*
   Class: KendallElatedMultipleImages
   A class that initializes Elated Multiple Images
*/
class KendallElatedMultipleImages implements iKendallElatedRender {
	private $name;
	private $label;
	private $description;


	function __construct($name,$label="",$description="") {
		global $kendall_elated_Framework;
		$this->name = $name;
		$this->label = $label;
		$this->description = $description;
		$kendall_elated_Framework->eltdMetaBoxes->addOption($this->name,"");
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltd-page-form-section">


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($this->label); ?></h4>

				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<ul class="eltd-gallery-images-holder clearfix">
								<?php
								$image_gallery_val = get_post_meta( $post->ID, $this->name , true );
								if($image_gallery_val!='' ) $image_gallery_array=explode(',',$image_gallery_val);

								if(isset($image_gallery_array) && count($image_gallery_array)!=0):

									foreach($image_gallery_array as $gimg_id):

										$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
										echo '<li class="eltd-gallery-image-holder"><img src="'.esc_url($gimage_wp[0]).'"/></li>';

									endforeach;

								endif;
								?>
							</ul>
							<input type="hidden" value="<?php echo esc_attr($image_gallery_val); ?>" id="<?php echo esc_attr( $this->name) ?>" name="<?php echo esc_attr( $this->name) ?>">
							<div class="eltd-gallery-uploader">
								<a class="eltd-gallery-upload-btn btn btn-sm btn-primary"
									href="javascript:void(0)"><?php esc_html_e('Upload', 'kendall'); ?></a>
								<a class="eltd-gallery-clear-btn btn btn-sm btn-default pull-right"
									href="javascript:void(0)"><?php esc_html_e('Remove All', 'kendall'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}
}

/*
   Class: KendallElatedImagesVideos
   A class that initializes Elated Images Videos
*/
class KendallElatedImagesVideos implements iKendallElatedRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>
		<div class="eltd_hidden_portfolio_images" style="display: none">
			<div class="eltd-page-form-section">


				<div class="eltd-field-desc">
					<h4><?php echo esc_html($this->label); ?></h4>

					<p><?php echo esc_html($this->description); ?></p>
				</div>
				<!-- close div.eltd-field-desc -->

				<div class="eltd-section-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-2">
								<em class="eltd-field-description">Order Number</em>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									id="portfolioimgordernumber_x"
									name="portfolioimgordernumber_x"
									placeholder=""/></div>
							<div class="col-lg-10">
								<em class="eltd-field-description">Image/Video title (only for gallery layout - Portfolio Style 6)</em>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									id="portfoliotitle_x"
									name="portfoliotitle_x"
									placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltd-field-description">Image</em>
								<div class="eltd-media-uploader">
									<div style="display: none"
										class="eltd-media-image-holder">
										<img src="" alt=""
											class="eltd-media-image img-thumbnail"/>
									</div>
									<div style="display: none"
										class="eltd-media-meta-fields">
										<input type="hidden" class="eltd-media-upload-url"
											name="portfolioimg_x"
											id="portfolioimg_x"/>
										<input type="hidden"
											class="eltd-media-upload-height"
											name="eltd_options_theme[media-upload][height]"
											value=""/>
										<input type="hidden"
											class="eltd-media-upload-width"
											name="eltd_options_theme[media-upload][width]"
											value=""/>
									</div>
									<a class="eltd-media-upload-btn btn btn-sm btn-primary"
										href="javascript:void(0)"
										data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
										data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
									<a style="display: none;" href="javascript: void(0)"
										class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-3">
								<em class="eltd-field-description"><?php esc_html_e('Video type','kendall') ?></em>
								<select class="form-control eltd-form-element eltd-portfoliovideotype"
									name="portfoliovideotype_x" id="portfoliovideotype_x">
									<option value=""></option>
									<option value="youtube"><?php esc_html_e('Youtube','kendall') ?></option>
									<option value="vimeo"><?php esc_html_e('Vimeo','kendall') ?></option>
									<option value="self"><?php esc_html_e('Self hosted','kendall') ?></option>
								</select>
							</div>
							<div class="col-lg-3">
								<em class="eltd-field-description"><?php esc_html_e('Video ID','kendall') ?></em>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									id="portfoliovideoid_x"
									name="portfoliovideoid_x"
									placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<em class="eltd-field-description"><?php esc_html_e('Video image','kendall') ?></em>
								<div class="eltd-media-uploader">
									<div style="display: none"
										class="eltd-media-image-holder">
										<img src="" alt=""
											class="eltd-media-image img-thumbnail"/>
									</div>
									<div style="display: none"
										class="eltd-media-meta-fields">
										<input type="hidden" class="eltd-media-upload-url"
											name="portfoliovideoimage_x"
											id="portfoliovideoimage_x"/>
										<input type="hidden"
											class="eltd-media-upload-height"
											name="eltd_options_theme[media-upload][height]"
											value=""/>
										<input type="hidden"
											class="eltd-media-upload-width"
											name="eltd_options_theme[media-upload][width]"
											value=""/>
									</div>
									<a class="eltd-media-upload-btn btn btn-sm btn-primary"
										href="javascript:void(0)"
										data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
										data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
									<a style="display: none;" href="javascript: void(0)"
										class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
								</div>
							</div>
						</div>
						<div class="row next-row">
							<div class="col-lg-4">
								<em class="eltd-field-description"><?php esc_html_e('Video webm','kendall') ?></em>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									id="portfoliovideowebm_x"
									name="portfoliovideowebm_x"
									placeholder=""/></div>
							<div class="col-lg-4">
								<em class="eltd-field-description"><?php esc_html_e('Video mp4','kendall') ?></em>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									id="portfoliovideomp4_x"
									name="portfoliovideomp4_x"
									placeholder=""/></div>
							<div class="col-lg-4">
								<em class="eltd-field-description"><?php esc_html_e('Video ogv','kendall') ?></em>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									id="portfoliovideoogv_x"
									name="portfoliovideoogv_x"
									placeholder=""/></div>
						</div>
						<div class="row next-row">
							<div class="col-lg-12">
								<a class="eltd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video','kendall') ?></a>
							</div>
						</div>



					</div>
				</div>
				<!-- close div.eltd-section-content -->

			</div>
		</div>

		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if (count($portfolio_images)>1) {
			usort($portfolio_images, "kendall_elated_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			?>
			<div class="eltd_portfolio_image" rel="<?php echo esc_attr($no); ?>" style="display: block;">

				<div class="eltd-page-form-section">


					<div class="eltd-field-desc">
						<h4><?php echo esc_html($this->label); ?></h4>

						<p><?php echo esc_html($this->description); ?></p>
					</div>
					<!-- close div.eltd-field-desc -->

					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<em class="eltd-field-description"><?php esc_html_e('Order Number', 'kendall') ?></em>
									<input type="text"
										class="form-control eltd-input eltd-form-element"
										id="portfolioimgordernumber_<?php echo esc_attr($no); ?>"
										name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>"
										placeholder=""/></div>
								<div class="col-lg-10">
									<em class="eltd-field-description"><?php esc_html_e('Image/Video title (only for gallery layout - Portfolio Style 6)', 'kendall') ?></em>
									<input type="text"
										class="form-control eltd-input eltd-form-element"
										id="portfoliotitle_<?php echo esc_attr($no); ?>"
										name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>"
										placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description">Image</em>
									<div class="eltd-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
											class="eltd-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(kendall_elated_generate_filename(stripslashes($portfolio_image['portfolioimg']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt=""
												class="eltd-media-image img-thumbnail"/>
										</div>
										<div style="display: none"
											class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url"
												name="portfolioimg[]"
												id="portfolioimg_<?php echo esc_attr($no); ?>"
												value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
											<input type="hidden"
												class="eltd-media-upload-height"
												name="eltd_options_theme[media-upload][height]"
												value=""/>
											<input type="hidden"
												class="eltd-media-upload-width"
												name="eltd_options_theme[media-upload][width]"
												value=""/>
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary"
											href="javascript:void(0)"
											data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
											data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
										<a style="display: none;" href="javascript: void(0)"
											class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-3">
									<em class="eltd-field-description">Video type</em>
									<select class="form-control eltd-form-element eltd-portfoliovideotype"
										name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
										<option value=""></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('Youtube','kendall') ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo','kendall') ?></option>
										<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self hosted','kendall') ?></option>
									</select>
								</div>
								<div class="col-lg-3">
									<em class="eltd-field-description">Video ID</em>
									<input type="text"
										class="form-control eltd-input eltd-form-element"
										id="portfoliovideoid_<?php echo esc_attr($no); ?>"
										name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
										placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description">Video image</em>
									<div class="eltd-media-uploader">
										<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
											class="eltd-media-image-holder">
											<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(kendall_elated_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt=""
												class="eltd-media-image img-thumbnail"/>
										</div>
										<div style="display: none"
											class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url"
												name="portfoliovideoimage[]"
												id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
												value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
											<input type="hidden"
												class="eltd-media-upload-height"
												name="eltd_options_theme[media-upload][height]"
												value=""/>
											<input type="hidden"
												class="eltd-media-upload-width"
												name="eltd_options_theme[media-upload][width]"
												value=""/>
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary"
											href="javascript:void(0)"
											data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
											data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
										<a style="display: none;" href="javascript: void(0)"
											class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
									</div>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-4">
									<em class="eltd-field-description">Video webm</em>
									<input type="text"
										class="form-control eltd-input eltd-form-element"
										id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
										name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm']) ? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
										placeholder=""/></div>
								<div class="col-lg-4">
									<em class="eltd-field-description">Video mp4</em>
									<input type="text"
										class="form-control eltd-input eltd-form-element"
										id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
										name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
										placeholder=""/></div>
								<div class="col-lg-4">
									<em class="eltd-field-description">Video ogv</em>
									<input type="text"
										class="form-control eltd-input eltd-form-element"
										id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
										name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])):""; ?>"
										placeholder=""/></div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<a class="eltd_remove_image btn btn-sm btn-primary" href="/" onclick="javascript: return false;"><?php esc_html_e('Remove portfolio image/video','kendall') ?></a>
								</div>
							</div>



						</div>
					</div>
					<!-- close div.eltd-section-content -->

				</div>
			</div>
			<?php
			$no++;
		}
		?>
		<br />
		<a class="eltd_add_image btn btn-sm btn-primary" onclick="javascript: return false;" href="/" ><?php esc_html_e('Add portfolio image/video','kendall') ?></a>
		<?php

	}
}


/*
   Class: KendallElatedImagesVideos
   A class that initializes Elated Images Videos
*/
class KendallElatedImagesVideosFramework implements iKendallElatedRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<!--Image hidden start-->
		<div class="eltd-hidden-portfolio-images"  style="display: none">
			<div class="eltd-portfolio-toggle-holder">
				<div class="eltd-portfolio-toggle eltd-toggle-desc">
					<span class="number">1</span><span class="eltd-toggle-inner"><?php esc_html_e('Image', 'kendall') ?> - <em><?php esc_html_e('(Order Number, Image Title)', 'kendall') ?></em></span>
				</div>
				<div class="eltd-portfolio-toggle eltd-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltd-portfolio-toggle-content">
				<div class="eltd-page-form-section">
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltd-media-uploader">
										<em class="eltd-field-description"><?php esc_html_e('Image', 'kendall') ?></em>
										<div style="display: none" class="eltd-media-image-holder">
											<img src="" alt="" class="eltd-media-image img-thumbnail">
										</div>
										<div  class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url" name="portfolioimg_x" id="portfolioimg_x">
											<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image"><?php esc_html_e('Upload', 'kendall') ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall') ?></a>
									</div>
								</div>
								<div class="col-lg-2">
									<em class="eltd-field-description"><?php esc_html_e('Order Number', 'kendall') ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
								</div>
								<div class="col-lg-8">
									<em class="eltd-field-description">Image Title (works only for Gallery portfolio type selected) </em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
								</div>
							</div>
							<input type="hidden" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
							<input type="hidden" name="portfoliovideotype_x" id="portfoliovideotype_x">
							<input type="hidden" name="portfoliovideoid_x" id="portfoliovideoid_x">
							<input type="hidden" name="portfoliovideowebm_x" id="portfoliovideowebm_x">
							<input type="hidden" name="portfoliovideomp4_x" id="portfoliovideomp4_x">
							<input type="hidden" name="portfoliovideoogv_x" id="portfoliovideoogv_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="image">

						</div><!-- close div.container-fluid -->
					</div><!-- close div.eltd-section-content -->
				</div>
			</div>
		</div>
		<!--Image hidden End-->

		<!--Video Hidden Start-->
		<div class="eltd-hidden-portfolio-videos"  style="display: none">
			<div class="eltd-portfolio-toggle-holder">
				<div class="eltd-portfolio-toggle eltd-toggle-desc">
					<span class="number">2</span><span class="eltd-toggle-inner"><?php esc_html_e('Video', 'kendall') ?> - <em><?php esc_html_e('(Order Number, Video Title)', 'kendall') ?></em></span>
				</div>
				<div class="eltd-portfolio-toggle eltd-portfolio-control">
					<span class="toggle-portfolio-media"><i class="fa fa-caret-up"></i></span> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltd-portfolio-toggle-content">
				<div class="eltd-page-form-section">
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">
								<div class="col-lg-2">
									<div class="eltd-media-uploader">
										<em class="eltd-field-description"><?php esc_html_e('Cover Video Image', 'kendall') ?> </em>
										<div style="display: none" class="eltd-media-image-holder">
											<img src="" alt="" class="eltd-media-image img-thumbnail">
										</div>
										<div style="display: none" class="eltd-media-meta-fields">
											<input type="hidden" class="eltd-media-upload-url" name="portfoliovideoimage_x" id="portfoliovideoimage_x">
											<input type="hidden" class="eltd-media-upload-height" name="eltd_options_theme[media-upload][height]" value="">
											<input type="hidden" class="eltd-media-upload-width" name="eltd_options_theme[media-upload][width]" value="">
										</div>
										<a class="eltd-media-upload-btn btn btn-sm btn-primary" href="javascript:void(0)" data-frame-title="Select Image" data-frame-button-text="Select Image"><?php esc_html_e('Upload', 'kendall') ?></a>
										<a style="display: none;" href="javascript: void(0)" class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall') ?></a>
									</div>
								</div>
								<div class="col-lg-10">
									<div class="row">
										<div class="col-lg-2">
											<em class="eltd-field-description"><?php esc_html_e('Order Number', 'kendall') ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" placeholder="">
										</div>
										<div class="col-lg-10">
											<em class="eltd-field-description">Video Title (works only for Gallery portfolio type selected)</em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliotitle_x" name="portfoliotitle_x" placeholder="">
										</div>
									</div>
									<div class="row next-row">
										<div class="col-lg-2">
											<em class="eltd-field-description"><?php esc_html_e('Video type', 'kendall') ?></em>
											<select class="form-control eltd-form-element eltd-portfoliovideotype" name="portfoliovideotype_x" id="portfoliovideotype_x">
												<option value=""></option>
												<option value="youtube"><?php esc_html_e('Youtube', 'kendall') ?></option>
												<option value="vimeo"><?php esc_html_e('Vimeo', 'kendall') ?></option>
												<option value="self"><?php esc_html_e('Self Hosted', 'kendall') ?></option>
											</select>
										</div>
										<div class="col-lg-2 eltd-video-id-holder">
											<em class="eltd-field-description" id="videoId"><?php esc_html_e('Video ID', 'kendall') ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideoid_x" name="portfoliovideoid_x" placeholder="">
										</div>
									</div>

									<div class="row next-row eltd-video-self-hosted-path-holder">
										<div class="col-lg-4">
											<em class="eltd-field-description"><?php esc_html_e('Video webm', 'kendall') ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideowebm_x" name="portfoliovideowebm_x" placeholder="">
										</div>
										<div class="col-lg-4">
											<em class="eltd-field-description"><?php esc_html_e('Video mp4', 'kendall') ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideomp4_x" name="portfoliovideomp4_x" placeholder="">
										</div>
										<div class="col-lg-4">
											<em class="eltd-field-description"><?php esc_html_e('Video ogv', 'kendall') ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliovideoogv_x" name="portfoliovideoogv_x" placeholder="">
										</div>
									</div>
								</div>

							</div>
							<input type="hidden" name="portfolioimg_x" id="portfolioimg_x">
							<input type="hidden" name="portfolioimgtype_x" id="portfolioimgtype_x" value="video">
						</div><!-- close div.container-fluid -->
					</div><!-- close div.eltd-section-content -->
				</div>
			</div>
		</div>
		<!--Video Hidden End-->


		<?php
		$no = 1;
		$portfolio_images = get_post_meta( $post->ID, 'eltd_portfolio_images', true );
		if (count($portfolio_images)>1) {
			usort($portfolio_images, "kendall_elated_compare_portfolio_videos");
		}
		while (isset($portfolio_images[$no-1])) {
			$portfolio_image = $portfolio_images[$no-1];
			if (isset($portfolio_image['portfolioimgtype']))
				$portfolio_img_type = $portfolio_image['portfolioimgtype'];
			else {
				if (stripslashes($portfolio_image['portfolioimg']) == true)
					$portfolio_img_type = "image";
				else
					$portfolio_img_type = "video";
			}
			if ($portfolio_img_type == "image") {
				?>

				<div class="eltd-portfolio-images eltd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="eltd-portfolio-toggle-holder">
						<div class="eltd-portfolio-toggle eltd-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="eltd-toggle-inner"><?php esc_html_e('Image', 'kendall') ?> - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?>)</em></span>
						</div>
						<div class="eltd-portfolio-toggle eltd-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a>
							<a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltd-portfolio-toggle-content" style="display: none">
						<div class="eltd-page-form-section">
							<div class="eltd-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="eltd-media-uploader">
												<em class="eltd-field-description"><?php esc_html_e('Image', 'kendall') ?></em>
												<div<?php if (stripslashes($portfolio_image['portfolioimg']) == false) { ?> style="display: none"<?php } ?>
													class="eltd-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfolioimg']) == true) { echo esc_url(kendall_elated_generate_filename(stripslashes($portfolio_image['portfolioimg']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt=""
														class="eltd-media-image img-thumbnail"/>
												</div>
												<div style="display: none"
													class="eltd-media-meta-fields">
													<input type="hidden" class="eltd-media-upload-url"
														name="portfolioimg[]"
														id="portfolioimg_<?php echo esc_attr($no); ?>"
														value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>"/>
													<input type="hidden"
														class="eltd-media-upload-height"
														name="eltd_options_theme[media-upload][height]"
														value=""/>
													<input type="hidden"
														class="eltd-media-upload-width"
														name="eltd_options_theme[media-upload][width]"
														value=""/>
												</div>
												<a class="eltd-media-upload-btn btn btn-sm btn-primary"
													href="javascript:void(0)"
													data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
													data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
												<a style="display: none;" href="javascript: void(0)"
													class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
											</div>
										</div>
										<div class="col-lg-2">
											<em class="eltd-field-description"><?php esc_html_e('Order Number', 'kendall') ?></em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" placeholder="">
										</div>
										<div class="col-lg-8">
											<em class="eltd-field-description"><?php esc_html_e('Image Title (works only for Gallery portfolio type selected)', 'kendall') ?> </em>
											<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" placeholder="">
										</div>
									</div>
									<input type="hidden" id="portfoliovideoimage_<?php echo esc_attr($no); ?>" name="portfoliovideoimage[]">
									<input type="hidden" id="portfoliovideotype_<?php echo esc_attr($no); ?>" name="portfoliovideotype[]">
									<input type="hidden" id="portfoliovideoid_<?php echo esc_attr($no); ?>" name="portfoliovideoid[]">
									<input type="hidden" id="portfoliovideowebm_<?php echo esc_attr($no); ?>" name="portfoliovideowebm[]">
									<input type="hidden" id="portfoliovideomp4_<?php echo esc_attr($no); ?>" name="portfoliovideomp4[]">
									<input type="hidden" id="portfoliovideoogv_<?php echo esc_attr($no); ?>" name="portfoliovideoogv[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="image">
								</div><!-- close div.container-fluid -->
							</div><!-- close div.eltd-section-content -->
						</div>
					</div>
				</div>

				<?php
			} else {
				?>
				<div class="eltd-portfolio-videos eltd-portfolio-media" rel="<?php echo esc_attr($no); ?>">
					<div class="eltd-portfolio-toggle-holder">
						<div class="eltd-portfolio-toggle eltd-toggle-desc">
							<span class="number"><?php echo esc_html($no); ?></span><span class="eltd-toggle-inner">Video - <em>(<?php echo stripslashes($portfolio_image['portfolioimgordernumber']); ?>, <?php echo stripslashes($portfolio_image['portfoliotitle']); ?></em>) </span>
						</div>
						<div class="eltd-portfolio-toggle eltd-portfolio-control">
							<a href="#" class="toggle-portfolio-media"><i class="fa fa-caret-down"></i></a> <a href="#" class="remove-portfolio-media"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="eltd-portfolio-toggle-content" style="display: none">
						<div class="eltd-page-form-section">
							<div class="eltd-section-content">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-2">
											<div class="eltd-media-uploader">
												<em class="eltd-field-description"><?php esc_html_e('Cover Video Image','kendall') ?></em>
												<div<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == false) { ?> style="display: none"<?php } ?>
													class="eltd-media-image-holder">
													<img src="<?php if (stripslashes($portfolio_image['portfoliovideoimage']) == true) { echo esc_url(kendall_elated_generate_filename(stripslashes($portfolio_image['portfoliovideoimage']),get_option( 'thumbnail' . '_size_w' ),get_option( 'thumbnail' . '_size_h' ))); } ?>" alt=""
														class="eltd-media-image img-thumbnail"/>
												</div>
												<div style="display: none"
													class="eltd-media-meta-fields">
													<input type="hidden" class="eltd-media-upload-url"
														name="portfoliovideoimage[]"
														id="portfoliovideoimage_<?php echo esc_attr($no); ?>"
														value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>"/>
													<input type="hidden"
														class="eltd-media-upload-height"
														name="eltd_options_theme[media-upload][height]"
														value=""/>
													<input type="hidden"
														class="eltd-media-upload-width"
														name="eltd_options_theme[media-upload][width]"
														value=""/>
												</div>
												<a class="eltd-media-upload-btn btn btn-sm btn-primary"
													href="javascript:void(0)"
													data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
													data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
												<a style="display: none;" href="javascript: void(0)"
													class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
											</div>
										</div>
										<div class="col-lg-10">
											<div class="row">
												<div class="col-lg-2">
													<em class="eltd-field-description"><?php esc_html_e('Order Number', 'kendall'); ?></em>
													<input type="text" class="form-control eltd-input eltd-form-element" id="portfolioimgordernumber_<?php echo esc_attr($no); ?>" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber']) ? esc_attr(stripslashes($portfolio_image['portfolioimgordernumber'])) : ""; ?>" placeholder="">
												</div>
												<div class="col-lg-10">
													<em class="eltd-field-description"><?php esc_html_e('Video Title (works only for Gallery portfolio type selected)','kendall') ?></em>
													<input type="text" class="form-control eltd-input eltd-form-element" id="portfoliotitle_<?php echo esc_attr($no); ?>" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle']) ? esc_attr(stripslashes($portfolio_image['portfoliotitle'])) : ""; ?>" placeholder="">
												</div>
											</div>
											<div class="row next-row">
												<div class="col-lg-2">
													<em class="eltd-field-description"><?php esc_html_e('Video Type','kendall') ?></em>
													<select class="form-control eltd-form-element eltd-portfoliovideotype"
														name="portfoliovideotype[]" id="portfoliovideotype_<?php echo esc_attr($no); ?>">
														<option value=""></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "youtube") { echo "selected='selected'"; } ?>  value="youtube"><?php esc_html_e('Youtube','kendall') ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "vimeo") { echo "selected='selected'"; } ?>  value="vimeo"><?php esc_html_e('Vimeo','kendall') ?></option>
														<option <?php if ($portfolio_image['portfoliovideotype'] == "self") { echo "selected='selected'"; } ?>  value="self"><?php esc_html_e('Self hosted','kendall') ?></option>
													</select>
												</div>
												<div class="col-lg-2 eltd-video-id-holder">
													<em class="eltd-field-description"><?php esc_html_e('Video ID','kendall') ?></em>
													<input type="text"
														class="form-control eltd-input eltd-form-element"
														id="portfoliovideoid_<?php echo esc_attr($no); ?>"
														name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoid'])) : ""; ?>"
														placeholder=""/>
												</div>
											</div>

											<div class="row next-row eltd-video-self-hosted-path-holder">
												<div class="col-lg-4">
													<em class="eltd-field-description"><?php esc_html_e('Video webm','kendall') ?></em>
													<input type="text"
														class="form-control eltd-input eltd-form-element"
														id="portfoliovideowebm_<?php echo esc_attr($no); ?>"
														name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm'])? esc_attr(stripslashes($portfolio_image['portfoliovideowebm'])) : ""; ?>"
														placeholder=""/></div>
												<div class="col-lg-4">
													<em class="eltd-field-description"><?php esc_html_e('Video mp4','kendall') ?></em>
													<input type="text"
														class="form-control eltd-input eltd-form-element"
														id="portfoliovideomp4_<?php echo esc_attr($no); ?>"
														name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4']) ? esc_attr(stripslashes($portfolio_image['portfoliovideomp4'])) : ""; ?>"
														placeholder=""/></div>
												<div class="col-lg-4">
													<em class="eltd-field-description"><?php esc_html_e('Video ogv','kendall') ?></em>
													<input type="text"
														class="form-control eltd-input eltd-form-element"
														id="portfoliovideoogv_<?php echo esc_attr($no); ?>"
														name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv']) ? esc_attr(stripslashes($portfolio_image['portfoliovideoogv'])) : ""; ?>"
														placeholder=""/></div>
											</div>
										</div>

									</div>
									<input type="hidden" id="portfolioimg_<?php echo esc_attr($no); ?>" name="portfolioimg[]">
									<input type="hidden" id="portfolioimgtype_<?php echo esc_attr($no); ?>" name="portfolioimgtype[]" value="video">
								</div><!-- close div.container-fluid -->
							</div><!-- close div.eltd-section-content -->
						</div>
					</div>
				</div>
				<?php
			}
			$no++;
		}
		?>

		<div class="eltd-portfolio-add">
			<a class="eltd-add-image btn btn-sm btn-primary" href="#"><i class="fa fa-camera"></i><?php esc_html_e('Add Image','kendall') ?></a>
			<a class="eltd-add-video btn btn-sm btn-primary" href="#"><i class="fa fa-video-camera"></i><?php esc_html_e('Add Video','kendall') ?></a>

			<a class="eltd-toggle-all-media btn btn-sm btn-default pull-right" href="#"><?php esc_html_e('Expand All','kendall') ?> </a>
			<?php /* <a class="eltd-remove-last-row-media btn btn-sm btn-default pull-right" href="#"> Remove last row</a> */ ?>
		</div>
		<?php

	}
}

class KendallElatedTwitterFramework implements  iKendallElatedRender {
	public function render($factory) {
		$twitterApi = ElatedTwitterApi::getInstance();
		$message = '';

		if(!empty($_GET['oauth_token']) && !empty($_GET['oauth_verifier'])) {
			if(!empty($_GET['oauth_token'])) {
				update_option($twitterApi::AUTHORIZE_TOKEN_FIELD, $_GET['oauth_token']);
			}

			if(!empty($_GET['oauth_verifier'])) {
				update_option($twitterApi::AUTHORIZE_VERIFIER_FIELD, $_GET['oauth_verifier']);
			}

			$responseObj = $twitterApi->obtainAccessToken();
			if($responseObj->status) {
				$message = esc_html__('You have successfully connected with your Twitter account. If you have any issues fetching data from Twitter try reconnecting.', 'kendall');
			} else {
				$message = $responseObj->message;
			}
		}

		$buttonText = $twitterApi->hasUserConnected() ? esc_html__('Re-connect with Twitter', 'kendall') : esc_html__('Connect with Twitter', 'kendall');
		?>
		<?php if($message !== '') { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html($message); ?></span>
			</div>
		<?php } ?>
		<div class="eltd-page-form-section" id="eltd_enable_social_share">

			<div class="eltd-field-desc">
				<h4><?php esc_html_e('Connect with Twitter', 'kendall'); ?></h4>

				<p><?php esc_html_e('Connecting with Twitter will enable you to show your latest tweets on your site', 'kendall'); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a id="eltd-tw-request-token-btn" class="btn btn-primary" href="#"><?php echo esc_html($buttonText); ?></a>
							<input type="hidden" data-name="current-page-url" value="<?php echo esc_url($twitterApi->buildCurrentPageURI()); ?>"/>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
	<?php }
}

class KendallElatedInstagramFramework implements  iKendallElatedRender {
	public function render($factory) {
		$instagram_api = ElatedInstagramApi::getInstance();
		$message = '';

		//if code wasn't saved to database
		if(!get_option('eltd_instagram_code')) {
			//check if code parameter is set in URL. That means that user has connected with Instagram
			if(!empty($_GET['code'])) {
				//update code option so we can use it later
				$instagram_api->storeCode();
				$instagram_api->getAccessToken();
				$message = esc_html__('You have successfully connected with your Instagram account. If you have any issues fetching data from Instagram try reconnecting.', 'kendall');

			} else {
				$instagram_api->storeCodeRequestURI();
			}
		}

		$buttonText = $instagram_api->hasUserConnected() ? esc_html__('Re-connect with Instagram', 'kendall') : esc_html__('Connect with Instagram', 'kendall');

		?>
		<?php if($message !== '') { ?>
			<div class="alert alert-success" style="margin-top: 20px;">
				<span><?php echo esc_html($message); ?></span>
			</div>
		<?php } ?>
		<div class="eltd-page-form-section" id="edgtf_enable_social_share">

			<div class="eltd-field-desc">
				<h4><?php esc_html_e('Connect with Instagram', 'kendall'); ?></h4>

				<p><?php esc_html_e('Connecting with Instagram will enable you to show your latest photos on your site', 'kendall'); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<a class="btn btn-primary" href="<?php echo esc_url($instagram_api->getAuthorizeUrl()); ?>"><?php echo esc_html($buttonText); ?></a>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
	<?php }
}

/*
   Class: KendallElatedImagesVideos
   A class that initializes Elated Images Videos
*/
class KendallElatedOptionsFramework implements iKendallElatedRender {
	private $label;
	private $description;


	function __construct($label="",$description="") {
		$this->label = $label;
		$this->description = $description;
	}

	public function render($factory) {
		global $post;
		?>

		<div class="eltd-portfolio-additional-item-holder" style="display: none">
			<div class="eltd-portfolio-toggle-holder">
				<div class="eltd-portfolio-toggle eltd-toggle-desc">
					<span class="number">1</span><span class="eltd-toggle-inner"><?php esc_html_e('Additional Sidebar Item','kendall') ?> <em><?php esc_html_e('(Order Number, Item Title)','kendall') ?></em></span>
				</div>
				<div class="eltd-portfolio-toggle eltd-portfolio-control">
					<span class="toggle-portfolio-item"><i class="fa fa-caret-up"></i></span>
					<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="eltd-portfolio-toggle-content">
				<div class="eltd-page-form-section">
					<div class="eltd-section-content">
						<div class="container-fluid">
							<div class="row">

								<div class="col-lg-2">
									<em class="eltd-field-description"><?php esc_html_e('Order Number','kendall') ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="optionlabelordernumber_x" name="optionlabelordernumber_x" placeholder="">
								</div>
								<div class="col-lg-10">
									<em class="eltd-field-description"><?php esc_html_e('Item Title','kendall') ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="optionLabel_x" name="optionLabel_x" placeholder="">
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description"><?php esc_html_e('Item Text','kendall') ?></em>
									<textarea class="form-control eltd-input eltd-form-element" id="optionValue_x" name="optionValue_x" placeholder=""></textarea>
								</div>
							</div>
							<div class="row next-row">
								<div class="col-lg-12">
									<em class="eltd-field-description"><?php esc_html_e('Enter Full URL for Item Text Link','kendall') ?></em>
									<input type="text" class="form-control eltd-input eltd-form-element" id="optionUrl_x" name="optionUrl_x" placeholder="">
								</div>
							</div>
						</div><!-- close div.eltd-section-content -->
					</div><!-- close div.container-fluid -->
				</div>
			</div>
		</div>
		<?php
		$no = 1;
		$portfolios = get_post_meta( $post->ID, 'eltd_portfolios', true );
		if (count($portfolios)>1) {
			usort($portfolios, "kendall_elated_compare_portfolio_options");
		}
		while (isset($portfolios[$no-1])) {
			$portfolio = $portfolios[$no-1];
			?>
			<div class="eltd-portfolio-additional-item" rel="<?php echo esc_attr($no); ?>">
				<div class="eltd-portfolio-toggle-holder">
					<div class="eltd-portfolio-toggle eltd-toggle-desc">
						<span class="number"><?php echo esc_html($no); ?></span><span class="eltd-toggle-inner"><?php esc_html_e('Additional Sidebar Item', 'kendall') ?> - <em>(<?php echo stripslashes($portfolio['optionlabelordernumber']); ?>, <?php echo stripslashes($portfolio['optionLabel']); ?>)</em></span>
					</div>
					<div class="eltd-portfolio-toggle eltd-portfolio-control">
						<span class="toggle-portfolio-item"><i class="fa fa-caret-down"></i></span>
						<a href="#" class="remove-portfolio-item"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="eltd-portfolio-toggle-content" style="display: none">
					<div class="eltd-page-form-section">
						<div class="eltd-section-content">
							<div class="container-fluid">
								<div class="row">

									<div class="col-lg-2">
										<em class="eltd-field-description"><?php esc_html_e('Order Number' ,'kendall') ?></em>
										<input type="text" class="form-control eltd-input eltd-form-element" id="optionlabelordernumber_<?php echo esc_attr($no); ?>" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber']) ? esc_attr(stripslashes($portfolio['optionlabelordernumber'])) : ""; ?>" placeholder="">
									</div>
									<div class="col-lg-10">
										<em class="eltd-field-description"><?php esc_html_e('Item Title' ,'kendall') ?> </em>
										<input type="text" class="form-control eltd-input eltd-form-element" id="optionLabel_<?php echo esc_attr($no); ?>" name="optionLabel[]" value="<?php echo esc_attr(stripslashes($portfolio['optionLabel'])); ?>" placeholder="">
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="eltd-field-description"><?php esc_html_e('Item Text' ,'kendall') ?></em>
										<textarea class="form-control eltd-input eltd-form-element" id="optionValue_<?php echo esc_attr($no); ?>" name="optionValue[]" placeholder=""><?php echo esc_attr(stripslashes($portfolio['optionValue'])); ?></textarea>
									</div>
								</div>
								<div class="row next-row">
									<div class="col-lg-12">
										<em class="eltd-field-description"><?php esc_html_e('Enter Full URL for Item Text Link' ,'kendall') ?></em>
										<input type="text" class="form-control eltd-input eltd-form-element" id="optionUrl_<?php echo esc_attr($no); ?>" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>" placeholder="">
									</div>
								</div>
							</div><!-- close div.eltd-section-content -->
						</div><!-- close div.container-fluid -->
					</div>
				</div>
			</div>
			<?php
			$no++;
		}
		?>

		<div class="eltd-portfolio-add">
			<a class="eltd-add-item btn btn-sm btn-primary" href="#"><?php esc_html_e('Add New Item', 'kendall') ?></a>
			<a class="eltd-toggle-all-item btn btn-sm btn-default pull-right" href="#"><?php esc_html_e(' Expand All', 'kendall') ?></a>
		</div>


		<?php

	}
}