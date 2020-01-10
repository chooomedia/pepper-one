<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

?>

<?php $recipeLink = get_field( 'recipe-button-link' ); ?>
<?php $recipeLinkTitle = get_field( 'recipe-button-link-title' ); ?>
<?php $recipeShortDescr = get_field( 'recipe-short-description' ); ?>
<div class="container-fluid p-0">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="post-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
			<?php if ( 'recipes' == get_post_type() ) : ?>
				<div class="col-md-6 offset-md-5 d-flex flex-row-reverse bd-highlight h-100 p-4">
					<div class="m-md-4 bd-highlight justify-content-center align-self-center post-thumbnail-inner-content">
						<h1><?php the_title() ?></h1>
						<p class="recipes">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>
						<a href="https://<?php echo $recipeLink ?>" target="_blank" title="<?php echo $recipeLinkTitle ?>" class="btn btn-primary btn-bigger">Cook it with the App</a>
					</div>
				</div>
			<?php endif ?>
			<?php if (is_single() && has_category('partner')) : ?>
				<div class="col-md-6 offset-md-6 d-flex flex-row-reverse bd-highlight h-100 p-4">
					<div class="m-4 bd-highlight justify-content-center align-self-center post-thumbnail-inner-content">
						<h1>Partners ut ex <br>vitae enim</h1>
						<p class="recipes"><?php echo $recipeShortDescr ?></p>
						<a href="<?php echo $recipeLink ?>" target="_blank" title="<?php echo $recipeLinkTitle ?>" class="btn btn-primary btn-bigger">Cook it with the App</a>
					</div>
				</div>
			<?php endif ?>
		</div>
		<div class="gradient-end-post"></div>

		<div class="container">
		<?php if ( is_single() && !'recipes' == get_post_type()) : ?>
			<header class="entry-header">
				<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><?php the_title() ?></a></h2>
			</header><!-- .entry-header -->
		<?php endif ?>

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