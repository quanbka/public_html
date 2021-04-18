<div class="eltd-image-gallery eltd-image-owl-slider">
    <div class="eltd-image-gallery-carousel eltd-image-gallery-slides-holder" <?php echo kendall_elated_get_inline_attrs($slider_data); ?>>
        <?php foreach ($images as $image) {
        if ($pretty_photo) { ?>
        <a href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
            <?php }
                if(is_array($image_size) && count($image_size)) {
                    echo kendall_elated_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]);
                }
                else{
                    echo wp_get_attachment_image($image['image_id'], $image_size);
                }
        if ($pretty_photo) { ?>
            </a>
        <?php }
        } ?>
    </div>
</div>