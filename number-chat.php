<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpcohort.io/products/
 * @since             1.2
 * @package           Whatsapp_Chat
 *
 * @wordpress-plugin
 * Plugin Name:       Number Chat - Chat Bubble for WhatsApp
 * Plugin URI:        https://wpmario.com/
 * Description:       Add Whatsapp floating icon with Number Chat.
 * Version:           1.2
 * Author:            WP Mario
 * Author URI:        https://wpmario.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       number-chat
 * Domain Path:       /languages
 */
/*
Including
*/

if ( !function_exists( 'nc_fs' ) ) {
    // Create a helper function for easy SDK access.
    function nc_fs()
    {
        global  $nc_fs ;
        
        if ( !isset( $nc_fs ) ) {
            // Include Freemius SDK.
            require_once dirname( __FILE__ ) . '/freemius/start.php';
            $nc_fs = fs_dynamic_init( array(
                'id'             => '9864',
                'slug'           => 'number-chat',
                'type'           => 'plugin',
                'public_key'     => 'pk_d3f97d37c269f8f24cd880a0d2a9f',
                'is_premium'     => false,
                'premium_suffix' => 'Pro',
                'has_addons'     => false,
                'has_paid_plans' => true,
                'menu'           => array(
                'slug'    => 'numberchat',
                'support' => false,
            ),
                'is_live'        => true,
            ) );
        }
        
        return $nc_fs;
    }
    
    // Init Freemius.
    nc_fs();
    // Signal that SDK was initiated.
    do_action( 'nc_fs_loaded' );
}

//redux-framework
if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/redux-framework-master/redux-core/framework.php' ) ) {
    require_once dirname( __FILE__ ) . '/redux-framework-master/redux-core/framework.php';
}
if ( !isset( $numberchat ) && file_exists( dirname( __FILE__ ) . '/redux-framework-master/sample/sample-config.php' ) ) {
    require_once dirname( __FILE__ ) . '/redux-framework-master/sample/sample-config.php';
}
// Admin Script
function nc_whatsapp_social_admin_styles()
{
    if ( !empty($_GET['page']) ) {
        if ( $_GET['page'] == "numberchat" ) {
            wp_enqueue_style(
                'numberchat-styles',
                plugin_dir_url( __FILE__ ) . 'css/admin.css',
                array(),
                rand()
            );
        }
    }
}

add_action( 'admin_enqueue_scripts', 'nc_whatsapp_social_admin_styles' );
// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
    die;
}
/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'NC_WHATSAPP_CHAT_VERSION', '1.0.0' );
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-whatsapp-chat.php';
function nc_whatsapp_connect_footer()
{
    require plugin_dir_path( __FILE__ ) . 'includes/chat.php';
}

add_action( 'wp_footer', 'nc_whatsapp_connect_footer' );
function nc_wpdocs_chat_scripts()
{
    //wp_enqueue_style( 'style', get_stylesheet_uri() ); /* enqueues style.css */
    /* if you want to enqueue other styles use: */
    wp_enqueue_style( 'numberchat-style', plugin_dir_url( __FILE__ ) . '/css/style.css' );
    wp_enqueue_script( 'numberchat-script', plugin_dir_url( __FILE__ ) . '/js/script.js', array( 'jquery' ) );
    wp_enqueue_style( 'numberchat-fontawesome', plugin_dir_url( __FILE__ ) . '/fonts/all.css' );
}

add_action( 'wp_enqueue_scripts', 'nc_wpdocs_chat_scripts' );
/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function nc_run_whatsapp_chat()
{
    $plugin = new Whatsapp_Chat();
    $plugin->run();
}

nc_run_whatsapp_chat();