<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_template_pepper_one
 */

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

<!-- Load Wp Store Locator Cathegorie Variable if useing Cathegory "Landingpage" -->
<?php if(is_single() ) : ?>
    <?php $queried_object = get_queried_object();
        $terms = wp_get_post_terms( $queried_object->ID, 'wpsl_store_category', '' );
    ?>
<?php endif; ?>


<div class="wrapper">
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

        <div class="sidebar-brand mx-auto text-center d-none" itemscope="itemscope" itemtype="https://schema.org/Brand">
            <img itemprop="logo" style="max-width: 3rem;" src="<?php echo get_site_icon_url(); ?>" alt="Logo small" />
            <span itemprop="name" id="template-brand">Pepper-One v1.6</span>
        </div>
    </nav>

    <div id="page" class="site">
	    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-pepper-one' ); ?></a>
        <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
        <header id="masthead" class="site-header navbar-static-top sticky-top <?php echo wp_template_pepper_one_bg_class(); ?>" role="banner">
            <div class="container-fluid pl-0 ml-0">

            <?php if (!$terms) : ?>
                <nav class="navbar navbar-expand-xl p-0" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                    <button type="button" id="sidebarCollapse" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <?php
                    wp_nav_menu(array(
                    'theme_location'    => 'primary',
                    'container'       => 'div',
                    'container_id'    => 'main-nav',
                    'container_class' => 'collapse navbar-collapse justify-content-end',
                    'menu_id'         => false,
                    'menu_class'      => 'navbar-nav',
                    'depth'           => 3,
                    'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                    'walker'          => new wp_bootstrap_navwalker()
                    ));
                    ?>
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

                <?php else : ?>
                    <nav class="navbar navbar-expand-xl p-0 d-flex justify-content-end" itemscope="itemscope" itemtype="https://schema.org/SiteNavigationElement">
                        <div class="navbar-brand px-3" itemscope itemtype="http://schema.org/Brand">
                        <?php if ( get_theme_mod( 'wp_template_pepper_one_logo' ) ): ?>
                            <a itemprop="name" href="<?php echo esc_url( home_url( '/' )); ?>">
                                <img itemprop="logo" src="<?php echo esc_url(get_theme_mod( 'wp_template_pepper_one_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </a>
                        <?php else : ?>
                            <a itemprop="name" class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                        <?php endif; ?>
                        </div>
                    </nav>
                <?php endif; ?>
            </div>
        </header><!-- #masthead -->

        <?php if( get_field( "video_link")) : ?>
            <?php $videoid = get_field( 'video_link' ); ?>
            <script type="text/javascript">var videoID = "<?php Print($videoid); ?>";</script>
            <script async src="<?php echo get_template_directory_uri() ?>/inc/assets/js/video.js"></script>
        <?php endif; ?>
        
        <!-- Add Custom Field for Video Background & required Scripts for embed yt video background -->
        <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )):			
                echo '<figure role="group" id="home-banner-box" class="loading">
                            <div class="image video-slide">
                                <div class="video-background">
                                    <div class="video-foreground" id="ytplayer">
                                    </div>
                                </div>
                            </div>
                        </figure>';

                if( !is_front_page() || is_single()) {
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    echo '<div id="page-sub-header" style="background-image: url('. $thumb['0'] .')">';
                    echo '<div class="gradient-end-page"></div></div>';
                }

                if( is_singular('recipe') ) {
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
                    echo '<figure role="group" id="page-sub-header" style="background-image: url('. $thumb['0'] .')">
                              <div id="recipe-banner" class="col-md-6 offset-md-5 d-flex flex-row-reverse bd-highlight h-100 p-4">
                                <figcaption class="m-md-4 bd-highlight justify-content-center align-self-center post-thumbnail-inner-content" style="z-index:9;">
                                    <h1>Rezept</h1>
                                    <p>für jeden Monat</p>
                                </figcaption>
                            </div>
                            <div class="gradient-end-page"></div>
                          </figure>';
                } 
                
            ?>

            <div id="content" class="site-content layer-over-footer">
                <div class="container-fluid">
                    <div class="row">
                        <?php endif; ?>
        <?php endif; ?>