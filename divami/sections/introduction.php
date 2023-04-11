<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '/styles/sass/_common.scss' ?>">
<?php
    $args = array(
        'post_type' => 'introduction',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>
    <div class = "introduction_wrapper">
                <div class = "container">
                    <img src="svg/introduction_image_one.png" class = "img1" alt="backgroundimg"/>
                    <img src="svg/introduction_image_onetwo.png" class = "img1_2" alt="backgroundimg"/>
                    <img src="svg/introduction_image_one_1.png" class = "img1_1" alt="backgroundimg"/>
                    <img src="svg/introduction_image_two.png" class = "img2" alt="backgroundimg"/>
                    <img src="svg/introduction_image_three.png" class = "img3" alt="backgroundimg"/>
                    <img src="svg/introduction_image_four.png" class = "img4" alt="backgroundimg"/>
                    <img src="svg/introduction_image_five.png" class = "img5" alt="backgroundimg"/>
                </div>
                <section class = "introduction">
                <h1 class = "introductionTittle"> <?php  echo get_field('intro-title') ?> </h1>
                <p class = "introductionConent"><?php  echo get_field('intro-content') ?> </p>
                <p class ="para"> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem distinctio accusantium, porro est quam delectus dicta necessitatibus nisi architecto, molestias incidunt ab iure tempore possimus adipisci aliquam. Ratione doloremque quis similique laborum, ipsa illum quos error sequi ex autem excepturi nihil, minima nobis corrupti soluta. Fuga quasi delectus eveniet ipsa nihil dolorem repudiandae veniam explicabo eaque ullam magnam non, libero a corrupti. Ex iure adipisci cum deserunt nobis eius at, similique accusamus accusantium excepturi, incidunt quibusdam deleniti dolor eveniet, omnis commodi temporibus? Porro reprehenderit totam quis perferendis iste corrupti praesentium doloremque? Eum enim quae error magnam deserunt, a hic minima totam? Nemo unde deserunt molestias, illum tenetur illo ex itaque, blanditiis quibusdam id et maxime dolor eius rerum iste a consectetur quasi quisquam consequuntur magnam architecto. Earum itaque aperiam, odio ea atque ad, sapiente delectus consequuntur quasi inventore reiciendis aut dolores velit asperiores, labore totam molestias excepturi maiores voluptatem harum perferendis ipsam sed? Veritatis labore quae officia, laudantium voluptatibus molestiae totam! Accusantium, dolore minus repellendus explicabo quaerat sapiente natus itaque ullam non harum eius tempore quis, sit dicta, ut earum voluptate excepturi? Eos, quisquam possimus autem maiores tempora fugit quibusdam laborum assumenda sint non, a at, exercitationem veritatis dolores itaque?</p>
                </section>
            </div>
<?php endwhile; endif; wp_reset_postdata(); ?>