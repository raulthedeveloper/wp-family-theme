<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>




<?php

$args = array(  
    'post_type' => 'business info',
    'post_status' => 'publish',
    'post_per_page' => 1
)
    ?>




<div class="container">

    <div class="row">
    <div class="col-md-5">
    
    <div >
    
    <div class="m-auto">

    <?php

// The Query
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ): ?>
  <?php  while ( $the_query->have_posts() ): 
    $the_query->the_post();
    ?>

    <ul class="contact-ul">
        <li class="contact-box">
            <span>Mailing Address</span><br>
            <!-- The Municipal Building <br>
            5580 Municipal DR <br>
            Tobyhanna, Pa 18466 -->
            <?php echo get_field('business_address') ? get_field('business_address') : "Please Add Address" ?>
        </li>
        <li class="contact-box">
            <span>Email Address</span><br>
            <?php echo get_field('business_email') ? get_field('business_email') : "Please Add Email"?>
        </li>
        <li class="contact-box">
            <span>Telephone</span><br>
            <?php echo get_field('business_phone') ? get_field('business_phone') : "Please Add Phone Number" ?>

        </li>
    </ul>
    <?php endwhile ?>
    <?php endif ?>
    </div>
    
    </div>
    

    </div>


    <div class="col-md-7">
    <?php get_template_part('includes/contact','form'); ?>
    </div>
       
    </div>

   
</div>







<?php get_footer(); ?>