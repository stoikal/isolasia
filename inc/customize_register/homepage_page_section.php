<?php

function homepage_page_section ($wp_customize) {
  $wp_customize->add_section('homepage_page', array(
    'title' => 'Homepage Page/Posts',
    'panel' => 'front_page',
  ));

  $wp_customize->add_setting('ho_show_page', array(
    'default' => true,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('ho_show_page_control', array(
    'label' => 'Show page/posts',
    'section' => 'homepage_page',
    'settings' => 'ho_show_page',
    'type' => 'checkbox',
  ));

  $wp_customize->add_setting('ho_show_border', array(
    'default' => false,
    'sanitize_callback' => 'sanitize_key',
  ));

  $wp_customize->add_control('ho_show_border_control', array(
    'label' => 'Show border',
    'section' => 'homepage_page',
    'settings' => 'ho_show_border',
    'type' => 'checkbox',
  ));
}