<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

$isolasia_comment_count = get_comments_number();
?>

<div
	id="isolasia_post-comments"
	class="
		p-6
		<?php echo get_option( 'show_avatars' ) ? 'show-avatars' : ''; ?>
	"
>
	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title mb-4">
			<?php
				echo esc_html( $isolasia_comment_count . ' ' );
				esc_html_e( 'komentar', 'isolasia' );
			?>
		</h2><!-- .comments-title -->

		<ul class="isolasia_comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'short_ping'  => true,
				)
			);
			?>
		</ul><!-- .comment-list -->

		<div class="isolasia_comment-pagination">			
		<?php
		the_comments_pagination(
			array(
				'before_page_number' => esc_html__( 'Page', 'isolasia' ) . ' ',
				'mid_size'           => 0,
				'prev_text'          => sprintf(
					'<span class="nav-prev-text">%s</span>',
					esc_html__( 'Older comments', 'isolasia' )
				),
				'next_text'          => sprintf(
					'<span class="nav-next-text">%s</span>',
					esc_html__( 'Newer comments', 'isolasia' )
				),
			)
		);
		?>
		</div>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'isolasia' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<div class="isolasia_comment-form">		
	<?php
	comment_form(
		array(
			'title_reply'        => esc_html__( 'Leave a comment', 'isolasia' ),
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
	?>
	</div>

</div><!-- #comments -->
