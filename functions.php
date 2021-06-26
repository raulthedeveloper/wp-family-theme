<?php 

// Load Css
function load_css()
{

    wp_register_style('font-awesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css",array(),false,'all');
    wp_enqueue_style('font-awesome') ;   

    wp_register_style( 'bootstrap', get_template_directory_uri(  ) . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style( 'aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', [] ,null, 'all' );
    wp_enqueue_style('aos');

    wp_register_style( 'sass', get_template_directory_uri(  ) . '/dist/app.css', [], 1, 'all' );
    wp_enqueue_style( 'sass' );

    wp_register_style( 'main', get_template_directory_uri(  ) . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
   
}


    
function add_aos_animation() {
    wp_enqueue_style('AOS_animate', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css', false, null);
    wp_enqueue_script('AOS', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', false, null, true);
    // wp_enqueue_script('theme-js', get_template_directory_uri() . '/js/theme.js', array( 'AOS' ), null, true);
}

add_action( 'wp_enqueue_scripts', 'add_aos_animation' );




// Load Javascript
function load_js()
{
   

    wp_enqueue_script('jquery');

 
    wp_register_script( 'app', get_template_directory_uri(  ) . '/dist/app.js', ['jquery'], 1, true );
    wp_enqueue_script('app');

    wp_register_script( 'bootstrap', get_template_directory_uri(  ) . '/js/bootstrap.min.js', 'jquery', false, true );
    wp_enqueue_script( 'bootstrap' );

    wp_register_script('my-scripts', get_template_directory_uri() . '/js/my_scripts.js', 'jquery', false,true);
    wp_enqueue_script('my-scripts');
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
add_theme_support('custom-logo');


add_theme_support( 'custom-logo', array(
	'height'      => 100,
	'width'       => 400,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) );

// Add Styles to next and previous post buttons
add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
  return 'class="btn btn-warning"';
}

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

function team_post_type(){

    $args = array(
        'labels' => array(
            'name' => 'Team',
            'singular_name' => 'Member',
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => false,
        'supports' => array('title','thumbnail'),
        'menu_icon' => 'dashicons-businessman'
    );

    register_post_type('team', $args);
}

add_action('init','Team_post_type' );


function business_contact_type(){

    $args = array(
        'labels' => array(
            'name' => "Business Info",
            'singular_name' => "Business"
        ),
        'hierarchical' => true,
        'public' => true,
        'has_archive' => false,
        'supports' => array('title','thumbnail'),
        'menu_icon' => 'dashicons-building'
    );
    register_post_type('business info',$args);
}

add_action('init','business_contact_type');




/////////// Taxonomies ///////////

function my_taxonomy(){

    $arg = array(

        'public' => true,
        'hierarchical' => false,
    );

    register_taxonomy( 'team-members', array('team'),$args);
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


// Add image url to template if a field is created, if not a default image url is added
function templateImage($image, $alt=false){
    if($alt){
        echo get_field($image)['alt'];
      }
      elseif(get_field($image)){
        echo get_field($image)['sizes']['blog-large'];
      }
      else{
        echo get_template_directory_uri() . "/images/unavailable-image.jpeg" ;
      }
}



function templateFeaturedImage($image){
    $unavailableImage = get_template_directory_uri() . "/images/unavailable-image.jpeg";

    if($image){
        echo $image;
    }else{
        echo"<img class=\"img-fluid\" src=\"{$unavailableImage}
        \" alt=\"unavailable image\">" ;
    }
}

