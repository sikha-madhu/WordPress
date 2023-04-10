<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package divami
 */
?>


	
            <header class="search_header">
                <h1 class="entry-title"><?php printf(__('No results for %s', 'divami'), '<span class="italic">' . get_search_query() . '</span>'); ?></h1>
            </header>

	<ul class="blog-post-error">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'divami' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'divami' ); ?></p>

		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'divami' ); ?></p>

		<?php endif; ?>
	</ul>
	

