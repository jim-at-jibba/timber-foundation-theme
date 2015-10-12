<?php

add_filter('post_gallery', 'foundationGallery', 10, 2);

function foundationGallery($string, $attr) {

    $context               = Timber::get_context();
    $context['posts']      = Timber::get_posts(array(
            'post_type' => 'attachment',
            'post_status' => 'inherit',
            'post__in' => explode(',', $attr['ids']),
            'orderby' => 'post__in',
            'numberposts' => -1
    ));
     
    return Timber::compile('gallery.twig', $context);
}