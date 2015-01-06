<?php

/**
 * Timber Specific Functions
 */

add_filter('timber_context', 'add_to_context');
function add_to_context($data){
	/* So here you are adding data to Timber's context object, i.e... */
	$data['foo'] = 'I am some other typical value set in your functions.php file, unrelated to the menu';

	/* Now, in similar fashion, you add a Timber menu and send it along to the context.*/
	$data['menu'] = new TimberMenu('primary'); // This is where you can also send a Wordpress menu slug or ID
	return $data;
}

