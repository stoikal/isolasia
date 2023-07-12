<?php
include 'inc/options.php';

get_header();
?>
<div class="pt-7 overflow-hidden">
  <main id="main-content" class="mb-10">
    <article
      id="primary-content"
      class=""
    >
      <?php if (have_posts()): ?>
        <?php
          while (have_posts()):
            the_post();
            $post_id = get_the_ID();
            $title = get_the_title();
            $post_date = get_the_date();
            $author_name = get_the_author();
            $thumbnail_url = get_the_post_thumbnail_url($post_id, 'full');
        ?>
        
        <header class="p-6 <?= $sp_max_width ?> mx-auto">
          <h1 class="<?= $sp_font_size_title ?> font-serif mb-4"><?= $title ?></h1>
          <div>
            <span>
              <?= $post_date ?>
            </span>
            <span>
              &bull;
            </span>
            <span>
              <a
                href=<?= esc_url("/author/" . $author_name) ?>
                class="hover:underline"
              >
                <?= esc_html($author_name )?>
              </a>
            </span>
          </div>
        </header>
        
        <main class="mb-4">
          <? if ( has_post_thumbnail() ) : ?>
          <div
            class="
              mb-4 mx-auto
              <?= $sp_thumbnail_full_width ? '' : $sp_max_width . ' ' . $sp_image_padding ?>
            "
          >
            <img
              src="<?php echo esc_url($thumbnail_url); ?>"
              alt="<?php the_title_attribute(); ?>"
              class="w-full max-h-[32rem] object-cover"
            >
          </div>
          <? endif ?>
    
          <div
            class="
              isolasia_post-content
              p-6 mx-auto
              <?= $sp_max_width ?>
              <?= $sp_font_size_body ?>
            "
          >
            <?php
            the_content();
            wp_link_pages(
              array(
                'before' => '<p class="post-nav-links">' . __( 'Halaman:' ),
                'after' => '</p>',
              )
            )
            ?>
          </div>
        </main>

        <div class="mb-4 max-w-screen-md mx-auto px-6">
          <?php
            $tags =  get_the_tags(get_the_ID());

            if ($tags) :
          ?>
            <span>Tags:</span>
            <?php
              foreach ($tags as $index=>$tag) :
                $tag_link = get_tag_link($tag->term_id);
                $tag_name = $tag->name;
            ?>
              <a
                href="<?= esc_url($tag_link) ?>"
                class="hover:underline"
              ><?= esc_html($tag_name) ?></a><?php if ($index < sizeof($tags) - 1) echo ','?>
            <?php
              endforeach;
            ?>
          <?php
            endif;
          ?>
        </div>
        <?php endwhile?>
      <?php endif ?>

      <footer class="p-6 <?= $sp_max_width ?> mx-auto">
        <?php if ( ! is_singular( 'attachment' ) ) : ?>
          <?php get_template_part( 'template-parts/post/author-bio' ); ?>
        <?php endif; ?>
      </footer>
    </article>
  </main>

  <div class="<?= $sp_max_width ?> mx-auto">
    <?php
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }
    ?>
  </div>
</div>

<?php
get_footer();