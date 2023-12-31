<?php
function colors_section($wp_customize) {
  $wp_customize->add_section('colors_section', array(
    'title' => 'Isolasia - Colors',
  ));

  $color_settings = array(
    'co_header_bg' => ['Header Background', '#528f67'],
    'co_header_title' => ['Header Title', '#000000'],
    'co_header_text' => ['Header Text', '#ffea64'],
    'co_header_border' => ['Header Border', '#000000'],
    'co_body_bg' => ['Body Background', '#ffffff'],
    'co_footer_bg' => ['Footer Background', '#528f67'],
    'co_footer_text' => ['Footer Text', '#ffea64'],
    'co_footer_border' => ['Footer Border', '#528f67'],
  );

  foreach ($color_settings as $setting_name => $options) {
    $control_name = $setting_name . '_control';
    $label = $options[0];
    $default = $options[1];

    $wp_customize->add_setting($setting_name, array(
        'default' => $default,
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $control_name, array(
      'label' => $label,
      'section' => 'colors_section',
      'settings' => $setting_name,
    )));
  }
}

add_action('customize_register', 'colors_section');
