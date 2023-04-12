<?php
/**
 * The Template for displaying all single posts.
 *
 * @package divami
 */
?>
<?php
$svgName = "'common'";
get_header();
?>
<script>
        var svgsToLoad = [<?php
echo $svgName;
?>];
</script>
<?php
   
    the_post();
    $blogImage = get_field('blog_image');
    $dirURL = get_template_directory_uri();
    $imageURL = "styles/images/details.jpeg";
    $defaultImageBanner = $dirURL.$imageURL;
    $user = get_userdata(get_the_author_meta('ID')); ?>
    <div class="blog-detail">
    <div class="blog__banner-section">
        <div class="blog__banner_wrapper medium-width padding-lr">
            <!-- this is local path --> 
            <!-- <a href="/divami-blog" class="arrow__btn-link go-to-home-wrapper anim-left">  -->
            <!-- this is demo path --> 
            <!-- <a href="/divamiblog" class="arrow__btn-link go-to-home-wrapper anim-left">  -->
            <!-- this is demo and live path --> 
            <a href="/blog" class="arrow__btn-link go-to-home-wrapper anim-left"> 
                <img src="<?php echo get_template_directory_uri(); ?>/styles/images/stroke-arrow-right.svg" alt="arrow right icon" class="arrow__btn-icon go-to-blog-list">
                <div class="arrow__btn-link-text">Blog</div>
            </a>
            <div class="blog__banner-heading">
                <h1 class="section-title__text">
                    <span><?php the_title(); ?> <div class="red__dot wobble">
                            <svg>
                                <use xlink:href="#red-dot"> </use>
                            </svg>
                        </div>
                    </span>
                    <?php echo do_shortcode('[rt_reading_time label="Reading Time:" postfix="minutes"]'); ?>
                </h1>
            </div>
        </div>
        <div class="process__header-background1">
            <div class="wave__animation-block process__wave-anim">
                <svg id="wave__animation-one" class="wave__animation" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 350 20" preserveAspectRatio="none" enable-background="new 0 0 350 20" xml:space="preserve">
                    <path d="M0,17.1C29.9,17.1,57.8,0,87.5,0c30.2,0,58.1,17.1,87.1,17.1c29.9,0,57.8-17.1,87.7-17.1    c29.9,0,57.8,17.1,87.7,17.1V20H0V17.1z" />
                </svg>
            </div>
        </div>
    </div>
    <div class="blog-detail__content-section">
        <div class="blog-detail__banner-image">
            <img class="blog-image hide" src="<?php 
                if(get_field('blog_image')) {
                    echo get_field('blog_image');
                } else {
                    echo $defaultImageBanner;
                }
                    ?>" alt="<?php echo get_the_title(); ?>">
        </div>
        <div class="blog-detail__full-content  padding-lr">
            <div class="blog-detail__content">
                <?php echo the_content(); ?>
                <div class="blog-detail__user-info t-show">
                <div class="blog-detail__profile">
                    <div class="blog-detail__profile-pic">
                        <?php echo get_avatar( $user->ID, 40 ); ?>
                    </div>
                    <div class="blog-detail__profile-name">
                        <?php echo $user-> display_name ?>
                    </div>
                </div>
                <div class="blog-detail__share-block hide">
                    <img class="shareIcon" src="<?php echo get_template_directory_uri(); ?>/styles/images/share.svg"/>
                </div>
                <span class="blog-detail__comments hide">
                    <img class="commentsIcon" src="<?php echo get_template_directory_uri(); ?>/styles/images/message-square.svg"/>
                    <span class="summaryLabel">
                        <?php $ccount = get_comments_number(); 
                            echo $ccount;
                            ?>
                    </span>
                </span>
            </div>
                <div class="blog-detail__footer">
                    <?php
                        if (comments_open() || '0' != get_comments_number()){
                        comments_template();}
                    ?>
                </div>
            </div>
            <div class="blog-detail__user-info t-hide">
                <div class="blog-detail__left-pannel">
                    <div class="blog-detail__profile">
                        <div class="blog-detail__profile-pic">
                            <?php echo get_avatar( $user->ID, 40 ); ?>
                        </div>
                        <div class="blog-detail__profile-name ellipsis">
                           <span id="author-name" title="<?php echo $user-> display_name ?>"> <?php echo $user-> display_name ?> </span>
                            <p>Author</p>
                            <div class="date">
                                <?php echo get_the_date( 'd M, Y' ) ?>
                            </div>
                        </div>
                    </div>
                    <div  class="blog-detail__titles"><?php echo get_the_title(); ?></div>
                </div>
                <div class="blog-detail__share-block hide">
                    <img class="shareIcon" src="<?php echo get_template_directory_uri(); ?>/styles/images/share.svg"/>
                </div>
                <span class="blog-detail__comments hide">
                    <img class="commentsIcon" src="<?php echo get_template_directory_uri(); ?>/styles/images/message-square.svg"/>
                    <span class="summaryLabel">
                        <?php $ccount = get_comments_number(); 
                            echo $ccount;
                            ?>
                    </span>
                </span>
            </div>
        </div>
    </div>
    <?php 
        $dirURL = get_template_directory_uri();
        $imageURL = "/styles/images/banner.jpg";
        $defaultImage = $dirURL.$imageURL;
        global $authordata, $post;
        $recent_articles = get_posts(array( 
            'post__not_in' => array($post->ID),
            'orderby' => 'date',
            'order' => 'DESC',
            'numberposts' => 3
        )); 
    if (count($recent_articles)) { ?>
        <div class="other-articaltes padding-lr">
            <div class="blog__main-page title">
                <h1 class="section-title__text">
                    <span>Recent Articles <div class="red__dot wobble">
                            <svg>
                                <use xlink:href="#red-dot"> </use>
                            </svg>
                        </div>
                    </span>
                </h1>
            </div>

            <div class="blog-post blog__main-page">
                <?php
                    foreach ($recent_articles as $recent_article) { ?>
                       <?php  $user = get_userdata($recent_article->post_author); 
                       ?>
                        <a href="<?php echo get_permalink($recent_article->ID); ?>" class="bolg_card other-articalte">
                            <div class="blog_card-profile-details">
                                <div class="blog_card-title title-height">
                                    <?php echo wp_trim_words($recent_article->post_title, 10,'...'); ?>
                                </div>
                                <div class="blog_card-posted-by <?php 
                                    if($user -> display_name) {
                                            echo " ";
                                        } else {
                                            echo ' hide';
                                        }
                                    ?>">
                                    - <?php echo $user -> display_name ?>
                                    <div class="date">
                                        <?php echo get_the_date( 'd M, Y' ) ?>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            <div class="blog_card-image">
                                <img src="<?php 
                                        if(get_the_post_thumbnail_url($recent_article->ID)) {
                                            echo get_the_post_thumbnail_url($recent_article->ID);
                                        } else {
                                            echo $defaultImage;
                                        }
                                            ?>" alt="<?php echo $recent_article->post_title; ?>">
                            </div>
                            <div class="blog_card-des">
                                <div class="blog_card-meta-data">
                                    <div class="blog_card-title">
                                        <?php echo wp_trim_words($recent_article->post_title, 10,'...'); ?>
                                    </div>
                                    <div class="blog_card-content t-hide">
                                        <?php   $content = $recent_article->post_content; 
                                                echo wp_trim_words($content,30, '...'); ?> 
                                    </div>
                                    <div class="blog_card-content t-show">
                                        <?php   $content = $recent_article->post_content; 
                                                echo wp_trim_words($content,20, '...'); ?> 
                                    </div>
                                </div>
                                <div class="arrow__btn-link">
                                    <div class="arrow__btn-link-text">Read More</div>
                                    <img src="<?php echo get_template_directory_uri(); ?>/images/stroke-arrow-right.svg" alt="arrow right icon" class="arrow__btn-icon">
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
        
    </div>
<script src="<?php echo get_template_directory_uri(); ?>/js/blog_details.js"></script>
<?php get_footer(); ?>
