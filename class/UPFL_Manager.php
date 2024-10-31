<?php 
class UPFL_Manager{
	function __construct(){
			add_action( 'wp_enqueue_scripts', array($this,'upfl_load_script') );
			add_action('admin_menu', array($this,'upfunnel_options_page'));			
			add_action( 'admin_enqueue_scripts', array($this,'upfl_load_admin_script') );
			add_action( 'wp_ajax_upfunnel_save_settings', array($this,'upfunnel_save_settings') );
         		
		}
       /**
		 * Attach the javascript and css file to admin and frontend!!
		 *
		*/
			
	 public function upfl_load_script() {
			global $wp_query;
			$apiKey = $this->get_apikey();
			if($this->is_upfunnel_active() && $this->is_upfunnel_term_accepted() && $apiKey!=''){		
				/*Load some dynamic variable in script object*/
				$args = array(
					'upfl_ajax_url'   => admin_url( 'admin-ajax.php' ),
					'upfl_api_key'=> $apiKey
				);							
				wp_enqueue_script( 'upfl-script-js', UPFL_URL_ASSETS_URL . 'js/upfl_script.js', array( 'jquery' ), '1.0', true );
				wp_localize_script( 'upfl-script-js', 'upflObj', $args );
			}

			
		}
	/*upfl_load_admin_script will load admin side script*/	
	 public function upfl_load_admin_script(){
		 	$args = array(
					'upfl_ajax_url'   => admin_url( 'admin-ajax.php' )
				);
			wp_enqueue_script( 'upfl-admin-script-js', UPFL_URL_ASSETS_URL . 'js/upfl_admin_script.js', array( 'jquery' ), '1.0', true );	
           wp_localize_script( 'upfl-admin-script-js', 'upflObj', $args );			
		}	
	/*upfunnel_options_page will create submenu in Tools(parent) to access plugin setting page*/ 		
	 public function upfunnel_options_page()
		{
			add_submenu_page(
				'tools.php',
				'Upfunnel options',
				'Upfunnel options',
				'manage_options',
				'upfunnel_settings',
				array($this,'upfunnel_options_page_html')
			);
		}
	/*upfunnel_options_page_html will load settings page html and saveing data in database*/ 	
	 public function upfunnel_options_page_html()
		{
				include(UPFL_PATH.'views/html-admin-settings.php');	
				
		}
    /*is_upfunnel_active will check if user enabled the plugin*/ 
     public function is_upfunnel_active(){
			 $getData= get_option('upfunnel_data');
			 if($getData['enabled']=='on'){
				 return true;
			 }else{
				 return false;
			 }
	 }	
	/*is_upfunnel_term_accepted will check if user accepted the term and consitions*/ 
     public function is_upfunnel_term_accepted(){
			 $getData= get_option('upfunnel_data');
			 if($getData['term_condition']=='on'){
				 return true;
			 }else{
				 return false;
			 }
	 }	
     /* get_apikey function return api key if have otherwise it will return blank*/	 
     public function get_apikey(){
			 $getData= get_option('upfunnel_data');		 
			 return !empty($getData['apikey']) ? $getData['apikey'] :'';		
	 }	
	 
	public function upfunnel_save_settings(){
			$messageClass='';
			$message='';	
			if ( !empty( $_POST['_upfunnel_nonce'] ) 
						&& ! wp_verify_nonce( $_POST['_upfunnel_nonce'], '_upfunnel_nonce' ) 
					) {	
                        $message_status=__( 'Invalid request..', $domain = 'Upfunnel' );						
						$messageClass=__( 'notice-success', $domain = 'Upfunnel' );			 
						 
					}else{
				
						$post=array();
						$post['apikey']= sanitize_text_field($_POST['upfunnel']['apikey']);
						$post['term_condition']= sanitize_text_field($_POST['upfunnel']['term_condition']);
						$post['enabled']= sanitize_text_field($_POST['upfunnel']['enabled']);

						if(empty($post['apikey'])){						 
						   $message_status=__( 'Api key field can not blank.', $domain = 'Upfunnel' );	$messageClass=__( 'notice-danger', $domain = 'Upfunnel' );						 
						}
						else if(empty($post['term_condition'])){
						   $message_status=__( 'Terms & conditions field can not blank.', $domain = 'Upfunnel' );						
							$messageClass=__( 'notice-danger', $domain = 'Upfunnel' );					
							 
						}else{			
							update_option('upfunnel_data', $post);							
							$message_status=__( 'Settings has been saved successfully!!', $domain = 'Upfunnel' );						
							$messageClass=__( 'notice-success', $domain = 'Upfunnel' );			
						}
			}			
			echo json_encode(array('messageClass'=>$messageClass,'message'=>$message_status));
			die;
	} 
	 
	 
}
/*initialize the class*/

   new UPFL_Manager();