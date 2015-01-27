<?php

register_nav_menus(array(
	'primary' => __('Primary Navigation', 'underwood'),
//	'additional' => __('Additional Navigation', 'underwood'),
//	'utility' => __('Utility Navigation', 'underwood')

	/**
	 * Off canvas Menu
	 *
	 * To use off canvas menus:
	 *
	 * 1. Uncomment the lines below to use the off-canvas menu.
	 * 2. You must also rename the views/base-offcanvas.twig -> views/base.twig. This has the template needed to allow for the use of off-canvas menus.
	 * 3. Uncomment the lines in the lib/timber_specific.php functions file.
	 */
	// 'left-off-canvas' => __('Left Off Canvas Navigation', 'underwood'),
	// 'right-off-canvas' => __('Right Off Canvas Navigation', 'underwood')
));

