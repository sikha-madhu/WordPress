<?php
    $args = array(
        'post_type' => 'blog',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
	<div class="footer-block"><?php echo get_field('blog-header') ?></div>

    <?php endwhile; endif; wp_reset_postdata(); ?>
