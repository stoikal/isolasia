<?php
/**
 * The template for displaying author info below posts.
 */

?>
<?php if ( post_type_supports( get_post_type(), 'author' ) ) : ?>
	<div class="flex border p-6">
    <div class="flex-shrink-0">
			<div class="rounded-full overflow-hidden">
				<?php echo get_avatar( get_the_author_meta( 'ID' ), '60' ); ?>
			</div>
    </div>
		<div class="pl-6">
			<h2 class="mb-3 font-bold">
        <?php
				printf(
					'<a class="hover:underline" href="%1$s" rel="author">%2$s</a>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_html(get_the_author()),
				);
        ?>
				
			</h2>
			<p class="mb-4"> <?php the_author_meta( 'description' ); ?></p><!-- .author-description -->
			<?php
			printf(
				'<a class="text-sm hover:underline" href="%1$s" rel="author">%2$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html__( 'lihat semua tulisan', 'isolasia' ),
			);
			?>
		</div><!-- .author-bio-content -->
	</div><!-- .author-bio -->
	<?php
endif;
