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

<!-- Insert the YouTube-Player -->
<script async src="https://www.youtube.com/iframe_api"></script>
<script async src="<?php echo get_template_directory_uri() ?>/inc/assets/js/video.js"></script>
		
	<?php if( get_field( "video_link")) {
		$videoid = get_field( 'video_link' );
		echo '<section id="home-banner-box" class="loading">
					<div class="image video-slide">
						<div class="video-background">
							<div class="video-foreground" id="ytplayer">
							</div>
						</div>
					</div>
				</section>';
	} else if( has_post_thumbnail( get_the_ID() ) ) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		echo '<div id="page-sub-header" style="background-image: url('. $thumb['0'] .')">';
		echo '<div class="gradient-end-page"></div></div>';
	} ?>

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

			<section id="intro" class="main fullscreen">
				<div class="slider-wrapper">
					<div id="recipe-slider" class="owl-carousel owl-theme">
						<div class="owl-stage-outer">
							<div class="owl-stage">
								<?php $loop = new WP_Query( array( 'post_type' => 'recipes', 'posts_per_page' => -1 ) );?>
								<?php while ( $loop->have_posts() ) : $loop->the_post();?>

								<?php
									$slide_text = get_post_meta($post->ID, "_text", true); 
									$slide_url = get_post_meta($post->ID, "_url", true); 
									$slide_img = get_the_post_thumbnail(); 
								?>

								<div class="owl-item active" style="background-image: url('<?php echo $slide_img ?>')">
									<?php the_title(); ?> 
								</div>

								<?php endwhile; wp_reset_query(); ?>
							</div>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
