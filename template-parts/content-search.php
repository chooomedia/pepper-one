<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

?>
<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

?>

<div class="col-lg-6 col-md-12 col-12">
	<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
	<?php if($thumb) : ?>
	<img src="<?php echo $thumb['0'] ?>" />
	<?php else : ?>
	<img src="https://cuciniale.com/wp-content/uploads/2020/09/cuciniale-background-filler-search.jpg"
		alt="background filler" />
	<?php endif; ?>
</div>

<div class="col-lg-6 col-md-12 col-12">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title mb-4 border-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php wp_template_pepper_one_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>

		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php wp_template_pepper_one_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
</div>