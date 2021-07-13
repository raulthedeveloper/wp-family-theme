<?php get_header(); ?>
<div class="container">
<h1 class="text-center"><?php echo single_cat_title(); ?></h1>
<?php get_template_part('includes/sections/section','archive' ); ?>

<div class="d-flex justify-content-between mt-5">
<?php  previous_posts_link(); ?>

 <?php  next_posts_link(); ?>
</div>

</div>


<?php get_footer(); ?> 