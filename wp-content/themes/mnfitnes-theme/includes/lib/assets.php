<?php
function script_enqueues() {
  if (wp_script_is('jquery', 'registered')) {
    wp_deregister_script('jquery');
  }

  //Main scripts.
  wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', array(), '3.3.1', true);
  wp_enqueue_script('swipe', "https://unpkg.com/swiper@7/swiper-bundle.min.js");
  if (is_front_page()) {
    wp_enqueue_script('lottie-js', "https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.1/lottie.js", array(), '1.0.0', true);  
  }
  wp_enqueue_script('main-scripts', get_template_directory_uri() . '/dist/main.min.js', array('jquery', 'lottie-js'), '1.0.0', true);

  //Stylesheets.
  wp_enqueue_style('swipe-styles', "https://unpkg.com/swiper@7/swiper-bundle.min.css");
  wp_enqueue_style('main-styles', get_template_directory_uri() . '/dist/main.min.css', false, '1.0.0', 'all');

  /**
   * Example of how to expose endpoints/data to a script for use with admin AJAX.
   * wp_localize_script('main-scripts', 'ajaxData', array(
   *   'ajax_url' => admin_url('admin-ajax.php?action=action_name')
   * ));
   */

  /**
   * Example of how to include Google Maps on a certain template.
   * MAPS_API_KEY is defined in definitions.php.
   *
   * if (is_page_template(array('templates/with-map.php'))) {
   *   wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?key=' . MAPS_API_KEY, array(), '3.0', true);
   * }
   */
}