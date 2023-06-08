<?php
function footer_panel($wp_customize) {
  // Add a new panel
  $wp_customize->add_panel('footer', array(
      'title' => 'Isolasia - Footer',
  ));

  // Add Section Social Links under the panel
  $wp_customize->add_section('social_links', array(
      'title' => 'Social Links',
      'panel' => 'footer',
  ));

  $socials = array(
    'Facebook' => 'facebook_link',
    'Twitter' => 'twitter_link',
    'Instagram' => 'instagram_link',
    'YouTube' => 'youtube_link',
    'TikTok' => 'tiktok_link',
  );

  foreach ($socials as $label => $setting_name) {
    $control_name = $setting_name . '_control';

    $wp_customize->add_setting($setting_name, array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control($control_name, array(
        'label' => $label,
        'section' => 'social_links',
        'settings' => $setting_name,
        'type' => 'text',
    ));
  }

  $wp_customize->add_section('footer_text_section', array(
    'title' => 'Footer Text',
    'panel' => 'footer',
  ));

  $wp_customize->add_setting('fo_text', array(
    'default' => 'Powered by Wordpress',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('fo_text_control', array(
    'label' => 'Footer Text',
    'description' => 'for copyright notice, etc',
    'section' => 'footer_text_section',
    'settings' => 'fo_text',
    'type' => 'text',
  ));
}

add_action('customize_register', 'footer_panel');
