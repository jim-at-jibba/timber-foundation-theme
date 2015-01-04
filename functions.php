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