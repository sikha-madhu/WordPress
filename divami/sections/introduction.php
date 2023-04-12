<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_common.scss' ?>">
<?php
    $args = array(
        'post_type' => 'introduction',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
 <div class = "introduction_wrapper">
                <div class = "container">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_one.png" class = "img1" alt="backgroundimg"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_onetwo.png" class = "img1_2" alt="backgroundimg"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_one_1.png" class = "img1_1" alt="backgroundimg"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_two.png" class = "img2" alt="backgroundimg"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_three.png" class = "img3" alt="backgroundimg"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_four.png" class = "img4" alt="backgroundimg"/>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/introduction_image_five.png" class = "img5" alt="backgroundimg"/>
                </div>
                <section class = "introduction">
                <h1 class = "introductionTittle"> <?php  echo get_field('intro-title') ?> </h1>
                <p class = "introductionConent"><?php  echo get_field('intro-content') ?> </p>
                </section>
            </div>
<?php endwhile; endif; wp_reset_postdata(); ?>