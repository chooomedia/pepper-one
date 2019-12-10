<form role="search" method="get" class="row container p-0 m-0 search-form d-flex justify-content-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="search" class="col-6 mr-3 search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wp-pepper-one' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'wp-pepper-one' ); ?>">
    <input type="submit" class="col-2 btn search-submit btn-primary" value="<?php echo esc_attr_x( 'Search', 'submit button', 'wp-pepper-one' ); ?>">
    <span class="mx-3" style="line-height:2;color:#FFF;">or</span><a class="col-2 btn btn-primary" href="/" title="Link to Landingpage"><i class="fas fa-home"></i></a>
</form>



