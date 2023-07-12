<?php
include 'inc/options.php';
// "ARCHIVE" page
//  author page, category page, etc

$type = '';
$value = '';

if (is_category()) {
  $type = 'Kategori';
  $category = get_queried_object();

  if ($category instanceof WP_Term) {
    $category_name = $category->name;
    $value = $category_name;
  }

} elseif (is_tag()) {
  $type = 'Tag';
  $tag = get_queried_object();

  if ($tag instanceof WP_Term) {
    $tag_name = $tag->name;
    $value = $tag_name;
  }

} elseif (is_author()) {
  $type = 'Author';
  $author = get_queried_object();

  if ($author instanceof WP_User) {
    $author_name = $author->display_name;
    $value = $author_name;
  }

} elseif (is_date()) {
  $type = 'Archive';

  $month_name = get_the_time('F');
  $year = get_the_time('Y');

  $value = $month_name . ' ' . $year;
}

get_header();
?>

<?php if ($type) : ?>
  <h1
    class="max-w-screen-xl mx-auto p-9 pt-14 text-5xl font-serif"
  >
    <?= esc_html($type) ?>: <?= esc_html($value) ?>
  </h1>
<?php endif ?>

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
