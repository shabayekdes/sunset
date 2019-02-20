<?php
/*

@package sunsettheme

	========================
		ADMIN ENQUEUE FUNCTIONS
	========================
*/

function sunset_load_admin_scripts( $hook ){
	// echo $hook;
	if( 'toplevel_page_shabayekdes_sunset' == $hook ){ 
	
		wp_register_style( 'sunset_admin', get_template_directory_uri() . '/css/sunset.admin.css', array(), '1.0.0', 'all' );
		wp_enqueue_style( 'sunset_admin' );
		
		wp_enqueue_media();
		
		wp_register_script( 'sunset-admin-script', get_template_directory_uri() . '/js/sunset.admin.js', array('jquery'), '1.0.0', true );
		wp_enqueue_script( 'sunset-admin-script' );
	
	} else if ( 'sunset_page_shabayekdes_sunset_css' == $hook ){
		
		wp_enqueue_style( 'ace', get_template_directory_uri() . '/css/sunset.ace.css', array(), '1.0.0', 'all' );
		
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
		wp_enqueue_script( 'sunset-custom-css-script', get_template_directory_uri() . '/js/sunset.custom_css.js', array('jquery'), '1.0.0', true );
	
	} else { return; }

}
add_action( 'admin_enqueue_scripts', 'sunset_load_admin_scripts' );
/*
	
	========================
		FRONT-END ENQUEUE FUNCTIONS
	========================
*/
function sunset_load_scripts(){
	
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.6', 'all' );
	wp_enqueue_style( 'sunset', get_template_directory_uri() . '/css/sunset.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'raleway', 'https://fonts.googleapis.com/css?family=Raleway:200,300,500' );

	
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.js', false, '1.11.3', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.6', true );
	
}
add_action( 'wp_enqueue_scripts', 'sunset_load_scripts' );