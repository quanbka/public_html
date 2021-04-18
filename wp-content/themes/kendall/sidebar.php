<?php
$kendall_elated_sidebar = kendall_elated_get_sidebar();
?>
<div class="eltd-column-inner">
    <aside class="eltd-sidebar">
        <?php
            if (is_active_sidebar($kendall_elated_sidebar)) {
                dynamic_sidebar($kendall_elated_sidebar);
            }
        ?>
    </aside>
</div>
