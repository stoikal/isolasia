<?php
include __DIR__ . '/../../inc/options.php';
?>

<main class="p-6 flex flex-wrap">  
  <?php
  if ( have_posts() ) :
    // Load posts loop.
    while ( have_posts() ) :
      the_post();

      $post_permalink = get_permalink();
      $thumbnail_url = get_the_post_thumbnail_url();
      $author_name = get_the_author();
      $author_id = get_the_author_meta( 'ID' );
      $author_url = get_author_posts_url( $author_id );
      $excerpt = get_the_excerpt();
      $date = get_the_date();
      $month = get_the_date('m');
      $year = get_the_date('Y');
      $month_link = get_month_link($year, $month);
  ?>
    <article
      class="
        w-full p-4 mb-3
        <?= $si_show_sidebar_page ? 'sm:w-1/2' : 'sm:w-1/2 md:w-1/3 lg:w-1/4' ?>
      "
    >
      <?php if (has_post_thumbnail()) : ?>
      <div class="mb-4">
        <a
          href="<?= esc_url( $post_permalink ); ?>"
          class="aspect-[4/3] inline-block group overflow-hidden"
        >
          <img
            src="<?= esc_url( $thumbnail_url )?>"
            class="w-full h-full object-cover group-hover:scale-105 transition"
          >
        </a>
      </div>
      <?php endif; ?>

      <h1 class="text-lg font-display mb-4">
        <a
          href="<?= esc_url( $post_permalink ); ?>"
          class="hover:underline"
        >
          <?= the_title(); ?>
        </a>
      </h1>
      <p class="mb-6 text-sm">
        <?= esc_html( $excerpt ) ?>
      </p>
      <p class="mb-4 text-sm">
        <span>
          <a
            href="<?= esc_url( $author_url )?>"
            class="font-bold hover:underline"
          >
            <?= esc_html( $author_name ); ?>
          </a>
        </span>
        <span>
          &bull;
        </span>
        <span class="text-gray-700 <?= $da_color_text_muted ?>">
          <a
            href="<?= esc_url( $month_link )?>"
            class="hover:underline"
          >
            <?= esc_html( $date ); ?>
          </a>
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