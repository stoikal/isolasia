<?php
include __DIR__ . '/../../inc/options.php';

if ( $ho_show_page && have_posts() ) :
  $margin_x_arr = array('mx-0', 'mx-1', 'mx-2', 'mx-3', 'mx-4');
  $margin_x = $margin_x_arr[$rp_gutter];
  // Load posts loop.
  while ( have_posts() ) :
    the_post();

?>
  <article
    class="
      p-4 mb-10
      <?= $ho_show_border ? 'border' : '' ?>
    "
  >
    <div
      class="
        mb-4 border-b border-black
        <?= $margin_x ?>
      "
    >
      <h2 class="font-display text-xl uppercase">
        <?= the_title(); ?>
      </h2>
    </div>
    <div class="isolasia_post-content <?= $margin_x ?>">
      <?= the_content(); ?>
    </div>
  </article>
  <?php endwhile; ?>

<?php
endif;