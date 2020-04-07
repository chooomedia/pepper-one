<?php
/**
 * Template Name: Product Landingpage 
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
        </nav>

        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-pepper-one' ); ?></a>

            <header id="masthead" class="site-header navbar-static-top sticky-top <?php echo wp_template_pepper_one_bg_class(); ?>" role="banner">
                <div class="container-fluid px-0 ml-0">
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

            </header>

        <!-- Catch Page-Background Image -->
        <?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
        <figure role="group" id="page-sub-header" style="background-image: url('<?php echo $thumb['0'] ?>')">
            <div class="gradient-end-page"></div>
        </figure>
            
    <div id="content" class="site-content layer-over-footer">
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

        <script> 
        jQuery(function($) {
        
        })
        </script>
<?php
get_footer();