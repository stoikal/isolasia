<?php
include 'inc/options.php';

get_header();
?>

<div class="max-w-screen-lg mx-auto overflow-hidden pt-8">
  <?php get_template_part( 'template-parts/front-page/recent-posts' );?>

  <div class="flex flex-wrap mb-20">
    <div class="w-full md:w-2/3">
    <?php get_template_part( 'template-parts/front-page/popular-posts' );?>
    </div>

    <div class="w-full md:w-1/3 md:pl-7">
      <?php
      // class names have to be written in full to trigger tailwindcss
      $padding_x_arr = array('px-0', 'px-1', 'px-2', 'px-3', 'px-4');
      $padding_x = $padding_x_arr[$rp_gutter];

      if ( is_active_sidebar( 'sidebar-1' ) ) :
      ?>
      <aside class="p-4 <?= $si_show_border ? 'border' : '' ?>">
        <div class="isolasia_sidebar-1 <?= $padding_x ?>">
          <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- .widget-area -->
      </aside>
      <?php endif; ?>

    </div>
  </div>
</div>

<?php
get_footer();