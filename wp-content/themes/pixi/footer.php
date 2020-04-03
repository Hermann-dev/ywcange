<?php pixi_footer();
		global $pixi_options;
		if(isset($pixi_options["style_selector"])&&$pixi_options["style_selector"]) {
			require_once PIXI_ABS_PATH.'/box-style.php';
		} ?>
     </div><!-- wrapper  -->
     <?php wp_footer(); ?>
</body>