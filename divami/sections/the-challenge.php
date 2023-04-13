<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_thechallenge.scss' ?>">
<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
            <div class="challenge_section_wrapper">
                <div class="challenge_section">
                        <h1 class="title"><?php  echo get_field('challenge-title') ?></h1>
                        <div class="des">
                        <div class="challenge-content">
                              <p class="para"><?php  echo get_field('challenge-content1') ?></p>
                              <p class="para"><?php  echo get_field('challenge-content2') ?></p>
                        </div>
                        <div class="challenge_img">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/challenge animation.png"  />
                        </div>
                        </div>
                </div>
            </div>
    
<?php endwhile; endif; wp_reset_postdata(); ?>