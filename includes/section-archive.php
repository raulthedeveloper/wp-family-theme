
<?php if( have_posts() ): while( have_posts() ): the_post();?>



<div class="card mb-3 card-archive" >
  <div class="row g-0">
    <div class="col-md-4">

    <?php if(has_post_thumbnail()): ?>

      <img class="img-fluid"   src="<?php the_post_thumbnail_url(); ?>" alt="">

   <?php endif?>

   <?php if(!has_post_thumbnail()): ?>

<img class="img-fluid"   src="https://eagle-sensors.com/wp-content/uploads/unavailable-image.jpg" alt="">

<?php endif?>
   
    
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php the_title() ?></h5>
        <p class="card-text"><?php the_excerpt(); ?></p>

        <a type="button" href="<?php the_permalink(); ?>" class="btn btn-success">Read More
                    <i class="fa fa-book"></i></a>

      </div>
    </div>
  </div>
</div>



<?php endwhile; else: endif; ?>