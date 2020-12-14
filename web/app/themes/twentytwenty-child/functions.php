<?php

  add_action('wp_enqueue_scripts', 'tt_child_enqueue_parent_styles');

  function tt_child_enqueue_parent_styles()
  {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('flickity-style', 'https://unpkg.com/flickity@2/dist/flickity.min.css');
    wp_enqueue_script('flickity-script', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array(), null);
  }

  add_action('after_theme_setup', 'paa_setup');
function paa_setup()
{
    add_image_size('paa-thumb', 300);
}

  function write_log( $log )
  {
      if ( is_array( $log ) || is_object( $log ) ) {
          error_log( print_r( $log, true ) );
      } else {
          error_log( $log );
      }
  }
