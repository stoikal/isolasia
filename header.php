<?php
include 'inc/options.php';
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400&family=Fjalla+One&family=Raleway:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet"> 
	<?php wp_head(); ?>
</head>
<body>
	<a
    href="#primary"
    type="button"
    class="absolute -translate-y-full focus:translate-y-0 bg-white p-2 z-10"
  >
    skip to content
  </a>

	<header
    class="
      relative
      <?= $he_show_border ? 'border-b' : ''?>
    "
  >
    <div class="max-w-screen-lg mx-auto flex items-end">
      <?php if ( $he_align == 'center' ) : ?>
      <div class="md:hidden h-14 w-14"></div>
      <?php endif; ?>

      <div
        class="
          flex-1 p-3 items-end
          <?= $he_align == 'justify' ? 'flex' : 'text-center' ?>
        "
      >
        <?php
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

        if ( $he_show_logo && $logo_url ) :
        ?>
        <a href="/" class="inline-block flex-shrink-0">
          <img
            src="<?=esc_url($logo_url)?>"
            alt="logo"
          >
        </a>
        <?php endif;?>

        
        <?php if ( $he_show_site_title && get_bloginfo( 'name' ) ) : ?>
          <a href="/">
            <h1 class="w-full text-2xl py-1 px-2 font-display">
              <?php bloginfo( 'name' ); ?>
            </h1>
          </a>
        <?php endif;?>
      </div>

      <?php if ( $he_align == 'justify' ) : ?>
      <nav class="p-3 hidden md:block">
        <div class="max-w-full mx-auto text-center flex justify-center">
          <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <?php
            wp_nav_menu(
              array(
                'menu' => 'primary',
                'menu_class' => 'isolasia_primary-menu',
                'theme_location' => 'primary',
                'items_wrap' => '<ul class="%2$s">%3$s</ul>',
                'link_before' => "<span class=\"p-2 $he_color_link_hover inline-block\">",
                'link_after' => '</span>',
                'fallback_cb' => false
              )
            );
            ?>
          <?php endif; ?>
        </div>
      </nav>
      <?php endif; ?>

      <div class="md:hidden flex-0 p-1 py-1.5">
        <button
          id="side-drawer-trigger"
          type="button"
          class="w-12 h-12 pb-0.5"
        >
          <i class="fas fa-bars fa-lg"></i>
        </button>
      </div>
    </div>
  </header>

  <?php if ( $he_align == 'center' ) : ?>
  <nav
    class="
      hidden md:block
      <?= $he_show_border ? 'border-b' : ''?>
    "
  >
    <div class="max-w-full mx-auto text-center flex justify-center">
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <?php
        wp_nav_menu(
          array(
            'menu' => 'primary',
            'menu_class' => 'isolasia_primary-menu',
            'theme_location' => 'primary',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 $he_color_link_hover inline-block\">",
            'link_after' => '</span>',
            'fallback_cb' => false
          )
        );
        ?>
      <?php endif; ?>
    </div>
  </nav>
  <?php endif; ?>

  <div
    id="side-drawer-overlay"       
    role="button"
    class="invisible fixed overflow-hidden top-0 left-0 w-full h-full z-10 bg-[rgba(0,0,0,0.5)]"
  >
  </div>

  <div
    id="side-drawer"
    class="transition duration-200 fixed overflow-hidden top-0 left-0 h-full bg-white z-20 -translate-x-full p-4"
  >
    <nav class="py-6 pr-14">
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <?php
        wp_nav_menu(
          array(
            'menu' => 'primary',
            'menu_class' => 'isolasia_primary-menu-sidebar',
            'theme_location' => 'primary',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 $he_color_link_hover inline-block\">",
            'link_after' => '</span>',
            'fallback_cb' => false
          )
        );
        ?>
      <?php endif; ?>
    </nav>
  </div>