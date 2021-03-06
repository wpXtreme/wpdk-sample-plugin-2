<?php

/**
 * Plugin Name:     WPDK Sample Plugin #2
 * Plugin URI:      http://wpdk.io
 * Description:     Sample #2 of WordPress plugin developed with WPDK framework - see readme.md in plugin root directory for details
 * Version:         1.0.0
 * Author:          wpXtreme
 * Author URI:      https://wpxtre.me
 * Text Domain:     wpdk-sample-plugin-2
 * Domain Path:     localization
 */

// Include WPDK framework - the root directory name of WPDK may be different.
// Please change the line below according to your environment.
if ( file_exists( trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'wpxtreme/wpdk/wpdk.php' ) ) {
  require_once( trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'wpxtreme/wpdk/wpdk.php' );
} else {
  require_once( 'wpdk/wpdk.php' );
}


// Include and parse internal classes of this plugin - basic usage, no WPDK autoloading technology
require_once( plugin_dir_path( __FILE__ ) . 'classes/wpdk-sample-viewcontroller.php' );

// Hook a function to the WordPress action that generates the plugin menu item in admin menu
add_action( 'admin_menu', 'wpdk_create_admin_menu_4' );

// This function creates the plugin menu item in admin menu through WPDK
function wpdk_create_admin_menu_4()
{

  // Set my own plugin icon URL, shown in main navigation menu of WordPress Administration Screen
  $icon_menu = plugin_dir_url( __FILE__ ) . 'logo-16x16.png';

  // Create the main menu item through WPDK
  $menu = new WPDKMenu( 'wpdk-sample-plugin', __( 'WPDK Plugin' ), WPDKMenu::DEFAULT_CAPABILITY, $icon_menu );

  // Add first submenu item to main menu just created, and attach to it a specific view-controller class that shows related html output
  $menu->addSubMenu( __( 'Show Controls' ), 'ControlsViewController' );

  // Add a divider to separate the first submenu item from the second
  $menu->addDivider();

  // Add second submenu item to main menu just created, and attach to it a specific view-controller class that shows related html output
  $menu->addSubMenu( __( 'Show About' ), 'AboutViewController' );

  // Display the menu
  $menu->render();

}
