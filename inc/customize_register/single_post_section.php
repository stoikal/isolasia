<?php
function single_post_section($wp_customize) {
  $wp_customize->add_section('single_post_section', array(
    'title' => 'Isolasia - Single Post',
  ));

  $wp_customize->add_setting('sp_thumbnail_full_width', array(
    'default' => true,
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('sp_thumbnail_full_width_control', array(
    'label' => 'Featured Image Size',
    'section' => 'single_post_section',
    'settings' => 'sp_thumbnail_full_width',
    'type' => 'select',
    'choices' => array(
      true => 'full',
      false => 'centered',
    ),
  ));

  $wp_customize->add_setting('sp_font_size', array(
    'default' => 'lg',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('sp_font_size_control', array(
    'label' => 'Font Size',
    'section' => 'single_post_section',
    'settings' => 'sp_font_size',
    'type' => 'select',
    'choices' => array(
      'md' => 'medium',
      'lg' => 'large',
    ),
  ));

}

add_action('customize_register', 'single_post_section');
