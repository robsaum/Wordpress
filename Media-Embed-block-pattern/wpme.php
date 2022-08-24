<?php

/**
 * Plugin Name: WP Block Media Embed
 * Description: Custom block plugin from creating a GDPR compliant YouTube and Vimeo embed players".
 * Version: 1.0.1
 * Author: Rob Saum
 * Author URI: https://www.robsaum.com
 *
 * @package wpme
 */

defined( 'ABSPATH' ) || exit;

/**
 * Load translations (if any) for the plugin from the /languages/ folder.
 * 
 * @link https://developer.wordpress.org/reference/functions/load_plugin_textdomain/
 */
add_action( 'init', 'wpme_load_textdomain' );

function wpme_load_textdomain() {
	load_plugin_textdomain( 'wpme', false, basename( __DIR__ ) . '/languages' );
}



/** 
 * Add custom "wpme" block category
 * 
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/filters/block-filters/#managing-block-categories
 * @link https://developer.wordpress.org/resource/dashicons/
 */
add_filter( 'block_categories', 'wpme_block_categories', 10, 2 );

function wpme_block_categories( $categories, $post ) {
	if ( $post->post_type !== 'post' ) {
		return $categories;
	}
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'wpme',
				'title' => __( 'GDPR Media Embeds', 'wpme' ),
				'icon'  => 'video-alt3',
			),
		)
	);
}

/**
 * Registers all block assets so that they can be enqueued through the Block Editor in
 * the corresponding context.
 *
 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/block-api/block-registration/
 */
add_action( 'init', 'wpme_register_blocks' );

function wpme_register_blocks() {

	// If Block Editor is not active, bail.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}

	// Retister the block editor script.
	wp_register_script(
		'wpme-editor-script',											// label
		plugins_url( 'build/index.js', __FILE__ ),						// script file
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', "wp-data" ),		// dependencies
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' )		// set version as file last modified time
	);

	// Register the block editor stylesheet.
	wp_register_style(
		'wpme-editor-styles',											// label
		plugins_url( 'build/editor.css', __FILE__ ),					// CSS file
		array( 'wp-edit-blocks' ),										// dependencies
		filemtime( plugin_dir_path( __FILE__ ) . 'build/editor.css' )	// set version as file last modified time
	);

	// Register the front-end stylesheet.
	wp_register_style(
		'wpme-front-end-styles',										// label
		plugins_url( 'build/style.css', __FILE__ ),						// CSS file
		array( ),														// dependencies
		filemtime( plugin_dir_path( __FILE__ ) . 'build/style.css' )	// set version as file last modified time
	);

	// Array of block created in this plugin.
	$blocks = [
		'wpme/youtube',
		'wpme/vimeo'
	];
	
	// Loop through $blocks and register each block with the same script and styles.
	foreach( $blocks as $block ) {
		register_block_type( $block, array(
			'editor_script' => 'wpme-editor-script',					// Calls registered script above
			'editor_style' => 'wpme-editor-styles',					// Calls registered stylesheet above
			'style' => 'wpme-front-end-styles',						// Calls registered stylesheet above
		) );	  
	}


	if ( function_exists( 'wp_set_script_translations' ) ) {
	/**
	 * Adds internationalization support. 
	 * 
	 * @link https://wordpress.org/gutenberg/handbook/designers-developers/developers/internationalization/
	 * @link https://make.wordpress.org/core/2018/11/09/new-javascript-i18n-support-in-wordpress/
	 */
	wp_set_script_translations( 'wpme-editor-script', 'wpme', plugin_dir_path( __FILE__ ) . '/languages' );
	}

}

/**
 * Build classes based on block attributes.
 * Returns string of classes.
 * 
 * $attributes - array - Block attributes.
 */
function wpme_block_classes( $attributes ) {
	$classes = null;
	if ( $attributes['align'] ) {
		$classes = 'align' . $attributes['align'] . ' ';
	}

	if ( $attributes['className'] ) {
		$classes .= $attributes['className']; 
	}

	return $classes;
}


