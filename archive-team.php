<?php get_header(); ?>
<div class="container">
events

<h1 class="text-center"><?php echo single_cat_title(); ?></h1>
<?php get_template_part('includes/sections/section','archive' ); ?>

<?php  previous_posts_link(); ?>

 <?php  next_posts_link(); ?>
</div>


<?php get_footer(); ?> 