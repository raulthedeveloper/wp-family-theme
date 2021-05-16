
<?php if( have_posts() ): while( have_posts() ): the_post();?>
<?php 
$first_name = get_the_author_meta('first_name');
$last_name = get_the_author_meta('last_name');
?>

<?php echo $first_name ?> <?php echo $last_name ?>


<?php the_content(); ?>

<?php endwhile; else: endif; ?>