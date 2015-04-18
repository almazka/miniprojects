<?php
add_menu_page( 'Back To Top', 'Back To Top', 'manage_options', 'backtotop', 'btt_backend_body', plugins_url( PLUGIN_DIR_NAME.'/img/pluginicon.png' ));

add_submenu_page( 'backtotop', 'Back To Top Sttings', 'Settings', 'manage_options', 'backtop-settings', 'btt_backend_settings' ); 
 
function btt_backend_body(){
	require "btt_backend.php";
	}
	
function btt_backend_settings(){
	
	require "btt_settings.php";
	}

?>