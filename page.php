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
 * @package wp_template_pepper_one
 */

get_header(); ?>

<?php if( get_field( "video_link")) {
	$videoid = get_field( 'video_link' );
} ?>

<!-- Insert the YouTube-Player -->
<script async src="https://www.youtube.com/iframe_api"></script>
<script async src="<?php echo get_template_directory_uri() ?>/inc/assets/js/video.js"></script>

<?php if( is_page() && get_field( 'video_link' ) ) {																
	echo '<section id="home-banner-box" class="lazy home-banner loading">
			<div class="image video-slide">
				<div class="video-background">
					<div class="video-foreground" id="ytplayer">
					</div>
				</div>
			</div>
		</section>';
} else {
    if( has_post_thumbnail( get_the_ID() ) ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		echo '<div id="page-sub-header" style="background-image: url('. $thumb['0'] .')">';
		echo '<div class="gradient-end-page"></div>';
    }
} ?>

</div>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div id="content" class="article-content py-5">
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
