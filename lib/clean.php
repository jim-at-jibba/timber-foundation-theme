<?php

	/**
	 * Clean script based on Reverie Clean Script.
	 * Thanks Zhen Huang - http://themefortress.com/
	 */



	/**
	 * Start all the functions
	 * at once for Underwood.
	 */

	add_action( 'after_setup_theme', 'underwood_startup' );

	if ( ! function_exists( 'underwood_startup ' ) ) {
		function underwood_startup() {

			// launching operation cleanup
			add_action( 'init', 'underwood_head_cleanup' );
			// remove WP version from RSS
			add_filter( 'the_generator', 'underwood_rss_version' );
			// remove pesky injected css for recent comments widget
			add_filter( 'wp_head', 'underwood_remove_wp_widget_recent_comments_style', 1 );
			// clean up comment styles in the head
			add_action( 'wp_head', 'underwood_remove_recent_comments_style', 1 );
			// clean up gallery output in wp
			add_filter( 'gallery_style', 'underwood_gallery_style' );

			// enqueue base scripts and styles
			add_action( 'wp_enqueue_scripts', 'underwood_scripts_and_styles', 999 );
			add_action( 'wp_enqueue_scripts', 'underwood_styles', 999 );

			// ie conditional wrapper
			//add_filter( 'style_loader_tag', 'underwood_ie_conditional', 10, 2 );

			// additional post related cleaning
			add_filter( 'img_caption_shortcode', 'underwood_cleaner_caption', 10, 3 );
			add_filter( 'get_image_tag_class', 'underwood_image_tag_class', 0, 4 );
			add_filter( 'get_image_tag', 'underwood_image_editor', 0, 4 );
			add_filter( 'the_content', 'underwood_img_unautop', 30 );

		} /* end underwood_startup */
	}

	/**
	 * WP_HEAD GOODNESS
	 * The default WordPress head is
	 * a mess. Let's clean it up.
	 *
	 * Thanks for Bones
	 * http://themble.com/bones/
	 */

	if ( ! function_exists( 'underwood_head_cleanup ' ) ) {
		function underwood_head_cleanup() {
			// category feeds
			// remove_action( 'wp_head', 'feed_links_extra', 3 );
			// post and comment feeds
			// remove_action( 'wp_head', 'feed_links', 2 );
			// EditURI link
			remove_action( 'wp_head', 'rsd_link' );
			// windows live writer
			remove_action( 'wp_head', 'wlwmanifest_link' );
			// index link
			remove_action( 'wp_head', 'index_rel_link' );
			// previous link
			remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
			// start link
			remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
			// links for adjacent posts
			remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
			// WP version
			remove_action( 'wp_head', 'wp_generator' );
			// remove WP version from css
			add_filter( 'style_loader_src', 'underwood_remove_wp_ver_css_js', 9999 );
			// remove Wp version from scripts
			add_filter( 'script_loader_src', 'underwood_remove_wp_ver_css_js', 9999 );

		} /*========== end head cleanup ==========*/
	}

	/**
	 * Remove WP version from RSS
	 */
	if ( ! function_exists( 'underwood_rss_version ' ) ) {
		function underwood_rss_version() {
			return '';
		}
	}

	/**
	 * remove WP version from scripts
	 */
	if ( ! function_exists( 'underwood_remove_wp_ver_css_js ' ) ) {
		function underwood_remove_wp_ver_css_js( $src ) {
			if ( strpos( $src, 'ver=' ) ) {
				$src = remove_query_arg( 'ver', $src );
			}

			return $src;
		}
	}

	/**
	 * remove injected CSS for recent comments widget
	 */
	if ( ! function_exists( 'underwood_remove_wp_widget_recent_comments_style ' ) ) {
		function underwood_remove_wp_widget_recent_comments_style() {
			if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
				remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
			}
		}
	}

	/**
	 * remove injected CSS from recent comments widget
	 */
	if ( ! function_exists( 'underwood_remove_recent_comments_style ' ) ) {
		function underwood_remove_recent_comments_style() {
			global $wp_widget_factory;
			if ( isset( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ) ) {
				remove_action( 'wp_head',
					array ( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
			}
		}
	}

	/**
	 * remove injected CSS from gallery
	 */
	if ( ! function_exists( 'underwood_gallery_style ' ) ) {
		function underwood_gallery_style( $css ) {
			return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
		}
	}

	/*========== loading modernizr and jquery, and reply script ==========*/
	if ( ! function_exists( 'underwood_scripts_and_styles ' ) ) {
		function underwood_scripts_and_styles() {
			if ( ! is_admin() ) {

				// modernizr
				wp_register_script( 'underwood-modernizr',
					get_template_directory_uri() . '/bower_components/modernizr/modernizr.js', array (), '2.8.3',
					false );

				// adding compiled javascript file in the footer
				wp_register_script( 'underwood-js', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ),
					'', true );

				wp_deregister_script( 'jquery' );
				wp_register_script( 'jquery', ( 'https://code.jquery.com/jquery-2.1.3.min.js' ), false, null, true );

				global $is_IE;
				if ( $is_IE ) {
					wp_register_script( 'html5shiv', "http://html5shiv.googlecode.com/svn/trunk/html5.js", false,
						true );
				}

				// enqueue styles and scripts
				wp_enqueue_script( 'underwood-modernizr' );
				wp_enqueue_script( 'jquery' );

				wp_enqueue_script( 'underwood-js' );
				wp_enqueue_script( 'html5shiv' );

			}
		}
	} /*========= End loading scripts ==========*/

	if ( ! function_exists( 'underwood_styles ' ) ) {
		function underwood_styles() {

			// Register the main style
			wp_register_style( 'underwood-stylesheet', get_stylesheet_directory_uri() . '/css/main.css', array (), '',
				'all' );

			wp_enqueue_style( 'underwood-stylesheet' );
		}
	}
	/**
	 * Post related Cleaning
	 */

	/*========== Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ ==========*/
	if ( ! function_exists( 'underwood_cleaner_caption ' ) ) {
		function underwood_cleaner_caption( $output, $attr, $content ) {

			/*========== We're not worried abut captions in feeds, so just return the output here. ==========*/
			if ( is_feed() ) {
				return $output;
			}

			/*========== Set up the default arguments. ==========*/
			$defaults = array (
				'id'      => '',
				'align'   => 'alignnone',
				'width'   => '',
				'caption' => ''
			);

			/*========== Merge the defaults with user input. ==========*/
			$attr = shortcode_atts( $defaults, $attr );

			/*========== If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. ==========*/
			if ( 1 > $attr['width'] || empty( $attr['caption'] ) ) {
				return $content;
			}

			/*========== Set up the attributes for the caption <div>. ==========*/
			$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

			/*========== Open the caption <div>. ==========*/
			$output = '<figure' . $attributes . '>';

			/*========== Allow shortcodes for the content the caption was created for. ==========*/
			$output .= do_shortcode( $content );

			/*========== Append the caption text. ==========*/
			$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

			/*========== Close the caption </div>. ==========*/
			$output .= '</figure>';

			/*========== Return the formatted, clean caption. ==========*/

			return $output;

		} /*========== end underwood_cleaner_caption ==========*/
	}

	// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
	if ( ! function_exists( 'underwood_image_tag_class ' ) ) {
		function underwood_image_tag_class( $class, $id, $align, $size ) {
			$align = 'align' . esc_attr( $align );

			return $align;
		} /*========== end underwood_image_tag_class ==========*/
	}

	// Remove width and height in editor, for a better responsive world.
	if ( ! function_exists( 'underwood_image_editor ' ) ) {
		function underwood_image_editor( $html, $id, $alt, $title ) {
			return preg_replace( array (
					'/\s+width="\d+"/i',
					'/\s+height="\d+"/i',
					'/alt=""/i'
				), array (
					'',
					'',
					'',
					'alt="' . $title . '"'
				), $html );
		} /*========== end underwood_image_editor ==========*/
	}

	// Wrap images with figure tag. Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
	if ( ! function_exists( 'underwood_img_unautop ' ) ) {
		function underwood_img_unautop( $pee ) {
			$pee = preg_replace( '/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>',
				$pee );

			return $pee;
		} /*=========== end underwood_img_unautop ==========*/
	}