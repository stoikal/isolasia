<?php

function custom_category_section ($wp_customize) {
  $wp_customize->add_section('custom_category', array(
    'title' => 'Custom Category',
    'panel' => 'front_page',
  ));

  $categories = get_categories();

  $choices = array(
    '' => 'None'
  );

  foreach ($categories as $category) {
    $choices[$category->term_id] = $category->name;
  }

  $wp_customize->add_setting('cc_category_id', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_text_field',
  ));

  $wp_customize->add_control('cc_category_id_control', array(
    'label' => 'Category',
    'section' => 'custom_category',
    'settings' => 'cc_category_id',
    'type' => 'select',
    'choices' => $choices,
  ));
}