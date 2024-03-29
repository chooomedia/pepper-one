<?php 
global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';

$output .= "\t" . '<div class="row">' . "\r\n";
$output .= "\t\t" . '<div id="" class="col-sm-12 col-md-7">' . "\r\n";
$output .= "\t\t\t" . '<div class="container col-md-9 col-sm-12">' . "\r\n";

$output .= "\t\t\t" . '<div style="width:100%;height:160px;" aria-hidden="true" class="wp-block-spacer"></div>' . "\r\n";
$output .= "\t\t\t\t" . '<h2>Find your Dealer</h2>' . "\r\n";
$output .= "\t\t\t\t" . '<p class="overview">Lorem ipsum dolor sit amet, consetetur<br> sadipscing elitr, sed diam nonumy eirmod tempor<br> invidunt ut labore et dolore</p>' . "\r\n";


$output .= "\t\t\t\t" . '<form class="form-inline p-0 m-0" autocomplete="off">' . "\r\n";
$output .= "\t\t\t\t\t" . '<div class="form-group p-0 col-5">' . "\r\n";
$output .= "\t\t\t\t\t\t" . '<input id="wpsl-search-input" class="inputPostalCode form-control" type="text" value="' . apply_filters( 'wpsl_search_input', '' ) . '" name="wpsl-search-input" placeholder="Postal Code" aria-required="true" />' . "\r\n";
$output .= "\t\t\t\t\t" . '</div>' . "\r\n";

if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown']  ) {
    if ( $wpsl_settings['radius_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div class="form-group ml-4 p-0 col-3">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" class="form-control" name="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }

    /*if ( $wpsl_settings['results_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . '</label>' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" class="wpsl-dropdown" name="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }
    $output .= "\t\t\t" . '</div>' . "\r\n";*/ 

}

if ( $this->use_category_filter() ) {
    $output .= $this->create_category_filter();
}

$output .= "\t\t\t\t" . '<div class="form-group ml-2 pr-0 col-3">' . "\r\n";
$output .= "\t\t\t\t\t" . '<input id="wpsl-search-btn" class="btn btn-primary postalCodeSubmit" type="submit" value="' . esc_attr( $wpsl->i18n->get_translation( 'search_btn_label', __( 'Search', 'wpsl' ) ) ) . '">' . "\r\n";
$output .= "\t\t\t\t" . '</div>' . "\r\n";
$output .= "\t\t\t\t" . '<p class="mt-2">or write us a message <a class="underline" href="/contact" title="write a message here"><u>here</u></a></p>' . "\r\n";

$output .= "\t\t\t\t" . '</form>' . "\r\n";
$output .= "\t" . '<div id="wpsl-result-list">' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-stores" '. $autoload_class .'>' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '<div id="wpsl-direction-details">' . "\r\n";
$output .= "\t\t\t" . '<ul></ul>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
$output .= "\t" . '</div>' . "\r\n";

$output .= "\t\t\t" . '</div>' . "\r\n";
$output .= "\t\t" . '</div>' . "\r\n";
    
$output .= "\t" . '<div id="wpsl-gmap" class="col-sm-12 col-md-5 wpsl-gmap-canvas"></div>' . "\r\n";

if ( $wpsl_settings['show_credits'] ) { 
    $output .= "\t" . '<div class="wpsl-provided-by">'. sprintf( __( "Search provided by %sWP Store Locator%s", "wpsl" ), "<a target='_blank' href='https://wpstorelocator.co'>", "</a>" ) .'</div>' . "\r\n";
}

$output .= '</div>' . "\r\n";
$output .= '</div>' . "\r\n";

return $output;