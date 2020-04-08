<?php
/**
 * Template Name: Product Landingpage 
 */

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
$plz = $_POST['message_plz'];
$message = $_POST['message_text'];
$human = $_POST['message_human'];

// Array for multi-send Email
$recipients = array(
    "hello@chooo.media",
    "oliver.deimling@cuciniale.com"
);

$content = array(
    "<p>Kundenname: " . $name . "</p>",
    "<p>Kundenpostleitzahl: " . $plz . "</p>",
    "<p>Nachricht: " . $message . "</p>"
);

//php mailer variables
$to = implode(',', $recipients);
$subject = get_bloginfo('name') . " - Neue Bestellung " . get_the_title();
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
            if(empty($name) || empty($message) || empty($plz)){
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

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="<?php echo get_theme_mod('header_bg_color_setting', '#fff'); ?>">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61015950-1"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Social-Media Button Area-->
<?php if (is_active_sidebar('socialmedia-buttons') ) : ?>
    <?php if ( is_page() ) {
        dynamic_sidebar('socialmedia-buttons');
    } ?>
<?php endif;?>

<?php wp_nav_menu( array( 
        'theme_location'    => 'social-media-menu',
        'container'         => '',
        'container_id'      => '',
        'container_class'   => '',
        'menu_class'        => 'circled-buttons'
         ) );
?>

    <div class="wrapper product-page-wrapper">
        <!-- Sidebar-Nav -->
        <nav id="sidebar" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
            <?php
                wp_nav_menu(array(
                'theme_location'  => 'sidebar-nav',
                'container'       => 'div',
                'container_id'    => 'sidebar-nav',
                'container_class' => 'navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
            ?>
            <?php get_search_form(); ?>
        </nav>

        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-pepper-one' ); ?></a>
            
            <header id="masthead" class="site-header navbar-static-top sticky-top <?php echo wp_template_pepper_one_bg_class(); ?>" role="banner">
                <div class="container-fluid pl-0 ml-0">
                    <nav class="navbar navbar-expand-xl p-0 d-flex justify-content-between" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                        <button type="button" id="sidebarCollapse" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        

                        <div class="navbar-brand" itemscope itemtype="http://schema.org/Brand">
                            <?php if ( get_theme_mod( 'wp_template_pepper_one_logo' ) ): ?>
                                <a itemprop="name" href="<?php echo esc_url( home_url( '/' )); ?>">
                                    <img itemprop="logo" src="<?php echo esc_url(get_theme_mod( 'wp_template_pepper_one_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                                </a>
                            <?php else : ?>
                                <a itemprop="name" class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                            <?php endif; ?>
                        </div>
                    </nav>
                </div>
            </header>

            <!-- Catch Page-Background Image -->
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div id="page-sub-header" style="background-image: url('<?php echo $thumb['0'] ?>')">
                <div class="gradient-end-page"></div>
            </div>
                    
            <div id="content" class="site-content layer-over-footer">
                <div class="container">
                    <div class="row">
                        <section id="primary landingpage" class="content-area">
                            <main id="main" class="site-main" role="main">
                                <div id="content" class="article-content py-5">
                                    <div class="container text-white">
                                        <?php
                                        while ( have_posts() ) : the_post();

                                            get_template_part( 'template-parts/content', 'page' );

                                            // If comments are open or we have at least one comment, load up the comment template.
                                            if ( comments_open() || get_comments_number() ) :
                                                comments_template();
                                            endif;

                                        endwhile; // End of the loop.
                                        ?>
                                    </div>
                                </div>
                            </main><!-- #main -->
                        </section><!-- #primary -->

    <!-- Check the Private Policities -->
    <script>
    jQuery(function($) {
        $("input#acceptGDPR").click(function() {
            if ($(this).is(':checked')) {
                $("button.btn-submit").removeAttr('disabled');
                $("#productFrm").attr('method', 'post')
            } else {
                $("button.btn-submit").attr('disabled', 'disabled');
                $("#productFrm").removeAttr('method');
            }
        });
    });
    </script>
<?php
get_footer(); ?>


<!-- Modal -->
<div class="modal fade" id="productEmailModal" tabindex="-1" role="dialog" aria-labelledby="partnerEmailModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"><?php echo the_title() ?> bestellen</h5>
                <button type="button" class="close" style="filter:invert(1);" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="m-3">
                    <?php echo $response; ?>
                </span>
                <form id="productFrm" action="<?php the_permalink(); ?>">
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
                        <label class="sr-only" for="message_plz">PLZ</label>
                        <div class="btn-group col-md-12 p-0" role="group">
                            <div class="input-group-addon">
                                <i class="fas fa-map"></i>
                            </div>
                            <input type="number" class="inputPostalCode" name="message_plz" maxlength="5" placeholder="Postleitzahl" value="<?php echo esc_attr($_POST['message_plz']); ?>" autocomplete="off" />
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="sr-only" for="message_text">Nachricht</label>
                        <textarea type="text" class="col-12 rounded" rows="6" name="message_text" placeholder="Nachricht an Uns" required><?php echo esc_textarea($_POST['message_text']); ?></textarea>
                    </div>

                    <div class="form-group mb-4">
                        <label class="sr-only" for="message_human">Mensch</label>
                        <div class="btn-group col-md-12 p-0" role="group">
                            <div class="input-group-addon">
                                <i class="fas fa-brain"></i>
                            </div>
                            <input type="text" class="inputPostalCode" style="width: 60px;" name="message_human" required><span class="human ml-md-1 text-white"> + 3 = 5</span>
                            <input type="hidden" name="submitted" value="1">
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="acceptGDPR" autocomplete="off" />
                            <label class="form-check-label text-white" for="defaultCheck1">
                            Hiermit akzeptiere ich die <a href="/impressum#datenschutz" target="_blank" title="Datenschutzbestimmungen akzeptieren"><u>AGB</u></a> zur Verarbeitung meiner Daten.
                            </label>
                        </div>    
                    </div>

                    <?php if(!$terms) : ?>
                        <button type="submit" class="btn btn-primary btn-cta btn-submit" disabled="disabled">
                            <i class="far fa-envelope"></i> Senden
                        </button>
                    <?php else : ?>
                        <button onclick="return gtag_report_conversion('https://cuciniale.com/partners/kueche-design-gmbh/')" type="submit" class="btn btn-primary btn-cta btn-submit" disabled="disabled">
                            <i class="far fa-envelope"></i> Senden
                        </button>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>