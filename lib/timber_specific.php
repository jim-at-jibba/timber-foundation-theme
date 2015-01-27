<?php

/**
 * Timber Specific Functions
 *
 * @package  	WordPress
 * @subpackage  Underwood
 * @since    	Underwood 0.0.1
 */

add_filter('timber_context', 'add_to_context');
function add_to_context($data){
	/* So here you are adding data to Timber's context object, i.e... */
	$data['foo'] = 'I am some other typical value set in your functions.php file, unrelated to the menu';

	/* Now, in similar fashion, you add a Timber menu and send it along to the context.*/
	$data['menu'] = new TimberMenu('primary');

	/**
	 * Off canvas menus
	 *
	 * 1. Uncomment the lines below to use the off-canvas menu.
	 * 2. You must also rename the views/base-offcanvas.twig -> views/base.twig. This has the template needed to allow for the use of off-canvas menus.
	 * 3. Uncomment the lines in the lib/navigation.php functions file.
	 */
	// $data['left_off_canvas'] = new TimberMenu('left-off-canvas');
	// $data['right_off_canvas'] = new TimberMenu('right-off-canvas');
	return $data;
}

