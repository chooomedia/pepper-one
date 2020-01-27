<?php
/**
 * Template part for displaying Partner Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */
?>

<div class="container-fluid p-0">
	<div id="page-sub-header" class="mb-5 post-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');background-attachment: fixed;">
			<div id="partner-banner" class="row p-0 m-0 h-100 justify-content-center align-items-center">
				<div class="col-md-auto col-10 bd-highlight post-thumbnail-inner-content">
					<h1 class="partner-title"><?php the_title(); ?></h1>
					<p>Ihr Cuciniale Partner in der Region</p>
				</div>
			</div>
			<div class="gradient-end-page"></div>
		</div><!--#page-sub-header-->
	</div>

	<article class="container" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="container">
			<div class="entry-content">
				<div class="row p-0 m-0">
					<?php
					if ( is_single() ) :
						the_content();
					else :
						the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wp-pepper-one' ) );
					endif;

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wp-pepper-one' ),
							'after'  => '</div>',
						) );
					?>
				</div>
			</div><!-- .entry-content -->
			<!-- $partnerLink = get_field( 'partner-store-link' ); -->
			<footer class="entry-footer mb-4">
				<!-- <a href="#partner" class="col-md-4 btn btn-cta btn-dark btn-appointment"><i class="fas fa-calendar"></i> Make an appointment</a> -->
				<?php wp_template_pepper_one_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-## -->
</div>
<div class="container">