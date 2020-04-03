<?php global $pixi_options; ?>
<?php $footer_v2_to_top =& $pixi_options["tb_footer_v2_to_top"]; ?>
<a href="#" id="back-to-top" class="progress <?php if($footer_v2_to_top == 0){ echo "hide_icon"; }?> " data-tooltip="<?php echo esc_attr__('Back To Top', 'pixi'); ?>">
  <div class="arrow-top"></div>
  <div class="arrow-top-line"></div>
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet">
  <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
</a>
<footer class="footer_v2"> 
   <div class="container">
      <?php if (is_active_sidebar("pixi-footer-widget")) { ?>
        <div class="footer-widget-1 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget"); ?>
        </div>
     <?php } 
	  if (is_active_sidebar("pixi-footer-widget-2")) { ?>
        <div class="footer-widget-2 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget-2"); ?>
        </div>
     <?php }
	 if (is_active_sidebar("pixi-footer-widget-3")) { ?>
        <div class="footer-widget-3 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget-3"); ?>
        </div>
     <?php }
	 if (is_active_sidebar("pixi-footer-widget-4")) { ?>
        <div class="footer-widget-4 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget-4"); ?>
        </div>
     <?php } ?> 
   </div> 
</footer>