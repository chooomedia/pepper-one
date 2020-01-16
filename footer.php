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
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
</div><!-- .wrapper -->
	<footer id="colophon" class="site-footer <?php echo wp_template_pepper_one_bg_class(); ?>" role="contentinfo">
		<div id="footer-cta" class="container">
			<?php if ( is_active_sidebar( 'footer-cta' )) : ?>
				<?php dynamic_sidebar( 'footer-cta' ); ?>
			<?php endif;?>
		</div>
		<?php get_template_part( 'footer-widget' ); ?>
		<div class="container">
			</br>
            <div class="site-info pb-md-2">
                <?php echo 'cuciniale.com'; ?><br> &copy; <?php echo date('Y'); ?>
				</br>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->
<!-- Dark Overlay element -->
<div class="overlay"></div>
<?php wp_footer(); ?>
</body>
</html>