<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package alpha
 */
global $fdata;
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/fontawesome/css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts/fontawesome/css/all.min.css">
  <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <div class="mm">
    <?php
    $site_info = get_field('site_settings', 'option');
    $logo = $site_info['site_logo'];
    ?>
    <div id="mml" class="mm-toggle">
      <div class="logo-wrapper">
        <a href="/">
          <img src="<?php echo $logo ?? "/wp-content/uploads/2026/02/logo.svg"; ?>" alt="Reload Page">
        </a>
      </div>
      <div class="button_wrap">
		  <a href="#" class="contact-btn button_wrap mobile-contact-btn">Contact Us</a>
	  </div>
    </div>
    <div id="mm">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'menu-1',
        'menu_id'        => 'primary-menu',
      ));
      ?>
    </div>
  </div>
  <div id="page" class="site">
    <header id="masthead" class="site-header header-section">
      <div class="container">
        <div class="header-wrapper">
          <div class="logo-wrapper">
            <a href="/">
              <img src="<?php echo $logo ?? "/wp-content/uploads/2026/02/logo.svg"; ?>" alt="Reload Page">
            </a>
          </div>
          <div class="header-navigation">
            <?php
            wp_nav_menu(array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
            ));
            ?>
          </div>
        </div>
      </div>
    </header>

    <div id="aspireModalOverlay" class="aspire-modal-overlay" style="display:none;"></div>
    <div id="contactModal" class="aspire-modal" style="display:none;" aria-hidden="true">
		
		    <button type="button" class="js-close-contact contact-team-close  team-modal-close"  aria-label="Close">
          <i class="fa fa-close"></i>
        </button>
      <h2 class="section-heading">Contact Us</h2>
      <?php
      echo do_shortcode('[wpforms id="94" title="false"]');
      ?>
    </div>