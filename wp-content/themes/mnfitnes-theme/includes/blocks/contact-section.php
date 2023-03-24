<?php
  $class_name = 'contact-section';
  $id = 'contact-section-' . $block['id'];

  if (!empty($block['anchor'])) {
    $id = $block['anchor'];
  }

  if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
  }

  
  $name = get_field("name");
  $telephone = get_field("telephone");
  $mobile = get_field("mobile");
  $email = get_field("email");
?>

<section id="contact-section" class="<?php echo $class_name; ?>">
  <div class="site-container">

    <div class="content">
      <h3><?php echo $name; ?></h3>
      <?php if ($telephone) :?>
        <a href="tel: <?php echo $telephone; ?>">t: <?php echo $telephone; ?></a>
      <?php endif ?>
      <?php if ($mobile) :?>
        <a href="tel: <?php echo $mobile; ?>">m: <?php echo $mobile; ?></a>
      <?php endif ?>

      <a href="mailto: <?php echo $email; ?>"><?php echo $email; ?></a>
    </div>
              
  </div>
</section>


