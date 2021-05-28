<?php
/*
Template Name: Events
*/
?>
<?php get_header(); ?>



<div class="container p-3 mt-3 mb-3">
    <div class="row">
        <div class="col-md-6">

            <?php if(has_post_thumbnail()): ?>

            <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="">

            <?php endif?>
        </div>
        <div class="col-md-6">
            <h2><?php the_title() ?></h2>
            <p><?php the_content()?></p>
        </div>
    </div>

    <hr>

    <div class="row mt-5">
        <h2 class="text-center mb-5">Upcoming Events</h2>
        



            <?php 
            
            $args = array(  
                'post_type' => 'events',
                'post_status' => 'publish',
                'posts_per_page' => 4, 
                'orderby' => 'title', 
                'order' => 'ASC', 
            );
        
            $loop = new WP_Query( $args ); 
                
            while ( $loop->have_posts() ) : $loop->the_post(); ?>

            
<div class="col-md-6">
<a href="<?php the_permalink(); ?>">
            <div class="card bg-dark text-white mb-5">
                <!-- <div class="card-header p-3">
                    <span>Event date and time:</span> 
                    <hr>
                    <span>Febuary 27, 2020 8pm</span>
                </div> -->
                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img" alt="...">
                <div class="card-img-overlay">
                    <h5 class="card-title"><?php the_title() ?></h5>
                    <p class="card-text"><?php the_excerpt(); ?></p>
                    <p class="card-text">Last updated 3 mins ago</p>
                    

                </div>

                </div>
            </div>
            </a>
            <?php  endwhile;
        
            

            wp_reset_postdata(); 
            ?>
            </div>

        </div>
    



</div>





<?php get_footer(); ?>