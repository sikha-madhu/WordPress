<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
);
    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    ?>
 
     <section class="testimonial">
                <div class="dots-background">
                    <div class="title">
                        <h2 class="h2-tag"><?php  echo get_field('testmonial-title') ?> </h2>
                    </div>
                    <div class="container">
                        <div class="quote">
                            <img  class="quote-icon" src="<?php echo get_template_directory_uri();?>
                            /styles/images/quote_icon.svg" alt="quote icon" />
                            <img  class="quote-icon" src="<?php echo get_template_directory_uri();?>
                            /styles/images/quote_icon.svg" alt="quote icon" />
                        </div>
                        
                        <div class="card">
                            <div class="mob-quote">
                                <img  src="<?php echo get_template_directory_uri(); ?>
                                /styles/images/mobile_group_quote_icon.png" alt="quote icon" />
                            </div>
                            <div class="card-content">
                                <div class="card-description">
                                    <p class="description-content"><?php  echo get_field('testmonial-content') ?> </p>
                                </div>
                                <div class="mob-client-image">
                                    <img src="<?php echo get_template_directory_uri(); ?>
                                    /styles/images/mobile_user_Icon.png" alt="profile" />
                                </div>
                                <div class="client-name">
                                    <span><?php  echo get_field('testmonial-client-name') ?> </span>
                                </div>
                                <div class="client-designation">
                                    <p class="name"><?php  echo get_field('testmonial-client-designation') ?> </p>
                                    <div class="custom-line"></div>
                                </div>
                            </div>
                            <div >
                                <img class="card-image" src="<?php  echo get_field('testmonial-client-image')?>" 
                                alt="profile"/>
                            </div>
                        </div>
                    </div> 
                </div>
            </section>

    <?php endwhile; endif; wp_reset_postdata(); ?>