<?php get_header('hero'); ?>
<!-- <h1 class="text-center"><?php the_title(); ?></h1> -->

<?php 
// get_template_part('includes/section','content' ); 
$section1_content = nl2br(get_field('what_is_the_first_bond'));
$section2_content = nl2br(get_field('our_mission'));
$section3_content = nl2br(get_field('our_vision'));
?>

        
    </div>
    <?php var_dump(get_field('image_1')) ?>

    <section class="two-col" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                    
                <?php echo $section1_content?>

               
                    
                </div>
                <div class="col-md-6 d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_1') ?>" alt="<?php echo templateImage('image_1') ?>">
                

                
                </div>
            </div>
        </div>
        

    </section>

    <section class="image-span" data-aos="fade-up">
    <div class="container">
            <div class="row">

            <p data-aos="fade-up" data-aos-duration="2000"><?php echo $section2_content ?></p>
            
            
            

            
       
           
        </div>
    </section>

   
    <!-- Gets call to action section -->
    <?php  
    get_template_part('includes/section','call2action' ) 
    
    ?> 



    <section class="two-col" aos-data="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_2') ?>" alt="<?php echo templateImage('image_2') ?>">


                <?php if(!get_field('image_2')): ?>
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/images/unavailable-image.jpeg' ;?>" />
                <?php endif ?>
                </div>
                <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                    <?php echo $section3_content ?>
                    
                </div>
                
            </div>
        </div>
        

    </section>


<?php get_footer(); ?> 