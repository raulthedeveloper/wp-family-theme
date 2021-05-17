<?php get_header(); ?>
<div class="container">
    <div class="row">
    <?php if(has_post_thumbnail()): ?>
        <img class="img-fluid" width="80" src="<?php the_post_thumbnail_url(); ?>" alt="">
    <?php endif?>
        <h1 class="text-center"><?php the_title(); ?></h1>

        <?php get_template_part('includes/section','blogcontent' ); ?>
    </div>

</div>

<?php wp_link_pages( ) ?>

<?php get_footer(); ?>