<?php
/**
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div class="max-w-6xl mx-auto font-poppins">
    <div id="comments" class="comments-area my-8 pt-11 ">

        <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
			printf(
				/* translators: 1: title. */
				esc_html__('One thought on &ldquo;%1$s&rdquo;', 'monal-mag'),
				'<span>' . wp_kses_post(get_the_title()) . '</span>'
			);
			?>
        </h2>

        <ol class="comment-list ">
            <?php
				wp_list_comments(
					array(
						'style'       => 'ol',
						'short_ping'  => true,
						'avatar_size' => 56,
					)
				);
			?>
        </ol>

        <?php endif; ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

        <nav class="comment-navigation" id="comment-nav-above">

            <h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'monal-mag' ); ?></h1>

            <?php if ( get_previous_comments_link() ) { ?>
            <div class="nav-previous">
                <?php previous_comments_link( __( '&larr; Older Comments', 'monal-mag' ) ); ?>
            </div>
            <?php } ?>

            <?php if ( get_next_comments_link() ) { ?>
            <div class="nav-next">
                <?php next_comments_link( __( 'Newer Comments &rarr;', 'monal-mag' ) ); ?>
            </div>
            <?php } ?>

        </nav><!-- #comment-nav-above -->

        <?php endif; ?>

        <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'monal-mag' ); ?></p>
        <?php endif; ?>

        <?php
	comment_form(
		array(
			'class_submit'  => 'bg-primary text-white cursor-pointer rounded font-bold py-2 px-4',
			'comment_field' => '<textarea id="comment" name="comment" class="bg-gray-200 w-full py-2 px-3" aria-required="true"></textarea>',
		)
	);
	?>

    </div>
</div>