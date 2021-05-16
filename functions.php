<?php 

// Load Css
function load_css()
{
    wp_register_style( 'bootstrap', get_template_directory_uri(  ) . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style( 'main', get_template_directory_uri(  ) . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('main');
}


// Load Javascript
function load_js()
{
    wp_enqueue_script('jquery');

    wp_register_script( 'bootstrap', get_template_directory_uri(  ) . '/js/bootstrap.min.js', 'jquery', false, true );
    wp_enqueue_script( 'bootstrap' );
}

// Load Hooks
add_action( 'wp_enqueue_scripts', 'load_css' );

add_action( 'wp_enqueue_scripts', 'load_js' );



// Theme Options

add_theme_support('menus'); 


// Menus

register_nav_menus( 
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    )
);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );