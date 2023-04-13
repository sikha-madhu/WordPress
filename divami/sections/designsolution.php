<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_designsolution.scss' ?>">
<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
<div class="designsolution">
                <!-- <div class="main">
                    <div className={`${styles.wave" ${styles.wave1"`"></div>
                    <div className={`${styles.wave" ${styles.wave2"`"></div>
                    <div className={`${styles.wave" ${styles.wave3"`"></div>
                </div> -->
                <div class="cointainer">
                    <div class="content">
                        <div class="tittle">
                        <?php  echo get_field('design-solution-title1') ?> 
                            <div>
                            <?php  echo get_field('design-solution-title2') ?> 
                                </div>
                            </div>
                        <div class="subTittle"> <?php  echo get_field('design-solution-subtitle') ?> </div>
                        <div class="description">
                        <?php  echo get_field('design-solution-content') ?> </div>
                    </div>
                </div>
            </div>

<?php endwhile; endif; wp_reset_postdata(); ?>