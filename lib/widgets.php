<?php

$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
	                       'id' => 'Sidebar',
	                       'before_widget' => '<article id="%1$s" class="panel widget %2$s">',
	                       'after_widget' => '</article>',
	                       'before_title' => '<h4>',
	                       'after_title' => '</h4>'
	));
}

