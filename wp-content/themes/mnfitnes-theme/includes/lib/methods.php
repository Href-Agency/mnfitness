<?php
/**
 * On post types & 404 pages by default, the menu item for your blog
 * index would have a "current_page_parent" class, this removes that
 * to prevent user confusion.
 *
 * Add your custom post type keys to the array to activate this.
 */
function fix_blog_menu_css_class($classes, $item) {
  $post_types = ['custom_post_type'];
  $page_for_posts = get_option('page_for_posts');

  if (is_singular($post_types) || is_post_type_archive($post_types) || is_404()) {
    if ($item->object_id == $page_for_posts) {
      $key = array_search('current_page_parent', $classes);

      if (false !== $key) {
        unset($classes[$key]);
      }
    }
  }

  return $classes;
}

/**
 * Add the format dropdown to the WYSIWYG.
 */
function wysiwyg_add_formats_select($buttons) {
  array_unshift($buttons, 'styleselect');

  return $buttons;
}

/**
 * Allow us to add elements with classes to the format select on the WYSIWYG.
 * This can be easier than remembering shortcodes for custom classes.
 */
function wysiwyg_custom_formats($formats) {
  $custom_formats = [
    [
      'title' => 'Small',
      'block' => 'small',
      'classes' => '',
      'wrapper' => true
    ]
  ];

  $formats['style_formats'] = json_encode($custom_formats);

  return $formats;
}

/**
 * Update the "excerpt_length" value.
 */
function new_excerpt_length($length) {
  return 32;
}

/**
 * Update the "excerpt_more" value.
 */
function new_excerpt_more($more) {
  return '...';
}

/**
 * Ensures the Yoast SEO metabox is at the bottom of the page.
 */
function change_seo_metabox_priority() {
  return 'low';
}

/**
 * Neatly "print_r" an array for better debugging.
 * Can also use "var_dump" by setting "$dump" to true. 
 */
function print_a($array, $dump = false) {
  echo '<pre style="box-sizing: border-box; width: 100%; padding: 3%; background: #444; color: #F2F2F2;">';
 
  if ($dump) {
    var_dump($array);
  } else {
    print_r($array);
  }

  echo '</pre>';
}

/**
 * Return a placeholder image at a specified width / height.
 * Can also customise the background colour/text colour.
 */
function placeholder($width = 300, $height = 300, $bg = '273640', $colour = 'fff') {
  return '<img class="placeholder" src="http://placehold.it/' . $width . 'x' . $height . '/' . $bg . '/' . $colour . '/" alt="Placeholder" width="' . $width . '" height="' . $height . '"/>';
}

/**
 * Apply some styles to the head to ensure the 
 * Gutenburg layout has more space.
 */
function editor_full_width_gutenberg() {
	echo "
		<style>
			body.gutenberg-editor-page .editor-post-title__block,
			body.gutenberg-editor-page .editor-default-block-appender,
			body.gutenberg-editor-page .editor-block-list__block,
			.block-editor__container .wp-block {
				max-width: 90% !important;
			}
		</style>
	";
}

/**
 * Example of a custom action to use via admin AJAX.
 * 
 * function example_admin_ajax() {
 *   echo "working!";
 *   die();
 * }
 */


/**
 * Returns a formatted link from a supplied ACF link field.
*/
function acf_link($link = null, $classes = []) {
  if (!$link) return;

  if (!$link['target']) $link['target'] = '_self';

  $classes = (is_array($classes) && !empty($classes)) ? implode(' ', $classes) : $classes;
  $class_str = ($classes) ? ' class="' . $classes . '"' : '';

  return "
    <a href='{$link['url']}' target='{$link['target']}'${class_str}>{$link['title']}</a>
  ";
}