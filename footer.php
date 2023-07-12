<?php
include 'inc/options.php';
?>
  
  <footer
    class="
      text-center p-6
      border-t
      <?= $da_color_bg ?>
      <?= $da_color_border ?>
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
            'menu_class' => '',
            'items_wrap' => '<ul class="%2$s">%3$s</ul>',
            'link_before' => "<span class=\"p-2 hover:underline inline-block\">",
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
            'link_before' => "<span class=\"p-2 hover:underline inline-block\">",
            'link_after' => '</span>',
            'fallback_cb' => false
          )
        );
        ?>
      </div>
      <?php endif; ?>
    </div>

    <?php get_template_part( 'template-parts/footer/social-links' );?>

    <small class="mb-6">
      <?= esc_html( $fo_text ) ?>
    </small>
  </footer>
<?php
wp_footer();
?>
</body>
</html>