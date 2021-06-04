<?php get_header('hero'); ?>
<!-- <h1 class="text-center"><?php the_title(); ?></h1> -->

<?php 
// get_template_part('includes/section','content' ); 
$section1_content = nl2br(get_field('what_is_the_first_bond'));
$section2_content = nl2br(get_field('our_mission'));
$section3_content = nl2br(get_field('our_vision'));
?>

        
    </div>

    <section class="two-col" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                    
                <?php echo $section1_content?>
                    
                </div>
                <div class="col-md-6 d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img src="https://images.indianexpress.com/2018/10/parents-fights.jpg" alt="">

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
                    <img src="https://images.pexels.com/photos/2086748/pexels-photo-2086748.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
                </div>
                <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                    <?php echo $section3_content ?>
                    
                </div>
                
            </div>
        </div>
        

    </section>


<?php get_footer(); ?> 