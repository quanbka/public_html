<?php if($fullwidth) : ?>
<div class="eltd-full-width">
    <div class="eltd-full-width-inner">
<?php else: ?>
<div class="eltd-container">
    <div class="eltd-container-inner clearfix">
<?php endif; ?>
        <div <?php kendall_elated_class_attribute($holder_class); ?>>
            <?php if(post_password_required()) {
                echo get_the_password_form();
            } else {
                //load proper portfolio template
                kendall_elated_get_module_template_part('templates/single/single', 'portfolio', $portfolio_template);

                //load portfolio navigation
                kendall_elated_get_module_template_part('templates/single/parts/navigation', 'portfolio');

                //load portfolio comments
                kendall_elated_get_module_template_part('templates/single/parts/comments', 'portfolio');

            } ?>
        </div>
    </div>
</div>