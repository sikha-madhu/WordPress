<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to zeroerror_lite_comment() which is
 * located in the pages/template-tags.php file.
 *
 * @package divami
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
	<div class="comments-footer-comments">
	<div class="comments-heading"><h2 class="comments-title">COMMENTS <img class="commentIcon commentsRotationControl" src="<?php echo get_template_directory_uri(); ?>/images/next.svg"/></h2></div>
	<span class="div-cl-ic">
		<img class="commentsIcon" src="<?php echo get_template_directory_uri(); ?>/images/message-square.svg"/>
		<span class="summaryLabel">
			<?php $ccount = get_comments_number(); 
				echo $ccount.(($ccount == 1)? ' Comment' : ' Comments');
			?>
		</span>
	</span> 
	</div>
	<div class="comments_section_d">
		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use zeroerror_lite_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define zeroerror_lite_comment() and that will be used instead.
				 * See zeroerror_lite_comment() in pages/template-tags.php for more.
				 */
				wp_list_comments( array( 'callback' => 'zeroerror_lite_comment' ) );
			?>
		</ol><!-- .comment-list -->
		<?php zeroerror_lite_comments_pagination() ?>
	
		<?php
			// If comments are closed and there are comments, let's leave a little note, shall we?
			if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
			<p class="no-comments"><?php _e( 'Comments are closed.', 'divami' ); ?></p>
		<?php endif; ?>
		<?php $logInuser = wp_get_current_user() ?>
		<?php comment_form(array(
			title_reply => '<h2 class="section-title__text">Leave a Comment</span></h2>',
			label_submit => isset($_GET['replytocom']) ? ('Leave a reply') : ('Leave a comment'),
			title_reply_to => 'Leave a Comment',
			logged_in_as => '<div class="user_com">'.get_avatar( $logInuser->ID, 52 ) . '<span class="cusername">'.$logInuser->display_name.'</span></div>',
			fields => apply_filters( 'comment_form_default_fields', array(
				author => '<div class="comments-section-wrapper"><div class="comment-name-email-filed" ><div class="form__group comments"><label for="author" class="form__label email_label">Name</label><input class="name_com_i" type="text" placeholder="" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" /> <p class="namecom-error">Please fill the required field details.</p></div></div>',
				// author => '<div class="comment-field-wrapper"><input class= "name_com_i" type="text" placeholder="Name" id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" /> <p class="namecom-error">Please fill the required field details</p></div>',
				// email => '<div class="comment-field-wrapper"><input class= "email_com_i" type="email" placeholder="Email" autocapitalize="none" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/> <p class="emailcom-error">Please fill the required field details</p></div>',
				email => '<div class="comment-name-email-filed" ><div class="form__group comments"><label for="email" class="form__label email_label">Email</label><input class= "email_com_i" type="email" placeholder="" autocapitalize="none" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/> <p class="emailcom-error">Please fill the required field details.</p></div></div></div>',				
				url    => ''
			)),
			comment_field => '<div class="form__group comments"><label for="comment" class="form__label "></label><textarea class= "message_com_i form__textarea"  id="comment" name="comment"></textarea><p class="messagecom-error">Please fill the required field details.</p></div>'

		)); ?>
		
		<?php echo get_cancel_comment_reply_link("Cancel") ?>
		</div>
		<?php else : ?>

			<?php zeroerror_lite_comments_pagination() ?>
		
			<?php
				// If comments are closed and there are comments, let's leave a little note, shall we?
				if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
			?>
				<p class="no-comments"><?php _e( 'Comments are closed.', 'divami' ); ?></p>
			<?php endif; ?>
			<?php $logInuser = wp_get_current_user() ?>
			<?php comment_form(array(
				'title_reply' => "Leave a Comment",
				'label_submit' => 'Leave a Comment',
				'title_reply_to' => 'Leave a Comment',
				'logged_in_as' => '<div class="user_com">'.get_avatar( $logInuser->ID, 52 ) . '<span class="cusername">'.$logInuser->display_name.'</span></div>',
				'fields' => apply_filters( 'comment_form_default_fields', array(
					'author' => '<div class="comments-section-wrapper"><div class="comment-name-email-filed" ><div class="form__group comments"><label for="author" class="form__label email_label">Name</label><input class= "name_com_i" type="text"  id="author" name="author" value="' . esc_attr( $commenter['comment_author'] ) . '" /> <p class="namecom-error">Please fill the required field details.</p></div></div>',
					'email' => '<div class="comment-name-email-filed" ><div class="form__group comments"><label for="email" class="form__label email_label">Email</label><input class= "email_com_i" type="email"  autocapitalize="none" id="email" name="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"/> <p class="emailcom-error">Please fill the required field details.</p></div></div></div>',
					'url'    => ''
				)),
				'comment_field' => '<div class="form__group comments"><label for="comment" class="form__label "></label><textarea class= "message_com_i form__textarea"  id="comment" name="comment"></textarea><p class="messagecom-error">Please fill the required field details.</p></div>'
			)); ?>
			
			<?php echo get_cancel_comment_reply_link("Cancel") ?>
		<?php endif; // have_comments() ?>
</div><!-- #comments -->
