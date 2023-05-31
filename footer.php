<?php
include 'inc/options.php';
?>
  
  <footer
    class="
      text-center p-6
      border-t
    "
    style="
      background-color: <?= $fo_color_bg ?>;
      color: <?= $fo_color_text ?>;
      border-color: <?= $fo_color_border ?>;
    "
  >
    <div class="text-sm flex justify-center">
      <?php if ( has_nav_menu( 'footer_1' ) ) : ?>
      <div
        class="
          mb-6
          <?= has_nav_menu( 'footer_2' ) ? 'w-1/2 text-right' : ''?>
        "
      >
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'footer_1',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 hover:opacity-80 inline-block\">",
            'link_after' => '</span>',
            'fallback_cb' => false
          )
        );
        ?>
      </div>
      <?php endif; ?>

      <?php if ( has_nav_menu( 'footer_2' ) ) : ?>
        <div
          class="
            mb-6
            <?= has_nav_menu( 'footer_1' ) ? 'w-1/2 text-left' : ''?>
          "
        >
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'footer_2',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 hover:opacity-80 inline-block\">",
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
          class="inline-block p-1 mx-1 hover:opacity-80"
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