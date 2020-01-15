<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

get_header(); ?>
	<div id="page-sub-header" class="mb-5 post-thumbnail" style="background: url('../wp-content/uploads/2019/12/monthlyrecipe0316.jpg');">
		<div id="recipe-banner" class="row p-0 m-0 h-100 justify-content-center align-items-center">
			<div class="col-auto bd-highlight post-thumbnail-inner-content">
				<h1>Rezepte</h1>
				<p>für jeden Monat</p>
			</div>
		</div>
		<div class="gradient-end-page"></div>
	</div>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="container">
				<div id="content" class="row">
				<?php
					$date_variable = '';

					while ( have_posts() ) : the_post();
						$year = get_the_date( 'Y' );

						if ( $date_variable != $year ) // Year values are not the same
							echo '<div class="col-md-4 float-left"><h2>' . $year . '</h2></div>
									<div class="offset-md-4 col-md-4">
										<p class="recipe-app-info">
											In der Groumetpilot2 App <br>digital verfügbar
										</p>
									</div>';

						// Set $date_variable to $year
						$date_variable = $year;

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
