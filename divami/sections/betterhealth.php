<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_betterhealth.scss' ?>">
<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
<div className={styles.health_care_wrapper}>
                <Grid container>
                    <Grid item xs={12} sm={12} md={6} lg={6} >
                        <Card className={styles.health_card_wrapper}>
                            <div className={styles.health_care_card}>
                            <div className={styles.health_care_image}>
                                <img src="svg/health_care.svg" alt='Health Icon' className={styles.logo}/>
                            </div>
                            <h2 className={styles.card_title}>Providing better healthcare</h2>
                            <p className={styles.card_description}>The fully automated ecosystem has enabled the client to revamp their team and focus on delivering the best possible services to the patients.</p>
                            </div>
                        </Card>
                    </Grid>
                    <Grid item xs={12} sm={12} md={6} lg={6}>
                        <div className={styles.health_care_details}>
                        {healthCareDetails.map((i) => {
                            return (
                                <>
                                    <h4 className={styles.title}>{i.title}</h4>
                                    <p className={styles.description}>{i.description}</p>
                                </>
                            )
                        })}
                        </div>
                        <?php endwhile; endif; wp_reset_postdata(); ?>