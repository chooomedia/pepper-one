<?php

if ( is_active_sidebar( 'footer-left' ) || is_active_sidebar( 'footer-middle' ) || is_active_sidebar( 'footer-right' ) ) {?>
        <div id="footer-widget" class="container <?php if(!is_theme_preset_active()){ echo 'bg-dark'; } ?>">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <?php if ( is_active_sidebar( 'footer-left' )) : ?>
                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center"><?php dynamic_sidebar( 'footer-left' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-middle' )) : ?>
                        <div class="col-12 col-md-4"><?php dynamic_sidebar( 'footer-middle' ); ?></div>
                    <?php endif; ?>
                    <?php if ( is_active_sidebar( 'footer-right' )) : ?>
                        <div class="col-12 col-md-4 d-flex align-items-center justify-content-center"><?php dynamic_sidebar( 'footer-right' ); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

<?php }