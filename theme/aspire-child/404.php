<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package alpha
 */

get_header();
?>

<main id="primary" class="site-main">

	<section class="error-404 not-found">
		<div class="not_found_inner">   
			<div class="logo">
				<a href="<?php echo get_site_url();?>"><?php the_custom_logo(); ?></a>
			</div>
			<header class="page-header">
				<h1 class="page-title">4<span>0</span>4</h1>
				<h3><?php esc_html_e( 'Oops! ', 'alpha' ); ?></h3>
					<p><?php esc_html_e( 'The Page you are looking for does not exist', 'alpha' ); ?></p>
			</header><!-- .page-header -->

			<div class="page-content">
					<a class="return_home" href="<?php echo get_site_url();?>">Return to Home</a>

					<?php
				//	get_search_form();

				//the_widget( 'WP_Widget_Recent_Posts' );
					?>


					

			</div><!-- .page-content -->
		</div>
	</section><!-- .error-404 -->

</main><!-- #main -->

<?php
get_footer();
