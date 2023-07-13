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

  <?php
  switch ($he_align) {
    case 'justify':
      get_template_part( 'template-parts/header/header-layout-justify' );
      break;
    case 'center':
      get_template_part( 'template-parts/header/header-layout-center' );
      break;
  }
  ?>

  <!-- #region Side Drawer -->
  <div
    id="side-drawer-overlay"       
    role="button"
    class="invisible fixed overflow-hidden top-0 left-0 w-full h-full z-10 bg-[rgba(0,0,0,0.5)]"
  >
  </div>

  <div
    id="side-drawer"
    class="
      md:hidden transition duration-200 fixed overflow-hidden top-0 left-0 h-full bg-white z-20 -translate-x-full p-4
      <?= $da_color_bg ?>
      <?= $da_color_text ?>
    "
  >
    <nav class="py-6 pr-14">
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'primary',
            'menu_class' => 'isolasia_primary-menu-sidebar',
            'fallback_cb' => false
          )
        );
        ?>
      <?php endif; ?>
    </nav>
  </div>
  <!-- #endregion -->