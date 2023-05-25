<?php
// THEME
// 'red', 'orange', 'amber', 'yellow', 'lime', 'green',
// 'emerald', 'teal', 'cyan', 'sky', 'blye', 'indigo',
// 'violet', 'purple', 'fuchsia', 'pink', 'rose'
$accent_color_1 = 'emerald';

// HEADER
$he_show_logo = get_theme_mod( 'he_show_logo', true );
$he_show_site_title = get_theme_mod( 'he_show_site_title', true );
$he_show_border = get_theme_mod( 'he_show_border', true );
$he_align = get_theme_mod( 'he_align', 'justify' );; // 'justify', 'center'
$he_color_link_hover = 'hover:text-emerald-900';

// HOMEPAGE PAGE/POSTS
$ho_show_page = get_theme_mod( 'ho_show_page', true );
$ho_show_border = get_theme_mod( 'ho_show_border', false );

// RECENT POSTS
$rp_gutter = get_theme_mod( 'rp_gutter_size', 2 );
$rp_is_rounded = get_theme_mod( 'rp_rounded_thumbnail', false );
$rp_large_first_thumbnail = get_theme_mod( 'rp_large_first_thumbnail', false );;
$rp_show_frame_border = get_theme_mod( 'rp_show_frame_border', false );
$rp_color_bg_category = 'bg-emerald-700';

// POPULAR POSTS
$pp_max_items = 8;
$pp_show_thumbnails = get_theme_mod( 'pp_show_thumbnails', false );
$pp_show_authors = get_theme_mod( 'pp_show_authors', true );
$pp_show_excerpts = get_theme_mod( 'pp_show_excerpts', false );
$pp_show_border = get_theme_mod( 'pp_show_border', false );

// SIDEBAR
$si_show_border = get_theme_mod( 'si_show_border', false );

// FOOTER
$fo_text = get_theme_mod( 'fo_text', '' );
$fo_color_bg = 'bg-stone-950';
$fo_color_text = 'text-stone-300';
$fo_color_text_hover = 'hover:text-stone-400';
