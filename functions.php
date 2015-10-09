<?php
/**
 * Author: James Best
 * URL: http://justjibba.net/
 */

	/*
	1. lib/clean.php
	  - head cleanup
	  - post and images related cleaning
	  - enquire scripts and styles
	*/
	require_once( 'lib/clean.php' ); // do all the cleaning and enqueue here

	/*
	2. lib/navigation.php
		- set navigation
	*/
	require_once('lib/navigation.php'); // setup site wide menus

	/*
	3. lib/theme_support.php - http://codex.wordpress.org/Function_Reference/add_theme_support
		- add theme support
	*/
	require_once( 'lib/theme_support.php' );

	/*
	4. lib/widgets.php - http://codex.wordpress.org/Widgetizing_Themes
		- add custom widget areas
	*/
	require_once( 'lib/widgets.php' );

	/*
	5. lib/timber_specific.php - https://github.com/jarednova/timber/wiki
		- adding to the timber context
		- timber specific functions
	*/
	require_once( 'lib/timber_specific.php' );
	

	/*
	 6. lib/filters.php - https://codex.wordpress.org/Function_Reference/add_filter
	- add custom filters
	*/
	require_once( 'lib/filters.php' );
	







