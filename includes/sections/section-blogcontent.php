<?php if( have_posts() ): while( have_posts() ): the_post();?>

<!-- section- -->



<?php the_content(); ?>
<?php
$tags = get_the_tags(); ?>

<?php 
// Loops through tags
if($tags):?>
<?php foreach ($tags as $tag):?>
<a href="<?php echo get_tag_link($tag ->term_id); ?>">
    <?php echo $tag->name; ?>

</a>

<?php endforeach; ?>
<?php endif ?>

<?php 
    $categories = get_the_category();

   foreach($categories as $cat):
?>

<a class="btn btn-dark mb-1" href="<?php echo get_category_link($cat->term_id ) ?>"><?php echo $cat->name; ?></a>
<?php endforeach ?>

<hr>


<?php comments_template() ?>



<?php endwhile; else: endif; ?>

