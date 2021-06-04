<?php
/*
Template Name: Programs
*/
?>

<?php 

$section1 = get_field('section_1');
$section2 = nl2br(get_field('section_2'));
$section3 = get_field('section_3');
$section4 = nl2br(get_field('section_4'));
$section5 = get_field('section_5');
$section6 = get_field('section_6');



?>


<?php get_header() ?>
<div class="container">
    <div class="row" style="margin-bottom:4rem">
   

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5" aria-label="Slide 6"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="<?php echo get_field('slide_1'); ?>" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
      <?php echo get_field('slide_1_excerpt'); ?>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_field('slide_2'); ?>" class="d-block w-100" alt="...">

      <div class="carousel-caption d-none d-md-block">
      <?php echo get_field('slide_2_excerpt'); ?>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_field('slide_3'); ?>" class="d-block w-100" alt="...">

      <div class="carousel-caption d-none d-md-block">
      <?php echo get_field('slide_3_excerpt'); ?>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_field('slide_4'); ?>" class="d-block w-100" alt="...">

      <div class="carousel-caption d-none d-md-block">
      <?php echo get_field('slide_4_excerpt'); ?>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_field('slide_5'); ?>" class="d-block w-100" alt="...">

      <div class="carousel-caption d-none d-md-block">
      <?php echo get_field('slide_5_excerpt'); ?>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?php echo get_field('slide_6'); ?>" class="d-block w-100" alt="...">

      <div class="carousel-caption d-none d-md-block">
      <?php echo get_field('slide_6_excerpt'); ?>
      </div>
    </div>
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>
</div>

<section class="light-grey-section">
<div class="container">
<div class="row" data-aos="fade-up">
    <div class="col-md-6 col-sm-12">
        <img class="img-fluid" src="<?php echo get_field('section_1_image') ?>" alt="">
    </div>

    <div class="col-md-6 col-sm-12">
        <?php echo $section1 ?>

    </div>
</div>
</section>


<section>
<div class="container">
<div class="row" data-aos="fade-up">
    <div class="col-md-6 col-sm-12">
    <?php echo $section2 ?>
    <button  class="site-button d-block">Call To Action</button>

    </div>


    <div class="col-md-6 col-sm-12">
    <img class="img-fluid" src="<?php echo get_field('section_2_image') ?>" alt="">

    </div>
</div>
</div>
</section>

<section class="light-grey-section">
<div class="container">
<div class="row" data-aos="fade-up">
    <div class="col-md-6 col-sm-12">
        <img class="img-fluid" src="<?php echo get_field('section_3_image') ?>" alt="">
    </div>

    <div class="col-md-6 col-sm-12">
    <?php echo $section3 ?>
        <button  class="site-button d-block">Call To Action</button>

    </div>
</div>
</section>


<section>
<div class="container">
<div class="row" data-aos="fade-up">
    <div class="col-md-6 col-sm-12">
    <?php echo $section4 ?>
    <button  class="site-button d-block">Call To Action</button>

    </div>


    <div class="col-md-6 col-sm-12">
    <img class="img-fluid" src="<?php echo get_field('section_4_image') ?>" alt="">

    </div>
</div>
</div>
</section>

<section class="light-grey-section">
<div class="container">
<div class="row" data-aos="fade-up">
    <div class="col-md-6 col-sm-12">
        <img class="img-fluid" src="<?php echo get_field('section_5_image') ?>" alt="">
    </div>

    <div class="col-md-6 col-sm-12">
    <?php echo $section5 ?>
        <button  class="site-button d-block">Call To Action</button>

    </div>
</div>
</section>


<section>
<div class="container">
<div class="row" data-aos="fade-up">
    <div class="col-md-6 col-sm-12">
    <?php echo $section6 ?>
    <button  class="site-button d-block">Call To Action</button>

    </div>


    <div class="col-md-6 col-sm-12">
    <img class="img-fluid" src="<?php echo get_field('section_6_image') ?>" alt="">

    </div>
</div>
</div>
</section>



</div>


<?php get_footer(); ?>