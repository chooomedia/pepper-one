<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

get_header(); ?>
	<div id="page-sub-header" class="mb-5" style="background-image: url('http://localhost:8888/wp-content/uploads/2019/12/monthlyrecipe0316.jpg');">
		<div class="gradient-end-page"></div>
	</div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div id="content" class="row">
					<div class="col-md-4">
						<?php the_date( 'Y' ); ?>
					</div>
					<div class="offset-md-4 col-md-4">
						<p class="recipe-app-info float-right">
							In der Groumetpilot2 App <br>digital verfügbar
						</p>
					</div>
				<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'recipes' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
