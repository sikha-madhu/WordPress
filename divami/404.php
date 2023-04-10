<?php  
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package divami
 */


get_header();
add_back_to_top();
 ?>
<div class="main_container_404 restrict-width padding-lr">
    <div class="page_404_container">
        <div class="page_404_images_container">
            <div class="page_404_image_left">
                <img src="<?php echo get_template_directory_uri(); ?>/images/left404.svg" alt="404_left" class="_404">
            </div>
            <div class="page_404_image_center">
                <img src="<?php echo get_template_directory_uri(); ?>/images/infographic404.svg" alt="404_center" class="_404 _0">
            </div>
            <div class="page_404_image_right">
                <img src="<?php echo get_template_directory_uri(); ?>/images/four-2nd.svg" alt="404_right" class="_404">
            </div>
        </div>
        <div class="content_block">
            <div class="page_404_content">
                <div class="page_404_content_des">
                    <p>We can't seem to find the page you're looking for</p>
                </div>
                <div class="page_404_error_des">
                    <span>Error code: 404</span>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>