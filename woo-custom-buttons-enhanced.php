<?php
/**
 * Plugin Name: Woo Custom Buttons Enhanced
 * Description: Adds customizable "Order Now" and "Customize" buttons to WooCommerce product pages with advanced styling options.
 * Version: 2.7.0
 * Author: Shaifur Rahman
 * Author URI: https://shaifur.com/dev/woo-custom-buttons-enhanced
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Define constants
define('WCBE_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('WCBE_PLUGIN_URL', plugin_dir_url(__FILE__));

// Include necessary files
require_once WCBE_PLUGIN_PATH . 'includes/settings.php';
require_once WCBE_PLUGIN_PATH . 'includes/render-buttons.php';
require_once WCBE_PLUGIN_PATH . 'includes/hooks.php';
require_once WCBE_PLUGIN_PATH . 'includes/helpers.php';

// Enqueue assets (optional)
function wcbe_enqueue_assets() {
    wp_enqueue_style('wcbe-style', WCBE_PLUGIN_URL . 'assets/css/style.css');
}
add_action('wp_enqueue_scripts', 'wcbe_enqueue_assets');
