<?php get_header(); ?>
<div class="container">
    <div class="row">




        <?php if(has_post_thumbnail()): ?>

       

        <?php endif?>


        <h1><?php the_title(); ?></h1>

        

        <?php 
            $first_name = get_the_author_meta('first_name');
            $last_name = get_the_author_meta('last_name');
            ?>

            <p>By:<?php echo $first_name ?> <?php echo $last_name ?></p>

            <span><?php echo get_the_date('l jS F, Y') ?></span>

        <div class="col-md-9 col-sm-12">
       
        <img class="img-fluid w-100"  src="<?php the_post_thumbnail_url(); ?>" alt="">
        <?php get_template_part('includes/section','blogcontent' ); ?>
        </div>

        <div class=".d-sm-none .d-md-block col-md-3">
            <div class="single-side-bar">
            <?php if(is_active_sidebar( 'blog-sidebar' )): ?>
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            <?php endif; ?>
            
            </div>
            
         
        </div>
        
    </div>

               
    

</div>

<?php wp_link_pages( ) ?>


<?php get_footer(); ?>