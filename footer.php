<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
	<footer id="colophon" class="site-footer <?php echo wp_bootstrap_starter_bg_class(); ?>" role="contentinfo">
		<div class="pt-3 container-fluid footer-cta">
			<?php if ( is_active_sidebar( 'footer-cta' )) : ?>
				<?php dynamic_sidebar( 'footer-cta' ); ?>
			<?php endif;?>
		</div>
		<?php get_template_part( 'footer-widget' ); ?>
		<div class="container">
			</br>
            <div class="site-info">
                <?php echo 'cuciniale.com'; ?><br> &copy; <?php echo date('Y'); ?>
				</br>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>