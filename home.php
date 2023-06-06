<?php
include 'inc/options.php';
// "Post List" Page

get_header();
?>

<div class="max-w-screen-xl mx-auto flex flex-wrap py-8 mb-20">
  <div
    class="
      w-full
      <?= $si_show_sidebar_page ? 'md:w-2/3' : '' ?>
    "
  >
    <?php get_template_part( 'template-parts/archive/post-list' );?>
  </div>

  <?php if ( $si_show_sidebar_page ) : ?>
  <div class="w-full md:w-1/3 md:pl-8">
    <aside class="<?= $si_show_border ? 'border' : '' ?> p-6">
      <?php
      if ( is_active_sidebar( 'sidebar-1' ) ) :
      ?>
  
      <div class="isolasia_sidebar-1">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
      </div><!-- .widget-area -->
  
      <?php endif; ?>
    </aside>
  </div>
  <?php endif; ?>
</div>



<?php
get_footer();
