<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_landing.scss' ?>">
<?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
<div class="landing">
                <div class="client">
                    <div class="client_title">
                        <h4><?php  echo get_field('client-title') ?></h4>
                    </div>
                    <div class="client_moto">
                        <h2><?php  echo get_field('client-moto') ?></h2>
                    </div>
                    <div class="client_custom_line"></div>
                    <div class="client_services">
                        <div class="item_circle_1"></div>
                        <div class="item"><?php  echo get_field('client-services') ?></div>
                        <div class="item">
                            <div class="item_circle"></div>
                            <div class="item_content"><?php  echo get_field('client-services') ?></div>
                        </div>
                        <div class="item">
                            <div class="item_circle"></div>
                            <div class="item_content"><?php  echo get_field('client-services') ?></div>
                        </div>
                        <div class="item_mobile">
                            <div class="item_circle"></div>
                            <div class="item_content"><?php  echo get_field('client-services') ?></div>
                        </div>
                        <div class="item_mobile">
                            <div class="item_circle"></div>
                            <div class="item_content"><?php  echo get_field('client-services') ?></div>
                        </div>
                    </div>
                </div>
                <div class="custom_sphere"></div>
                        <div class="performances">
            <div class="performance_area">
                <div class="icon">
                    <img class="img" src="svg/arrow_up.svg" alt="arrow up icon"/>
                </div>
                <div class="content">
                    <div class="counter" data-target="151">
                        <span id="counter_value"><?php  echo get_field('counter-sessionstate') ?></span>
                        <span>%</span>
                    </div>
                    <div class="name"><?php  echo get_field('sessionstate-title') ?></div>
                </div>
            </div>
            <div class="performance_area">
                <div class="icon">
                    <img class="img" src="svg/arrow_up.svg" alt="arrow up icon"/>
                </div>
                <div class="content">
                    <div class="counter" data-target="21">
                        <span id="counter_value"><?php  echo get_field('counter-visitorstate') ?></span>
                        <span>%</span>
                    </div>
                    <div class="name"><?php  echo get_field('visitorstate-title') ?></div>
                </div>
            </div>
            <div class="performance_area">
                <div class="icon">
                    <img class="img" src="svg/arrow_up.svg" alt="arrow up icon"/>
                </div>
                <div class="content">
                    <div class="counter" data-target="112">
                        <span id="counter_value"><?php  echo get_field('counter-pageviewstate') ?></span>
                        <span>%</span>
                    </div>
                    <div class="name"><?php  echo get_field('pageviewstate-title') ?></div>
                </div>
            </div>
            <div class="performance_area">
                <div class="icon_reverse">
                    <img class="img" src="svg/arrow_up.svg" alt="arrow up icon"/>
                </div>
                <div class="content">
                    <div class="counter" data-target="97">
                        <span id="counter_value"><?php  echo get_field('counter-bouncerstate') ?></span>
                        <span>%</span>
                    </div>
                    <div class="name"><?php  echo get_field('bouncerstate-title') ?></div>
                </div>
            </div>
        </div>
            </div>

<?php endwhile; endif; wp_reset_postdata(); ?>