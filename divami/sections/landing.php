
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
        <div class="client-title">
            <h4><?php  echo get_field('client-title') ?></h4>
        </div>
        <div class="client-moto">
            <h2><?php  echo get_field('client-moto') ?></h2>
        </div>
        <div class="client-custom-line"></div>
        <div class="client-services">
            <div class="item-circle-1"></div>
            <div class="item"><?php  echo get_field('client-service1') ?></div>
            <div class="item">
                <div class="item-circle"></div>
                <div class="item-content"><?php  echo get_field('client-service2') ?></div>
            </div>
            <div class="item">
                <div class="item-circle"></div>
                <div class="item-content"><?php  echo get_field('client-service3') ?></div>
            </div>
            <div class="item-mobile">
                <div class="item-circle"></div>
                <div class="item-content"><?php  echo get_field('client-service4') ?></div>
            </div>
            <div class="item-mobile">
                <div class="item-circle"></div>
                <div class="item-content"><?php  echo get_field('client-service5') ?></div>
            </div>
        </div>
    </div>
    <div class="custom-sphere"></div>
    <div class="performances">
        <div class="performance-area">
            <div class="icon">
                <img class="img" src="<?php echo get_template_directory_uri();?>
                        /styles/images/arrow_up.svg" alt="arrow up icon"/>
            </div>
            <div class="content">
                <div class="counter" data-target="151">
                    <span id="counter-value"><?php  echo get_field('counter-sessionstate') ?></span>
                    <span>%</span>
                </div>
                <div class="name"><?php  echo get_field('sessionstate-title') ?></div>
            </div>
        </div>
        <div class="performance-area">
            <div class="icon">
                <img class="img" src="<?php echo get_template_directory_uri();?>
                        /styles/images/arrow_up.svg" alt="arrow up icon"/>
            </div>
            <div class="content">
                <div class="counter" data-target="21">
                    <span id="counter-value"><?php  echo get_field('counter-visitorstate') ?></span>
                    <span>%</span>
                </div>
                <div class="name"><?php  echo get_field('visitorstate-title') ?></div>
            </div>
        </div>
        <div class="performance-area">
            <div class="icon">
                <img class="img" src="<?php echo get_template_directory_uri();?>
                        /styles/images/arrow_up.svg" alt="arrow up icon"/>
            </div>
            <div class="content">
                <div class="counter" data-target="112">
                    <span id="counter-value"><?php  echo get_field('counter-pageviewstate') ?></span>
                    <span>%</span>
                </div>
                <div class="name"><?php  echo get_field('pageviewstate-title') ?></div>
            </div>
        </div>
        <div class="performance-area">
            <div class="icon-reverse">
                <img class="img" src="<?php echo get_template_directory_uri();?>
                        /styles/images/arrow_up.svg" alt="arrow up icon"/>
            </div>
            <div class="content">
                <div class="counter" data-target="97">
                    <span id="counter-value"><?php  echo get_field('counter-bouncerstate') ?></span>
                    <span>%</span>
                </div>
                <div class="name"><?php  echo get_field('bouncerstate-title') ?></div>
            </div>
        </div>
    </div>
    <script src="<?php echo get_template_directory_uri();?>/js/landing.js"></script>
</div>

<?php endwhile; endif; wp_reset_postdata(); ?>