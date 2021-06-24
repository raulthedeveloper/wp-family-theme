<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>

<div class="container">

    <div class="row">
    <div class="col-md-5">
    
    <div >
    
    <div class="m-auto">
    <ul class="contact-ul">
        <li class="contact-box">
            <span>Mailing Address</span><br>
            The Municipal Building <br>
            5580 Municipal DR <br>
            Tobyhanna, Pa 18466
        </li>
        <li class="contact-box">
            <span>Email Address</span><br>
            Nelsi@thefirstbond.org
        </li>
        <li class="contact-box">
            <span>Telephone</span><br>
            646-820-5089

        </li>
    </ul>
    </div>
    
    </div>
    

    </div>


    <div class="col-md-7">
    <?php get_template_part('includes/contact','form'); ?>
    </div>
       
    </div>

   
</div>







<?php get_footer(); ?>