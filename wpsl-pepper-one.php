<?php 
global $wpsl_settings, $wpsl;

$output         = $this->get_custom_css(); 
$autoload_class = ( !$wpsl_settings['autoload'] ) ? 'class="wpsl-not-loaded"' : '';

$output .= "\t" . '<div class="row">' . "\r\n";
$output .= "\t\t" . '<div id="" class="col-sm-12 col-md-7 py-md-5">' . "\r\n";
$output .= "\t\t\t" . '<div class="row col-md-9 col-sm-12">' . "\r\n";

$output .= "\t\t\t" . '<div style="width:100%;height:20vh;" aria-hidden="true" class="wp-block-spacer d-none d-sm-block"></div>' . "\r\n";
$output .= "\t\t\t" . '<div style="width:100%;height:4vh;" aria-hidden="true" class="wp-block-spacer d-block d-sm-none"></div>' . "\r\n";
$output .= "\t\t\t\t" . '<h2>Finden Sie Ihren Händler</h2>' . "\r\n";
$output .= "\t\t\t\t" . '<p class="overview">Über die Distanzsuche können Sie bequem einen autorisierten Küchenfachhändler in ihrer Nähe finden.</p>' . "\r\n";


$output .= "\t\t\t\t" . '<form class="form-inline p-0 m-0" autocomplete="off">' . "\r\n";
$output .= "\t\t\t\t\t" . '<div class="form-group p-0 col-8">' . "\r\n";
$output .= "\t\t\t\t\t\t" . '<input id="wpsl-search-input" class="inputPostalCode form-control" type="text" placeholder="PLZ / Stadt" value="' . apply_filters( 'wpsl_search_input', '' ) . '" name="wpsl-search-input" aria-required="true" />' . "\r\n";
$output .= "\t\t\t\t\t" . '</div>' . "\r\n";

if ( $wpsl_settings['radius_dropdown'] || $wpsl_settings['results_dropdown']  ) {
    if ( $wpsl_settings['radius_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div class="form-group p-0 col-4">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-radius-dropdown" class="form-control select-dropdown" name="wpsl-radius">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'search_radius' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }

    if ( $wpsl_settings['results_dropdown'] ) {
        $output .= "\t\t\t\t" . '<div id="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t" . '<label for="wpsl-results-dropdown">' . esc_html( $wpsl->i18n->get_translation( 'results_label', __( 'Results', 'wpsl' ) ) ) . '</label>' . "\r\n";
        $output .= "\t\t\t\t\t" . '<select id="wpsl-results-dropdown" class="wpsl-dropdown" name="wpsl-results">' . "\r\n";
        $output .= "\t\t\t\t\t\t" . $this->get_dropdown_list( 'max_results' ) . "\r\n";
        $output .= "\t\t\t\t\t" . '</select>' . "\r\n";
        $output .= "\t\t\t\t" . '</div>' . "\r\n";
    }

}

if ( $this->use_category_filter() ) {
    $output .= $this->create_category_filter();
}

$output .= "\t\t\t\t" . '<div class="form-group pr-0 col-lg-3 col-auto">' . "\r\n";
$output .= "\t\t\t\t\t" . '<input id="wpsl-search-btn" class="btn btn-primary postalCodeSubmit" type="submit" value="' . esc_attr( $wpsl->i18n->get_translation( 'search_btn_label', __( 'Search', 'wpsl' ) ) ) . '">' . "\r\n";
$output .= "\t\t\t\t" . '</div>' . "\r\n";
$output .= "\t\t\t\t" . '<p class="mt-2">Oder schreiben Sie uns <a class="underline" href="/contact" title="Nachricht schreiben"><u>hier</u></a> eine Nachricht</p>' . "\r\n";
$output .= "\t\t\t\t" . '</form>' . "\r\n";
$output .= "\t" . '<div style="width:100%;height:4vh;" aria-hidden="true" class="wp-block-spacer d-none d-sm-block"></div>' . "\r\n";
$output .= "\t" . '<div id="wpsl-result-list" class="wpsl-pepper-store-list">' . "\r\n";
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
    $output .= "\t" . '<div class="wpsl-provided-by">'. sprintf( __( "Suche unterstüzt von %sWP Store Locator%s", "wpsl" ), "<a target='_blank' href='https://wpstorelocator.co'>", "</a>" ) .'</div>' . "\r\n";
}

$output .= '</div>' . "\r\n";
$output .= '</div>' . "\r\n";

return $output;