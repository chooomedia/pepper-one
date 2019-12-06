<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php $recipeLink = get_field( 'recipe-button-link' ); ?>
<?php $recipeLinkTitle = get_field( 'recipe-button-link-title' ); ?>
<div class="container-fluid p-0">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
			<?php if (is_single() ) : ?>
				<div class="col-md-6 offset-md-6 d-flex flex-row-reverse bd-highlight h-100 p-4">
					<div class="m-4 bd-highlight justify-content-center align-self-center post-thumbnail-inner-content">
						<h1>Integer ut ex <br>vitae enim</h1>
						<p class="recipes">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
						<a href="<?php echo $recipeLink ?>" target="_blank" title="<?php echo $recipeLinkTitle ?>" class="btn btn-primary btn-bigger">Cook it with the App</a>
					</div>
				</div>
			<?php endif ?>	
		</div>
		<div class="container">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>

				

			</header><!-- .entry-header -->
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

			<footer class="entry-footer">
				<?php wp_bootstrap_starter_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-## -->
</div>
<div class="container">