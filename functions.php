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


// Custom Image Size

add_image_size( 'blog-large', 800, 600, false );
add_image_size( 'blog-small', 300, 200, true );

// Theme Options

add_theme_support('menus'); 
add_theme_support('post-thumbnails');
add_theme_support('widgets');

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

// Register Side Bar
function my_sidebars(){
    register_sidebar( 
        array(
            'name' => 'Page Sidebar',
            'id' => 'page-sidebar',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>'
        ) 
        );

        register_sidebar( 
            array(
                'name' => 'Blog Sidebar',
                'id' => 'blog-sidebar',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            ) 
            );
};

add_action( 'widgets_init', 'my_sidebars');


///////// Custom Posts

function event_post_type(){

    $args = array(
        'labels' => array(
            'name' => 'Events',
            'singular_name' => 'Event',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'supports' => array('title','editor','thumbnail'),
        'menu_icon' => 'dashicons-calendar-alt'
    );

    register_post_type('events', $args);
}

add_action('init','event_post_type' );


/////////// Taxonomies ///////////

function my_taxonomy(){

    $arg = array(

        'public' => true,
        'hierarchical' => false,
    );

    register_taxonomy( 'family-events', array('events'),$args);
}

add_action( 'init', 'my_taxonomy' );