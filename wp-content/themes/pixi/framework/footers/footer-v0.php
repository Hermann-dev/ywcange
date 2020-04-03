<?php global $pixi_options; ?>
<?php $footer_to_top =& $pixi_options["tb_footer_to_top"];
if($footer_to_top == 1){ ?>	
	<a href="#" id="back-to-top" class="progress" data-tooltip="<?php echo esc_attr__('Back To Top', 'pixi'); ?>">
		  <div class="arrow-top"></div>
		  <div class="arrow-top-line"></div>
		  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet">
		  <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
	</a>
<?php } ?>
<footer class="footer_v0"></footer>
