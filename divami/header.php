<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package divami
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0px !important; ">
<head>
<!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://divami.com/assets/images/favicon.ico" rel="icon" type="image/x-icon" />
<link href="https://divami.com/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css"
        href="<?php echo get_template_directory_uri(); ?>/css/main.css"
            />
<?php wp_head(); ?>

	<!-- preloading links -->
	<link rel="preconnect" href="https://www.google-analytics.com" />
    <link rel="preconnect" href="https://track.hubspot.com" />
    <link rel="preconnect" href="https://lh3.googleusercontent.com" />
    <link rel="preconnect" href="https://www.divami.com/blog/"/>
    <!-- meta tags -->
    <!-- don't mention any other tags above the below meta tag -->
    
	<!-- <meta name="robots" content="index, follow" /> -->
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MKC89X9');</script>
	<!-- End Google Tag Manager -->
	<script async src="<?php echo get_template_directory_uri(); ?>/js/googletagmanager.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'UA-18464216-5');

    </script>



  
	<script src="<?php echo get_template_directory_uri(); ?>/js/widget_clutch.js"></script>
	<script type="text/javascript" id="hs-script-loader" async defer src="<?php echo get_template_directory_uri(); ?>/js/hubspot.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet">
	<meta name="google-site-verification" content="RUP-WJS27ia5tg6FtU-geYDQkn7nPje9ZP_ZQTLIV0o" />
</head>
<body <?php body_class(); ?>>
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKC89X9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?php  $svgName = "'common'"; ?>

<script>
        var svgsToLoad = [<?php echo $svgName; ?>];
</script>
<!-- For getting svg content from HTTP request -->
<!-- common header start -->
<main class="full-width">

<!-- common header start -->
<header class="header-common full-width">
	header

</header>
<!-- common header end -->
	<script>
    	(function() {
			header_function();
		})();
    </script>
<!-- For getting svg content from HTTP request -->

<php?>