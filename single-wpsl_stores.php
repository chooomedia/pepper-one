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
                                <form name="frmContact" id="frmContact" method="post" action="" enctype="multipart/form-data" onsubmit="return validateContactForm()">
                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="name">Name</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <input type="text" class="inputPostalCode" name="userName" id="userName" placeholder="Name" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="email">Email</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="far fa-envelope-open"></i>
                                            </div>
                                            <input type="text" class="inputPostalCode" name="userEmail" id="userEmail" placeholder="E-Mail Adresse" required />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="userTel">Telefon</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <input type="tel" class="inputPostalCode" name="userTel" id="userTel" placeholder="+49 12345 678910" required />
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="message">Nachricht</label>
                                        <textarea name="content" id="content" class="col-12 rounded" rows="6" placeholder="Nachricht an Uns" ></textarea>
                                    </div>
                                        <button id="sendBtn" type="submit" class="btn btn-primary btn-cta">
                                            <i class="far fa-envelope"></i> Senden
                                        </button>
                                    </div>
                                    <div id="statusMessage"> 
                                        <?php if (! empty($message)) { ?>
                                            <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                                        <?php } ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <div class="d-none d-md-block" style="width:100%;height:5rem;"></div>
        </main><!-- #main -->
    </div><!-- #primary -->
    <?php
        if(!empty($_POST["send"])) {
            $name = $_POST["userName"];
            $email = $_POST["userEmail"];
            $tel = $_POST["userTel"];
            $content = $_POST["content"];

            $recipients = array(
                "info@cuciniale.com",
                $email
            );

            $toEmail = implode(',', $recipients);
            $mailHeaders = "From: " . $name . "<". $email .">\r\n";
            if(mail($toEmail, $tel, $content, $mailHeaders)) {
                $message = "Ihre Anfrage wurde versandt.";
                $type = "success";
            }
        }
        require_once "single-wpsl_stores.php";
    ?>


    <!-- Script for contact-form-validation and send via ajax -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
    <script type="text/javascript">
        jQuery(function($) {
            function validateContactForm() {
                var userName = $("#userName").val();
                var userEmail = $("#userEmail").val();
                var userTel = $("#userTel").val();
                var content = $("#content").val();
                var valid = false;

                if (userName && userEmail && userTel && content == "") {
                    valid = false;
                }

                if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                    valid = false;
                } 

                return valid;
            }

            /*$("#frmContact").change(function() {
                validateContactForm();

                if (valid) {
                    alert("all filled");
                    $("#sendBtn").prop("disabled", false);
                    return valid;
                }
            });*/
        });
    </script>
<?php get_footer(); ?>