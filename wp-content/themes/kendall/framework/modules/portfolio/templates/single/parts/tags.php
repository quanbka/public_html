<?php
$tags = wp_get_post_terms(get_the_ID(), 'portfolio-tag');
$tag_names = array();

if(is_array($tags) && count($tags)) :
    foreach($tags as $tag) {
        $tag_names[] = $tag->name;
    }

    ?>
    <div class="eltd-portfolio-info-item eltd-portfolio-tags">
        <h6><?php esc_html_e('Tags: ', 'kendall'); ?></h6>
        <p class="eltd-ptf-single-info">
            <?php echo esc_html(implode(', ', $tag_names)); ?>
        </p>
    </div>
<?php endif; ?>
