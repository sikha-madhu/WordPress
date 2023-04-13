<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_testmonial.scss' ?>">
<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
     <section class="testimonial">
                <div class="dots_background">
                    <div class="title">
                        <h2 class="h2_tag"><?php  echo get_field('testmonial-title') ?> </h2>
                    </div>
                    <div class="container">
                        <div class="quote">
                                   <img  src="svg/mobile_group_quote_icon.png" alt="quote icon" />
                        </div>
                        
                        <div class="card">
                            <div class="mob_quote">
                                <img  src="svg/mobile_group_quote_icon.png" alt="quote icon" />
                            </div>
                            <div class="card_content">
                                <div class="card_description">
                                    <p class="description_content"><?php  echo get_field('testmonial-content') ?> </p>
                                </div>
                                <div class="mob_client_image">
                                    <img src="svg/mobile_user_Icon.png" alt="profile" />
                                </div>
                                <div class="client_name">
                                    <span><?php  echo get_field('testmonial-client-name') ?> </span>
                                </div>
                                <div class="client_designation">
                                    <p class="name"><?php  echo get_field('testmonial-client-designation') ?> </p>
                                    <div class="custom_line"></div>
                                </div>
                            </div>
                            <div >
                                <img class="card_image" src="<?php  echo get_field('testmonial-client-image') ?>  " alt="profile" />
                            </div>
                        </div>
                    </div> 
                </div>
            </section>

    <?php endwhile; endif; wp_reset_postdata(); ?>