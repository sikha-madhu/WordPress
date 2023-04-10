<?php
/**
 * The template for displaying all category pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package divami
 */

get_header();
?>
<div>
<?php get_template_part("pages/banner-section")?>

</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/blog_details.js"></script>
<?php get_footer(); ?>