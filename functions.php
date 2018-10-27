<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to X in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );

// Halsey Design Functions
// =============================================================================

/*  Remove Admin Bar
/* ------------------------------------ */ 
add_filter('show_admin_bar', '__return_false');

//enqueues our external font awesome stylesheet
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
	wp_enqueue_style('font-brands', 'https://use.fontawesome.com/releases/v5.4.1/css/brands.css');
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');



function theme_url_shortcode( $attrs = array (), $content = '' ) {
     
    $theme = ( is_child_theme() ? get_stylesheet_directory_uri() : get_template_directory_uri() );
 
    return $theme;
     
}
add_shortcode('theme', 'theme_url_shortcode' );



/*  Add Custom Scripts
/* ------------------------------------ */ 

  function jquery_enqueue() {
      wp_deregister_script('jquery');
      wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', false, null);
      wp_enqueue_script('jquery');
  }
  if (!is_admin()) add_action('wp_enqueue_scripts', 'jquery_enqueue', 11);

  function wpb_adding_scripts() {


	wp_register_script('stafford', get_stylesheet_directory_uri() . '/js/stafford.js');

    wp_enqueue_script('stafford');

	

}
add_action( 'wp_footer', 'wpb_adding_scripts' ); 
