<?php get_header(); ?>

<div class="container">
    <?php if(has_post_thumbnail()): ?>

    <img class="img-fluid" width="80" src="<?php the_post_thumbnail_url(); ?>" alt="">
    <h1 class="text-center"><?php the_title(); ?></h1>
    <?php endif?>

    <div class="row">
        <div class="col-9">
            <?php get_template_part('includes/section','content' ); ?>
        </div>

        <div class="col-3">
            <?php if(is_active_sidebar( 'page-sidebar' )): ?>
            <?php dynamic_sidebar( 'page-sidebar' ); ?>
            <?php endif; ?>
        </div>
    </div>
</div>











<?php get_footer(); ?>