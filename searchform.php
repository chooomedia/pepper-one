<form role="search" method="get" class="form-inline mt-2 search-form d-flex justify-content-center" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group mt-4 col-12 d-flex justify-content-center">
        <input type="search" class="col-md-8 text-white p-4 mb-2 search-dark form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'wp-pepper-one' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'wp-pepper-one' ); ?>">
        <span class="input-group-btn">
            <button type="submit" class="btn px-5 py-3 search-submit btn-primary">
                <i class="fas fa-search"></i>
            </button>
        </span>
    </div>
</form>