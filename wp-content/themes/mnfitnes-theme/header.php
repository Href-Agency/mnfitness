<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <?php 
      $logo = get_field("logo", "option");
    ?>

    <div class="site-wrapper">
      <header class="site-header">
        <div class="site-container">
          <div class="header">
            <img class="logo" src="<?php echo $logo['url']; ?>" alt="">
          </div>

          
        </div>
      </header>

      <main class="site-main">
