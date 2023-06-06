<?php
function header_section($wp_customize) {
  $wp_customize->add_section('header_section', array(
    'title' => 'Isolasia - Header',
  ));

  $wp_customize->add_setting('he_show_logo', array(
    'default' => true,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('he_show_logo_control', array(
    'label' => 'Show logo',
    'section' => 'header_section',
    'settings' => 'he_show_logo',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('he_show_site_title', array(
    'default' => true,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('he_show_site_title_control', array(
    'label' => 'Show site title',
    'section' => 'header_section',
    'settings' => 'he_show_site_title',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('he_show_border', array(
    'default' => true,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('he_show_border_control', array(
    'label' => 'Show border',
    'section' => 'header_section',
    'settings' => 'he_show_border',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting( 'he_align', array(
    'default' => 'justify',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control( 'he_align_control', array(
    'label' => 'Header Align',
    'section' => 'header_section',
    'settings' => 'he_align',
    'type' => 'select',
    'choices' => array(
      'justify' => 'Justify',
      'center' => 'Center',
    ),
  ));

  $color_settings = array(
    'co_header_bg' => ['Background Color', '#ffffff'],
    'co_header_title' => ['Title Color', '#000000'],
    'co_header_text' => ['Text Color', '#000000'],
    'co_header_border' => ['Border Color', '#000000'],
  );

  foreach ($color_settings as $setting_name => $options) {
    $control_name = 'header_' . $setting_name . '_control';
    $label = $options[0];

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $control_name, array(
      'label' => $label,
      'section' => 'header_section',
      'settings' => $setting_name,
    )));
  }
}

add_action('customize_register', 'header_section');
