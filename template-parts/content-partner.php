<?php
/**
 * Template part for displaying specific posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

?>
<?php $recipeLink = get_field( 'recipe-button-link' ); ?>
<?php $recipeLinkTitle = get_field( 'recipe-button-link-title' ); ?>
<div class="container-fluid p-0">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<div class="container">
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h2 class="text-center">', '</h2>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>

			</header><!-- .entry-header -->
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

			<footer class="entry-footer">
				<?php wp_template_pepper_one_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		</div>
	</article><!-- #post-## -->
</div>
<div class="container">