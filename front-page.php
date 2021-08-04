
<?php get_header('hero'); ?>


</div>
<section class="two-col" data-aos="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-6 " data-aos="fade-in" data-aos-duration="2000">

                <?php echo get_field('what_is_the_first_bond')?>

                <a class="btn btn-success" href="<?php echo home_url() . '/about-us' ?>"> Read More</a>

            </div>
            <div class="col-md-6  order-md-last order-first mb-sm-2 d-flex justify-content-center" data-aos="fade-in"
                data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_1') ?>"
                    alt="<?php echo templateImage('image_1') ?>">



            </div>
        </div>
    </div>


</section>

<section class="image-span" style="padding-top:3rem; background-image: linear-gradient(#1d1d1e8c, #02020270, transparent),url('<?php echo templateImage('image_2')['sizes']['medium'] ?>" data-aos="fade-up">
    <div class="container">
        <div class="row">

            <?php echo get_field('our_vision') ?>
            <!-- <p data-aos="fade-up" data-aos-duration="2000"></p> -->




        </div>
</section>


<!-- Gets call to action section -->

<section class="two-col" data-aos="fade-up">
    <div class="container">
        <div class="row">

            <div class="col-md-6 d-flex justify-content-center"  data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_3')['sizes']['medium'] ?>"
                    alt="<?php echo templateImage('image_3') ?>">



            </div>

            <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">

                <?php echo get_field('our_programs')?>

                <a href="<?php echo get_page_link( get_page_by_title( "programs" )->ID ); ?>"
                    class="btn btn-success ">See More</a>


            </div>

        </div>
    </div>


</section>
<?php echo get_field('business_address') ?>


<!-- Events Section -->
<section class="image-span" style="padding-top:3rem;background:url('<?php echo get_field('image_4')['sizes']['large'] ?>'); background-repeat:none; background-size:cover;  background-position: center; color:white;

" data-aos="fade-up">
    <div class="container">
    <?php echo get_field('section_4') ?>

            
<a href="<?php echo get_home_url() . '/events'; ?>" class="btn d-table m-auto btn-success">See
    More</a>
    </div>

            

            

</section>



<!-- Blog section -->
<section class="two-col" aos-data="fade-up">
    <div class="container">
        <div class="row">
            <div class="col-md-6  d-flex justify-content-center" data-aos="fade-in" data-aos-duration="2000">
                <img class="img-fluid" src="<?php echo templateImage('image_5')['sizes']['medium'] ?>"
                    alt="<?php echo templateImage('image_2') ?>">

                <?php if(!get_field('image_5')): ?>
                <img class="img-fluid"
                    src="<?php echo get_template_directory_uri() . '/images/unavailable-image.jpeg' ;?>" />
                <?php endif ?>
            </div>
            <div class="col-md-6" data-aos="fade-in" data-aos-duration="2000">
                <?php echo get_field('blog') ?>
                <a href="<?php echo get_page_link( get_page_by_title( "blog" )->ID ); ?>" class="btn btn-success">See
                    Blog</a>

            </div>

        </div>
    </div>


</section>


<?php get_footer(); ?>