<?php
/**
 * Example of a single WPSL store template for the Twenty Fifteen theme.
 * 
 * @package Twenty_Fifteen
 */

get_header(); 
// get informations from wp Store locator plugin
$queried_object = get_queried_object();
$city = get_post_meta( $queried_object->ID, 'wpsl_city', true );
$phone = get_post_meta( $queried_object->ID, 'wpsl_phone', true );
$email = get_post_meta( $queried_object->ID, 'wpsl_email', true );
?>

<div class="container-fluid p-0">
	<div id="page-sub-header" class="mb-5 post-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');background-attachment: fixed;">
			<div id="partner-banner" class="row p-0 m-0 h-100 justify-content-center align-items-center">
				<div class="col-md-auto col-10 bd-highlight post-thumbnail-inner-content">
					<h1 class="partner-title"><?php the_title(); ?></h1>
					<p>Ihr Cuciniale Partner in <?php echo $city ?></p>
				</div>
			</div>
			<div class="gradient-end-page"></div>
		</div>
	</div><!--#page-sub-header-->
    <main class="container">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class="container-fullwidth row">
                <?php
                    global $post;
                    
                    // Add the map shortcode
                    echo do_shortcode( '[wpsl_map]' ); 
                ?>
                </div><!-- #wpsl-base-gmap_0 -->
                    
                <?php  // Add the content
                    $post = get_post( $queried_object->ID );
                    setup_postdata( $post );
                    wp_reset_postdata( $post );
                    
                    // Add the address shortcode
                    echo do_shortcode( '[wpsl_address]' );
                    echo do_shortcode( '[wpsl_hours]' ); 
                ?>

                <div class="row flex-center-mobile mb-5">
                    <a href="tel:+49<?php echo $phone ?>" title="Fon" class="partner-buttons"><i class="fas fa-3x fa-phone"></i></a>
                    <a href="#partnerEmailModal" data-toggle="modal" data-target="#partnerEmailModal" title="Email" class="partner-buttons"><i class="fas fa-3x fa-envelope"></i></a>
                    <a class="partner-buttons d-none" title="Route" ><i class="fas fa-3x fa-map-marked-alt"></i></a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="partnerEmailModal" tabindex="-1" role="dialog" aria-labelledby="partnerEmailModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo the_title() ?> kontaktieren</h5>
                                <button type="button" class="close" style="filter:invert(1);" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <?php echo do_shortcode("[contact-form-7 id='1326' title='Partnerkontaktformular']"); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <a class="rounded btn-partner-back" href="/buy-now" rel="prev"> Zurück zur Partnerübersicht</a>
            </div>

            <!-- Spacer for desktop views only -->
            <div style="width:100%; height:9vh;" class="d-none d-md-block"></div>

            </article>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>