<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wp_template_pepper_one
 */

get_header(); ?>


<style>
	.flex-reverse-row {
    -webkit-box-orient: horizontal !important;
    -webkit-box-direction: reverse !important;
    -ms-flex-direction: row-reverse !important;
    flex-direction: row-reverse !important;
}
</style>

	<section id="primary" class="content-area container-fluid">
		<main id="main" class="site-main container py-5" role="main">

		<?php
		if ( have_posts() ) : ?>
			<header class="page-header mb-5">
				<h1 class="page-title"><?php printf( esc_html__( 'Suchergebnisse für: %s', 'wp-pepper-one' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php $i = 0; ?>
			<?php while ( have_posts() ) : the_post();
 				echo '<div class="' . esc_attr($i % 2 == 0 ? 'row' : 'row flex-row-reverse') .'"mb-5 pb-5">';
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
			echo '</div></br>';

			$i++; endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
