<?php
include __DIR__ . '/../../inc/options.php';

$paddings = array('p-0', 'p-1', 'p-2', 'p-3', 'p-4');
$recent_posts_thumbnail_padding = $paddings[$rp_gutter];

// Retrieve 5 most recent posts
$latest_posts = get_posts(
  array(
    'numberposts' => 5,
    'post_type' => 'post',
  )
);

if ( count($latest_posts) > 0 ):
?>
  <section class="mb-8  <?= $rp_show_frame_border ? 'border' : '' ?>">
    <div class="flex flex-wrap <?= $rp_gutter ? 'p-4' : '' ?>">
      <div
        class="
          w-full group
          <?= $rp_large_first_thumbnail ? 'md:w-2/3' : 'md:w-1/2' ?>
        "
      >
        <div class="w-full aspect-[4/3] <?= $recent_posts_thumbnail_padding ?>">
          <div
            class="
              w-full h-full overflow-hidden relative bg-gray-200
              <?= $rp_is_rounded ? 'rounded' : '' ?>
            "
          >
            <?php
              $post = $latest_posts[0];
              $post_id = $post->ID;
              $post_title = $post->post_title;
              $thumbnail_url = get_the_post_thumbnail_url($post_id);
              $post_categories = get_the_category($post_id);
              $post_date = date($post->post_date);
              $date_format = get_option('date_format');
              $formatted_date = date_i18n($date_format, strtotime($post_date));
              $post_author_id = $post->post_author;
              $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
            ?>
            <a
              href=<?= get_permalink($post_id) ?>
              class="w-full h-full"
              tabindex="-1"
            >
              <?php if ($thumbnail_url) : ?>
              <img
                src=<?= $thumbnail_url ?>
                class="object-cover w-full h-full transition group-hover:scale-110"
                loading="lazy"
              >
              <?php endif;?>
            </a>
            <div class="w-full absolute bottom-0 p-2 bg-gradient-to-t from-black to-transparent">
              <?php
              if ( $post_categories ) :
                foreach ( $post_categories as $category ) :
                    $category_name = $category->name; // Category name
                    $category_link = get_category_link( $category->term_id ); // Category link
              ?>
              <a
                class="
                text-white px-1 text-xs mr-1 inline-block
                  <?= $rp_color_bg_category ?>
                "
                href="<?= esc_url( $category_link ) ?>"
              >
                <?= esc_html( $category_name ) ?>
              </a>
              <?php
              endforeach;
              endif;
              ?>
              <br />
              <a
                href=<?= get_permalink($post_id) ?>
              >
                <span class="text-white font-serif text-lg">
                  <?= $post_title ?>
                </span>
              </a>
              <br />
              <div class="text-gray-300 text-xs pt-1">
                <span>
                  <?= $formatted_date ?>
                </span>
                <span>
                  &bull;
                </span>
                <span>
                  <?= $post_author_name ?>
                </span>
              </div>
            </div>
        </div>
        </div>
      </div>
      <div
        class="
          w-full flex flex-wrap
          <?= $rp_large_first_thumbnail ? 'md:w-1/3' : 'md:w-1/2' ?>
        "
      >
        <?php
          $latest_posts_rest = array_slice($latest_posts, 1);

          foreach ($latest_posts_rest as $post):
            $post_id = $post->ID;
            $post_title = $post->post_title;
            $post_link = get_permalink($post_id);
            $thumbnail_url = get_the_post_thumbnail_url($post_id);
            $post_categories = get_the_category($post_id);
        ?>
          <div
            class="
              w-full group aspect-[8/3]
              <?= $rp_large_first_thumbnail ? 'md:aspect-[8/3]' : 'md:w-1/2  md:aspect-[4/3]' ?>
              <?= $recent_posts_thumbnail_padding ?>
            "
          >
            <div
              class="
                w-full h-full relative overflow-hidden bg-gray-200
                <?= $rp_is_rounded ? 'rounded' : '' ?>
              "
            >
              <a
                href=<?= $post_link ?>
                class="w-full h-full bg-gray-400"
                tabindex="-1"
              >
                <?php if ($thumbnail_url) : ?>
                <img
                  src=<?= esc_url($thumbnail_url) ?>
                  class="object-cover w-full h-full transition group-hover:scale-110"
                  loading="lazy"
                >
                <?php endif;?>
              </a>
              <div class="absolute w-full bottom-0 p-2 bg-gradient-to-t from-black to-transparent">
                <?php
                if ( $post_categories ) :
                  foreach ( $post_categories as $category ) :
                      $category_name = $category->name; // Category name
                      $category_link = get_category_link( $category->term_id ); // Category link
                ?>
                <a
                  class="
                  text-white px-1 mr-1 text-xs inline-block
                    <?= $rp_color_bg_category ?>
                  "
                  href="<?= esc_url( $category_link ) ?>"
                >
                  <?= esc_html( $category_name ) ?>
                </a>
                <?php
                endforeach;
                endif;
                ?>
                <br />
                <a href=<?= $post_link ?>>
                  <span class="text-white font-serif">
                    <?= the_title() ?>
                  </span>
                </a>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    </div>
  </section>
<?php
endif;
wp_reset_postdata();