<?php
/**
 * CHOOOMEDIA Pepper One - functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_template_pepper_one
 */

if ( ! function_exists( 'wp_template_pepper_one_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wp_template_pepper_one_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on WP Bootstrap Starter, use a find and replace
	 * to change 'wp-pepper-one' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wp-pepper-one', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'wp-pepper-one' ),
        'sidebar-nav' => esc_html__( 'Sidebar Nav', 'wp-pepper-one' ),
    ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wp_template_pepper_one_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

    function wp_boostrap_starter_add_editor_styles() {
        add_editor_style( 'custom-editor-style.css' );
    }
    add_action( 'admin_init', 'wp_boostrap_starter_add_editor_styles' );

}
endif;
add_action( 'after_setup_theme', 'wp_template_pepper_one_setup' );

/* Add Custom Post Types for easier Content management */
// Register Custom Post Type
function wp_template_pepper_cpt_recipes() {

	$labels = array(
		'name'                  => _x( 'Rezepte', 'Post Type General Name', 'Rezepte' ),
		'singular_name'         => _x( 'Rezept', 'Post Type Singular Name', 'Rezepte' ),
		'menu_name'             => __( 'Rezepte', 'Rezepte' ),
		'name_admin_bar'        => __( 'Rezepte', 'Rezepte' ),
		'archives'              => __( 'Archiviere Rezept', 'Rezepte' ),
		'attributes'            => __( 'Rezept Attribute', 'Rezepte' ),
		'parent_item_colon'     => __( 'Aktuelles Rezept:', 'Rezepte' ),
		'all_items'             => __( 'Alle Rezepte', 'Rezepte' ),
		'add_new_item'          => __( 'Füge neues Rezept hinzu', 'Rezepte' ),
		'add_new'               => __( 'Neues Rezept', 'Rezepte' ),
		'new_item'              => __( 'Neues Rezept hinzu', 'Rezepte' ),
		'edit_item'             => __( 'Bearbeite Rezept', 'Rezepte' ),
		'update_item'           => __( 'Update Rezept', 'Rezepte' ),
		'view_item'             => __( 'Rezept anschauen', 'Rezepte' ),
		'view_items'            => __( 'Alle Rezepte anschauen', 'Rezepte' ),
		'search_items'          => __( 'Suche Rezept', 'Rezepte' ),
		'not_found'             => __( 'nichts gefunden', 'Rezepte' ),
		'not_found_in_trash'    => __( 'Nicht im Papierkorb gefunden', 'Rezepte' ),
		'featured_image'        => __( 'Rezept Bild', 'Rezepte' ),
		'set_featured_image'    => __( 'Wähle Rezept Bild', 'Rezepte' ),
		'remove_featured_image' => __( 'Entferne Rezept Bild', 'Rezepte' ),
		'use_featured_image'    => __( 'Als Rezept Bild verwenden', 'Rezepte' ),
		'insert_into_item'      => __( 'Füge Rezept hinzu', 'Rezepte' ),
		'uploaded_to_this_item' => __( 'Aktualisieren', 'Rezepte' ),
		'items_list'            => __( 'Rezept Liste', 'Rezepte' ),
		'items_list_navigation' => __( 'Rezept Liste Menü', 'Rezepte' ),
		'filter_items_list'     => __( 'Filter Rezepte', 'Rezepte' ),
	);
	$rewrite = array(
		'slug'                  => 'recipe',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Rezept', 'Rezepte' ),
		'description'           => __( 'Einfach Rezepte erstellen und veröffentlichen', 'Rezepte' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'recipes' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-carrot',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => $rewrite,
		'capability_type'       => 'post',
        'show_in_rest'          => true
	);
	register_post_type( 'recipes', $args );

}
add_action( 'init', 'wp_template_pepper_cpt_recipes', 0 );

/**
 * Add Welcome message to dashboard
 */
function wp_template_pepper_one_reminder(){
        $theme_page_url = 'https://themes.chooomedia.de/pepper-one/';

            if(!get_option( 'triggered_welcomet')){
                $message = sprintf(__( 'Welcome to Pepper-One Theme! Before diving in to your new theme, please visit the <a style="color: #fff; font-weight: bold;" href="%1$s" target="_blank">theme\'s</a> page for access to dozens of tips and in-depth tutorials.', 'wp-pepper-one' ),
                    esc_url( $theme_page_url )
                );

                printf(
                    '<div class="notice is-dismissible" style="background-color: #6C2EB9; color: #fff; border-left: none;">
                        <p>%1$s</p>
                    </div>',
                    $message
                );
                add_option( 'triggered_welcomet', '1', '', 'yes' );
            }

}
add_action( 'admin_notices', 'wp_template_pepper_one_reminder' );

/**InfoField for Update-Warnings of the plugins */
function wp_template_pepper_one_plugin_info(){

        if(!get_option( 'triggered_welcomet99')){
            $message = sprintf(__( 'Bitte die Plugins <b>Slide Anything, WP Store Locator & ADL Post Slider</b> nicht ohne vorherige Anfrage an <a style="color:inherit;text-decoration:underline;" href="mailto:christopher@chooomedia.de">Christopher von CHOOOMEDIA</a> updaten !!!', 'wp-pepper-one' )
            );

            printf(
                '<div class="notice is-dismissible" style="background-color: red; color: #fff; border-left: none;">
                    <p>%1$s</p>
                </div>',
                $message
            );
            add_option( 'triggered_welcomet99', '0', '', 'yes' );
        }

}
add_action( 'admin_notices', 'wp_template_pepper_one_plugin_info' );

/**Add Schema.org Item propertie to nav links */
function wp_template_pepper_one_add_menu_atts( $atts, $item, $args ) {
    $atts['itemprop'] = 'url';
    return $atts;
  }
add_filter( 'nav_menu_link_attributes', 'wp_template_pepper_one_add_menu_atts', 10, 3 );

/**Instruction to easy edit new Recipes */
function wp_template_pepper_one_reminder_new_recipe() { ?>
    <?php $screen = get_current_screen(); ?>
    <?php if( 'recipes' == $screen->post_type && 'edit' == $screen->base ) : ?>
        <?php if (!get_option( 'triggered_welcomet100')) : ?>
            <div class="notice notice-warning is-dismissible">
                <div style="display:flex;">
                    <span style="width:27%">
                        <h2>Neues Rezept erstellen und editieren:</h2>
                        <p><strong>1.</strong> Über <b>aktuellstes Rezept</b> hovern</p>
                        <p><strong>2.</strong> auf <b><a href="#Btdppmc">Replizieren</a></b> klicken</p>
                        <p><strong>3.</strong> Repliziertes Rezept <b>bearbeiten</b></p>
                        <p><strong>4.</strong> Rezeptmaske <b>anpassen</b></p>
                    </span>
                    <span style="width:73%;margin:1rem 0">
                        <img src="<?php echo get_template_directory_uri() ?>/inc/assets/img/cuciniale-neues-rezept.gif" alt="Mini-Tutorial neues Rezept erstellen" />
                    </span>
                </div>
            </div>
            <?php add_option( 'triggered_welcomet100', '0', '', 'yes' ); ?>
        <?php endif; ?>
    <?php endif; ?>
	<?php
}
add_action('admin_notices', 'wp_template_pepper_one_reminder_new_recipe');


/**Styling of the WP Store Locator Plugin */
function custom_templates( $templates ) {

    /**
     * The 'id' is for internal use and must be unique ( since 2.0 ).
     * The 'name' is used in the template dropdown on the settings page.
     * The 'path' points to the location of the custom template,
     * in this case the folder of your active theme.
     */
    $templates[] = array (
        'id'   => 'wpsl-pepper-one',
        'name' => 'Pepper-One Template',
        'path' => get_stylesheet_directory() . '/' . 'wpsl-pepper-one.php',
    );

    return $templates;
}
add_filter( 'wpsl_templates', 'custom_templates' );


/**Use Special Template for Partner-Pages */
add_filter( 'template_include', 'wp_partner_post_template', 99 );

function wp_partner_post_template( $template ) {
    
    if ( is_page( 'partner' )  ) {
        $new_template = locate_template( array( '/template-parts/content-partner.php' ) );
        if ( '' != $new_template ) {
            return $new_template ;
        }
    }

    return $template;
}

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_template_pepper_one_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_template_pepper_one_content_width', 1170 );
}
add_action( 'after_setup_theme', 'wp_template_pepper_one_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function wp_template_pepper_one_widgets_init() {
    
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'wp-pepper-one' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'wp-pepper-one' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Page Bottom Widget', 'wp-pepper-one' ),
        'id'            => 'page-bottom-widget',
        'description'   => esc_html__( 'Add widgets here.', 'wp-pepper-one' ),
        'before_widget' => '<div class="row pb-5 mb-5">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Contact Site Widget', 'wp-pepper-one' ),
        'id'            => 'contact-widget',
        'description'   => esc_html__( 'Add widgets here.', 'wp-pepper-one' ),
        'before_widget' => '<div class="p-5">',
        'after_widget'  => '</div>',
        'before_title'  => '',
        'after_title'   => '',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer CTA', 'wp-pepper-one' ),
        'id'            => 'footer-cta',
        'description'   => esc_html__( 'Add HTML Code here to insert some CTA Buttons in the footer area', 'wp-pepper-one' ),
        'before_widget' => '<section id="%1$s" class="mx-4 widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Left', 'wp-pepper-one' ),
        'id'            => 'footer-left',
        'description'   => esc_html__( 'Add widgets here.', 'wp-pepper-one' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Middle', 'wp-pepper-one' ),
        'id'            => 'footer-middle',
        'description'   => esc_html__( 'Add widgets here.', 'wp-pepper-one' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Right', 'wp-pepper-one' ),
        'id'            => 'footer-right',
        'description'   => esc_html__( 'Add widgets here.', 'wp-pepper-one' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'wp_template_pepper_one_widgets_init' );

function wp_template_pepper_one_social_media_menu() {
    register_nav_menu('social-media-menu',__( 'Circled Social Media Navigation' ));
}
add_action( 'init', 'wp_template_pepper_one_social_media_menu' );

/**
 * Enqueue scripts and styles.
 */
function wp_template_pepper_one_scripts() {
	// load bootstrap css
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_style( 'wp-pepper-one-bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-pepper-one-fontawesome-cdn', 'https://use.fontawesome.com/releases/v5.10.2/css/all.css' );
    } else {
        wp_enqueue_style( 'wp-pepper-one-bootstrap-css', get_template_directory_uri() . '/inc/assets/css/bootstrap.min.css' );
        wp_enqueue_style( 'wp-pepper-one-fontawesome-cdn', get_template_directory_uri() . '/inc/assets/css/fontawesome.min.css' );
    }
	// load bootstrap css
	// load AItheme styles
	// load WP Bootstrap Starter styles
	wp_enqueue_style( 'wp-pepper-one-style', get_stylesheet_uri() );
    if(get_theme_mod( 'theme_option_setting' ) && get_theme_mod( 'theme_option_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-pepper-one-'.get_theme_mod( 'theme_option_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/theme-option/'.get_theme_mod( 'theme_option_setting' ).'.css', false, '' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-lora') {
        wp_enqueue_style( 'wp-pepper-one-poppins-lora-font', 'https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i|Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-merriweather') {
        wp_enqueue_style( 'wp-pepper-one-montserrat-merriweather-font', 'https://fonts.googleapis.com/css?family=Merriweather:300,400,400i,700,900|Montserrat:300,400,400i,500,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'poppins-poppins') {
        wp_enqueue_style( 'wp-pepper-one-poppins-font', 'https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'roboto-roboto') {
        wp_enqueue_style( 'wp-pepper-one-roboto-font', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'arbutusslab-opensans') {
        wp_enqueue_style( 'wp-pepper-one-arbutusslab-opensans-font', 'https://fonts.googleapis.com/css?family=Arbutus+Slab|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'oswald-muli') {
        wp_enqueue_style( 'wp-pepper-one-oswald-muli-font', 'https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800|Oswald:300,400,500,600,700' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'montserrat-opensans') {
        wp_enqueue_style( 'wp-pepper-one-montserrat-opensans-font', 'https://fonts.googleapis.com/css?family=Montserrat|Open+Sans:300,300i,400,400i,600,600i,700,800' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'robotoslab-roboto') {
        wp_enqueue_style( 'wp-pepper-one-robotoslab-roboto', 'https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700|Roboto:300,300i,400,400i,500,700,700i' );
    }
    if(get_theme_mod( 'preset_style_setting' ) === 'baskervville-cuciniale') {
        wp_enqueue_style( 'wp-pepper-one-baskervville-cuciniale', 'https://fonts.googleapis.com/css?family=Baskervville&display=swap' );
    }
    if(get_theme_mod( 'preset_style_setting' ) && get_theme_mod( 'preset_style_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-pepper-one-'.get_theme_mod( 'preset_style_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/typography/'.get_theme_mod( 'preset_style_setting' ).'.css', false, '' );
    }
    //Color Scheme
    /*if(get_theme_mod( 'preset_color_scheme_setting' ) && get_theme_mod( 'preset_color_scheme_setting' ) !== 'default') {
        wp_enqueue_style( 'wp-pepper-one-'.get_theme_mod( 'preset_color_scheme_setting' ), get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/'.get_theme_mod( 'preset_color_scheme_setting' ).'.css', false, '' );
    }else {
        wp_enqueue_style( 'wp-pepper-one-default', get_template_directory_uri() . '/inc/assets/css/presets/color-scheme/blue.css', false, '' );
    }*/

	wp_enqueue_script('jquery');

    // Internet Explorer HTML5 support
    wp_enqueue_script( 'html5hiv',get_template_directory_uri().'/inc/assets/js/html5.js', array(), '3.7.0', false );
    wp_script_add_data( 'html5hiv', 'conditional', 'lt IE 9' );

    // Animated Sidebar-Nav & Social-Media-Buttons
    wp_enqueue_script( 'on-scroll-changes', get_template_directory_uri() . '/inc/assets/js/on-scroll-changes.js', array(), '1.0.0', true );
    wp_enqueue_script( 'sidebar-nav', get_template_directory_uri() . '/inc/assets/js/sidebar-nav.js', array(), '1.0.0', true );
    wp_enqueue_script( 'animated-background', get_template_directory_uri() . '/inc/assets/js/animated-background.js', array(), '1.0.0', true );
   
    // Add Linked-Row function for "Presse"
    wp_enqueue_script( 'linked-row', get_template_directory_uri() . '/inc/assets/js/linked-row.js', array(), '1.0.0', true );
    
	// load bootstrap js
    if ( get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        wp_enqueue_script('wp-pepper-one-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.15.0/dist/umd/popper.min.js', array(), '', true );
    	wp_enqueue_script('wp-pepper-one-bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array(), '', true );
    } else {
        wp_enqueue_script('wp-pepper-one-popper', get_template_directory_uri() . '/inc/assets/js/popper.min.js', array(), '', true );
        wp_enqueue_script('wp-pepper-one-bootstrapjs', get_template_directory_uri() . '/inc/assets/js/bootstrap.min.js', array(), '', true );
    }
    wp_enqueue_script('wp-pepper-one-themejs', get_template_directory_uri() . '/inc/assets/js/theme-script.js', array(), '', true );
	wp_enqueue_script( 'wp-pepper-one-skip-link-focus-fix', get_template_directory_uri() . '/inc/assets/js/skip-link-focus-fix.min.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wp_template_pepper_one_scripts' );



/**
 * Add Preload for CDN scripts and stylesheet
 */
function wp_template_pepper_one_preload( $hints, $relation_type ){
    if ( 'preconnect' === $relation_type && get_theme_mod( 'cdn_assets_setting' ) === 'yes' ) {
        $hints[] = [
            'href'        => 'https://cdn.jsdelivr.net/',
            'crossorigin' => 'anonymous',
        ];
        $hints[] = [
            'href'        => 'https://use.fontawesome.com/',
            'crossorigin' => 'anonymous',
        ];
    }
    return $hints;
} 

add_filter( 'wp_resource_hints', 'wp_template_pepper_one_preload', 10, 2 );



function wp_template_pepper_one_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <div class="d-block mb-3">' . __( "To view this protected post, enter the password below:", "wp-pepper-one" ) . '</div>
    <div class="form-group form-inline"><label for="' . $label . '" class="mr-2">' . __( "Password:", "wp-pepper-one" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" class="form-control mr-2" /> <input type="submit" name="Submit" value="' . esc_attr__( "Submit", "wp-pepper-one" ) . '" class="btn btn-primary"/></div>
    </form>';
    return $o;
}
add_filter( 'the_password_form', 'wp_template_pepper_one_password_form' );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load plugin compatibility file.
 */
require get_template_directory() . '/inc/plugin-compatibility/plugin-compatibility.php';

/**
 * Load custom WordPress nav walker.
 */
if ( ! class_exists( 'wp_bootstrap_navwalker' )) {
    require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');
}


// Style Login View

function wp_template_pepper_one_login_style() { ?>
    <style>

    body {
        background: #000;
    }

    body.login, #login {
        background: #000 !important;
    }

    .login h1 a {
        background-image: url('<?php echo esc_url(get_theme_mod( 'wp_template_pepper_one_logo' )); ?>') !important;
        background-size: contain !important;
        width: 180px !important;
    }

    #login > p.message {
        border-radius: 3px !important;
        color: #FFF !important;
        border-left: 4px solid #d0112b !important;
        background-color: #262626 !important;
        box-shadow: 0 1px 1px 0 rgba(255,255,255,.1) !important;
    }

    .login form, .login #login_error, .login .message, .login .success {
        border-radius: 3px !important;
        color: #FFF !important;
        background-color: #262626 !important;
        border: 1px solid #d0112b !important;
        box-shadow: 0 1px 1px 0 rgba(255,255,255,.1) !important;
    }

    .login form .input, .login form input[type=checkbox], .login input[type=text] {
        background: #1d1d1d !important;
    }

    input[type=text]:focus, input[type=password]:focus {
        border-color: #d0112b !important;
        box-shadow: 0 0 0 1px #d0112b !important;
    }

    .wp-core-ui .button, .wp-core-ui .button-secondary {
        color: #d0112b !important; 
    }

    .wp-core-ui .button-primary {
        color: #FFF !important;
        background: #d0112b !important;
        border-color: #d0112b !important;
    }

    </style>

<?php } ?>
<?php

add_action('login_enqueue_scripts','wp_template_pepper_one_login_style');