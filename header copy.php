<?php
include 'inc/options.php';
?>

<!doctype html>
<html
  <?php language_attributes(); ?>
  class="dark"
>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Source+Serif+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet"> 

  <?php wp_head(); ?>
</head>
<body
  class="
    <?= $da_color_bg ?>
    <?= $da_color_text ?>
  "
  style="background-color: <?= $co_body_bg ?> "
>
	<a
    href="#main-content"
    type="button"
    class="absolute -translate-y-full focus:translate-y-0 bg-white p-2 z-10"
  >
    skip to content
  </a>

	<header
    class="
      relative
      <?= $da_color_bg ?>
      <?= $da_color_text ?>
      <?= ($he_show_border && $he_is_border_full_width) ? 'border-b' : ''?>
    "
    style="
      background-color: <?= $he_color_bg ?>;
      color: <?= $he_color_text ?>;
      border-color: <?= $he_color_border ?>;
    "
  >
    <div
      class="
        mx-auto md:px-4
        <?= $he_max_width ?>
      "
    >
      <div
        class="
          flex items-end
          <?= ($he_show_border && !$he_is_border_full_width) ? 'border-b' : ''?>
        "
        style="
          border-color: <?= $he_color_border ?>;
        "
      >
        <?php if ( $he_align == 'center' ) : ?>
          <div class="md:hidden h-14 w-14"></div>
        <?php endif; ?>
  
        <div
          class="
            flex-1 items-end
            <?= $he_align == 'justify' ? 'flex pl-4 py-2' : 'text-center py-4' ?>
          "
        >
          <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
  
          if ( $he_show_logo && $logo_url ) :
          ?>
          <div class="flex-shrink-0 flex align-baseline justify-center">
            <a href="/" class="inline-block ">
              <img
                src="<?=esc_url($logo_url)?>"
                alt="logo"
                loading="lazy"
              >
            </a>
          </div>
          <?php endif;?>
  
          
          <?php if ( $he_show_site_title && get_bloginfo( 'name' ) ) : ?>
            <h1
              class="w-full text-2xl pl-2 font-display <?= $da_color_text ?>"
              style="
                color: <?= $he_color_title ?>;
              "
            >
              <a href="/" class="hover:underline">
                <?php bloginfo( 'name' ); ?>
              </a>
            </h1>
          <?php endif;?>
        </div>
  
        <div class="md:block flex-0 px-1">
          <button
            id="side-drawer-trigger"
            type="button"
            class="md w-11 h-11"
          >
            <i class="fas fa-search fa-lg"></i>
          </button>
          <button
            id="side-drawer-trigger"
            type="button"
            class="md:hidden w-11 h-11"
          >
            <i class="fas fa-bars fa-lg"></i>
          </button>
        </div>
      </div>
    </div>
  </header>

  <?php if ( $he_align == 'center' ) : ?>
  <nav
    class="
      hidden md:block
      <?= $da_color_bg ?>
      <?= $da_color_text ?>
      <?= ($he_show_border && $he_is_border_full_width) ? 'border-b' : ''?>
    "
    style="
      background-color: <?= $he_color_bg ?>;
      color: <?= $he_color_text ?>;
      border-color: <?= $he_color_border ?>;
    "
  >
    <div
      class="
        mx-auto md:px-4
        <?= $he_max_width ?>
      "
    >
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <div
        class="
          text-center flex justify-center
          <?= ($he_show_border && !$he_is_border_full_width) ? 'border-b' : ''?>
        "
        style="
          border-color: <?= $he_color_border ?>;
        "
      >
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'menu_class' => 'isolasia_primary-menu',
            'fallback_cb' => false
          )
        );
        ?>
      </div>
      <?php endif; ?>
    </div>
  </nav>
  <?php endif; ?>
