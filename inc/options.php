<?php
// THEME
// 'red', 'orange', 'amber', 'yellow', 'lime', 'green',
// 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo',
// 'violet', 'purple', 'fuchsia', 'pink', 'rose'
$accent_color_1 = 'emerald';


// COLORS
$co_header_bg = get_theme_mod('co_header_bg', '#ffffff');
$co_header_text = get_theme_mod('co_header_text', '#ffffff');
$co_header_border = get_theme_mod('co_header_border', '#ffffff');
$co_body_bg = get_theme_mod('co_body_bg', '#ffffff');
$co_footer_bg = get_theme_mod('co_footer_bg', '#ffffff');
$co_footer_text = get_theme_mod('co_footer_text', '#ffffff');
$co_footer_border = get_theme_mod('co_footer_border', '#ffffff');

// HEADER
$he_show_logo = get_theme_mod( 'he_show_logo', true );
$he_show_site_title = get_theme_mod( 'he_show_site_title', true );
$he_show_border = get_theme_mod( 'he_show_border', true );
$he_align = get_theme_mod( 'he_align', 'justify' );; // 'justify', 'center'
$he_color_bg = $co_header_bg;
$he_color_text = $co_header_text;
$he_color_border = $co_header_border;

// HOMEPAGE PAGE/POSTS
$ho_show_page = get_theme_mod( 'ho_show_page', true );
$ho_show_border = get_theme_mod( 'ho_show_border', false );

// RECENT POSTS
$rp_gutter = get_theme_mod( 'rp_gutter_size', 2 );
$rp_is_details_outside = get_theme_mod( 'rp_is_details_outside', true );
$rp_is_rounded = get_theme_mod( 'rp_rounded_thumbnail', false );
$rp_show_frame_border = get_theme_mod( 'rp_show_frame_border', false );
$rp_color_bg_category = 'bg-black';
$rp_color_text_category = 'text-white';

// POPULAR POSTS
$pp_max_items = 8;
$pp_show_thumbnails = get_theme_mod( 'pp_show_thumbnails', false );
$pp_show_authors = get_theme_mod( 'pp_show_authors', true );
$pp_show_excerpts = get_theme_mod( 'pp_show_excerpts', false );
$pp_show_border = get_theme_mod( 'pp_show_border', false );

// SIDEBAR
$si_show_sidebar_home = get_theme_mod( 'si_show_sidebar_home', false );
$si_show_sidebar_page = get_theme_mod( 'si_show_sidebar_page', false );
$si_show_border = get_theme_mod( 'si_show_border', false );

// FOOTER
$fo_text = get_theme_mod( 'fo_text', '' );
$fo_color_bg = $co_footer_bg;
$fo_color_text = $co_footer_text;
$fo_color_border = $co_footer_border;

