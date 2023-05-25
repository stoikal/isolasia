<?php get_header(); ?>
<div class="pt-7 overflow-hidden">
  <main class="mb-10">
    <article
      id="primary-content"
      class="max-w-screen-sm mx-auto"
    >
      <?php if (have_posts()): ?>
        <?php
          while (have_posts()):
            the_post();
            $title = get_the_title();
            $post_date = get_the_date();
            $author_name = get_the_author();
        ?>
        
        <header class="p-6">
          <h1 class="text-4xl font-serif mb-2"><?= $title ?></h1>
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
          <div class="mb-4">
            <?php the_post_thumbnail() ?>
          </div>
    
          <div class="isolasia_post-content p-6">
            <?php the_content() ?>
          </div>
        </main>
        <?php endwhile?>
      <?php endif ?>

      <footer class="p-6">
        <?php if ( ! is_singular( 'attachment' ) ) : ?>
          <?php get_template_part( 'template-parts/post/author-bio' ); ?>
        <?php endif; ?>
      </footer>
    </article>
  </main>

  <div class="max-w-screen-sm mx-auto">
    <?php
    if ( comments_open() || get_comments_number() ) {
      comments_template();
    }
    ?>
  </div>
</div>

<?php
get_footer();