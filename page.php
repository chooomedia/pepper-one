<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>


<?php if( get_field( 'video_link' ) ) {
    $videoid = get_field( 'video_link' );
    echo '<div class="videoWrapper"><iframe id="ytplayer" type="text/html" width="100%" height="100%" src="https://www.youtube.com/embed/' . $videoid . '?autoplay=1&controls=0&rel=0&showinfo=0" frameborder="0" controls="0" showinfo="0"></iframe></div>';
} else {
    if( has_post_thumbnail( get_the_ID() ) ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		echo '<div id="page-sub-header" style="background-image: url('. $thumb['0'] .')">';
		echo '<div class="gradient-end"></div>';
    }
} ?>

</div>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="content" class="article-content">
				<div class="container">
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
		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
