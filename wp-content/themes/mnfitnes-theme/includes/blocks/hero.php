<?php
  $class_name = 'hero';
  $id = 'hero-' . $block['id'];

  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }

  if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
  }

  $heading = get_field('heading') ?: 'Default heading';
  $text = get_field('sub_heading');
  $json_animation = get_field('json_animation');
?>

<section id="<?php echo $id; ?>" class="<?php echo $class_name; ?>">
  <div class="site-container">
    <?php if( have_rows('bg_img_silder') ): ?>
      <div class="bg-img-slider">
        <div class="swiper-wrapper">
        <?php while( have_rows('bg_img_silder') ): the_row(); 
          $image = get_sub_field('image');
          ?>
            <div class="image swiper-slide" style="background-image: url(<?php echo $image['url']; ?>)"></div>
        <?php endwhile; ?>
        </div>
      </div>
    <?php endif; ?>
    <div class="content">
      <div class="text">
        <h1><?php echo $heading; ?></h1>
        <p><?php echo $text; ?></p>
        <a href="#contact-section">
          <img id="arrow_down" src="/wp-content/uploads/2022/07/arrow_down.png" alt="">
        </a>
      </div>
    </div>
  </div>
</section>
