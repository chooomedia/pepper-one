<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp_template_pepper_one
 */

get_header(); ?>
<div id="page-sub-header" class="post-thumbnail mb-0"
	style="background-image: url('<?php echo get_template_directory_uri() . '/inc/assets/img/page-404-cuciniale-plate-on-red-background.jpg'; ?>');margin-top:-35px;height: 45vh;background-size:cover;background-repeat: no-repeat;">
</div>
<section id="primary" class="content-area col-12">
	<main id="main" class="site-main d-flex justify-content-center text-center" role="main">

		<section class="error-404 not-found">
			<header class="page-header mt-5 pt-3">
				<h1 class="page-title"><?php esc_html_e( 'Oops! Hier gibt es leider nichts.', 'wp-pepper-one' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content mb-5 pb-3">
				<p><?php esc_html_e( 'Es sieht so aus, als wäre an diesem Ort nichts gefunden worden.', 'wp-pepper-one' ); ?></p>
				<p><?php get_search_form(); ?></p>
			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->
</section><!-- #primary -->
<div class="col-12 px-3">
	<h2 class="text-center">Unsere Rezepte des Monats</h2>
	<p class="text-center">Von süß bis festlich-deftig</p>
	<?php adl_post_slider(1313); ?>
	<div style="width:100%;height:10vh;"></div>
</div>

<?php
get_footer();