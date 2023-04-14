<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
<div class="health-care-wrapper">
                
                        <div class="health-card-wrapper">
                            <div class="health-care-card">
                            <div class="health-care-image">
                                <img src="<?php  echo get_field('card-image') ?> " alt='Health Icon' class="logo"/>
                            </div>
                            <h2 class="card-title"><?php  echo get_field('betterhealthcard-title') ?></h2>
                            <p class="card-description"><?php  echo get_field('card-description') ?>.</p>
                            </div>
                        </div>
                        <div class="health-care-details">
                      
                                    <h4 class="title"><?php  echo get_field('betterhealthcare-title1') ?></h4>
                                    <p class="description"><?php  echo get_field('betterhealthcare-description1') ?></p>
                               
                                    <h4 class="title"><?php  echo get_field('betterhealthcare-title2') ?></h4>
                                    <p class="description"><?php  echo get_field('betterhealthcare-description1') ?></p>

                                    <h4 class="title"><?php  echo get_field('betterhealthcare-title3') ?></h4>
                                    <p class="description"><?php  echo get_field('betterhealthcare-description1') ?></p>

                                    <h4 class="title"><?php  echo get_field('betterhealthcare-title4') ?></h4>
                                    <p class="description"><?php  echo get_field('betterhealthcare-description1') ?></p>
                        </div>
</div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>