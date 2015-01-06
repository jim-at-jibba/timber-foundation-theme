<?php
	/**
	 * The Template for displaying all single posts
	 *
	 * Methods for TimberHelper can be found in the /functions sub-directory
	 *
	 * @package     WordPress
	 * @subpackage  Timber
	 * @since       Timber 0.1
	 */

	//	For fullscreen template change to true
	$full_screen     = false;
	$context         = Timber::get_context();
	$post            = Timber::query_post();
	$context['post'] = $post;
	$context['wp_title'] .= ' - ' . $post->title();
	$context['comment_form'] = TimberHelper::get_comment_form();

	/* Dynamic Sidebar */
	$context['sidebar'] = Timber::get_widgets( 'Sidebar' );

	if ( post_password_required( $post->ID ) ) {
		Timber::render( 'single-password.twig', $context );
	} elseif ( $full_screen ) {
		Timber::render( 'single-full.twig', $context );
	} else {
		Timber::render( array (
			'single-' . $post->ID . '.twig',
			'single-' . $post->post_type . '.twig',
			'single.twig'
		), $context );
	}


