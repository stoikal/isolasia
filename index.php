<?php
include 'inc/options.php';
// "Page" Page

get_header();
?>

<div class="max-w-screen-lg mx-auto flex flex-wrap py-8 mb-20">
  <div
    class="
      w-full
      <?= $si_show_sidebar_page ? 'md:w-2/3' : '' ?>
    "
  >
    <main class="p-6">  
      <?php
        if ( have_posts() ) :
          // Load posts loop.
          while ( have_posts() ) :
            the_post();
      
      ?>
        <article>
          <h1 class="text-4xl font-serif mb-8">
            <?= the_title(); ?>
          </h1>
          <div class="isolasia_post-content">
            <?= the_content(); ?>
          </div>
        </article>
        <?php endwhile; ?>
      <?php endif; ?>
      </article>
    </main>
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
