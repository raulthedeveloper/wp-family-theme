

<?php 
    $args = array(
        'post_type' => 'Team',
        'posts_per_page' => -1
    );

    $the_query = new WP_Query( $args );
 
        // The Loop
        if ( $the_query->have_posts() ) { ?>

        

        <!-- if there are no team members -->
<hr>
           <h2 class="text-center mb-5">Board of Advisors</h2> 

           <?php while ( $the_query->have_posts() ) {
                 $the_query->the_post(); ?>


<?php if(!get_field('admin')): ?>

<div class="col-md-3 employee-image mb-3">

                <div class="card bg-dark text-white ">
                    

                    <div class="card-footer" style="min-height:5rem; display:flex; flex-direction:column;">
                        <h3 class="card-title h-10 m-auto text-center"><?php echo get_field('title') ? get_field('title') : 'Title' ?></h3>
                        <h5 class="card-title  h-10 m-auto text-center font-weight-light"><?php echo get_field('first_name') && get_field('last_name') ? get_field('first_name') . " " . get_field('last_name') : "name" ?></h5>

                    </div>
            
        </div>
        
    </div>
    <?php endif ?>
                
           <?php }
        } 
        /* Restore original Post Data */
            wp_reset_postdata();
    
    ?>


</div>