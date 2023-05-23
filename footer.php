<?php
include 'inc/options.php';
?>
  
  <footer
    class="
      text-center p-6
      <?= $fo_color_bg ?> 
      <?= $fo_color_text ?> 
    "
  >
    <div class="text-sm flex justify-center">
      <?php if ( has_nav_menu( 'footer-1' ) ) : ?>
      <div
        class="
          mb-6
          <?= has_nav_menu( 'footer-2' ) ? 'w-1/2 text-right' : ''?>
        "
      >
        <?php
        wp_nav_menu(
          array(
            'menu' => 'footer-1',
            'theme_location' => 'footer-1',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 $fo_color_text_hover inline-block\">",
            'link_after' => '</span>',
            'fallback_cb' => false
          )
        );
        ?>
      </div>
      <?php endif; ?>

      <?php if ( has_nav_menu( 'footer-2' ) ) : ?>
        <div
          class="
            mb-6
            <?= has_nav_menu( 'footer-1' ) ? 'w-1/2 text-left' : ''?>
          "
        >
        <?php
        wp_nav_menu(
          array(
            'menu' => 'footer-2',
            'theme_location' => 'footer-2',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 $fo_color_text_hover inline-block\">",
            'link_after' => '</span>',
            'fallback_cb' => false
          )
        );
        ?>
      </div>
      <?php endif; ?>
    </div>
    <div class="mb-1">
      <?php
      $socials = array(
        'fa-facebook' => get_theme_mod('facebook_link'),
        'fa-instagram' => get_theme_mod('instagram_link'),
        'fa-twitter' => get_theme_mod('twitter_link'),
        'fa-youtube' => get_theme_mod('youtube_link'),
        'fa-tiktok' => get_theme_mod('tiktok_link')
      );

      foreach ( $socials as $icon => $link ) :
        if ( $link ) :
      ?>
        <a
          href="<?= esc_url($link) ?>"
          class="inline-block p-1 mx-1 <?= $fo_color_text_hover ?> "
        >
          <i class="fab fa-lg <?= esc_html($icon) ?>" ></i>
        </a>
      <?php
        endif;
      endforeach;
      ?>
    </div>
    <small class="mb-6">
      <?= esc_html( $fo_text ) ?>
    </small>
  </footer>
<?php
wp_footer();
?>
</body>
</html>