<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package photography-theme
 */
?>


<!DOCTYPE html>

<?php //stylesheets for any IE specific styles ?>
 <!--[if lt IE 10]><link rel="stylesheet" type="text/css" href="assets/build/css/ie.min.css"><![endif]-->

<head>
	<meta charset="<?php bloginfo( "charset" ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  	<title><?php wp_title( "|", true, "right" ); ?></title>
  <!-- favicon & links -->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
  <link rel="pingback" href="<?php bloginfo( "pingback_url" ); ?>" />
 

  <!-- stylesheets are enqueued via functions.php -->

  <!-- scripts -->
  <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.min.js" type="text/javascript"></script>
  <![endif]-->
  <!--[if lt IE 10]><link rel="stylesheet" type="text/css" href="assets/build/css/ie.min.css"><![endif]-->


  <?php // Lets other plugins and files tie into our theme's <head>:
  wp_head(); ?>


</head>

<body <?php body_class(); ?>>

  <header>
    <!-- main nav bar -->
    <nav>
      <?php //variables
        $facebook = get_field('facebook', 'option');
        $twitter = get_field('twitter', 'option');
        $instagram = get_field('instagram', 'option');
        $linkedin = get_field('linkedin', 'option');
        $pinterest = get_field('pinterest', 'option');
        $flickr = get_field('flickr', 'option');
        $youtube = get_field('youtube', 'option');
        $logo = get_field('logo', 'option');
      ?>
      <div class="logo">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['sizes']['medium']; ?>"></a>
      </div>

      <?php //add nav menu from functions.php ?>
      <?php wp_nav_menu( array(
      'theme_location' => 'primary' )); 
      ?>

       <?php //add social icons ?>
      <div class="social-icon">
       <?php if(!empty($facebook)) { ?>
         <a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook circle"></i></a>
       <?php } ?>
       <?php if(!empty($twitter)) { ?>
         <a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter circle"></i></a>
       <?php } ?>
       <?php if(!empty($instagram)) { ?>
         <a href="<?php echo $instagram; ?>" target="_blank"><i class="fa fa-instagram circle"></i></a>
       <?php } ?>
       <?php if(!empty($linkedin)) { ?>
         <a href="<?php echo $linkedin; ?>" target="_blank"><i class="fa fa-linkedin circle"></i></a>
       <?php } ?>
       <?php if(!empty($pinterest)) { ?>
         <a href="<?php echo $pinterest; ?>" target="_blank"><i class="fa fa-pinterest-p circle"></i></a>
       <?php } ?>
       <?php if(!empty($flickr)) { ?>
         <a href="<?php echo $flickr; ?>" target="_blank"><i class="fa fa-flickr circle"></i></a>
       <?php } ?>
       <?php if(!empty($youtube)) { ?>
         <a href="<?php echo $youtube; ?>" target="_blank"><i class="fa fa-youtube circle"></i></a>
       <?php } ?>
      </div> <!-- .social-icons -->

    </nav>
  
    <nav class="mobile fa fa-bars">
      <div class="logo-mobile">
        <a href="<?php echo site_url(); ?>"><img src="<?php echo $logo['sizes']['medium']; ?>"></a>
      </div>
      
      <?php wp_nav_menu( array(
      'theme_location' => 'primary' )); 
      ?>
  
    </nav>



  </header>

  <div id="main"> <!-- Start the main div -->
    <div class="bkg-pattern full-site">
      <img src="<?php echo get_site_url()."/wp-content/themes/hartfiel-theme/assets/img/cta_pattern.jpg" ?>">
    </div>  
     
   