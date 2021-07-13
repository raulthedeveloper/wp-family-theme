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

<?php

// The Query
$the_query = new WP_Query( $args );
 
// The Loop
if ( $the_query->have_posts() ): ?>
  <?php  while ( $the_query->have_posts() ): 
    $the_query->the_post();
    ?>

<div class="parent">
<div class="div1 contact-box"> 
<span>Mailing Address</span><br>
            <!-- The Municipal Building <br>
            5580 Municipal DR <br>
            Tobyhanna, Pa 18466 -->
            <?php echo get_field('business_address') ? get_field('business_address') : "Please Add Address" ?>
</div>

<div class="div2 contact-box"> 
<span>Email Address</span><br>
            <?php echo get_field('business_email') ? get_field('business_email') : "Please Add Email"?>
</div>

<div class="div3 contact-box"> 
<span>Telephone</span><br>
            <?php echo get_field('business_phone') ? get_field('business_phone') : "Please Add Phone Number" ?>
</div>

<div class="div4 contact-box"> 
<?php get_template_part('includes/contact','form'); ?>
</div>
</div>

<?php endwhile ?>
    <?php endif ?>


    

   
</div>







<?php get_footer(); ?>