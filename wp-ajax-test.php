<?php 
/**
 * Plugin Name: WordPress Shortcode Ajax Test
 * Description: Shortcode button which triggers ajax
 * Version: 1.0.0
 * Author: Kalle Pakarinen
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define a function to enqueue a custom JavaScript file and localize data for AJAX
function custom_ajax_enqueue_script() {
    // Enqueue the custom JavaScript file
    wp_enqueue_script('custom-ajax-script', plugin_dir_url(__FILE__) . 'custom-ajax-script.js', array('jquery'), '1.0', true);
    // Localize data for the script, making PHP variables available in JavaScrip
    wp_localize_script('custom-ajax-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'custom_ajax_enqueue_script');

// shortcode function
function custom_ajax_shortcode() {
    ob_start();
?>
    <button id="custom-ajax-button-id">Click me</button>
<?php
    return ob_get_clean();
}
// add the shortcode where you want in the frontend "[custom_ajax_button]"
add_shortcode('custom_ajax_button', 'custom_ajax_shortcode');

// Define a function to handle a custom AJAX request
function custom_ajax_function() {
    // log this debug.log file
    error_log('ajax works');
}
// Register the custom AJAX function for authenticated users
add_action('wp_ajax_custom_ajax_function', 'custom_ajax_function');
// Register the custom AJAX function for unauthenticated users
add_action('wp_ajax_nopriv_custom_ajax_function', 'custom_ajax_function');
