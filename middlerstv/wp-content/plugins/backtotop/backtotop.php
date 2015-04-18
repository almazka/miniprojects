<?php
/*
  Plugin Name: Back To Top
  Plugin URI: http://arkapravamajumder.com
  Author URI: http://arkapravamajumder.com
  Author: Arkaprava majumder
  Version:2.0
  Description: This plugin will create a "back to top" or "scroll to top button" for your website with smooth scrolling and 25 images.
  License: GPL
  
 */
 define('PLUGIN_DIR_NAME','backtotop');
 class backtotop{
	 function __construct(){
		 	add_action('admin_menu',array(&$this,'btt_backend_functions'));
			add_action('wp_footer',array(&$this,'btt_frontend'));
			add_action('wp_enqueue_scripts',array(&$this,'btt_js'));
			add_action('wp_head',array(&$this,'btt_css'));
		 }
	 function btt_backend_functions(){
			 require "inc/btt_backend_functions.php";
		 }
	function btt_js(){
			wp_enqueue_script('jquery');
			if(get_option('btt_effect')=='fade'){
				wp_register_script('fadejs',plugins_url(PLUGIN_DIR_NAME.'/js/fade.js'),'','',true);
				wp_enqueue_script('fadejs');
				}
			if(get_option('btt_effect')=='hide'){
				wp_register_script('hidejs',plugins_url(PLUGIN_DIR_NAME.'/js/hide.js'),'','',true);
				wp_enqueue_script('hidejs');
				}
			if(get_option('btt_effect')=='slide'){
				wp_register_script('slidejs',plugins_url(PLUGIN_DIR_NAME.'/js/slide.js'),'','',true);
				wp_enqueue_script('slidejs');
				}
		  }
		  
	function btt_css(){
		$btt_css=get_option('btt_css');
		$btt_hover_css=get_option('btt_hover_css');
		
			 ?>
             <style>
             #top{
				 <?php echo $btt_css; ?>
				}
		#top:hover{
			<?php echo $btt_hover_css; ?>
		}
             </style>
             
			 <?php
			 }
	function btt_frontend(){
			if(get_option('btt_radio')=='given_image'){
			$image_name=get_option('image_name');
			echo "<div  id=\"top\"><img style=\"max-width:90px;max-height:60px;\" src=\"".plugins_url(PLUGIN_DIR_NAME."/img/".$image_name.".png")."\"></div>";	
			}
			
			
			if(get_option('btt_radio')=='upload_image'){
			$btt_upload_image_name=get_option('btt_upload_image_name');
			echo "<div  id=\"top\"><img style=\"max-width:80px;max-height:60px;\" src=\"".$btt_upload_image_name."\" width='90px' height:'60px'></div>";	
			}
			
			if(get_option('btt_radio')=='submit_text'){
			$btt_given_text_name=get_option('btt_given_text_name');
			$btt_given_text_background_name=get_option('btt_given_text_background_name');
			$btt_given_text_foreground_name=get_option('btt_given_text_foreground_name');	
				
			?>
			<div  id="top"><p style="padding:6px;border-radius:2px;max-width:80px;max-height:60px;color:<?php echo $btt_given_text_foreground_name;?>;background-color:<?php echo $btt_given_text_background_name;?>;"><?php echo $btt_given_text_name;?></p></div>";	
			<?php
            }
		}
	 
}
new backtotop;
 
?>