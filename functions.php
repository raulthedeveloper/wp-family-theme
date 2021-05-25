<?php 

// Load Css
function load_css()
{

    

    wp_register_style( 'bootstrap', get_template_directory_uri(  ) . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [] ,null, 'all' );
    wp_enqueue_style('aos');

    wp_register_style( 'sass', get_template_directory_uri(  ) . '/dist/app.css', [], 1, 'all' );
    wp_enqueue_style( 'sass' );

    wp_register_style( 'main', get_template_directory_uri(  ) . '/css/main.css', array(), false, 'all');
   
}


// Load Javascript
function load_js()
{
   

    wp_enqueue_script('jquery');

    wp_register_script( 'aosjs', 'https://unpkg.com/aos@2.3.1/dist/aos.js', [], null, true );
    wp_enqueue_script( 'aosjs' );

    wp_register_script( 'app', get_template_directory_uri(  ) . '/dist/app.js', ['jquery'], 1, true );
    wp_enqueue_script('app');

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
        'mobile-menu' => 'Mobile Menu Location',
        'footer-col-1' => 'Footer Column 1',
        'footer-col-2' => 'Footer Column 2',
        'footer-col-3' => 'Footer Column 3'
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


/////// Contact Form ////////////


function contact_form(){

    /////////// Replace nonce info for you website to prevent security issues ///////////////
    if( !wp_verify_nonce($_POST['nonce'],'ajax-nonce' )){
        wp_send_json_error( "nonce is incorrect", 401 );
        die();
    }


    $formdata = [];

    wp_parse_str($_POST['contact'], $formdata);

    $admin_email = get_option('admin_email');



    $headers[] = 'Content-Type: text/html; charset-UTF-8';
    $header[] = 'From: The First Bond <' . $admin_email . '>';
    $headers[] = "Reply-to" . $formdata['email'];

    $send_to = $admin_email;

    $subject = "Enquiry from " . $formdata['first_name'] . " " . $formdata['last_name'];

    $message = '';

    foreach($formdata as $index => $field){
        
        $message .= '<strong>' . $index . '</strong>: ' . $field . '<br />' ;

        
    }

    try{

        if( wp_mail($send_to, $subject, $message, $headers))
        {
            wp_send_json_success( "Email sent" );
        }
       
        else
        {
            wp_send_json_error("Email error");
        }
        
    }

    catch(Exception $e){
        wp_send_json_error( $e->getMessage());
    }

    wp_send_json_success($formdata['fname']);
}

add_action( 'wp_ajax_contact','contact_form');
add_action( 'wp_ajax_nopriv_contact','contact_form');
