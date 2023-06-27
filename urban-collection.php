<?php

/**
 * Plugin Name: Urban Collection
 * Description: Custom widgets and elements for Urban Owl.
 * Plugin URI:  https://outsourcetoasia.io/
 * Version:     1.0.0
 * Author:      Outsource To Asia
 * Author URI:  https://outsourcetoasia.io/
 * Text Domain: urban-collection
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/*
 * Register WidgetCraft Widget.
 */

function register_urban_collection( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/theme-button.php' );

	$widgets_manager->register( new \Elementor_Urban_Collection() );

}
add_action( 'elementor/widgets/register', 'register_urban_collection' );