<?php
include __DIR__ . '/../../inc/options.php';

$margin_x_arr = array('mx-0', 'mx-1', 'mx-2', 'mx-3', 'mx-4');
$title_margin_x = $margin_x_arr[$rp_gutter];

// Retrieve 5 most recent posts
$popular_posts = get_posts(
  array(
    'numberposts' => $pp_max_items,
    'post_type' => 'post', // Post type
    'orderby' => 'comment_count', // Order by comment count
    'order' => 'DESC', // Sort in descending order
  )
);

if ( count($popular_posts) > 0 ):
?>

<section
  class="
    overflow-hidden p-4
    <?= $pp_show_border ? 'border' : '' ?>
  "
>
  <div
    class="
      mb-4 border-b border-gray-200
      <?= $title_margin_x ?>
    "
  >
    <span class="font-display">
      TERPOPULER
    </span>
  </div>
  <?php
  foreach ($popular_posts as $post):
    $post_id = $post->ID;
    $post_title = $post->post_title;
    $post_excerpt = get_the_excerpt();
    $post_link = get_permalink($post_id);
    $thumbnail_url = get_the_post_thumbnail_url($post_id);
    $post_categories = get_the_category($post_id);
    $post_author = get_the_author($post_id);
    $post_author_id = $post->post_author;
    $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
  ?>
  <div class="flex p-2 mb-3">

    <?php if ( $pp_show_thumbnails) :?>
    <div class="w-1/3">
      <a href="<?= esc_url($post_link)?>">
        <img
          src=<?= esc_url($thumbnail_url) ?>
          class="object-cover w-full aspect-[4/3]"
          loading="lazy"
        >
      </a>
    </div>
    <?php endif; ?>

    <div
      class="
        pr-2 text-left
        <?= $pp_show_thumbnails ? 'w-2/3 pl-4' : 'w-full'?>
      "
    >
      <h2 class="font-serif mb-1">
        <a
          href="<?= esc_url($post_link)?>"
          class="hover:underline"
        >
          <?= esc_html($post_title) ?>
        </a>
      </h2>


      <?php if ( $pp_show_authors) :?>
      <p class="text-sm mb-1 italic">
        <a
          href=<?= esc_url("/author/" . $post_author) ?>
          class="hover:underline"
        >
          <?= esc_html( $post_author_name )?>
        </a>
      </p>
      <?php endif; ?>


      <?php if ( $pp_show_excerpts) :?>
      <p class="mb-1 text-sm">
        <?= esc_html($post_excerpt) ?>
      </p>
      <?php endif; ?>



    </div>
  </div>
  <?php endforeach;?>
</section>

<?php
endif;
wp_reset_postdata();