<?php 
/*
Template Name:Blog Page
*/

?>

<?php get_header() ?>

<div class="container">

    <div class="row mb-5">
        <div class="col-md-8 col-sm-12 latest-post" style="max-height:500px">
        <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 1, // Number of recent posts thumbnails to display
            'post_status' => 'publish' // Show only the published posts
        ));

        foreach( $recent_posts as $post_item ) : ?>
            

                <?php echo get_the_post_thumbnail($post_item['ID'],'blog-large'); ?>

       
                <?php endforeach?>

                <div class="latest-post-text-box text-light">
                <h2 class="text-light"><?php echo $post_item['post_title'] ?></h2>
                <p><?php echo get_the_excerpt($post_item['ID']); ?></p>
                <a class="btn btn-success" href="<?php echo get_permalink($post_item['ID']) ?>">Read More</a>
                </div>
                
        </div>


        <div class="col-md-4 col-sm-12">
        <?php if(is_active_sidebar( 'blog-sidebar' )): ?>
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
            <?php endif; ?>

            <?php if(is_active_sidebar( 'page-sidebar' )): ?>
            <?php dynamic_sidebar( 'page-sidebar' ); ?>
            <?php endif; ?>
        </div>


    </div>

    <hr>

    <div class="row mt-5">
        <h2 class="text-center">Most Recent Posts</h2>
        <div class="d-flex flex-row" style="flex-wrap:wrap;">

            <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 6, // Number of recent posts thumbnails to display
            'post_status' => 'publish' // Show only the published posts
        ));
        foreach( $recent_posts as $post_item ) : ?>



            <div class="col-md-4 col-sm-12">
                <div class="readmore">

                    <div class="readmore-cap">

                      

                            <?php echo get_the_post_thumbnail($post_item['ID'],'blog-small'); ?>

                            <!-- <div class="date-box">
                                <span>09</span>
                                <hr>
                                <span>Feb</span>
                                <br>
                                <span>2021</span>
                            </div> -->
                    </div>



                    <div class="readmore-footer bg-dark text-light p-3">
                        <h5 class="slider-caption-class"><?php echo $post_item['post_title'] ?></h5>
                        <div class="card-excerpt">
                        <p><?php echo get_the_excerpt($post_item['ID']); ?></p>
                        </div>
                        
                        <a class="btn btn-success" href="<?php echo get_permalink($post_item['ID']) ?>">Read More</a>
                    </div>

                    
                </div>


            </div>


            <?php endforeach; ?>


        </div>





    </div>


    <div class="row">

    </div>



</div>


<?php get_footer() ?>