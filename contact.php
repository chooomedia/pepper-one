<?php
/**
* Template Name: Contact
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 p-0">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'half' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
    </section><!-- #primary -->
    <!-- Script to reset Contact-Form Fields -->
    <script>
        jQuery('.form-wrapper button.submit').click(function(e){
            // prevent default submit
            e.preventDefault();
        });
    </script>

<?php
get_footer();