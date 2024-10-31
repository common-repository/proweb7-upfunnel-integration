jQuery(function(){
	/*Check upfunnel_toc class and its element is exist in current admin screen.*/
	if(jQuery('.upfunnel_toc').length > 0){
		jQuery('body').on('click','.upfunnel_toc',function(){			
			jQuery('.upfunnel_toc_details').fadeToggle();
		});
	}
	if(jQuery('#upfunnel_frm').length > 0){
		jQuery('#upfunnel_frm').on('submit',function(){
			warning_handler();
			var formData= jQuery(this).serialize();
			formData= formData+'&action=upfunnel_save_settings';
			jQuery.ajax({
				type:"POST",
				url:upflObj.upfl_ajax_url,
				data:formData,
				dataType: "json",
				beforeSend:function(){
					jQuery('.upfunnel-notice').show();
					jQuery('.upfunnel-notice p').text('Please wait..');
				},
				success:function(res){
					jQuery('.upfunnel-notice').addClass(res.messageClass);
				   jQuery('.upfunnel-notice p').text(res.message);	
				}
			});
			return false;		
		});
	}
	function warning_handler(){
		jQuery('.upfunnel-notice').removeClass('notice-success');
		jQuery('.upfunnel-notice').removeClass('notice-danger');
		jQuery('.upfunnel-notice p').text('');
	}


	
});