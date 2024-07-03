<?php
function my_theme_enqueue_styles() {
    // Enqueue parent theme styles
    wp_enqueue_style( 'astra', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->parent()->get('Version') );
    
    // Enqueue child theme styles
    wp_enqueue_style( 'astra-child', get_stylesheet_directory_uri() . '/assets/css/style.css', array('astra'), wp_get_theme()->get('Version') );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

?>
