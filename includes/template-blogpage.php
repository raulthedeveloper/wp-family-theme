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
    <div class="row">
        <div>
            <button class="previous-button">Previous</button>
            <button class="next-button">Next</button>
        </div>

    </div>
    <div class="row mt-5">
        <h2 class="text-center">Most Recent Posts</h2>
        <div class="d-flex flex-row" style="flex-wrap:wrap;min-height:400px" id="post_container">



        </div>

        <div class="row">
            <div>
                <button class="previous-button">Previous</button>
                <button class="next-button">Next</button>
            </div>

        </div>



    </div>




</div>
<!-- 
<div class="date-box">
                                <span>09</span>
                                <hr>
                                <span>Feb</span>
                                <br>
                                <span>2021</span>
                            </div>  -->



<script>
    let pageNumber = 1;
    let homeUrl = "<?php echo home_url()?>"

    function togglePrevious(page) {
        jQuery('.next-button').attr("disabled", false)
        if (page === 1) {
            jQuery('.previous-button').attr("disabled", true)
        } else if (page > 1) {
            jQuery('.previous-button').attr("disabled", false)
        }


    }

    function toggleNext(elements, page) {
        console.log(elements)
        console.log(page)



        if (elements === 6 && page === 3) {
            jQuery('.next-button').attr("disabled", true)
        }



        if (elements < 6 || page > 3) {
            jQuery('.next-button').attr("disabled", true)
        } else {
            jQuery('.next-button').attr("disabled", false)
        }
    }



    jQuery(document).ready(() => {

        togglePrevious(1)

        /////////// Next Button /////////////

        jQuery('.next-button').click(() => {
            pageNumber += 1
            togglePrevious(pageNumber)

            jQuery('#post_container').empty()

           

            jQuery.get(homeUrl + '/wp-json/wp/v2/posts?per_page=6&page=' + pageNumber, function (data) {
                console.log(data)
                toggleNext(Object.keys(data).length, pageNumber)

                data.forEach(e => {
                    jQuery('#post_container').append(
                        `<div class="col-md-4 col-sm-12"> <div class="readmore"><div class="readmore-cap"><img src="${e.featured_media_src_url}" alt=""></div><div class="readmore-footer bg-dark text-light p-3"><h5 class="slider-caption-class">${e.title.rendered}</h5><div class="card-excerpt">${e.excerpt.rendered}</div><a class="btn btn-success" href="${e.link}">Read More</a></div></div></div>`
                    )

                })


            });
            
        })


        /////// Previous Button ///////////

        jQuery('.previous-button').click(() => {
            pageNumber -= 1
            togglePrevious(pageNumber)




            jQuery('#post_container').empty()

            

            jQuery.get(homeUrl + '/wp-json/wp/v2/posts?per_page=6&page=' + pageNumber, function (data) {
                data.forEach(e => {
                    jQuery('#post_container').append(
                        `<div class="col-md-4 col-sm-12"> <div class="readmore"><div class="readmore-cap"><img src="${e.featured_media_src_url}" alt=""></div><div class="readmore-footer bg-dark text-light p-3"><h5 class="slider-caption-class">${e.title.rendered}</h5><div class="card-excerpt">${e.excerpt.rendered}</div><a class="btn btn-success" href="${e.link}">Read More</a></div></div></div>`
                    )

                })


            });

            
        })
    })


    jQuery.get(homeUrl + '/wp-json/wp/v2/posts?per_page=6&page=' + pageNumber, function (data) {

        data.forEach(e => {
            jQuery('#post_container').append(
                `<div class="col-md-4 col-sm-12"> <div class="readmore"><div class="readmore-cap"><img src="${e.featured_media_src_url}" alt=""></div><div class="readmore-footer bg-dark text-light p-3"><h5 class="slider-caption-class">${e.title.rendered}</h5><div class="card-excerpt">${e.excerpt.rendered}</div><a class="btn btn-success" href="${e.link}">Read More</a></div></div></div>`
            )

        })


    });
</script>

<?php get_footer() ?>