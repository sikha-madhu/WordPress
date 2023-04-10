<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package divami
 */

get_header();
add_back_to_top(); ?> 
<?php get_template_part("pages/banner-section")?>
<div class="container ">
     <div class="page_content restrict-width padding-lr">
        <section class="site-main">
	       	<?php if ( have_posts() ) : ?>
		       	<header class="search_header">
                    <h1 class="entry-title">
                        <?php
                            if ( is_category() ) :
                                single_cat_title();

                            elseif ( is_tag() ) :
                                echo 'Tag: <span class="italic">';
                                single_tag_title('');
								echo '</span>';

                            elseif ( is_author() ) :
                                /* Queue the first post, that way we know
                                 * what author we're dealing with (if that is the case).
                                */
                                the_post();
                                $user = get_userdata(get_the_author_meta('ID'));
								echo '<div class="userDetails">';
								
								$userRef = explode("@",$user->user_email)[0];
								
								echo get_avatar( $user->ID, 52 );
								echo '<div ><div class="">' . $user->display_name . '</div>';
								echo '<div >' .((get_the_author_meta('jobtitle', $user->ID)!="") ? get_the_author_meta('jobtitle', $user->ID) : 'General'). '</div>';
								echo '<div class="v-p-m"><a class="v-p-l" href="/people/'.$userRef.'" target="_blank">View Profile</div></div>';
								
								echo '</div>';
                                /* Since we called the_post() above, we need to
                                 * rewind the loop back to the beginning that way
                                 * we can run the loop properly, in full.
                                 */
                                rewind_posts();

                            elseif ( is_day() ) :
                                printf( __( 'Day: %s', 'divami' ), '<span class="italic">' . get_the_date() . '</span>' );
    
                            elseif ( is_month() ) :
                                printf( __( 'Month: %s', 'divami' ), '<span class="italic">' . get_the_date( 'F Y' ) . '</span>' );
    
                            elseif ( is_year() ) :
                                printf( __( 'Year: %s', 'divami' ), '<span class="italic">' . get_the_date( 'Y' ) . '</span>' );
    
                            elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
                                _e( 'Asides', 'divami' );
    
                            elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
                                _e( 'Images', 'divami');
    
                            elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
                                _e( 'Videos', 'divami' );
    
                            elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
                                _e( 'Quotes', 'divami' );
    
                            elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
                                _e( 'Links', 'divami' );
    
                            else :
                                _e( 'Archives', 'divami' );
    
                            endif;
                        ?>
                    </h1>
                    <?php
                        // Show an optional term description.
                        $term_description = term_description();
                        if ( ! empty( $term_description ) ) :
                            printf( '<div class="taxonomy-description">%s</div>', $term_description );
                        endif;
                    ?>
                </header><!-- .page-header -->
	        	<ul class="blog-post">
	                <?php /* Start the Loop */ ?>
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php get_template_part( 'content', get_post_format() ); ?>
                    <?php endwhile; ?>
	           	 </ul><!-- blog-post -->
	         <?php else : ?>
	         	<?php get_template_part('no-results', 'archive'); ?>
	         <?php endif; ?>
			<?php zeroerror_lite_pagination(); ?>	         
        </section>      
       <?php get_sidebar(); ?>       
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div><!-- container -->
	
<?php get_footer(); ?>