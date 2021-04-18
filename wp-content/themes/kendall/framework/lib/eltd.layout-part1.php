<?php

/*
   Interface: iKendallElatedLayoutNode
   A interface that implements Layout Node methods
*/
interface iKendallElatedLayoutNode
{
	public function hasChidren();
	public function getChild($key);
	public function addChild($key, $value);
}

/*
   Interface: iKendallElatedRender
   A interface that implements Render methods
*/
interface iKendallElatedRender
{
	public function render($factory);
}

/*
   Class: KendallElatedPanel
   A class that initializes Elated Panel
*/
class KendallElatedPanel implements iKendallElatedLayoutNode, iKendallElatedRender {

	public $children;
	public $title;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (kendall_elated_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (kendall_elated_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div class="eltd-page-form-section-holder" id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<h3 class="eltd-page-section-title"><?php echo esc_html($this->title); ?></h3>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
		<?php
	}

	public function renderChild(iKendallElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: KendallElatedContainer
   A class that initializes Elated Container
*/
class KendallElatedContainer implements iKendallElatedLayoutNode, iKendallElatedRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (kendall_elated_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (kendall_elated_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div class="eltd-page-form-container-holder" id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
		<?php
	}

	public function renderChild(iKendallElatedRender $child, $factory) {
		$child->render($factory);
	}
}


/*
   Class: KendallElatedContainerNoStyle
   A class that initializes Elated Container without css classes
*/
class KendallElatedContainerNoStyle implements iKendallElatedLayoutNode, iKendallElatedRender {

	public $children;
	public $name;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($name="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (kendall_elated_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (kendall_elated_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>
		<div id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
		<?php
	}

	public function renderChild(iKendallElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: KendallElatedGroup
   A class that initializes Elated Group
*/
class KendallElatedGroup implements iKendallElatedLayoutNode, iKendallElatedRender {

	public $children;
	public $title;
	public $description;

	function __construct($title="",$description="") {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		?>

		<div class="eltd-page-form-section">


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>

				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<?php
					foreach ($this->children as $child) {
						$this->renderChild($child, $factory);
					}
					?>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php
	}

	public function renderChild(iKendallElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: KendallElatedNotice
   A class that initializes Elated Notice
*/
class KendallElatedNotice implements iKendallElatedRender {

	public $children;
	public $title;
	public $description;
	public $notice;
	public $hidden_property;
	public $hidden_value;
	public $hidden_values;

	function __construct($title="",$description="",$notice="",$hidden_property="",$hidden_value="",$hidden_values=array()) {
		$this->children = array();
		$this->title = $title;
		$this->description = $description;
		$this->notice = $notice;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
		$this->hidden_values = $hidden_values;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (kendall_elated_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
			else {
				foreach ($this->hidden_values as $value) {
					if (kendall_elated_option_get_value($this->hidden_property)==$value)
						$hidden = true;

				}
			}
		}
		?>

		<div class="eltd-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($this->title); ?></h4>

				<p><?php echo esc_html($this->description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="alert alert-warning">
						<?php echo esc_html($this->notice); ?>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php
	}
}

/*
   Class: KendallElatedRow
   A class that initializes Elated Row
*/
class KendallElatedRow implements iKendallElatedLayoutNode, iKendallElatedRender {

	public $children;
	public $next;

	function __construct($next=false) {
		$this->children = array();
		$this->next = $next;
	}

	public function hasChidren() {
		return (count($this->children) > 0)?true:false;
	}

	public function getChild($key) {
		return $this->children[$key];
	}

	public function addChild($key, $value) {
		$this->children[$key] = $value;
	}

	public function render($factory) {
		?>
		<div class="row<?php if ($this->next) echo " next-row"; ?>">
			<?php
			foreach ($this->children as $child) {
				$this->renderChild($child, $factory);
			}
			?>
		</div>
		<?php
	}

	public function renderChild(iKendallElatedRender $child, $factory) {
		$child->render($factory);
	}
}

/*
   Class: KendallElatedTitle
   A class that initializes Elated Title
*/
class KendallElatedTitle implements iKendallElatedRender {
	private $name;
	private $title;
	public $hidden_property;
	public $hidden_values = array();

	function __construct($name="",$title="",$hidden_property="",$hidden_value="") {
		$this->title = $title;
		$this->name = $name;
		$this->hidden_property = $hidden_property;
		$this->hidden_value = $hidden_value;
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			if (kendall_elated_option_get_value($this->hidden_property)==$this->hidden_value)
				$hidden = true;
		}
		?>
		<h5 class="eltd-page-section-subtitle" id="eltd_<?php echo esc_attr($this->name); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>><?php echo esc_html($this->title); ?></h5>
		<?php
	}
}

/*
   Class: KendallElatedField
   A class that initializes Elated Field
*/
class KendallElatedField implements iKendallElatedRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $kendall_elated_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$kendall_elated_Framework->eltdOptions->addOption($this->name,$this->default_value, $type);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (kendall_elated_option_get_value($this->hidden_property)==$value)
					$hidden = true;

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

/*
   Class: KendallElatedMetaField
   A class that initializes Elated Meta Field
*/
class KendallElatedMetaField implements iKendallElatedRender {
	private $type;
	private $name;
	private $default_value;
	private $label;
	private $description;
	private $options = array();
	private $args = array();
	public $hidden_property;
	public $hidden_values = array();


	function __construct($type,$name,$default_value="",$label="",$description="", $options = array(), $args = array(),$hidden_property="", $hidden_values = array()) {
		global $kendall_elated_Framework;
		$this->type = $type;
		$this->name = $name;
		$this->default_value = $default_value;
		$this->label = $label;
		$this->description = $description;
		$this->options = $options;
		$this->args = $args;
		$this->hidden_property = $hidden_property;
		$this->hidden_values = $hidden_values;
		$kendall_elated_Framework->eltdMetaBoxes->addOption($this->name,$this->default_value);
	}

	public function render($factory) {
		$hidden = false;
		if (!empty($this->hidden_property)){
			foreach ($this->hidden_values as $value) {
				if (kendall_elated_option_get_value($this->hidden_property)==$value)
					$hidden = true;

			}
		}
		$factory->render( $this->type, $this->name, $this->label, $this->description, $this->options, $this->args, $hidden );
	}
}

abstract class KendallElatedFieldType {

	abstract public function render( $name, $label="",$description="", $options = array(), $args = array(), $hidden = false );

}

class KendallElatedFieldText extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$col_width = 12;
		if (isset($args["col_width"])) {
			$col_width = $args["col_width"];
		}

		$suffix = !empty($args['suffix']) ? $args['suffix'] : false;

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$value = kendall_elated_option_get_value($name);
		}

		?>

		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-<?php echo esc_attr($col_width); ?>">
							<?php if($suffix) : ?>
							<div class="input-group">
								<?php endif; ?>
								<input type="text"
									class="form-control eltd-input eltd-form-element"
									name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"
									placeholder=""/>
								<?php if($suffix) : ?>
									<div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
								<?php endif; ?>
								<?php if($suffix) : ?>
							</div>
						<?php endif; ?>

						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldTextSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$suffix = !empty($args['suffix']) ? $args['suffix'] : false;
		$class = '';

		if (!empty($repeat)) {
			$id = str_replace(array('[',']'),'',$name) . '-' .rand();
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$value = kendall_elated_option_get_value($name);
		}

		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<?php if($suffix) : ?>
			<div class="input-group">
				<?php endif; ?>
				<input type="text"
					class="form-control eltd-input eltd-form-element"
					name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(htmlspecialchars($value)); ?>"
					placeholder=""/>
				<?php if($suffix) : ?>
					<div class="input-group-addon"><?php echo esc_html($args['suffix']); ?></div>
				<?php endif; ?>
				<?php if($suffix) : ?>
			</div>
		<?php endif; ?>
		</div>
		<?php

	}

}

class KendallElatedFieldTextArea extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$value = kendall_elated_option_get_value($name);
		}

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
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<textarea class="form-control eltd-form-element"
								name="<?php echo esc_attr($name); ?>"
								rows="5"><?php echo esc_html(htmlspecialchars($value)); ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}
class KendallElatedFieldTextAreaHtml extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$value = kendall_elated_option_get_value($name);
		}

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
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<?php wp_editor( $value, esc_attr($name) ); ?>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldTextAreaSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$value = kendall_elated_option_get_value($name);
		}

		?>

		<div class="col-lg-3 <?php echo esc_attr($class); ?>">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<textarea class="form-control eltd-form-element"
				name="<?php echo esc_attr($name); ?>"
				rows="5"><?php echo esc_html($value); ?></textarea>
		</div>
		<?php

	}

}

class KendallElatedFieldColor extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$value = kendall_elated_option_get_value($name);
		}

		?>

		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>">


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->

			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" class="my-color-field"/>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldColorSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$value = kendall_elated_option_get_value($name);
		}

		?>

		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<input type="text" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($value); ?>" class="my-color-field"/>
		</div>
		<?php

	}

}

class KendallElatedFieldImage extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
			$has_value = empty($value)?false:true;
		} else {
			$value = kendall_elated_option_get_value($name);
			$has_value = kendall_elated_option_has_value($name);
		}

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
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<div class="eltd-media-uploader">
								<div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
									class="eltd-media-image-holder">
									<img src="<?php if ($has_value) { echo esc_url(kendall_elated_get_attachment_thumb_url($value)); } ?>" alt=""
										class="eltd-media-image img-thumbnail"/>
								</div>
								<div style="display: none"
									class="eltd-media-meta-fields">
									<input type="hidden" class="eltd-media-upload-url"
										name="<?php echo esc_attr($name); ?>"
										value="<?php echo esc_attr($value); ?>"/>
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
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldImageSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
			$has_value = empty($value)?false:true;
		} else {
			$id = $name;
			$value = kendall_elated_option_get_value($name);
			$has_value = kendall_elated_option_has_value($name);
		}

		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>"<?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<div class="eltd-media-uploader">
				<div<?php if (!$has_value) { ?> style="display: none"<?php } ?>
					class="eltd-media-image-holder">
					<img src="<?php if ($has_value) { echo esc_url(kendall_elated_get_attachment_thumb_url($value)); } ?>" alt=""
						class="eltd-media-image img-thumbnail"/>
				</div>
				<div style="display: none"
					class="eltd-media-meta-fields">
					<input type="hidden" class="eltd-media-upload-url"
						name="<?php echo esc_attr($name); ?>"
						value="<?php echo esc_attr($value); ?>"/>
				</div>
				<a class="eltd-media-upload-btn btn btn-sm btn-primary"
					href="javascript:void(0)"
					data-frame-title="<?php esc_html_e('Select Image', 'kendall'); ?>"
					data-frame-button-text="<?php esc_html_e('Select Image', 'kendall'); ?>"><?php esc_html_e('Upload', 'kendall'); ?></a>
				<a style="display: none;" href="javascript: void(0)"
					class="eltd-media-remove-btn btn btn-default btn-sm"><?php esc_html_e('Remove', 'kendall'); ?></a>
			</div>
		</div>
		<?php

	}

}

class KendallElatedFieldFont extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $kendall_elated_fonts_array;

		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$value = kendall_elated_option_get_value($name);
		}
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
						<div class="col-lg-3 <?php echo esc_attr($class); ?>">
							<select class="form-control eltd-form-element"
								name="<?php echo esc_attr($name); ?>">
								<option value="-1"><?php esc_html_e('Default', 'kendall') ?></option>
								<?php foreach($kendall_elated_fonts_array as $fontArray) { ?>
									<option <?php if ($value == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldFontSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {
		global $kendall_elated_fonts_array;

		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$value = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$value = kendall_elated_option_get_value($name);
		}
		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<select class="form-control eltd-form-element"
				name="<?php echo esc_attr($name); ?>">
				<option value="-1"><?php esc_html_e('Default','kendall') ?></option>
				<?php foreach($kendall_elated_fonts_array as $fontArray) { ?>
					<option <?php if ($value == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr(str_replace(' ', '+', $fontArray["family"])); ?>"><?php echo esc_html($fontArray["family"]); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php

	}

}

class KendallElatedFieldSelect extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$rvalue = kendall_elated_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="eltd-page-form-section <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($id); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->



			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								name="<?php echo esc_attr($name); ?>">
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldSelectBlank extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$rvalue = kendall_elated_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>

		<div class="eltd-page-form-section"<?php if ($hidden) { ?> style="display: none"<?php } ?>>


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->



			<div class="eltd-section-content <?php echo esc_attr($class); ?>">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
							<select class="form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
								<?php foreach($show as $key=>$value) { ?>
									data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								<?php foreach($hide as $key=>$value) { ?>
									data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
								<?php } ?>
								name="<?php echo esc_attr($name); ?>">
								<option <?php if ($rvalue == "") { echo "selected='selected'"; } ?>  value=""></option>
								<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
									<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<!-- close div.eltd-section-content -->

		</div>
		<?php

	}

}

class KendallElatedFieldSelectSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';
		if (!empty($repeat)) {
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$rvalue = kendall_elated_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>" id="eltd_<?php echo esc_attr($name); ?>" <?php if ($hidden) { ?> style="display: none"<?php } ?>>
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<select class="form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
				<?php foreach($show as $key=>$value) { ?>
					data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
				<?php } ?>
				<?php foreach($hide as $key=>$value) { ?>
					data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
				<?php } ?>
				name="<?php echo esc_attr($name); ?>">
				<option <?php if ($rvalue == "") { echo "selected='selected'"; } ?>  value=""></option>
				<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
					<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php

	}

}

class KendallElatedFieldSelectBlankSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';
		if (!empty($repeat)) {
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$rvalue = kendall_elated_option_get_value($name);
		}

		$dependence = false;
		if(isset($args["dependence"]))
			$dependence = true;
		$show = array();
		if(isset($args["show"]))
			$show = $args["show"];
		$hide = array();
		if(isset($args["hide"]))
			$hide = $args["hide"];
		?>


		<div class="col-lg-3 <?php echo esc_attr($class); ?>">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<select class="form-control eltd-form-element<?php if ($dependence) { echo " dependence"; } ?>"
				<?php foreach($show as $key=>$value) { ?>
					data-show-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
				<?php } ?>
				<?php foreach($hide as $key=>$value) { ?>
					data-hide-<?php echo str_replace(' ', '',$key); ?>="<?php echo esc_attr($value); ?>"
				<?php } ?>
				name="<?php echo esc_attr($name); ?>">
				<option <?php if ($rvalue == "") { echo "selected='selected'"; } ?>  value=""></option>
				<?php foreach($options as $key=>$value) { if ($key == "-1") $key = ""; ?>
					<option <?php if ($rvalue == $key) { echo "selected='selected'"; } ?>  value="<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></option>
				<?php } ?>
			</select>
		</div>
		<?php

	}

}

class KendallElatedFieldYesNo extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat = array() ) {

		$class = '';

		if (!empty($repeat)) {
			$id = $name . '-' . $repeat['index'];
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$id = $name;
			$rvalue = kendall_elated_option_get_value($name);
		}

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

		<div class="eltd-page-form-section" id="eltd_<?php echo esc_attr($id); ?>">


			<div class="eltd-field-desc">
				<h4><?php echo esc_html($label); ?></h4>

				<p><?php echo esc_html($description); ?></p>
			</div>
			<!-- close div.eltd-field-desc -->



			<div class="eltd-section-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12 <?php echo esc_attr($class); ?>">
							<p class="field switch">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if ($rvalue == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if ($rvalue == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if ($rvalue == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
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

class KendallElatedFieldYesNoSimple extends KendallElatedFieldType {

	public function render( $name, $label="", $description="", $options = array(), $args = array(), $hidden = false, $repeat =  array() ) {

		$class = '';

		if (!empty($repeat)) {
			$name .= '[]';
			$rvalue = $repeat['value'];
			$class = 'eltd-repeater-field';
		} else {
			$rvalue = kendall_elated_option_get_value($name);
		}

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

		<div class="col-lg-3 <?php echo esc_attr($class); ?>">
			<em class="eltd-field-description"><?php echo esc_html($label); ?></em>
			<p class="field switch">
				<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
					class="cb-enable<?php if ($rvalue == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
				<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
					class="cb-disable<?php if ($rvalue == "no") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
				<input type="checkbox" id="checkbox" class="checkbox"
					name="<?php echo esc_attr($name); ?>_yesno" value="yes"<?php if ($rvalue == "yes") { echo " selected"; } ?>/>
				<input type="hidden" class="checkboxhidden_yesno" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr($rvalue); ?>"/>
			</p>
		</div>
		<?php

	}
}

class KendallElatedFieldOnOff extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "on") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('On', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "off") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Off', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_onoff" value="on"<?php if (kendall_elated_option_get_value($name) == "on") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_onoff" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldPortfolioFollow extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "portfolio_single_no_follow") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_portfoliofollow" value="portfolio_single_follow"<?php if (kendall_elated_option_get_value($name) == "portfolio_single_follow") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_portfoliofollow" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldZeroOne extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "1") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "0") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_zeroone" value="1"<?php if (kendall_elated_option_get_value($name) == "1") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_zeroone" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldImageVideo extends KendallElatedFieldType {

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
							<p class="field switch switch-type">
								<label data-hide="<?php echo esc_attr($dependence_hide_on_yes); ?>" data-show="<?php echo esc_attr($dependence_show_on_yes); ?>"
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "image") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Image', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "video") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Video', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_imagevideo" value="image"<?php if (kendall_elated_option_get_value($name) == "image") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_imagevideo" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldYesEmpty extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "yes") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_yesempty" value="yes"<?php if (kendall_elated_option_get_value($name) == "yes") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_yesempty" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldFlagPage extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagpage" value="page"<?php if (kendall_elated_option_get_value($name) == "page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpage" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldFlagPost extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "post") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagpost" value="post"<?php if (kendall_elated_option_get_value($name) == "post") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagpost" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldFlagMedia extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "attachment") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagmedia" value="attachment"<?php if (kendall_elated_option_get_value($name) == "attachment") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagmedia" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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

class KendallElatedFieldFlagPortfolio extends KendallElatedFieldType {

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
									class="cb-enable<?php if (kendall_elated_option_get_value($name) == "portfolio_page") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('Yes', 'kendall') ?></span></label>
								<label data-hide="<?php echo esc_attr($dependence_show_on_yes); ?>" data-show="<?php echo esc_attr($dependence_hide_on_yes); ?>"
									class="cb-disable<?php if (kendall_elated_option_get_value($name) == "") { echo " selected"; } ?><?php if ($dependence) { echo " dependence"; } ?>"><span><?php esc_html_e('No', 'kendall') ?></span></label>
								<input type="checkbox" id="checkbox" class="checkbox"
									name="<?php echo esc_attr($name); ?>_flagportfolio" value="portfolio_page"<?php if (kendall_elated_option_get_value($name) == "portfolio_page") { echo " selected"; } ?>/>
								<input type="hidden" class="checkboxhidden_flagportfolio" name="<?php echo esc_attr($name); ?>" value="<?php echo esc_attr(kendall_elated_option_get_value($name)); ?>"/>
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