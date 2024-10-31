<div class="upfunnel-notice notice is-dismissible" style="display:none;">
        <p></p>
</div>
<?php
$upfunnel_obj= get_option('upfunnel_data');
$upfunnel_apikey = !empty($upfunnel_obj['apikey'])? $upfunnel_obj['apikey']:'';
$upfunnel_enabled = !empty($upfunnel_obj['enabled'])? $upfunnel_obj['enabled']:'';
$upfunnel_term_condition = !empty($upfunnel_obj['term_condition'])? $upfunnel_obj['term_condition']:'';
 ?>
<div class="wrap">
	<h1><?php echo  esc_html(get_admin_page_title()); ?></h1>
	<form  method="post" id="upfunnel_frm">
   <?php wp_nonce_field( '_upfunnel_nonce', '_upfunnel_nonce' ); ?>
	
	<table class="form-table">
	
	   <tr>
			<th class="titledesc"><label><?php _e( 'Enable', 'Upfunnel' ); ?></label></th>
			<td class="forminp">
				<input type="checkbox" name="upfunnel[enabled]" <?php if($upfunnel_enabled=='on'){?> checked='checked' <?php } ?>>
				<p><?php _e( 'Please Note: When you check this field the plugin will work.By default it will be disabled.', 'Upfunnel' ); ?>
				</p>
			</td>
		</tr>
	
		<tr>
			<th class="titledesc"><label><?php _e( 'Upfunnel.io Apikey', 'Upfunnel' ); ?></label></th>
			<td class="forminp">
				<input value="<?php echo $upfunnel_apikey?>" class="regular-text" type="text" name="upfunnel[apikey]" required>
			</td>
		</tr>		
		<tr>
			<th class="titledesc"><label><?php _e( 'I agree to the Terms and Conditions', 'Upfunnel' ); ?></label></th>
			<td class="forminp">
				<input type="checkbox" name="upfunnel[term_condition]" <?php if($upfunnel_term_condition=='on'){ ?> checked='checked' <?php } ?> required>
				<p><?php _e( 'Please read','Upfunnel'); ?> <a href="javascript:void(0);" class="upfunnel_toc"><?php _e( 'Terms and Conditions','Upfunnel'); ?></a></p>
			</td>
		</tr>	
	</table>	
	<?php echo submit_button('Save Settings');?>
	</form>
	<div class="upfunnel_toc_details" style="display:none; color: black; background-color: rgb(228, 223, 214);">
		<p><?php _e( 'Please read these Terms and Conditions carefully before using the http://upfunnel.io/ website (the"Service") operated by Upfunnel ("us", "we", or "our").', 'Upfunnel' ); ?></p>

		<p>
		<?php _e( 'Your access to and use of the Service is conditioned upon your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who wish to access or use the Service.', 'Upfunnel' ); ?>		
		</p>

		<p>	
		<?php _e( 'By accessing or using the Service you agree to be bound by theseTerms. If you disagree with any part of the terms then you do not have permission to access the Service.', 'Upfunnel' ); ?>
		</p>
	</div>	
</div>