<?php get_template_part('includes/sections/section','head' ); ?>

<?php get_template_part('includes/sections/section','socialmedia' ); ?>

    <section class="secondary-header" pt-0>

    <!-- Mobile Navigation -->
    <?php get_template_part('includes/sections/section','navbar'); ?>

    <img class="img-fluid" src="<?php echo get_template_directory_uri(). '/images/Firstbondlogo.png' ?>" alt="">

    <!-- Desktop Navigation -->
    <nav class="navbar navbar-expand-md navbar-light secondary-nav" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'your-theme-slug' ); ?>">
        <span class="navbar-toggler-icon"></span>
    </button>
        <?php
        wp_nav_menu( array(
            'theme_location'    => 'top-menu',
            'depth'             => 2,
            'container'         => 'div',
            'container_class'   => 'collapse navbar-collapse justify-content-center',
            'container_id'      => 'bs-example-navbar-collapse-1',
            'menu_class'        => 'nav navbar-nav',
            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
            'walker'            => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
    </div>
</nav>
    </section>
   
    
   
