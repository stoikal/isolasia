<?php
function isolasia_theme_support() {
  /*
   * Let WordPress manage the document title.
   * This theme does not use a hard-coded <title> tag in the document head,
   * WordPress will provide it for us.
   */
  add_theme_support('custom-logo');


  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'isolasia_theme_support');

function isolasia_menus() {
  /*
   * Register nav menu
   */
  register_nav_menus(
    array(
      'primary' => 'Header Menu',
      'footer-1' => 'Footer Menu 1',
      'footer-2' => 'Footer Menu 2'
    )
  );
}

add_action('after_setup_theme', 'isolasia_menus');


function isolasia_register_styles() {
  $version = wp_get_theme()->get('Version');
  wp_enqueue_style('isolasia-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
}

add_action('wp_enqueue_scripts', 'isolasia_register_styles');

function isolasia_register_scripts() {
  wp_enqueue_script('isolasia-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'isolasia_register_scripts');

function isolasia_widgets_init() {

	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'isolasia' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here to appear in your page and archive sidebar.', 'isolasia' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'isolasia_widgets_init' );

#region CUSTOMIZER SETTINGS
require 'inc/customize_register/header_section.php';
require 'inc/customize_register/front_page_panel.php';
require 'inc/customize_register/sidebar_section.php';
require 'inc/customize_register/footer_panel.php';
#endregion CUSTOMIZER SETTINGS

function mytheme_customize_register( WP_Customize_Manager $wp_customize ) {
  $wp_customize->selective_refresh->add_partial( 'blogname', array(
      'selector' => '.site-title a',
      'render_callback' => function() {
          bloginfo( 'name' );
      },
  ) );
}
