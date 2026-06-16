<?php

/**
 * alpha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package alpha
 */

if (! defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (! function_exists('alpha_setup')) :
  /** x
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function alpha_setup()
  {
    /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on alpha, use a find and replace
		 * to change 'alpha' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('alpha', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'menu-1' => esc_html__('Primary', 'alpha'),
      )
    );

    register_nav_menus(
      array(
        'menu-2' => esc_html__('Footer Column 1', 'alpha'),
      )
    );

    register_nav_menus(
      array(
        'menu-3' => esc_html__('Footer Column 2', 'alpha'),
      )
    );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'alpha_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );
  }
endif;
add_action('after_setup_theme', 'alpha_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function alpha_content_width()
{
  $GLOBALS['content_width'] = apply_filters('alpha_content_width', 640);
}
add_action('after_setup_theme', 'alpha_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function alpha_widgets_init()
{
  register_sidebar(
    array(
      'name'          => esc_html__('Sidebar', 'alpha'),
      'id'            => 'sidebar-1',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Footer1', 'alpha'),
      'id'            => 'footer-1',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Footer2', 'alpha'),
      'id'            => 'footer-2',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Footer3', 'alpha'),
      'id'            => 'footer-3',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Footer4', 'alpha'),
      'id'            => 'footer-4',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Footer5', 'alpha'),
      'id'            => 'footer-5',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );

  register_sidebar(
    array(
      'name'          => esc_html__('Footer Payment', 'alpha'),
      'id'            => 'footer-payment',
      'description'   => esc_html__('Add widgets here.', 'alpha'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action('widgets_init', 'alpha_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function alpha_scripts()
{
  wp_enqueue_style('alpha-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_style_add_data('alpha-style', 'rtl', 'replace');

  // Enqueue custom font stylesheets
  wp_enqueue_style('general-sans-font', get_template_directory_uri() . '/fonts/general-sans/stylesheet.css', array(), null);
  wp_enqueue_style('season-mix-font', get_template_directory_uri() . '/fonts/season-font-family/stylesheet.css', array(), null);
  wp_enqueue_style('general-sans-font-custom', get_template_directory_uri() . '/fonts/season-font-family/stylesheet.css', array(), null);

  wp_enqueue_script('alpha-navigation', get_stylesheet_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'alpha_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}



function alpha()
{

  wp_enqueue_style('main-css', get_template_directory_uri() . '/css/main.css', array(), '1.0.0', 'all');

  // Contact modal styles (child)
  wp_enqueue_style('aspire-contact-modal', get_stylesheet_directory_uri() . '/css/contact-modal.css', array(), '1.0.0', 'all');

  wp_enqueue_style('Montserrat', 'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i&display=swap', false);
  wp_enqueue_style('font-awesome', get_template_directory_uri() . '/fonts/fontawesome/css/all.css', array(), '4.7.0', 'all');


  // wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '2.3.4', 'all');
  // wp_enqueue_style( 'owl.carousel-css', get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '2.3.4', 'all');


  //wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
  //wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );

  // Enqueue Slick carousel (provided in the child theme `js/` folder)
  wp_enqueue_script('slick-js', get_stylesheet_directory_uri() . '/js/slick.min.js', array('jquery'), '1.8.1', true);

  // Custom theme JS depends on jQuery, Slick and AOS
  wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'slick-js'), '1.0.1', true);

  // Provide AJAX URL and nonce to the front-end script
  wp_localize_script('custom-js', 'aspire_ajax_obj', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('aspire_contact_nonce'),
  ));

  // CountUp.js (CDN) - used to animate numeric headings
  wp_enqueue_script('countup-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.min.js', array(), '2.0.7', true);

  // Counter animation for `.section-heading` elements
  wp_enqueue_script('aspire-counter', get_stylesheet_directory_uri() . '/js/counter.js', array('jquery', 'countup-cdn', 'custom-js'), '1.0.0', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'alpha');


function mytheme_add_woocommerce_support()
{
  add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'mytheme_add_woocommerce_support');


add_filter('pre_get_posts', 'exclude_pages_search_when_logged_in');
function exclude_pages_search_when_logged_in($query)
{
  if ($query->is_search && is_user_logged_in())
    $query->set('post__not_in', array(2, 3, 12, 78, 80, 79, 77));

  return $query;
}




// Register Custom Post Type services
function create_services_cpt()
{

  $labels = array(
    'name' => _x('services', 'Post Type General Name', 'textdomain'),
    'singular_name' => _x('services', 'Post Type Singular Name', 'textdomain'),
    'menu_name' => _x('services', 'Admin Menu text', 'textdomain'),
    'name_admin_bar' => _x('services', 'Add New on Toolbar', 'textdomain'),
    'archives' => __('services Archives', 'textdomain'),
    'attributes' => __('services Attributes', 'textdomain'),
    'parent_item_colon' => __('Parent services:', 'textdomain'),
    'all_items' => __('All services', 'textdomain'),
    'add_new_item' => __('Add New services', 'textdomain'),
    'add_new' => __('Add New', 'textdomain'),
    'new_item' => __('New services', 'textdomain'),
    'edit_item' => __('Edit services', 'textdomain'),
    'update_item' => __('Update services', 'textdomain'),
    'view_item' => __('View services', 'textdomain'),
    'view_items' => __('View services', 'textdomain'),
    'search_items' => __('Search services', 'textdomain'),
    'not_found' => __('Not found', 'textdomain'),
    'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
    'featured_image' => __('Featured Image', 'textdomain'),
    'set_featured_image' => __('Set featured image', 'textdomain'),
    'remove_featured_image' => __('Remove featured image', 'textdomain'),
    'use_featured_image' => __('Use as featured image', 'textdomain'),
    'insert_into_item' => __('Insert into services', 'textdomain'),
    'uploaded_to_this_item' => __('Uploaded to this services', 'textdomain'),
    'items_list' => __('services list', 'textdomain'),
    'items_list_navigation' => __('services list navigation', 'textdomain'),
    'filter_items_list' => __('Filter services list', 'textdomain'),
  );
  $args = array(
    'label' => __('services', 'textdomain'),
    'description' => __('', 'textdomain'),
    'labels' => $labels,
    'menu_icon' => '',
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'taxonomies' => array(),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 20,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'can_export' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'exclude_from_search' => false,
    'show_in_rest' => true,
    'publicly_queryable' => true,
    'capability_type' => 'post',
  );
  register_post_type('services', $args);
}
add_action('init', 'create_services_cpt', 0);


// Comment Foam////

function wpb_move_comment_field_to_bottom($fields)
{
  $comment_field = $fields['comment'];
  unset($fields['comment']);
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');


// Pagination//
add_filter('woocommerce_pagination_args',  'rocket_woo_pagination');
function rocket_woo_pagination($args)
{

  $args['prev_text'] = '<i class="fa-angle-double-left"></i>';
  $args['next_text'] = '<i class="fa-angle-double-right"></i></i>';

  return $args;
}



/**
 * Remove related products output
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);



// To change add to cart text on single product page

// add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' );

// function woocommerce_custom_single_add_to_cart_text() {

//     return __( 'Buy Now', 'woocommerce' );

// }

// To change add to cart text on product archives(Collection) page
add_filter('woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text');
function woocommerce_custom_product_add_to_cart_text()
{
  return __('Buy Now', 'woocommerce');
}


/**
 * Show cart contents / total Ajax
 */

add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');

function woocommerce_header_add_to_cart_fragment($fragments)
{
  global $woocommerce;

  ob_start();

?>
  <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><i class="fas fa-shopping-cart"></i> <span class="item-count"><?php echo sprintf(_n('%d', '%d', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> </span> </a>
<?php
  $fragments['a.cart-customlocation'] = ob_get_clean();
  return $fragments;
}



######################################################################################
//ADD custom logo on wordpress login page
######################################################################################
add_action('login_enqueue_scripts', 'my_login_logo');
function my_login_logo()
{
  global $fdata;
  //print_r($fdata['login-logo']);
  $logo_url = (isset($fdata['login-logo']) ? $fdata['login-logo']['url'] : get_bloginfo('template_url') . '/images/logo_05.jpg');
  $logo_height = (isset($fdata['login-logo']) ? $fdata['login-logo']['height'] : '111');
?>
  <style type="text/css">
    body.login {
      background-color: #01216C;
    }

    body.login div#login h1 a {
      background-image: url(<?php echo $logo_url ?>);
      padding: 0px;
      margin: 0 auto 25px;
      width: auto;
      height: <?= $logo_height ?>px;
      background-position: center center;
      background-size: contain;
    }
  </style>
<?php }



function my_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
  return get_bloginfo('name'); //'Your Site Name and Info';
}
add_filter('login_headertitle', 'my_login_logo_url_title');

// Redux framework for theme options

if (file_exists(dirname(__FILE__) . '/inc/admin-folder/admin/admin-init.php')) {
  require_once(dirname(__FILE__) . '/inc/admin-folder/admin/admin-init.php');
}

// ADD PAGE SLUG TO BODY CLASS
function add_page_slug_body_class($classes)
{
  global $post;

  if (isset($post)) {
    $classes[] = 'page-' . $post->post_name;
  }
  return $classes;
}
add_filter('body_class', 'add_page_slug_body_class');

// AJAX handler for contact modal form
add_action('wp_ajax_aspire_contact', 'aspire_contact_ajax_handler');
add_action('wp_ajax_nopriv_aspire_contact', 'aspire_contact_ajax_handler');

function aspire_contact_ajax_handler()
{
  check_ajax_referer('aspire_contact_nonce', 'nonce');

  $name = isset($_POST['name']) ? sanitize_text_field($_POST['name']) : '';
  $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  $message = isset($_POST['message']) ? sanitize_textarea_field($_POST['message']) : '';

  if (empty($name) || empty($email) || empty($message)) {
    wp_send_json_error('Please fill all required fields.');
  }

  $to = get_option('admin_email');
  $subject = 'Contact form submission from ' . $name;
  $body = "Name: {$name}\nEmail: {$email}\n\nMessage:\n{$message}";
  $headers = array('Content-Type: text/plain; charset=UTF-8', 'From: ' . $name . ' <' . $email . '>');

  $sent = wp_mail($to, $subject, $body, $headers);

  if ($sent) {
    wp_send_json_success('Message sent successfully.');
  } else {
    wp_send_json_error('Failed to send message.');
  }
}

function enqueue_gsap_with_lenis() {
    // GSAP Core & ScrollTrigger
    wp_enqueue_script('gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), false, true);
    wp_enqueue_script('gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap-js'), false, true);
    
    // Add Lenis for Smooth Scrolling
    wp_enqueue_script('lenis', 'https://unpkg.com/@studio-freight/lenis@1.0.42/dist/lenis.min.js', array(), false, true);
    
    // Your main JS file
    wp_enqueue_script('gsap-custom', get_template_directory_uri() . '/js/animations.js', array('gsap-js', 'gsap-st', 'lenis'), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_gsap_with_lenis');