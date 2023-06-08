<?php
include 'homepage_page_section.php';
include 'recent_posts_section.php';
include 'popular_posts_section.php';

function front_page_panel($wp_customize) {
  $wp_customize->add_panel('front_page', array(
    'title' => 'Isolasia - Home Page',
  ));

  recent_posts_section($wp_customize);
  homepage_page_section($wp_customize);
  popular_posts_section($wp_customize);
}

add_action('customize_register', 'front_page_panel');
