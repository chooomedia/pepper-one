<?php
/**
 * Template Name: Thank you Page
 */

get_header(); ?>

<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div id="content" class="article-content">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<?php if( has_post_thumbnail( get_the_ID() ) ) {
						$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						echo '<div id="page-sub-header" style="background-image: url('. $thumb['0'] .')">';
						echo '<div class="gradient-end-page"></div></div>';
					} ?>
				</div>
				<div class="col-lg-6 col-md-12 d-flex align-items-center px-5">
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>
		</div>
	</main><!-- #main -->
</section><!-- #primary -->

<?php
get_footer();