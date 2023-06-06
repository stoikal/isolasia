<?php
include 'inc/options.php';

$FORCE_TAILWIND_TO_GENERATE_CLASSES = 'flex flex-wrap -mx-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-1 block no-underline h-full transition border border-white hover:border-black p-4 pb-0 aspect-[4/3] w-full object-cover p-4 mb-1';

get_header();
?>

<div class="pt-8">
  <?php get_template_part( 'template-parts/front-page/recent-posts' );?>
  <div class="max-w-screen-xl mx-auto overflow-hidden">

    <div class="flex flex-wrap mb-20">
      <div
        id="main-content"
        class="
          w-full
          <?= $si_show_sidebar_home ? 'md:w-2/3' : '' ?>
        "
      >
        <?php get_template_part( 'template-parts/front-page/main-post' );?>
        <?php get_template_part( 'template-parts/front-page/popular-posts' );?>
      </div>
  
      <?php if ( $si_show_sidebar_home ) : ?>
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
      <?php endif; ?>
    </div>
  </div>
</div>

<?php
get_footer();