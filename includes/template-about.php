<?php
/*
Template Name: About Us
*/
?>
<?php get_header(); ?>



<div class="container">
<div class="row">
<h1 class="text-center"><?php the_title(); ?></h1>
    <div class="col-md-3 col-sm-12">
    <?php if(has_post_thumbnail()): ?>

<img class="img-fluid rounded-circle" width="400" src="<?php the_post_thumbnail_url(); ?>" alt="">

        <div class="social-media-container">
            <a href="">Facebook</a>
            <a href="">Instagram</a>
            <a href="">Linkdin</a>
        </div>

<?php endif?>
    </div>

    <div class="col-md-9 col-sm-12">
    
    <?php the_content() ?>
    </div>
</div>


    
</div>





<?php get_footer(); ?>