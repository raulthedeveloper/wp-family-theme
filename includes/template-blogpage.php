<?php 
/*
Template Name:Blog Page
*/

?>

<!-- Blog Template -->

<?php get_header() ?>

<div class="container">

    <div>



        <div class="row mb-5" data-aos="fade-in">
            <div class="col-md-8 col-sm-12 latest-post" style="max-height:536px">
                <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => 1, // Number of recent posts thumbnails to display
            'post_status' => 'publish' // Show only the published posts
        ));

        

        foreach( $recent_posts as $post_item ) : 
        ?>
       
                    <!-- Has thumbnail -->
                    
                <?php if(!has_post_thumbnail()): 
                ?>

                <?php echo get_the_post_thumbnail($post_item['ID'],'blog-large') ?>

                <?php endif?>



                    <!-- Doesnt have thumbnail -->
                <?php if(has_post_thumbnail()): 
                ?>

                <img class="img-fluid" src="<?php echo get_template_directory_uri() . "/images/unavailable-image.jpeg" ;?>
" alt="unavailable image">

                <?php endif?>


                <?php endforeach?>

                <div class="latest-post-text-box text-light">
                    <h2 class="text-light"><?php echo $post_item['post_title'] ?></h2>
                    <p><?php echo get_the_excerpt($post_item['ID']); ?></p>
                    <a type="button" href="<?php echo get_permalink($post_item['ID']) ?>" class="btn btn-success">Read
                        More
                        <i class="fa fa-book"></i></a>

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

    </div>

    <hr>

    <div class="row mt-5">
        <h2 class="text-center">Most Recent Posts</h2>

        <div class="post-btn-container">
            <button type="button" class="btn btn-warning previous-button"><i
                    class="fa fa-arrow-circle-left"></i>Previous</button>
            <button type="button" class="btn btn-warning next-button">Next <i
                    class="fa fa-arrow-circle-right"></i></button>
        </div>



        <div class="d-flex flex-row mt-4 mb-4" style="flex-wrap:wrap;min-height:600px" id="post_container">
            <div id="loadingDiv">
                <!-- Where loading spinner goes -->
            </div>


        </div>
        <div class="post-btn-container">
            <button type="button" class="btn btn-warning previous-button"><i
                    class="fa fa-arrow-circle-left"></i>Previous</button>
            <button type="button" class="btn btn-warning next-button">Next <i
                    class="fa fa-arrow-circle-right"></i></button>
        </div>




    </div>




</div>

<script>
    (function ($) {

        let pageNumber = 1;
        let homeUrl = "<?php echo home_url()?>"
        let isLoading = false
        let clicks = 0



        function loading() {
            var $loading = $('#loadingDiv').hide();
            $(document)
                .ajaxStart(function () {
                    loading = true
                    console.log('started')
                    $loading.show();
                })
                .ajaxStop(function () {
                    loading = false
                    console.log('stopped')
                    $loading.hide();
                });

        }




        function togglePrevious(page) {
            $('.next-button').attr("disabled", false)

            if(clicks == 0){
                $('.previous-button').attr("disabled", true)

            }

            if(clicks > 0){
                $('.previous-button').attr("disabled", false)
            }



        }

        function toggleNext(elements, page) {

            if(clicks == 2){
                $('.next-button').attr("disabled", true)
                
            }

        }


        function convertToMonth(string) {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const stringArr = string.split("")

            if (stringArr[0] == "0") {
                return months[parseInt(stringArr[1]) - 1];

            }
        }


        /////// Calls Out to WP REST for AJAX //////////////////////
        function wpApiCall() {


            $.get(homeUrl + '/wp-json/wp/v2/posts?per_page=6&page=' + pageNumber,
                function (data) {


                    toggleNext(Object.keys(data).length, pageNumber)


                    data.forEach(e => {
                        // console.log(e)




                        const yellowBox =
                            `<div class="card-date">${e.date.slice(8,10)}<hr><div><span>${convertToMonth(e.date.slice(5,7))}</span><span>${e.date.slice(0,4)}</span></div>`

                        if (e.featured_media_src_url) {
                            $('#post_container').append(
                                `<div data-aos="fade-in" data-aos-duration="1500" class="col-md-4 col-sm-12"> <div class="readmore"><div class="readmore-cap">${yellowBox}</div><img src="${e.featured_media_src_url}" alt=""></div><div class="readmore-footer bg-dark text-light p-3"><h5 data-aos="fade-in" class="slider-caption-class" data-aos-duration="500">${e.title.rendered}</h5><div data-aos="fade-in" data-aos-duration="500" class="card-excerpt">${e.excerpt.rendered}</div><a data-aos="fade-in" data-aos-duration="500" class="btn btn-success" href="${e.link}">Read More</a></div></div></div>`
                            )
                        } else {
                            $('#post_container').append(
                                `<div data-aos="fade-in" data-aos-duration="1500"  class="col-md-4 col-sm-12"> <div class="readmore"><div class="readmore-cap">${yellowBox}</div>
                                <div class="card-date">12</div><img src="<?php echo get_template_directory_uri() . "/images/unavailable-image.jpeg" ;?>"
 alt=""></div><div class="readmore-footer bg-dark text-light p-3"><h5 data-aos="fade-in" data-aos-duration="500" class="slider-caption-class">${e.title.rendered}</h5><div class="card-excerpt" data-aos="fade-in" data-aos-duration="500">${e.excerpt.rendered}</div><a data-aos="fade-in" data-aos-duration="500" class="btn btn-success" href="${e.link}">Read More</a></div></div></div>`
                            )
                        }


                    })


                });

        }





        $(document).ready(() => {
            togglePrevious(1)

            /////////// Next Button /////////////

            $('.next-button').click(() => {
                clicks += 1
                console.log(clicks)

                pageNumber += 1
                togglePrevious(pageNumber)

                $('#post_container').empty()


                wpApiCall()


            })


            /////// Previous Button ///////////

            $('.previous-button').click(() => {
                clicks -= 1
            console.log(clicks)
                pageNumber -= 1
                togglePrevious(pageNumber)


                $('#post_container').empty()



                wpApiCall()


            })
        })

        //////////////// Intial API call to get WP Posts /////////////


        wpApiCall()




    })(jQuery)
</script>

<?php get_footer() ?>