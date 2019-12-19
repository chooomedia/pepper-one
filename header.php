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

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-61015950-1"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Social-Media Button Area-->
<?php if ( is_active_sidebar( 'socialmedia-buttons' )) : ?>
    <?php dynamic_sidebar( 'socialmedia-buttons' ); ?>
<?php endif;?>

<div class="wrapper">
    <!-- Sidebar-Nav -->
    <nav id="sidebar">
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
        <div class="sidebar-brand mx-auto text-center">
            <img style="max-width: 3rem;" src="<?php echo get_site_icon_url(); ?>" alt="Logo small" />
        </div>
    </nav>

    <div id="page" class="site">
	    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-pepper-one' ); ?></a>
        <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
        <header id="masthead" class="site-header navbar-static-top sticky-top <?php echo wp_template_pepper_one_bg_class(); ?>" role="banner">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-xl p-0">
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

                    <div class="navbar-brand">
                        <?php if ( get_theme_mod( 'wp_template_pepper_one_logo' ) ): ?>
                            <a href="<?php echo esc_url( home_url( '/' )); ?>">
                                <img src="<?php echo esc_url(get_theme_mod( 'wp_template_pepper_one_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                            </a>
                        <?php else : ?>
                            <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                        <?php endif; ?>

                    </div>
                </nav>
            </div>
        </header><!-- #masthead -->

        <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
            <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div id="page-sub-header" style="background-image: url('<?php echo $thumb['0'];?>');">
                <div class="container">
                    <h1>
                        <?php
                        if(get_theme_mod( 'header_banner_title_setting' )){
                            echo get_theme_mod( 'header_banner_title_setting' );
                        }
                        ?>
                    </h1>
                    <p>
                        <?php
                        if(get_theme_mod( 'header_banner_tagline_setting' )){
                            echo get_theme_mod( 'header_banner_tagline_setting' );
                        }
                        ?>
                    </p>
                    <!--<a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>-->
                </div>
                <div class="gradient-end-page"></div>
            </div>

            <div id="content" class="site-content layer-over-footer">
                <div class="container-fluid">
                    <div class="row">
                        <?php endif; ?>
            
        <?php endif; ?>