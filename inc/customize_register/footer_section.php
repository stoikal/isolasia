<?php
function footer_section($wp_customize) {
  $wp_customize->add_section('footer_section', array(
    'title' => 'Isolasia - Footer',
  ));

  $wp_customize->add_setting('fo_text', array(
    'default' => 'Powered by Wordpress',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('fo_text_control', array(
    'label' => 'Footer Text',
    'description' => 'for copyright notice, etc',
    'section' => 'footer_section',
    'settings' => 'fo_text',
    'type' => 'text',
  ));

  $color_settings = array(
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
      'section' => 'footer_section',
      'settings' => $setting_name,
    )));
  }
}

add_action('customize_register', 'footer_section');
