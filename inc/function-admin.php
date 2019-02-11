<?php

/*

@package sunsettheme

	========================
		ADMIN PAGE
	========================
*/

function sunset_add_admin_page()
{
    //Generate Sunset Admin Page
    add_menu_page( __( 'Sunset Theme Options', 'shabayekdes' ), 'Sunset', 'manage_options', 'shabayekdes_sunset', 'sunset_theme_create_page', get_template_directory_uri() . '/img/sunset-icon.png', 110 );

    //Generate Sunset Admin Sub Pages
    add_submenu_page( 'shabayekdes_sunset', 'Sunset Theme Options', 'General', 'manage_options', 'shabayekdes_sunset', 'sunset_theme_create_page' );
    add_submenu_page( 'shabayekdes_sunset', 'Sunset CSS Options', 'Custom CSS', 'manage_options', 'shabayekdes_sunset_css', 'sunset_theme_settings_page');

    //Activate custom settings
    add_action( 'admin_init', 'sunset_custom_settings' );
}
add_action( 'admin_menu', 'sunset_add_admin_page' );

function sunset_custom_settings()
{
    register_setting( 'sunset-settings-group', 'first_name' );
    register_setting( 'sunset-settings-group', 'last_name' );
    register_setting( 'sunset-settings-group', 'user_description' );
    register_setting( 'sunset-settings-group', 'twitter_handler', 'sunset_sanitize_twitter_handler' );
    register_setting( 'sunset-settings-group', 'facebook_handler' );
    register_setting( 'sunset-settings-group', 'gplus_handler' );

    add_settings_section( 'sunset-sidebar-options', 'Sidebar Option', 'sunset_sidebar_options', 'shabayekdes_sunset' );

    add_settings_field( 'sidebar-name', 'Full Name', 'sunset_sidebar_name', 'shabayekdes_sunset', 'sunset-sidebar-options');
    add_settings_field( 'sidebar-description', 'Description', 'sunset_sidebar_description', 'shabayekdes_sunset', 'sunset-sidebar-options');
    add_settings_field( 'sidebar-twitter', 'Twitter handler', 'sunset_sidebar_twitter', 'shabayekdes_sunset', 'sunset-sidebar-options');
    add_settings_field( 'sidebar-facebook', 'Facebook handler', 'sunset_sidebar_facebook', 'shabayekdes_sunset', 'sunset-sidebar-options');
    add_settings_field( 'sidebar-gplus', 'Google+ handler', 'sunset_sidebar_gplus', 'shabayekdes_sunset', 'sunset-sidebar-options');
}

function sunset_sidebar_name()
{
    $firstName = esc_attr( get_option( 'first_name' ) );
    $lastName = esc_attr( get_option( 'last_name' ) );
    echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function sunset_sidebar_description() {
    $description = esc_attr( get_option( 'user_description' ) );
    echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function sunset_sidebar_facebook()
{
    $facebook = esc_attr( get_option( 'facebook_handler' ) );
    echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}

function sunset_sidebar_gplus()
{
    $gplus = esc_attr( get_option( 'gplus_handler' ) );
    echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}


function sunset_sidebar_twitter()
{
    $twitter = esc_attr( get_option( 'twitter_handler' ) );
    echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}

//Sanitization settings
function sunset_sanitize_twitter_handler( $input )
{
    $output = sanitize_text_field( $input );
    $output = str_replace('@', '', $output);
    return $output;
}

function sunset_sidebar_options() {
    echo 'Customize your Sidebar Information';
}

function sunset_theme_create_page()
{
    require_once( get_template_directory() . '/inc/templates/sunset-admin.php' );
}

function sunset_theme_settings_page()
{
    echo '<h1>Sunset Custom CSS</h1>';

}
