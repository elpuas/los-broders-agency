<?php
/**
 *
 */
require_once( get_stylesheet_directory() . '/framework/lib/customize.php' );
require_once( get_stylesheet_directory() . '/framework/los-broders-req-plugins.php' );
/**
 * Enqueue Styles & Scripts
 */
function lb_scripts() {
  wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, true);
	wp_enqueue_script( 'los-broders-scripts', get_template_directory_uri() . '/framework/js/custom.min.js', array(), get_the_time('U'), true );
}
add_action( 'wp_enqueue_scripts', 'lb_scripts' );

/**
 * Theme Style
 */
function lb_add_footer_styles() {
    wp_enqueue_style( 'los-broders-custom-styles', get_template_directory_uri() . '/framework/los-broders.min.css', array(), get_the_time('U') );
    wp_enqueue_style('dashicons');
};
add_action( 'get_footer', 'lb_add_footer_styles' );

/**
 * Add SVG Support.
 */
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
* Page Slug Body Class
*/
function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
	add_filter( 'body_class', 'add_slug_body_class' );
