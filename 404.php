<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  	WordPress
 * @subpackage  Underwood
 * @since    	Underwood 0.0.1
 */

	$context = Timber::get_context();

	/* Dynamic Sidebar */
	$context['sidebar'] = Timber::get_widgets( 'Sidebar' );

	Timber::render('404.twig', $context);
