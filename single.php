<?php get_header(); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Library</li>
  </ol>
</nav>

<section class="blog-header">
    <div class="container">

        <div class="row">


            <?php 

            $categories = get_the_category();
            $category_id = $categories[0]->cat_ID;
            ?>

            <div class="col-md-5">
                <div class="jumbotron jumbotron-fluid blog-jumbotron">
                    <div class="container">
                        <span><?php echo get_the_date('l jS F, Y') ?></span>
                        <h1 class="display-4"><?php the_title(); ?></h1>
                       <h5 class="lead">
                           <span class="d-block">
                           By:<?php echo "Raul" ?> <?php echo "Rodriguez" ?>
                        </span>
                         
                        <span class="d-block">
                            Category:<?php echo get_cat_name($category_id) ?>
                    </span>
                        </h5> 

                        
                    </div>
                </div>






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