<?php
	/**
	 * Author: James Best
	 * URL: http://justjibba.net/
	 */

	/*
	1. lib/clean.php
	  - head cleanup
		- post and images related cleaning
	*/
	require_once('lib/clean.php'); // do all the cleaning and enqueue here

	/*
	3. lib/foundation.php
		- add pagination
	*/
	//require_once('lib/foundation.php'); // load Foundation specific functions like top-bar
	/*
	4. lib/nav.php
		- custom walker for top-bar and related
	*/
	//require_once('lib/nav.php'); // filter default wordpress menu classes and clean wp_nav_menu markup


	/**********************
	Add theme supports
	 **********************/
	if( ! function_exists( 'underwood_theme_support' ) ) {
		function underwood_theme_support() {
			// Add language supports.
			load_theme_textdomain('underwood', get_template_directory() . '/lang');

			// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
			add_theme_support('post-thumbnails');
			// set_post_thumbnail_size(150, 150, false);
			add_image_size('fd-lrg', 1024, 99999);
			add_image_size('fd-med', 768, 99999);
			add_image_size('fd-sm', 320, 9999);

			// rss thingy
			add_theme_support('automatic-feed-links');

			// Add post formats support. http://codex.wordpress.org/Post_Formats
			add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

			// Add menu support. http://codex.wordpress.org/Function_Reference/register_nav_menus
			add_theme_support('menus');
			register_nav_menus(array(
				'primary' => __('Primary Navigation', 'underwood'),
				'additional' => __('Additional Navigation', 'underwood'),
				'utility' => __('Utility Navigation', 'underwood')
			));

			// Add custom background support
			add_theme_support( 'custom-background',
				array(
					'default-image' => '',  // background image default
					'default-color' => '', // background color default (dont add the #)
					'wp-head-callback' => '_custom_background_cb',
					'admin-head-callback' => '',
					'admin-preview-callback' => ''
				)
			);
		}
	}
	add_action('after_setup_theme', 'underwood_theme_support'); /* end Reverie theme support */
	
	add_filter('timber_context', 'add_to_context');
	function add_to_context($data){
		/* So here you are adding data to Timber's context object, i.e... */
		$data['foo'] = 'I am some other typical value set in your functions.php file, unrelated to the menu';

        /* Now, in similar fashion, you add a Timber menu and send it along to the context.*/
	    $data['menu'] = new TimberMenu('primary'); // This is where you can also send a Wordpress menu slug or ID
	    return $data;
}