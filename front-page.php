<?php get_header('hero'); ?>
<!-- <h1 class="text-center"><?php the_title(); ?></h1> -->

<?php 
// get_template_part('includes/section','content' ); 
$section1_content = nl2br(get_field('what_is_the_first_bond'));
$section3_content = nl2br(get_field('our_vision'));
?>
 
    </div>
    <section class="two-col" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6 " data-aos="fade-in" data-aos-duration="2000">
                    
                <?php echo $section1_content?>

               
                    
                </div>
                <div class="col-md-6  order-md-last order-first mb-sm-2 d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_1') ?>" alt="<?php echo templateImage('image_1') ?>">
                

                
                </div>
            </div>
        </div>
        

    </section>

    <section class="image-span" data-aos="fade-up">
    <div class="container">
            <div class="row">

            <p data-aos="fade-up" data-aos-duration="2000"><?php echo get_field('our_mission') ?></p>
            
            
            
           
        </div>
    </section>

   
    <!-- Gets call to action section -->
    
<section class="two-col" data-aos="fade-up">
        <div class="container">
            <div class="row">

            <div class="col-md-6 d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_4') ?>" alt="<?php echo templateImage('image_4') ?>">
                

                
                </div>

                <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                    
                <?php echo get_field('our_programs')?>

                <a href="<?php echo get_page_link( get_page_by_title( "programs" )->ID ); ?>" class="btn btn-success ">See More</a>

                    
                </div>
                
            </div>
        </div>
        

    </section>
<?php echo get_field('business_address') ?>
    

<!-- Events Section -->
<section class="image-span"  style="background:url('<?php echo get_field('image_3')['sizes']['large'] ?>');      background-repeat:none; background-size:cover;  background-position: center; color:white;

" data-aos="fade-up">
    <div class="container">
            <div class="row" >

            <!-- style="background-image: -->
                <?php echo get_field('section_4') ?>

                <a href="<?php echo get_home_url() . '/events'; ?>" class="btn btn-success  w-25 d-block m-auto">See More</a>
            <!-- <p data-aos="fade-up" class="text-light" data-aos-duration="2000"><?php echo $section2_content ?></p> -->
            
          
           
        </div>
    </section>

    
    
<!-- Blog section -->
    <section class="two-col" aos-data="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-md-6  d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_2') ?>" alt="<?php echo templateImage('image_2') ?>">

                <?php if(!get_field('image_2')): ?>
                    <img class="img-fluid" src="<?php echo get_template_directory_uri() . '/images/unavailable-image.jpeg' ;?>" />
                <?php endif ?>
                </div>
                <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                    <?php echo get_field('blog') ?>
                    <a href="<?php echo get_page_link( get_page_by_title( "blog" )->ID ); ?>" class="btn btn-success">See Blog</a>

                </div>
                
            </div>
        </div>
        

    </section>


<?php get_footer(); ?> 