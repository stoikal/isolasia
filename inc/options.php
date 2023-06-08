<?php
// THEME
// 'red', 'orange', 'amber', 'yellow', 'lime', 'green',
// 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo',
// 'violet', 'purple', 'fuchsia', 'pink', 'rose'
$accent_color_1 = 'emerald';


// COLORS
$co_header_bg = get_theme_mod('co_header_bg', '#ffffff');
$co_header_title = get_theme_mod('co_header_title', '#000000');
$co_header_text = get_theme_mod('co_header_text', '#000000');
$co_header_border = get_theme_mod('co_header_border', '#000000');
$co_body_bg = get_theme_mod('co_body_bg', '#ffffff');
$co_footer_bg = get_theme_mod('co_footer_bg', '#ffffff');
$co_footer_text = get_theme_mod('co_footer_text', '#000000');
$co_footer_border = get_theme_mod('co_footer_border', '#000000');

// HEADER
$he_show_logo = get_theme_mod( 'he_show_logo', true );
$he_show_site_title = get_theme_mod( 'he_show_site_title', true );
$he_show_border = get_theme_mod( 'he_show_border', true );
$he_align = get_theme_mod( 'he_align', 'justify' ); // 'justify', 'center'
$he_color_bg = $co_header_bg;
$he_color_text = $co_header_text;
$he_color_title = $co_header_title;
$he_color_border = $co_header_border;
$he_border_width = get_theme_mod( 'he_border_width', 'full' );
$he_is_border_full_width = $he_border_width == 'full';
$he_max_width = 'max-w-screen-xl'; // max-w-screen-xl

// HOMEPAGE PAGE/POSTS
$ho_show_page = get_theme_mod( 'ho_show_page', true );
$ho_show_border = get_theme_mod( 'ho_show_border', false );

// SINGLE POST
$sp_font_sizes = array(
  'md' => array(
    'title' => 'text-4xl',
    'body' => 'text-base'
  ),
  'lg' => array(
    'title' => 'text-5xl',
    'body' => 'text-lg'
  )
);
$sp_thumbnail_full_width = get_theme_mod( 'sp_thumbnail_full_width', true );
$sp_font_size = get_theme_mod( 'sp_font_size', 'lg' );
$sp_font_size_title = $sp_font_sizes[$sp_font_size]['title'];
$sp_font_size_body = $sp_font_sizes[$sp_font_size]['body'];
$sp_max_width = 'max-w-screen-md'; // max-w-screen-md
$sp_image_padding = 'md:px-6';

// RECENT POSTS
$rp_gutter = get_theme_mod( 'rp_gutter_size', 2 );
$rp_is_details_outside = get_theme_mod( 'rp_is_details_outside', true );
$rp_is_rounded = get_theme_mod( 'rp_rounded_thumbnail', false );
$rp_show_frame_border = get_theme_mod( 'rp_show_frame_border', false );
$rp_color_bg_category = 'bg-black';
$rp_color_text_category = 'text-white';
$rp_max_witdh = 'max-w-screen-xl'; // max-w-screen-xl

// POPULAR POSTS
$pp_max_items = 6;
$pp_show_thumbnails = get_theme_mod( 'pp_show_thumbnails', false );
$pp_show_authors = get_theme_mod( 'pp_show_authors', true );
$pp_show_excerpts = get_theme_mod( 'pp_show_excerpts', false );
$pp_show_border = get_theme_mod( 'pp_show_border', false );

// CUSTOM CATEGORY POSTS
$cc_max_items = 6;
$cc_category_id = get_theme_mod( 'cc_category_id', '' );

// SIDEBAR
$si_show_sidebar_home = get_theme_mod( 'si_show_sidebar_home', false );
$si_show_sidebar_page = get_theme_mod( 'si_show_sidebar_page', false );
$si_show_border = get_theme_mod( 'si_show_border', false );

// FOOTER
$fo_text = get_theme_mod( 'fo_text', '' );
$fo_color_bg = $co_footer_bg;
$fo_color_text = $co_footer_text;
$fo_color_border = $co_footer_border;

