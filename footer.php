<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_template_pepper_one
 */

?>

<?php $queried_object = get_queried_object();
	$terms = wp_get_post_terms( $queried_object->ID, 'wpsl_store_category', '' );
?>

<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
</div><!-- .wrapper -->
	<footer id="colophon" class="site-footer <?php echo wp_template_pepper_one_bg_class(); ?>" role="contentinfo">
		<?php if (!$terms) : ?>
			<div id="footer-cta" class="container">
				<?php if ( is_active_sidebar( 'footer-cta' )) : ?>
					<?php dynamic_sidebar( 'footer-cta' ); ?>
				<?php endif;?>
			</div>
			<?php get_template_part( 'footer-widget' ); ?>
		<?php endif; ?>

			<div class="container">
				</br>
				<?php if (!$terms) : ?>
					<div class="site-info pb-3 pb-md-4">
						<?php echo 'cuciniale.com'; ?>
						<br> 
					&copy; <?php echo date('Y'); ?>
					</div><!-- close .site-info -->
				<?php else : ?>
					<div class="my-5">
						<div class="site-info pb-3 pb-md-4">
							<?php echo 'cuciniale.com'; ?>
							<br> 
						</div><!-- close .site-info -->
					</div>
				<?php endif; ?>
		
			</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<?php if(!$terms) : ?>
	<!-- Dark Overlay element -->
	<div class="overlay"></div>
<?php else : ?>
	<script>
		jQuery(function($) {
			$("#masthead > div > nav > div > a > img").unwrap();
		});
	</script>
<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>