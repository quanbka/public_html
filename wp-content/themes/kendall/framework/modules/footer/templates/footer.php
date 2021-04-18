<?php
/**
 * Footer template part
 */

kendall_elated_get_content_bottom_area(); ?>
</div> <!-- close div.content_inner -->
</div>  <!-- close div.content -->

<?php if (!isset($_REQUEST["ajax_req"]) || $_REQUEST["ajax_req"] != 'yes') { ?>
<footer <?php kendall_elated_class_attribute($footer_classes); ?> style="background-image: url(<?php echo esc_url($footer_background_image)?>);">
	<div class="eltd-footer-inner clearfix">

		<?php
			kendall_elated_get_footer_top($display_footer_top);
			kendall_elated_get_footer_bottom($display_footer_bottom);
		?>

	</div>
</footer>
<?php } ?>

</div> <!-- close div.eltd-wrapper-inner  -->
</div> <!-- close div.eltd-wrapper -->
<?php wp_footer(); ?>
</body>
</html>