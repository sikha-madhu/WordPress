

      <?php
    $args = array(
        'post_type' => 'case_study',
        'posts_per_page' => 12,
        'order'     => 'DESC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>

<div class=design_approach_section_wrapper>
        <div class=design_approach_section>
          <h1 class=title><?php echo get_field('design-approach-header') ?></h1>
          <p class=description>
          <?php echo get_field('design-approach-paragraph') ?>
          </p>
  </div>
  </div>
  <?php endwhile; endif; wp_reset_postdata(); ?>

<div class="design-approach-cards-wrapper">
<div class="design-approach-cards-section">
<div class=cards_row>      

  <?php
    $args = array(
        'post_type' => 'design-approach-card',
        'posts_per_page' => 12,
        'order'     => 'ASC',
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
    ?>


           <div class=each_card>
               <div class=card_img>
               <img class="" src="<?php echo get_field('card-img') ?>" alt="" >
               </div>
               <div class=card_body>
                 <h5 class=card_title><?php echo get_field('card-header') ?></h5>
                 <p class=card_text><?php echo get_field('card-content') ?></p>
           </div>
  </div>
   
  
  

    <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
    </div>
     </div>
