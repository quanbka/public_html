<div class="eltd-comment-holder clearfix" id="comments">
	<div class="eltd-comment-number">

		<?php if(get_comments_number() > 0): ?>
			<h4><?php comments_number( esc_html__( '', 'kendall' ), '1' . esc_html__( ' Comment ', 'kendall' ), '% ' . esc_html__( ' Comments ', 'kendall' ) ); ?></h4>
		<?php endif; ?>
	</div>
	<div class="eltd-comments">
		<?php if ( post_password_required() ) : ?>
		<p class="eltd-no-password"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'kendall' ); ?></p>
	</div>
</div>
<?php
return;
endif;
?>
<?php if ( have_comments() ) : ?>

	<ul class="eltd-comment-list">
		<?php wp_list_comments( array( 'callback' => 'kendall_elated_comment' ) ); ?>
	</ul>


	<?php // End Comments ?>

<?php else : // this is displayed if there are no comments so far

	if ( ! comments_open() ) :
		?>
		<!-- If comments are open, but there are no comments. -->


		<!-- If comments are closed. -->
		<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'kendall' ); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$kendall_elated_commenter = wp_get_current_commenter();
$kendall_elated_req       = get_option( 'require_name_email' );
$kendall_elated_aria_req  = ( $kendall_elated_req ? " aria-required='true'" : '' );

$args = array(
	'id_form'              => 'commentform',
	'id_submit'            => 'submit_comment',
	'title_reply'          => esc_html__( 'Leave a Reply', 'kendall' ),
	'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'kendall' ),
	'cancel_reply_link'    => esc_html__( 'Cancel Reply', 'kendall' ),
	'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
	'title_reply_after'    => '</h4>',
	'label_submit'         => esc_html__( 'Submit', 'kendall' ),
	'comment_field'        => '<textarea id="comment" placeholder="' . esc_html__( 'Message*', 'kendall' ) . '" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after'  => '',
	'fields'               => apply_filters( 'comment_form_default_fields', array(
		'author' => '<input id="author" name="author" placeholder="' . esc_html__( 'Name*', 'kendall' ) . '" type="text" value="' . esc_attr( $kendall_elated_commenter['comment_author'] ) . '"' . $kendall_elated_aria_req . ' />',
		'email'    => '<input id="email" name="email" placeholder="' . esc_html__( 'E-mail*', 'kendall' ) . '" type="text" value="' . esc_attr( $kendall_elated_commenter['comment_author_email'] ) . '"' . $kendall_elated_aria_req . ' />',
		'url'  => '<input id="url" name="url" type="text" placeholder="' . esc_html__( 'Website', 'kendall' ) . '" value="' . esc_attr( $kendall_elated_commenter['comment_author_url'] ) . '" />'
	) )
);
?>
<?php if ( get_comment_pages_count() > 1 ) {
	?>
	<div class="eltd-comment-pager">
		<p><?php paginate_comments_links(); ?></p>
	</div>
<?php } ?>
<div class="eltd-comment-form">
	<?php comment_form( $args ); ?>
</div>
								
							


