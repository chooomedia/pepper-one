<?php
/**
* Template Name: Full Width
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
				<!-- Add Widget Area on the Bottom of the Page Content-->
				<?php if ( is_active_sidebar( 'page-bottom-widget' ) ) : ?>
				<?php dynamic_sidebar( 'page-bottom-widget' ); ?>
			<?php endif; ?>
	</section><!-- #primary -->

<?php
get_footer();
