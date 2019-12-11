<form role="search" method="get" class="form-inline mt-2 search-form d-flex justify-content-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group ml-md-5 d-none d-lg-block">
        <input type="search" class="col-md-7 mb-2 search-dark form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wp-pepper-one' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'wp-pepper-one' ); ?>">
        <span class="input-group-btn">
            <button type="submit" class="btn search-submit btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </span>
    </div>

</form>



