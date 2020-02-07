<?php
/**
 * Singe Partner Site Tempate.
 * 
 * @package wp_template_pepper_one
 */

 //response generation function
 $response = "";

 //function to generate response
 function my_contact_form_generate_response($type, $message){

     global $response;

     if($type == "success") $response = "<div class='success'>{$message}</div>";
     else $response = "<div class='error'>{$message}</div>";
 }

 //response messages
 $not_human       = "Das ist leider falsch - bitte wiederholen";
 $missing_content = "Bitte füllen Sie alle Felder aus";
 $email_invalid   = "Email Adresse falsch";
 $message_unsent  = "Anfrage nicht versendet - Bitte erneut versuchen.";
 $message_sent    = "Vielen Dank die Anfrage wurde verschickt. Sie erhalten innerhalb von 3 - 5 Werktagen Bescheid.";
 
 //user posted variables
 $name = $_POST['message_name'];
 $email = $_POST['message_email'];
 $tel = $_POST['message_tel'];
 $message = $_POST['message_text'];
 $human = $_POST['message_human'];

 // Array for multi-send Email
 $recipients = array(
    "info@cuciniale.com",
    $partneremail
 );

 $content = array(
     "<p>Kundenname: " . $name . "</p>",
     "<p>Kundentelefonnummer: " . $tel . "</p>",
     "<p>Nachricht: " . $message . "</p>"
 );
 
 //php mailer variables
 $to = implode(',', $recipients);
 $subject = get_bloginfo('name') . " - Neue Produktanfrage";
 $headers = 'From: '. $email . "\r\n";
 $headers .= "MIME-Version: 1.0\r\n";
 $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
 'Reply-To: ' . $email . "\r\n";

 //Human verification
 if(!$human == 0) {
     if($human != 2) my_contact_form_generate_response("error", $not_human); //not human!
     else {

         //validate email
         if(!filter_var($email, FILTER_VALIDATE_EMAIL))
             my_contact_form_generate_response("error", $email_invalid);
         else //email is valid
         {
             //validate presence of name and message
             if(empty($name) || empty($message) || empty($tel)){
                 my_contact_form_generate_response("error", $missing_content);
             }
             //ready to go!
             else 
             {
                 $sent = wp_mail($to, $subject, implode($content), $headers);
                 if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
                 else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
             }
         }  
     }
 }
 else if ($_POST['submitted']) my_contact_form_generate_response("error", $missing_content);

get_header(); 
// get informations from wp Store locator plugin
    $queried_object = get_queried_object();
    $city = get_post_meta( $queried_object->ID, 'wpsl_city', true );
    $phone = get_post_meta( $queried_object->ID, 'wpsl_phone', true );
    $partneremail = get_post_meta( $queried_object->ID, 'wpsl_email', true );
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
                            <?php echo $response; ?>
                                <form id="partnerFrm" action="<?php the_permalink(); ?>">
                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="message_name">Name</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="far fa-user"></i>
                                            </div>
                                            <input type="text" class="inputPostalCode" name="message_name" placeholder="Name" value="<?php echo esc_attr($_POST['message_name']); ?>" required autofocus autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="message_email">Email</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="far fa-envelope-open"></i>
                                            </div>
                                            <input type="text" class="inputPostalCode" name="message_email" placeholder="Email Adresse" value="<?php echo esc_attr($_POST['message_email']); ?>" required autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="message_tel">Telefon</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-phone"></i>
                                            </div>
                                            <input type="tel" class="inputPostalCode" name="message_tel" placeholder="Telefonnummer" value="<?php echo esc_attr($_POST['message_tel']); ?>" required autocomplete="off" />
                                        </div>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="message_text">Nachricht</label>
                                        <textarea type="text" class="col-12 rounded" rows="6" name="message_text" placeholder="Nachricht an Uns"><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="sr-only" for="message_human">Mensch</label>
                                        <div class="btn-group col-md-12 p-0" role="group">
                                            <div class="input-group-addon">
                                                <i class="fas fa-robot"></i>
                                            </div>
                                            <input type="text" class="inputPostalCode" style="width: 60px;" name="message_human" required><span class="human ml-md-1"> + 3 = 5</span>
                                            <input type="hidden" name="submitted" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="acceptGDPR" autocomplete="off" />
                                            <label class="form-check-label" for="defaultCheck1">
                                                Hiermit bestätigen Sie die <a href="/impressum#datenschutz" target="_blank" title="Datenschutzbestimmungen akzeptieren">Datenschutzbestimmungen</a>
                                            </label>
                                        </div>    
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-cta btn-submit" disabled="disabled">
                                        <i class="far fa-envelope"></i> Senden
                                    </button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </article>

            <div class="d-none d-md-block" style="width:100%;height:5rem;"></div>
        </main><!-- #main -->
    </div><!-- #primary -->

    <!-- Check the Private Policities -->
    <script>
    jQuery(function($) {
        $("input#acceptGDPR").click(function() {
            if ($(this).is(':checked')) {
                $("button.btn-submit").removeAttr('disabled');
                $("#partnerFrm").attr('method', 'post')
            } else {
                $("button.btn-submit").attr('disabled', 'disabled');
                $("#partnerFrm").removeAttr('method');
            }
        });
    });
    </script>
    
<?php get_footer(); ?>