<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp_template_pepper_one
 */

get_header(); ?>
<div id="page-sub-header" class="post-thumbnail mb-0" style="background-image: url('<?php echo get_template_directory_uri() . '/inc/assets/img/page-404-cuciniale-plate-on-red-background.jpg'; ?>');height: 71vh;background-size:cover;background-repeat: no-repeat;"></div>
	<section id="primary" class="content-area col-12">
		<main id="main" class="site-main d-flex justify-content-center text-center" role="main">

			<section class="error-404 not-found">
				<header class="page-header mt-5 pt-3">
					<h1 class="page-title"><?php esc_html_e( 'Oops! Hier gibt es leider nichts.', 'wp-pepper-one' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content mb-5 pb-3">
					<p><?php esc_html_e( 'Es sieht so aus, als wäre an diesem Ort nichts gefunden worden.', 'wp-pepper-one' ); ?></p>
				</div><!-- .page-content -->

				<div class="container p-1 d-none d-sm-block">
					<h2>Unsere Rezepte des Monats</h2>
					<p>Von süß bis festlich-deftig</p>
					<?php adl_post_slider(1341); ?>
					<div style="width:100%;height:10vh;"></div>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();