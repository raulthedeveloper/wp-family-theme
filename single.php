<?php get_header(); ?>
<div class="container">
    <div class="row">




        <?php if(has_post_thumbnail()): ?>

        <img class="img-fluid" width="80" src="<?php the_post_thumbnail_url(); ?>" alt="">

        <?php endif?>


        <h1 class="text-center"><?php the_title(); ?></h1>

        



        <div class="col-9">
        <?php get_template_part('includes/section','blogcontent' ); ?>
        </div>

        <div class="col-3">
            <?php if(is_active_sidebar( 'blog-sidebar' )): ?>
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            <?php endif; ?>
        </div>

    </div>


    

    

</div>

<?php wp_link_pages( ) ?>

<?php get_footer(); ?>