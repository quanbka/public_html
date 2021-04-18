<?php
if(isset($post_id)){
	$id = $post_id;
}else{
	$id = get_the_ID();
}
$post = get_post($id);
$author_id = $post->post_author;

$author_info_box = esc_attr(kendall_elated_options()->getOptionValue('blog_author_info'));
$author_info_email = esc_attr(kendall_elated_options()->getOptionValue('blog_author_info_email'));
$social_networks = false;
$author_bio_info = get_the_author_meta('description', $author_id);
if(kendall_elated_core_installed()){
	$social_networks = kendall_elated_get_user_custom_fields($author_id);
}

?>
<?php if($author_info_box === 'yes' && $author_bio_info !=='') { ?>

	<div class="eltd-author-description">

		<div class="eltd-author-description-inner">

			<div class="eltd-author-description-image">
				<?php echo kendall_elated_kses_img(get_avatar(get_the_author_meta( 'ID' ), 105)); ?>
			</div>

			<div class="eltd-author-description-text-holder">

				<h5 class="eltd-author-name">
					<a href="<?php echo get_author_posts_url($author_id) ?>">
						<?php
							if(get_the_author_meta('first_name', $author_id) != "" || get_the_author_meta('last_name', $author_id) != "") {
								echo esc_attr(get_the_author_meta('first_name', $author_id)) . " " . esc_attr(get_the_author_meta('last_name', $author_id));
							} else {
								echo esc_attr(get_the_author_meta('display_name', $author_id));
							}
						?>
					</a>
				</h5>

				<?php if($author_info_email === 'yes' && is_email(get_the_author_meta('email', $author_id))){ ?>

					<p class="eltd-author-email">
						<?php echo sanitize_email(get_the_author_meta('email', $author_id)); ?>
					</p>

				<?php } ?>

					<div class="eltd-author-text">
						<p>
							<?php echo esc_attr($author_bio_info); ?>
						</p>
					</div>

				<?php if(is_array($social_networks) && count($social_networks)){ ?>

					<div class ="eltd-author-social-holder clearfix">

						<span class="eltd-author-social-text">
							<?php esc_html_e('Follow:','kendall'); ?>
						</span>

						<?php foreach($social_networks as $network){ ?>
							<a href="<?php echo esc_url($network['link'])?>" target="blank">
								<span class="<?php echo esc_attr($network['class'])?>"></span>
							</a>
						<?php }?>

					</div>

				<?php } ?>
			</div>
		</div>

	</div>

<?php } ?>