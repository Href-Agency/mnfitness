<?php
// WordPress theme supports.
$markup = array('search-form', 'comment-form', 'comment-list');

add_theme_support('post-thumbnails');
add_theme_support('html5', $markup);
remove_theme_support('core-block-patterns');

// WordPress image sizes.
add_image_size('landscape_banner', 1920, 1080, true);

// WordPress navigation menus.
$nav_menus = array(
  'header' => 'Header Navigation',
  'footer' => 'Footer Navigation'
);

register_nav_menus($nav_menus);