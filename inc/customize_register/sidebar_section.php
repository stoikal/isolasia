<?php
function sidebar_section($wp_customize) {
  $wp_customize->add_section('sidebar_section', array(
    'title' => 'Isolasia - Sidebar',
  ));

  $wp_customize->add_setting('si_show_sidebar_home', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('si_show_sidebar_home_control', array(
    'label' => 'Show sidebar on homepage',
    'section' => 'sidebar_section',
    'settings' => 'si_show_sidebar_home',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('si_show_sidebar_page', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('si_show_sidebar_page_control', array(
    'label' => 'Show sidebar on pages/archive',
    'section' => 'sidebar_section',
    'settings' => 'si_show_sidebar_page',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('si_show_border', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('si_show_border_control', array(
    'label' => 'Show border',
    'section' => 'sidebar_section',
    'settings' => 'si_show_border',
    'type' => 'checkbox',
  ));
}

add_action('customize_register', 'sidebar_section');
