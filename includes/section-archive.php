<?php echo get_template_directory_uri(  ); ?>

<?php if( have_posts() ): while( have_posts() ): the_post();?>



<div class="card mb-3" >
  <div class="row g-0">
    <div class="col-md-4">
    <img class="img-fluid"  src="<?php the_post_thumbnail_url(); ?>" alt="">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php the_title() ?></h5>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>">Read More</a>
      </div>
    </div>
  </div>
</div>




  






<?php endwhile; else: endif; ?>