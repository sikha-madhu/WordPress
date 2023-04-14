<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
 <div class = "introduction-wrapper">
                <div class = "container">
                    <img src="<?php  echo get_field('background-image1') ?> " class = "img1" alt="backgroundimg"/>
                    <img src="<?php  echo get_field('background-image1-2') ?> " class = "img1-2" alt="backgroundimg"/>
                    <img src="<?php  echo get_field('background-image1-1') ?> " class = "img1-1" alt="backgroundimg"/>
                    <img src="<?php  echo get_field('background-image2') ?> " class = "img2" alt="backgroundimg"/>
                    <img src="<?php  echo get_field('background-image3') ?> " class = "img3" alt="backgroundimg"/>
                    <img src="<?php  echo get_field('background-image4') ?> " class = "img4" alt="backgroundimg"/>
                    <img src="<?php  echo get_field('background-image5') ?> " class = "img5" alt="backgroundimg"/>
                </div>
                <section class = "introduction">
                <h1 class = "introduction-tittle"> <?php  echo get_field('intro-title') ?> </h1>
                <p class = "introduction-conent"><?php  echo get_field('intro-content') ?> </p>
                </section>
            </div>
<?php endwhile; endif; wp_reset_postdata(); ?>