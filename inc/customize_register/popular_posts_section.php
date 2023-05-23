<?php
function popular_posts_section($wp_customize) {
  $wp_customize->add_section('popular_posts', array(
      'title' => 'Popular Posts',
      'panel' => 'front_page',
  ));

  $wp_customize->add_setting('pp_show_excerpts', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('pp_show_excerpts_control', array(
    'label' => 'Show excerpts',
    'section' => 'popular_posts',
    'settings' => 'pp_show_excerpts',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('pp_show_border', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('pp_show_border_control', array(
    'label' => 'Show border',
    'section' => 'popular_posts',
    'settings' => 'pp_show_border',
    'type' => 'checkbox',
  ));
}
