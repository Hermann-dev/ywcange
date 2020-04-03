<?php global $pixi_options; ?>
<?php $footer_to_top =& $pixi_options["tb_footer_to_top"]; ?>
<a href="#" id="back-to-top" class="progress <?php if($footer_to_top == 0){ echo "hide_icon"; }?> " data-tooltip="<?php echo esc_attr__('Back To Top', 'pixi'); ?>">
  <div class="arrow-top"></div>
  <div class="arrow-top-line"></div>
  <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet">
  <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
</a>
<?php $footer_fixed =& $pixi_options["tb_footer_fixed"]; ?>
<footer class="footer_v1 <?php if($footer_fixed == 1){ echo "footer-fixed"; }?>"> 
   <div class="container">
      <?php if (is_active_sidebar("pixi-footer-widget")) { ?>
        <div class="footer-widget-1 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget"); ?>
        </div>
     <?php } 
	  if (is_active_sidebar("pixi-footer-widget-2")) { ?>
        <div class="footer-widget-2 col-sm-2 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget-2"); ?>
        </div>
     <?php }
	 if (is_active_sidebar("pixi-footer-widget-3")) { ?>
        <div class="footer-widget-3 col-sm-2 col-xs-12">
            <?php dynamic_sidebar("pixi-footer-widget-3"); ?>
        </div>
     <?php } ?>
	
        <div class="col-sm-5 col-xs-12 no-padding">
			 <?php if (is_active_sidebar("pixi-footer-widget-4")) { ?>
				<div class="footer-widget-4 col-sm-6 col-xs-12">
				   <?php dynamic_sidebar("pixi-footer-widget-4"); ?>
				</div>
             <?php } ?> 
             <?php if (is_active_sidebar("pixi-footer-widget-5")) { ?>
				<div class="footer-widget-5 col-sm-6 col-xs-12">
				   <?php dynamic_sidebar("pixi-footer-widget-5"); ?>
				</div>
             <?php } ?> 
        </div>
    
     <div class="clearfix>"></div>
	 <?php if (is_active_sidebar("pixi-footer-widget-6")) { ?>
       <div class="col-sm-12 col-xs-12">
        <div class="footer-widget-6 footer-bottom ">
            <?php dynamic_sidebar("pixi-footer-widget-6"); ?>
        </div>
        </div>
     <?php } ?>
  </div>
</footer>