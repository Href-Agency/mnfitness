<?php
  $class_name = 'basic-example';
  $id = 'basic-example-' . $block['id'];

  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }

  if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
  }

  $heading = get_field('heading') ?: 'Default heading';
  $text = get_field('text');
?>

<section id="<?php echo $id; ?>" class="<?php echo $class_name; ?>">
  <div class="site-container">
    <h1><?php echo $heading; ?></h1>

    <?php echo $text; ?>
  </div>
</section>
