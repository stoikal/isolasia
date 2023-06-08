<?php
function recent_posts_section($wp_customize) {
  $wp_customize->add_section('recent_posts', array(
      'title' => 'Recent Posts',
      'panel' => 'front_page',
  ));

  $wp_customize->add_setting( 'rp_gutter_size', array(
    'default' => 3,
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'rp_gutter_size_control', array(
    'label' => 'Gutter Size',
    'section' => 'recent_posts',
    'settings' => 'rp_gutter_size',
    'type' => 'select',
    'choices' => array(
      0 => '0',
      1 => '1',
      2 => '2',
      3 => '3',
      4 => '4',
    ),
  ));

  $wp_customize->add_setting('rp_is_details_outside', array(
    'default' => true,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('rp_is_details_outside_control', array(
    'label' => 'Show details outside of thumbnails',
    'section' => 'recent_posts',
    'settings' => 'rp_is_details_outside',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('rp_rounded_thumbnail', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('rp_rounded_thumbnail_control', array(
    'label' => 'Make thumbnail rounded',
    'section' => 'recent_posts',
    'settings' => 'rp_rounded_thumbnail',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('rp_show_frame_border', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('rp_show_frame_border_control', array(
    'label' => 'Show frame border',
    'section' => 'recent_posts',
    'settings' => 'rp_show_frame_border',
    'type' => 'checkbox',
  ));
}
