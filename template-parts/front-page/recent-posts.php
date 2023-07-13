<?php
include __DIR__ . '/../../inc/options.php';

$paddings = array('p-0', 'p-1', 'p-2', 'p-3', 'p-4');
$recent_posts_thumbnail_padding = $paddings[$rp_gutter];

// Retrieve 5 most recent posts
$latest_posts = get_posts(
  array(
    'numberposts' => 5,
    'post_type' => 'post',
    'category__not_in' => array($cc_category_id),
  )
);

if ( count($latest_posts) > 0 ):
?>
  <section>
    <div
      class="
        mx-auto overflow-hidden
        mb-10
        <?= $rp_max_witdh ?>
        <?= $rp_show_frame_border ? 'border' : '' ?>
      "
    >

      <div
        class="
          flex flex-wrap
          <?= $rp_gutter ? 'p-4' : '' ?>
        "
      >
        <div
          class="
            w-full md:w-1/2
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
          $post_author_url = get_author_posts_url( $post_author_id );
          ?>
          <div
            class="
              <?= $recent_posts_thumbnail_padding ?>
            "
          >
            <article>
              <div
                class="
                  aspect-[4/3] group overflow-hidden relative
                  <?= $rp_is_rounded ? 'rounded' : '' ?>
                  <?= $co_nopic_bg ?> <?= $da_color_nopic_bg ?>
                "
              >
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
  
                <?php if ( !$rp_is_details_outside) : ?>
                <div class="w-full absolute bottom-0 p-2 bg-gradient-to-t from-black to-transparent">
                  <?php
                  if ( $post_categories ) :
                    foreach ( $post_categories as $category ) :
                        $category_name = $category->name; // Category name
                        $category_link = get_category_link( $category->term_id ); // Category link
                  ?>
                    <a
                      class="
                        px-1 text-xs mr-1 inline-block
                        <?= $rp_color_text_category ?>
                        <?= $rp_color_bg_category ?>
                      "
                      href="<?= esc_url( $category_link ) ?>"
                    >
                      <?= esc_html( $category_name ) ?>
                    </a>
                    <?php endforeach; ?>
                  <?php endif;  ?>
                  <h2 class="mb-1">
                    <a
                      href=<?= get_permalink($post_id) ?>
                      class="font-serif text-xl text-white hover:underline"
                    >
                      <?= esc_html($post_title) ?>
                    </a>
                  </h2>
                  <p class="text-xs text-white">
                    <span>
                      <?= $formatted_date ?>
                    </span>
                    <span>
                      &bull;
                    </span>
                    <span>
                      <a
                        href=<?= esc_url( $post_author_url ) ?>
                        class="hover:underline"
                      >
                        <?= $post_author_name ?>
                      </a>
                    </span>
                  </p>
                </div>
                <?php endif;?>
  
              </div>
  
              <?php if ( $rp_is_details_outside ) : ?>
              <div class="py-3">
                <?php
                if ( $post_categories ) :
                  foreach ( $post_categories as $category ) :
                      $category_name = $category->name; // Category name
                      $category_link = get_category_link( $category->term_id ); // Category link
                ?>
                  <a
                    class="
                      px-1 text-xs mr-1 inline-block
                      <?= $rp_color_text_category ?>
                      <?= $rp_color_bg_category ?>
                    "
                    href="<?= esc_url( $category_link ) ?>"
                  >
                    <?= esc_html( $category_name ) ?>
                  </a>
                  <?php endforeach; ?>
                <?php endif;  ?>
                <h2 class="mb-1">
                  <a
                    href=<?= get_permalink($post_id) ?>
                    class="font-serif text-2xl hover:underline"
                  >
                    <?= esc_html($post_title) ?>
                  </a>
                </h2>
                <p class="text-sm">
                  <span>
                    <?= $formatted_date ?>
                  </span>
                  <span>
                    &bull;
                  </span>
                  <span>
                    <a
                      href=<?= esc_url( $post_author_url ) ?>
                      class="hover:underline"
                    >
                      <?= $post_author_name ?>
                    </a>
                  </span>
                </p>
              </div>
              <?php endif;?>
            </article>
          </div>
        </div>
  
        <div
          class="
            flex flex-wrap w-full md:w-1/2
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
            $post_author_id = $post->post_author;
            $post_author_name = get_the_author_meta( 'display_name', $post_author_id );
            $post_author_url = get_author_posts_url( $post_author_id );
          ?>
          <div
            class="
              w-full md:w-1/2
              <?= $recent_posts_thumbnail_padding ?>
            "
          >
            <article class="h-full">
              <div
                class="
                  aspect-[8/3] group overflow-hidden
                  relative
                  <?= $rp_is_details_outside ? 'md:aspect-[4/3]' : 'h-full md:aspect-auto' ?>
                  <?= $rp_is_rounded ? 'rounded' : '' ?>
                  <?= $co_nopic_bg ?> <?= $da_color_nopic_bg ?>
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
  
                <?php if ( !$rp_is_details_outside) : ?>
                <div class="w-full absolute bottom-0 p-2 bg-gradient-to-t from-black to-transparent">
                  <?php
                  if ( $post_categories ) :
                    foreach ( $post_categories as $category ) :
                        $category_name = $category->name;
                        $category_link = get_category_link( $category->term_id ); // Category link
                  ?>
                    <a
                      class="
                        px-1 text-xs mr-1 inline-block
                        <?= $rp_color_text_category ?>
                        <?= $rp_color_bg_category ?>
                      "
                      href="<?= esc_url( $category_link ) ?>"
                    >
                      <?= esc_html( $category_name ) ?>
                    </a>
                    <?php endforeach; ?>
                  <?php endif;  ?>
                  <h2>
                    <a
                      href=<?= get_permalink($post_id) ?>
                      class="font-serif text-white hover:underline"
                    >
                      <?= esc_html($post_title) ?>
                    </a>
                  </h2>
                </div>
                <?php endif;?>
              </div>
  
              <?php if ( $rp_is_details_outside ) : ?>
              <div class="py-3">
                <?php
                if ( $post_categories ) :
                  foreach ( $post_categories as $category ) :
                    $category_name = $category->name; // Category name
                    $category_link = get_category_link( $category->term_id ); // Category link
                ?>
                  <a
                    class="
                      px-1 text-xs mr-1 inline-block
                      <?= $rp_color_text_category ?>
                      <?= $rp_color_bg_category ?>
                    "
                    href="<?= esc_url( $category_link ) ?>"
                  >
                    <?= esc_html( $category_name ) ?>
                  </a>
                  <?php endforeach; ?>
                <?php endif;  ?>
                <h2 class="mb-1">
                  <a
                    href=<?= get_permalink($post_id) ?>
                    class="font-serif text-lg hover:underline"
                  >
                    <?= esc_html($post_title) ?>
                  </a>
                </h2>
                <p class="text-xs">
                  <span>
                    <?= $formatted_date ?>
                  </span>
                  <span>
                    &bull;
                  </span>
                  <span>
                    <a
                      href=<?= esc_url( $post_author_url ) ?>
                      class="hover:underline"
                    >
                      <?= $post_author_name ?>
                    </a>
                  </span>
                </p>
              </div>
              <?php endif;?>
            </article>
          </div>
          <?php endforeach;?>
        </div>
      </div>
    
    </div>

  </section>
<?php
endif;
wp_reset_postdata();