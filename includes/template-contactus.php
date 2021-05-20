<?php
/*
Template Name: Contact Us
*/
?>
<?php get_header(); ?>

<div class="container">

    <div class="row d-flex">
        <div class="col">
            <div class="contact-squares">
                <h4>Mailing Address</h4>
                <ul>
                    <li>The Municipal Building</li>
                    <li>5580 Municipal DR</li>
                    <li>Tobyhanna PA 18466</li>
                </ul>
            </div>
        </div>

        <div class="col">
        <div class="contact-squares">
                <h4>Email Address</h4>
                <ul>
                    <li>Nelsi@thefirstbond.com</li>
                </ul>
            </div>
        </div>

        <div class="col">
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
        
            <form class="contact-form">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
       
    </div>
</div>

<?php 
        
        // get_template_part('includes/section','content' ); 
        
        ?>





<?php get_footer(); ?>