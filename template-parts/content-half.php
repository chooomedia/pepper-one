<?php
/**
 * Template part for half display posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

?>

<?php $recipeLink = get_field( 'recipe-button-link' ); ?>
<?php $recipeLinkTitle = get_field( 'recipe-button-link-title' ); ?>
<div class="container-fluid p-0">
	<article id="post-<?php the_ID(); ?>" class="row">
		<div class="col-md-6 pr-md-4">
			<div class="h-100 mb-0 contact-thumbnail" style="background-size:cover;background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
				<!-- Widget Area for Contact Form Informations -->
				<?php if ( is_active_sidebar( 'contact-widget' )) : ?>
					<?php dynamic_sidebar( 'contact-widget' ); ?>
				<?php endif;?>
			</div>
		</div>
		<div id="contact-form" class="col-md-6 boxed-container">
			<div class="entry-content">
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
			</div><!-- .entry-content -->
		</div>
	</article><!-- #post-## -->
</div>
<div class="container">