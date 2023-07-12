<?php
include __DIR__ . '/../../inc/options.php';
?>

<div class="mb-1">
  <?php
    $icons = array(
      'facebook' => 'fab fa-facebook',
      'instagram' => 'fab fa-instagram',
      'twitter' => 'fab fa-twitter',
      'youtube' => 'fab fa-youtube',
      'tiktok' => 'fab fa-tiktok'
    );

    $menus = wp_get_nav_menus();
    $locations = get_nav_menu_locations();

    if (isset($locations['footer_socials'])) :
      $menu = get_term( $locations['footer_socials'], 'nav_menu' );
      $menu_items = wp_get_nav_menu_items($menu->term_id);

      foreach( $menu_items as $menu_item ) :
        $link = $menu_item->url;
        $title = $menu_item->title;

        $icon = $icons[strtolower($title)] ?? 'fas fa-circle'
  ?>
    <a
      href="<?= esc_url($link) ?>"
      target="__blank"
      class="inline-block p-1 mx-1 mb-px hover:mb-0 hover:border-b"
      style="
        border-color: <?= $fo_color_text ?>;
      "
    >
      <i class="fa-lg <?= esc_html($icon) ?>" ></i>
    </a>
  <?php
      endforeach;
    endif;
  ?>
</div>
