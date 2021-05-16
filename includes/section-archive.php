<?php if( have_posts() ): while( have_posts() ): the_post();?>

<div class="card mb-3">
  <div class="card-body">
  <h3><?php the_title() ?></h3>
<?php the_excerpt(); ?>
<a href="<?php the_permalink(); ?>">Read More</a>
  </div>
</div>





<?php endwhile; else: endif; ?>