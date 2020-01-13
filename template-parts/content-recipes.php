<?php
/**
 * Template part for displaying recipes content in a monthly overview
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_template_pepper_one
 */

?>

<?php $recipeShorterDescr = get_field( 'recipe-archive-description' ); ?>
<?php $recipeLink = get_field( 'recipe-button-link' ); ?>
    
    <article class="col-md-4 p-0 d-flex justify-content-center" id="recipe-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">    
            <div class="col-md-11 px-md-0 col-sm-12">
                <?php
                    $enable_vc = get_post_meta(get_the_ID(), '_wpb_vc_js_status', true);
                    if(!$enable_vc ) {
                    ?>
                    <?php if(is_archive()): ?>
                    <div class="recipes-box">
                        <div class="recipe-thumbnail" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>');">
                        <footer class="recipes-text align-self-end">
                            <h2 class="recipes-month-name"><?php the_date( 'F' ); ?></h2>
                            <div class="row m-0 p-0">
                                <h3 class="col-10 p-0 m-0 recipes-shorter-description">
                                    <?php echo $recipeShorterDescr ?>
                                </h3>
                                <?php if ($recipeLink) : ?>
                                    <div class="col-2 p-0 m-0 pl-3">
                                        <img src="<?php echo get_template_directory_uri()?>/inc/assets/img/icon-cuciniale-avaiable-for-app.png" alt="icon-cuciniale-avaiable-for-app" />
                                </div>
                                <?php endif ?>
                            </div>
                        </footer>
                        </div>
                    </div><!-- .entry-content -->
                    <?php endif; ?>
                    <?php } ?>
                <?php if ( get_edit_post_link() && !$enable_vc ) : ?>
                    <footer class="entry-footer">
                        <?php
                            edit_post_link(
                                sprintf(
                                    /* translators: %s: Name of current post */
                                    esc_html__( 'Edit %s', 'wp-pepper-one' ),
                                    the_title( '<span class="screen-reader-text">"', '"</span>', false )
                                ),
                                '<span class="edit-link">',
                                '</span>'
                            );
                        ?>
                    </footer><!-- .entry-footer -->
                <?php endif; ?>
            </div>
        </a>
    </article><!-- #post-## -->
