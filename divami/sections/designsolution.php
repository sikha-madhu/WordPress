<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
<div class="design-solution">
                <div class="design-solution-main">
                <img src="<?php echo get_template_directory_uri(); ?>/css/images/wave.png" class = "design-solution-wave" alt="backgroundimg"/>

                    <!-- <div className={`${styles.wave" ${styles.wave1"`"></div>
                    <div className={`${styles.wave" ${styles.wave2"`"></div>
                    <div className={`${styles.wave" ${styles.wave3"`"></div> -->
                </div>
                <div class="design-solution-cointainer">
                    <div class="design-solution-content">
                        <div class="design-solution-tittle">
                        <?php  echo get_field('design-solution-title1') ?> 
                            <div>
                            <?php  echo get_field('design-solution-title2') ?> 
                                </div>
                            </div>
                        <div class="design-solution-subTittle"> <?php  echo get_field('design-solution-subtitle') ?> </div>
                        <div class="design-solution-description">
                        <?php  echo get_field('design-solution-content') ?> </div>
                    </div>
                </div>
            </div>

<?php endwhile; endif; wp_reset_postdata(); ?>