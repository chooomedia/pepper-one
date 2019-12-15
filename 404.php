<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wp_template_pepper_one
 */

get_header(); ?>
<div class="post-thumbnail mb-0" style="background-image: url('<?php echo get_template_directory_uri() . '/inc/assets/img/page-404-cuciniale-plate-on-red-background.jpg'; ?>');height: 71vh;background-size:cover;background-repeat: no-repeat;"></div>
	<section id="primary" class="content-area container-fluid">
		<main id="main" class="site-main d-flex justify-content-center text-center" role="main">

			<section class="error-404 not-found">
				<header class="page-header mt-5 pt-3">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-pepper-one' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content mb-5 pb-3">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp-pepper-one' ); ?></p>

					<?php
						get_search_form();
					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();