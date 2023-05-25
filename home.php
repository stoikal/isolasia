<?php
include 'inc/options.php';

get_header();
?>

<div class="max-w-screen-lg mx-auto flex flex-wrap py-8 mb-20">
  <div class="w-full md:w-2/3">
    <main class="p-6 flex flex-wrap">  
      <?php
      if ( have_posts() ) :
        // Load posts loop.
        while ( have_posts() ) :
          the_post();

          $author_name = get_the_author();
          $post_permalink = get_permalink();
      ?>
          <article class="w-full sm:w-1/2 p-4 mb-3">
            <div class="mb-1">
              <a href="<?= esc_url( $post_permalink ); ?>" class="aspect-[4/3] flex inline-block">
                <?php the_post_thumbnail('medium', ['class' => 'object-cover'])?>
              </a>
            </div>
            <h1 class="text-xl font-display mb-1">
              <a
                href="<?= esc_url( $post_permalink ); ?>"
                class="hover:underline"
              >
                <?= the_title(); ?>
              </a>
            </h1>
            <p class="text-sm">
              <span>
                <?= $author_name; ?>
              </span>
            </p>
          </article>
          <?php endwhile; ?>
      <?php endif; ?>
    </main>

    <nav class="isolasia_posts-page-pagination px-10 text-left">
      <?php
      global $wp_query;

      $big = 999999999; // Set a big number to ensure pagination works

      echo paginate_links(array(
          'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
          'format' => '?paged=%#%',
          'current' => max(1, get_query_var('paged')),
          'total' => $wp_query->max_num_pages,
          'prev_text' => __('&laquo; Previous'),
          'next_text' => __('Next &raquo;'),
      ));
      ?>
    </nav>
  </div>

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
</div>



<?php
get_footer();
