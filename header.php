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

                    <div id="switcher-wrapper" class="nav-item dropdown pl-0 mr-4">
                        <a class="nav-link dropdown-toggle px-0" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="lang-switcher" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkRBNDQ7IiBkPSJNMTUuOTIzLDM0NS4wNDNDNTIuMDk0LDQ0Mi41MjcsMTQ1LjkyOSw1MTIsMjU2LDUxMnMyMDMuOTA2LTY5LjQ3MywyNDAuMDc3LTE2Ni45NTdMMjU2LDMyMi43ODMgIEwxNS45MjMsMzQ1LjA0M3oiLz4KPHBhdGggZD0iTTI1NiwwQzE0NS45MjksMCw1Mi4wOTQsNjkuNDcyLDE1LjkyMywxNjYuOTU3TDI1NiwxODkuMjE3bDI0MC4wNzctMjIuMjYxQzQ1OS45MDYsNjkuNDcyLDM2Ni4wNzEsMCwyNTYsMHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGQ9Ik0xNS45MjMsMTY2Ljk1N0M1LjYzMywxOTQuNjksMCwyMjQuNjg2LDAsMjU2czUuNjMzLDYxLjMxLDE1LjkyMyw4OS4wNDNoNDgwLjE1NSAgQzUwNi4zNjgsMzE3LjMxLDUxMiwyODcuMzE0LDUxMiwyNTZzLTUuNjMyLTYxLjMxLTE1LjkyMy04OS4wNDNIMTUuOTIzeiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" />
                        </a>
                        <div class="dropdown-menu bg-primary border-0" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item lang-en" href="https://cuciniale.com/en/"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0YwRjBGMDsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjQ0Ljg3LDI1Nkg1MTJjMC0yMy4xMDYtMy4wOC00NS40OS04LjgxOS02Ni43ODNIMjQ0Ljg3VjI1NnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjQ0Ljg3LDEyMi40MzVoMjI5LjU1NmMtMTUuNjcxLTI1LjU3Mi0zNS43MDgtNDguMTc1LTU5LjA3LTY2Ljc4M0gyNDQuODdWMTIyLjQzNXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjU2LDUxMmM2MC4yNDksMCwxMTUuNjI2LTIwLjgyNCwxNTkuMzU2LTU1LjY1Mkg5Ni42NDRDMTQwLjM3NCw0OTEuMTc2LDE5NS43NTEsNTEyLDI1Niw1MTJ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDgwMDI3OyIgZD0iTTM3LjU3NCwzODkuNTY1aDQzNi44NTJjMTIuNTgxLTIwLjUyOSwyMi4zMzgtNDIuOTY5LDI4Ljc1NS02Ni43ODNIOC44MTkgICBDMTUuMjM2LDM0Ni41OTYsMjQuOTkzLDM2OS4wMzYsMzcuNTc0LDM4OS41NjV6Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6IzAwNTJCNDsiIGQ9Ik0xMTguNTg0LDM5Ljk3OGgyMy4zMjlsLTIxLjcsMTUuNzY1bDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NUw4NS4xMDQsODEuMjUybDcuMTYtMjIuMDM3ICBDNzMuMTU4LDc1LjEzLDU2LjQxMiw5My43NzYsNDIuNjEyLDExNC41NTJoNy40NzVsLTEzLjgxMywxMC4wMzVjLTIuMTUyLDMuNTktNC4yMTYsNy4yMzctNi4xOTQsMTAuOTM4bDYuNTk2LDIwLjMwMWwtMTIuMzA2LTguOTQxICBjLTMuMDU5LDYuNDgxLTUuODU3LDEzLjEwOC04LjM3MiwxOS44NzNsNy4yNjcsMjIuMzY4aDI2LjgyMmwtMjEuNywxNS43NjVsOC4yODksMjUuNTA5bC0yMS42OTktMTUuNzY1bC0xMi45OTgsOS40NDQgIEMwLjY3OCwyMzQuNTM3LDAsMjQ1LjE4OSwwLDI1NmgyNTZjMC0xNDEuMzg0LDAtMTU4LjA1MiwwLTI1NkMyMDUuNDI4LDAsMTU4LjI4NSwxNC42NywxMTguNTg0LDM5Ljk3OHogTTEyOC41MDIsMjMwLjQgIGwtMjEuNjk5LTE1Ljc2NUw4NS4xMDQsMjMwLjRsOC4yODktMjUuNTA5bC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjJsLTIxLjcsMTUuNzY1TDEyOC41MDIsMjMwLjR6ICAgTTEyMC4yMTMsMTMwLjMxN2w4LjI4OSwyNS41MDlsLTIxLjY5OS0xNS43NjVsLTIxLjY5OSwxNS43NjVsOC4yODktMjUuNTA5bC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjIgIEwxMjAuMjEzLDEzMC4zMTd6IE0yMjAuMzI4LDIzMC40bC0yMS42OTktMTUuNzY1TDE3Ni45MywyMzAuNGw4LjI4OS0yNS41MDlsLTIxLjctMTUuNzY1aDI2LjgyMmw4LjI4OC0yNS41MDlsOC4yODgsMjUuNTA5aDI2LjgyMiAgbC0yMS43LDE1Ljc2NUwyMjAuMzI4LDIzMC40eiBNMjEyLjAzOSwxMzAuMzE3bDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NWwtMjEuNjk5LDE1Ljc2NWw4LjI4OS0yNS41MDlsLTIxLjctMTUuNzY1aDI2LjgyMiAgbDguMjg4LTI1LjUwOWw4LjI4OCwyNS41MDloMjYuODIyTDIxMi4wMzksMTMwLjMxN3ogTTIxMi4wMzksNTUuNzQzbDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NUwxNzYuOTMsODEuMjUybDguMjg5LTI1LjUwOSAgbC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjJMMjEyLjAzOSw1NS43NDN6Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=" /> EN (UK)</a>
                            <a class="dropdown-item lang-de" href="https://cuciniale.com/"><img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkRBNDQ7IiBkPSJNMTUuOTIzLDM0NS4wNDNDNTIuMDk0LDQ0Mi41MjcsMTQ1LjkyOSw1MTIsMjU2LDUxMnMyMDMuOTA2LTY5LjQ3MywyNDAuMDc3LTE2Ni45NTdMMjU2LDMyMi43ODMgIEwxNS45MjMsMzQ1LjA0M3oiLz4KPHBhdGggZD0iTTI1NiwwQzE0NS45MjksMCw1Mi4wOTQsNjkuNDcyLDE1LjkyMywxNjYuOTU3TDI1NiwxODkuMjE3bDI0MC4wNzctMjIuMjYxQzQ1OS45MDYsNjkuNDcyLDM2Ni4wNzEsMCwyNTYsMHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGQ9Ik0xNS45MjMsMTY2Ljk1N0M1LjYzMywxOTQuNjksMCwyMjQuNjg2LDAsMjU2czUuNjMzLDYxLjMxLDE1LjkyMyw4OS4wNDNoNDgwLjE1NSAgQzUwNi4zNjgsMzE3LjMxLDUxMiwyODcuMzE0LDUxMiwyNTZzLTUuNjMyLTYxLjMxLTE1LjkyMy04OS4wNDNIMTUuOTIzeiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K" /> DE</a>
                        </div>
                    </div>
                    <!-- Proofes the Language Status -->
                    <script>
                    jQuery(function($) {
                        var url = window.location.href;  
                        let langSwitcher = $(".lang-switcher");
                        let deLink = $(".lang-de");
                        let enLink = $(".lang-en");
                        let productLinks = $(".sa-link");
                        let productTitle = $(".text-bottom h5");
                        let productTitleName;
                        let z = 0;

                        // let userLang = navigator.language || navigator.userLanguage;

                        if (url.indexOf("/en/") > -1) {
                            // en
                            langSwitcher.attr('src','data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxjaXJjbGUgc3R5bGU9ImZpbGw6I0YwRjBGMDsiIGN4PSIyNTYiIGN5PSIyNTYiIHI9IjI1NiIvPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjQ0Ljg3LDI1Nkg1MTJjMC0yMy4xMDYtMy4wOC00NS40OS04LjgxOS02Ni43ODNIMjQ0Ljg3VjI1NnoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjQ0Ljg3LDEyMi40MzVoMjI5LjU1NmMtMTUuNjcxLTI1LjU3Mi0zNS43MDgtNDguMTc1LTU5LjA3LTY2Ljc4M0gyNDQuODdWMTIyLjQzNXoiLz4KCTxwYXRoIHN0eWxlPSJmaWxsOiNEODAwMjc7IiBkPSJNMjU2LDUxMmM2MC4yNDksMCwxMTUuNjI2LTIwLjgyNCwxNTkuMzU2LTU1LjY1Mkg5Ni42NDRDMTQwLjM3NCw0OTEuMTc2LDE5NS43NTEsNTEyLDI1Niw1MTJ6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojRDgwMDI3OyIgZD0iTTM3LjU3NCwzODkuNTY1aDQzNi44NTJjMTIuNTgxLTIwLjUyOSwyMi4zMzgtNDIuOTY5LDI4Ljc1NS02Ni43ODNIOC44MTkgICBDMTUuMjM2LDM0Ni41OTYsMjQuOTkzLDM2OS4wMzYsMzcuNTc0LDM4OS41NjV6Ii8+CjwvZz4KPHBhdGggc3R5bGU9ImZpbGw6IzAwNTJCNDsiIGQ9Ik0xMTguNTg0LDM5Ljk3OGgyMy4zMjlsLTIxLjcsMTUuNzY1bDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NUw4NS4xMDQsODEuMjUybDcuMTYtMjIuMDM3ICBDNzMuMTU4LDc1LjEzLDU2LjQxMiw5My43NzYsNDIuNjEyLDExNC41NTJoNy40NzVsLTEzLjgxMywxMC4wMzVjLTIuMTUyLDMuNTktNC4yMTYsNy4yMzctNi4xOTQsMTAuOTM4bDYuNTk2LDIwLjMwMWwtMTIuMzA2LTguOTQxICBjLTMuMDU5LDYuNDgxLTUuODU3LDEzLjEwOC04LjM3MiwxOS44NzNsNy4yNjcsMjIuMzY4aDI2LjgyMmwtMjEuNywxNS43NjVsOC4yODksMjUuNTA5bC0yMS42OTktMTUuNzY1bC0xMi45OTgsOS40NDQgIEMwLjY3OCwyMzQuNTM3LDAsMjQ1LjE4OSwwLDI1NmgyNTZjMC0xNDEuMzg0LDAtMTU4LjA1MiwwLTI1NkMyMDUuNDI4LDAsMTU4LjI4NSwxNC42NywxMTguNTg0LDM5Ljk3OHogTTEyOC41MDIsMjMwLjQgIGwtMjEuNjk5LTE1Ljc2NUw4NS4xMDQsMjMwLjRsOC4yODktMjUuNTA5bC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjJsLTIxLjcsMTUuNzY1TDEyOC41MDIsMjMwLjR6ICAgTTEyMC4yMTMsMTMwLjMxN2w4LjI4OSwyNS41MDlsLTIxLjY5OS0xNS43NjVsLTIxLjY5OSwxNS43NjVsOC4yODktMjUuNTA5bC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjIgIEwxMjAuMjEzLDEzMC4zMTd6IE0yMjAuMzI4LDIzMC40bC0yMS42OTktMTUuNzY1TDE3Ni45MywyMzAuNGw4LjI4OS0yNS41MDlsLTIxLjctMTUuNzY1aDI2LjgyMmw4LjI4OC0yNS41MDlsOC4yODgsMjUuNTA5aDI2LjgyMiAgbC0yMS43LDE1Ljc2NUwyMjAuMzI4LDIzMC40eiBNMjEyLjAzOSwxMzAuMzE3bDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NWwtMjEuNjk5LDE1Ljc2NWw4LjI4OS0yNS41MDlsLTIxLjctMTUuNzY1aDI2LjgyMiAgbDguMjg4LTI1LjUwOWw4LjI4OCwyNS41MDloMjYuODIyTDIxMi4wMzksMTMwLjMxN3ogTTIxMi4wMzksNTUuNzQzbDguMjg5LDI1LjUwOWwtMjEuNjk5LTE1Ljc2NUwxNzYuOTMsODEuMjUybDguMjg5LTI1LjUwOSAgbC0yMS43LTE1Ljc2NWgyNi44MjJsOC4yODgtMjUuNTA5bDguMjg4LDI1LjUwOWgyNi44MjJMMjEyLjAzOSw1NS43NDN6Ii8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=');
                            enLink.hide();
                            deLink.attr('href', 'https://cuciniale.com/');

                            productTitle.each(function() {
                                productTitleName = $(this).text().split(' ').join('-').toLowerCase();
                            });

                            productLinks.each(function() {
                                $(this).attr('href', origin + '/en/products#' + productTitleName);
                            });
                        } else {
                            // de
                            langSwitcher.attr('src','data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeD0iMHB4IiB5PSIwcHgiIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSIgd2lkdGg9IjI0cHgiIGhlaWdodD0iMjRweCI+CjxwYXRoIHN0eWxlPSJmaWxsOiNGRkRBNDQ7IiBkPSJNMTUuOTIzLDM0NS4wNDNDNTIuMDk0LDQ0Mi41MjcsMTQ1LjkyOSw1MTIsMjU2LDUxMnMyMDMuOTA2LTY5LjQ3MywyNDAuMDc3LTE2Ni45NTdMMjU2LDMyMi43ODMgIEwxNS45MjMsMzQ1LjA0M3oiLz4KPHBhdGggZD0iTTI1NiwwQzE0NS45MjksMCw1Mi4wOTQsNjkuNDcyLDE1LjkyMywxNjYuOTU3TDI1NiwxODkuMjE3bDI0MC4wNzctMjIuMjYxQzQ1OS45MDYsNjkuNDcyLDM2Ni4wNzEsMCwyNTYsMHoiLz4KPHBhdGggc3R5bGU9ImZpbGw6I0Q4MDAyNzsiIGQ9Ik0xNS45MjMsMTY2Ljk1N0M1LjYzMywxOTQuNjksMCwyMjQuNjg2LDAsMjU2czUuNjMzLDYxLjMxLDE1LjkyMyw4OS4wNDNoNDgwLjE1NSAgQzUwNi4zNjgsMzE3LjMxLDUxMiwyODcuMzE0LDUxMiwyNTZzLTUuNjMyLTYxLjMxLTE1LjkyMy04OS4wNDNIMTUuOTIzeiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K');
                            deLink.hide();
                        }

                        if ( document.documentElement.lang.toLowerCase() === "en-us" ) {
                            window.location.assign("http://cuciniale.com/en/");
                        }

                    })

                    </script>

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