<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_other-project.scss' ?>">
<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
     <div className={styles.project_cards_wrapper}>
            <h1 className={styles.section_title}>OHTER PROJECTS</h1>
            <Carousel className={`${styles.flex} ${styles.carousel_cards}`} 
                    infiniteLoop={false}
                    autoPlay={false}
                    showStatus={false}
                    showArrows={false}
                    showThumbs={true}
                    interval={5000}>
                {
                    projectsList.map((item: any, index: any) => {
                        return <Cards key={item.id} cardItemDetails={item} />
                    })
                }
            </Carousel>
        </div>
<?php endwhile; endif; wp_reset_postdata(); ?>