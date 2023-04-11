<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(). '../styles/sass/_common.scss' ?>">

<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package divami
 */
get_header();
add_back_to_top(); 
?>
<?php get_template_part("landing-page")?>

<?php get_footer(); ?>