<?php get_header(); ?>

<section class="blog-header">
    <div class="container">

        <div class="row">


            <?php 

            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;

            // echo get_category_link($cat) . '<br>';
            // echo get_cat_name($cat->cat_ID ). ', ' ;
            ?>

            <div class="col-md-5">
                <div class="jumbotron jumbotron-fluid blog-jumbotron">
                    <div class="container">
                        <span><?php echo get_the_date('l jS F, Y') ?></span>
                        <h1 class="display-4"><?php the_title(); ?></h1>
                       <h5 class="lead">
                           <span class="d-block mb-2">
                           By: <?php echo wp_get_current_user()->data->display_name ?>
                        </span>
                         
                        <span class="mr-2">
                            Category:
                    </span>
                    <?php 
                                foreach($categories as $cat):?>
                                    
                                    <a class="btn btn-dark mb-1" href="<?php echo get_category_link($cat) ?>"><?php echo get_cat_name($cat->cat_ID ) ?></a>
                                    

                           <?php endforeach ?>
                        </h5> 

                    </div>
                </div>

                
<?php 

// var_dump(get_categories()[0]);
// var_dump(get_cat_name($categories[0]->cat_ID));
// var_dump(get_the_category());
// var_dump(get_category_link($categories))
// var_dump($categories);
// foreach($categories as $cat){
//     echo get_category_link($cat) . '<br>';
//     echo get_cat_name($cat->cat_ID ). '<br>';
// }
?>




            </div>


            <div class="col-md-7">
                <?php if(has_post_thumbnail()): ?>

                <img class="img-fluid w-100" src="<?php the_post_thumbnail_url(); ?>" alt="">


                <?php endif?>
            </div>
        </div>
    </div>


</section>



<div class="container">
    <div class="row">



        <div class=".d-sm-none .d-md-block col-md-3" style="padding-top:.5rem">
            <div class="single-side-bar">
                <?php if(is_active_sidebar( 'blog-sidebar' )): ?>
                <?php dynamic_sidebar( 'blog-sidebar' ); ?>

                
                <?php endif; ?>

            </div>


        </div>



        <div class="col-md-9 col-sm-12">

            <?php get_template_part('includes/section','blogcontent' ); ?>
            
            
           
        </div>



    </div>




</div>

<?php wp_link_pages( ) ?>


<?php get_footer(); ?>