<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>

<div class="container">

    <div class="row d-flex">
        <div class="col-md-4 col-sm-13 mb-3">
            <div class="contact-squares">
                <h4>Mailing Address</h4>
                <ul>
                    <li>The Municipal Building</li>
                    <li>5580 Municipal DR</li>
                    <li>Tobyhanna PA 18466</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4 col-sm-13 mb-3">
        <div class="contact-squares">
                <h4>Email Address</h4>
                <ul>
                    <li>Nelsi@thefirstbond.com</li>
                </ul>
            </div>
        </div>

        <div class="col-md-4 col-sm-13 mb-3">
        <div class="contact-squares">
                <h4>Mailing Address</h4>
                <ul>
                    <li>The Municipal Building</li>
                    <li>5580 Municipal DR</li>
                    <li>Tobyhanna PA 18466</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        
            <?php get_template_part('includes/contact','form'); ?>
       
    </div>
</div>







<?php get_footer(); ?>