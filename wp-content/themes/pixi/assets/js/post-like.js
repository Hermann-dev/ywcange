(function ($) {
    "use strict";
	var $j = jQuery.noConflict();
	$j(document).ready(function($){
		initPixiLike();
	});
	function initPixiLike(){
		$j(document).on('click','.pixi-like', function() {
			var $likeLink = $j(this);
			var $id = $j(this).attr('id');
			if($likeLink.hasClass('liked')) return false;
			var $type = '';
			if(typeof $j(this).data('type') !== 'undefined') {
				$type = $j(this).data('type');
			}
			var $dataToPass = {
				action: 'pixi_like', 
				likes_id: $id,
				type: $type
			}
			var like = $j.post(pixiLike.ajaxurl, $dataToPass, function(data){
				$likeLink.html(data).addClass('liked').attr('title','You already like this!');

				if($type != 'portfolio_list') {
					$likeLink.find('span').css('opacity',1);
				}
			});
			return false;
		});
	}
 })(jQuery);