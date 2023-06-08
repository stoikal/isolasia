<?php
include __DIR__ . '/../../inc/options.php';

$margin_x_arr = array('mx-0', 'mx-1', 'mx-2', 'mx-3', 'mx-4');
$title_margin_x = $margin_x_arr[$rp_gutter];

if ( empty($cc_category_id) ) return;

$category_name = get_cat_name($cc_category_id);

$posts = get_posts(
  array(
    'category' => $cc_category_id,
    'numberposts' => $pp_max_items,
    'post_type' => 'post', // Post type
  )
);

if ( count($posts) > 0 ):
?>

<section
  class="
    overflow-hidden p-4
    <?= $pp_show_border ? 'border' : '' ?>
  "
>

  <div
    class="
      mb-4 border-b border-black
      <?= $title_margin_x ?>
    "
  >
    <span class="font-display text-xl text-black uppercase">
      <?= $category_name ?>
    </span>
  </div>
  <div class="flex flex-wrap">
    <?php
    foreach ($posts as $post):
      $post_id = $post->ID;
      $post_title = $post->post_title;
      $post_date = get_the_date();
      $post_excerpt = get_the_excerpt();
      $post_link = get_permalink();
      $thumbnail_url = get_the_post_thumbnail_url();
      $post_author = get_the_author();
      $post_author_id = $post->post_author;
      $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
      $post_author_url = get_author_posts_url( $post_author_id );
    ?>
    <div
      class="
        flex p-2 mb-3 w-full
        <?= $si_show_sidebar_home ? '' : 'md:w-1/2 lg:w-1/3' ?>
      "
    >
      <?php if ( $pp_show_thumbnails) :?>
      <div class="w-1/3 group overflow-hidden">
        <a href="<?= esc_url($post_link)?>" tabindex="-1">
          <img
            src=<?= esc_url($thumbnail_url) ?>
            class="object-cover w-full aspect-[4/3] transition group-hover:scale-110"
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
        <h2 class="font-serif mb-1 text-xl">
          <a
            href="<?= esc_url($post_link)?>"
            class="hover:underline"
          >
            <?= esc_html($post_title) ?>
          </a>
        </h2>
  
  
        <?php if ( $pp_show_authors) :?>
        <p class="text-xs mb-1">
          <span class="text-gray-600">
            <?= esc_html( $post_date ) ?>
          </span>
          <span>
            &bull;
          </span>
          <a
            href=<?= esc_url( $post_author_url ) ?>
            class="font-bold hover:underline"
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
  </div>
</section>

<?php
endif;
wp_reset_postdata();